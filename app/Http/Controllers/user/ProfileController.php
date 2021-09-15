<?php

namespace App\Http\Controllers\user;

use App\User;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\user\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.profile.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $countries = Country::all();
        return view('user.profile.edit', ['user' => $user, 'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, User $user)
    {
        $validated = $request->validated();

        if ($request->password && Hash::needsRehash($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        if ($request->image) {
            $validated['image'] = $validated['image']->store('images');
        }

        $user->update($validated);
        return redirect(route('user.profile.show', ['user' => $user]));
    }
}
