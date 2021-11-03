<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\User\UserPassword as RequestPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserPassword extends Controller
{

    public function update(RequestPassword $request, User $user)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $user->update($validated);

        return redirect()
            ->route('dashboard.user.index')
            ->with('messages', [
                'text' => 'Password updated!'
            ]);
    }
}
