<template>
<div>
    <Table>
        <template #header>
            <tr>
                <TableTh>Name</TableTh>
                <TableTh>First Name</TableTh>
                <TableTh>Status</TableTh>
                <TableTh></TableTh>
            </tr>
        </template>
        <tr v-for="lead in props.leads">
            <TableTd><Link class="link" :href="route('leads.show',lead.id)">{{lead.name}}</Link></TableTd>
            <TableTd><Link class="link" :href="route('leads.show',lead.id)">{{lead.first_name}}</Link></TableTd>
            <TableTd>{{lead.lead_status_id}}</TableTd>
            <TableTd class="flex">
                <Link :href="route('leads.edit',lead.id)"><PencilIcon class="icon"></PencilIcon></Link>
                <Link :onBefore="() => confirm()" as="button" method="DELETE"
                      :href="route('leads.destroy',lead.id)">
                    <XMarkIcon class="icon"></XMarkIcon>
                </Link>
            </TableTd>
        </tr>
    </Table>

</div>
</template>

<script setup>
import TableTh from "../Layouts/Form/TableTh.vue";
import Table from "../Layouts/Form/Table.vue";
import TableTd from "../Layouts/Form/TableTd.vue";
import {Link} from "@inertiajs/vue3";
import { PencilIcon } from '@heroicons/vue/24/solid'
import { XMarkIcon } from '@heroicons/vue/24/solid'

const props = defineProps({
    leads:Object
})

import common from "../../common.js";

const {confirm} = common();

</script>
