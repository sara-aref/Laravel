@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="mb-3">
        <label class="form-label">Posted by</label>
        <select name="creator_id" class="form-select">
            @foreach($creators as $creator)
                <option value="{{ $creator->id }}" {{ $post->creator_id == $creator->id ? 'selected' : '' }}>
                    {{ $creator->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
