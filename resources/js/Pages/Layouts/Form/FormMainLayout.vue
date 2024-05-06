<template>
    <div class="flex justify-center">
        <div class="w-full py-4">
            <div class="bg-gray-100 shadow-sm rounded-lg overflow-hidden">
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-700">{{formTitle}}</h2>

                    <Link v-if="backRoute" class="link btn" :href="route(backRoute)">Back</Link>
                </div>
                <div class="px-4 py-5 sm:p-6">
                 <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    formTitle:String,
    backRoute:String
})
</script>

<style scoped>

</style>
