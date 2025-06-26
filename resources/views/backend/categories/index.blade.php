@extends('backend.layouts.app')
@section('title', 'List Category')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('backend.categories.create') }}" class="btn btn-success">Add Category</a>
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
                <th>Category Name</th>
                {{-- <th>Price</th>
                <th>Product Code</th>
                <th>Description</th>
                 --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if ($categories->count() > 0)
                @foreach ($categories as $category)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $category->name }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('backend.categories.show', $category->id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                                <a href="{{ route('backend.categories.edit', $category->id) }}" type="button"
                                    class="btn btn-warning">Edit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $category->id }}">
                                    Hapus
                                </button>

                                <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success text-white">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $category->id }}">Konfirmasi
                                                    Hapus</h5>
                                            </div>
                                            <div class="modal-body">
                                                Apakah kamu yakin ingin menghapus barang
                                                <strong>{{ $category->name }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('backend.categories.destroy', $category->id) }}"
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
                    <td class="text-center" colspan="5">Category not found</td>
                </tr>

            @endif
        </tbody>
    </table>
@endsection
