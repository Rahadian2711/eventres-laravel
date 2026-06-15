<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil.
     * Route: GET /profil
     */
    public function show()
    {
        $user = Auth::user();

        $totalOrders  = $user->orders()->count();
        $paidOrders   = $user->orders()->where('status', 'paid')->count();
        $totalSpent   = $user->orders()->where('status', 'paid')->sum('total');

        return view('profile.show', compact('user', 'totalOrders', 'paidOrders', 'totalSpent'));
    }

    /**
     * Update data profil.
     * Route: POST /profil/update
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone'  => 'nullable|string|max:20',
            'bio'    => 'nullable|string|max:300',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload avatar
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->bio   = $request->bio;
        $user->save();

        return redirect()->route('profile.show')
            ->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Update password.
     * Route: POST /profil/password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile.show')
            ->with('success', 'Password berhasil diubah!');
    }
}
