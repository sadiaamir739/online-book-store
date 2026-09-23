<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile', [
            'user' => $user,
            'editing' => false,
        ]);
    }

    public function edit()
    {
        return view('profile', [
            'user' => Auth::user(),
            'editing' => true,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            $validated['profile_photo'] = $request->file('profile_photo')
                ->store('profile-photos', 'public');
        }

        $user->update($validated);

        return redirect()
            ->route('profile')
            ->with('success', 'Profile updated successfully!');
    }
}
