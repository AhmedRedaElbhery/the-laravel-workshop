<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


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

    return redirect()->route('/feed');
});


Route::get('/profile', function () {

    $feedItem = json_decode(json_encode([
        [
            'postedTimeAgo' => '5h',
            'content' =>  <<<str
            <p>
                Presumably, if you're watching this series, you've already made
                the decision to embrace all that Laravel has to offer. However,
                if you're still on the fence, give me just a moment to sell you
                on why I believe Laravel is the best framework choice in the PHP
                world.
            </p>
        str,
            'profile' => [
                'avatar' => '/images/adelle.png',
                'name' => 'Adelle',
                'handle' => '@ad-elle',
            ],
            'likeCount' => 20,
            'replyCount' => 10,
            'repostCount' => 5,
            'replies' =>
            [[
                'replyTimeAgo' => '5h',
                'replyLikes' => '20',
                'replyComments' => '10',
                'replyRepost' => '5',
                'replyContent' =>  ' <p> reply on this post </p>',
                'replyProfile' => [
                    'avatar' => '/images/simon-chilling.png',
                    'name' => 'simon',
                    'handle' => '@simonswis',
                ],
            ]]
        ]
    ]));


    return view('profile', compact('feedItem'));
});

Route::get('/feed', function () {

    $feedItem = json_decode(json_encode([
        [
            'postedTimeAgo' => '5h',
            'likeCount' => 20,
            'replyCount' => 10,
            'repostCount' => 5,
            'content' =>  <<<str
            <p>
                Presumably, if you're watching this series, you've already made
                the decision to embrace all that Laravel has to offer. However,
                if you're still on the fence, give me just a moment to sell you
                on why I believe Laravel is the best framework choice in the PHP
                world.
            </p>
        str,
            'profile' => [
                'avatar' => '/images/adelle.png',
                'name' => 'Adelle',
                'handle' => '@ad-elle',
            ],

            'replies' =>
            [[
                'replyTimeAgo' => '5h',
                'replyLikes' => '20',
                'replyComments' => '10',
                'replyRepost' => '5',
                'replyContent' =>  <<<str
                    <p>
                       reply on this post
                    </p>
                str,
                'replyProfile' => [
                    'avatar' => '/images/simon-chilling.png',
                    'name' => 'simon',
                    'handle' => '@simonswis',
                ],
            ]]
        ]
    ]));

    return view('feed', compact('feedItem'));
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
