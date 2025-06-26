@extends('frontend.layouts.app')
@section('link')
<link rel="stylesheet" href="{{ asset('admin_assets/css/items.css') }}">
@endsection
@section('content')

    <!-- Sub Category Tabs -->
    <div class="sub-category">
        <button class="tab active" data-category="semua">Semua</button>
        <button class="tab" data-category="baju">Baju</button>
        <button class="tab" data-category="celana">Celana</button>
        <button class="tab" data-category="jacket">jacket</button>
        <button class="tab" data-category="sepatu">Sepatu</button>
        <button class="tab" data-category="sandal">Sandal</button>
    </div>


    <!-- Produk Wrapper + Grid -->
    <div class="produk-wrapper">
        <div class="produk-container">
            @foreach ($items as $item)
                <div class="produk-card baju">
                    {{-- <form action="{{ route('itemsClaim', $item->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}"> --}}
                    <img src="{{ $item->foto }}" alt="Produk">
                    <div class="produk-info">
                        <h3>{{ $item->category->name }} - {{ $item->name }}</h3>
                        <p>
                            @if ($item->status == 'tersedia')
                                <span>Tersedia</span>
                            @elseif($item->status == 'proses')
                                <span>Proses</span>
                            @elseif($item->status == 'didonasikan')
                                <span>Didonasikan</span>
                            @endif | {{ $item->condition }}
                        </p>
                        <div class="button-group">
                            {{-- <a href="https://wa.me/{{ $item->user->phone }}" target="_blank" aria-label="WhatsApp"
                                    class="wa-button">
                                    <i class="fab fa-whatsapp"></i>
                                </a> --}}
                            <a type="button" href="{{ route('claims.form', $item->id) }}">Ajukan Permintaan +</a>
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
            @endforeach

        </div>
    </div>

@section('script')
<script src="{{ asset('admin_assets/js/filter.js') }}"></script>
@endsection
@endsection

