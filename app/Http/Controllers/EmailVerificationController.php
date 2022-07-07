<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function notice() {
        return view('admin.dashboard');
    }

    public function verify(EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('dashboard')->with('success', 'Selamat! Alamat email Anda berhasil diverifikasi.');
    }

    public function send(Request $request) {
        $request->user('author')->sendEmailVerificationNotification();
        return back()->with('success', 'Link verifikasi telah dikirim. Silahkan cek email Anda kembali.');
    }
}
