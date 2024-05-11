<template>
    <div>You need to be verified first to see this page!</div>
    <div><Link as="button" method="post" class="btn-outline w-full block text-center" :href="route('verification.send',)">Resend link</Link></div>
</template>
<script setup>
import {Link} from "@inertiajs/vue3";
</script>
