<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;

class AccountAndProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user();

        return view('auth.profile', compact(
            'user'
        ));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update($request->only(
            'first_name',
            'last_name',
            'email',
        ));

        return redirect()->back()
            ->withStatus('Successfully profile updated.');
    }

    public function password()
    {
        $user = auth()->user();

        return view('auth.passwords.change', compact(
            'user'
        ));
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()
            ->withStatus('Successfully password updated.');
    }
}
