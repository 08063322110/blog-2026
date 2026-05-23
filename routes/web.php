<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts\PostsController;
use App\Http\Controllers\Posts\postBus;
use App\Http\Controllers\Categories\CategoriesController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Admins\AdminsController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    return view('login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [PostsController::class, 'index'])->name('welcome');
Route::get('/home', [PostsController::class, 'index'])->name('home');
Route::get('/contact', [PostsController::class, 'contact'])->name('contact');
Route::get('/about', [PostsController::class, 'about'])->name('about');

Route::group(['prefix' => 'posts'], function() {

Route::get('/index', [PostsController::class, 'index'])->name('posts.index');
Route::get('/single/{id}', [PostsController::class, 'single'])->name('posts.single');
Route::get('/single/1', [PostsController::class, 'single'])->name('posts.single');
Route::post('/comment-store', [PostsController::class, 'storeComment'])->name('comment.store');
Route::get('/create-post', [PostsController::class, 'createPost'])->name('posts.create');
Route::post('/post-store', [PostsController::class, 'storePost'])->name('posts.store');
Route::get('/post-delete/{id}', [PostsController::class, 'deletePost'])->name('posts.delete');

//edit/update
Route::get('/post-edit/{id}', [PostsController::class, 'editPost'])->name('posts.edit');
Route::post('/post-update/{id}', [PostsController::class, 'updatePost'])->name('posts.update');
Route::any('/search', [PostsController::class, 'search'])->name('posts.search');

});

Route::group(['prefix' => 'categories'], function() {
Route::get('/category/{name}', [CategoriesController::class, 'category'])->name('category.single');

});

Route::group(['prefix' => 'users'], function() {
    Route::get('/edit/{id}', [UsersController::class, 'editProfile'])->name('users.edit');
    Route::any('/update/{id}', [UsersController::class, 'updateProfile'])->name('users.update');
    Route::get('/profile/{id}', [UsersController::class, 'profile'])->name('users.profile');

}); 

    Route::get('admin/login', [AdminsController::class, 'viewLogin'])->name('admins.login');
Route::post('admin/login', [AdminsController::class, 'checkLogin'])->name('admins.check.login');


Route::group(['prefix' => 'admin', 'middleware' =>  'auth:admin'], function() {
    //admins
    Route::get('/', [AdminsController::class, 'index'])->name('admins.dashboard');
    Route::get('/show-admins', [AdminsController::class, 'admins'])->name('admins.show');
    Route::get('/create-admins', [AdminsController::class, 'createAdmins'])->name('admins.create');
    Route::post('/create-admins', [AdminsController::class, 'storeAdmins'])->name('admins.store');
    //categories
    Route::get('/show-categories', [AdminsController::class, 'categories'])->name('categories.show');
    Route::get('/create-categories', [AdminsController::class, 'createCategories'])->name('categories.create');
    Route::post('/create-categories', [AdminsController::class, 'storeCategories'])->name('categories.store');
    Route::get('/delete-categories/{id}', [AdminsController::class, 'deleteCategories'])->name('categories.delete');
    Route::get('/edit-categories/{id}', [AdminsController::class, 'editCategories'])->name('categories.edit');
    Route::put('/update-categories/{id}', [AdminsController::class, 'updateCategories'])->name('categories.update');

}); 




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
