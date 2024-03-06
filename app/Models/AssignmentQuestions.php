<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentQuestions extends Model
{
    use HasFactory;

    protected $fillable = [
        'assigment_id',
        'question_id',
        'answer_id'
    ];
}
