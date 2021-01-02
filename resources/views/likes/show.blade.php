@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Me Gusta</h1>

    <div class="row d-flex pt-2">
        @foreach($post->likes as $likes)
        <div class="col-8 pt-3">
            <img class="rounded-circle" src="{{ $likes->profile->profileImage() }}" style="max-width: 40px">
            {{ $likes->username }}
        </div>
        @endforeach
    </div>

</div>
@endsection