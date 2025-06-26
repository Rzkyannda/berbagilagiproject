<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Claim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimController extends Controller
{
    /**
     * Display a listing of the claims.
     */
    public function index()
    {
        $claims = Claim::with(['item', 'user'])->latest()->get();
        return view('backend.claims.index', compact('claims'));
    }

    /**
     * Show the form for creating a new claim.
     */
    public function create()
    {
        $items = Item::where('status', 'tersedia')->get(); // Donatur akan pilih item yang ingin diklaim
        $users = User::where('role', 'penerima')->get();


        return view('backend.claims.create', compact('items', 'users'));
    }

    /**
     * Store a newly created claim in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'receiver_id' => 'required|exists:users,id',
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250',
            'address' => 'required|string|max:250',
            'status' => 'required|in:menunggu,disetujui,ditolak',
        ]);

        $claim = Claim::create([
            'item_id' => $request->item_id,
            'receiver_id' => $request->receiver_id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'status' => $request->status,
            'claimed_at' => now(),
        ]);

        $claim->item->update([
            'status' => 'proses',
        ]);

        return redirect()->route('backend.claims.index')->with('success', 'Claim berhasil dibuat.');
    }



    /**
     * Display the specified claim.
     */
    public function show(Claim $claim)
    {
        return view('backend.claims.show', compact('claim'));
    }

    /**
     * Show the form for editing the specified claim.
     */
    public function edit(Claim $claim)
    {
        $items = Item::all();
        $users = User::where('role', 'penerima')->get();
        return view('backend.claims.edit', compact('claim', 'items', 'users'));
    }

    /**
     * Update the specified claim in storage.
     */
    public function update(Request $request, Claim $claim)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'status' => 'required|in:menunggu,disetujui,ditolak',
        ]);

        $claim->update([
            'item_id' => $request->item_id,
            'status' => $request->status,
            'approved_at' => in_array($request->status, ['disetujui', 'ditolak']) ? now()->toDateTimeString() : null,
        ]);

        if ($request->status === 'disetujui') {
            $claim->item->update([
                'status' => 'didonasikan',
            ]);
        }

        if ($request->status === 'ditolak') {
            $claim->item->update([
                'status' => 'tersedia',
            ]);
            $claim->delete();
        }

        return redirect()->route('backend.claims.index')->with('success', 'Claim berhasil diperbarui.');
    }
    public function destroy(Claim $claim)
    {
        $claim->delete();

        return redirect()->route('backend.claims.index')->with('success', 'Claim berhasil dihapus.');
    }
}
