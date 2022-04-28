<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Farmer;

class PengaturanController extends Controller
{
    public function pengaturan() {
        $data = ['userInfo' => Farmer::with('user')
            ->where('user_id', auth()->user()->id)
            ->first()
        ];
        return view('petani.pengaturan.index', $data);
    }

    public function pengaturanImage(Request $request) {
        $user_id = $request->user_id;
        $user = Farmer::find($user_id);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('profile', $fileName);

            if($user->image) {
                Storage::delete('profile/' . $user->image );
            }
        }

        Farmer::where('id', $user_id)->update([
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

        Farmer::where('id', $request->id)->update([
            'telp' => $request->telp,
            'city' => $request->city,
            'address' => $request->address,
        ]);

        return response()->json([
            'status' => 200,
            'messages' => 'Biodata Petani berhasil diupdate!'
        ]);
    }
}
