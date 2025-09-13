<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    // Display the dashboard with all tasks
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();

        return Inertia::render('Tasks', [
            'initialTasks' => $tasks, // This is used in Tasks.vue
        ]);
    }

    // Store a new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority ?? 'Normal',
            'status' => $request->status ?? 'Pending',
        ]);

        // Return the newly created task in props for Inertia
        return redirect()->back()->with([
            'task' => $task
        ]);
    }

    // Update task status
    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        $task->update([
            'status' => $request->status,
        ]);

        return response()->json(['success' => true]);
    }
}
