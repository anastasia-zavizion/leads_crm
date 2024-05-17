<template>
    <TaskForm :task="task" :lead="lead" method="PUT"></TaskForm>
</template>

<script setup>
import TaskForm from "./Componets/TaskForm.vue";
const props = defineProps({
    lead:Object,
    task:Object
})
</script>
