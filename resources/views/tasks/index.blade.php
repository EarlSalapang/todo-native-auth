@extends('layouts.app')
@section('title', 'My Tasks')
@section('panel-class', 'wide')
@section('content')
    <h1>My Tasks</h1>

    <form method="POST" action="/tasks" style="display:flex; gap:0.5rem; margin-bottom:1.5rem;">
        @csrf
        <input type="text" name="title" placeholder="What do you need to do?" required style="flex:1;">
        <button type="submit" style="margin-top:0;">Add</button>
    </form>

    @forelse ($tasks as $task)
        <div class="task-row">
            <span class="{{ $task->is_completed ? 'done' : '' }}">{{ $task->title }}</span>
            <span class="task-actions">
                <a href="{{ route('tasks.edit', $task) }}" class="btn">Edit</a>
                <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger" onclick="return confirm('Delete this task?')">Delete</button>
                </form>
            </span>
        </div>
    @empty
        <p class="muted-link">No tasks yet — add one above.</p>
    @endforelse
@endsection