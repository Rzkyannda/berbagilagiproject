@extends('backend.layouts.app')
@section('title', 'Show Category')
@section('contents')
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $category->name }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                value="{{ $category->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                value="{{ $category->updated_at }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('backend.categories.index') }}" class="btn btn-warning">back</a>
        </div>
    </div>
@endsection
