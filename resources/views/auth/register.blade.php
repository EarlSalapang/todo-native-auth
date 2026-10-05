@extends('layouts.app')
@section('title', 'Register')
@section('content')
    <h1>Create an Account</h1>
    <form method="POST" action="/register">
        @csrf
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>

        @error('email')<p style="color:var(--danger); font-size:0.8rem;">{{ $message }}</p>@enderror

        <button type="submit">Register</button>
    </form>
    <p class="muted-link" style="margin-top:1rem;">Already have an account? <a href="/login">Log in</a></p>
@endsection