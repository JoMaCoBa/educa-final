// routes/web.php
use App\Http\Controllers\QuizController;
use App\Http\Controllers\CertificateController;

Route::get('/courses/{course}/quiz', [QuizController::class, 'show'])->name('courses.quiz');
Route::post('/courses/{course}/quiz', [QuizController::class, 'submit'])->name('courses.quiz.submit');
Route::get('/courses/{course}/certificate', [CertificateController::class, 'generate'])->name('courses.certificate');
