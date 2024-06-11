<script setup>
    import FacebookICon from "@/Components/Icons/FacebookIcon.vue";
    import InstagramICon from "@/Components/Icons/InstagramIcon.vue";
    import WhatsAppIcon from "@/Components/Icons/WhatsAppIcon.vue";
    import {
        ref,
        onMounted,
        onUnmounted,
        computed
    } from 'vue';
    import {
        Link
    } from '@inertiajs/vue3';

    const featuredCategories = ref([]);
    const activeSkaliton = ref(true);

    onMounted(() => {
        axios.get(route('shop.featured-category')).then((response) => {
            featuredCategories.value = response.data;
            activeSkaliton.value = false;
        });
    });
</script>

<template>
    <div class="w-full bg-center bg-cover bg-[url('/image/start-page.webp')] relative">
        <div class="w-full flex min-h-screen flex-col">
            <!-- navbar -->
            <nav class="w-full z-40 py-6 px-2">
                <div class="container mx-auto">
                    <div class="w-full flex items-center gap-3 justify-between">
                        <div>
                            <Link to="/shop" class="md:text-3xl text-2xl font-semibold text-white">Logo</Link>
                        </div>
                        <ul class="flex items-center gap-0">
                            <li>
                                <div class="w-[30px] h-[30px] rounded-full flex justify-center items-center bg-primary">
                                    <FacebookICon class="text-[white] text-xl cursor-pointer" />
                                </div>
                            </li>
                            <li>
                                <div class="w-[30px] h-[30px] rounded-full flex justify-center items-center bg-primary">
                                    <InstagramICon class="text-[white] text-xl cursor-pointer" />
                                </div>
                            </li>
                            <li>
                                <div class="w-[30px] h-[30px] rounded-full flex justify-center items-center bg-primary">
                                    <WhatsAppIcon class="text-[white] text-xl cursor-pointer" />
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- drowar -->
        <div class="fixed custom md:w-full w-[95%] animate-bottom">
            <div class="bg-[#d1f2eb]/80 min-h-[330px] rounded-[14px] border-[#f0f0f0] py-4 container">
                <div class="container">
                    <div class="w-full flex flex-col gap-3">
                        <div class="flex items-center flex-col justify-center gap-3 mb-4 pt-[10px]">
                            <h2 class="md:text-[30px] text-[20px] text-center text-gray-900 font-semibold capitalize">
                                Featured Category
                            </h2>
                            <div class="flex items-center gap-3 justify-end">
                                <button
                                    class="text-[12px] py-2 px-4 bg-[#6fd943] rounded-md text-white duration-200 border-none hover:bg-[#509231]">
                                    All Category
                                </button>
                                <button
                                    class="text-[12px] py-2 px-4 bg-[#6fd943] rounded-md duration-200 text-white border-none hover:bg-[#509231]">
                                    All Featured Category
                                </button>
                            </div>
                        </div>


                        <div class="flex items-center xl:justify-center justify-start md:gap-5 sm:gap-4 gap-3 w-[100%] overflow-x-scroll xl:overflow-x-hidden pb-[20px]">
                            <!-- single category -->
                            <Link v-for="category in featuredCategories" :key="category.id" id="categoryId" class="xl:w-[200px] xl:px-0 xl:py-0 px-[50px] py-[55px] w-full cursor-pointer xl:h-[200px] h-full shadow-lg rounded-xl bg-center bg-cover relative flex justify-center items-end" :style="`background-image: url('${category.image}');`">
                              <div class="sm:text-2xl text-xl font-medium capitalize text-[white] xl:pb-4 text-shadow z-20">
                                  {{ category.name }}
                              </div>

                              <div class="absolute shadow-lg rounded-xl z-10 bottom-0 gradient-color left-0 w-full h-full"></div>
                            </Link>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute z-20 top-0 w-full h-full bg-[#000]/50"></div>
    </div>
</template>

<style scoped>
    @keyframes slideUp {
        0% {
            bottom: -100%;
        }

        50% {
            bottom: -135px;
        }

        100% {
            bottom: -145px;
        }
    }

    .animate-bottom {
        animation: slideUp 1.5s ease-in-out forwards;
    }

</style>
