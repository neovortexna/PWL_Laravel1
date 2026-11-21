<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIM-Surat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-gradient-to-br from-indigo-600 via-indigo-700 to-slate-900 px-4">
    <div class="w-full max-w-md">
        <div class="mb-6 text-center">
            <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-2xl bg-white/15 text-2xl text-white ring-1 ring-white/30">✉</div>
            <h1 class="!text-white">Login SIM-Surat</h1>
            <p class="mt-1 text-sm text-indigo-200">Sistem Informasi Surat Masuk &amp; Keluar</p>
        </div>

        <div class="rounded-2xl bg-white p-8 shadow-2xl">
            <form method="POST" action="{{ route('login.submit') }}" class="grid gap-5">
                @csrf
                <div>
                    <label class="form-label" for="email">Email</label>
                    <input class="form-input" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com">
                    @error('email') <p class="form-error">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="form-label" for="password">Password</label>
                    <input class="form-input" id="password" type="password" name="password" placeholder="••••••••">
                    @error('password') <p class="form-error">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="btn-primary w-full py-2.5">Masuk</button>
            </form>
        </div>
    </div>
</body>
</html>
