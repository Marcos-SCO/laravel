<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Redirect;
use App\Http\Requests\User\UserLoginRequest;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Login User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Requests\User\UserLoginRequest
     */
    public function login(UserLoginRequest $request)
    {
        $validated = $request->validated();

        extract($validated);

        $user = User::where(['email' => $email]);
        $userResults = $user->first();
        $userExists = $user->exists();

        if (!$userExists) {
            return Redirect::responseErrorsInput('login', ['email' => 'Incorrect email and password combination.']);
        }

        $checkPassword = Hash::check($password, $userResults->password);

        if (!$checkPassword) {
            return Redirect::responseErrorsInput('login', ['email' => 'Incorrect pass email and password combination.']);
        }

        if ($user && $checkPassword) {
            session(['user' => $userResults]);
            return redirect('/');
        }

        return Redirect::responseErrorsInput('login', $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        session('user');
        session()->forget('user');
        return redirect('/login');
    }
}
