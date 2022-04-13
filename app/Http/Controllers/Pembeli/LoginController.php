<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Session;
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
            'email.max' => 'Email maksimal 100 karakter!',
            'password.min' => 'Kata sandi harus minimal 6 karakter!',
            'password.max' => 'Kata sandi maksimal 50 karakter!',
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
                                    'messages' => 'Akun anda belum teraktivasi, silakan periksa email Anda!'
                                ]);
                            } else {
                                return response()->json([
                                    'status' => 200,
                                    'messages' => 'Berhasil Masuk'
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
            'name.max' => 'Nama maksimal 50 karakter!',
            'email.required' => 'Email diperlukan!',
            'email.unique' => 'Email yang anda masukkan sudah ada!',
            'email.max' => 'Email maksimal 100 karakter!',
            'password.required' => 'Kata sandi diperlukan!',
            'password.min' => 'Kata sandi harus minimal 6 karakter!',
            'password.max' => 'Kata sandi maksimal 50 karakter!',
            'cpassword.required' => 'Konfirmasi kata sandi diperlukan!',
            'cpassword.min' => 'Kata sandi harus minimal 6 karakter!',
            'cpassword.max' => 'Kata sandi maksimal 50 karakter!',
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

        $messageDanger = 'Maaf email Anda tidak dapat diidentifikasi.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;

            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Email Anda telah diverifikasi. Anda sekarang dapat masuk.";
            } else {
                $message = "Email Anda sudah diverifikasi. Anda sekarang dapat masuk.";
            }
        }

      return redirect()->route('login')->with('message', $message, 'messageDanger', $messageDanger);
    }

    public function forgotPassword() {
        return view('costumer.login.password.forgot');
    }

    public function forgotPasswordEmail(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $token = Str::uuid();
            $user = DB::table('users')->where('email', $request->email)->first();
            $details = [
                'body' => route('resetPassword-pembeli', ['email' => $request->email, 'token' => $token])
            ];

            if ($user) {
                User::where('email', $request->email)->update([
                    'token' => $token,
                    'token_expire' => Carbon::now()->addMinutes(10)->toDateTimeString()
                ]);

                Mail::to($request->email)->send(new ForgotPassword($details));
                return response()->json([
                    'status' => 200,
                    'messages' => 'Tautan Atur Ulang Kata Sandi telah dikirim ke email Anda!'
                ]);
            } else {
                return response()->json([
                    'status' => 401,
                    'messages' => 'Email ini tidak terdaftar pada kami!'
                ]);
            }
        }
    }

    public function reset(Request $request) {
        $email = $request->email;
        $token = $request->token;
        return view('costumer.login.password.reset', [
            'email' => $email,
            'token' => $token
        ]);
    }

    public function resetPassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'npass' => 'required|min:6|max:50',
            'cnpass' => 'required|min:6|max:50|same:npass',
        ], [
            'cnpass.same' => 'Kata sandi tidak cocok!',
            'npass.required' => 'Kata sandi diperlukan!',
            'npass.min' => 'Kata sandi harus minimal 6 karakter!',
            'npass.max' => 'Kata sandi maksimal 50 karakter!',
            'cnpass.required' => 'Konfirmasi kata sandi diperlukan!',
            'cnpass.min' => 'Kata sandi harus minimal 6 karakter!',
            'cnpass.max' => 'Kata sandi maksimal 50 karakter!',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = DB::table('users')->where('email', $request->email)
                ->whereNotNull('token')
                ->where('token', $request->token)
                ->where('token_expire', '>', Carbon::now())->exists();

            if ($user) {
                User::where('email', $request->email)->update([
                    'password' => Hash::make($request->npass),
                    'token' => null,
                    'token_expire' => null
                ]);

                return response()->json([
                    'status' => 200,
                    'success' => '<a href="/login" class="text-decoration-none">Masuk Sekarang</a>',
                    'messages' => 'Kata Sandi Baru Diperbarui!'
                ]);
            } else {
                return response()->json([
                    'status' => 401,
                    'messages' => 'Tautan atur ulang kedaluwarsa, Minta tautan atur ulang kata sandi baru!'
                ]);
            }
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        return redirect()->route('home');
    }

}
