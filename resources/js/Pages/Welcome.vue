<script setup>
import { ref, onMounted } from 'vue'
import { useMouseInElement } from '@vueuse/core'
import { Head } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

const heroContent = ref<HTMLElement | null>(null)
const { elementX, elementY, isOutside } = useMouseInElement(heroContent)
const showContent = ref(false)

onMounted(() => {
  showContent.value = true
})
</script>

<template>
    <Head title="GoTechUp-Plus" />
    <div class="min-h-screen _bg-black">
      <!-- Navigation -->
      <nav class="fixed w-full p-6 flex justify-between items-center z-50">
        <AuthenticationCardLogo />
        <!-- <h1 class="text-[#FDD201] text-2xl font-bold">GoTechUp</h1> -->
        <a :href="route('login')" class="btn-outline">Login</a>
      </nav>

      <!-- Hero Section -->
      <div class="min-h-screen flex items-center justify-center px-4">
        <div class="text-center">
          <h1
            v-motion
            :initial="{ opacity: 0, y: 100 }"
            :enter="{ opacity: 1, y: 0 }"
            :transition="{ duration: 800 }"
            class="text-5xl md:text-7xl font-bold mb-6 text-black"
          >
            Welcome to <span class="text-[#FDD201]">GoTechUp</span>
          </h1>

          <p
            v-motion
            :initial="{ opacity: 0, y: 50 }"
            :enter="{ opacity: 1, y: 0 }"
            :transition="{ duration: 800, delay: 200 }"
            class="text-xl md:text-2xl text-gray-700 mb-12 max-w-2xl mx-auto"
          >
            Embark on an exciting journey into the world of technology.
            Learn, grow, and transform your future with cutting-edge development skills.
          </p>

          <div
            v-motion
            :initial="{ opacity: 0, scale: 0.8 }"
            :enter="{ opacity: 1, scale: 1 }"
            :transition="{ duration: 500, delay: 400 }"
            class="space-x-4"
          >
            <button class="btn-primary">
              I'm Interested
            </button>
          </div>
        </div>
      </div>

      <!-- Decorative Elements -->
      <div class="fixed top-0 left-0 w-full h-full pointer-events-none overflow-hidden">
        <div class="absolute top-20 left-10 w-64 h-64 bg-primary/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-64 h-64 bg-primary/20 rounded-full blur-3xl"></div>
      </div>
    </div>
  </template>
