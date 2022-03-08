@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">
                        <form>
                            <input type="text" name="search" class="form-control mb-2" placeholder="Search for ...">
                            <input type="submit" class="btn btn-primary" value="Search">
                        </form>
                        <br>
                        <br>

                        <div class="users">
                            @foreach($users as $user)
                            <div class="user-box">
                                <a href="{{route('user.profile',['username'=>$user->username])}}">
                                    <div class="d-flex">
                                        <img src="{{asset('assets/users/'.$user->image)}}" class="rounded" width="70" alt="">
                                        <p style="margin: 20px;font-weight: bold">{{$user->name}} - {{$user->username}}</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
