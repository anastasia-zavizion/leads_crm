<template>

    <form @submit.prevent="login">
        <div class="w-1/2 mx-auto">
            <div class="mb-2">
                <label for="email">E-mail</label>
                <input v-model="form.email" class="input" type="text" id="email" name="email">
                <div v-if="form.errors.email" class="inputError">{{form.errors.email}}</div>
            </div>

            <div class="mb-2">
                <label for="email">Password</label>
                <input v-model="form.password" class="input" type="password" id="password" name="password">
                <div v-if="form.errors.password" class="inputError">{{form.errors.password}}</div>

            </div>

            <div class="mb-2">
                <Button class="btn w-full" type="submit">Login</Button>
            </div>
        </div>
    </form>

</template>

<script setup>

import {Link,useForm} from "@inertiajs/vue3";
import Button from "../Layouts/Form/Button.vue";

const form = useForm({
    email:null,
    password:null,
});

const login = () => form.post(route('login.store'));
</script>

