@extends('layouts.app')

@section('body')
<form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>

    <div class="mb-3">
        <label class="form-label">Posted by</label>
        <select name="user" class="form-select">
            @foreach($users as $user)
                <option value="{{ $user->name}}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
