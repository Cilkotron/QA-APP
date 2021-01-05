<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VoteQuestionController extends Controller
{
     public function __contruct()
     {
         $this->middleware('auth');
     }

     public function __invoke(Question $question)
     {
        $vote = (int) request()->vote;
        auth()->user()->voteQuestions($question, $vote);
         return back();
     }
}
