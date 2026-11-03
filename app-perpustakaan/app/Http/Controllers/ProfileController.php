<?php

namespace App\Http\Controllers;

use App\Models\User; // 1. Tambahkan import Model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil
     */
    public function show()
    {
        $user = Auth::user();
        return view('profil.index', compact('user'));
    }

    /**
     * Memproses perubahan password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ], [
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok.',
            'new_password.min'       => 'Password baru minimal 8 karakter.',
            'old_password.required'  => 'Password lama wajib diisi.',
        ]);

        $user = User::findOrFail(Auth::id());

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Password lama yang Anda masukkan salah.']);
        }
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password berhasil diubah.');
    }
}
