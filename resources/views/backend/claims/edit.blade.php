@extends('backend.layouts.app')
@section('title', 'Edit Claim')

@section('contents')
    <hr />
    <form action="{{ route('backend.claims.update', $claim->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="item_id" class="form-label">Item</label>
                <select name="item_id" id="item_id" class="form-control" required>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}" {{ $claim->item_id == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="receiver_id" class="form-label">Receiver</label>
                <select name="receiver_id" id="receiver_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $claim->receiver_id == $user->id ? 'selected' : '' }}>
                            {{ $user->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}">
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="email" value="{{ $user->email }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" placeholder="address"
                    value="{{ $user->address }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="menunggu" {{ $claim->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="disetujui" {{ $claim->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="ditolak" {{ $claim->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="claimed_at" class="form-label">Claimed At</label>
                <input type="datetime-local" name="claimed_at" class="form-control"
                    value="{{ $claim->claimed_at ? $claim->claimed_at->format('Y-m-d\TH:i') : '' }}">
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
