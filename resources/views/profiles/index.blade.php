@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-3">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle p-3 w-100">
        </div>

        <div class="col-9">
            <div class="d-flex justify-content-between align-items-baseline">

                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username }}</div>

                    @can('delete', $user->profile)
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endcan
                </div>

                @can('update', $user->profile)
                <a href="/p/create">Add New Post</a>
                @endcan

            </div>

            @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5">
                    <a href="/followers/{{ $user->id }}">
                        <strong>{{ $followersCount }}</strong> followers
                    </a>
                </div>
                <div class="pr-5">
                    <a href="/following/{{ $user->id }}">
                        <strong>{{ $followingCount }}</strong> following
                    </a>
                </div>
            </div>

            <div class="pt-4">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>

        </div>

    </div>

    <div class="row pt-5">

        @foreach($user->posts as $post)
        <div class="col-4 p-3">
            <a href="/p/{{ $post->id }}">
                <img class="w-100" src="/storage/{{ $post->image }}">
            </a>
        </div>
        @endforeach

    </div>

</div>
@endsection