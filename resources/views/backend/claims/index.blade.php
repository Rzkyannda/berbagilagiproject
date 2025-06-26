@extends('backend.layouts.app')
@section('title', 'Claims')
@section('contents')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('backend.claims.create') }}" class="btn btn-success">+ Add New Claim</a>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Item</th>
                    <th>Claimed By</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Claim Date</th>
                    <th>Approval Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($claims as $claim)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $claim->item->name }}</td>
                        <td>{{ $claim->user->nama }}</td>
                        <td>{{ $claim->name }}</td>
                        <td>{{ $claim->email }}</td>
                        <td>{{ $claim->address }}</td>
                        <td>
                            @if ($claim->status == 'menunggu')
                                <span class="badge badge-warning"></i>
                                    menunggu</span>
                            @elseif($claim->status == 'disetujui')
                                <span class="badge badge-success"></i>
                                    Disetujui</span>
                            @elseif($claim->status == 'ditolak')
                                <span class="badge badge-warning"></i>
                                    Ditolak</span>
                            @endif
                        </td>
                        <td>{{ $claim->claimed_at ? $claim->claimed_at->format('d M Y H:i') : '-' }}</td>
                        <td>{{ $claim->approved_at ? $claim->approved_at->format('d M Y H:i') : '-' }}</td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('backend.claims.show', $claim->id) }}"
                                class="btn btn-sm btn-secondary">Detail</a>
                            <a href="{{ route('backend.claims.edit', $claim->id) }}"
                                class="btn btn-sm btn-warning">Edit</a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $claim->id }}">
                                Hapus
                            </button>

                            <div class="modal fade" id="deleteModal{{ $claim->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $claim->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success text-white">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $claim->id }}">Konfirmasi
                                                Hapus</h5>
                                        </div>
                                        <div class="modal-body">
                                            Apakah kamu yakin ingin menghapus
                                            <strong>{{ $claim->name }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('backend.claims.destroy', $claim->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-success">Ya, Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No claims found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
