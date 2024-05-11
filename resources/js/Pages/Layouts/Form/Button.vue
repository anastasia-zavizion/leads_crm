<template>
    <button type="submit" class="btn">
       <slot></slot>
    </button>
</template>

<script setup>
defineProps({
    title:String
})
</script>
