@extends('frontend.layouts.app')
@section('link')
<link rel="stylesheet" href="{{ asset('admin_assets/css/home.css') }}">
@endsection
@section('content')

    <!-- Hero Section -->
    <section class="hero">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-left">
                    <img src="{{ asset('admin_assets/img/hero2.png') }}" alt="Hero 1">
                    <img src="{{ asset('admin_assets/img/hero1.png') }}" alt="Hero 2">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-right">
                    <h1>Kita Satu, Kita Peduli</h1>
                    <p>Wujudkan solidaritas dalam aksi nyata. <br>
                        Bantu saudara kita meraih kehidupan yang lebih baik.</p>
                    <form id="keluar-app" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <div class="social-buttons">
                        <a href="https://www.instagram.com/berbagi.lagi?igsh=MWs2eWYwZzgzaHhydQ==" target="_blank" class="social-btn instagram-btn">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                        <a href="https://wa.me/6283198935397" target="_blank" class="social-btn whatsapp-btn">
                            <i class="fab fa-whatsapp"></i>
                            <span>WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="produk-hero">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="produk-kiri">
                    <h1>Berbagi Baju, Merajut Rasa Peduli</h1>
                    <p>Semua orang layak merasa dihargai dan diperhatikan.</p>
                    <a href="{{ route('items') }}" class="lihat-btn">Lihat Semua > </a>
                </div>
            </div>

            
        @foreach ($items as $item)
            <div class="col-lg-4 col-md-6">
                <div class="produk-kanan">
                    <div class="produk-card">
                        <form method="POST" action="{{ route('itemsClaim') }}">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                            <img src="{{$item->foto}}" alt="Produk">
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
                                <p>{{ $item->description }}</p>
                                <a href="{{ route('claims.form', $item->id) }}" type="button">Ajukan Permintaan +</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </section>


    <section class="masukan-section">
        <div class="masukan-container">
            <h2 class="masukan-heading">Ada Masukan?</h2>
            <p class="masukan-subheading">Yuk, bantu kami jadi lebih baik lagi.</p>

            <div class="row">
                <div class="col-md-6">
                    <div class="testimoni-card">
                        <div class="user-info">
                            <img src="{{ asset('admin_assets/img/profile1.png') }}" alt="Jacob Jones" class="user-avatar">
                            <div>
                                <strong>Jacob Jones</strong><br>
                                <small>Donatur</small>
                            </div>
                        </div>
                        <p>“Senang sekali bisa ikut berbagi lewat platform ini. Prosesnya mudah dan saya yakin bantuan saya
                            sampai ke yang benar-benar membutuhkan.”</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="testimoni-card">
                        <div class="user-info">
                            <img src="{{ asset('admin_assets/img/profile2.png') }}" alt="Annette Black"
                                class="user-avatar">
                            <div>
                                <strong>Annette Black</strong><br>
                                <small>Penerima</small>
                            </div>
                        </div>
                        <p>“Kami tidak merasa dikasihani, justru merasa didukung. Terima kasih sudah membuat kami merasa
                            dihargai.”</p>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="testimoni-card">
                        <div class="user-info">
                            <img src="{{ asset('admin_assets/img/profile3.png') }}" alt="Jenny Wilson" class="user-avatar">
                            <div>
                                <strong>Jenny Wilson</strong><br>
                                <small>Penerima</small>
                            </div>
                        </div>
                        <p>“Baju-baju yang awalnya cuma tersimpan di lemari, sekarang punya arti baru. Terima kasih sudah
                            jadi jembatan kebaikan.”</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="testimoni-card">
                        <div class="user-info">
                            <img src="{{ asset('admin_assets/img/profile4.png') }}" alt="Robert Fox" class="user-avatar">
                            <div>
                                <strong>Robert Fox</strong><br>
                                <small>Penerima</small>
                            </div>
                        </div>
                        <p>“Bajunya bagus dan bersih, seperti kiriman dari teman dekat. Terima kasih sudah peduli.”</p>
                    </div>
                </div>
            </div>
            <a href="{{ route('contact') }}" class="btn-masukan">Beri Masukan</a>
        </div>
    </section>
@endsection
