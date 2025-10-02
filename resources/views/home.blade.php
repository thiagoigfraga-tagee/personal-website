<x-layouts.public>
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
                            Desenvolvedor de Software Jr. <span class="text-purple-500">|</span> Ecossistema PHP/Laravel
                            <span class="text-purple-500">|</span> Computação
                        </p>
                        <p class="text-sm text-zinc-500 mt-2">
                            📍 Guarapuava, Paraná, Brasil
                        </p>
                    </div>
                </div>
            </section>

            <!-- About Section -->
            <section class="mb-20 ">
                <h2 class="text-2xl font-bold mb-6 text-zinc-300 font-mono">
                    <span class="text-purple-500">//</span> Sobre mim
                </h2>
                <div class="border-l-2 border-purple-500 pl-6">
                    <p class="text-lg  leading-relaxed ">
                        Desenvolvedor de Software <span class="font-bold text-purple-500">dedicado</span>, com <span
                            class="font-bold text-purple-500">base sólida em matemática computacional</span> e <span
                            class="font-bold text-purple-500">experiência do usuário</span>.
                        Conhecimento avançado das linguagens <span class="font-bold text-purple-500">PHP</span>, <span
                            class="font-bold text-purple-500">JavaScript</span> e frameworks modernos como <span
                            class="font-bold text-purple-500">Laravel</span> e <span
                            class="font-bold text-purple-500">React.js</span>.
                    </p>
                    <p class="text-lg  leading-relaxed">
                        Hábil na <span class="font-bold text-purple-500">resolução de problemas</span> e na entrega de
                        soluções de
                        <span class="font-bold text-purple-500"> software de alta qualidade</span>, com foco em
                        <span class="font-bold text-purple-500">UX/UI Design</span> e desenvolvimento de <span
                            class="font-bold text-purple-500">aplicações web escaláveis</span>.
                    </p>
                </div>

            </section>

            <!-- Experience Section -->
            <section class="mb-20">
                <h2 class="text-2xl font-bold mb-6 text-zinc-300 font-mono">
                    <span class="text-green-500">//</span> Experiência Profissional
                </h2>
                <div class="space-y-8">
                    <!-- Tagee Tech -->
                    <div class="border-l-2 border-green-500 pl-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-2">
                            <h3 class="text-xl font-bold text-white">Estagiário em Desenvolvimento de Software</h3>
                            <span class="text-sm text-zinc-500 font-mono">Jul 2025 — <span
                                    class="text-green-500">Atual</span> </span>
                        </div>
                        <p class="font-semibold text-green-500 mb-3">Tagee Tech (Software House) • Remoto</p>
                        <ul class="space-y-2 text-zinc-400">
                            <li class="flex gap-2">
                                <span class="text-green-500 mt-1">▹</span>
                                <span>Desenvolvimento e manutenção de aplicações web com <span
                                        class="font-bold text-green-500">Laravel</span>, <span
                                        class="font-bold text-green-500">Livewire</span> e <span
                                        class="font-bold text-green-500">Alpine.js</span>
                            </li>
                            <li class="flex gap-2">
                                <span class="text-green-500 mt-1">▹</span>
                                <span>Construção de componentes reativos reutilizáveis com <span
                                        class="font-bold text-green-500">Tailwind CSS</span> e <span
                                        class="font-bold text-green-500">DaisyUI</span>
                            </li>
                            <li class="flex gap-2">
                                <span class="text-green-500 mt-1">▹</span>
                                <span>Integrações com APIs: <span class="font-bold text-green-500">ViaCEP</span>, <span
                                        class="font-bold text-green-500">TomTom Maps</span>, <span
                                        class="font-bold text-green-500">Asaas</span>, <span
                                        class="font-bold text-green-500">Pagarme</span>... e <span
                                        class="font-bold text-green-500">mais</span>!</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Cervejaria Hank Bier -->
                    <div class="border-l-2 border-zinc-700 pl-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-2">
                            <h3 class="text-xl font-bold text-white">Atendente e Assistente</h3>
                            <span class="text-sm text-zinc-500 font-mono">Fev 2018 — Mar 2019</span>
                        </div>
                        <p class="text-zinc-400 mb-3">Cervejaria Hank Bier • Guarapuava, PR</p>
                        <p class="text-zinc-400">
                            <span class="mt-1">▹</span>
                            Primeiro emprego. Desenvolvimento de habilidades de <span class="font-bold">trabalho em
                                equipe</span>, <span class="font-bold">comunicação</span> e <span
                                class="font-bold">gestão de tempo</span>
                        </p>
                    </div>
                </div>
            </section>

            <!-- Education Section -->
            <section class="mb-20">
                <h2 class="text-2xl font-bold mb-6 text-zinc-300 font-mono">
                    <span class="text-orange-500">//</span> Educação
                </h2>
                <div class="space-y-6">
                    <!-- Graduação -->
                    <div class="border-l-2 border-orange-500 pl-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-2">
                            <h3 class="text-xl font-bold text-white">Bacharelado em Ciência da Computação</h3>
                            <span class="text-sm text-zinc-500 font-mono">Fev 2019 — Dez 2025</span>
                        </div>
                        <p class="font-semibold text-orange-500 mb-3"><a class="hover:underline"
                                href="https://www3.unicentro.br">UNICENTRO</a> • Universidade Estadual do Centro-Oeste •
                            Guarapuava,
                            PR
                        </p>
                        <ul class="space-y-2 text-zinc-400">
                            <li class="flex gap-2">
                                <span class="text-orange-500 mt-1">▹</span>
                                <span>Minha principal formação, me deu uma forte base teórica e prática em <span
                                        class="font-bold text-orange-500">programação</span></span>
                            </li>
                            <li class="flex gap-2">
                                <span class="text-orange-500 mt-1">▹</span>
                                <span>Foi aqui que desenvolvi <span class="font-bold text-orange-500">raciocínio
                                        lógico</span> e habilidades de <span class="font-bold text-orange-500">resolução
                                        de
                                        problemas</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Cursos -->
                    <div class="border-l-2 border-orange-500 pl-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-2">
                            <h3 class="text-xl font-bold text-white">Desenvolvimento Web</h3>
                            <span class="text-sm text-zinc-500 font-mono">Abr 2020 — <span
                                    class="text-orange-500">Atual</span></span>
                        </div>
                        <p class="text-orange-500 mb-3"><a class="hover:underline"
                                href="https://www.origamid.com">Origamid</a> • Escola Online
                        </p>
                        <ul class="space-y-2 text-zinc-400">
                            <li class="flex gap-2">
                                <span class="text-orange-500 mt-1">▹</span>
                                <span>Web Design, UX/UI Design, HTML, CSS, JavaScript ES6+ e React.js</span>
                            </li>
                            <li class="flex gap-2">
                                <span class="text-orange-500 mt-1">▹</span>
                                <span>Foi aqui que desenvolvi grande parte das minhas habilidades no desenvolvimento
                                    web, sendo uma das minhas grandes inspirações até hoje</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Skills Section -->
            <section class="mb-20">
                <h2 class="text-2xl font-bold mb-6 text-zinc-300 font-mono">
                    <span class="text-blue-500">//</span> Habilidades Técnicas
                </h2>

                <div class="space-y-6">
                    <!-- Backend -->
                    <div>
                        <h3 class="text-sm font-semibold text-white mb-3 font-mono">Backend & Frameworks</h3>
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
                        <h3 class="text-sm font-semibold text-white mb-3 font-mono">Frontend & Estilo</h3>
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
                        <h3 class="text-sm font-semibold text-white mb-3 font-mono">Banco de Dados & Ferramentas
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
                        <h3 class="text-sm font-semibold text-white mb-3 font-mono">Especializações</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['UX/UI Design', 'Web Design', 'Matemática Computacional'] as $skill)
                                <span
                                    class="px-3 py-1.5 bg-zinc-800 border border-zinc-700 rounded text-blue-500 font-mono text-sm hover:border-blue-500 transition-colors">
                                    {{ $skill }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <!-- Languages Section -->
            <section class="mb-20">
                <h2 class="text-2xl font-bold mb-6 text-zinc-300 font-mono">
                    <span class="text-pink-500">//</span> Idiomas
                </h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="p-4 bg-zinc-800 border border-zinc-700 rounded-lg">
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-semibold text-white">Português</span>
                            <span class="text-sm text-pink-500 font-mono">Nativo</span>
                        </div>
                    </div>
                    <div class="p-4 bg-zinc-800 border border-zinc-700 rounded-lg">
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-semibold text-white">Inglês</span>
                            <span class="text-sm text-pink-500 font-mono">C1 — Avançado</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Featured Posts Section -->
            @if ($featuredPosts->count() > 0)
                <section class="mb-20">
                    <h2 class="text-2xl font-bold mb-6 text-zinc-300 font-mono">
                        <span class="text-purple-500">//</span> Posts em destaque
                    </h2>
                    <div class="space-y-4">
                        @foreach ($featuredPosts as $post)
                            <a href="{{ route('blog.show', $post->slug) }}"
                                class="block p-6 bg-zinc-800 border border-zinc-700 rounded-lg hover:bg-zinc-750 hover:border-zinc-600 transition-colors group">
                                <h3
                                    class="text-xl font-semibold mb-2 text-white group-hover:text-purple-400 transition-colors">
                                    {{ $post->title }}
                                </h3>
                                @if ($post->excerpt)
                                    <p class="text-zinc-400 mb-3">{{ $post->excerpt }}</p>
                                @endif
                                <div class="flex items-center gap-4 text-sm text-zinc-500">
                                    <span class="font-mono">{{ $post->published_at->format('d/m/Y') }}</span>
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
                        <a href="{{ route('blog.index') }}"
                            class="inline-block text-purple-500 hover:text-green-400 font-mono transition-colors">
                            Ver todos os posts →
                        </a>
                    </div>
                </section>
            @endif

        </div>
    </div>
</x-layouts.public>
