<template>
<div>

    <div class="mt-4">
        <Table>
            <template #header>
                <tr>
                    <TableTh>Name</TableTh>
                    <TableTh>First Name</TableTh>
                    <TableTh>Status</TableTh>
                    <TableTh></TableTh>
                </tr>
            </template>
            <tr v-for="lead in props.leads.data">
                <TableTd><Link class="link" :href="route('leads.show',lead.id)">{{lead.name}}</Link></TableTd>
                <TableTd><Link class="link" :href="route('leads.show',lead.id)">{{lead.first_name}}</Link></TableTd>
                <TableTd><LeadStatus :lead="lead"/></TableTd>
                <TableTd>
                    <div class="flex gap-2">
                        <Link :href="route('leads.edit',lead.id)"><PencilIcon class="icon"></PencilIcon></Link>
                        <Link :onBefore="() => confirm()" as="button" method="DELETE"
                              :href="route('leads.destroy',lead.id)">
                            <XMarkIcon class="icon"></XMarkIcon>
                        </Link>
                    </div>
                </TableTd>
            </tr>
        </Table>
    </div>

    <div class="mt-8">
        <Link :class="{'bg-emerald-100':link.active}"  v-html="link.label" class="p-4 border border-slate-500"  v-for="(link,index) in props.leads.links" :key="index" :href="link.url"/>
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
    leads:Object
})

import common from "../../common.js";
const {confirm} = common();

</script>
