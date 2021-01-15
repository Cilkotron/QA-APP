<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Gate;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(10);
        return view('question.index', compact('questions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();
        if(!Auth::user()) {
            return view('auth.login');
        }
        return view('question.create', compact('question'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        $question = new Question();
        $question->user_id = Auth::id();
        $question->title = $request->title;
        $question->slug = Str::slug($request->title);
        $question->body = $request->body;
        $question->save();
        return redirect()->route('question.index')->with('success', "Your question has been submitted");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        /*
        ## Same method ##
        $question->views = $question->views + 1;
        $question->save();
        */
        $question->increment('views');
        return view('question.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        /*
        if(Gate::denies('update-question', $question)) {
            abort(403, "Access denied");
        } */
        $this->authorize("update", $question);
        return view('question.edit', compact('question'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        /*if(Gate::denies('update-question', $question)) {
        abort(403, "Access denied");
        }*/
        $this->authorize("update", $question);
        $question->update($request->only('title', 'body'));
        return redirect()->route('question.index')->with('success', "Your question has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        /*
        if(Gate::denies('delete-question', $question)) {
            abort(403, "Access denied");
        } */
        $this->authorize("delete", $question);
        $question->delete();
        return redirect()->route('question.index')->with('success', "Your question has been deleted");
    }
}
