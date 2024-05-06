<template>
    <button type="submit" class="btn">
        {{title}}
    </button>
</template>

<script setup>
defineProps({
    title:String
})
</script>
