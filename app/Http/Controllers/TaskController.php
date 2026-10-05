<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Session::get('user_id'))
            ->latest()
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255']);

        Task::create([
            'user_id' => Session::get('user_id'),
            'title' => $request->title,
        ]);

        return back()->with('success', 'Task added.');
    }

    public function edit(Task $task)
    {
        $this->authorizeOwner($task);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorizeOwner($task);

        $request->validate(['title' => 'required|string|max:255']);

        $task->title = $request->title;
        $task->is_completed = $request->has('is_completed');
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $this->authorizeOwner($task);
        $task->delete();

        return back()->with('success', 'Task deleted.');
    }

    /**
     * Guard against one user editing/deleting another user's task
     * by guessing a task ID in the URL.
     */
    private function authorizeOwner(Task $task): void
    {
        if ($task->user_id !== Session::get('user_id')) {
            abort(403, 'This task does not belong to you.');
        }
    }
}