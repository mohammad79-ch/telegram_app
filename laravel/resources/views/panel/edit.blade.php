@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="d-flex">
                        <div class="card-header">{{ __('Panel') }}</div>
                        <div class="card-header"><a href="{{route("user.edit.update")}}">{{ __('Edit') }}</a></div>
                        <div class="card-header"><a href="{{route("user.messages")}}">{{ __('Messages') }}</a></div>

                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.edit') }}" enctype="multipart/form-data">
                            @csrf

                            <p style="font-weight: bold">
                                <img src="{{asset('assets/users/'.auth()->user()->image)}}" width="70" class="rounded" alt="">
                            </p>
                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$user->email) }}" disabled required autocomplete="email" autofocus>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$user->name) }}" name="name" required autocomplete="email" autofocus>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username',$user->username) }}" name="username" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="bio" class="col-md-4 col-form-label text-md-end">{{ __('Bio') }}</label>

                                <div class="col-md-6">
                                    <textarea name="bio" class="form-control @error('username') is-invalid @enderror"  id="bio" cols="30" rows="10">{{ old('username',$user->bio) }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
