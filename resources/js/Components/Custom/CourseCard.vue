<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
  <img class="w-full h-64" :src="course.img" alt="Sunset in the mountains">
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">{{ course.title }}</div>
    <p class="text-gray-700 text-base">
       {{ course.description }}
    </p>
  </div>

    <div class="px-6 pt-2 pb-2">
        <p class="text-base">Grade Lavel:</p>
        <span v-for="level in course.gradeLevels" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ level }}</span>
    </div>

    <div class="px-6 pt-2 pb-2">
        <p class="text-base">Skills:</p>
        <span v-for="skill in course.skills" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ skill }}</span>
    </div>

    <div class="px-6 pt-2 pb-2">
        <p class="text-base">Difficulty:</p>
        <span  class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ course.difficulty }}</span>
    </div>

    <div class="px-6 pt-2 pb-2">
        <p class="text-base">Skills:</p>
        <span v-for="standard in course.standards" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ standard }}</span>
    </div>
</div>
    <!-- <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
      <h3 class="text-xl font-bold mb-2">{{ course.title }}</h3>
      <p class="text-gray-700 mb-4">{{ course.description }}</p>
      <div class="space-y-2">
        <p><strong class="font-medium">Subject:</strong> {{ course.subject }}</p>
        <p><strong class="font-medium">Grade Levels:</strong> {{ course.gradeLevels.join(', ') }}</p>
        <p><strong class="font-medium">Skills:</strong> {{ course.skills.join(', ') }}</p>
        <p><strong class="font-medium">Difficulty:</strong> {{ course.difficulty }}</p>
        <p><strong class="font-medium">Standards:</strong> {{ course.standards.join(', ') }}</p>
      </div>
    </div> -->
  </template>

  <script setup>
  defineProps({
    course: {
      type: Object,
      required: true,
    },
  });
  </script>
