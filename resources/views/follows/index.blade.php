@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Seguidores</h1>

    <div class="row d-flex pt-2">
        @foreach($user->profile->followers as $follower)
        <div class="col-8 pt-3">
            <img class="rounded-circle" src="{{ $follower->profile->profileImage() }}" style="max-width: 40px">
            {{ $follower->username }}
        </div>
        @endforeach
    </div>

</div>
@endsection