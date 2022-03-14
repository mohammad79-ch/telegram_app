@extends('layouts.app')

@section('content')
    <style>
        .box_messages{
            width: 50%;
            height: 400px;
            border-radius: 10px;
            margin: 0 auto;
            background: #fff;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
        }
        .box_messages .messages{
            width: 100%;
            height: 90%;
            background: rgba(230,255,255,0.5);
        }

        .box_messages .form_sender {
            width: 100%;
            height: 10%;
        }

        .box_messages #messages_sender_user{
            width: 100%;
            height: 100%;
            border-color:#ccc;
            border-radius: 15px;
            background: #fff;
            padding: 15px;
            outline: none;
        }
        .messages_sender_user_box{
            position: relative;
        }
        .messages_sender_user_box button{
            position: absolute;
            right: 10px;
            top: 10px;
        }

    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                   <div class="d-flex">
                        @auth
                        @include("panel.menu-panel")
                       @endauth
                   </div>

                    <div class="card-body">
                        <div class="profile">
                            <br>
                            <br>
                            <br>
                            @auth
                                <div class="box_messages">
                                    <div class="messages">
                                        <ul style="list-style: none;text-align: right;padding: 10px">
                                            @foreach($messages as $message)
                                            <li>
                                                <img src="{{asset('assets/users/'.$message->user->image)}}" width="40" class="rounded" alt="">
                                                <a href="{{route('user.show.single.message',['user'=>$message->user->id])}}" style="font-weight: bold">{{$message->text}} -- {{$message->user->name}}  </a>
                                            </li>

                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
