@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <h1>Profil Pengguna</h1>

    {{-- Pesan Sukses --}}
    @if(session('success'))
    <div style="background: #dcfce7; color: #166534; padding: 12px; border-radius: 4px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
    @endif

    {{-- Kartu Informasi Akun --}}
    <div style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; margin-bottom: 24px; background: #fff;">
        <h2 style="margin-top: 0; font-size: 18px; border-bottom: 1px solid #e2e8f0; padding-bottom: 10px;">Informasi Akun</h2>
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
    </div>

    {{-- Form Ganti Password --}}
    <div style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; background: #fff;">
        <h2 style="margin-top: 0; font-size: 18px; border-bottom: 1px solid #e2e8f0; padding-bottom: 10px;">Ganti Password</h2>

        <form action="{{ route('profil.password') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Password Lama -->
            <div style="margin-bottom: 16px;">
                <label for="old_password" style="display:block; font-weight:bold; margin-bottom:4px;">Password Lama</label>
                <input type="password" name="old_password" id="old_password" required
                    style="width:100%; padding:8px; box-sizing:border-box; border:1px solid #ccc; border-radius:4px;">
                @error('old_password')
                <span style="color:#b91c1c; font-size:14px;">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Baru -->
            <div style="margin-bottom: 16px;">
                <label for="new_password" style="display:block; font-weight:bold; margin-bottom:4px;">Password Baru</label>
                <input type="password" name="new_password" id="new_password" required minlength="8"
                    style="width:100%; padding:8px; box-sizing:border-box; border:1px solid #ccc; border-radius:4px;">
                @error('new_password')
                <span style="color:#b91c1c; font-size:14px;">{{ $message }}</span>
                @enderror
            </div>

            <!-- Konfirmasi Password Baru -->
            <div style="margin-bottom: 16px;">
                <label for="new_password_confirmation" style="display:block; font-weight:bold; margin-bottom:4px;">Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" required minlength="8"
                    style="width:100%; padding:8px; box-sizing:border-box; border:1px solid #ccc; border-radius:4px;">
            </div>

            <button type="submit" style="background:#2563eb; color:#fff; padding:10px 20px; border:none; border-radius:4px; cursor:pointer; font-size:15px;">
                Simpan Password Baru
            </button>
        </form>
    </div>
</div>
@endsection