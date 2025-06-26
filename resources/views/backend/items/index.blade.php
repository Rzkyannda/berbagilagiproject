@extends('backend.layouts.app')
@section('title', 'List Items')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('backend.items.create') }}" class="btn btn-success">Add Items</a>
    </div>

    <hr />
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
                    <th>No.</th>
                    <th>name</th>
                    <th>Category</th>
                    <th>Conditon</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($items->count() > 0)
                    @foreach ($items as $item)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $item->name }}</td>
                            <td class="align-middle">{{ $item->category->name ?? '-' }}</td>
                            <td class="align-middle">{{ $item->condition }}</td>
                            <td class="align-middle">{{ $item->user->address }}</td>
                            <td class="align-middle">
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
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Aksi">
                                    <a href="{{ route('backend.items.show', $item->id) }}"
                                        class="btn btn-secondary">Detail</a>
                                    <a href="{{ route('backend.items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <!-- Trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $item->id }}">
                                        Hapus
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success text-white">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">
                                                        Konfirmasi Hapus</h5>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah kamu yakin ingin menghapus barang
                                                    <strong>{{ $item->name }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('backend.items.destroy', $item->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-success">Ya, Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="7">Tidak ada data barang.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
