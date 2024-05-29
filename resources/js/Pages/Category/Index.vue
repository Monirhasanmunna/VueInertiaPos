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
        <Box>
            <h3>Categeory</h3>
        </Box>
    </MasterLayout>
</template>

<style scoped>

</style>
