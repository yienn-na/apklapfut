<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 
use App\Models\User;                 

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Diarahkan langsung ke dashboard
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    public function lapangan()
    {
        $lapangans = \App\Models\Lapangan::all();
        return view('lapangan', compact('lapangans'));
    }

public function booking()
    {
        $lapangans = \App\Models\Lapangan::all();
        return view('booking', compact('lapangans'));
    }

public function storeBooking(Request $request)
{
    return redirect('/pembayaran');
}

public function pembayaran()
{
    $bookings = \DB::table('pembayarans')->get();

    return view('pembayaran', compact('bookings'));
}

public function prosesPembayaran($id)
{
    \DB::table('pembayarans')->where('id', $id)->update([
        'status_bayar' => 'Valid'
    ]);

    return redirect('/riwayat');
}

public function riwayat()
{
    $riwayats = \App\Models\Pembayaran::all(); 
    return view('riwayat', compact('riwayats'));
}
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}