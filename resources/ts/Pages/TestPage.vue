<template>
  <div class="p-6 max-w-md mx-auto bg-white rounded-xl shadow-md space-y-6">
    <h1 class="text-2xl font-bold text-gray-800">Dry Run Test - Automation</h1>

    <!-- Task List -->
    <ul class="space-y-2">
      <li
        v-for="(task, index) in tasks"
        :key="index"
        class="flex justify-between items-center p-2 bg-gray-100 rounded"
      >
        <span :class="{ 'line-through text-gray-400': task.completed }">{{ task.name }}</span>
        <button
          @click="toggleTask(index)"
          class="px-2 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600"
        >
          {{ task.completed ? 'Undo' : 'Done' }}
        </button>
      </li>
    </ul>

    <!-- Buttons -->
    <div class="flex space-x-2">
      <button
        @click="addTask()"
        class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600"
      >
        Add Task (Auto)
      </button>
      <button
        @click="completeAll()"
        class="px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600"
      >
        Complete All (Automation)
      </button>
    </div>

    <!-- Summary -->
    <p class="text-gray-700">
      Total tasks: {{ tasks.length }}, Completed: {{ completedCount }}
    </p>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, computed } from 'vue';

interface Task {
  name: string;
  completed: boolean;
}

export default defineComponent({
  setup() {
    const tasks = ref<Task[]>([]);

    // Auto-add a task
    const addTask = () => {
      const newTask: Task = {
        name: `Task #${tasks.value.length + 1}`,
        completed: false,
      };
      tasks.value.push(newTask);
    };

    // Toggle completion
    const toggleTask = (index: number) => {
      tasks.value[index].completed = !tasks.value[index].completed;
    };

    // Complete all tasks automatically
    const completeAll = () => {
      tasks.value.forEach((task) => (task.completed = true));
    };

    // Computed for completed count
    const completedCount = computed(() => tasks.value.filter(t => t.completed).length);

    return { tasks, addTask, toggleTask, completeAll, completedCount };
  },
});
</script>

<style scoped>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #f9fafb;
    }
</style>
