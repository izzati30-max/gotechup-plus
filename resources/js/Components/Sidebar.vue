<template>
    <aside
      :class="[
        'bg-white text-gray-800 w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform',
        'md:relative md:translate-x-0 transition duration-200 ease-in-out',
        { '-translate-x-full': !isOpen }
      ]"
    >
      <div class="flex items-center space-x-4 px-4">
        <img
          src="/image/logo.png"
          alt="Logo"
        />
      </div>

      <nav class="space-y-2">
        <a
          v-for="item in menuItems"
          :key="item.name"
          :href="item.path"
          class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-300 cursor-pointer"
        >
          <component :is="item.icon" class="h-5 w-5" />
          <span>{{ item.name }}</span>
        </a>
      </nav>
    </aside>
  </template>

  <script setup>
  import {
    HomeIcon,
    UserGroupIcon,
    CalendarIcon,
    DocumentTextIcon,
    ChartBarIcon,
    CogIcon
  } from '@heroicons/vue/24/solid'

  defineProps({
    isOpen: {
      type: Boolean,
      default: true
    }
  })

  const menuItems = [
    { name: 'Dashboard', path: '/dashboard', icon: HomeIcon },
    { name: 'Students', path: '/students', icon: UserGroupIcon },
    { name: 'Schedule', path: '/schedule', icon: CalendarIcon },
    { name: 'Assignments', path: '/assignments', icon: DocumentTextIcon },
    { name: 'Reports', path: '/reports', icon: ChartBarIcon },
    { name: 'Settings', path: '/settings', icon: CogIcon }
  ]
  </script>
