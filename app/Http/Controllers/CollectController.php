<?php

namespace App\Http\Controllers;

use App\Models\Collect;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class CollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $collect = $user->Collect;
        return $this->success($collect);
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
        Topic::findOrFail($id);
        $user = auth()->user();
        $collect = $user->Collect()->where('topic_id',$id)->first();
        if ($collect) {
            $collect->delete();
            return $this->success();
        }else{
            $collect = $user->Collect()->create([
                'topic_id' => $id,
            ]);
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
