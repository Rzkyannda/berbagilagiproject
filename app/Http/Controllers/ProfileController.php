<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('backend.profile.profile', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('backend.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $request->validate([
            'nama' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoUrl = $user->foto;

        // Jika ada file baru
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $bucket = 'user-profile';
            $projectUrl = env('SUPABASE_PROJECT_URL');
            $serviceRole = env('SUPABASE_SERVICE_ROLE');

            $response = Http::withToken($serviceRole)
                ->attach('file', file_get_contents($file), $filename)
                ->post("$projectUrl/storage/v1/object/$bucket/$filename");

            if ($response->successful()) {
                $fotoUrl = "$projectUrl/storage/v1/object/public/$bucket/$filename";
            } else {
                return back()->with('error', 'Upload foto gagal: ' . $response->body());
            }
        }

        $user->update([
            'nama' => $request->nama,
            'phone' => $request->phone,
            'address' => $request->address,
            'foto' => $fotoUrl,
        ]);

        return redirect()->route('backend.profile.show')->with('success', 'Profil berhasil diperbarui.');
    }

    public function uploadFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|max:2048',
        ]);

        $file = $request->file('foto');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $bucket = 'user-profile';
        $projectUrl = env('SUPABASE_PROJECT_URL');
        $serviceRole = env('SUPABASE_SERVICE_ROLE');

        // Upload ke Supabase Storage
        $response = Http::withToken($serviceRole)
            ->attach('file', file_get_contents($file), $filename)
            ->post("$projectUrl/storage/v1/object/$bucket/$filename");

        if ($response->successful()) {
            $url = "$projectUrl/storage/v1/object/public/$bucket/$filename";

            // Simpan URL ke database
            $user = User::findOrFail(auth()->id());
            $user->foto = $url;
            $user->save();
            return redirect()->route('backend.profile.show')->with('success', 'Profil berhasil diperbarui.');
        }
    }
}
