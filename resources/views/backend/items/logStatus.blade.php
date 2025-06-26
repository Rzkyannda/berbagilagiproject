@extends('backend.layouts.app')

@section('title', 'Item Status Logs')

@section('contents')
    <div class="d-flex justify-content-between align-items-center mb-3">
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Item</th>
                    <th>Status</th>
                    <th>Changed At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($logs as $log)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $log->item->name ?? '-' }}</td>
                        <td class="text-capitalize">
                            @if ($log->item->status == 'tersedia')
                                <span class="badge badge-primary"></i>
                                    Tersedia</span>
                            @elseif($log->item->status == 'proses')
                                <span class="badge badge-warning"></i>
                                    Proses</span>
                            @elseif($log->item->status == 'didonasikan')
                                <span class="badge badge-success"></i>
                                    Didonasikan</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($log->changed_at)->format('d M Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No logs found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
