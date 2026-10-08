<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('welcome');


Route::get('/dev/login', function () {

    $user = User::inRandomOrder()->first();

    Auth::login($user);

    request()->session()->regenerate();

    return redirect()->route('profiles.show', $user->profile);
})->name('login');


Route::get('/dev/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [PostController::class, 'index'])->name('posts.index');
    Route::post('/post', [PostController::class, 'store'])->name('posts.store');

    Route::scopeBindings()->group(function () {
        Route::post(
            '/{profile:handle}/status/{post}/reply',
            [PostController::class, 'reply']
        )->name('posts.reply');

        Route::post(
            '/{profile:handle}/status/{post}/repost',
            [PostController::class, 'repost']
        )->name('posts.repost');

        Route::post(
            '/{profile:handle}/status/{post}/qoute',
            [PostController::class, 'qoute']
        )->name('posts.qoute');

        Route::post(
            '/{profile:handle}/status/{post}/destroy',
            [PostController::class, 'destroy']
        )->name('posts.destroy');

        Route::post(
            '/{profile:handle}/status/{post}/like',
            [PostController::class, 'like']
        )->name('posts.like');

        Route::post(
            '/{profile:handle}/status/{post}/unlike',
            [PostController::class, 'unlike']
        )->name('posts.unlike');
    });

    Route::post(
        '/{profile:handle}/follow',
        [ProfileController::class, 'follow']
    )->name('profiles.follow');

    Route::post(
        '/{profile:handle}/status/{post}/unfollow',
        [ProfileController::class, 'unfollow']
    )->name('posts.unfollow');
});



Route::get('/{profile:handle}', [ProfileController::class, 'show'])->name('profiles.show');
Route::get('/{profile:handle}/with_replies', [ProfileController::class, 'replies'])->name('profiles.replies');

Route::scopeBindings()->group(function () {
    Route::get('/{profile:handle}/status/{post}', [PostController::class, 'show'])->name('posts.show');
});
