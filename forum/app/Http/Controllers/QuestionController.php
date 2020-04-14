<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Model\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Create a new AuthController instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return QuestionResource::collection(Question::latest()->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Question::create([
            'title'       => $request->title,
            'slug'        => $request->slug,
            'body'        => $request->body,
            'category_id' => $request->category_id,
            'user_id'     => $request->user_id,
        ]);

        return response('Record inserted', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Model\Question $question
     *
     * @return QuestionResource
     */
    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\Question      $question
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->update([
            'title' => $request->title,
            'slug'  => $request->slug,
            'body'  => $request->body,
        ]);

        return response('Record updated.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Model\Question $question
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return response('Deleted', 201);
    }
}
