<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable=[
        'code',
        'duration',
        'exam_date',
        'start_time',
        'school_grade_id',
        'subject_id',
        'teacher_id'
    ];
}
