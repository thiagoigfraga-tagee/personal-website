<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-zinc-900">
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-zinc-900/95 backdrop-blur-sm border-b border-zinc-800">
        <div class="max-w-4xl mx-auto px-6">
            <div class="flex items-center justify-between h-16">
                <!-- Logo/Nome -->
                <a href="{{ route('home') }}" wire:navigate
                    class="text-lg font-bold font-mono {{ request()->routeIs('home') ? 'text-purple-500' : 'text-zinc-300 hover:text-purple-400' }} transition-colors">
                    TF
                </a>

                <!-- Nav Links -->
                <div class="flex items-center gap-6">
                    <a href="{{ route('home') }}" wire:navigate
                        class="text-sm font-mono {{ request()->routeIs('home') ? 'text-purple-500 font-semibold' : 'text-zinc-400 hover:text-purple-400' }} transition-colors">
                        Home
                    </a>
                    <a href="{{ route('blog.index') }}" wire:navigate
                        class="text-sm font-mono {{ request()->routeIs('blog.*') ? 'text-purple-500 font-semibold' : 'text-zinc-400 hover:text-purple-400' }} transition-colors">
                        Blog
                    </a>
                    <a href="{{ route('contact') }}" wire:navigate
                        class="text-sm font-mono {{ request()->routeIs('contact') ? 'text-purple-500 font-semibold' : 'text-zinc-400 hover:text-purple-400' }} transition-colors">
                        Contato
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="min-h-screen">
        {{ $slot }}
    </div>
</body>

</html>
