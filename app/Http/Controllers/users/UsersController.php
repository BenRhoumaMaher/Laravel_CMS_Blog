<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\post\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function updateProfile(User $user)
    {
        return view('users.update-profile')->with([
        'user' => $user,
        ]);
    }
    public function editProfile(Request $request, User $user)
    {
        $incomingFields = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email'],
            'bio' => ['required','min:10'],
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['email'] = strip_tags($incomingFields['email']);
        $incomingFields['bio'] = strip_tags($incomingFields['bio']);

        $user->update($incomingFields);

        return redirect()->to("/posts/index")->with('profile', 'Your profile has been updated successfully');
    }
    public function profile(User $user)
    {
        $posts = $user->posts()->take(5)->orderBy('created_at', 'desc')->get();
        $username = $user->name;
        return view('users.profile')->with([
            'user' => $user,
            'posts' => $posts,
            'username' => $username,
        ]);
    }
}