<?php

namespace App\Http\Controllers;

use App\Models\Star;
use App\Models\User;
use Illuminate\Http\Request;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $stars = $user->Star()->with('StarUser')->paginate();
        return $this->success($stars);
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
}
