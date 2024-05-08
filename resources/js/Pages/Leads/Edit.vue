<template>
    <LeadForm :statuses="props.statuses" :lead="props.lead" method="PUT"></LeadForm>
</template>

<script setup>
import LeadForm from "./Componets/LeadForm.vue";
const props = defineProps({
    lead:Object,
    statuses:Array
})
</script>
