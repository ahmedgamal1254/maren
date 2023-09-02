<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month_User extends Model
{
    use HasFactory;

    protected $table="month_student";

    protected $fillable=["user_id","month_id","lock","points_paid"];
}
