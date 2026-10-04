<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
