<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Like;
use App\Models\Post;
use App\Models\Profile;
use App\Queries\PostThreadQuery;
use App\Queries\TimelineQuery;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PostController extends Controller
{

    public function index()
    {
        $profile = Auth::user()->profile;
        $posts = TimelineQuery::forViewer($profile)->get();

        return Inertia::render('Posts/index', ['profile' => $profile->toResource(), 'posts' => PostResource::collection($posts)]);
    }

    public function show(Profile $profile, Post $post)
    {

        $post = PostThreadQuery::for($post, Auth::user()?->profile)->load();

        return Inertia::render('Posts/show', ['post' => $post->toResource()]);
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

        return back();
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

        if ($currentProfile->id === $profile->id) {
            $post->delete();
            return back();
        }

        $post->reposts()->where('profile_id', $currentProfile->id)->first()?->delete();

        return back();
    }

    public function like(Profile $profile, Post $post)
    {
        $currentProfile = Auth::user()->profile;

        Like::createLike($currentProfile, $post);

        return back();
    }


    public function unlike(Profile $profile, Post $post)
    {
        $currentProfile = Auth::user()->profile;

        Like::removeLike($currentProfile, $post);

        return back();
    }
}
