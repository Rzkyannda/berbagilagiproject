@extends('frontend.layouts.app')
@section('link')
<link rel="stylesheet" href="{{ asset('admin_assets/css/about.css') }}">
@endsection
@section('content')

    <!-- Body Content -->
    <main class="about-page">
        <section class="hero-section">
            <div class="hero-content">
                <h2>Siapa Kami?</h2>
                <p>Kami adalah komunitas yang percaya bahwa kebaikan bisa dimulai dari hal-hal sederhana—seperti berbagi
                    barang yang tak lagi terpakai, tapi masih penuh arti.</p>
            </div>
        </section>

        <section class="section two-column">
            <div class="row align-items-center">
                <div class="col-md-6 col-xl-7">
                    <div class="image text-center">
                        <img src="{{ asset('admin_assets/img/tentang1.png') }}" alt="Relawan">
                    </div>
                </div>
                <div class="col-md-6 col-xl-5">
                    <div class="text">
                        <h3>Mengapa Kami Bergerak</h3>
                        <p>Kami hadir untuk mempertemukan kebaikan hati mereka yang ingin membantu, kesulitan yang dihadapi
                            mereka yang membutuhkan, dengan sistem distribusi berbagi yang transparan, empati, dan mudah diakses
                            berbagai kalangan.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section two-column reverse">
            <div class="row align-items-center">
                <div class="col-lg-6 mt-3">
                    <div class="text">
                        <h3>Cara Kami Menyalurkan Donasi</h3>
                        <div class="donation-step">
                            <img src="{{ asset('admin_assets/icons/step-1.png') }}" alt="Step 1">
                            <div class="step-text">
                                <strong>Terima Donasi</strong>
                                <p>Barang dikumpulkan dari donatur melalui drop-off atau pengambilan.</p>
                            </div>
                        </div>

                        <div class="donation-step">
                            <img src="{{ asset('admin_assets/icons/step-2.png') }}" alt="Step 2">
                            <div class="step-text">
                                <strong>Sortir & Cek Kualitas</strong>
                                <p>Hanya barang layak pakai yang akan disalurkan.</p>
                            </div>
                        </div>

                        <div class="donation-step">
                            <img src="{{ asset('admin_assets/icons/step-3.png') }}" alt="Step 3">
                            <div class="step-text">
                                <strong>Pilah Sesuai Kebutuhan</strong>
                                <p>Barang dikategorikan berdasarkan jenis dan penerima.</p>
                            </div>
                        </div>

                        <div class="donation-step">
                            <img src="{{ asset('admin_assets/icons/step-4.png') }}" alt="Step 4">
                            <div class="step-text">
                                <strong>Salurkan ke Penerima</strong>
                                <p>Didistribusikan melalui mitra atau langsung ke penerima.</p>
                            </div>
                        </div>

                        <div class="donation-step">
                            <img src="{{ asset('admin_assets/icons/step-5.png') }}" alt="Step 5">
                            <div class="step-text">
                                <strong>Laporan & Evaluasi</strong>
                                <p>Kami dokumentasikan dan terus perbaiki setiap prosesnya.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4">
                    <div class="image text-center">
                        <img src="{{ asset('admin_assets/img/tentang1.png') }}" alt="Relawan">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
