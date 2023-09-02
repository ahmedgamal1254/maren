<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_Exam_Student extends Model
{
    use HasFactory;
    protected $table="question_exam_students";

    protected $fillable=[
        "student_answer","exam_id",
        "user_id","question_id",
        "subject_id","school_grade_id","teacher_id"
    ];
}
