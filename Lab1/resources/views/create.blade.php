@extends('layouts.app')

@section('body')
<form>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" id="body" rows="3"></textarea>
    </div>

    <a href="{{ route('post.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection
