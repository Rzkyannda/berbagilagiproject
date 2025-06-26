@extends('backend.layouts.app')
@section('title', 'Show item')
@section('contents')
    <hr />
    <div class="row">
        <!-- Gambar di kiri -->
        <div class="col-md-4">
            <img src="{{ asset('storage/img-items/' . $item->foto) }}" class="foto-preview img-fluid mb-3"
                style="max-height: 250px; object-fit: cover;">
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                value="{{ $item->foto }}" disabled>
        </div>

        <!-- Form input di kanan -->
        <div class="col-md-8">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Name" value="{{ $item->name }}" disabled>
                </div>
                <div class="col-md-6">
                    <select name="category_id" class="form-control" disabled>
                        <option value="" selected> - Select Category - </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" name="condition" class="form-control" placeholder="condition"
                        value="{{ $item->condition }}" readonly>
                </div>
                <div class="col-md-6">
                    <input type="text" name="address" class="form-control" placeholder="Address"
                        value="{{ $item->address }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="number" name="phone" class="form-control" placeholder="phone"
                        value="{{ $item->phone }}" readonly>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" value="{{ ucfirst($item->status) }}" readonly>
                </div>

            </div>

            <div class="mb-3">
                <textarea class="form-control" name="description" placeholder="Descriptoin" readonly>{{ $item->description }}</textarea>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <a href="{{ route('backend.items.index') }}" class="btn btn-success">back</a>
                </div>
            </div>
        </div>
    </div>
    </form>

@endsection
