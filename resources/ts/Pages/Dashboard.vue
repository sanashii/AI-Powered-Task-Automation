<script setup lang="ts">
defineProps<{
  user: { name: string; role: string }
  stats: { tasks_completed: number; projects_active: number }
}>()
</script>

<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold">Welcome back, {{ user.name }} 👋</h1>
    <p class="text-gray-600">Your role: {{ user.role }}</p>

    <div class="mt-6 grid grid-cols-2 gap-4">
      <div class="p-4 bg-white rounded-xl shadow">
        <h2 class="font-semibold">Tasks Completed</h2>
        <p class="text-xl">{{ stats.tasks_completed }}</p>
      </div>
      <div class="p-4 bg-white rounded-xl shadow">
        <h2 class="font-semibold">Active Projects</h2>
        <p class="text-xl">{{ stats.projects_active }}</p>
      </div>
    </div>
  </div>
</template>
