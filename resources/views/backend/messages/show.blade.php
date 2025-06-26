@extends('backend.layouts.app')
@section('title', 'Show Messaages')
@section('contents')
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $message->name }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Created At" value="{{ $message->email }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Messages</label>
            <textarea name="description" class="form-control" rows="3" readonly>{{ old('description', $message->messages) }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <a href="{{ route('backend.messages.index') }}" class="btn btn-warning">back</a>
        </div>
    </div>
@endsection
