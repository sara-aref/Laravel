@extends('layouts.app')

@section('content')
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('images/posts/' . $post->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">Posted by: {{ $post->creator->name }}</p>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        </div>
    </div>

@endsection
