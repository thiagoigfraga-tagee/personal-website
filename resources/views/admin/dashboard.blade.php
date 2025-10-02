<x-layouts.admin>
    <x-slot:title>Dashboard - Admin</x-slot:title>

    <div class="min-h-screen bg-zinc-900 text-zinc-100">
        <div class="max-w-7xl mx-auto px-6 py-12">

            <!-- Header -->
            <div class="mb-12">
                <h1 class="text-4xl font-bold text-white mb-2">
                    Dashboard
                </h1>
                <p class="text-zinc-400 font-mono">
                    Bem-vindo ao painel de administração
                </p>
            </div>

            <!-- Stats Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Total Posts -->
                <div class="p-6 bg-zinc-800 border border-zinc-700 rounded-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-zinc-500 uppercase">Total de Posts</h3>
                        <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <p class="text-4xl font-bold text-white">{{ $stats['total_posts'] }}</p>
                </div>

                <!-- Published Posts -->
                <div class="p-6 bg-zinc-800 border border-zinc-700 rounded-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-zinc-500 uppercase">Publicados</h3>
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-4xl font-bold text-white">{{ $stats['published_posts'] }}</p>
                </div>

                <!-- Draft Posts -->
                <div class="p-6 bg-zinc-800 border border-zinc-700 rounded-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-zinc-500 uppercase">Rascunhos</h3>
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <p class="text-4xl font-bold text-white">{{ $stats['draft_posts'] }}</p>
                </div>

                <!-- Total Tags -->
                <div class="p-6 bg-zinc-800 border border-zinc-700 rounded-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-semibold text-zinc-500 uppercase">Tags</h3>
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <p class="text-4xl font-bold text-white">{{ $stats['total_tags'] }}</p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-white mb-6">Ações Rápidas</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <a href="{{ route('admin.posts.create') }}" wire:navigate
                        class="group p-6 bg-zinc-800 border-2 border-zinc-700 rounded-lg hover:border-purple-500 transition-all">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-purple-500/10 rounded-lg group-hover:bg-purple-500/20 transition-colors">
                                <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white group-hover:text-purple-400 transition-colors">
                                    Novo Post
                                </h3>
                                <p class="text-zinc-400 text-sm">Criar uma nova publicação</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.posts.index') }}" wire:navigate
                        class="group p-6 bg-zinc-800 border-2 border-zinc-700 rounded-lg hover:border-purple-500 transition-all">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-purple-500/10 rounded-lg group-hover:bg-purple-500/20 transition-colors">
                                <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white group-hover:text-purple-400 transition-colors">
                                    Gerenciar Posts
                                </h3>
                                <p class="text-zinc-400 text-sm">Ver, editar e deletar posts</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Recent Posts -->
            <div>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-white">Posts Recentes</h2>
                    <a href="{{ route('admin.posts.index') }}" wire:navigate
                        class="text-sm text-purple-400 hover:text-purple-300 font-mono transition-colors">
                        Ver todos →
                    </a>
                </div>

                @php
                    $recentPosts = \App\Models\Post::with('tags')->latest()->take(5)->get();
                @endphp

                @if ($recentPosts->count() > 0)
                    <div class="bg-zinc-800 border border-zinc-700 rounded-lg overflow-hidden">
                        <div class="divide-y divide-zinc-700">
                            @foreach ($recentPosts as $post)
                                <div class="p-4 hover:bg-zinc-750 transition-colors">
                                    <div class="flex items-start justify-between gap-4">
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center gap-3 mb-2">
                                                <h3 class="text-lg font-semibold text-white truncate">
                                                    {{ $post->title }}
                                                </h3>
                                                @if ($post->published_at)
                                                    <span
                                                        class="px-2 py-1 bg-green-500/10 text-green-400 rounded text-xs font-semibold flex-shrink-0">
                                                        Publicado
                                                    </span>
                                                @else
                                                    <span
                                                        class="px-2 py-1 bg-yellow-500/10 text-yellow-400 rounded text-xs font-semibold flex-shrink-0">
                                                        Rascunho
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="flex items-center gap-4 text-sm text-zinc-500 font-mono mb-2">
                                                <span>{{ $post->created_at->diffForHumans() }}</span>
                                                @if ($post->tags->count() > 0)
                                                    <span>•</span>
                                                    <div class="flex gap-1">
                                                        @foreach ($post->tags->take(3) as $tag)
                                                            <span class="text-purple-400">#{{ $tag->slug }}</span>
                                                        @endforeach
                                                        @if ($post->tags->count() > 3)
                                                            <span>+{{ $post->tags->count() - 3 }}</span>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-2 flex-shrink-0">
                                            @if ($post->published_at)
                                                <a href="{{ route('blog.show', $post->slug) }}" target="_blank"
                                                    class="p-2 text-zinc-400 hover:text-purple-400 transition-colors"
                                                    title="Ver post">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.posts.edit', $post) }}" wire:navigate
                                                class="p-2 text-zinc-400 hover:text-purple-400 transition-colors"
                                                title="Editar">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="bg-zinc-800 border border-zinc-700 rounded-lg p-12 text-center">
                        <svg class="w-16 h-16 mx-auto mb-4 text-zinc-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="text-zinc-500 font-mono mb-4">Nenhum post criado ainda</p>
                        <a href="{{ route('admin.posts.create') }}" wire:navigate
                            class="inline-flex items-center gap-2 px-6 py-3 bg-purple-600 hover:bg-purple-500 text-white rounded-lg font-mono font-semibold transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Criar Primeiro Post
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-layouts.admin>
