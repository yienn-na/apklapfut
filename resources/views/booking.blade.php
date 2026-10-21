<!DOCTYPE html>
<html>
<head>
    <title>Booking - Sistem Reservasi Lapangan Futsal</title>
</head>
<body>

    <h2>Form Pemesanan Lapangan Futsal</h2>
    <hr>
   <!-- Menu Navigasi -->
<p>
    <b>Menu:</b> 
    <a href="/dashboard">Dashboard</a> | 
    <a href="/lapangan">Data Lapangan</a> | 
    <a href="/booking">Booking</a> | 
    <a href="/pembayaran">Pembayaran</a> | 
    <a href="/riwayat">Riwayat Booking</a> | 
</p>
    <hr>

    <h3>Silakan Isi Data Booking</h3>

    <form action="/booking/proses" method="POST">
        @csrf

        <label>Pilih Lapangan:</label><br>
        <select name="lapangan" required>
            <option value="">-- Pilih Lapangan --</option>
         @foreach($lapangans as $item)
            <option value="{{ $item->nama_lapangan }}">{{ $item->nama_lapangan }} - Rp {{ number_format($item->harga_per_jam, 0, ',', '.') }}</option>
        @endforeach
        </select>
        <br><br>

        <label>Tanggal Main:</label><br>
        <input type="date" name="tanggal" required>
        <br><br>

        <label>Jam Mulai:</label><br>
        <input type="time" name="jam_mulai" required>
        <br><br>

   <label>Durasi (Jam):</label><br>
        <select name="durasi" required>
            <option value="">-- Pilih Durasi --</option>
            <option value="1">1 Jam</option>
            <option value="2">2 Jam</option>
            <option value="3">3 Jam</option>
            <option value="4">4 Jam</option>
            <option value="5">5 Jam</option>
        </select>
        <br><br>

        <button type="submit">Simpan & Lanjut Pembayaran</button>
    </form>

        <form action="/logout" method="POST" style="display: inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
        
</body>
</html>