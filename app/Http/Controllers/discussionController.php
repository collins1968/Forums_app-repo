<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\forum;
use App\Models\discussion;
use App\Models\discussionReply;


class discussionController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $forums = forum::latest()->get();
        $forum = forum::find($id);
        return view('client.topic-new',  \compact('forums', 'forum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notify = 0;
        if ($request->notify && $request->notify = "on"){
            $notify = 1; }
        
            $topic = new discussion;

            $topic->title = $request->title;
            $topic->desc = $request->desc;
            $topic->forum_id = $request->forum_id;
            $topic->user_id = auth()->id();
            $topic->notify = $notify;

            $topic->save();
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
        $topic = discussion::find($id);
         
        if ($topic){
            $topic->increment('views', 1);
        }
        return view('client.topic', \compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = discussionReply::find($id);
        $reply->delete();
        toastr()->info('Reply deleted successfully');
        return back();
    }
    Public function del($id)
    {
        $discussion = discussion::find($id);
        $discussion->delete();
        toastr()->success('Reply deleted successfully');
        return back();
    }

    Public function reply(Request $request, $id)
    {
        $reply = new discussionReply;
        $reply->desc = $request->desc;
        $reply->user_id = auth()->id();
        $reply->discussion_id = $id;

        $reply->save();
        toastr()->success('Reply saved successfully');
        return back();
         
    }
}
