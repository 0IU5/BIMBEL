<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan model User diimpor dengan benar

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user(); // Mendapatkan objek user yang sedang login

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        // Pastikan $user adalah instance dari model User
        if ($user instanceof User) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save(); // Simpan perubahan
        } else {
            // Handle jika $user bukan instance dari model User
            return redirect()->back()->with('error', 'Failed to update profile');
        }

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}

