<template>
   <nav class="relative px-4 py-4 flex justify-between items-center bg-violet-500 text-white">
        <a class="text-3xl font-bold leading-none" href="#">
            Logo
        </a>

        <div class="lg:hidden">
            <button @click="showNavbar" class="navbar-burger flex items-center text-white p-3">
                <svg class="block h-6 w-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>

        <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
            <li>
                <Link class="menuLink" :href="route('leads.index')">Home</Link>
            </li>

            <li v-if="user">
                <Link class="menuLink" :href="route('leads.index')">Leads</Link>
            </li>

            <li v-if="user">
                <Link class="menuLink" :href="route('map.index')">Map</Link>
            </li>

        </ul>

        <Link v-if="!user" class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200" :href="route('login')">Sign In</Link>
    </nav>

    <div v-if="navbar" class="navbar-menu relative z-50">
        <div @click="closeNavbar" class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex items-center mb-8">
                <a class="mr-auto text-3xl font-bold leading-none" href="#">
                    Logo
                </a>
                <button class="navbar-close" @click="closeNavbar">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div>
                <ul class="test">
                    <li v-if="user" class="mb-1 bg-violet-500">
                        <Link class="menuLink" :href="route('leads.index')">Leads</Link>
                    </li>

                    <li v-if="user" class="mb-1 bg-violet-500">
                        <Link class="menuLink" :href="route('map.index')">Map</Link>
                    </li>

                    <li v-if="!user" class="mb-1">
                        <Link class="w-full block lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200" :href="route('login')">Sign In</Link>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";

import {ref, computed} from "vue";
const navbar = ref(false);
function closeNavbar(){
    navbar.value = false;
}
function showNavbar(){
    navbar.value = true;
}
import { usePage } from '@inertiajs/vue3';
let page = usePage()
let user = computed(() => page.props.user)
</script>
