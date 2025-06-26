@extends('backend.layouts.app')
@section('title', 'Dashboard')

@section('contents')
    <div class="row">
        <!-- Total Users / Penerima -->
        <div class="col-md-3">
            <div class="card border-left-primary shadow-sm mb-4">
                <div class="card-body">
                    <h6 class="text-muted">Total Users / Penerima</h6>
                    <h4>{{ $totalUsersOrPenerima }}</h4>
                </div>
            </div>
        </div>


        <!-- Total Items -->
        <div class="col-md-3">
            <div class="card border-left-success shadow-sm mb-4">
                <div class="card-body">
                    <h6 class="text-muted">Total Items</h6>
                    <h4>{{ $totalItems }}</h4>
                </div>
            </div>
        </div>

        <!-- Total Claims -->
        <div class="col-md-3">
            <div class="card border-left-warning shadow-sm mb-4">
                <div class="card-body">
                    <h6 class="text-muted">Total Claims</h6>
                    <h4>{{ $totalClaims }}</h4>
                </div>
            </div>
        </div>

        <!-- Total Messages -->
        <div class="col-md-3">
            <div class="card border-left-danger shadow-sm mb-4">
                <div class="card-body">
                    <h6 class="text-muted">Total Messages</h6>
                    <h4>{{ $totalMessages }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Items -->
    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>Latest Items</strong>
            <a href="{{ route('backend.items.index') }}" class="btn btn-sm btn-primary">View All</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Donatur</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($latestItems as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>
                                    @if ($item->status == 'tersedia')
                                        <span class="badge badge-primary"></i>
                                            Tersedia</span>
                                    @elseif($item->status == 'proses')
                                        <span class="badge badge-warning"></i>
                                            Proses</span>
                                    @elseif($item->status == 'didonasikan')
                                        <span class="badge badge-success"></i>
                                            Didonasikan</span>
                                    @endif
                                </td>
                                <td>{{ $item->user->nama ?? '-' }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No data available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
