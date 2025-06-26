<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BerbagiLagi - Ajukan Permintaan</title>

    {{-- Bootstrap & Font Awesome --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('admin_assets/css/home.css') }}">
</head>

<body>
    <div class="container py-5">
        {{-- Alert --}}
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <div class="row justify-content-center align-items-start">
            {{-- Kolom Gambar Item --}}
            <div class="col-lg-5 mb-4">
                <div class="card shadow h-100">
                    <img src="{{ $item->foto }}" class="card-img-top img-fluid"
                        alt="{{ $item->name }}" style="object-fit: contain; object-position: center; height: 300px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="mb-1"><strong>Kategori:</strong> {{ $item->category->name }}</p>
                        <p class="mb-1"><strong>Kondisi:</strong> {{ $item->condition }}</p>
                        <p><strong>Status:</strong>
                            <span
                                class="badge bg-{{ $item->status == 'tersedia' ? 'success' : ($item->status == 'proses' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            {{-- Kolom Form --}}
            <div class="col-lg-7">
                <div class="card shadow p-4">
                    <h3 class="mb-4 text-center">Formulir Pengajuan</h3>

                    <form action="{{ route('itemsClaim') }}" method="POST">
                        @csrf

                        {{-- Hidden --}}
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <input type="hidden" name="receiver_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="status" value="menunggu">

                        {{-- Nama --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Penerima</label>
                            <input type="text" name="name" class="form-control" required>
                            @error('name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Penerima</label>
                            <input type="email" name="email" class="form-control" required>
                            @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Alamat --}}
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat Lengkap</label>
                            <textarea name="address" class="form-control" rows="3" required></textarea>
                            @error('address')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Ajukan Permintaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="footer mt-5 bg-light text-center py-4 border-top">
        <div class="container">
            <img src="{{ asset('admin_assets/img/logo_berbagilagi.png') }}" alt="Logo BerbagiLagi" width="120"
                class="mb-2">
            <p class="text-muted mb-2">BerbagiLagi adalah platform untuk berbagi kebutuhan kepada yang membutuhkan.</p>

            <div class="footer-socials d-flex justify-content-center gap-3 fs-5">
                <a href="#" class="text-dark" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-dark" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-dark" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                <a href="#" class="text-dark" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </footer>
</body>

</html>
