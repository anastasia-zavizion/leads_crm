<template>
<div>

    <div v-if="props.tasks.data" class="mb-4">
        <form @submit.prevent="generatePdf">
          <Button>Generate PDF Report</Button>
        </form>
    </div>

    <div v-if="props.lead" class="mb-4">
        <Link class="linkBtn" :href="route('leads.show',props.lead.id)">Back to Lead</Link>
    </div>

    <div class="mt-4">
        <Table>
            <template #header>
                <tr>
                    <TableTh>Title</TableTh>
                    <TableTh></TableTh>
                </tr>
            </template>
            <tr v-for="task in props.tasks.data">
                <TableTd><Link class="link" :href="route('leads.tasks.show',[task.lead.id,task.id])">{{task.title}}</Link></TableTd>
                <TableTd>
                    <div class="flex gap-2">
                        <Link :href="route('leads.tasks.edit',[task.lead.id, task.id])">
                            <PencilIcon class="icon"></PencilIcon>
                        </Link>
                        <Link :onBefore="() => confirm()" as="button" method="DELETE"
                              :href="route('leads.tasks.destroy',[task.lead.id, task.id])">
                            <XMarkIcon class="icon"></XMarkIcon>
                        </Link>
                    </div>
                </TableTd>
            </tr>
        </Table>
    </div>

    <div class="mt-8">
        <Link :class="{'bg-emerald-300':link.active}"  v-html="link.label" class="p-4 border border-slate-500"  v-for="(link,index) in props.tasks.links" :key="index" :href="link.url"/>
    </div>

</div>
</template>

<script setup>
import TableTh from "../Layouts/Form/TableTh.vue";
import Table from "../Layouts/Form/Table.vue";
import TableTd from "../Layouts/Form/TableTd.vue";
import {Link, useForm} from "@inertiajs/vue3";
import { PencilIcon } from '@heroicons/vue/24/solid'
import { XMarkIcon } from '@heroicons/vue/24/solid'
import LeadStatus from "./Componets/LeadStatus.vue";
import axios from 'axios';
const props = defineProps({
    tasks:Object,
    lead:Object
})

import common from "../../common.js";
import {computed} from "vue";
import Button from "../Layouts/Form/Button.vue";

const {confirm} = common();

function generatePdf(){
    const url = props.lead ? route('tasks.report', { lead: props.lead }) : route('tasks.report');
    axios.get(url, { responseType: 'blob' })
        .then(response => {
            const url = window.URL.createObjectURL(new Blob([response.data]));
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', 'task_report.pdf');
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        })
        .catch(error => {
            console.error('Error generating PDF:', error);
        });
}
</script>
