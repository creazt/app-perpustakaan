@extends('layouts.app')

@section('content')
    <h1>Tambah Anggota Baru</h1>
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

    <form action="{{ route('members.store') }}" method="POST" style="max-width: 500px;">
        @csrf
        <label for="nama" style="display: block; margin-top: 12px; font-weight: bold;">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" style="width: 100%; padding: 6px; margin-top: 4px;">
        @error('nama') <div style="color: #b91c1c; font-size: 14px;">{{ $message }}</div> @enderror

        <label for="nim" style="display: block; margin-top: 12px; font-weight: bold;">NIM</label>
        <input type="text" name="nim" id="nim" value="{{ old('nim') }}" style="width: 100%; padding: 6px; margin-top: 4px;">
        @error('nim') <div style="color: #b91c1c; font-size: 14px;">{{ $message }}</div> @enderror

        <label for="email" style="display: block; margin-top: 12px; font-weight: bold;">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" style="width: 100%; padding: 6px; margin-top: 4px;">
        @error('email') <div style="color: #b91c1c; font-size: 14px;">{{ $message }}</div> @enderror

        <label for="nomor_telepon" style="display: block; margin-top: 12px; font-weight: bold;">Nomor Telepon</label>
        <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon') }}" style="width: 100%; padding: 6px; margin-top: 4px;">
        @error('nomor_telepon') <div style="color: #b91c1c; font-size: 14px;">{{ $message }}</div> @enderror

        <label for="alamat" style="display: block; margin-top: 12px; font-weight: bold;">Alamat</label>
        <textarea name="alamat" id="alamat" rows="4" style="width: 100%; padding: 6px; margin-top: 4px;">{{ old('alamat') }}</textarea>
        @error('alamat') <div style="color: #b91c1c; font-size: 14px;">{{ $message }}</div> @enderror

        <label for="status" style="display: block; margin-top: 12px; font-weight: bold;">Status</label>
        <select name="status" id="status" style="width: 100%; padding: 6px; margin-top: 4px;">
            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </select>
        @error('status') <div style="color: #b91c1c; font-size: 14px;">{{ $message }}</div> @enderror

        <button type="submit" style="margin-top: 20px; padding: 8px 16px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
    </form>
@endsection