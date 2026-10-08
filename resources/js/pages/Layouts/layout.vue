<template>
    <div class="flex gap-10 w-full mx-auto min-h-screen">
        <navigation />

        <slot />


        <Aside />
    </div>
</template>>

<script setup>
import Navigation from '../Components/Navigation.vue';
import Aside from '../Components/Aside.vue';
</script>