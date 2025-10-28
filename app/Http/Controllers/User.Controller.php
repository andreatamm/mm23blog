<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        // Load only this user's posts, with pagination
        $posts = $user->posts()
            ->latest()
            ->paginate(6); // adjust per your layout

        return view('user.show', compact('user', 'posts'));
    }
}
