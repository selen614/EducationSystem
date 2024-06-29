<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // プロフィール設定
    public function showProfileForm()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'kana' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $profileImageName = time() . '_' . $profileImage->getClientOriginalName();
            $profileImage->storeAs('public/images/profile', $profileImageName);

            if ($user->profile_image) {
                Storage::delete('public/images/profile/' . $user->profile_image);
            }

            $user->profile_image = $profileImageName;
        }

        $user->name = $request->name;
        $user->kana = $request->kana;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('user.show.profile')->with('status', 'プロフィールを更新しました');
    }

    // パスワード変更
    public function showPasswordForm()
    {
        return view('user.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => '旧パスワードが間違っています']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.show.profile')->with('status', 'パスワードを更新しました');
    }
}
