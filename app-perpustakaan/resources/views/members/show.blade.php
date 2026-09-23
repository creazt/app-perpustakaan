<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Anggota</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        table { border-collapse: collapse; margin-top: 20px; width: 100%; max-width: 600px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { width: 30%; background-color: #f9fafb; }
    </style>
</head>
<body>
    <h1>Detail Anggota</h1>
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

    <table>
        <tr><th>ID</th><td>{{ $member['id'] }}</td></tr>
        <tr><th>Nama</th><td>{{ $member['nama'] }}</td></tr>
        <tr><th>NIM</th><td>{{ $member['nim'] }}</td></tr>
        <tr><th>Email</th><td>{{ $member['email'] }}</td></tr>
        <tr><th>Nomor Telepon</th><td>{{ $member['nomor_telepon'] }}</td></tr>
        <tr><th>Alamat</th><td>{{ $member['alamat'] }}</td></tr>
        <tr><th>Status</th><td>{{ ucfirst($member['status']) }}</td></tr>
    </table>
</body>
</html>