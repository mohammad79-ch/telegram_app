@extends('layouts.app')

@section('content')
    <style>
        .box_messages{
            width: 60%;
            height: auto;
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
                       <div class="card-header">{{ __('Profile') }}</div>
                        @auth
                           <div class="card-header">
                               <a href="">{{ __('New channel') }}</a>
                           </div>
                           <div class="card-header">
                               <a href="">{{ __('New group') }}</a>
                           </div>
                        @endauth
                   </div>

                    <div class="card-body">
                        <div class="profile">
                            <br>
                            <br>
                            <br>
                            @auth
                              @livewire("message",["user"=>$user])
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
