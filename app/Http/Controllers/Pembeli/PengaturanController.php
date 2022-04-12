<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class PengaturanController extends Controller
{
    public function pengaturan() {
        $data = ['userInfo' => DB::table('users')
            ->where('id', auth()->user()->id)
            ->first()
        ];
        return view('costumer.pengaturan.index', $data);
    }

    public function pengaturanImage(Request $request) {
        $user_id = $request->user_id;
        $user = User::find($user_id);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('profile', $fileName);

            if($user->image) {
                Storage::delete('profile' . $user->image );
            }
        }

        User::where('id', $user_id)->update([
            'image' => $fileName
        ]);

        return response()->json([
            'status' => 200,
            'messages' => 'Foto profil berhasil diperbarui!'
        ]);
    }

    public function pengaturanUpdate(Request $request){
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'telp' => $request->telp,
            'birth' => $request->birth,
            'gender' => $request->gender,
        ]);
        return response()->json([
            'status' => 200,
            'messages' => 'Biodata diri berhasil diupdate!'
        ]);
    }
}
