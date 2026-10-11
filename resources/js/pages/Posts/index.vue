<template>
    <Layout>

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

            <PostForm :profile="profile"></PostForm>

            <!-- Feed -->
            <ol class="mt-4">
                <post v-for="item in posts" :key="item.id" :post="item"></post>
            </ol>

            <footer class="mt-30 ml-14">
                <p class="text-center">That's all, folks!</p>
                <hr class="border-pixl-light/10 my-4" />
                <!-- White noise -->
                <img src="/images/white-noise.gif" class="h-20 w-full" />
            </footer>

        </main>
    </Layout>
</template>

<script setup>
import Layout from "../Layouts/layout.vue";
import PostForm from "../Components/PostForm.vue";
import Post from "../Components/Post.vue";
defineProps({
    profile: Object,
    posts: Array,
});

</script>
