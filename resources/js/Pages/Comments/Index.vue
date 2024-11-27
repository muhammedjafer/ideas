<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    posts: Object
});

// Computed property to truncate the product title
const truncateTitle = (title) => {
    const maxLength = 70; // Maximum number of characters
    return title.length > maxLength ? `${title.slice(0, maxLength)}...` : title;
};

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        <li v-for="post in posts" :key="post.id">
                            {{ truncateTitle(post.body) }}
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
