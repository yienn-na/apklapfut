<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Booking - Sistem Reservasi Lapangan Futsal</title>
</head>
<body>

    <h2>Riwayat Transaksi & Booking</h2>
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

    <h3>Riwayat Pembayaran Berhasil</h3>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID Pembayaran</th>
            <th>ID Booking</th>
            <th>Metode Pembayaran</th>
            <th>Status</th>
        </tr>
        @foreach($riwayats as $item)
        <tr>
            <td>PAY-00{{ $item->id }}</td>
            <td>BKG-00{{ $item->booking_id }}</td>
            <td>{{ $item->metode_pembayaran }}</td>
            <td><b>{{ $item->status_bayar }}</b></td>
        </tr>
        @endforeach
    </table>

</body>
</html>