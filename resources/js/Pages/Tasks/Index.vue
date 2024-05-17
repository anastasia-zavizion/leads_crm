<template>
<div>

    <div>
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
import {Link} from "@inertiajs/vue3";
import { PencilIcon } from '@heroicons/vue/24/solid'
import { XMarkIcon } from '@heroicons/vue/24/solid'
import LeadStatus from "./Componets/LeadStatus.vue";

const props = defineProps({
    tasks:Array,
    lead:Object
})

import common from "../../common.js";

const {confirm} = common();

</script>
