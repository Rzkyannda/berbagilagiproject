<div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
            </div>
            <div class="modal-body">
                Apakah kamu yakin ingin menghapus barang <strong>{{ $item->name }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('backend.items.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-success">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
