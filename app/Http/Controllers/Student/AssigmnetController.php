<?php

namespace App\Http\Controllers\Student;

use Carbon\Carbon;
use App\Models\Question;
use App\Models\Assigment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AssignmentQuestions;
use App\Http\Controllers\Controller;

class AssigmnetController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkTimeLimit')->only('create');
    }

    public function index(Request $request)
    {
        $request->session()->forget('start_time');
        $request->session()->forget('end_time');

        return view('student.pages.assignment.index');
    }

    public function create(Request $request)
    {
        $questions = new Question();
        $questions = $questions->get()->shuffle();
        $startTime = Carbon::now();
        $endTime = $startTime->copy()->addMinutes(1);
        $request->session()->put('start_time', $startTime);
        $request->session()->put('end_time', $endTime);
        return view('student.pages.assignment.create', compact('questions', 'endTime', 'startTime'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'questions.*' => 'required|exists:question_answers,id',
        ]);

        $user_id = auth()->user()->id;
        $assigment = Assigment::create([
            'user_id' => $user_id,
            'teacher_id' => $request->teacher_id,
        ]);
        foreach ($data['questions'] as $question_id => $answer_id) {
            AssignmentQuestions::create([
                'assigment_id' => $assigment->id,
                'question_id' => $question_id,
                'answer_id' => $answer_id,
            ]);
        }
        return redirect()->back()->with('success', 'Assignment submitted successfully.');
    }
}
