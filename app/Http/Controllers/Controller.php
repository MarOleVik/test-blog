<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $data = [];
    public $template = '';

    public function __construct()
    {

    }

    public function renderOutput(){
        $this->data['moderator'] = Auth::user()->is_moderator;
        $this->data['countMessages'] = Message::where('read', 0)->where('to_user', Auth::user()->id)->count();
        $this->data['messageUsers'] = Message::with('companionUser')->select('user_id')->where('read', 0)->where('to_user', Auth::user()->id)->groupBy('user_id')->get();
        return view($this->template, $this->data);
    }
}
