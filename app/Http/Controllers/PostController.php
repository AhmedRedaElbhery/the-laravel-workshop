<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Post;
use App\Models\Profile;
use App\Queries\TimelineQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $profile = Auth::user()->profile;
        $posts = TimelineQuery::forViewer($profile)->get();

        return view('post.index', compact('posts', 'profile'));
    }

    public function show(Profile $profile, Post $post)
    {
        $post->load([
            'replies' => fn($q) => $q
                ->withCount(['likes', 'replies', 'reposts'])
                ->with(['profile', 'parent.profile', 'replies' => fn($q) => $q
                    ->withCount(['likes', 'replies', 'reposts'])
                    ->with(['profile', 'parent.profile'])
                    ->oldest()])
                ->oldest()
        ]);

        $post->loadCount(['likes', 'replies', 'reposts']);

        return view('post.show', compact('post'));
    }

    public function store(CreatePostRequest $request)
    {
        $profile = Auth::user()->profile;

        $post = Post::publish($profile, $request->content);

        return redirect()->route('posts.index');
    }

    public function reply(Profile $profile, Post $post, CreatePostRequest $request)
    {
        $currentProfile = Auth::user()->profile;

        $post = Post::reply($currentProfile, $post, $request->content);

        return redirect()->route('posts.index');
    }

    public function repost(Profile $profile, Post $post)
    {
        $currentProfile = Auth::user()->profile;

        $post = Post::repost($currentProfile, $post);

        return redirect()->route('posts.index');
    }

    public function qoute(Profile $profile, Post $post, CreatePostRequest $request)
    {
        $currentProfile = Auth::user()->profile;

        $post = Post::repost($currentProfile, $post, $request->content);

        return redirect()->route('posts.index');
    }

    public function destroy(Profile $profile, Post $post)
    {
        $currentProfile = Auth::user()->profile;
        $success = false;

        if ($currentProfile->id === $profile->id) {
            $success = $post->delete() > 0;
            return response()->json(compact('success'));
        }

        $repost = $post->reposts()->where('profile_id', $currentProfile->id)->first();

        if (!is_null($repost)) {
            $success = $repost->delete() > 0;
            return response()->json(compact('success'));
        }

        return response()->json(compact('success'));
    }

    public function like(Profile $profile, Post $post)
    {
        $currentProfile = Auth::user()->profile;

        $like = Like::createLike($currentProfile, $post);

        return response()->json(compact('like'));
    }


    public function unlike(Profile $profile, Post $post)
    {
        $currentProfile = Auth::user()->profile;

        $like = Like::removeLike($currentProfile, $post);

        return response()->json(compact('unlike'));
    }
}
