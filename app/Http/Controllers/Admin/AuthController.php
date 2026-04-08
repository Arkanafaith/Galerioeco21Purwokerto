<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => ['required','string'],
            'password' => ['required','string'],
        ]);

        // Fixed admin credentials check
        $fixedUser = 'admin';
        $fixedPass = 'eco21';

        if ($data['username'] === $fixedUser && $data['password'] === $fixedPass) {
            // Ensure an admin user exists, create if missing
            $user = User::firstOrCreate(
                ['name' => $fixedUser],
                ['email' => 'admin@local', 'password' => Hash::make($fixedPass), 'is_admin' => true]
            );

            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function showSettings()
    {
        return view('admin.settings');
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:50'],
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);

        // Verify current password
        $user = Auth::user();
        
        // Check if current password matches the fixed password or hashed password
        $fixedPass = 'eco21';
        if ($request->current_password !== $fixedPass && !Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak cocok']);
        }

        // Update username (name in database)
        $user->name = $request->username;
        
        // Update password if new password is provided
        if ($request->new_password) {
            $user->password = Hash::make($request->new_password);
        }
        
        $user->save();

        return back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
