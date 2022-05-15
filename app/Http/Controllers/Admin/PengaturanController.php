<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;

class PengaturanController extends Controller
{
    public function pengaturan() {
        $data = ['userInfo' => Admin::with('user')
            ->where('user_id', auth()->user()->id)
            ->first()
        ];
        return view('admin.pengaturan.index', $data);
    }

    public function pengaturanImage(Request $request) {
        $user_id = $request->user_id;
        $user = Admin::find($user_id);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('profile', $fileName);

            if($user->image) {
                Storage::delete('profile/' . $user->image );
            }
        }

        Admin::where('id', $user_id)->update([
            'image' => $fileName
        ]);

        return response()->json([
            'status' => 200,
            'messages' => 'Foto profil berhasil diperbarui!'
        ]);
    }

    public function pengaturanUpdate(Request $request){
        User::where('id', auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        Admin::where('id', $request->id)->update([
            'telp' => $request->telp,
            'city' => $request->city,
            'address' => $request->address,
        ]);

        return response()->json([
            'status' => 200,
            'messages' => 'Biodata Admin berhasil diupdate!'
        ]);
    }

    public function pengaturanUpdatePassword(Request $request){
        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        return response()->json([
            'status' => 200,
            'messages' => 'Password berhasil diperbarui!'
        ]);
    }
}
