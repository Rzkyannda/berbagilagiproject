<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // buat method untuk form register
    public function register()
    {
        return view('auth.register'); // buat view untuk tampilkan halaman register
    }

    // buat method untuk submit form register yg diisi user
    public function registerSave(Request $request)
    {
        // buat validasi
        Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ])->validate();

        // buat user baru dan masukkan ke DB
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        // redirect ke halaman login setelah register berhasil
        return redirect()->route('login');
    }

    // buat method untuk halaman login
    public function login()
    {
        return view('auth.login'); // buat view untuk tampilkan halaman login
    }

    // buat method untuk submit form login yg diisi oleh user
    public function loginAction(Request $request)
    {
        // buat validasi
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        // buat login
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        // buat session
        $request->session()->regenerate();

        $user = Auth::user();

        // Redirect sesuai role (jika admin ke dashboard dan jika penerima ke beranda/frontend)
        if ($user->role === 'admin') {
            return redirect()->route('backend.dashboard');
        } else {
            return redirect()->route('beranda');
        }
    }

    // buat method untuk logout
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
