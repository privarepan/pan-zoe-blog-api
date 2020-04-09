<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Replies;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicReplyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'content' => 'required|string|max:3000',
            'topic_id' => 'required|exists:topics,id',
            'pid' => 'nullable|exists:replies,id',
            'receive_id' => 'nullable|exists:users,id',
        ];
        $data = $request->validate($rule);
        $user = auth()->user();
        $topic = Topic::find($request->topic_id);
        $topic->increment('reply_count');
        $reply = $topic->Reply()->create([
            'send_id' => $user->id,
            'pid' => $request->get('pid',0),
            'receive_id' => $request->get('receive_id',0),
            'body' => $data['content']
        ]);
        $reply->load('User');
        return $this->success($reply);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::with('Reply.subset','User')->findOrFail($id);
        $replies = $topic->Reply;
        return $this->success($replies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rule = [
            'content' => 'required|string|max:3000',
        ];
        $data = $request->validate($rule);
        $reply = Replies::findOrFail($id);
        $this->authorize('update', $reply);
        $reply->update($data);
        return $this->success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = Replies::findOrFail($id);
        $this->authorize('delete', $reply);
        $reply->delete();
        return $this->success();
    }
}
