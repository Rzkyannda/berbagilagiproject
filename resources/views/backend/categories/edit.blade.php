@extends('backend.layouts.app')
@section('title', 'Edit Category')
@section('contents')

    <hr />
    <form action="{{ route('backend.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $category->name }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
