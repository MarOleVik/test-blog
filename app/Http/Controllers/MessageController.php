<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Message::insert($request->only('text', 'to_user') + [
            'user_id' => Auth::user()->id,
                'read' => 0,
            ]);

        return redirect()->route('messages.show', $request->to_user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['companion_user'] = User::find($id);
        $this->data['active_user'] = User::find(Auth::user()->id);
        $this->template = 'dashboard.message';
        $this->data['messages'] = Message::whereIn('user_id', [$id, Auth::user()->id])->whereIn('to_user', [$id, Auth::user()->id])->orderBy('created_at', 'ASC')->get();
        Message::where('to_user', Auth::user()->id)->where('user_id', $id)->update([
            'read' => 1,
        ]);
        return $this->renderOutput();
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
        //
    }
}
