<?php

namespace App\Http\Controllers;

use App\Models\Collect;
use App\Models\Topic;
use Illuminate\Http\Request;

class UserCollectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only('update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collects = Collect::whereUserId($id)
            ->latest()
            ->with('Topic.Tag', 'User')
            ->paginate();
        return $this->success($collects);
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
        $topic = Topic::findOrFail($id);
        $user = auth()->user();
        $collect = $user->Collect()->where('topic_id',$id)->first();
        if ($collect) {
            $collect->delete();
            $topic->decrement('collect_count');
            return $this->success();
        }else{
            $collect = $user->Collect()->create([
                'topic_id' => $id,
            ]);
            $topic->increment('collect_count');
            return $this->success($collect);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
