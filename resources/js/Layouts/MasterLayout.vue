<script setup>
import HeaderLayout from '@/Layouts/HeaderLayout.vue';
import SidebarLayout from '@/Layouts/SidebarLayout.vue'
import customJs from '@/assets/custom.js';
import {onMounted} from 'vue';


onMounted(() => {
    window.HSStaticMethods.autoInit();
    customJs();
});
</script>

<template>
<div class="main-wrapper">
    <HeaderLayout/>    
    <div class="body flex justify-start">
        <SidebarLayout/>  
        <div class="right w-full">
            <main >
                <div class="w-full min-h-[900px] bg-gray-200 dark:bg-slate-900 p-5">
                    <div id="bodyCard" class="shadow-md min-h-screen p-5 bg-white dark:bg-gray-800 md:ml-[250px] rounded-md">
                        <slot></slot>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
</template>

<style scoped>
.sidebar {
    transition: min-width 0.3s; /* Optional: Add a smooth transition effect */
  }

  #bodyCard {
    transition: margin-left 0.3s; /* Optional: Add a smooth transition effect */
  }
</style>