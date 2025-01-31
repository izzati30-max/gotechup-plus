<script setup lang="ts">
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';

const games = ref([
    {
        id: 1,
        title: 'Code Adventure',
        description: 'Learn programming concepts through an exciting adventure game!',
        image: 'https://images.unsplash.com/photo-1516116216624-53e697fedbea?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        category: 'Programming',
        rating: 4.5,
        downloads: '100K+',
        developer: 'GoTechUp Studios'
    },
    {
        id: 2,
        title: 'Math Quest',
        description: 'Master mathematics with fun puzzles and challenges!',
        image: 'https://images.unsplash.com/photo-1518133910546-b6c2fb7d79e3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        category: 'Mathematics',
        rating: 4.7,
        downloads: '50K+',
        developer: 'GoTechUp Studios'
    },
    {
        id: 3,
        title: 'Science Explorer',
        description: 'Discover scientific principles through interactive experiments!',
        image: 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        category: 'Science',
        rating: 4.8,
        downloads: '75K+',
        developer: 'GoTechUp Studios'
    }
])

const categories = ref([
    'All',
    'Programming',
    'Mathematics',
    'Science',
    'Language',
    'Arts'
])

const selectedCategory = ref('All')
const searchQuery = ref('')

const filteredGames = computed(() => {
    return games.value.filter(game => {
        const matchesCategory = selectedCategory.value === 'All' || game.category === selectedCategory.value
        const matchesSearch = game.title.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
                            game.description.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
                            game.category.toLowerCase().includes(searchQuery.value.toLowerCase())
        return matchesCategory && matchesSearch
    })
})
</script>

<template>
<Head title="GoTechUp"></Head>
    <div class="min-h-screen bg-gray-50">
        <!-- Header -->
        <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex items-center gap-4">
            <div class="flex items-center gap-2">
                <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-green-700 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                </div>
                <div>
                <h1 class="text-xl font-bold text-gray-900">GoTechUp</h1>
                <p class="text-xs text-gray-500">Fun Learning Games</p>
                </div>
            </div>
            <div class="flex-1">
                <div class="relative">
                <input
                    v-model="searchQuery"
                    type="text"
                    placeholder="Search games"
                    class="w-full pl-10 pr-4 py-2 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50"
                >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-2.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                </div>
            </div>
            <!-- Login Button -->
          <a :href="route('login')"  class="flex items-center gap-2 px-4 py-2 bg-green-700 text-white rounded-lg hover:bg-primary/90 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Login
          </a>
            </div>
        </div>
        </header>

        <!-- Categories -->
        <div class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex gap-4 overflow-x-auto py-3 scrollbar-hide">
            <button
                v-for="category in categories"
                :key="category"
                :class="[
                'px-4 py-1.5 rounded-full text-sm font-medium whitespace-nowrap',
                selectedCategory === category
                    ? 'bg-green-700 text-white'
                    : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                ]"
                @click="selectedCategory = category"
            >
                {{ category }}
            </button>
            </div>
        </div>
        </div>

        <!-- Featured Game -->
        <div class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="relative rounded-xl overflow-hidden">
            <img
                src="https://images.unsplash.com/photo-1516116216624-53e697fedbea?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80"
                alt="Featured Game"
                class="w-full h-80 object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                <div class="p-6 text-white">
                <h2 class="text-3xl font-bold mb-2">Code Adventure</h2>
                <p class="text-lg mb-4">Embark on an epic coding journey</p>
                <button class="px-6 py-2 rounded-full font-semibold transition-colors duration-300 bg-white text-green-700 hover:bg-gray-100">
                    More Details
                </button>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- Games Grid -->
        <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-medium text-gray-900">Popular Games</h2>
            <p class="text-sm text-gray-500">
            Showing {{ filteredGames.length }} game{{ filteredGames.length !== 1 ? 's' : '' }}
            </p>
        </div>

        <!-- No Results Message -->
        <div v-if="filteredGames.length === 0" class="text-center py-12">
            <p class="text-gray-500">No games found matching your criteria</p>
        </div>

        <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div v-for="game in filteredGames" :key="game.id" class="bg-white rounded-xl p-4 hover:shadow-lg transition-shadow">
            <div class="aspect-square rounded-xl overflow-hidden mb-4">
                <img :src="game.image" :alt="game.title" class="w-full h-full object-cover">
            </div>
            <div>
                <h3 class="font-medium text-gray-900">{{ game.title }}</h3>
                <p class="text-sm text-gray-500">{{ game.developer }}</p>
                <div class="flex items-center gap-1 mt-1">
                <span class="text-sm font-medium">{{ game.rating }}</span>
                <div class="flex text-yellow-400">
                    <svg v-for="i in 5" :key="i" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" :class="i <= Math.floor(game.rating) ? 'fill-current' : 'fill-gray-300'" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
                <span class="text-sm text-gray-500">({{ game.downloads }})</span>
                </div>
                <button class="w-full mt-3 py-2 text-sm font-medium text-primary bg-primary/10 rounded-full hover:bg-primary/20">
                Details
                </button>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<style>
.scrollbar-hide {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
.scrollbar-hide::-webkit-scrollbar {
  display: none;
}
</style>
