@extends('frontend.layouts.app')
@section('link')
<link rel="stylesheet" href="{{ asset('admin_assets/css/contact.css') }}">
@endsection
@section('content')
   
    <section class="contact-section">
        <div class="contact-container">
            <h1>Hubungi Kami</h1>
            <p>Punya pertanyaan, saran, atau ingin berdonasi? Kami siap membantu Anda.</p>

            <div class="contact-info">
                <a href="#" class="contact-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="contact-icon"><i class="fab fa-facebook"></i></a>
                <a href="#" class="contact-icon"><i class="fab fa-whatsapp"></i></a>
                <a href="#" class="contact-icon"><i class="fab fa-youtube"></i></a>
            </div>

            <form action="{{ route('contactStore') }}" method="POST" class="feedback-form">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="messages">Kritik dan Saran</label>
                    <textarea id="messages" name="messages" rows="5" required></textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </section>

@endsection