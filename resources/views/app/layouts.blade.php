<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <nav>
        <!-- Navbar -->
        <a href="{{ route('products.index') }}">Products</a>
        @auth
            <span>{{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
