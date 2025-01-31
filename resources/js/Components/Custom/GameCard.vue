<script setup lang="ts">
defineProps<{
  title: string
  description: string
  image: string
  category: string
}>()
</script>

<template>
  <div class="card">
    <img :src="image" :alt="title" class="w-full h-48 object-cover" />
    <div class="p-6">
      <span class="text-sm font-medium text-secondary">{{ category }}</span>
      <h3 class="text-xl font-bold mt-2">{{ title }}</h3>
      <p class="text-gray-600 mt-2">{{ description }}</p>
      <button class="btn btn-primary mt-4">Learn More</button>
    </div>
  </div>
</template>
