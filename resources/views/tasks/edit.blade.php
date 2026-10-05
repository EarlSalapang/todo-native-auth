@extends('layouts.app')
@section('title', 'Edit Task')
@section('content')
    <h1>Edit Task</h1>
    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <label>Title</label>
        <input type="text" name="title" value="{{ old('title', $task->title) }}" required>

        <label style="display:flex; align-items:center; gap:0.5rem; margin-top:1rem;">
            <input type="checkbox" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }} style="width:auto;">
            Mark as completed
        </label>

        <button type="submit">Save</button>
        <a href="{{ route('tasks.index') }}" class="btn" style="background:transparent; border:1px solid #3a4149; color:var(--muted);">Cancel</a>
    </form>
@endsection