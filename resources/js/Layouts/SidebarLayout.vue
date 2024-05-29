<script setup>
import DashboardIcon from '@/Components/Icons/DashboardIcon.vue';
import DotIcon from '@/Components/Icons/DotIcon.vue';
import MenuArrowIcon from '@/Components/Icons/MenuArrowIcon.vue';
import CategoryIcon from '@/Components/Icons/CategoryIcon.vue';
import {Link, Head, usePage} from '@inertiajs/vue3';
import { HSAccordion } from 'preline/preline';

</script>

<template>
    <div id="sidebar" class="sidebar w-[0px] sm:min-w-[250px]  bg-[#f5f7f9] dark:bg-gray-800 fixed h-full overflow-hidden overflow-y-auto">
        <nav class="hs-accordion-group py-6 px-[8px] w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul class="space-y-2">
                <li>
                    <Link :href="route('dashboard')" :class="{'bg-[#6FD943] font-semibold text-white' : route().current('dashboard')}" class="flex items-center gap-x-3.5 py-[9px] px-2.5 text-[15px] text-gray-700 duration-200 rounded-lg hover:bg-[#6FD943] hover:text-white hover:font-semibold dark:bg-neutral-700 dark:text-white" href="#">
                    <DashboardIcon class="menu-icon" />
                    Dashboard
                    </Link>
                </li>


                <li class="hs-accordion" id="category"  >
                    <button type="button" class="menu hs-accordion-toggle" :class="{'bg-[#6FD943] font-semibold text-white' : route().current('category.*')}">
                    <CategoryIcon class="menu-icon" />
                    Category

                    <MenuArrowIcon />
                    </button>

                    <div id="category-child" class="hs-accordion-content sub-menu-content" :class="{'block' : route().current('category.*')}">
                        <ul class="p-2">
                            <li>
                                <Link :href="route('category.index')" class="sub-menu" :class="{'text-[#6FD943] font-semibold' : route().current('category.index')}" href="#">
                                    <DotIcon class="sub-menu-icon" />
                                    Category List
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
