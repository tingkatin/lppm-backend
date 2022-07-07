<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{

    public function login() {
        return view('auth.login');
    }

    public function postlogin (Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        // Author/Dosen
        if (Auth::guard('author')->attempt(['email' => $request->email, 'password' => $request->password], $request->rememberMe)) {

            $request->session()->regenerate();
            return redirect()->intended('/dashboard');

        // Admin (Using web guard because I use admin with users table)
        } else if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->rememberMe)) { 

            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
 
        return back()->with('error', 'Email atau password tidak sesuai');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        return redirect('/login');
    }

    public function registration() {
        return view('auth.registration');
    }

    public function postregistration(Request $request) {
        $request->validate([
            'name'=> 'required|max:70',
            'email'=> 'required|email|unique:authors',
            'password'=> 'required|min:8|alpha_num|confirmed',
            'keahlian' => 'required',
            'peminatan' => 'required',
            'deskripsi' => 'required|max:500',
            'sertifikasi' => 'required|min:1'
        ]);
        $author = new Author([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'keahlian' => $request->keahlian,
            'peminatan' => $request->peminatan,
            'deskripsi' => $request->deskripsi,
            'sertifikasi' => serialize($request->sertifikasi),
        ]);
        $author->save();

        event(new Registered($author));

        return redirect()->route('login')->with('success', 'Berhasil mendaftar. Silahkan login.');


    }

    public function forgotPassword() {
        return view('auth.forgot-password');
    }


    public function passwordEmail(Request $request) {
        $admin = $request->validate(['email' => 'required|email']);

        // Try reset for authors
        $status = Password::broker('authors')->sendResetLink(
            $request->only('email')
        );
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Link reset password telah dikirim ke email anda');

        // If email is not found, check the admin table
        } else {
            $statusAdmin = Password::sendResetLink(
                $request->only('email')
            );

            return $statusAdmin === Password::RESET_LINK_SENT
                ? back()->with('success', 'Link reset password telah dikirim ke email anda')
                : back()->with('error', 'Tidak dapat mengirim link reset password');
        }
    }


    public function passwordReset($token) {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function passwordUpdate(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|alpha_num|confirmed',
        ]);
     
        // Try for authors
        $status = Password::broker('authors')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', "Password berhasil di-update. Silahkan login kembali.");

        // If email is not found, check the admin table
        } else {
            $statusAdmin = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));
         
                    $user->save();
         
                    event(new PasswordReset($user));
                }
            );

            return $statusAdmin === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('success', "Password berhasil di-update. Silahkan login kembali.")
                    : back()->with('error', 'Password tidak dapat di-update.');
        }
    }


}
