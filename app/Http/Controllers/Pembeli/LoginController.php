<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Session;
use Mail;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view('costumer.login.index');
    }

    public function loginPembeli(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100',
            'password' => 'required|min:6|max:50',
        ], [
            'email.required' => 'Email diperlukan!',
            'password.required' => 'Kata sandi diperlukan!',
        ]);

        $credentials = $request->except(['_token']);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = User::where('email', $request->email)->first();
            if($user){
                if(Hash::check($request->password, $user->password)) {
                    if (auth()->attempt($credentials)) {
                        if (auth()->check() && $user->hasRole('pembeli')) {
                            if (!Auth::user()->is_email_verified) {
                                auth()->logout();
                                return response()->json([
                                    'status' => 401,
                                    'messages' => 'Anda perlu mengkonfirmasi akun Anda. Kami telah mengirimkan kode aktivasi, silakan periksa email Anda!'
                                ]);
                            } else {
                                return response()->json([
                                    'status' => 200,
                                    'messages' => 'success'
                                ]);
                            }
                        } else {
                            \Auth::logout();
                            return response()->json([
                                'status' => 401,
                                'messages' => 'Hak akses hanya untuk pembeli!'
                            ]);
                        }
                    } else {
                        return response()->json([
                            'status' => 401,
                            'messages' => 'Kredensial tidak valid!'
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 401,
                        'messages' => 'Gagal Masuk!'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 401,
                    'messages' => 'Akun tidak ditemukan!'
                ]);
            }
        }
    }

    public function registerPembeli(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|min:6|max:50',
            'cpassword' => 'required|min:6|same:password'
        ], [
            'cpassword.same' => 'Kata sandi tidak cocok!',
            'name.required' => 'Nama diperlukan!',
            'email.required' => 'Email diperlukan!',
            'email.unique' => 'Email yang anda masukkan sudah ada!',
            'password.required' => 'Kata sandi diperlukan!',
            'cpassword.required' => 'Konfirmasi kata sandi diperlukan!',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->assignRole('pembeli');
            $user->save();

            $token = Str::random(64);
            UserVerify::create([
              'user_id' => $user->id,
              'token' => $token
            ]);

            Mail::send('costumer.register.emailVerificationEmail', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Verifikasi Email');
            });

            return response()->json([
                'status' => 200,
                'messages' => 'Akun Anda Berhasil Terdaftar'
            ]);
        }
    }

    public function register() {
        return view('costumer.register.index');
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;

            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

      return redirect()->route('login')->with('message', $message);
    }

    public function forgotPassword() {
        return view('costumer.login.forgot');
    }

    public function resetPassword() {
        return view('costumer.login.reset');
    }

    public function logout(Request $request) {
        Auth::logout();

        return redirect()->route('home');
    }

}
