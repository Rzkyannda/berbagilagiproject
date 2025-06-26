@extends('backend.layouts.app')
@section('title', 'Edit Message')
@section('contents')
    <hr>
    <form action="{{ route('backend.messages.update', $message->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <input type="text" name="name" value="{{ $message->name }}"
                class="form-control @error('name') is-invalid @enderror" placeholder="Name">
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="email" name="email" value="{{ $message->email }}"
                class="form-control @error('email') is-invalid @enderror" placeholder="Email">
            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <textarea name="messages" rows="4" class="form-control @error('messages') is-invalid @enderror">{{ $message->messages }}</textarea>
            @error('messages')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
