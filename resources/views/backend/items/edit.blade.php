@extends('backend.layouts.app')
@section('title', 'Edit Item')
@section('contents')
    <hr />
    <form action="{{ route('backend.items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Gambar di kiri -->
            <div class="col-md-4">
                <img class="foto-preview img-fluid mb-3 " src="{{ asset('storage/img-items/' . $item->foto) }}"
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
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $item->name) }}">
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Condition</label>
                        <input type="text" name="condition" class="form-control @error('condition') is-invalid @enderror"
                            value="{{ old('condition', $item->condition) }}">
                        @error('condition')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="tersedia" {{ old('status', $item->status) == 'tersedia' ? 'selected' : '' }}>
                                Tersedia</option>
                            <option value="proses" {{ old('status', $item->status) == 'proses' ? 'selected' : '' }}>Proses
                            </option>
                            <option value="didonasikan"
                                {{ old('status', $item->status) == 'didonasikan' ? 'selected' : '' }}>Didonasikan
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $item->description) }}</textarea>
                    @error('description')
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
