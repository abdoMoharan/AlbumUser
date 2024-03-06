<?php

namespace App\Models;

use App\Models\User;
use App\Models\Teacher;
use App\Models\QuestionAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'teacher_id',
        'user_id'
    ];


    public function teacher(){
    return $this->belongsTo(Teacher::class);
    }
    public function user(){
    return $this->belongsTo(User::class);
    }

    public function answers(){
    return $this->hasMany(QuestionAnswer::class);
    }

}
