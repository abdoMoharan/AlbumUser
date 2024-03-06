<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionAnswer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\QuestionRequest;
use App\Http\Requests\QuestionEditRequest;

class QuestionController extends Controller
{


    public function index(){
        $teacher_id = Auth::guard('teacher')->user()->id;
        $questions = Question::query()->where('teacher_id', $teacher_id)->get();
        return view('teacher.pages.question.index',compact('questions'));
    }

    public function create(){
        return view('teacher.pages.question.create');
    }

    public function store(QuestionRequest $request){

        $data = $request->validated();
        $teacher_id = Auth::guard('teacher')->user()->id;
        $question = Question::create([
            'question' => $data['question'],
            'teacher_id' => $teacher_id,

        ]);
        foreach ($data['list'] as $item) {

            QuestionAnswer::create([
                'question_id' => $question->id,
                'answer' => $item['answer'],
            ]);
        }
        return redirect()->route('teacher.question.index')->with('success', 'save questions');
    }


    public function destroy($id){
        Question::find($id)->delete();
        return redirect()->route('teacher.question.index')->with('success', 'delete questions');
    }
}
