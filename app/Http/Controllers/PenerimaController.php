<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 'penerima')->get();
        return view('backend.penerima.index', compact('users'));
    }

    // Tampilkan form create
    public function create()
    {
        // return view('backend.users.create');
    }

    // Simpan user baru
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|string|min:6',
        //     'phone' => 'nullable|string',
        //     'address' => 'nullable|string',
        //     'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        // ]);

        // if ($request->hasFile('foto')) {
        //     $filename = time() . '_' . uniqid() . '.' . $request->foto->getClientOriginalExtension();
        //     $request->foto->storeAs('public/img-users', $filename);
        //     $validated['foto'] = $filename;
        // }

        // $validated['password'] = Hash::make($validated['password']);
        // User::create($validated);

        // return redirect()->route('backend.users.index')->with('success', 'User berhasil ditambahkan.');
    }


    // Tampilkan detail user
    public function show(User $user)
    {
        return view('backend.penerima.show', compact('user'));
    }

    // Tampilkan form edit
    public function edit(User $user)
    {
        // return view('backend.users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, User $user)
    {
        // $validated = $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email,' . $user->id,
        //     'phone' => 'nullable|string',
        //     'address' => 'nullable|string',
        //     'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        //     'password' => 'nullable|string|min:6',
        // ]);

        // if ($request->hasFile('foto')) {
        //     $filename = time() . '_' . uniqid() . '.' . $request->foto->getClientOriginalExtension();
        //     $request->foto->storeAs('public/img-users', $filename);
        //     $validated['foto'] = $filename;
        // }

        // // Hapus foto lama jika ada
        // if ($user->foto) {
        //     Storage::delete('public/img-users/' . $user->foto);
        // }

        // if ($request->filled('password')) {
        //     $validated['password'] = Hash::make($request->password);
        // } else {
        //     unset($validated['password']);
        // }

        // $user->update($validated);

        // return redirect()->route('backend.users.index')->with('success', 'User berhasil diperbarui.');
    }


    // Hapus user
    public function destroy(User $user)
    {
        // if ($user->foto) {
        //     Storage::disk('public')->delete($user->foto);
        // }
        // $user->delete();

        // return redirect()->route('backend.users.index')->with('success', 'User berhasil dihapus.');
    }
}
