<template>
    <div class="bg-white p-6 rounded-lg shadow-md mx-4 my-6">
      <h2 class="text-2xl font-semibold mb-4">Courses</h2>
      <div class="space-y-4">
        <div class="xl:flex gap-3">
            <div class="xl:w-1/2">
                <h3 class="text-lg font-medium">Subject</h3>
                <select v-model="selectedSubject" class="w-full p-2 border rounded-md">
                    <option>All Subjects</option>
                    <option>Skill Focus</option>
                    <option>All Skills</option>
                </select>
            </div>
            <div class="xl:w-1/2">
                <h3 class="text-lg font-medium">Grade Level</h3>
                <select v-model="selectedGrade" class="w-full p-2 border rounded-md">
                    <option>All Grades</option>
                </select>
            </div>
        </div>
        <div class="xl:flex gap-3">
            <div class="xl:w-1/2">
                <h3 class="text-lg font-medium">Difficulty</h3>
                <select v-model="selectedDifficulty" class="w-full p-2 border rounded-md">
                    <option>All Difficulties</option>
                </select>
            </div>
            <div class="xl:w-1/2">
                <h3 class="text-lg font-medium">Learning Standard</h3>
                <select v-model="selectedStandard" class="w-full p-2 border rounded-md">
                    <option>All Standards</option>
                </select>
            </div>
        </div>

        <div>
          <h3 class="text-lg font-medium">Age Range</h3>
          <select v-model="selectedAge" class="w-full p-2 border rounded-md">
            <option>All Ages</option>
          </select>
        </div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        <CourseCard v-for="course in filteredCourses" :key="course.title" :course="course" />
      </div>
    </div>
  </template>

  <script setup>
  import { ref , computed} from 'vue';
  import CourseCard from './CourseCard.vue';

  const selectedSubject = ref('All Subjects');
  const selectedGrade = ref('All Grades');
  const selectedDifficulty = ref('All Difficulties');
  const selectedStandard = ref('All Standards');
  const selectedAge = ref('All Ages');

  const courses = ref([
  {
    img: "https://assets.skyfilabs.com/playto/blog-images/robotics-for-beginners-v3.webp",
    title: 'GoTechUp x ArtecRobo 1.0',
    description: 'Learn robotics and programming through hands-on projects with ArtecRobo.',
    subject: 'Computer Science',
    gradeLevels: [4, 5, 6, 7, 8],
    skills: ['Problem Solving', 'Critical Thinking', 'Digital Literacy'],
    difficulty: 'Intermediate',
    standards: ['Australian Curriculum', 'Cambridge'],
  },
  {
    img:"https://xclcamps.com/wp-content/uploads/coding-difference-1.jpg",
    title: 'Coding Game',
    description: 'An interactive coding adventure that teaches programming concepts.',
    subject: 'Computer Science',
    gradeLevels: [6, 7, 8, 9],
    skills: ['Problem Solving', 'Critical Thinking', 'Digital Literacy'],
    difficulty: 'Beginner',
    standards: ['Common Core', 'Australian Curriculum'],
  },
  {
    img:"https://i.natgeofe.com/k/f50e42da-daa5-47b3-a51f-a77493f1fb6b/space-explorer-promo_16x9.jpg?w=1200",
    title: 'Space Explorer',
    description: 'Embark on an educational journey through space.',
    subject: 'Science',
    gradeLevels: [5, 6, 7, 8],
    skills: ['Critical Thinking', 'Digital Literacy'],
    difficulty: 'Intermediate',
    standards: ['NSSS', 'Cambridge'],
  },
]);

const filteredCourses = computed(() => {
  // Implement filtering logic based on selected filters
  return courses.value;
});
  </script>
