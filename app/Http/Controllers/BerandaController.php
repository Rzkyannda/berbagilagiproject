<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Claim;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function beranda()
    {
        $items = Item::with(['category'])
            ->where('status', 'tersedia')
            ->inRandomOrder()
            ->take(2)
            ->get();
        return view('frontend.beranda.beranda', compact('items'));
    }
    public function items()
    {
        $items = Item::with('category', 'user')->where('status', 'tersedia')->get();
        return view('frontend.beranda.items', compact('items'));
    }

    public function formClaim($itemId)
    {
        $item = Item::findOrFail($itemId); // Ambil item berdasarkan ID
        return view('frontend.beranda.formClaim', compact('item'));
    }

    public function claimitems(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'receiver_id' => 'required|exists:users,id',
            'name' => 'required|string|max:250',
            'email' => 'required|email',
            'address' => 'required|string|max:250',
        ]);

        Claim::create([
            'item_id' => $request->item_id,
            'receiver_id' => $request->receiver_id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'status' => 'menunggu',
            'claimed_at' => now(),
        ]);

        // Update status item ke "proses"
        Item::where('id', $request->item_id)->update(['status' => 'proses']);

        return redirect()->back()->with('success', 'Claim berhasil dibuat.');
    }
    public function about()
    {
        return view('frontend.beranda.about');
    }
    public function history()
    {
        $claims = Claim::with(['item', 'user'])->latest()->get();
        return view('frontend.beranda.history', compact('claims'));
    }
    public function contact()
    {
        return view('frontend.beranda.contact');
    }
    public function contactStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'messages' => 'required|max:255|string',
        ]);

        $validatedData['sender_id'] = auth()->id();

        Message::create($validatedData);
        return redirect()->back()->with('success', 'Data Saved Successfully');
    }
}
