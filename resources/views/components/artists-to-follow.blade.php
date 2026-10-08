<div class="mt-10 border border-pixl-light/40 p-3">
    <h4 class="text-pixl-light/40">Artists to follow</h4>
    <ol class="flex flex-col gap-2 mt-3">
        @foreach ($profiles as $profile)
            <li class="flex my-1.5 items-center justify-between gap-2">

                <!-- 1. Added "min-w-0" to allow truncation inside flexbox -->
                <div class="flex items-center gap-3 min-w-0">
                    <img src="{{ $profile->avatar_url }}" class="size-8 shrink-0 object-cover" />
                    <!-- 2. "truncate" will now properly truncate long names -->
                    <p class="text-sm truncate">{{ $profile->name }}</p>
                </div>

                <!-- 3. Added "shrink-0" so the button never gets squished or pushed out -->
                <button class="border border-pixl/30 text-pixl/80 py-0.5 px-2.5 shrink-0">Follow</button>
            </li>
        @endforeach
    </ol>
    <a href="#" class="text-pixl-light/50 mt-1.5 inline-block">see more</a>
</div>
