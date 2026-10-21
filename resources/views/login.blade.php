<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login - Sistem Reservasi Lapangan Futsal</h2>
    <p>Silakan masuk untuk melakukan booking lapangan futsal.</p>

    <form action="/aksilogin" method="POST">
        @csrf
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <p>Belum punya akun? <a href="/register">Daftar</a></p>
</body>
</html>