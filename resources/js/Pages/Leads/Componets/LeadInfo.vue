<template>
    <Box>
        <template #header>Lead Information</template>

        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <div class="font-bold">Name</div>
                <div class="pl-2">{{ props.lead.name }}</div>
            </div>

            <div class="flex items-center justify-between">
                <div class="font-bold">First Name</div>
                <div class="pl-2">{{ props.lead.first_name }}</div>
            </div>

            <div class="flex items-center justify-between">
                <div class="font-bold">Address</div>
                <div class="pl-2">{{ props.lead.address }}</div>
            </div>


            <div class="flex items-center justify-between">
                <div class="font-bold">Postcode</div>
                <div class="pl-2">{{ props.lead.postcode }}</div>
            </div>

            <div class="flex items-center justify-between">
                <div class="font-bold">City</div>
                <div class="pl-2">{{ props.lead.city }}</div>
            </div>

            <div class="flex items-center justify-between">
                <div class="font-bold">Country</div>
                <div class="pl-2">{{ props.lead.country }}</div>
            </div>

            <div class="flex items-center justify-between">
                <div class="font-bold">Phone</div>
                <div class="pl-2">{{ props.lead.phone }}</div>
            </div>

            <div class="flex items-center justify-between">
                <div class="font-bold">Email</div>
                <div class="pl-2">{{ props.lead.email }}</div>
            </div>

            <div class="flex items-center justify-between">
                <div class="font-bold">Description</div>
                <div class="pl-2">{{ props.lead.description }}</div>
            </div>

            <div class="flex items-center justify-between">
                <div class="font-bold">Status</div>
                <div class="pl-2"><LeadStatus :lead="props.lead"/></div>
            </div>

        </div>
    </Box>
</template>

<script setup>
import Box from "../../../Components/UI/Box.vue";
import LeadStatus from "./../Componets/LeadStatus.vue";
const props = defineProps({
    lead: Object
})
</script>
