@extends('layouts.app')

@section('content')
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
                        <div class="user-item d-flex">
                            <p style="font-weight: bold">
                                <img src="{{asset('assets/users/'.auth()->user()->image)}}" width="70" class="rounded" alt="">
                            </p>
                        </div>
                        <div class="user-item d-flex">
                            <p>Name : </p>
                            <p style="font-weight: bold">{{auth()->user()->name}}</p>
                        </div>
                        <div class="user-item d-flex">
                            <p>Email : </p>
                            <p  style="font-weight: bold">{{auth()->user()->email}}</p>
                        </div>
                        <div class="user-item d-flex">
                            <p>Username : </p>
                            <p  style="font-weight: bold">{{auth()->user()->username}}</p>
                        </div>
                        <div class="user-item d-flex">
                            <p>Bio : </p>
                            <p  style="font-weight: bold">{{auth()->user()->bio}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
