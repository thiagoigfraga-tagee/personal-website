<!DOCTYPE html>
<html lang="pt-BR" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-zinc-900 text-zinc-100 font-mono">

    <div class="min-h-screen flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">

            <!-- Logo/Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">Admin Panel</h1>
                <p class="text-zinc-400">Acesso restrito</p>
            </div>

            <!-- Login Card -->
            <div class="bg-zinc-800 border border-zinc-700 rounded-lg p-8">

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-lg">
                        @foreach ($errors->all() as $error)
                            <p class="text-red-400 text-sm">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Rate Limit Message -->
                @if (session('status'))
                    <div
                        class="mb-6 p-4 bg-yellow-500/10 border border-yellow-500/20 rounded-lg text-yellow-400 text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-zinc-300 mb-2">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            autofocus autocomplete="username"
                            class="w-full px-4 py-3 bg-zinc-900 border border-zinc-700 rounded-lg text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-purple-500">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-zinc-300 mb-2">
                            Senha
                        </label>
                        <input type="password" id="password" name="password" required autocomplete="current-password"
                            class="w-full px-4 py-3 bg-zinc-900 border border-zinc-700 rounded-lg text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-purple-500">
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember"
                            class="rounded bg-zinc-700 border-zinc-600 text-purple-600 focus:ring-purple-500 focus:ring-offset-zinc-900">
                        <label for="remember" class="ml-2 text-sm text-zinc-400">
                            Lembrar de mim
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full px-6 py-3 bg-purple-600 hover:bg-purple-500 text-white rounded-lg font-semibold transition-colors flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Entrar
                    </button>
                </form>

                <!-- Footer -->
                <div class="mt-6 pt-6 border-t border-zinc-700 text-center">
                    <a href="{{ route('home') }}" wire:navigate
                        class="text-sm text-zinc-500 hover:text-purple-400 transition-colors">
                        ← Voltar ao site
                    </a>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
