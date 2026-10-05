@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <h1>Your Profile</h1>
    <form method="POST" action="/profile">
        @csrf
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

        <label>New Password (leave blank to keep current)</label>
        <input type="password" name="password">

        <label>Confirm New Password</label>
        <input type="password" name="password_confirmation">

        <button type="submit">Save Changes</button>
    </form>
@endsection