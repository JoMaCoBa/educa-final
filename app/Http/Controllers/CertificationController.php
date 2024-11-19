<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Dompdf\Options;
use PDF; // Ensure you have installed the barryvdh/laravel-dompdf package
use Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class CertificationController extends Controller
{
    public function startQuiz($courseId)
    {
        $course = Course::findOrFail($courseId);
        $questions = $course->questions;

        return view('certification.quiz', compact('course', 'questions'));
    }

    public function submitQuiz(Request $request, $courseId)
    {

        $course = Course::findOrFail($courseId);
        $correctAnswers = 0;
        $questions = $request->input('questions', []);

        foreach ($questions as $question) {
            if ($question['user_answer'] === $question['correct_answer']) {
                $correctAnswers++;
            }
        }

        if ($correctAnswers >= 4) {
            return redirect()->route('course.certification.certificate', $course->id);
        }

        return back()->with('error', 'You need at least 4 correct answers to pass the certification.');
    }

    public function generateCertificate($courseId)
    {
        $course = Course::findOrFail($courseId);
        $user = Auth::user();
        // Configurar opciones para ajustar tamaño y eliminar márgenes
        $options = new Options();
        $options->set('defaultPaperSize', 'a5'); // Ajusta a tamaño A5
        $options->set('isHtml5ParserEnabled', true);
        $pdf = PDF::loadView('certification.certificate', [
            'course' => $course,
            'user' => $user ,
        ])
        ->setPaper([0, 0, 520, 400], 'portrait'); // Cambiar orientación a vertical
        //->setOptions($options);

        // Guardar PDF temporalmente
        $pdfPath = storage_path('app/public/certificates/' . $user->id . '_certificate.pdf');
        $pdf->save($pdfPath);

        // Enviar correo con PHPMailer
        $this->sendCertificateEmail($user->email, $pdfPath);

        // Descargar certificado después del envío
        return response()->download($pdfPath)->deleteFileAfterSend(true);
    }

    private function sendCertificateEmail($email, $pdfPath)
    {
        $mail = new PHPMailer(true);

        try {
            // Configuración SMTP
            $mail->isSMTP();
            $mail->Host = 'ssl://smtp.dreamhost.com'; // Servidor SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'procesos@educa.urbana1162.edu.mx'; // Usuario SMTP
            $mail->Password = 'EDUCATEST1'; // Contraseña SMTP
            $mail->SMTPSecure = 'ssl'; // Seguridad SSL
            $mail->Port = 465;

            // Configuración del remitente y destinatario
            $mail->setFrom('procesos@educa.urbana1162.edu.mx', 'Educa');
            $mail->addAddress($email, 'Usuario'); // Dirección del destinatario

            // Adjuntar el PDF
            $mail->addAttachment($pdfPath, 'Certificado_EDUCA.pdf');

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Certificado EDUCA';
            $mail->Body = '<p>Hola,</p><p>Adjunto encontrarás tu certificado de finalización del curso. ¡Felicidades!</p>';

            // Enviar correo
            $mail->send();
        } catch (Exception $e) {
            // Loggear error si ocurre algún problema
            \Log::error('Error al enviar el correo: ' . $mail->ErrorInfo);
        }
    }
}
