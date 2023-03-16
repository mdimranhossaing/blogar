<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hamcrest\BaseDescription;
use Illuminate\Support\Facades\Hash;

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
    public function store(Request $request, User $user)
    {
        $rules = [
            'name'          =>  'required',
            'username'      =>  'required',
            'email'         =>  'required',
            'password'      =>  'required',
            'photo'         =>  'required',
            'description'   =>  'required',
        ];
        $this->validate($request,$rules);

        $user->name         =  $request->name;
        $user->username     =  $request->username;
        $user->email        =  $request->email;
        $user->password     =  Hash::make($request->password);
        $user->profile_picture        =  $request->photo;
        $user->description  =  $request->description;
        $user->save();
        return redirect('/register')->with('msg', $request->name .' User created successfully');
    }

    /**
     * Display the resource.
     */
    public function show(User $user)
    {
        return view(
            'pages.post.author_post',
            [
                'posts' => $user->post,
                'user'  =>  $user
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
}
