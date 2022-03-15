@extends('layouts.app')

@section('content')
    <style>
        .groups_count {
            font-weight: bold;
            margin: 10px;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            background: #0a58ca;
            color: white;
            text-align: center;
            text-decoration: none;
        }
        .groups_count:hover{
            color: #fff;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="d-flex">
                        @auth
                            @include("panel.menu-panel")
                        @endauth
                    </div>
                    <div class="card-body">
                    @foreach($groups as $group)
                                <div class="groups d-flex">
                                    <img src="{{asset('assets/groups/'.$group->profile)}}" width="40" alt="">
                                    <a href="{{route('user.groups.show',['group'=>$group->id])}}" style="font-weight: bold;margin: 10px" >{{$group->name}}</a>
                                    <a  class="groups_count">{{$group->users()->count() + 1}}</a>

                                </div>
                            <hr>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
