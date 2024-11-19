<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'question', 'options', 'answer'];

    protected $casts = [
        'options' => 'array', // Almacena opciones como JSON
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
