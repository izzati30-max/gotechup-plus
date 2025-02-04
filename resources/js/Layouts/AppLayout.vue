<template>
    <Head :title="title" />
    <div class="flex h-screen bg-gray-100">
      <!-- Sidebar -->
      <Sidebar :is-open="isSidebarOpen" />

      <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Navbar -->
        <Navbar
          @toggle-sidebar="toggleSidebar"
          :user-name="userName"
          :user-role="userRole"
          :profile-image="profileImage"
        />

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
            <slot></slot>
        </main>
      </div>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue'
  import { Head } from '@inertiajs/vue3'
  import Navbar from "@/Components/Navbar.vue"
  import Sidebar from '@/components/Sidebar/Sidebar.vue'

  defineProps({
        title: String,
    });


  const isSidebarOpen = ref(true)
  const userName = ref('John Doe')
  const userRole = ref('Admin')
  const profileImage = ref('https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80')

  const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value
  }
  </script>
