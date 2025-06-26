@extends('frontend.layouts.app')
@section('link')
<link rel="stylesheet" href="{{ asset('admin_assets/css/history.css') }}">
@endsection
@section('content')

    <div class="request-list">
        <!-- Header -->
        <div class="request-header">
            <span>Gambar</span>
            <span>Nama</span>
            <span>Tanggal Acc</span>
            <span>Waktu Acc</span>
            <span>Claimed At</span>
            <span>Claimed By</span>
            <span>Status</span>
        </div>

        @foreach ($claims as $claim)
            <div class="request-card">
                <img src="{{ asset('storage/img-items/' . $claim->item->foto) }}" alt="Item" class="item-image">
                <div class="item-nama">{{ $claim->item->name }}</div>
                <div class="item-tanggal">{{ $claim->approved_at ? $claim->approved_at->format('d M Y') : '-' }}</div>
                <div class="item-waktu">{{ $claim->approved_at ? $claim->approved_at->format('H:i') : '-' }}</div>
                <div class="item-claimed-by">{{ $claim->claimed_at ? $claim->claimed_at->format('d M Y H:i') : '-' }}
                </div>
                <div class="item-claimed-by">{{ $claim->user->nama ?? '-' }}</div>
                <div class="item-status">
                    @if ($claim->status == 'menunggu')
                        <span class="badge badge-warning">Menunggu</span>
                    @elseif($claim->status == 'disetujui')
                        <span class="badge badge-success">Disetujui</span>
                    @elseif($claim->status == 'ditolak')
                        <span class="badge badge-danger">Ditolak</span>
                    @endif
                </div>
            </div>
        @endforeach

@endsection
