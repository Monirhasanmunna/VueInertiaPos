<script setup>
import DashboardIcon from '@/Components/Icons/DashboardIcon.vue';
import DotIcon from '@/Components/Icons/DotIcon.vue';
import MenuArrowIcon from '@/Components/Icons/MenuArrowIcon.vue';
import CategoryIcon from '@/Components/Icons/CategoryIcon.vue';
import BrandIcon from '@/Components/Icons/BrandIcon.vue';
import UnitIcon from '@/Components/Icons/UnitIcon.vue';
import {Link} from '@inertiajs/vue3';


</script>

<template>
    <div id="sidebar" class="sidebar w-[0px] sm:min-w-[250px]  bg-[#f5f7f9] dark:bg-gray-800 fixed h-full overflow-hidden overflow-y-auto">
        <nav class="hs-accordion-group py-6 px-[8px] w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul class="space-y-2">
                <li>
                    <Link :href="route('dashboard')" :class="{'bg-[#6FD943] font-semibold text-white' : route().current('dashboard')}" class="flex items-center gap-x-3.5 py-[9px] px-2.5 text-[15px] text-gray-700 duration-200 rounded-lg hover:bg-[#6FD943] hover:text-white hover:font-semibold  dark:text-white">
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
                                <Link :href="route('category.index')" class="sub-menu" :class="{'active' : route().current('category.index') || route().current('category.create')}">
                                    <DotIcon class="sub-menu-icon" />
                                    Category List
                                </Link>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="hs-accordion" id="brand"  >
                    <button type="button" class="menu hs-accordion-toggle" :class="{'bg-[#6FD943] font-semibold text-white' : route().current('brand.*')}">
                    <BrandIcon class="menu-icon" />
                    Brand

                    <MenuArrowIcon />
                    </button>

                    <div id="brand-child" class="hs-accordion-content sub-menu-content" :class="{'block' : route().current('brand.*')}">
                        <ul class="p-2">
                            <li>
                                <Link :href="route('brand.index')" class="sub-menu" :class="{'active' : route().current('brand.index') || route().current('brand.create')}">
                                    <DotIcon class="sub-menu-icon" />
                                    Brand List
                                </Link>
                            </li>
                        </ul>
                    </div>
                </li>
            
                <li class="hs-accordion" id="unit"  >
                    <button type="button" class="menu hs-accordion-toggle" :class="{'bg-[#6FD943] font-semibold text-white' : route().current('unit.*')}">
                    <UnitIcon class="menu-icon" />
                    Unit

                    <MenuArrowIcon />
                    </button>

                    <div id="unit-child" class="hs-accordion-content sub-menu-content" :class="{'block' : route().current('unit.*')}">
                        <ul class="p-2">
                            <li>
                                <Link :href="route('unit.index')" class="sub-menu" :class="{'active' : route().current('unit.index') || route().current('unit.create')}">
                                    <DotIcon class="sub-menu-icon" />
                                    Unit List
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
