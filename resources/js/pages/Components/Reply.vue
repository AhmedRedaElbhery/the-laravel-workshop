<template>
    <li class="group/li relative flex items-start gap-4 pt-4">
        <!-- Line-through -->
        <div aria-hidden="true" class="bg-pixl-light/10 absolute top-0 left-5 h-full w-px group-last/li:h-4">
        </div>
        <a :href="route('profiles.show', reply.profile)" class="isolate shrink-0">
            <img :src="reply.profile.avatar_url" :alt="`Avatar for ${reply.Profile.name}`"
                class="size-10 object-cover" />
        </a>
        <div class="border-pixl-light/10 grow border-b pt-1.5 pb-5">
            <div class="flex items-center justify-between gap-4">
                <div class="flex items-center gap-2.5">
                    <p>
                        <a class="hover:underline" :href="route('profiles.show', reply.profile)">{{
                            reply.Profile.name }}</a>
                    </p>
                    <p class="text-pixl-light/40 text-xs"><a :href="route('posts.show', [reply.profile, reply])">{{
                        reply.created_at }}</a>
                    </p>
                    <p>
                        <a class="text-pixl-light/40 hover:text-pixl-light/60 text-xs"
                            :href="route('profiles.show', reply.profile)">{{ reply.Profile.handle }}</a>
                    </p>
                </div>

            </div>
            <div class="mt-4 flex flex-col gap-3 text-sm">
                {{ reply.content }}
            </div>

            <!-- Action buttons -->
            <div v-if="engagement" class="mt-6 flex items-center justify-between gap-4">


                <div class="flex items-center gap-8">

                    <!-- Like -->
                    <LikeButton :post="reply"></LikeButton>
                    <!-- Comment -->
                    <ReplyButton :post="reply"></ReplyButton>
                    <!-- Re-post -->
                    <RepostButton :post="reply"></RepostButton>

                </div>


            </div>

            <ol v-if="showReplies" class="mt-5">
                <!-- Reply -->

                <Reply v-for="item in reply.replies" :key="item.id" :reply="item" :engagmente="true"
                    :show-replies="true"></Reply>

            </ol>
        </div>

    </li>

</template>

<script setup>
import LikeButton from './LikeButton.vue';
import ReplyButton from './ReplyButton.vue';
import RepostButton from './RepostButton.vue';
defineProps({
    engagmente: { type: Boolean, default: true },
    reply: Object,
    showReplies: { type: Boolean, default: true },
})
</script>