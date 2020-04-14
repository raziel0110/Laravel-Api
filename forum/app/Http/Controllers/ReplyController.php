<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResourceReply;
use App\Model\Question;
use App\Model\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
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
     *
     * @param Question $question
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Question $question)
    {
        return ResourceReply::collection($question->replies);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Reply $reply, Request $request)
    {
        $reply = $question->replies()->create([
            'body' => $request->body,
            'question_id' => $request->question_id,
            'user_id' => $request->user_id
        ]);
        return response(['reply' => new ResourceReply($reply)], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Model\Reply $reply
     * @param Question         $question
     *
     * @return ResourceReply
     */
    public function show(Question $question, Reply $reply)
    {
        return new ResourceReply($reply);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, Reply $reply, Request $request)
    {
        $reply->update([
            'body' => $request->body,
            'question_id' => $request->question_id,
            'user_id' => $request->user_id
        ]);

        return response('Reply updated',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Model\Reply $reply
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Question $question,Reply $reply)
    {
        $reply->delete();

        return response('Reply deleted', 200);
    }
}
