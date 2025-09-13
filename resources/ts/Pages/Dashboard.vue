<template>
  <div class="p-6">
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-6">
      <!-- Pending Tasks -->
      <div class="bg-white shadow rounded p-4">
        <h2 class="text-xl font-semibold mb-2">Pending Tasks</h2>
        <p class="text-2xl font-bold">{{ taskCounts.pending }}</p>
      </div>

      <!-- In Progress -->
      <div class="bg-white shadow rounded p-4">
        <h2 class="text-xl font-semibold mb-2">In Progress</h2>
        <p class="text-2xl font-bold">{{ taskCounts.in_progress }}</p>
      </div>

      <!-- Done -->
      <div class="bg-white shadow rounded p-4">
        <h2 class="text-xl font-semibold mb-2">Done</h2>
        <p class="text-2xl font-bold">{{ taskCounts.done }}</p>
      </div>
    </div>

    <!-- Priority Summary -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
      <div class="bg-blue-50 shadow rounded p-4">
        <h2 class="text-lg font-semibold mb-2">High Priority</h2>
        <p class="text-xl font-bold">{{ priorityCounts.high }}</p>
      </div>

      <div class="bg-yellow-50 shadow rounded p-4">
        <h2 class="text-lg font-semibold mb-2">Medium Priority</h2>
        <p class="text-xl font-bold">{{ priorityCounts.medium }}</p>
      </div>

      <div class="bg-green-50 shadow rounded p-4">
        <h2 class="text-lg font-semibold mb-2">Low Priority</h2>
        <p class="text-xl font-bold">{{ priorityCounts.low }}</p>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  props: {
    taskCounts: Object,
    priorityCounts: Object,
  },
});
</script>

<style scoped>
/* Optional: additional styling if you want */
</style>
