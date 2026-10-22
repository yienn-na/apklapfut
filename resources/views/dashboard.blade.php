<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Sistem Reservasi Lapangan Futsal</title>
</head>
<body>

    <h2>Dashboard - Sistem Reservasi Lapangan Futsal</h2>
    <hr>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
  <hr>

    <h3>Selamat Datang di Aplikasi Reservasi Futsal</h3>
    <p>Anda telah berhasil masuk ke dalam sistem.</p>
    <p>Silakan pilih menu <b>Data Lapangan</b> untuk melihat daftar lapangan yang tersedia atau pilih menu <b>Booking</b> untuk melakukan pemesanan jadwal main.</p>

  <!-- Menu Navigasi -->
<p>
    <b>Menu Navigasi:</b> <br>
    
    <a href="/lapangan">Data Lapangan</a> <br>
    <a href="/booking">Booking</a> <br>
    <a href="/pembayaran">Pembayaran</a> <br>
    <a href="/riwayat">Riwayat Booking</a> <br> 
    
    <form action="/logout" method="POST" style="display: inline;">
        @csrf
        <button type="submit">Logout</button>
      
    </form>
</p>

</body>
</html>