@extends('backend.layouts.app')
@section('title', 'Create Category')
@section('contents')

    <hr />

    <form action="{{ route('backend.categories.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

@endsection
