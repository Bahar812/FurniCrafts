<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function showForgot(){
        return view('forgot');
    }
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        // Buat token acak
        $token = Str::random(60);

        // Simpan token di tabel password_resets
        DB::table('password_resets')->updateOrInsert(
            ['email' => $user->email],
            ['token' => $token, 'created_at' => now()]
        );

        // Kirim email untuk reset password
        Mail::to($user->email)->send(new ForgotPasswordMail($user, $token));

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', "Please check your email to reset your password.");
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $passwordReset = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$passwordReset) {
            return back()->withErrors(['email' => 'Invalid token or email.']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus token setelah digunakan
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect('/login')->with('success', 'Password has been reset.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email Harus diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $remember = $request->has('remember'); // Ambil nilai remember me dari request

        if (Auth::attempt($infologin, $remember)) {
            if (Auth::user()->role == 'Owner') {
                return redirect('admin');
            } else if (Auth::user()->role == 'Manager') {
                return redirect('admin/manager');
            } else if (Auth::user()->role == 'user') {
                return redirect('/');
            }
        } else {
            return redirect('')->withErrors('Username dan Password tidak sesuai')->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
