<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function signin(AuthenticationRequest $request)
    {

        $token = auth()->attempt($request->only('username', 'password'));

        if (!$token) {
            return response()->json([
                'message' => 'Failed to authenticate.'
            ], Response::HTTP_BAD_REQUEST);
        }

        return (new UserResource(auth()->user()))
        ->additional([
            'message' => 'Authentication success.',
            'token' => $token
        ])
        ->response()
        ->setStatusCode(Response::HTTP_OK);
    }

    public function signout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully signed out.'], Response::HTTP_OK);

    }
}
