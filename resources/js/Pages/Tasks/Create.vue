<template>
    <TaskForm :lead="lead" method="POST"></TaskForm>
</template>

<script setup>
import TaskForm from "./Componets/TaskForm.vue";
const props = defineProps({
    lead:Object
})
</script>
