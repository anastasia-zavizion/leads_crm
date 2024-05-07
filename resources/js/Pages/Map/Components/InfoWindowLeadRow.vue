<template>
    <div class="flex justify-between items-center gap-4">
        <div class="font-bold">{{props.label}}</div>
        <div><slot></slot></div>
    </div>
</template>

<script setup>
const props = defineProps({
    label:String
})
</script>
