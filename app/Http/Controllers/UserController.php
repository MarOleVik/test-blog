<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->template = 'dashboard.users';
        $this->data['users'] = User::all();
        return $this->renderOutput();
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)->update(['status' => 1]);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->update(['status' => 0]);
        return redirect()->route('users.index');
    }
}
