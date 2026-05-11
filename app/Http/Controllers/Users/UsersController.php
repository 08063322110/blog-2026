<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\post\PostModel;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
       public function editProfile($id)
    {
        $user = User::findOrFail($id); // 404 if user doesn't exist
        if (Auth::check() && Auth::id() === $user->id) {
            return view('users.update-profile', compact('user'));
        }

        abort(404); // hide it if not logged in or not the owner
    }


    public function updateProfile(Request $request, $id){
         $updateProfile = User::findOrFail($id);

          Request()->validate([
            'name'=> 'required|max:20',
            'email'=> 'required|max:30',
            'bio'=> 'required|max:300',
        ]);
        
            $updateProfile->update($request->all());

            if($updateProfile) {
                return redirect('/posts/index')->with('update.user', 'User Info Updated Successfully');
            }
    }

    public function profile($id){
        $profile = User:: find($id);
        $latestPosts = PostModel::where('user_id', $id)
        ->take(4)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('users.profile', compact('profile', 'latestPosts'));
    }

}
