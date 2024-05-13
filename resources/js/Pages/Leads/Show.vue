<template>
    <LeadInfo :lead="props.lead"/>
</template>
<script setup>
import LeadInfo from "./Componets/LeadInfo.vue";
const props = defineProps({
    lead: Object
})
</script>
