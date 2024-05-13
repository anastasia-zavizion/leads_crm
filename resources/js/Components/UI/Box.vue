<template>
<div class="border border-gray-200 dark:border-gray-800 rounded-md p-4 shadow-sm dark:text-gray-300 mb-2">
    <div class="mb-4 text-gray-500 font-medium" v-if="$slots.header">
        <slot name="header"></slot>
    </div>
    <slot></slot>
</div>
</template>

<script setup>


</script>

<style scoped>

</style>
