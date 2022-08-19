<?php

namespace App\Http\Controllers\Auth;

use App\Models\Country;
use App\Http\Controllers\Controller;
use Nnjeim\World\World;

class RegisterStep2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        $countries = World::countries([
            'fields' => 'id, name',
        ])->data;
        return view('auth.register_step2', compact('countries'));
    }

    public function postForm()
    {
        auth()->user()->update(request()->only(['birthday', 'gender', 'country_id', 'city']));
        return redirect()->route('home');
    }


}
