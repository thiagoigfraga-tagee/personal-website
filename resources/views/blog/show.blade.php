<x-layouts.public>
    <x-slot:title>{{ $post->title }} - Blog</x-slot:title>

    <div class="min-h-screen bg-zinc-900 text-zinc-100">
        <div class="max-w-4xl mx-auto px-6 py-16 lg:py-24">
            <!-- Back to Blog -->
            <div class="mt-12 ">
                <a href="{{ route('blog.index') }}" wire:navigate
                    class="inline-flex items-center text-purple-500 hover:text-purple-400 font-mono transition-colors">
                    ← Ver todos os posts
                </a>
            </div>

            <!-- Article Header -->
            <article>
                <!-- Post Meta -->
                <div class="mb-6">
                    <time datetime="{{ $post->published_at->toIso8601String() }}" class="text-sm text-zinc-500 font-mono">
                        {{ $post->published_at->translatedFormat('d \d\e F \d\e Y') }}
                    </time>
                </div>

                <!-- Post Title -->
                <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6 leading-tight">
                    {{ $post->title }}
                </h1>

                <!-- Tags -->
                @if ($post->tags->count() > 0)
                    <div class="flex flex-wrap gap-2 mb-8">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('blog.tag', $tag->slug) }}" wire:navigate
                                class="px-3 py-1 text-sm bg-zinc-800 border border-zinc-700 rounded text-purple-500 hover:border-purple-500 font-mono transition-colors">
                                #{{ $tag->slug }}
                            </a>
                        @endforeach
                    </div>
                @endif

                <!-- Featured Image -->
                @if ($post->featured_image)
                    <div class="mb-12 rounded-lg overflow-hidden border border-zinc-700">
                        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}"
                            class="w-full h-auto">
                    </div>
                @endif

                <!-- Post Content -->
                <div class="prose prose-invert prose-zinc max-w-none">
                    <div class="text-zinc-300 leading-relaxed space-y-4">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>

                <!-- Share Section -->
                <div class="mt-16 pt-8 border-t border-zinc-800">
                    <div class="flex items-center justify-between">
                        <div class="flex gap-3">

                            <!-- Twitter -->
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}"
                                target="_blank" rel="noopener noreferrer"
                                class="p-2 bg-zinc-800 border border-zinc-700 rounded hover:border-green-500 hover:text-green-400 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                </svg>
                            </a>

                            <!-- LinkedIn -->
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->slug)) }}"
                                target="_blank" rel="noopener noreferrer"
                                class="p-2 bg-zinc-800 border border-zinc-700 rounded hover:border-green-500 hover:text-green-400 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>


            </article>

        </div>
    </div>
</x-layouts.public>
