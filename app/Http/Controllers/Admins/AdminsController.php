<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\post\PostModel;
use App\Models\post\Category;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Hash;


    class AdminsController extends Controller
    {
    public function viewLogin(){

        return view('admins.login-admins');
        }

        
    public function checkLogin(Request $request){

              Request()->validate([
            'email'=> 'required',
            'password'=> 'required',
        ]);


        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->
        input("email"), 'password' => $request->input("password")
        ], $remember_me)) {

        return redirect() -> route('admins.dashboard');
    }
    return redirect()->back()->with(['error' => 'error logging in']);
    }
    public function index(){

        $posts= PostModel::all();
        $postCount = $posts->count();

        $categories= Category::all();
        $categoriesCount = $categories->count();

        $admins= Admin::all();
        $adminsCount = $admins->count();
    return view('admins.index', compact('postCount','categoriesCount', 'adminsCount'));  
        }


        //admins section

        public function admins() {
            $admins = Admin::all();
            return view('admins.admins', compact('admins'));
        }

        public function createAdmins() {

        return view('admins.create-admins');
        }

        public function storeAdmins(Request $request) {

            Request()->validate([
            'email'=> 'required',
            'name'=> 'required',
            'password'=> 'required',
        ]);

        
     $insertAdmin= Admin::create([
        "email" =>$request->email,
        "name" =>$request->name,
        "password" => Hash::make($request->password),
       
    ]);

        return redirect('/admin/show-admins')->with('success', 'Admin Created Successfully');
    }

        public function categories() {
            $categories = Category::all();
            return view('admins.categories', compact('categories'));
        }

        public function createCategories() {
            return view('admins.create-categories');
        }

        public function storeCategories(Request $request) {

            Request()->validate([
            'name'=> 'required|max:40',
        ]);
    
        $insertCategory = Category::create([
            "name" =>$request->name,  
        ]);

            return redirect('/admin/show-categories')->with('success', 'Category Created Successfully');
        }


        public function deleteCategories($id) {

        $category = Category::find($id);
        $category->delete();

            return redirect('/admin/show-categories')->with('delete', 'Category Deleted Successfully');
        
    }

     public function editCategories($id) {

        $category = Category::find($id);

            return view('admins.edit-categories', compact('category'));
    }

    
        public function updateCategories(Request $request, $id) {

            Request()->validate([
            'name'=> 'required|max:40',
        ]);
        $updateCategory = Category::find($id);
        $updateCategory -> update($request->all());

            return redirect('/admin/show-categories')->with('update', 'Category Updated Successfully');
        }

        //posts
         public function posts() {
        $posts = PostModel::all();

            return view('admins.posts', compact('posts'));
    }

    
     public function deletePosts($id) {

        $post = PostModel::find($id);
        $file_path = public_path('assets/images'.$post->image);
        unlink($file_path);

        $post->delete();

            return redirect('/admin/show-posts')->with('delete', 'Post Deleted Successfully');
        
    }

}  