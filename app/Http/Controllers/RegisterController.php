<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $user = User::create($request->except('password') + ['password' => Hash::make($request->password)]);

        if ($user) {
            $token = auth()->attempt($request->only('username', 'password'));
            return response()->json(['message' => 'Successfully registered.', 'token' => $token], Response::HTTP_CREATED);
        }

        return response()->json(['message' => 'Failed to register, please try again.'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
