<div class="mt-10 border border-pixl-light/40 p-3">
    <h4 class="text-pixl-light/40">Artists to follow</h4>
    <ol class="flex flex-col gap-2 mt-3">
        @foreach ($artists as $artist)

            <li class="flex my-1.5 items-center justify-between gap-2">

                <div class="flex items-center justify-between gap-3">
                  <img src="{{ $artist['img'] }}" class="size-8" />
                  <p class="text-sm truncate">{{ $artist['name'] }}</p>
                </div>

                <button class="border border-pixl/30 text-pixl/80 py-0.5 px-2.5">Follow</button>
              </li>

        @endforeach

      <a href="#" class="text-pixl-light/50 mt-1.5 inline-block">see more</a>

  </div>