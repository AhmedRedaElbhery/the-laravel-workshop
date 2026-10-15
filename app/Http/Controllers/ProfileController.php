<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use App\Models\Profile;
use App\Queries\ProfilePageQuery;
use App\Queries\ProfileWithReplyQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function show(Profile $profile)
    {
        $profile->loadCount(['followings', 'followers']);

        $profile->has_followed = Auth::user()->profile->followings()->where(['following_profile_id' => $profile->id])->exists();

        $posts = ProfilePageQuery::for($profile, Auth::user()->profile)->get();

        return Inertia::render('profiles/show', ['profile' => $profile->toResource(), 'posts' => $posts->toResourceCollection()]);
    }


    public function replies(Profile $profile)
    {

        $profile->loadCount(['followings', 'followers']);

        $posts = ProfileWithReplyQuery::for($profile, Auth::user()->profile)->get();

        return Inertia::render('profiles/replies', ['profile' => $profile->toResource(), 'posts' => $posts->toResourceCollection()]);
    }

    public function follow(Profile $profile)
    {
        $currentProfile = Auth::user()->profile;

        Follow::createFollow($currentProfile, $profile);

        return back()->with('success', 'You are now Follow this profile');
    }

    public function unfollow(Profile $profile)
    {
        $currentProfile = Auth::user()->profile;

        Follow::removeFollow($currentProfile, $profile);

        return back()->with('success', 'You are now UnFollow this profile');
    }
}
