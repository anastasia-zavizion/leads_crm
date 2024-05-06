<template>
    <label :for="fieldName" class="block text-sm font-medium text-gray-700">{{title}}</label>
</template>

<script setup>
const props = defineProps({
    fieldName:String,
    title:String
})

</script>
