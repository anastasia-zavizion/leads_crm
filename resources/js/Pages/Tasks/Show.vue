<template>
    <Box>
        <div class="mb-4">
            <div class="font-bold">Task Lead</div>
            <div>
                <Link class="link" :href="route('leads.show',props.lead.id)">{{ props.lead.name }}</Link>
            </div>
        </div>

        <div class="mb-4">
            <div class="font-bold">Title</div>
            <div>{{ props.task.title }}</div>
        </div>

        <div class="mb-4">
            <div class="font-bold">Description</div>
            <div>{{ props.task.description }}</div>
        </div>


        <div class="mb-4">
            <div class="font-bold">Added</div>
            <div>{{ props.task.created_date}}</div>
        </div>

    </Box>
</template>
<script setup>
import {Link} from "@inertiajs/vue3";
import Box from "../../Components/UI/Box.vue";

const props = defineProps({
    lead: Object,
    task: Object,
})
</script>
