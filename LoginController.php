<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $users = [
        'admin' => 'admin123',
        'user1' => 'user123',
        'user2' => 'user234'
    ];

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Check if username exists and password matches
        if (isset($this->users[$username]) && $this->users[$username] === $password) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'message' => 'Invalid username or password!'
        ]);
    }
}