@extends('backend.layouts.app')

@section('title', 'Edit Profile')

@section('contents')
    <hr />

    <form action="{{ route('backend.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Edit Profile</h4>
                        <a href="{{ route('backend.profile.show') }}" class="btn btn-sm btn-secondary">Kembali</a>
                    </div>

                    {{-- Foto Profil --}}
                    @php
                        $defaultFoto = 'https://txrmelvkuiqbcgzkznzy.supabase.co/storage/v1/object/public/user-profile//img-default.jpg';
                        $foto = $user->foto ?: $defaultFoto;
                    @endphp
                    <div class="text-center mb-3">
                       <img src="{{ Auth::user()->foto }}" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover; object-position: center;" alt="Foto Profil">
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $user->nama }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Alamat</label>
                            <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                        </div>
                    </div>

                    {{-- Upload Foto --}}
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Foto Baru (jika ingin ganti)</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
