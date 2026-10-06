<li class="group/li relative flex items-start gap-4 pt-4">
    <!-- Line-through -->
    <div aria-hidden="true" class="bg-pixl-light/10 absolute top-0 left-5 h-full w-px group-last/li:h-4">
    </div>
    <a href="{{ route('profiles.show', $reply->profile) }}" class="isolate shrink-0">
        <img src="{{ $reply->profile->avatar_url }}" alt="Avatar for {{ $reply->Profile->name }}"
            class="size-10 object-cover" />
    </a>
    <div class="border-pixl-light/10 grow border-b pt-1.5 pb-5">
        <div class="flex items-center justify-between gap-4">
            <div class="flex items-center gap-2.5">
                <p>
                    <a class="hover:underline"
                        href="{{ route('profiles.show', $reply->profile) }}">{{ $reply->Profile->name }}</a>
                </p>
                <p class="text-pixl-light/40 text-xs"><a
                        href="{{ route('posts.show', [$reply->profile, $reply]) }}">{{ $reply->created_at }}<a /></p>
                <p>
                    <a class="text-pixl-light/40 hover:text-pixl-light/60 text-xs"
                        href="{{ route('profiles.show', $reply->profile) }}">{{ $reply->Profile->handle }}</a>
                </p>
            </div>

        </div>
        <div class="mt-4 flex flex-col gap-3 text-sm">
            {!! $reply->content !!}
        </div>

        @if ($engagement)
            <!-- Action buttons -->
            <div class="mt-6 flex items-center justify-between gap-4">


                <div class="flex items-center gap-8">

                    <!-- Like -->
                    <div class="flex items-center gap-1">
                        <button aria-label="Like" class="hover:text-pixl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-[17px]" viewBox="0 0 20 17">
                                <g fill="currentColor" clip-path="url(#a)">
                                    <path
                                        d="M5.714 0H2.857v2.857h2.857V0Zm2.858 0H5.714v2.857h2.858V0Zm2.857 2.858H8.57v2.857h2.858V2.858ZM14.288 0h-2.857v2.857h2.857V0Z" />
                                    <path d="M17.143 0h-2.857v2.857h2.857V0ZM20 2.858h-2.857v2.857H20V2.858Z" />
                                    <path d="M20 5.714h-2.857v2.858H20V5.714ZM2.857 2.858H0v2.857h2.857V2.858Z" />
                                    <path
                                        d="M2.857 5.714H0v2.858h2.857V5.714Zm2.857 2.858H2.857v2.857h2.857V8.572Zm2.858 2.858H5.714v2.857h2.858v-2.858Zm8.571-2.858h-2.857v2.857h2.857V8.572Zm-2.855 2.858h-2.857v2.857h2.857v-2.858Z" />
                                    <path d="M11.429 14.286H8.57v2.858h2.858v-2.858Z" />
                                </g>
                                <defs>
                                    <clipPath id="a">
                                        <path fill="#fff" d="M0 0h20v17H0z" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                        <span class="text-sm">{{ $reply->likes_count }}</span>
                    </div>
                    <!-- Comment -->
                    <div class="flex items-center gap-1">
                        <button aria-label="Comment" class="hover:text-pixl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-[17px]" viewBox="0 0 20 17">
                                <g fill="currentColor" clip-path="url(#a)">
                                    <path d="M3.581 0h1.824v1.824H3.581z" />
                                    <path
                                        d="M1.824 0h1.824v1.824H1.824zm0 10.947h1.824v1.824H1.824zM0 3.649h1.824v1.824H0zm0-1.825h1.824v1.824H0zm18.176 1.825H20v1.824h-1.824zm0-1.825H20v1.824h-1.824z" />
                                    <path
                                        d="M0 5.472h1.824v1.824H0zm18.176 0H20v1.824h-1.824zM0 7.297h1.824v1.824H0zm18.176 0H20v1.824h-1.824zM0 9.121h1.824v1.824H0zm18.176 0H20v1.824h-1.824zM3.647 10.947h1.824v1.824H3.647zm9.056 0h1.824v1.824h-1.824zm-7.23 0h1.824v1.824H5.473zm1.824 1.824h1.824v1.824H7.297zm3.581 0h1.824v1.824h-1.824z" />
                                    <path
                                        d="M9.122 14.594h1.824v1.824H9.122zm0-9.122h1.824v1.824H9.122zm-3.717 0h1.824v1.824H5.405zm7.431 0h1.824v1.824h-1.824zm1.691 5.475h1.824v1.824h-1.824zM5.405 0h1.824v1.824H5.405zM7.23 0h1.824v1.824H7.23zm1.826 0h1.824v1.824H9.056z" />
                                    <path
                                        d="M10.878 0h1.824v1.824h-1.824zm1.825 0h1.824v1.824h-1.824zm1.824 0h1.824v1.824h-1.824zm1.824 0h1.824v1.824h-1.824zm0 10.947h1.824v1.824h-1.824z" />
                                </g>
                                <defs>
                                    <clipPath id="a">
                                        <path fill="#fff" d="M0 0h20v17H0z" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                        <span class="text-sm">{{ $reply->replies_count }}</span>
                    </div>
                    <!-- Re-post -->
                    <div class="flex items-center gap-1">
                        <button aria-label="Re-post" class="hover:text-pixl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-[17px]" viewBox="0 0 20 17">
                                <path fill="currentColor" d="M1.429 3.857H0v1.429h1.429V3.857Z" />
                                <path fill="currentColor" d="M2.854 3.857H1.426v1.429h1.428V3.857Z" />
                                <path fill="currentColor"
                                    d="M2.854 2.429H1.426v1.429h1.428V2.429Zm1.432 0H2.858v1.429h1.428v-1.43Z" />
                                <path fill="currentColor" d="M4.286 1H2.858v1.429h1.428V1Z" />
                                <path fill="currentColor"
                                    d="M5.712 1H4.284v1.429h1.428V1Zm1.432 0H5.716v1.429h1.428V1Z" />
                                <path fill="currentColor" d="M7.144 2.429H5.716v1.429h1.428v-1.43Z" />
                                <path fill="currentColor" d="M8.57 2.429H7.142v1.429H8.57V2.429Z" />
                                <path fill="currentColor"
                                    d="M8.57 3.857H7.142v1.429H8.57V3.857Zm1.43 0H8.572v1.429H10V3.857ZM5.712 2.429H4.284v1.429h1.428V2.429Z" />
                                <path fill="currentColor" d="M5.712 3.857H4.284v1.429h1.428V3.857Z" />
                                <path fill="currentColor" d="M5.712 5.286H4.284v1.429h1.428V5.286Z" />
                                <path fill="currentColor"
                                    d="M5.712 6.714H4.284v1.429h1.428V6.714Zm0 1.429H4.284v1.429h1.428V8.143Zm1.432 1.429H5.716V11h1.428V9.57Z" />
                                <path fill="currentColor"
                                    d="M8.57 9.572H7.142V11H8.57V9.572ZM11.428 11H10v1.428h1.428V11Zm1.428 0h-1.428v1.428h1.428V11Zm0 1.429h-1.428v1.428h1.428V12.43Zm1.43 0h-1.428v1.428h1.428V12.43Zm1.428 1.428h-1.428v1.429h1.428v-1.429Z" />
                                <path fill="currentColor"
                                    d="M17.142 13.857h-1.428v1.429h1.428v-1.429Zm-2.856 0h-1.428v1.429h1.428v-1.429Zm2.856-1.428h-1.428v1.428h1.428V12.43Zm1.43 0h-1.428v1.428h1.428V12.43Zm0-1.429h-1.428v1.428h1.428V11Z" />
                                <path fill="currentColor"
                                    d="M20 11h-1.429v1.428H20V11Zm-4.286 1.429h-1.428v1.428h1.428V12.43Zm0-1.429h-1.428v1.428h1.428V11Zm0-1.428h-1.428V11h1.428V9.572Z" />
                                <path fill="currentColor"
                                    d="M15.714 8.143h-1.428v1.429h1.428V8.143Zm0-1.429h-1.428v1.429h1.428V6.714Z" />
                                <path fill="currentColor"
                                    d="M15.714 5.286h-1.428v1.429h1.428V5.286Zm-1.428 0h-1.428v1.429h1.428V5.286Zm-1.43 0h-1.428v1.429h1.428V5.286Z" />
                            </svg>
                        </button>
                        <span class="text-sm">{{ $reply->reposts_count }}</span>
                    </div>

                </div>


            </div>
        @endif

        @if ($showReplies)
            <ol class="mt-5">
                <!-- Reply -->
                @foreach ($reply->replies as $reply)
                    <x-reply :reply="$reply" :engagmente="true" :show-replies="true" />
                @endforeach
            </ol>

        @endif
    </div>

</li>
