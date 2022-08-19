<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class MainController extends Controller
{
    public function index(){
        $data['posts'] = Auth::check() ? Post::where('status', 2)->get() : Post::where('type', 1)->where('status', 2)->get();
        return view('welcome', $data);
    }
}
