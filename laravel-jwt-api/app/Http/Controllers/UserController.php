<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        return response()->json(['status' => Response::HTTP_CREATED, 'message' => 'User created successfully', 'data' => $user], Response::HTTP_CREATED);
    }

    public function login(UserLoginRequest $request)
    {
        $validated = $request->validated();
        extract($validated);

        $token = auth()->attempt(['email' => $email, 'password' => $password]);

        if (!$token) return response()->json(['status' => Response::HTTP_UNAUTHORIZED, 'message' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);

        return response()->json(['status' => Response::HTTP_OK, 'message' => 'Login successfully', 'access_token' => $token], Response::HTTP_OK);
    }

    public function profile()
    {
        $userData = auth()->user();

        return response()->json(['status' => Response::HTTP_OK, 'message' => 'User profile data', 'data' => $userData], Response::HTTP_OK);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $userData = auth()->user();

        $userData->update($request->all());

        return response()->json(['status' => Response::HTTP_OK, 'message' => 'User updated', 'data' => $request->all()], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        auth()->logout();

        return response()->json(['status' => Response::HTTP_OK, 'message' => 'User logout', 'data' => $user], Response::HTTP_OK);
    }
}
