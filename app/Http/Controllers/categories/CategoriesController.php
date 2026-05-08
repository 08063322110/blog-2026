<?php

namespace App\Http\Controllers\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post\Category;
use App\Models\post\PostModel;
use DB;

class CategoriesController extends Controller
{
    public function category($name){

    $posts = PostModel::where('category', $name)
    ->take(5)
    ->orderby('created_at', 'desc')
    ->get();

    $pupPosts = PostModel::take(3)->orderBy('id', 'desc')->get();

    $categories = DB::table('categories')
    ->leftJoin('posts', 'posts.category', '=', 'categories.name') // use .category not .category_id
    ->select('categories.name', 'categories.id', DB::raw('COUNT(posts.id) as total'))
    ->groupBy('categories.id', 'categories.name')
    ->get();

    return view('categories.category', compact('posts','pupPosts', 'categories', 'name' ));
    }
}