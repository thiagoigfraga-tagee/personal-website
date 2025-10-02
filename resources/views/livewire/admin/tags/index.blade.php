<?php

use Livewire\Volt\Component;
use App\Models\Tag;
use Illuminate\Support\Str;

new class extends Component {
    public string $name = '';
    public string $slug = '';
    public ?int $editingId = null;

    public function with(): array
    {
        return [
            'tags' => Tag::withCount('posts')->orderBy('name')->get(),
        ];
    }

    public function updatedName(): void
    {
        $this->slug = Str::slug($this->name);
    }

    public function save(): void
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tags,slug,' . $this->editingId,
        ]);

        if ($this->editingId) {
            Tag::findOrFail($this->editingId)->update($validated);
            session()->flash('success', 'Tag atualizada com sucesso!');
        } else {
            Tag::create($validated);
            session()->flash('success', 'Tag criada com sucesso!');
        }

        $this->reset(['name', 'slug', 'editingId']);
    }

    public function edit(Tag $tag): void
    {
        $this->editingId = $tag->id;
        $this->name = $tag->name;
        $this->slug = $tag->slug;
    }

    public function cancelEdit(): void
    {
        $this->reset(['name', 'slug', 'editingId']);
    }

    public function delete(Tag $tag): void
    {
        $tag->delete();
        session()->flash('success', 'Tag deletada com sucesso!');
    }
}; ?>

<div>
    <div class="min-h-screen bg-zinc-900 text-zinc-100">
        <div class="max-w-5xl mx-auto px-6 py-12">

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 rounded-lg text-green-400 font-mono">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">Tags</h1>
                <p class="text-zinc-400 font-mono">Gerencie as tags dos seus posts</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">

                <!-- Form -->
                <div class="bg-zinc-800 border border-zinc-700 rounded-lg p-6">
                    <h2 class="text-xl font-bold text-white mb-6">
                        {{ $editingId ? 'Editar Tag' : 'Nova Tag' }}
                    </h2>

                    <form wire:submit="save" class="space-y-4">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-zinc-300 mb-2">
                                Nome *
                            </label>
                            <input type="text" id="name" wire:model.live.debounce.300ms="name"
                                class="w-full px-4 py-3 bg-zinc-900 border border-zinc-700 rounded-lg text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-purple-500 font-mono"
                                placeholder="Ex: JavaScript">
                            @error('name')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div>
                            <label for="slug" class="block text-sm font-semibold text-zinc-300 mb-2">
                                Slug *
                            </label>
                            <input type="text" id="slug" wire:model="slug"
                                class="w-full px-4 py-3 bg-zinc-900 border border-zinc-700 rounded-lg text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-purple-500 font-mono"
                                placeholder="javascript">
                            @error('slug')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Actions -->
                        <div class="flex gap-3 pt-2">
                            <button type="submit"
                                class="flex-1 px-6 py-3 bg-purple-600 hover:bg-purple-500 text-white rounded-lg font-mono font-semibold transition-colors">
                                {{ $editingId ? 'Atualizar' : 'Criar' }}
                            </button>
                            @if ($editingId)
                                <button type="button" wire:click="cancelEdit"
                                    class="px-6 py-3 bg-zinc-900 hover:bg-zinc-700 text-zinc-300 rounded-lg font-mono font-semibold transition-colors">
                                    Cancelar
                                </button>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Tags List -->
                <div class="bg-zinc-800 border border-zinc-700 rounded-lg p-6">
                    <h2 class="text-xl font-bold text-white mb-6">
                        Tags Existentes ({{ $tags->count() }})
                    </h2>

                    <div class="space-y-2 max-h-[500px] overflow-y-auto">
                        @forelse($tags as $tag)
                            <div
                                class="flex items-center justify-between p-3 bg-zinc-900 border border-zinc-700 rounded-lg hover:border-purple-500/50 transition-colors">
                                <div class="flex-1">
                                    <div class="font-semibold text-white">{{ $tag->name }}</div>
                                    <div class="flex items-center gap-3 text-xs text-zinc-500 font-mono">
                                        <span>#{{ $tag->slug }}</span>
                                        <span>•</span>
                                        <span>{{ $tag->posts_count }}
                                            {{ $tag->posts_count === 1 ? 'post' : 'posts' }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 ml-4">
                                    <button wire:click="edit({{ $tag->id }})"
                                        class="p-2 text-zinc-400 hover:text-purple-400 transition-colors"
                                        title="Editar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button wire:click="delete({{ $tag->id }})"
                                        wire:confirm="Tem certeza? Isso não deletará os posts associados."
                                        class="p-2 text-zinc-400 hover:text-red-400 transition-colors" title="Deletar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 text-zinc-500 font-mono">
                                Nenhuma tag cadastrada
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
