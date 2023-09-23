<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $images = auth()->user()->images()->withTrashed()->paginate(10);
        return view('dashboard', compact('images'));
    }




    public function show(User $user)
    {
        $images = $user->images()->paginate(20);    // using the relationship

        return view('users.show', compact('user', 'images'));
    }
}
