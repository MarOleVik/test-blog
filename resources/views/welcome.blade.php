@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-6">
            @foreach($posts as $post)
                <div class="col-12" style="
                            border: solid #ccc 1px;
                            border-radius: 5px;
                            margin: 10px;
                            padding: 10px;
                            background-color: white;
"               >
                    <div class="row">
                        <div class="col-2">{{$post->created_at}}</div>
                        <div class="col-6">
                            <h2><a href="{{route('show_posts.show', $post->id)}}">{{$post->title}}</a></h2>
                            <div>{{$post->description}}</div>
                        </div>
                        <div class="col-4">
                            <img src="{{$post->image}}" height="150">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

