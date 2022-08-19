<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Auth;
use Storage;

class PostController extends Controller
{
    const STATUSES = [
        0 => 'edit',
        1 => 'moderating',
        2 => 'moderated',
        3 => 'rejected',
        4 => 'blocked',
    ];
    const TYPES = [
        0 => 'public',
        1 => 'private',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->template = 'dashboard.posts';
        if(Auth::user()->is_moderator){
            $this->data['posts'] = Post::where('status', 1)->get();
        } else {
            $this->data['posts'] = Post::where('user_id', Auth::user()->id)->get();

        }
        $this->data['statuses'] = $this::STATUSES;
        $this->data['types'] = $this::TYPES;

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->template = 'dashboard.post';
        $this->data['action'] = route('posts.store');
        $this->data['actionType'] = 'create';

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Storage::putFile('public/images', $request->file('image'));
        $data = $request->only(['title', 'description', 'text', 'type',]) + [
                'user_id' => Auth::id(),
                'status' => 0,
                'image' => $request->file('image')->hashName(),
            ];
        $post = Post::insert($data);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->template = 'dashboard.post';
        $this->data = Post::find($id);
        $this->data['action'] = route('posts.update', $id);
        $this->data['actionType'] = 'edit';
        return $this->renderOutput();
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
        $data = $request->only(['title', 'description', 'text', 'type']);
        if($request->files->count()){
            Storage::putFile('public/images', $request->file('image'));
            $data['image'] = $request->file('image')->hashName();
        }
        Post::where('id', $id)->update($data);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect(route('posts.index'));
    }

    public function changeStatus($post_id, $status){
        Post::where('id', $post_id)->update([
            'status' => $status
        ]);
        return redirect(route('posts.index'));
    }
}
