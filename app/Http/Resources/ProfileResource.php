<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'avatar_url' => $this->avatar_url,
            'id' => $this->id,
            'name' => $this->name,
            'handle' => $this->handle,
            'bio' => $this->bio,
            'followings_count' => $this->followings_count,
            'followers_count' => $this->followers_count,
            'posts_count' => $this->posts_count,
            'replies_count' => $this->replies_count,
            'reposts_count' => $this->reposts_count,
        ];
    }
}
