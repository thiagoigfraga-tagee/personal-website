<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ⚠️ USUÁRIO ADMIN NÃO É CRIADO AUTOMATICAMENTE
        // Para criar o admin, após o deploy execute:
        // php artisan tinker
        // User::create(['name' => 'Seu Nome', 'email' => 'seu@email.com', 'password' => bcrypt('SuaSenhaSegura123!')]);
        
        // Criar algumas tags
        $tags = [
            Tag::create(['name' => 'Laravel', 'slug' => 'laravel']),
            Tag::create(['name' => 'PHP', 'slug' => 'php']),
            Tag::create(['name' => 'Web Development', 'slug' => 'web-development']),
            Tag::create(['name' => 'Tutorial', 'slug' => 'tutorial']),
            Tag::create(['name' => 'Dicas', 'slug' => 'dicas']),
        ];

        // Criar posts de exemplo
        $post1 = Post::create([
            'title' => 'Começando com Laravel',
            'slug' => 'comecando-com-laravel',
            'excerpt' => 'Um guia rápido para iniciar com Laravel e entender os conceitos básicos do framework.',
            'content' => "# Começando com Laravel\n\nLaravel é um framework PHP poderoso e elegante. Neste post, vamos explorar os conceitos básicos.\n\n## Instalação\n\n```bash\ncomposer create-project laravel/laravel meu-projeto\n```\n\n## Rotas\n\nAs rotas ficam em `routes/web.php`...",
            'published_at' => now(),
            'is_featured' => true,
        ]);
        $post1->tags()->attach([$tags[0]->id, $tags[3]->id]);

        $post2 = Post::create([
            'title' => 'Dicas de PHP para Iniciantes',
            'slug' => 'dicas-php-iniciantes',
            'excerpt' => 'Algumas dicas essenciais para quem está começando com PHP.',
            'content' => "# Dicas de PHP\n\nAqui estão algumas dicas importantes:\n\n1. Sempre use prepared statements\n2. Aprenda OOP desde cedo\n3. Use composer para gerenciar dependências\n\nVamos ver cada uma em detalhes...",
            'published_at' => now()->subDays(5),
            'is_featured' => false,
        ]);
        $post2->tags()->attach([$tags[1]->id, $tags[4]->id]);

        $post3 = Post::create([
            'title' => 'Desenvolvimento Web Moderno',
            'slug' => 'desenvolvimento-web-moderno',
            'excerpt' => 'Tendências e ferramentas essenciais para desenvolvimento web em 2025.',
            'content' => "# Web Development em 2025\n\nO cenário do desenvolvimento web está sempre evoluindo...",
            'published_at' => now()->subDays(10),
            'is_featured' => false,
        ]);
        $post3->tags()->attach([$tags[2]->id]);
    }
}
