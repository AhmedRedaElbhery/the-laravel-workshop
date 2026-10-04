<x-layout title="PIXL - Feed">
    @include('partials.navigation')

    <main class="flex grow flex-col gap-4 w-[70%] overflow-y-auto px-0.5 pr-2 py-4 scrollbar-none">
        <nav>
            <ul class="flex justify-end gap-8 text-sm">
                <li><a href="#">For you</a></li>
                <li>
                    <a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Idea streams</a>
                </li>
                <li>
                    <a class="text-pixl-light/60 hover:text-pixl-light/80" href="#">Following</a>
                </li>
            </ul>
        </nav>

        <!-- Post prompt -->
        <div class="border-pixl-light/10 mt-8 flex items-start gap-4 border-b pb-4">
            <a href="/profile" class="shrink-0">
                <img src="/images/adrian.png" alt="Avatar for Adrian" class="size-10 object-cover" />
            </a>

            @include('partials.post-form', [
                'labelText' => 'post body',
                'fieldName' => 'post',
                'classes' => 'w-full resize-none text-lg',
                'placeholder' => "What's up _adrian?",
            ])
        </div>

        <!-- Feed -->
        <ol class="mt-4">

            @foreach ($feedItem as $item)
                @include('partials.feed-item', compact('item'))
            @endforeach

        </ol>

        <footer class="mt-30 ml-14">
            <p class="text-center">That's all, folks!</p>
            <hr class="border-pixl-light/10 my-4" />
            <!-- White noise -->
            <img src="/images/white-noise.gif" class="h-20 w-full" />
        </footer>

    </main>

    @include('partials.aside')

</x-layout>
