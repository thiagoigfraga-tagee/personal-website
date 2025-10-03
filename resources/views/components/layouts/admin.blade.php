<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-zinc-900">
    <!-- Admin Navbar -->
    <nav class="sticky top-0 z-50 bg-zinc-900/95 backdrop-blur-sm border-b border-zinc-800">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between h-16">
                <!-- Logo/Nome -->
                <div class="flex items-center gap-8">
                    <a href="{{ route('admin.dashboard') }}" wire:navigate
                        class="text-lg font-bold font-mono {{ request()->routeIs('admin.dashboard') ? 'text-purple-500' : 'text-zinc-300 hover:text-purple-400' }} transition-colors">
                        Admin
                    </a>

                    <!-- Admin Nav Links -->
                    <div class="flex items-center gap-6">
                        <a href="{{ LaravelLocalization::localizeUrl(route('admin.posts.index')) }}" wire:navigate
                            class="text-sm font-mono {{ request()->routeIs('admin.posts.*') ? 'text-purple-500 font-semibold' : 'text-zinc-400 hover:text-purple-400' }} transition-colors">
                            {{ __('messages.posts') }}
                        </a>
                        <a href="{{ LaravelLocalization::localizeUrl(route('admin.tags.index')) }}" wire:navigate
                            class="text-sm font-mono {{ request()->routeIs('admin.tags.*') ? 'text-purple-500 font-semibold' : 'text-zinc-400 hover:text-purple-400' }} transition-colors">
                            {{ __('messages.tags') }}
                        </a>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="flex items-center gap-6">
                    <!-- Language Switcher -->
                    <div class="flex items-center gap-2">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                class="text-sm font-mono px-2 py-1 rounded {{ app()->getLocale() === $localeCode ? 'bg-purple-500 text-white' : 'text-zinc-400 hover:text-purple-400 hover:bg-zinc-800' }} transition-colors"
                                title="{{ $properties['native'] }}">
                                {{ strtoupper($localeCode) === 'PT-BR' ? 'PT' : strtoupper($localeCode) }}
                            </a>
                        @endforeach
                    </div>

                    <a href="{{ LaravelLocalization::localizeUrl(route('home')) }}" wire:navigate
                        class="text-sm font-mono text-zinc-400 hover:text-purple-400 transition-colors">
                        {{ __('messages.view_site') }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-sm font-mono text-zinc-400 hover:text-red-400 transition-colors">
                            {{ __('messages.logout') }}
                        </button>
                    </form>
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
