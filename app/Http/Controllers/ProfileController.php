<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{

    public function index()
    {
        return view('profile.index');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->validated();

        try {
            $imageName = Auth::user()->image;

            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($imageName && Storage::disk('public')->exists('images/users/' . $imageName)) {
                    Storage::disk('public')->delete('images/users/' . $imageName);
                }

                // Generate new filename with extension
                $extension = $request->file('image')->getClientOriginalExtension();
                $imageName = Str::random(32) . '.' . $extension;

                // Store new image
                $request->file('image')->storeAs('images/users', $imageName, 'public');
            }

            $user = Auth::user();
            $user->update([
                'name' => $request->name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'image' => $imageName,
            ]);

            return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile: ' . $e->getMessage());
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
