@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
<h1>Daftar Peminjaman</h1>
<p><a href="{{ route('loans.create') }}" class="btn">+ Tambah Peminjaman</a></p>

@if(session('success'))
<div style="background: #dcfce7; color: #166534; padding: 10px; margin-bottom: 10px; border-radius: 4px;">
    {{ session('success') }}
</div>
@endif

<table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background: #f1f5f9;">
            <th>ID</th>
            <th>Anggota</th>
            <th>Petugas</th>
            <th>Buku</th>
            <th>Tgl Pinjam</th>
            <th>Tgl Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($loans as $loan)
        <tr>
            <td>{{ $loan->id }}</td>
            <td>{{ $loan->member->nama }}</td>
            <td>{{ $loan->user->name }}</td>
            <td>
                @foreach ($loan->loanItems as $item)
                    {{ $item->book->judul }}@if (!$loop->last), @endif
                @endforeach
            </td>
            <td>{{ $loan->tanggal_pinjam }}</td>
            <td>{{ $loan->tanggal_kembali }}</td>
            <td>
                @if($loan->status == 'dikembalikan')
                    <span style="color: green; font-weight: bold;">Dikembalikan</span>
                @elseif($loan->status == 'terlambat')
                    <span style="color: red; font-weight: bold;">Terlambat</span>
                @else
                    <span style="color: orange; font-weight: bold;">Dipinjam</span>
                @endif
            </td>
            <td>
                <a href="{{ route('loans.show', $loan->id) }}">Detail</a> |
                <a href="{{ route('loans.edit', $loan->id) }}">Edit</a> |
                
                <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>

                @if ($loan->status === 'dipinjam')
                |
                <form action="{{ route('loans.kembalikan', $loan->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; color:#059669; cursor:pointer; text-decoration:underline; padding:0;">Kembalikan</button>
                </form>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" style="text-align: center;">Belum ada data peminjaman.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div style="margin-top: 20px;">
    {{ $loans->links() }}
</div>
@endsection