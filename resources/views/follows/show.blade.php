@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Seguidos</h1>

    <div class="row d-flex pt-2">
        @foreach($user->following as $follower)
        <div class="col-8 pt-3">
            <img class="rounded-circle" src="{{ $follower->profileImage() }}" style="max-width: 40px">
            {{ $follower->user->username }}
        </div>
        @endforeach
    </div>

</div>
@endsection