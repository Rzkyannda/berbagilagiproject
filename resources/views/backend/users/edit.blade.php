@extends('backend.layouts.app')
@section('title', 'Edit Users')
@section('contents')
    <hr />
    <form action="{{ route('backend.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Gambar di kiri -->
            <div class="col-md-4">
                <img class="foto-preview img-fluid mb-3" src="{{ asset('storage/img-users/' . $user->foto) }}"
                    style="max-height: 250px; object-fit: cover; object-position: center;">

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
                        <label class="form-label">Name</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama', $user->nama) }}">
                        @error('nama')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">phone</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $user->phone) }}">
                        @error('phone')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                            value="{{ old('address', $user->address) }}">
                        @error('address')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </div>
            </div>
    </form>

    {{-- <script>
        function previewFoto() {
            const input = document.querySelector('input[name="foto"]');
            const imgPreview = document.querySelector('.foto-preview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = e => {
                    imgPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script> --}}
@endsection
