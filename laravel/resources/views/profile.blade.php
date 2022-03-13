@extends('layouts.app')

@section('content')
    <style>
        .box_messages{
            width: 50%;
            height: 60px;
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
                                <div class="user-box">
                                    <a href="{{route('user.profile',['username'=>$user->username])}}">
                                        <div class="d-flex justify-content-between">
                                         <div class="left-box d-flex">
                                             <img src="{{asset('assets/users/'.$user->image)}}" class="rounded" width="70" alt="">
                                             <p style="margin: 20px;font-weight: bold">{{$user->name}} - {{$user->username}}</p>
                                         </div>
                                        </div>
                                    </a>
                                </div>
                            <br>
                            <br>
                            <br>
                            @auth
                                <div class="box_messages">
{{--                                    <div class="messages">--}}
{{--                                        <ul style="list-style: none;text-align: right;padding: 10px">--}}
{{--                                            @foreach($finals as $final)--}}
{{--                                            <li>{{$final->text}} - <span style="font-weight: bold">{{$final->user->name}}</span></li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
                                    <div class="form_sender">
                                        <form action="{{route('user.send.message',['user'=>$user->id])}}" method="post">
                                            @csrf
                                            <div class="form-group messages_sender_user_box">
                                                <input type="text"  id="messages_sender_user" name="text" placeholder="Type something ...">
                                                <button type="submit" class="btn btn-warning btn-sm">Send</button>
                                            </div>
                                        </form>
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
