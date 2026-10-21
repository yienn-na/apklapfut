<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran - Sistem Reservasi Lapangan Futsal</title>
</head>
<body>

    <h2>Konfirmasi Pembayaran</h2>
    <hr>

    <!-- Menu Navigasi -->
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

    <h3>Tagihan Anda</h3>
    <p>Silakan melakukan pembayaran untuk jadwal booking yang telah dipilih.</p>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID Pembayaran</th>
            <th>ID Booking</th>
            <th>Metode Pembayaran</th>
            <th>Status Bayar</th>
            <th>Aksi</th>
        </tr>
        @foreach($bookings as $item)
        <tr>
            <td>PAY-00{{ $item->id }}</td>
            <td>BKG-00{{ $item->booking_id }}</td>
            <td>{{ $item->metode_pembayaran }}</td>
            <td>{{ $item->status_bayar }}</td>
            <td>
                <a href="/pembayaran/proses/{{ $item->id }}">Konfirmasi Bayar</a>
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>