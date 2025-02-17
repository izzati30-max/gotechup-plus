<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import Filters from '@/Components/Custom/Filters.vue';
import { Head, Link, router, usePage } from "@inertiajs/vue3";

import { ref, computed } from 'vue';

import { UserPlusIcon, DocumentCheckIcon, AcademicCapIcon, TrophyIcon } from '@heroicons/vue/24/outline'

const page = usePage();

const recentActivities = [
  {
    icon: UserPlusIcon,
    title: 'New student registration',
    time: '2 hours ago'
  },
  {
    icon: DocumentCheckIcon,
    title: 'Assignment submitted',
    time: '4 hours ago'
  },
  {
    icon: AcademicCapIcon,
    title: 'Class completed',
    time: '6 hours ago'
  }
]

const upcomingClasses = [
  {
    name: 'Mathematics 101',
    time: '09:00 AM - 10:30 AM',
    status: 'Online'
  },
  {
    name: 'Physics Lab',
    time: '11:00 AM - 12:30 PM',
    status: 'In-Person'
  },
  {
    name: 'English Literature',
    time: '02:00 PM - 03:30 PM',
    status: 'Online'
  }
]

const categories = ref([
    'All',
    'Programming',
    'Mathematics',
    'Science',
    'Language',
    'Arts'
])

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

const performance = [
  { name: 'Bagheera', average: 120 },
  { name: 'Coco', average: 118 },
  { name: 'Cruella de Vil ', average: 117 },
  { name: 'Dewey', average: 110 },
  { name: 'Donald', average: 98 },
  { name: 'Dopey', average: 90 },
  { name: 'Genie', average: 87 },
  { name: 'Geppetto', average: 87 },
  { name: 'Horace', average: 70 },
  { name: 'Jane', average: 70 }
]

const attendance = [
{ name: 'Bagheera', rate: 120 },
  { name: 'Coco', rate: 118 },
  { name: 'Cruella de Vil ', rate: 117 },
  { name: 'Dewey', rate: 110 },
  { name: 'Donald', rate: 98 },
  { name: 'Dopey', rate: 90 },
  { name: 'Genie', rate: 87 },
  { name: 'Geppetto', rate: 87 },
  { name: 'Horace', rate: 70 },
  { name: 'Jane', rate: 70 }
]

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
    <AppLayout title="Dashboard">
        <!-- Categories -->
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex gap-4 overflow-x-auto py-3 scrollbar-hide">
            <button
                v-for="category in categories"
                :key="category"
                :class="[
                'px-4 py-1.5 rounded-full text-sm font-medium whitespace-nowrap',
                selectedCategory === category
                    ? 'bg-primary text-black'
                    : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                ]"
                @click="selectedCategory = category"
            >
                {{ category }}
            </button>
            </div>
        </div>
        <!-- Featured Game -->
    <div class="bg-white border-b rounded-lg">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="relative rounded-xl overflow-hidden">
                <img
                    src="https://images.unsplash.com/photo-1516116216624-53e697fedbea?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80"
                    alt="Featured Game"
                    class="w-full h-80 object-cover"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                    <div class="p-6 text-white">
                    <h2 class="text-3xl font-bold mb-2">Welcome Back!</h2>
                    <p class="text-lg mb-4">{{ $page.props.auth.user.name }}</p>
                    <!-- <button class="px-6 py-2 rounded-full font-semibold transition-colors duration-300 bg-white text-green-700 hover:bg-gray-100">
                        More Details
                    </button> -->
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="space-y-6 mt-4">
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-4">User ID Distribution</h2>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div class="bg-blue-100 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-blue-800">Sub Admin</h3>
                        <p class="text-3xl font-bold text-blue-600">40</p>
                        </div>
                        <div class="bg-green-100 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-green-800">Player Manager</h3>
                        <p class="text-3xl font-bold text-green-600">20</p>
                        </div>
                        <div class="bg-purple-100 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-purple-800">User Group</h3>
                        <p class="text-3xl font-bold text-purple-600">8</p>
                        </div>
                        <div class="bg-indigo-100 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-indigo-800">User</h3>
                        <p class="text-3xl font-bold text-indigo-600">20,000</p>
                        </div>
                    </div>
                    <div class="py-6">
                        <h2 class="text-2xl font-bold mb-4">License Utilisation</h2>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="bg-gray-100 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-blue-800">User ID Created</h3>
                            <p class="text-3xl font-bold text-blue-600">20</p>
                            </div>
                            <div class="bg-gray-100  p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-green-800">Active User ID</h3>
                            <p class="text-3xl font-bold text-green-600">8</p>
                            </div>
                            <div class="bg-gray-100  p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-indigo-800">Inactive User ID</h3>
                            <p class="text-3xl font-bold text-indigo-600">20,000</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="space-y-6 mt-4">


            </div>

    <div class="space-y-6 mt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Recent Activities</h3>
                <div class="space-y-4">
                <div v-for="(activity, index) in recentActivities" :key="index" class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                    <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                        <component :is="activity.icon" class="h-5 w-5 text-blue-600" />
                    </div>
                    </div>
                    <div>
                    <p class="font-medium">{{ activity.title }}</p>
                    <p class="text-sm text-gray-500">{{ activity.time }}</p>
                    </div>
                </div>
                </div>
            </div>

      <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-xl font-semibold mb-4">Upcoming Classes</h3>
        <div class="space-y-4">
          <div v-for="(class_, index) in upcomingClasses" :key="index" class="flex items-center justify-between">
            <div>
              <p class="font-medium">{{ class_.name }}</p>
              <p class="text-sm text-gray-500">{{ class_.time }}</p>
            </div>
            <span :class="[
              'px-2 py-1 rounded-full text-xs font-medium',
              class_.status === 'Online' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800'
            ]">
              {{ class_.status }}
            </span>
          </div>
        </div>
      </div>
    </div>



    <div class="space-y-6">
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex gap-2">
            <h2 class="text-2xl font-bold mb-4">Ranking </h2>
            <TrophyIcon class="w-7 mb-7 text-yellow-400"></TrophyIcon>
        </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gray-50 rounded-lg p-4">
          <h3 class="text-lg font-semibold mb-2">Top 10 Sub Admin</h3>
          <div class="space-y-2">
            <div v-for="(subject, index) in performance" :key="index">
              <div class="flex justify-between text-sm mb-1">
                <span>{{ subject.name }}</span>
                <span>{{ subject.average }}</span>
              </div>
              <div class="w-full bg-gray-200 rounded-full h-2.5">
                <div class="bg-blue-600 h-2.5 rounded-full" :style="{ width: subject.average }"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-4">
          <h3 class="text-lg font-semibold mb-2">Top 10 Player Manager</h3>
          <div class="space-y-2">
            <div v-for="(class_, index) in attendance" :key="index">
              <div class="flex justify-between text-sm mb-1">
                <span>{{ class_.name }}</span>
                <span>{{ class_.rate }}</span>
              </div>
              <div class="w-full bg-gray-200 rounded-full h-2.5">
                <div :class="[
                  'h-2.5 rounded-full',
                  class_.rate >= 120 ? 'bg-green-600' :
                  class_.rate >= 75 ? 'bg-yellow-600' : 'bg-red-600'
                ]" :style="{ width: class_.rate }"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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

  <Filters></Filters>


    </AppLayout>
</template>
