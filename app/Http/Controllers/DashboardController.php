<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'user' => [
                'name' => 'Andrea',
                'role' => 'Platform Engineer',
            ],
            'stats' => [
                'tasks_completed' => 12,
                'projects_active' => 3,
            ],
        ]);
    }
}
