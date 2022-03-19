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
                        <form method="POST" action="{{ route('user.group.update',['group'=>$group->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="row mb-3">
                                <label for="profile" class="col-md-4 col-form-label text-md-end">{{ __('Profile') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="profile" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="email" value="{{$group->name}}" autofocus>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="unique_id" class="col-md-4 col-form-label text-md-end">{{ __('ID') }}</label>

                                <div class="col-md-6">
                                    <input id="unique_id" type="text" class="form-control @error('unique_id') is-invalid @enderror" name="unique_id" value="{{$group->unique_id}}" required autocomplete="unique_id" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="unique_id" class="col-md-4 col-form-label text-md-end">{{ __('Chat History') }}</label>

                                <div class="col-md-6">
                                    <select name="chat_history" id="" class="form-control">
                                        <option @if($group->chat_history == "visible") selected @endif value="visible">Visible</option>
                                        <option @if($group->chat_history == "hidden") selected @endif value="hidden">Hidden</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="desc" class="col-md-4 col-form-label text-md-end">{{ __('desc') }}</label>

                                <div class="col-md-6">
                                    <textarea name="desc" class="form-control @error('desc') is-invalid @enderror"  id="desc" cols="30" rows="10">{{$group->desc}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Group') }}
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
