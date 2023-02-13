<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }else {

            $validatedData = $request->validate([
                'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
                'name' => ['required', 'string', 'max:255'],
                'password' => ['nullable', 'string', 'min:8'],
            ]);

            $user->email = $validatedData['email'];
            $user->name = $validatedData['name'];

            if (!empty($validatedData['password'])) {
                $user->password = bcrypt($validatedData['password']);
            }

            $user->save();

           /* if(!empty($request->password)){
                $user->update($request->only(['name', 'email','old_password']));
            }else {
                $user->update($request->only(['name', 'email','password']));
            }*/

            return redirect()->route('profile.edit')->with('status', 'Profile updated successfully!');
        }

    }

}
