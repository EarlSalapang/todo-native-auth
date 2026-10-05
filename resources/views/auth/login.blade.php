@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <h1>Welcome Back</h1>
    <form method="POST" action="/login">
        @csrf
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
    <p class="muted-link" style="margin-top:1rem;">No account yet? <a href="/register">Register</a></p>
@endsection