<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','type','description','chooses',
        'answer','subject_id','school_grade_id','teacher_id','unit_id'
    ];
}
