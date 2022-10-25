<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return (new UserCollection(User::paginate(10)))
        ->additional(['message' => 'User data loaded.']);
    }

    public function show(User $user)
    {
        return (new UserResource($user))->additional(['message' => 'user found']);
    }
}
