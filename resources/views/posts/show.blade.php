@extends('layouts.app')

@section('content')
<div class="container">

   <div class="row">
      <div class="col-8">
         <img src="/storage/{{ $post->image }}" class="w-100">
      </div>
      <div class="col-4">
         <div>

            <div class="d-flex align-items-center">
               <div class="pr-3">
                  <a href="/profile/{{ $post->user->id }}">
                     <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 40px">
                  </a>
               </div>
               <div>
                  <div class="font-weight-bold d-flex">
                     <a href="/profile/{{ $post->user->id }}" class="pr-3">
                        <span class="text-dark">{{ $post->user->username }}</span>
                     </a>
                     |
                     @can('delete', $post->user->profile)
                     <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button>
                     @endcan
                  </div>
               </div>
            </div>

            <hr>

            <p class="pt-2 mb-0"><span class="font-weight-bold"><a href="/profile/{{ $post->user->id }}"> <span class="text-dark">{{ $post->user->username }}</span></a></span> {{ $post->caption }}</p>

            <div class="pb-3">
               <small>{{ $post->created_at }}</small>
            </div>

            <like-button user-id="{{ $post->id }}" likes="{{ $likes }}"></like-button>

            @if($post->likes->count())
            <div class="pt-2">
               <a href="/like/{{ $post->id }}">{{ $post->likes->count() }} Me gusta</a>
            </div>
            @endif

         </div>
      </div>
   </div>

</div>
@endsection