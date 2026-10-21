<!DOCTYPE html>
<html>
<head>
    <title>Data Lapangan - Sistem Reservasi Lapangan Futsal</title>
</head>
<body>

    <h2>Data Lapangan Futsal</h2>
    <hr>

<p>
    <b>Menu:</b> 
    <a href="/dashboard">Dashboard</a> | 
    <a href="/lapangan">Data Lapangan</a> | 
    <a href="/booking">Booking</a> | 
    <a href="/pembayaran">Pembayaran</a> | 
    <a href="/riwayat">Riwayat Booking</a> | 
  <form action="/logout" method="POST" style="display: inline;">
        @csrf
          
    <button type="submit">Logout</button>
    </form>
</p>
    <hr>

    <h3>Daftar Lapangan Tersedia</h3>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Lapangan</th>
            <th>Jenis Rumput</th>
            <th>Harga per Jam</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>

        @forelse($lapangans as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->nama_lapangan }}</td>
            <td>{{ $item->jenis }}</td>
            <td>Rp {{ number_format($item->harga_per_jam, 0, ',', '.') }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>
                <a href="/booking"><button type="button">Booking</button></a>
                <a href="/lapangan/edit/{{ $item->id }}"><button type="button">Edit</button></a>
                <a href="/lapangan/hapus/{{ $item->id }}" onclick="return confirm('Yakin ingin menghapus?')"><button type="button">Hapus</button></a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" align="center">Belum ada data lapangan di database.</td>
        </tr>
        @endforelse
    </table>

</body>
</html>     