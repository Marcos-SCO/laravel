<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UserSend;
use App\Models\User;
use Illuminate\Auth\Access\Response;
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
        $users = User::all();
        return view('users.index', [
            'title' => 'User Dashboard',
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserSend $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $emailAlreadyTaken = User::where('email', '=', $validated['email'])->exists();

        if ($emailAlreadyTaken)
            return back()->withErrors(['email' => ['Email already taken!']])->withInput();

        User::create($validated);

        return redirect()
            ->route('dashboard.user.index')
            ->with('messages', [
                'text' => 'User successfully registered!'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

        return view('users.edit', [
            'user' => $user,
            'title' => 'Edit user',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserSend $request, User $user)
    {
        //
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $emailAlreadyTaken = User::where('email', '=', $validated['email'])->where('id', '!=', $user->id)->exists();

        if ($emailAlreadyTaken)
            return back()->withErrors(['email' => ['Email already taken!']])->withInput();

        $user->update($validated);

        return redirect()
            ->route('dashboard.user.index')
            ->with('messages', [
                'text' => 'User updated successfully!'
            ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $idToDeleteIsTheSameLogged =
            Auth()->user()->id === $user->id;

        if ($idToDeleteIsTheSameLogged) {
            return redirect()->route('dashboard.user.index')
                ->with('messages', [
                    'text' => 'You can\'t delete yourself!',
                    'alertClass' => 'alert-danger'
                ]);
        }

        $user->delete();

        return redirect()->route('dashboard.user.index')
            ->with(
                'messages',
                [
                    'text' => 'User deleted!'
                ]
            );
    }
}
