<template>
    <div class="mb-4">
        <Link class="btn">Add New Task</Link>
    </div>
    <LeadInfo :lead="props.lead"/>
</template>
<script setup>
import LeadInfo from "./Componets/LeadInfo.vue";
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    lead: Object
})
</script>
