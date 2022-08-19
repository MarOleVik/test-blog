@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card card-primary" style="
                            border: solid #ccc 1px;
                            border-radius: 5px;
                            margin: 10px;
                            padding: 10px;
                            background-color: white;
">
                    <h2>{{$title}}</h2>
                    <div>{{$created_at}}</div>
                    <img src="{{ $image}}" height="500">
                    <div>{!! $text !!}</div>

                </div>
                @auth
                    @if(auth()->user()->id != $user_id)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Написать автору</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="/sendMessage">
                                @csrf
                                <input type="hidden" name="post_id" value="{{$id}}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Сообщение</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="message"></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Написать</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    @endif
                @endauth
            </div>
        </div>
    </div>
    </div>

@endsection

