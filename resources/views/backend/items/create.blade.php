@extends('backend.layouts.app')
@section('title', 'Create Product')
@section('contents')
    <hr />
    <form action="{{ route('backend.items.store') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Name">
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            <option value="" selected>-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" name="condition" class="form-control @error('condition') is-invalid @enderror"
                            placeholder="Condition">
                        @error('condition')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <select class="form-control @error('status') is-invalid @enderror" name="status">
                            <option value="tersedia" selected>Tersedia</option>
                            <option value="proses">Proses</option>
                            <option value="didoonasikan">Didoonasikan</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description"
                        rows="3"></textarea>
                    @error('description')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </form>

@endsection
