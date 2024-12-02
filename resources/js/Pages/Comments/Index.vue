<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    posts: Array
});

// Computed property to truncate the product title
const truncateTitle = (title) => {
    const maxLength = 80; // Maximum number of characters
    return title.length > maxLength ? `${title.slice(0, maxLength)}......` : title;
};

const form = useForm({
    body: ''
});


const createPost = () => {
    form.post('/comments');
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
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8 space-y-3">
                <form class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-6" v-on:submit.prevent="createPost">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="5" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" v-model="form.body"></textarea>
                    <button type="submit" class="mt-2 bg-gray-700 px-4 py-2 rounded-md font-medium text-white">Post</button>
                </form>

                <div v-for="post in posts" :key="post.id">
                    <div
                        class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                    >
                        <div class="p-6 text-gray-900">
                            <div class="font-semibold">{{ post.user.name }}</div>
                            <p class="mt-1">
                                {{ truncateTitle(post.body) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
