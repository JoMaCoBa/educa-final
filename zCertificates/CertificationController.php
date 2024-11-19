// app/Http/Controllers/CertificateController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    public function generate(Course $course)
    {
        $user = auth()->user();

        $pdf = Pdf::loadView('certificates.certificate', [
            'course' => $course,
            'user' => $user,
        ]);

        return $pdf->download('certificado_' . $course->name . '_' . $user->name . '.pdf');
    }
}
