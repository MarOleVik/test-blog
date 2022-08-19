@extends('dashboard.layouts.index');
@section('content')

    <!-- DIRECT CHAT -->
    <div class="card direct-chat direct-chat-primary">
        <div class="card-header">
            <h3 class="card-title">Direct Chat</h3>

{{--            <div class="card-tools">--}}
{{--                <span title="3 New Messages" class="badge badge-primary">3</span>--}}
{{--                <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
{{--                    <i class="fas fa-minus"></i>--}}
{{--                </button>--}}
{{--                <button type="button" class="btn btn-tool" title="Contacts"--}}
{{--                        data-widget="chat-pane-toggle">--}}
{{--                    <i class="fas fa-comments"></i>--}}
{{--                </button>--}}
{{--                <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
{{--                    <i class="fas fa-times"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages" style="height: 500px">

                @foreach($messages as $message)

                    @if($message->user_id == $active_user->id)
                        <!-- Message to the right -->
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-right">{{ $active_user->name }}</span>
                                    <span class="direct-chat-timestamp float-left">{{ $message->created_at }}</span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                <img class="direct-chat-img" src="dist/img/user3-128x128.jpg"
                                     alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    {{ $message->text }}
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->
                    @else
                        <!-- Message. Default to the left -->
                            <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left">{{ $companion_user->name }}</span>
                                    <span class="direct-chat-timestamp float-right">{{ $message->created_at }}</span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg"
                                     alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    {{ $message->text }}
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->
                    @endif

                @endforeach
            </div>
            <!--/.direct-chat-messages-->

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <form action="{{route('messages.store')}}" method="post">
                <div class="input-group">
                    @csrf()
                    <input type="text" name="text" placeholder="Type Message ..."
                           class="form-control">
                    <input type="hidden" name="to_user" value="{{$companion_user->id}}"/>
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-primary">Send</button>
                    </span>
                </div>
            </form>
        </div>
        <!-- /.card-footer-->
    </div>
    <!--/.direct-chat -->


@endsection
