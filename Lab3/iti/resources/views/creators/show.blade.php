@extends('layouts.app')

@section('content')
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <a href="{{ url()-> previous() }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
