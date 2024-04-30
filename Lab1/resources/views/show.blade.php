@extends('layouts.app')

@section('body')
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('images/iti/' . $post['image']) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $post['title'] }}</h5>
            <p class="card-text">{{ $post['body'] }}</p>
            <a href="{{ route('post.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
