
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Profile Info</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-3">
                            <img src="/storage/{{ $user->profile->image }}" class="w-100 rounded-circle">
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3"><strong>Name: </strong></div>
                                <div class="col-md-9">{{ $user->name }}</div>
                                <div class="col-md-3 mt-3"><strong>E-Mail: </strong></div>
                                <div class="col-md-9 mt-3">{{ $user->email }}</div>
                                <div class="col-md-3 mt-3"><strong>Title: </strong></div>
                                <div class="col-md-9 mt-3">{{ $user->profile->title }}</div>
                                <div class="col-md-3 mt-3"><strong>Description: </strong></div>
                                <div class="col-md-9 mt-3">{{ $user->profile->description }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
