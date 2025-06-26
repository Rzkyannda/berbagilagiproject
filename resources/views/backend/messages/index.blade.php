@extends('backend.layouts.app')
@section('title', 'List Contacts')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('backend.messages.create') }}" class="btn btn-success">Add Messages</a>
    </div>

    <hr />
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-success">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Messages</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if ($messages->count() > 0)
                @foreach ($messages as $message)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $message->name }}</td>
                        <td class="align-middle">{{ $message->email }}</td>
                        <td class="align-middle">{{ $message->messages }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('backend.messages.show', $message->id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                                <a href="{{ route('backend.messages.edit', $message->id) }}" type="button"
                                    class="btn btn-warning">Edit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $message->id }}">
                                    Hapus
                                </button>

                                <div class="modal fade" id="deleteModal{{ $message->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $message->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success text-white">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $message->id }}">Konfirmasi
                                                    Hapus</h5>
                                            </div>
                                            <div class="modal-body">
                                                Apakah kamu yakin ingin menghapus barang
                                                <strong>{{ $message->name }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('backend.messages.destroy', $message->id) }}"
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
                    <td class="text-center" colspan="5">Message not found</td>
                </tr>

            @endif
        </tbody>
    </table>
@endsection
