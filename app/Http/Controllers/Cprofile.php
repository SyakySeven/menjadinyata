<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cprofile extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('asset/d3/img'), $filename);

            // Hapus foto lama jika ada
            if ($user->foto && file_exists(public_path('asset/d3/img/' . $user->foto))) {
                unlink(public_path('asset/d3/img/' . $user->foto));
            }

            $user->foto = $filename;
        }

        $user->save();

        return redirect()->route('dashboard.index')->with('success', 'Profile berhasil diperbarui!');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }
}