<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Forum;
use App\Models\user;
use App\Notifications\NewForum;
use Illuminate\Support\Facades\Session;


class forumcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = forum::all();
        return view('admin.pages.forums', \compact('forums') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::latest()->get();
        return view('admin.pages.new_forum', \compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        forum::create($request->all());

        $LatestForum = forum::latest()->first();
        $admins = User::where('is_admin', 1)->get();
        foreach($admins as $admin){
        $admin->notify(new NewForum($LatestForum));
        }

        session::flash('message', 'forum created successfully');
        session::flash('alert-class', 'alert-success');

        return back();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forums = forum::find($id);
        $categories = category::latest()->get();
        return view('admin.pages.edit_forum', \compact('forums', 'categories'));
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
        $forums = forum::find($id);
        $forums->update($request->all());
        session::flash('message', 'forum updated successfully');
        session::flash('alert-class', 'alert-success');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forums = forum::find($id);
        $forums->delete();
        session::flash('message', 'forum deleted successfully');
        session::flash('alert-class', 'alert-success');
        return back();

    }
}
