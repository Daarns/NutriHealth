<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function updateProfilePicture(Request $request, User $user)
    {
        $request->validate([
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            // Hapus gambar profil lama jika ada
            if ($user->profile_picture) {
                Storage::delete('/public/img/profile_pictures/' . $user->profile_picture);
            }

            // Upload gambar profil baru
            $imageName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('img/profile_pictures'), $imageName);

            // Update field profile_picture di database
            $user->profile_picture = $imageName;
            $user->save();
        }

        return redirect()->route('profile');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($user->doctor) {
            $user->doctor->bio = $request->bio;
            $user->doctor->phone_number = $request->phone_number;
            $user->doctor->save();
        }

        $user->save();

        return redirect()->route('profile');
    }
}
