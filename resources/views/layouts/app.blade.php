<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Todo Native Auth')</title>
    <style>
        :root {
            --bg: #1b1f24;
            --panel: #242a31;
            --accent: #e0a63a;
            --accent-dark: #b8842a;
            --text: #e8e6e3;
            --muted: #9aa3ad;
            --danger: #d9534f;
            --success: #4caf7d;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background: #15181c;
            border-bottom: 3px solid var(--accent);
        }
        nav .brand { font-weight: 700; letter-spacing: 1px; color: var(--accent); }
        nav a {
            color: var(--muted);
            text-decoration: none;
            margin-left: 1.25rem;
            font-size: 0.9rem;
        }
        nav a:hover { color: var(--text); }
        main {
            flex: 1;
            display: flex;
            justify-content: flex-start;
            padding: 3rem 4rem;
        }
        .panel {
            background: var(--panel);
            border-left: 4px solid var(--accent);
            border-radius: 6px;
            padding: 2rem 2.5rem;
            max-width: 480px;
            width: 100%;
            box-shadow: 0 8px 24px rgba(0,0,0,0.3);
        }
        .panel.wide { max-width: 720px; }
        h1 { margin-top: 0; font-size: 1.4rem; color: var(--accent); }
        label { display: block; margin: 0.9rem 0 0.3rem; font-size: 0.85rem; color: var(--muted); }
        input[type=text], input[type=email], input[type=password] {
            width: 100%;
            padding: 0.6rem 0.75rem;
            border-radius: 4px;
            border: 1px solid #3a4149;
            background: #1b1f24;
            color: var(--text);
            font-size: 0.95rem;
        }
        button, .btn {
            margin-top: 1.25rem;
            padding: 0.6rem 1.4rem;
            border: none;
            border-radius: 4px;
            background: var(--accent);
            color: #1b1f24;
            font-weight: 600;
            cursor: pointer;
        }
        button:hover, .btn:hover { background: var(--accent-dark); }
        .btn-danger { background: var(--danger); color: #fff; }
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        .alert-success { background: rgba(76,175,125,0.15); color: var(--success); border: 1px solid var(--success); }
        .alert-error { background: rgba(217,83,79,0.15); color: var(--danger); border: 1px solid var(--danger); }
        .task-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.6rem 0;
            border-bottom: 1px solid #343b42;
        }
        .task-row:last-child { border-bottom: none; }
        .task-row span.done { text-decoration: line-through; color: var(--muted); }
        .task-actions a, .task-actions button { margin-left: 0.5rem; font-size: 0.8rem; padding: 0.3rem 0.7rem; margin-top: 0; }
        .muted-link { color: var(--muted); font-size: 0.85rem; }
        .muted-link a { color: var(--accent); }
    </style>
</head>
<body>
    <nav>
        <span class="brand">TODO.NATIVE</span>
        <div>
            @if (session('user_id'))
                <a href="/tasks">Tasks</a>
                <a href="/profile">Profile</a>
                <form action="/logout" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" style="margin-top:0; background:transparent; color:var(--muted); border:1px solid #3a4149;">Logout</button>
                </form>
            @else
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            @endif
        </div>
    </nav>
    <main>
        <div class="panel @yield('panel-class')">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif
            @yield('content')
        </div>
    </main>
</body>
</html>