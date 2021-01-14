@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/profile/{{ $user->id }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="row">

            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit Profile</h1>
                </div>

                <div class="form-group row">

                    <label for="title" class="col-md-4 col-form-label pl-0">Title</label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">

                    <label for="description" class="col-md-4 col-form-label pl-0">Description</label>
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">

                    <label for="url" class="col-md-4 col-form-label pl-0">URL</label>
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>

                    @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label pl-0">Profile Image</label>

                    <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="name">

                    @error('image')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group row mb-0">
                    <button type="submit" class="btn btn-primary">
                        Save Profile
                    </button>
                </div>

            </div>
        </div>


    </form>
</div>
@endsection