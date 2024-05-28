<script setup>
import DashboardIcon from '@/Components/Icons/DashboardIcon.vue';
import DotIcon from '@/Components/Icons/DotIcon.vue';
import MenuArrowIcon from '@/Components/Icons/MenuArrowIcon.vue';
</script>

<template>
    <div id="sidebar" class="sidebar w-[0px] sm:min-w-[250px] bg-[#f5f7f9] shadow-xl shadow-blue-300 dark:bg-gray-800 fixed h-full overflow-hidden overflow-y-auto">
        <nav class="hs-accordion-group py-6 px-[8px] w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul class="space-y-2">
                <li>
                    <a class="flex items-center gap-x-2 py-[9px] px-2.5 bg-[#6FD943] text-[15px] text-white  rounded-lg hover:bg-[#6FD943] hover:text-white hover:font-semibold dark:bg-neutral-700 dark:text-white" href="#">
                    <DashboardIcon class="menu-icon" />
                    Dashboard
                    </a>
                </li>


                <li class="hs-accordion" id="account-accordion">
                    <button type="button" class="menu hs-accordion-toggle">
                    <svg class="flex-shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="15" r="3"/><circle cx="9" cy="7" r="4"/><path d="M10 15H6a4 4 0 0 0-4 4v2"/><path d="m21.7 16.4-.9-.3"/><path d="m15.2 13.9-.9-.3"/><path d="m16.6 18.7.3-.9"/><path d="m19.1 12.2.3-.9"/><path d="m19.6 18.7-.4-1"/><path d="m16.8 12.3-.4-1"/><path d="m14.3 16.6 1-.4"/><path d="m20.7 13.8 1-.4"/></svg>
                    Account
                    <MenuArrowIcon />
                    </button>

                    <div id="account-accordion-child" class="hs-accordion-content sub-menu-content">
                        <ul class="p-2">
                            <li>
                            <a class="sub-menu" href="#">
                                <DotIcon class="sub-menu-icon" />
                                Link 1
                            </a>
                            </li>
                            <li>
                                <a class="sub-menu" href="#">
                                <DotIcon class="sub-menu-icon" />
                                Link 2
                            </a>
                            </li>
                            <li>
                                <a class="sub-menu" href="#">
                                <DotIcon class="sub-menu-icon" />
                                Link 3
                            </a>
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
