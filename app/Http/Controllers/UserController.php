<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $count = User::query()->count();

        $users = User::query();
        return view('User.index', [
            'users' => $users->paginate(15),
            'firstPage' => 1,
            'lastPage' => ceil($count/15)
        ]);
    }

    public function edit(Request $request)
    {
        $user = User::query()
            ->where('email', $request->email)
            ->first();

        dd($user);
    }
}
