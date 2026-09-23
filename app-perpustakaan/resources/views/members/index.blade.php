@extends('layouts.app')

@section('content')
<h1>Daftar Anggota</h1>

<a href="{{ route('members.create') }}">+ Tambah Anggota</a>

<div class="search-bar" style="margin: 20px 0;">
    <form action="{{ route('members.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari nama anggota..." value="{{ request('search') }}" style="padding: 6px; width: 250px;">
        <button type="submit" style="padding: 6px 12px;">Cari</button>
        @if(request('search'))
        <a href="{{ route('members.index') }}">Reset</a>
        @endif
    </form>
</div>

<table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
    <thead>
        <tr>
            <th style="border: 1px solid #ccc; padding: 10px; text-align: left;">NIM</th>
            <th style="border: 1px solid #ccc; padding: 10px; text-align: left;">Nama</th>
            <th style="border: 1px solid #ccc; padding: 10px; text-align: left;">Email</th>
            <th style="border: 1px solid #ccc; padding: 10px; text-align: left;">Status</th>
            <th style="border: 1px solid #ccc; padding: 10px; text-align: left;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($members as $member)
        <tr>
            <td style="border: 1px solid #ccc; padding: 10px;">{{ $member->nim }}</td>
            <td style="border: 1px solid #ccc; padding: 10px;">{{ $member->nama }}</td>
            <td style="border: 1px solid #ccc; padding: 10px;">{{ $member->email }}</td>
            <td style="border: 1px solid #ccc; padding: 10px;">{{ ucfirst($member->status) }}</td>
            <td style="border: 1px solid #ccc; padding: 10px;">
                <a href="{{ route('members.show', $member->id) }}">Detail</a> |
                <a href="{{ route('members.edit', $member->id) }}">Edit</a> |
                <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background:none; border:none; color:red; cursor:pointer; padding:0; text-decoration:underline;">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" style="text-align: center; border: 1px solid #ccc; padding: 10px;">Tidak ada data anggota ditemukan.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div style="margin-top: 20px;">
    {{ $members->appends(request()->query())->links() }}
</div>
@endsection