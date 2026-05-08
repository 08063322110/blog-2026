<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function updateProfile($id){
        $user = User::find($id);
        return view('users.update-profile', compact('user'));
    }
    
}
