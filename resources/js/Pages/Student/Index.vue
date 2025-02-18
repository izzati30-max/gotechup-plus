<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, usePage } from '@inertiajs/vue3'

const user = usePage().props.auth.user

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>

<template>
    <AppLayout title="Student">
        <div class="bg-white w-full">
            <div class="flex justify-center">
                <img src="https://cdn.dribbble.com/userupload/21772257/file/original-9160ed1f3339acf8e2241c62e63fc5ce.png?resize=752x&vertical=center" alt="underdevelopment">
            </div>
        </div>
    </AppLayout>
</template>
