<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\forum;
use App\Models\discussion;
use App\Models\category;

class DashboardController extends Controller
{
    public function home()
    {
        $users = user::latest()->paginate(15);
        $forums = forum::latest()->paginate(15);
        $discussions = discussion::latest()->paginate(15);
        $categories = category::latest()->paginate(15);
         return view('admin.pages.home', compact('users', 'forums', 'discussions', 'categories'));
     }
    
     public function show($id)
     {
        $user = user::find($id);
        $latest_user_post = $user->topic()->latest()->first();
        $latest = Discussion::latest()->first();
        return view('admin.pages.user', compact('user', 'latest_user_post', 'latest'));


     }

     Public function users()
     {
      $users = user::latest()->paginate();
      return view('admin.pages.users', compact('users'));


     }
     public function destroy($id)
     {
        $users = user::find($id);
        $users->delete();
        toastr()->info('User deleted successfully');
        return back();
     }
}
