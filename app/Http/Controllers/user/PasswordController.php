<?php

namespace App\Http\Controllers\user;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\user\ChangePasswordRequest;

class PasswordController extends Controller
{
    public function index(User $user)
    {
        return view('layouts.edit-password', ['user' => $user]);
    }

    public function changePassword(ChangePasswordRequest $request, User $user)
    {
        $validated = $request->validated();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current Password Doesn\'t Match!');
        }

        $validated['password'] = Hash::make($validated['password']);

        $user->update($validated);

        return back()->with('success', 'Password successfully changed!');
    }
}
