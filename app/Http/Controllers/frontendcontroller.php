<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\category;
use App\Models\forum;
use App\Models\discussion;
use App\Models\user;

class frontendcontroller extends Controller
{
    Public function index(){

       $user = new User;
       $userOnline = $user->allOnline();
       $forumsCount = count(Forum::all());
       $categoriesCount = count(Category::all());
       $topicsCount = count(discussion::all());
       $membersCount = count(user::all());
       $newest = user::latest()->first()->name;
       $categories = category::latest()->get();
       return view('welcome', \compact('categories', 'forumsCount', 'topicsCount', 'newest', 'membersCount', 'categoriesCount', 'userOnline'  ));
    }

    Public function overview($id){
        $categories = category::find($id);
        $user = new User;
        $userOnline = $user->allOnline();
        $forumsCount = count(Forum::all());
        $categoriesCount = count(Category::all());
        $topicsCount = count(discussion::all());
        $membersCount = count(user::all());
        $newest = user::latest()->first()->name;
        // $categories = category::latest()->get();
        return view('client.category-overview', \compact('categories', 'forumsCount', 'topicsCount', 'newest', 'membersCount', 'categoriesCount', 'userOnline'));

    }

    public function forumOverview($id){
        $forum = forum::find($id);
        return view('client.forum-overview', \compact('forum'));
    }
}
