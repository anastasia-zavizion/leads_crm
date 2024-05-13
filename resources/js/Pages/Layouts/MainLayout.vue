<template>
    <Navbar/>
    <!-- Content -->
    <div class="container mx-auto lg:px-40 px-6 mt-4">
        <slot></slot>
    </div>
</template>

<script setup>
import Navbar from './Navbar.vue';
</script>
