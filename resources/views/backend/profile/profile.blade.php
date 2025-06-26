@extends('backend.layouts.app')

@section('title', 'Profile')

@section('contents')
    <hr />

    <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile</h4>
                    <a href="{{ route('backend.profile.edit') }}" class="btn btn-sm btn-primary">Edit Profil</a>
                </div>

                {{-- Foto Profil --}}
                @php
                    $defaultFoto = 'https://txrmelvkuiqbcgzkznzy.supabase.co/storage/v1/object/public/user-profile//img-default.jpg';
                    $foto = $user->foto ?: $defaultFoto;
                @endphp

                <div class="text-center mb-3">
                    <img 
                        src="{{ $foto }}"
                        class="rounded-circle"
                        style="width: 150px; height: 150px; object-fit: cover; object-position: center;"
                        alt="Foto Profil">
                </div>
                
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Nama</label>
                        <input type="text" class="form-control" value="{{ $user->nama }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Email</label>
                        <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Phone</label>
                        <input type="text" class="form-control" value="{{ $user->phone }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Alamat</label>
                        <input type="text" class="form-control" value="{{ $user->address }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
