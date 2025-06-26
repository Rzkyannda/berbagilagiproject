@extends('backend.layouts.app')
@section('title', 'Create Users')
@section('contents')
    <hr />
    <form action="{{ route('backend.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Gambar di kiri -->
            <div class="col-md-4">
                <img class="foto-preview img-fluid mb-3" style="max-height: 250px; object-fit: cover;">
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                    onchange="previewFoto()">
                @error('foto')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Form input di kanan -->
            <div class="col-md-8">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            placeholder="Nama" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <select class="form-control @error('status') is-invalid @enderror" name="role">
                            <option value="penerima" selected>Penerima</option>
                            <option value="donatur">Donatur</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            placeholder="Phone" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address"
                        rows="3">{{ old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
@endsection
