<li class="flex items-start gap-4 not-first:pt-2.5">
    <a href="{{ route('profiles.show', $post->profile) }}" class="shrink-0">
        <img src="{{ $post->profile->avatar_url }}" alt="Avatar for {{ $post->profile->name }}"
            class="size-10 object-cover" />
    </a>
    <div class="border-pixl-light/10 grow border-b pt-1.5 pb-5">
        <div class="flex items-center justify-between gap-4">
            <div class="flex items-center gap-2.5">
                <p><a class="hover:underline"
                        href="{{ route('profiles.show', $post->profile) }}">{{ $post->profile->name }}</a></p>
                <p class="text-pixl-light/40 text-xs"><a
                        href="{{ route('posts.show', [$post->profile, $post]) }}">{{ $post->created_at }}</a>
                </p>
                <p>
                    <a class="text-pixl-light/40 hover:text-pixl-light/60 text-xs"
                        href="{{ route('profiles.show', $post->profile) }}">{{ $post->profile->handle }}</a>
                </p>
            </div>
            <button class="group flex gap-0.75 py-2" aria-label="Post options">
                <span class="bg-pixl-light/40 group-hover:bg-pixl-light/60 size-1"></span>
                <span class="bg-pixl-light/40 group-hover:bg-pixl-light/60 size-1"></span>
                <span class="bg-pixl-light/40 group-hover:bg-pixl-light/60 size-1"></span>
            </button>
        </div>
        <div class="mt-4 flex flex-col gap-3 text-sm">
            {{ $post->content }}

            @if ($post->isRepost() && $post->content != null)
                <ul>
                    <x-post :post="$post->repostOf" :engagement=false />
                </ul>
            @endif

        </div>
        <!-- Action buttons -->
        @if ($engagement)
            <div class="mt-6 flex items-center justify-between gap-4">

                <div class="flex items-center gap-8">

                    <!-- Like -->
                    <x-like-button :post="$post" />
                    <!-- Comment -->
                    <x-reply-button :post="$post" />
                    <!-- Re-post -->
                    <x-repost-button :post="$post" />

                </div>
                <div class="flex items-center gap-3">
                    @if ($engagement)
                        <!-- Save -->
                        <x-save-button />
                        <!-- Share -->
                        <x-share-button />
                    @endif
                </div>
            </div>
        @endif

        <x-reply-form :post="$post" />

        @if ($showReplies)
            <ol class="mt-5">
                <!-- Reply -->
                @foreach ($post->replies as $reply)
                    <x-reply :reply="$reply" :engagmente="true" :show-replies="true" />
                @endforeach
            </ol>

        @endif
    </div>
</li>
