<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZanTopicController extends Controller
{
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
        //
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
        /**
         * @var $user User
         */
        $user = auth()->user();
        /**
         * @var $topic Topic
         */
        $topic = Topic::findOrFail($id);
        $zan = $topic->ZanWithUser()->first();
        return DB::transaction(function ()use($zan,$user,$topic) {
            if ($zan) {
                $zan->delete();
                $topic->decrement('zan_count');
                return $this->success();
            }else{
                $zan = $topic->Zan()->create(['user_id' =>auth()->id()]);
                $topic->increment('zan_count');
                return $this->success($zan);
            }
        });

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
