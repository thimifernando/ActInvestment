<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UseProfileController extends Controller
{   
    public function profile()
    {
        $user = auth()->user();
        return view('profile.profile', compact('user'));
    }

}
