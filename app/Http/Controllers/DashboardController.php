<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $userPost =Auth::user()->posts; // delete_at == Null
        $userTrashedPosts =Auth::user()->posts()->onlyTrashed()->get(); //delete_at != null
        return view('dashboard',compact('userPost', 'userTrashedPosts'));
    }
}
