<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hamcrest\BaseDescription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
        return view('pages.login.register');
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'              => 'required|string|max:250',
            'username'          => 'required|unique:users',
            'email'             => 'required|email|max:250|unique:users',
            'password'          => 'required|min:5',
            'profile_picture'   => 'required',
            'description'       => 'required',
        ]);

        User::create([
            'name'              =>  $request->name,
            'username'          =>  $request->username,
            'email'             =>  $request->email,
            'password'          =>  Hash::make($request->password),
            'profile_picture'   =>  $request->profile_picture,
            'description'       =>  $request->description
        ]);

        $credentials = $request->only('email', 'password');

        Auth::attempt($credentials);

        $request->session()->regenerate();

        return redirect()->route('dashboard')->withSuccess('You have successfully registered & logged in!');

    }

    /**
     * Display the resource.
     */
    public function show(User $user)
    {
        return view(
            'pages.post.author_post',
            [
                'posts' => $user->post()->paginate(5),
                'user' => $user
            ]
        );
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }

    public function login()
    {
        return view('pages.login.login');
    }


    /**
     * Handle an authentication attempt.
     */
    public function login_process(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'password' => 'The password given here does not match the password of this email user',
        ])->onlyInput('password');
    }





    public function dashboard()
    {
        $data['user'] = auth()->user();
        return view('pages.login.dashboard', $data);
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
