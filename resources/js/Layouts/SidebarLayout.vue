<script setup>

</script>

<template>
    <div id="sidebar" class="sidebar w-[0px] sm:min-w-[250px] bg-[#f5f7f9] shadow-xl shadow-blue-300 dark:bg-gray-800 fixed h-full overflow-hidden overflow-y-auto">
        <nav class="hs-accordion-group p-6 w-full h-full flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul class="space-y-2.5 text-sm text-slate-800 dark:text-white">
                <li class="hover:cursor-pointer">
                    <Link
                        class="flex items-center gap-x-3.5 py-2 px-2.5  bg-gray-100  rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600  dark:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        :class="{'bg-gray-300 dark:bg-gray-900': $page.url === '/dashboard' || $page.url.startsWith('/dashboard?')}">
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" /></svg>
                    Dashboard
                    </Link>
                </li>

                <li class="hs-accordion space-y-1 hover:cursor-pointer" :class="{ 'active': $page.url.startsWith('/application') }"
                    id="account-accordion">
                    <button type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-sm rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-600 dark:hover:text-slate-300 dark:hs-accordion-active:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        :class="{'ring-1 ring-gray-400 dark:ring-gray-600': $page.url.startsWith('/application') }">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" height="18" width="18">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                        </svg>
                        Application

                        <svg class="hs-accordion-active:block ms-auto hidden w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m18 15-6-6-6 6" /></svg>

                        <svg class="hs-accordion-active:hidden ms-auto block w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" /></svg>
                    </button>

                    <div id="account-accordion-child"
                        class="hs-accordion-content bg-gray-300 dark:bg-gray-900 pb-2 rounded-md w-full overflow-hidden transition-[height] duration-300 hidden"
                        :style="{ display: $page.url.startsWith('/application') ? 'block' : 'none' }">
                        <ul class="pt-2 px-2 space-y-1">

                            <li>
                                <Link
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                    :class="{'bg-gray-200 dark:bg-gray-800': $page.url === '/application' || $page.url.includes('/edit') || $page.url.startsWith('/application?')}">
                                Application List
                                </Link>
                            </li>
                            <li>
                                <Link
                                    class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                    :class="{'bg-gray-200 dark:bg-gray-800': $page.url === '/application/create' && !$page.url.startsWith('/application?')}">
                                Create Application
                                </Link>
                            </li>

                        </ul>
                    </div>
                </li>

            </ul>
        </nav>
    </div>
</template>

<style scoped>

</style>
