<template>
    <div class="text-white p-1.5 rounded-md text-center" :class="statusColor(props.lead.status.color)">{{props.lead.status.name}}</div>

</template>

<script setup>
const props = defineProps({
    lead:Object
})

function statusColor(color){
    return 'bg-'+color+'-500'
}

</script>
