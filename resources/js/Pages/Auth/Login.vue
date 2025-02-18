<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { router } from '@inertiajs/vue3';

const redirectTo = () => {
  router.visit('/register'); // Change '/register' to your desired route
};

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Login" />
    <div class="min-h-screen bg-black flex items-center justify-center p-4">
      <div
        v-motion
        :initial="{ opacity: 0, y: 50 }"
        :enter="{ opacity: 1, y: 0 }"
        :transition="{ duration: 600 }"
        class="bg-white/10 backdrop-blur-lg p-8 rounded-2xl w-full max-w-md relative overflow-hidden"
      >
        <!-- Login Form -->
        <div class="relative z-10">
          <h2 class="text-3xl font-bold text-white mb-6">Welcome Back</h2>

          <form @submit.prevent="submit" class="space-y-6">
            <div>
              <label class="block text-gray-300 mb-2">Email</label>
              <input
                v-model="form.email"
                type="email"
                class="w-full px-4 py-3 bg-white/5 border border-gray-600 rounded-lg text-white focus:border-primary outline-none"
                placeholder="Enter your email"
                autofocus
                autocomplete="username"
              />
            </div>

            <div>
              <label class="block text-gray-300 mb-2">Password</label>
              <input
                v-model="form.password"
                type="password"
                class="w-full px-4 py-3 bg-white/5 border border-gray-600 rounded-lg text-white focus:border-primary outline-none"
                placeholder="Enter your password"
                required
                autocomplete="current-password"
              />
            </div>

            <button type="submit" class="btn-primary w-full">
              Login
            </button>
            <button type="button" @click="redirectTo" class=" bg-transparent border border-white text-white font-semibold px-6 py-3 rounded-lg transition-all duration-300 transform hover:scale-105 w-full">
              Register
            </button>
          </form>

          <a
           :href="route('welcome')"
            class="mt-4 text-gray-400 hover:text-primary transition-colors"
          >
            ← Back to Home
          </a>
        </div>

        <!-- Decorative Background -->
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
          <div class="absolute top-0 right-0 w-32 h-32 bg-[#FDD201]/30 rounded-full blur-2xl"></div>
          <div class="absolute bottom-0 left-0 w-32 h-32 bg-[#FDD201]/30 rounded-full blur-2xl"></div>
        </div>
      </div>
    </div>
  </template>

<!-- <template>
    <Head title="Log in" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.remember" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Forgot your password?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
        <div class="text-center mt-4 text-sm">
            No Account? <a :href="route('register')" class="text-blue-700">Please Register.</a>
        </div>
    </AuthenticationCard>

</template> -->
