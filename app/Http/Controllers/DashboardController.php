<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch tasks to summarize
        $tasks = Task::all();

        // Count by status
        $taskCounts = [
            'pending' => $tasks->where('status', 'Pending')->count(),
            'in_progress' => $tasks->where('status', 'In Progress')->count(),
            'done' => $tasks->where('status', 'Done')->count(),
        ];

        // Count by priority
        $priorityCounts = [
            'low' => $tasks->where('priority', 'Low')->count(),
            'medium' => $tasks->where('priority', 'Medium')->count(),
            'high' => $tasks->where('priority', 'High')->count(),
        ];

        return Inertia::render('Dashboard', [
            'taskCounts' => $taskCounts,
            'priorityCounts' => $priorityCounts,
        ]);
    }
}
