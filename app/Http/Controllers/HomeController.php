<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\discussion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latest_user_post = auth()->user()->topic()->latest()->first();
        $latest = Discussion::latest()->first(); 
        return view('home', compact('latest_user_post', 'latest'));
        // return view ('home');
    }
}
