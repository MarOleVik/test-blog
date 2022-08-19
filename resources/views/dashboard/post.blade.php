@extends('dashboard.layouts.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{$action}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($actionType == 'edit')
                                @method('PUT')
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title"
                                           name="title" @isset($title) value="{{$title}}" @endisset>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Description</label>
                                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Description"
                                           name="description" @isset($description) value="{{$description}}" @endisset>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="customFile">Custom File</label> -->

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image" @isset($image) value="{{$image}}" @endisset>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="summernote">Text</label>
                                    <textarea id="summernote" name="text">
                                        @isset($text) {!! $text !!} @endisset
                                    </textarea>
                                </div>

                                <div class="form-check">
                                    <input type="hidden" class="form-check-input" id="exampleCheck1" name="type"
                                           value="0">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="type"
                                           value="1">
                                    <label class="form-check-label" for="exampleCheck1">Private post</label>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
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
