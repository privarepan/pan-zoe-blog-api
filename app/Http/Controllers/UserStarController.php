<?php

namespace App\Http\Controllers;

use App\Models\Star;
use App\Models\User;
use Illuminate\Http\Request;

class UserStarController extends Controller
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
        $stars = Star::whereUserId($id)->with('Star')->latest()->paginate();
        return $this->success($stars);
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
        User::findOrFail($id);
        $user = auth()->user();
        $star = $user->Star()->where('star_id',$id)->first();
        if ($star) {
            $star->delete();
            return $this->success();
        }else {
            $star = $user->Star()->create([
                'star_id' => $id,
            ]);
            $star->unsetRelation('Star')->unsetRelation('Fans');
            return $this->success($star);
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

    public function check($user_id,$target_id)
    {
        $star = Star::whereUserId($user_id)->whereStarId($target_id)->first();
        return $this->success($star);
    }
}
