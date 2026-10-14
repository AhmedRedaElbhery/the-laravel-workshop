<template>
    <li class="flex items-start gap-4 not-first:pt-2.5">
        <a :href="route('profiles.show', post.profile)" class="shrink-0">
            <img :src="post.profile.avatar_url" :alt="`Avatar for ${post.profile.name}`" class="size-10 object-cover" />
        </a>
        <div class="border-pixl-light/10 grow border-b pt-1.5 pb-5">
            <div class="flex items-center justify-between gap-4">
                <div class="flex items-center gap-2.5">
                    <p><a class="hover:underline" :href="route('profiles.show', post.profile)">{{
                        post.profile.name }}</a></p>
                    <p class="text-pixl-light/40 text-xs"><a :href="route('posts.show', [post.profile, post])">{{
                        post.created_at }}</a>
                    </p>
                    <p>
                        <a class="text-pixl-light/40 hover:text-pixl-light/60 text-xs"
                            :href="route('profiles.show', post.profile)">{{ post.profile.handle }}</a>
                    </p>
                </div>
                <Menu as="div" class="relative">
                    <MenuButton class="group flex gap-0.75 py-2" aria-label="Post options">
                        <span class="bg-pixl-light/40 group-hover:bg-pixl-light/60 size-1"></span>
                        <span class="bg-pixl-light/40 group-hover:bg-pixl-light/60 size-1"></span>
                        <span class="bg-pixl-light/40 group-hover:bg-pixl-light/60 size-1"></span>
                    </MenuButton>

                    <MenuItems
                        class="absolute right-0 z-50 mt-2 w-40 border border-pixl-light/10 bg-pixl-dark py-1 shadow-lg focus:outline-none">
                        <MenuItem class="w-full" v-slot="{ active }">
                            <Link method="post" :href="route('posts.destroy', [post.profile, post])">
                                <button class="w-full px-4 py-2 text-left text-sm"
                                    :class="{ 'bg-pixl-light/10': active }">
                                    Delete
                                </button>
                            </Link>
                        </MenuItem>
                    </MenuItems>
                </Menu>
            </div>

            <div class="mt-4 flex flex-col gap-3 text-sm">
                {{ post.content }}

                <ul v-if="!!post.repost_of">
                    <Post :post="post.repost_of" :engagement="false"></Post>
                </ul>

            </div>
            <!-- Action buttons -->

            <div v-if="engagement" class="mt-6 flex items-center justify-between gap-4">

                <div class="flex items-center gap-8">
                    <!-- Like -->
                    <LikeButton :post="post" :id="post.id"></LikeButton>
                    <!-- Comment -->
                    <ReplyButton :post="post" :id="post.id" @click="showReplyForm = true"></ReplyButton>
                    <!-- Re-post -->
                    <RepostButton :post="post" :id="post.id"></RepostButton>

                </div>
                <div class="flex items-center gap-3">
                    <!-- Save -->
                    <SaveButton :id="post.id"></SaveButton>>
                    <!-- Share -->
                    <ShareButton :id="post.id"></ShareButton>
                </div>
            </div>

            <ReplyForm v-show="showReplyForm" :post="post" @success="showReplyForm = false"></ReplyForm>

            <ol v-if="showReplies" class="mt-5">
                <!-- Reply -->
                <Reply v-for="reply in post.replies" :key="reply.id" :reply="reply" :engagmente="true"
                    :show-replies="true"></Reply>
            </ol>

        </div>
    </li>

</template>

<script setup>
import LikeButton from './LikeButton.vue';
import ReplyButton from './ReplyButton.vue';
import RepostButton from './RepostButton.vue';
import SaveButton from './SaveButton.vue';
import ShareButton from './ShareButton.vue';
import ReplyForm from './ReplyForm.vue';
import Reply from './Reply.vue';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import {
    Menu,
    MenuButton,
    MenuItems,
    MenuItem
} from '@headlessui/vue';

defineProps({
    post: Object,
    engagement: { type: Boolean, default: true },
    showReplies: { type: Boolean, default: false },
})
let showReplyForm = ref(false);

</script>