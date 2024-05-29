<script setup>
import Box from '@/Components/Box.vue';
import MasterLayout from '@/Layouts/MasterLayout.vue';
import BreadcrumbComponent from '@/Components/Backend/BreadcrumbComponent.vue';

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
                            <select class="table-select">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>

                        <div class="w-11/12 flex items-center justify-end">
                            <div class="relative max-w-xs">
                                <label for="hs-table-search" class="sr-only">Search</label>
                                <input type="text" name="hs-table-search" id="hs-table-search" class="table-search" placeholder="Search for items">
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
                                        <tr>
                                            <td class="table-td">1</td>
                                            <td class="table-td">John Brown</td>
                                            <td class="table-td">45</td>
                                            <td class="table-td">New York No. 1 Lake Park</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="py-1 flex justify-end mt-2">
                                <nav class="flex items-center space-x-1">
                                    <button type="button" class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                    </button>
                                    <button type="button" class="table-paginate" aria-current="page">1</button>
                                    <button type="button" class="table-paginate">2</button>
                                    <button type="button" class="table-paginate">3</button>
                                    <button type="button" class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10">
                                    <span class="sr-only">Next</span>
                                    <span aria-hidden="true">»</span>
                                    </button>
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
