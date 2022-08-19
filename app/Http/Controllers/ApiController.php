<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Message;
use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class ApiController extends Controller
{
    public function sendMessage(){
        $user_id = Post::find(request('post_id'))['user_id'];
        Message::insert([
            'user_id' => Auth::id(),
            'to_user' => $user_id,
            'text' => request('message'),
        ]);

        Contact::insert([
           'user_id' => $user_id,
           'contact_id' => Auth::id()
        ]);
        return redirect('/');
    }
}
