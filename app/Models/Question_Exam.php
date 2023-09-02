<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_Exam extends Model
{
    use HasFactory;

    protected $table="question_exams";

    protected $fillable=['exam_id','question_id','teacher_id'];
}
