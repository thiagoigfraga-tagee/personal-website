<x-layouts.public>
    <x-slot:title>Thiago Fraga - Full-Stack Web Developer</x-slot:title>

    <div class="min-h-screen bg-zinc-900 text-zinc-100">
        <!-- Container Principal -->
        <div class="max-w-4xl mx-auto px-6 py-16 lg:py-24">

            <!-- Hero Section -->
            <section class="mb-20">
                <div class="flex flex-col items-start gap-8">
                    {{-- Descomente e adicione sua foto se quiser
                    <img src="/img/avatar.jpg" alt="Thiago Isaac Garcia Fraga"
                        class="w-32 h-32 rounded-2xl border-2 border-zinc-700 object-cover">
                    --}}

                    <div>
                        <h1 class="text-4xl lg:text-5xl font-bold mb-3 text-white">
                            Thiago Isaac Garcia Fraga
                        </h1>
                        <p class="text-xl  font-mono">
                            {{ __('messages.job_title') }} <span class="text-purple-500">|</span> {{ __('messages.job_ecosystem') }}
                            <span class="text-purple-500">|</span> {{ __('messages.job_field') }}
                        </p>
                        <p class="text-sm text-zinc-500 mt-2">
                            📍 {{ __('messages.location') }}
                        </p>
                    </div>
                </div>
            </section>

            <!-- About Section -->
            <section class="mb-20 ">
                <h2 class="text-2xl font-bold mb-6 text-zinc-300 font-mono">
                    <span class="text-purple-500">//</span> {{ __('messages.about_me') }}
                </h2>
                <div class="border-l-2 border-purple-500 pl-6">
                    <p class="text-lg  leading-relaxed ">
                        {!! __('messages.about_p1') !!}
                    </p>
                    <p class="text-lg  leading-relaxed">
                        {!! __('messages.about_p2') !!}
                    </p>
                </div>

            </section>

            <!-- Experience Section -->
            <section class="mb-20">
                <h2 class="text-2xl font-bold mb-6 text-zinc-300 font-mono">
                    <span class="text-green-500">//</span> {{ __('messages.professional_experience') }}
                </h2>
                <div class="space-y-8">
                    <!-- Tagee Tech -->
                    <div class="border-l-2 border-green-500 pl-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-2">
                            <h3 class="text-xl font-bold text-white">{{ __('messages.job_title_intern') }}</h3>
                            <span class="text-sm text-zinc-500 font-mono">Jul 2025 — <span
                                    class="text-green-500">{{ __('messages.current') }}</span> </span>
                        </div>
                        <p class="font-semibold text-green-500 mb-3">{{ __('messages.company_tagee') }} • {{ __('messages.remote') }}</p>
                        <ul class="space-y-2 text-zinc-400">
                            <li class="flex gap-2">
                                <span class="text-green-500 mt-1">▹</span>
                                <span>{!! __('messages.exp_tagee_1') !!}</span>
                            </li>
                            <li class="flex gap-2">
                                <span class="text-green-500 mt-1">▹</span>
                                <span>{!! __('messages.exp_tagee_2') !!}</span>
                            </li>
                            <li class="flex gap-2">
                                <span class="text-green-500 mt-1">▹</span>
                                <span>{!! __('messages.exp_tagee_3') !!}</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Cervejaria Hank Bier -->
                    <div class="border-l-2 border-zinc-700 pl-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-2">
                            <h3 class="text-xl font-bold text-white">{{ __('messages.job_title_assistant') }}</h3>
                            <span class="text-sm text-zinc-500 font-mono">Fev 2018 — Mar 2019</span>
                        </div>
                        <p class="text-zinc-400 mb-3">{{ __('messages.company_hank') }} • Guarapuava, PR</p>
                        <p class="text-zinc-400">
                            <span class="mt-1">▹</span>
                            {!! __('messages.exp_hank') !!}
                        </p>
                    </div>
                </div>
            </section>

            <!-- Education Section -->
            <section class="mb-20">
                <h2 class="text-2xl font-bold mb-6 text-zinc-300 font-mono">
                    <span class="text-orange-500">//</span> {{ __('messages.education') }}
                </h2>
                <div class="space-y-6">
                    <!-- Graduação -->
                    <div class="border-l-2 border-orange-500 pl-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-2">
                            <h3 class="text-xl font-bold text-white">{{ __('messages.edu_bachelor') }}</h3>
                            <span class="text-sm text-zinc-500 font-mono">Fev 2019 — Dez 2025</span>
                        </div>
                        <p class="font-semibold text-orange-500 mb-3"><a class="hover:underline"
                                href="https://www3.unicentro.br">{{ __('messages.edu_unicentro') }}</a> •
                            Guarapuava,
                            PR
                        </p>
                        <ul class="space-y-2 text-zinc-400">
                            <li class="flex gap-2">
                                <span class="text-orange-500 mt-1">▹</span>
                                <span>{!! __('messages.edu_unicentro_1') !!}</span>
                            </li>
                            <li class="flex gap-2">
                                <span class="text-orange-500 mt-1">▹</span>
                                <span>{!! __('messages.edu_unicentro_2') !!}</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Cursos -->
                    <div class="border-l-2 border-orange-500 pl-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-2">
                            <h3 class="text-xl font-bold text-white">{{ __('messages.edu_webdev') }}</h3>
                            <span class="text-sm text-zinc-500 font-mono">Abr 2020 — <span
                                    class="text-orange-500">{{ __('messages.current') }}</span></span>
                        </div>
                        <p class="text-orange-500 mb-3"><a class="hover:underline"
                                href="https://www.origamid.com">{{ __('messages.edu_origamid') }}</a>
                        </p>
                        <ul class="space-y-2 text-zinc-400">
                            <li class="flex gap-2">
                                <span class="text-orange-500 mt-1">▹</span>
                                <span>{{ __('messages.edu_origamid_1') }}</span>
                            </li>
                            <li class="flex gap-2">
                                <span class="text-orange-500 mt-1">▹</span>
                                <span>{{ __('messages.edu_origamid_2') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Skills Section -->
            <section class="mb-20">
                <h2 class="text-2xl font-bold mb-6 text-zinc-300 font-mono">
                    <span class="text-blue-500">//</span> {{ __('messages.technical_skills') }}
                </h2>

                <div class="space-y-6">
                    <!-- Backend -->
                    <div>
                        <h3 class="text-sm font-semibold text-white mb-3 font-mono">{{ __('messages.skills_backend') }}</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['PHP', 'Laravel', 'Livewire', 'Alpine.js'] as $skill)
                                <span
                                    class="px-3 py-1.5 bg-zinc-800 border border-zinc-700 rounded text-blue-500 font-mono text-sm hover:border-blue-500 transition-colors">
                                    {{ $skill }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <!-- Frontend -->
                    <div>
                        <h3 class="text-sm font-semibold text-white mb-3 font-mono">{{ __('messages.skills_frontend') }}</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['JavaScript', 'React.js', 'HTML5', 'CSS3', 'SASS', 'Tailwind CSS', 'Figma'] as $skill)
                                <span
                                    class="px-3 py-1.5 bg-zinc-800 border border-zinc-700 rounded text-blue-500 font-mono text-sm hover:border-blue-500 transition-colors">
                                    {{ $skill }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <!-- Database & Tools -->
                    <div>
                        <h3 class="text-sm font-semibold text-white mb-3 font-mono">{{ __('messages.skills_database') }}
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['MySQL', 'PostgreSQL', 'Git', 'Docker', 'Redis', 'MailHog'] as $skill)
                                <span
                                    class="px-3 py-1.5 bg-zinc-800 border border-zinc-700 rounded text-blue-500 font-mono text-sm hover:border-blue-500 transition-colors">
                                    {{ $skill }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <!-- Specializations -->
                    <div>
                        <h3 class="text-sm font-semibold text-white mb-3 font-mono">{{ __('messages.skills_specializations') }}</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['spec_uxui', 'spec_webdesign', 'spec_computational_math'] as $skill)
                                <span
                                    class="px-3 py-1.5 bg-zinc-800 border border-zinc-700 rounded text-blue-500 font-mono text-sm hover:border-blue-500 transition-colors">
                                    {{ __('messages.' . $skill) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <!-- Languages Section -->
            <section class="mb-20">
                <h2 class="text-2xl font-bold mb-6 text-zinc-300 font-mono">
                    <span class="text-pink-500">//</span> {{ __('messages.languages') }}
                </h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="p-4 bg-zinc-800 border border-zinc-700 rounded-lg">
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-semibold text-white">{{ __('messages.portuguese') }}</span>
                            <span class="text-sm text-pink-500 font-mono">{{ __('messages.native') }}</span>
                        </div>
                    </div>
                    <div class="p-4 bg-zinc-800 border border-zinc-700 rounded-lg">
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-semibold text-white">{{ __('messages.english') }}</span>
                            <span class="text-sm text-pink-500 font-mono">C1 — {{ __('messages.advanced') }}</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Featured Posts Section -->
            @if ($featuredPosts->count() > 0)
                <section class="mb-20">
                    <h2 class="text-2xl font-bold mb-6 text-zinc-300 font-mono">
                        <span class="text-purple-500">//</span> {{ __('messages.featured_posts') }}
                    </h2>
                    <div class="space-y-4">
                        @foreach ($featuredPosts as $post)
                            <a href="{{ route('blog.show', $post->slug) }}" wire:navigate
                                class="block p-6 bg-zinc-800 border border-zinc-700 rounded-lg hover:bg-zinc-750 hover:border-zinc-600 transition-colors group">
                                <h3
                                    class="text-xl font-semibold mb-2 text-white group-hover:text-purple-400 transition-colors">
                                    {{ $post->title }}
                                </h3>
                                @if ($post->excerpt)
                                    <p class="text-zinc-400 mb-3">{{ $post->excerpt }}</p>
                                @endif
                                <div class="flex items-center gap-4 text-sm text-zinc-500">
                                    <span class="font-mono">
                                        @if(app()->getLocale() === 'pt-BR')
                                            {{ $post->published_at->format('d/m/Y') }}
                                        @else
                                            {{ $post->published_at->format('M d, Y') }}
                                        @endif
                                    </span>
                                    @if ($post->tags->count() > 0)
                                        <span class="flex gap-2">
                                            @foreach ($post->tags as $tag)
                                                <span class="text-purple-500">#{{ $tag->slug }}</span>
                                            @endforeach
                                        </span>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('blog.index') }}" wire:navigate
                            class="inline-block text-purple-500 hover:text-purple-400 font-mono transition-colors">
                            {{ __('messages.see_all_posts') }} →
                        </a>
                    </div>
                </section>
            @endif

        </div>
    </div>
</x-layouts.public>
