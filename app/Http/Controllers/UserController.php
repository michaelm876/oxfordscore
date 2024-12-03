<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->comments->isEmpty()) {
            $user->delete();
            return redirect(route('users.index'));
        }
        return redirect()->back()->withErrors(['errors' => 'This user has comments and cannot be deleted. Please disable the account by making it inactive.']);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultant  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $validated["is_active"] = request()->has('is_active');
        $user->update($validated);

        return redirect(route('users.index'));
    }    

}