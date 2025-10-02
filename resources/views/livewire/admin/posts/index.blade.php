<?php

use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\Post;

new class extends Component {
    use WithPagination;

    public string $search = '';
    public string $filter = 'all'; // all, published, draft

    public function with(): array
    {
        $query = Post::with('tags')->latest();

        // Filtro por status
        if ($this->filter === 'published') {
            $query->whereNotNull('published_at');
        } elseif ($this->filter === 'draft') {
            $query->whereNull('published_at');
        }

        // Busca
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')->orWhere('content', 'like', '%' . $this->search . '%');
            });
        }

        return [
            'posts' => $query->paginate(15),
        ];
    }

    public function delete(Post $post): void
    {
        $post->delete();

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Post deletado com sucesso!',
        ]);
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingFilter(): void
    {
        $this->resetPage();
    }
}; ?>

<div>
    <div class="min-h-screen bg-zinc-900 text-zinc-100">
        <div class="max-w-7xl mx-auto px-6 py-12">

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 rounded-lg text-green-400 font-mono">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-2">Posts</h1>
                    <p class="text-zinc-400 font-mono">Gerencie todas as suas publicações</p>
                </div>
                <a href="{{ route('admin.posts.create') }}" wire:navigate
                    class="px-6 py-3 bg-purple-600 hover:bg-purple-500 text-white rounded-lg font-mono font-semibold transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Novo Post
                </a>
            </div>

            <!-- Filters -->
            <div class="mb-6 grid md:grid-cols-2 gap-4">
                <!-- Search -->
                <div>
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Buscar posts..."
                        class="w-full px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-lg text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-purple-500 font-mono">
                </div>

                <!-- Filter -->
                <div>
                    <select wire:model.live="filter"
                        class="w-full px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-lg text-zinc-100 focus:outline-none focus:border-purple-500 font-mono">
                        <option value="all">Todos os posts</option>
                        <option value="published">Publicados</option>
                        <option value="draft">Rascunhos</option>
                    </select>
                </div>
            </div>

            <!-- Posts Table -->
            <div class="bg-zinc-800 border border-zinc-700 rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-zinc-900">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                                    Título
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                                    Tags
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                                    Status
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                                    Data
                                </th>
                                <th
                                    class="px-6 py-4 text-right text-xs font-semibold text-zinc-400 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-700">
                            @forelse($posts as $post)
                                <tr class="hover:bg-zinc-750 transition-colors">
                                    <td class="px-6 py-4">
                                        <div>
                                            <div class="font-semibold text-white">{{ $post->title }}</div>
                                            <div class="text-sm text-zinc-500 font-mono">{{ $post->slug }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-1">
                                            @foreach ($post->tags as $tag)
                                                <span
                                                    class="px-2 py-1 bg-zinc-900 border border-zinc-700 rounded text-xs text-purple-400 font-mono">
                                                    #{{ $tag->slug }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($post->published_at)
                                            <span
                                                class="px-3 py-1 bg-green-500/10 text-green-400 rounded-full text-xs font-semibold">
                                                Publicado
                                            </span>
                                        @else
                                            <span
                                                class="px-3 py-1 bg-yellow-500/10 text-yellow-400 rounded-full text-xs font-semibold">
                                                Rascunho
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-zinc-400 font-mono">
                                        {{ $post->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
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
                                            <button wire:click="delete({{ $post->id }})"
                                                wire:confirm="Tem certeza que deseja deletar este post?"
                                                class="p-2 text-zinc-400 hover:text-red-400 transition-colors"
                                                title="Deletar">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="text-zinc-500">
                                            <svg class="w-12 h-12 mx-auto mb-4 text-zinc-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <p class="font-mono">Nenhum post encontrado</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $posts->links() }}
            </div>

        </div>
    </div>
</div>
