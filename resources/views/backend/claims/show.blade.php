@extends('backend.layouts.app')
@section('title', 'Detail Claim')

@section('contents')
    <hr />
    <div class="row mb-3">
        <div class="col-md-6">
            <strong>Item:</strong> {{ $claim->item->name }}
        </div>
        <div class="col-md-6">
            <strong>Receiver:</strong> {{ $claim->user->nama }}
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <strong>Status:</strong> {{ ucfirst($claim->status) }}
        </div>
        <div class="col-md-6">
            <strong>Claimed At:</strong>
            {{ $claim->claimed_at ? $claim->claimed_at->format('d M Y H:i') : '-' }}
        </div>
    </div>

    @if ($claim->approved_at)
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Approved At:</strong>
                {{ $claim->approved_at->format('d M Y H:i') }}
            </div>
        </div>
    @endif

    <a href="{{ route('backend.claims.index') }}" class="btn btn-secondary">Back</a>
@endsection
