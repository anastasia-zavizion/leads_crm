<template>
    <FormMainLayout backRoute="leads.index" :formTitle="title">
        <form @submit.prevent="handleRequest" :method="method">
            <div class="mb-3">
                <Label fieldName="name" title="Name"/>
                <input  v-model="form.name" id="name" name="name" type="text" class="baseInput">
                <Error :error="form.errors.name"/>
            </div>

            <div class="mb-3">
                <Label fieldName="first_name" title="First Name"/>
                <input  v-model="form.first_name" id="first_name" name="first_name" type="text" class="baseInput">
                <Error :error="form.errors.first_name"/>
            </div>

            <div class="mb-3">
                <Label fieldName="address" title="Address"/>
                <input  v-model="form.address" id="address" name="address" type="text" class="baseInput">
                <Error :error="form.errors.address"/>
            </div>

            <div class="mb-3">
                <Label fieldName="city" title="City"/>
                <input  v-model="form.city" id="city" name="city" type="text" class="baseInput">
                <Error :error="form.errors.city"/>
            </div>

            <div class="mb-3">
                <Label fieldName="country" title="Country"/>
                <input  v-model="form.country" id="country" name="country" type="text" class="baseInput">
                <Error :error="form.errors.country"/>
            </div>

            <div class="mb-3">
                <Label fieldName="postcode" title="Postcode"/>
                <input  v-model="form.postcode" id="postcode" name="postcode" type="text" class="baseInput">
                <Error :error="form.errors.postcode"/>
            </div>

            <div class="mb-3">
                <Label fieldName="email" title="Email"/>
                <input  v-model="form.email" id="email" name="email" type="text" class="baseInput">
                <Error :error="form.errors.email"/>
            </div>

            <div class="mb-3">
                <Label fieldName="phone" title="Phone"/>
                <input  v-model="form.phone" id="phone" name="phone" type="text" class="baseInput">
                <Error :error="form.errors.phone"/>
            </div>

            <div class="mb-3">
                <Label fieldName="status" title="Status"/>
                <select v-model="form.lead_status_id" name="lead_status_id" class="combobox">
                    <option :value="status.id" :key="status.id" v-for="status in props.statuses">{{status.name}}</option>
                </select>
                <Error :error="form.errors.lead_status_id"/>
            </div>

            <div class="mb-3">
                <Label fieldName="description" title="Description"/>
                <textarea class="textarea" v-model="form.description"  id="description" name="description"></textarea>
                <Error :error="form.errors.description"/>
            </div>

            <Button>{{title}}</Button>
        </form>
    </FormMainLayout>
</template>

<script setup>
import {Link} from '@inertiajs/vue3';
import {useForm} from "@inertiajs/vue3";
import Error from "../../Layouts/Form/Error.vue";
import Button from "../../Layouts/Form/Button.vue";
import Label from "../../Layouts/Form/Label.vue";
import FormMainLayout from "../../Layouts/Form/FormMainLayout.vue";
import initializeAutocomplete from "../../../helpers/googleAutocomplete.js";
import {computed, onMounted} from "vue";

const props = defineProps({
    statuses:Array,
    formTitle:String,
    method:String,
    lead:Object,
})

const title = computed(()=> props.method === 'POST' ? 'Create Lead' : 'Update Lead')

const form = useForm({
    name: props.lead.name ?? '',
    first_name:props.lead.first_name ?? '',
    address:props.lead.address ?? '',
    postcode:props.lead.postcode ?? '',
    city:props.lead.city ?? '',
    country:props.lead.country ?? '',
    phone:props.lead.phone ?? '',
    email:props.lead.email ?? '',
    description:props.lead.description ?? '',
    lead_status_id:props.lead.lead_status_id ?? 1
});

function handleRequest(){
    if(props.method === 'POST'){
        form.post(route('leads.store'));
    }else{
        form.put(route('leads.update', props.lead.id));
    }
}

onMounted(() => {
    initializeAutocomplete("address", form);
})

</script>
