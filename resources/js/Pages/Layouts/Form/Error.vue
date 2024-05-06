<template>
    <span  v-if="error" class="text-red-500 text-sm">{{error}}</span>
</template>

<script setup>
defineProps({
    error:String
})
</script>

<style scoped>

</style>
