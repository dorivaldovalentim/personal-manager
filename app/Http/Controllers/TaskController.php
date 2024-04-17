<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = auth()->user()->tasks()->orderBy('task')->get();

        return Inertia::render('Tasks/Index', [
            "tasks" => $tasks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'task' => 'required|string',
            'description' => 'required|string',
            'status' => 'boolean',
        ]);

        if ($task = auth()->user()->tasks()->create($validatedData)) {
            return to_route('tasks.index');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'task' => 'required|string',
            'description' => 'required|string',
            'status' => 'boolean',
        ]);

        if ($task->update($validatedData)) {
            return to_route('tasks.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if ($task->delete()) {
            return to_route('tasks.index');
        }
    }
}
