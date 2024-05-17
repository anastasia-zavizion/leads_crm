<template>
    <FormMainLayout backRoute="leads.index" :formTitle="title">
        <form @submit.prevent="handleRequest" :method="method">
            <div class="mb-3">
                <Label fieldName="title" title="Title"/>
                <input  v-model="form.title" id="title" name="title" type="text" class="baseInput">
                <Error :error="form.errors.title"/>
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
import {computed, onMounted} from "vue";

const props = defineProps({
    formTitle:String,
    method:String,
    lead:Object,
    task:Object,
})

console.log(props.task);

const title = computed(()=> props.method === 'POST' ? 'Create Task' : 'Update Task')

const form = useForm({
    title: (props.task && props.task.title) ?? '',
    description: (props.task && props.task.description) ?? '',
});

function handleRequest(){
    if(props.method === 'POST'){
        form.post(route('leads.tasks.store',{lead:props.lead.id}));
    }else{
        form.put(route('leads.tasks.update', {lead:props.lead.id,task:props.task.id}));
    }
}
</script>
