<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




class PackageController extends Controller
{
    public function package()
    {
        $user = auth()->user();
        return view('profile.package', compact('user'));
    }
}
