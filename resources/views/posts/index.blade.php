@extends('layouts.app')

@section('content')
<div class="container">

    @foreach($posts as $post)

    <div class="row">
        <div class="col-6 offset-3">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3 pt-2 pb-4">
            <div>

                <hr style="margin-bottom: 0.2rem">

                <p class="pt-1 mb-1"><span class="font-weight-bold"><a href="/profile/{{ $post->user->id }}"> <span class="text-dark">{{ $post->user->username }}</span></a></span> {{ $post->caption }}</p>

                @if($post->likes->count())
                <div>
                    <a href="/like/{{ $post->id }}"><span class="badge badge-primary p-2">{{ $post->likes->count() }}</span> Me gusta</a>
                </div>
                @endif

                <comment-section user-id={{ auth()->user()->id }} post-id={{ $post->id }}></comment-section>

            </div>
        </div>
    </div>

    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-center">
            {{ $posts->links() }}
        </div>
    </div>

</div>
@endsection