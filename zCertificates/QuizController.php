// app/Http/Controllers/QuizController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Question;

class QuizController extends Controller
{
    public function show(Course $course)
    {
        $questions = Question::inRandomOrder()->limit(5)->get();

        return view('quiz.show', compact('course', 'questions'));
    }

    public function submit(Request $request, Course $course)
    {
        $correctAnswers = 0;

        foreach ($request->input('answers') as $questionId => $answer) {
            $question = Question::find($questionId);
            if ($question && $question->correct_answer == $answer) {
                $correctAnswers++;
            }
        }

        if ($correctAnswers >= 4) {
            return redirect()->route('courses.certificate', $course->id)
                             ->with('success', '¡Felicidades, has aprobado el quiz!');
        }

        return redirect()->route('courses.quiz', $course->id)
                         ->with('error', 'Debes acertar al menos 4 de 5 preguntas para obtener el certificado.');
    }
}
