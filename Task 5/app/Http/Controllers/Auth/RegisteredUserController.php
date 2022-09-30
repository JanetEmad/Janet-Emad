<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;

use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Services\HasMedia;
use App\Providers\RouteServiceProvider;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'phone' => ['required',   'max:11', 'unique:admins'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'image' => ['nullable', 'mimes:png,jpg,jpeg','max:1024'],


        ]);

        // $imageName = HasMedia::upload($request->file('image'),public_path('images\admins'));

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            // 'image' => $imageName,

        ]);

        event(new Registered($admin));

        Auth::login($admin);

        return redirect(RouteServiceProvider::HOME);
    }
}
