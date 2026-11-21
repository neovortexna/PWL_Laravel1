<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen flex-col">

    <header class="bg-indigo-700 shadow-md">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-3 px-4 py-3">
            <h2 class="text-lg font-bold text-white">Sistem Informasi Surat</h2>
            <nav class="flex flex-wrap items-center gap-1 text-sm">
                <a href="{{ route('dashboard') }}"
                    class="rounded-lg px-3 py-2 font-medium text-indigo-100 transition hover:bg-indigo-600 hover:text-white {{ request()->routeIs('dashboard') ? 'bg-indigo-800 text-white' : '' }}">Dashboard</a>
                <a href="{{ route('surat-masuk.index') }}"
                    class="rounded-lg px-3 py-2 font-medium text-indigo-100 transition hover:bg-indigo-600 hover:text-white {{ request()->routeIs('surat-masuk.*') ? 'bg-indigo-800 text-white' : '' }}">Surat Masuk</a>
                <a href="{{ route('surat-keluar.index') }}"
                    class="rounded-lg px-3 py-2 font-medium text-indigo-100 transition hover:bg-indigo-600 hover:text-white {{ request()->routeIs('surat-keluar.*') ? 'bg-indigo-800 text-white' : '' }}">Surat Keluar</a>
                @auth
                    <span class="ml-2 hidden rounded-full bg-indigo-800 px-3 py-1 text-xs text-indigo-100 sm:inline">Masuk sebagai: {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="rounded-lg bg-white/10 px-3 py-2 font-medium text-white transition hover:bg-white/20">Keluar</button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>

    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-8">
        @yield('content')
    </main>

    <footer class="border-t border-slate-200 bg-white">
        <p class="mx-auto max-w-6xl px-4 py-4 text-center text-sm text-slate-500">Sistem Informasi Surat</p>
    </footer>

</body>
</html>
