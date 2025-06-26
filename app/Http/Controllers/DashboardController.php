<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Claim;
use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    // method untuk menampilkan halaman dashboard
    public function index()
    {
        $user = auth()->user(); // ambil user yang sedang login

        // hitung total user atau penerima yang ada di sistem/DB
        $totalUsersOrPenerima = $user->role === 'admin'
            ? User::count()
            : User::where('role', 'penerima')->count();
        // tampilkan halaman dashboard dengan mengirim data yang diperlukan
        return view('backend.dashboard.dashboard', [
            'totalUsersOrPenerima' => $totalUsersOrPenerima, // total user atau penerima yang ada di sistem
            'totalItems' => Item::count(), // total item yang ada di sistem
            'totalClaims' => Claim::count(), // total claim yang ada di sistem
            'totalMessages' => Message::count(), // total message/feedback yang diberikan
            'latestItems' => Item::with(['category', 'user'])->whereHas('user', function ($query) {
                $query->where('role', 'admin');
            })->latest()->take(5)->get(), // tampilkan 5 item terbaru yang diklaim oleh admin
        ]);
    }
}
