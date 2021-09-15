<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\user\ProfileRequest;

class AdminProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.profile.show', ['user' => $user]);
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
        return view('admin.profile.edit', ['user' => $user, 'countries' => $countries]);
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
        return redirect(route('admin.profile.show', ['user' => $user]));
    }
}
