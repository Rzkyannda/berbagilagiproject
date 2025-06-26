@extends('backend.layouts.app')
@section('title', 'Create Message')
@section('contents')
    <hr>
    <form action="{{ route('backend.messages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Email">
            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <textarea name="messages" rows="4" class="form-control @error('messages') is-invalid @enderror"
                placeholder="Your message"></textarea>
            @error('messages')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
