@extends('backend.layouts.app')
@section('title', 'Show Penerima')
@section('contents')
    <hr />
    <div class="row">
        <!-- Gambar di kiri -->
        <div class="col-md-4">
            <img src="{{ $user->foto ? asset('storage/img-users/' . $user->foto) : asset('storage/img-users/profile.png') }}"
                class="foto-preview img-fluid mb-3" style="max-height: 250px; object-fit: cover;">
            <input type="file" name="foto" class="form-control" value="{{ $user->foto }}" disabled>
        </div>

        <!-- Form input di kanan -->
        <div class="col-md-8">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" name="nama" class="form-control" placeholder="nama" value="{{ $user->nama }}"
                        disabled>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" name="email" class="form-control" placeholder="Email"
                        value="{{ $user->email }}" readonly>
                </div>
                <div class="col-md-6">
                    <input type="text" name="phone" class="form-control" placeholder="Phone"
                        value="{{ $user->phone }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" name="address" class="form-control" placeholder="Address"
                        value="{{ $user->address }}" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <a href="{{ route('backend.penerima.index') }}" class="btn btn-success">back</a>
                </div>
            </div>
        </div>
    </div>
    </form>

@endsection
