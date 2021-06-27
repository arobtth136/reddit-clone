<?php

namespace App\Http\Controllers;

use App\Communities;
use App\Community;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommunityController extends Controller
{

    public function join_community(Community $community){
        $community->users()->attach(\Auth::id(),[
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('communities.show', compact('community'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        if(\Auth::check()){
            return view('communities.create');
        }
        return view('errors.403');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if(\Auth::check()){
            $validated = $request->validate([
                'name' => 'required|min:3|max:255|unique:name',
                'icon' => 'required|max:255',
                'group_pick' => 'required|max:255'
            ]);
            $community = Community::create([
                'user_id' => \Auth::id(),
                'name' => $validated['name'],
                'icon' => $validated['icon'],
                'group_pick' => $validated['group_pick']
            ]);
            $community->users()->attach(\Auth::id());
            return redirect()->route('communities.show', compact('community'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Communities  $community
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Community $community)
    {
        return view('communities.show', compact('community'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Communities  $communities
     * @return \Illuminate\Http\Response
     */
    public function edit(Communities $communities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Communities  $communities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Communities $communities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Communities  $communities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Communities $communities)
    {
        //
    }
}
