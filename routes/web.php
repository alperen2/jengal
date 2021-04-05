<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth'])->group(function () {
    Route::view('/', 'dashboard')->name('dashboard');

    Route::get('/my-posts', function () {
        $posts = Post::where('user_id', auth()->user()->id)->paginate(10);
        return View::make('post.index', [
            "posts" => $posts,
        ]);
    })->name('my_posts');

    Route::resource('post', PostController::class);
});


require __DIR__ . '/auth.php';
