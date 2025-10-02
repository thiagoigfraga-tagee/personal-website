<x-layouts.public>
    <div class="min-h-screen bg-zinc-900 text-zinc-100">
        <div class="max-w-4xl mx-auto px-6 py-16 lg:py-24">

            <!-- Header -->
            <div class="mb-12">
                <h1 class="text-4xl lg:text-3xl font-bold text-white mb-3">
                    @isset($tag)
                        Posts com tag: <span class="text-purple-500">#{{ $tag->name }}</span>
                    @else
                        <span class="text-purple-500">//</span> Blog
                    @endisset
                </h1>
                <p class="text-zinc-400 font-mono">
                    @isset($tag)
                        Mostrando todos os posts sobre {{ $tag->name }}
                    @else
                        Pensamentos, tutoriais e experiências sobre desenvolvimento
                    @endisset
                </p>
            </div>

            <!-- Posts List -->
            @if ($posts->count() > 0)
                <div class="space-y-8 mb-12">
                    @foreach ($posts as $post)
                        <article class="group">
                            <a href="{{ route('blog.show', $post->slug) }}" class="block">
                                <div
                                    class="p-6 bg-zinc-800 border border-zinc-700 rounded-lg hover:bg-zinc-750 hover:border-purple-500 transition-all">
                                    <!-- Post Date -->
                                    <time datetime="{{ $post->published_at->toIso8601String() }}"
                                        class="text-sm text-zinc-500 font-mono">
                                        {{ $post->published_at->format('d/m/Y') }}
                                    </time>

                                    <!-- Post Title -->
                                    <h2
                                        class="text-2xl font-bold text-white group-hover:text-purple-400 transition-colors mt-2 mb-3">
                                        {{ $post->title }}
                                    </h2>

                                    <!-- Post Excerpt -->
                                    @if ($post->excerpt)
                                        <p class="text-zinc-400 mb-4 leading-relaxed">
                                            {{ $post->excerpt }}
                                        </p>
                                    @endif

                                    <!-- Tags -->
                                    @if ($post->tags->count() > 0)
                                        <div class="flex flex-wrap gap-2 mt-4">
                                            @foreach ($post->tags as $tag)
                                                <span
                                                    class="text-sm text-purple-500 font-mono hover:text-purple-400 transition-colors">
                                                    #{{ $tag->slug }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif

                                    <!-- Read More -->
                                    <div
                                        class="mt-4 text-purple-500 group-hover:text-purple-400 font-mono text-sm flex items-center gap-2 transition-colors">
                                        Ler mais
                                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if ($posts->hasPages())
                    <div class="flex justify-center">
                        <div class="flex gap-2">
                            @if ($posts->onFirstPage())
                                <span
                                    class="px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-lg text-zinc-600 font-mono cursor-not-allowed">
                                    ← Anterior
                                </span>
                            @else
                                <a href="{{ $posts->previousPageUrl() }}"
                                    class="px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-lg text-zinc-300 hover:border-purple-500 hover:text-purple-400 font-mono transition-colors">
                                    ← Anterior
                                </a>
                            @endif

                            <span
                                class="px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-lg text-zinc-400 font-mono">
                                Página {{ $posts->currentPage() }} de {{ $posts->lastPage() }}
                            </span>

                            @if ($posts->hasMorePages())
                                <a href="{{ $posts->nextPageUrl() }}"
                                    class="px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-lg text-zinc-300 hover:border-purple-500 hover:text-purple-400 font-mono transition-colors">
                                    Próxima →
                                </a>
                            @else
                                <span
                                    class="px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-lg text-zinc-600 font-mono cursor-not-allowed">
                                    Próxima →
                                </span>
                            @endif
                        </div>
                    </div>
                @endif
            @else
                <!-- Empty State -->
                <div class="text-center py-20">
                    <div class="text-zinc-600 mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-zinc-400 mb-2">Nenhum post encontrado</h3>
                    <p class="text-zinc-500 font-mono">
                        @isset($tag)
                            Não há posts com essa tag ainda.
                        @else
                            Em breve teremos conteúdo por aqui.
                        @endisset
                    </p>
                </div>
            @endif

        </div>
    </div>
</x-layouts.public>
