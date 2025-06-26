<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                 aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                               placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        @php
            use App\Models\Claim;
            $notifikasiKlaim = Claim::with('item', 'user')
                ->where('status', 'menunggu')
                ->latest()
                ->take(5)
                ->get();
            $jumlahNotifikasi = $notifikasiKlaim->count();
        @endphp

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                @if ($jumlahNotifikasi > 0)
                    <span class="badge badge-danger badge-counter">{{ $jumlahNotifikasi }}</span>
                @endif
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">Klaim Menunggu Persetujuan</h6>

                @forelse($notifikasiKlaim as $notif)
                    <a class="dropdown-item d-flex align-items-center"
                       href="{{ route('backend.claims.show', $notif->id) }}">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-box text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">{{ $notif->claimed_at->format('d M Y') }}</div>
                            <span class="font-weight-bold">
                                Item "{{ $notif->item->name }}" diklaim oleh {{ $notif->user->nama }}
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="dropdown-item text-gray-500 text-center">Tidak ada klaim baru</div>
                @endforelse

                <a class="dropdown-item text-center small text-gray-500" href="{{ route('backend.claims.index') }}">
                    Lihat Semua Klaim
                </a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        @if (Auth::check())
            @php
                $user = Auth::user();
                $defaultFoto = 'https://txrmelvkuiqbcgzkznzy.supabase.co/storage/v1/object/public/user-profile//img-default.jpg';
                $foto = $user->foto ?: $defaultFoto;
            @endphp
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        {{ $user->nama }}<br>
                        <small>{{ $user->role }}</small>
                    </span>
                    <img class="img-profile rounded-circle" src="{{ $foto }}">
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('backend.profile.show') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"
                       onclick="event.preventDefault(); document.getElementById('keluar-app').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                    <form id="keluar-app" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endif

    </ul>
</nav>
