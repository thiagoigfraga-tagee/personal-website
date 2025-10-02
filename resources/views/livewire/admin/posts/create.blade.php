<?php

use Livewire\Volt\Component;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;

new class extends Component {
    public string $title = '';
    public string $slug = '';
    public string $excerpt = '';
    public string $content = '';
    public array $selectedTags = [];
    public bool $is_featured = false;
    public bool $published = false;
    public ?string $published_at = null;

    public function with(): array
    {
        return [
            'tags' => Tag::orderBy('name')->get(),
        ];
    }

    public function updatedTitle(): void
    {
        $this->slug = Str::slug($this->title);
    }

    public function save(): void
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'selectedTags' => 'array',
            'is_featured' => 'boolean',
            'published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $post = Post::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'is_featured' => $validated['is_featured'],
            'published_at' => $validated['published'] ? $validated['published_at'] ?? now() : null,
        ]);

        if (!empty($validated['selectedTags'])) {
            $post->tags()->attach($validated['selectedTags']);
        }

        session()->flash('success', 'Post criado com sucesso!');
        $this->redirect(route('admin.posts.index'));
    }
}; ?>

<div>
    <div class="min-h-screen bg-zinc-900 text-zinc-100">
        <div class="max-w-4xl mx-auto px-6 py-12">

            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <a href="{{ route('admin.posts.index') }}" wire:navigate
                        class="text-zinc-400 hover:text-purple-400 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                    <h1 class="text-4xl font-bold text-white">Novo Post</h1>
                </div>
                <p class="text-zinc-400 font-mono">Crie uma nova publicação</p>
            </div>

            <!-- Form -->
            <form wire:submit="save" class="space-y-6">

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-zinc-300 mb-2">
                        Título *
                    </label>
                    <input type="text" id="title" wire:model.live.debounce.500ms="title"
                        class="w-full px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-lg text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-purple-500 font-mono"
                        placeholder="Digite o título do post">
                    @error('title')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-semibold text-zinc-300 mb-2">
                        Slug * <span class="text-zinc-500 font-normal">(URL amigável)</span>
                    </label>
                    <input type="text" id="slug" wire:model="slug"
                        class="w-full px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-lg text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-purple-500 font-mono"
                        placeholder="slug-do-post">
                    @error('slug')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Excerpt -->
                <div>
                    <label for="excerpt" class="block text-sm font-semibold text-zinc-300 mb-2">
                        Resumo
                    </label>
                    <textarea id="excerpt" wire:model="excerpt" rows="3"
                        class="w-full px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-lg text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-purple-500 font-mono resize-none"
                        placeholder="Breve descrição do post (opcional)"></textarea>
                    @error('excerpt')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-sm font-semibold text-zinc-300 mb-2">
                        Conteúdo *
                    </label>
                    <textarea id="content" wire:model="content" rows="15"
                        class="w-full px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-lg text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-purple-500 font-mono resize-none"
                        placeholder="Escreva o conteúdo completo do post..."></textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-zinc-500 font-mono">Você pode usar Markdown</p>
                </div>

                <!-- Tags -->
                <div>
                    <label class="block text-sm font-semibold text-zinc-300 mb-2">
                        Tags
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        @foreach ($tags as $tag)
                            <label
                                class="flex items-center gap-2 p-3 bg-zinc-800 border border-zinc-700 rounded-lg cursor-pointer hover:border-purple-500 transition-colors">
                                <input type="checkbox" wire:model="selectedTags" value="{{ $tag->id }}"
                                    class="rounded bg-zinc-700 border-zinc-600 text-purple-600 focus:ring-purple-500 focus:ring-offset-zinc-900">
                                <span class="text-sm text-zinc-300 font-mono">#{{ $tag->slug }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('selectedTags')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Options -->
                <div class="grid md:grid-cols-2 gap-4">
                    <!-- Featured -->
                    <label
                        class="flex items-center gap-3 p-4 bg-zinc-800 border border-zinc-700 rounded-lg cursor-pointer hover:border-purple-500 transition-colors">
                        <input type="checkbox" wire:model="is_featured"
                            class="rounded bg-zinc-700 border-zinc-600 text-purple-600 focus:ring-purple-500 focus:ring-offset-zinc-900">
                        <div>
                            <div class="text-sm font-semibold text-zinc-300">Post em Destaque</div>
                            <div class="text-xs text-zinc-500">Aparecerá na home</div>
                        </div>
                    </label>

                    <!-- Published -->
                    <label
                        class="flex items-center gap-3 p-4 bg-zinc-800 border border-zinc-700 rounded-lg cursor-pointer hover:border-purple-500 transition-colors">
                        <input type="checkbox" wire:model.live="published"
                            class="rounded bg-zinc-700 border-zinc-600 text-purple-600 focus:ring-purple-500 focus:ring-offset-zinc-900">
                        <div>
                            <div class="text-sm font-semibold text-zinc-300">Publicar Agora</div>
                            <div class="text-xs text-zinc-500">Tornar visível publicamente</div>
                        </div>
                    </label>
                </div>

                <!-- Published Date (conditional) -->
                @if ($published)
                    <div>
                        <label for="published_at" class="block text-sm font-semibold text-zinc-300 mb-2">
                            Data de Publicação
                        </label>
                        <input type="datetime-local" id="published_at" wire:model="published_at"
                            class="px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-lg text-zinc-100 focus:outline-none focus:border-purple-500 font-mono">
                        @error('published_at')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-zinc-500 font-mono">Deixe vazio para publicar agora</p>
                    </div>
                @endif

                <!-- Actions -->
                <div class="flex items-center gap-4 pt-6 border-t border-zinc-700">
                    <button type="submit"
                        class="px-8 py-3 bg-purple-600 hover:bg-purple-500 text-white rounded-lg font-mono font-semibold transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Criar Post
                    </button>
                    <a href="{{ route('admin.posts.index') }}" wire:navigate
                        class="px-8 py-3 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 rounded-lg font-mono font-semibold transition-colors">
                        Cancelar
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>
