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
                    @livewire("member",["group"=>$group])
                </div>
            </div>
        </div>
    </div>
@endsection
