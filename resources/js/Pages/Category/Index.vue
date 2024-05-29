<script setup>
import Box from '@/Components/Box.vue';
import MasterLayout from '@/Layouts/MasterLayout.vue';
import BreadcrumbComponent from '@/Components/Backend/BreadcrumbComponent.vue';
import {debounce} from 'lodash';
import { reactive } from 'vue';
import { watch } from 'vue';
import { router,Link, Head } from '@inertiajs/vue3';

const props = defineProps({
    categories : Object
});

const breadcrumb = {
    title : 'Category',

    items : [
        {
            name: 'Category',
            link: '/category',
            active: true
        }
    ]
}


const selectAndSearch = reactive({
    count : 20,
    search : ''
});


watch(selectAndSearch, debounce(function() {
    router.get(route('category.index'), selectAndSearch, {
        preserveState: true,
        preserveScroll: true
    });

}, 200));


</script>

<template>
    <Head title="Category" />
    <MasterLayout>
        <BreadcrumbComponent :breadcrumb="breadcrumb" />

        <Box class="space-y-6 h-auto">
            <div class="w-full flex justify-between">
                <h3 class="text-xl text-[#6FD943] font-semibold">Categeory List</h3>
            </div>

            <div class="w-full space-y-5">
                <div class="w-full flex justify-between items-center">
                        <div class="w-1/12">
                            <select class="table-select" v-model="selectAndSearch.count">
                                <option value="10" >10</option>
                                <option value="20" >20</option>
                                <option value="50" >50</option>
                                <option value="100" >100</option>
                            </select>
                        </div>

                        <div class="w-11/12 flex items-center justify-end">
                            <div class="relative max-w-xs">
                                <label for="hs-table-search" class="sr-only">Search</label>
                                <input type="text" v-model="selectAndSearch.search" name="hs-table-search" id="hs-table-search" class="table-search" placeholder="Search for items">
                                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                <svg class="size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.3-4.3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="border rounded-lg shadow overflow-hidden dark:border-neutral-700 dark:shadow-gray-900">
                                <table class="table">
                                    <thead class="bg-gray-50 dark:bg-neutral-700">
                                        <tr>
                                            <th width="5%" class="table-th">SL</th>
                                            <th scope="col" class="table-th">Image</th>
                                            <th scope="col" class="table-th">Name</th>
                                            <th scope="col" class="table-th">Status</th>
                                            <th scope="col" class="table-th text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                        <tr v-for="(category, index) in categories.data" :key="index" >
                                            <td class="table-td">{{ index+1 }}</td>
                                            <td class="table-td">{{ category.image }}</td>
                                            <td class="table-td">{{ category.name }}</td>
                                            <td class="table-td">{{ category.status }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Delete</button>
                                            </td>
                                        </tr>

                                        <tr v-if="categories.data.length == 0">
                                            <th colspan="5" class="text-center p-3 text-gray-400 font-semibold">No data found</th>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="py-1 flex justify-end mt-2" v-if="categories.data.length > 0">
                                <nav class="flex items-center space-x-1">
                                    <Link v-for="(link, index) in categories.links" :key="index" :href="link.url" v-html="link.label" type="button" class="table-paginate"></Link>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </Box>
    </MasterLayout>
</template>

<style scoped>

</style>
