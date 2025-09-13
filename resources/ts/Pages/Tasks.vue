<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Task Dashboard</h1>

    <!-- Add Task Form -->
    <form @submit.prevent="submitTask" class="mb-6 space-y-2">
      <input
        v-model="title"
        type="text"
        placeholder="Task title"
        class="border p-2 rounded w-full"
        required
      />
      <textarea
        v-model="description"
        placeholder="Task description"
        class="border p-2 rounded w-full"
      ></textarea>
      <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
      >
        Add Task
      </button>
    </form>

    <!-- Task List -->
    <div v-if="tasks.length" class="space-y-4">
      <div
        v-for="task in tasks"
        :key="task.id"
        class="border p-4 rounded flex justify-between items-center"
      >
        <div>
          <h2 class="font-semibold">{{ task.title }}</h2>
          <p class="text-gray-600">{{ task.description }}</p>
        </div>

        <!-- Status Dropdown -->
        <select v-model="task.status" @change="updateStatus(task)" class="border p-1 rounded">
          <option value="Pending">Pending</option>
          <option value="In Progress">In Progress</option>
          <option value="Completed">Completed</option>
        </select>
      </div>
    </div>
    <p v-else>No tasks yet.</p>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, Ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

type Task = {
  id: number;
  title: string;
  description?: string;
  priority: string;
  status: string;
};

export default defineComponent({
  props: {
    initialTasks: {
      type: Array as () => Task[],
      required: true,
    },
  },
  setup(props) {
    const tasks: Ref<Task[]> = ref([...props.initialTasks]);
    const title = ref('');
    const description = ref('');

    const submitTask = () => {
      Inertia.post(
        '/tasks',
        {
          title: title.value,
          description: description.value,
          priority: 'Normal',
          status: 'Pending',
        },
        {
          onSuccess: (page: any) => {
            // Push the newly created task into our reactive array
            if (page.props.task) {
              tasks.value.push(page.props.task);
            }
            title.value = '';
            description.value = '';
          },
          preserveScroll: true,
        }
      );
    };

    const updateStatus = (task: Task) => {
      Inertia.patch(`/tasks/${task.id}/status`, { status: task.status });
    };

    return {
      tasks,
      title,
      description,
      submitTask,
      updateStatus,
    };
  },
});
</script>
