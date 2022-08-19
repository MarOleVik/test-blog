@extends('dashboard.layouts.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Posts</h3>
                            @if(!$moderator)
                                <div style="display: inline-block;float: right;" class="btn-group">
                                    <a href="{{route('posts.create')}}" class="btn btn-block btn-success btn-sm"><i class="fa fa-plus-circle"></i></a>
                                </div>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Created_At</th>
                                    <th>Updated_At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>
                                            <div class="img-thumbnail text-center">
                                                <img  height="100" src="{{ 'storage/images/' . $post->image}}"/>
                                            </div>
                                        </td>
                                        <td>{{$post->title}}</td>
                                        <td>
                                            @switch($post->type)
                                                @case(0)
                                                    <div class="btn btn-primary btn-sm">{{$types[0]}}</div>
                                                @break
                                                @case(1)
                                                    <div class="btn btn-danger btn-sm">{{$types[1]}}</div>
                                                @break
                                            @endswitch

                                        </td>
                                        <td>
                                            @switch($post->status)
                                                @case(0)
                                                <div class="btn btn-success btn-sm">{{$statuses[0]}}</div>
                                                @break
                                                @case(1)
                                                <div class="btn btn-secondary btn-sm">{{$statuses[1]}}</div>
                                                @break
                                                @case(2)
                                                <div class="btn btn-info btn-sm">{{$statuses[2]}}</div>
                                                @break
                                                @case(3)
                                                <div class="btn btn-danger btn-sm">{{$statuses[3]}}</div>
                                                @break
                                            @endswitch
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($post->created_at)->format('Y-m-d')}}</td>
                                        <td>{{\Carbon\Carbon::parse($post->updated_at)->format('Y-m-d')}}</td>
                                        <td>
                                            @if($moderator)
                                                <div class="btn-group">
                                                    <form action="{{route('posts.status', [$post->id, 2])}}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-info btn-sm" title="Accept"><i class="fa fa-check-circle"></i></button>
                                                    </form>
                                                    <form action="{{route('posts.status', [$post->id, 3])}}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning btn-sm" title="Disaccept"><i class="fa fa-minus"></i></button>
                                                    </form>
                                                    <form action="{{route('posts.status', [$post->id, 4])}}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Block"><i class="fa fa-times-circle"></i></button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="btn-group">
                                                    @if(in_array($post->status, [0, 3]))
                                                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-pen-fancy"></i></a>
                                                        <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-minus-circle"></i></button>
                                                        </form>
                                                        <form action="{{route('posts.status', [$post->id, 1])}}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success btn-sm" title="Moderate"><i class="fa fa-arrow-circle-up"></i></button>
                                                        </form>
                                                    @endif
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Created_At</th>
                                    <th>Updated_At</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')

@endsection
