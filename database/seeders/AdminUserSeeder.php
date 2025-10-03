<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pega as credenciais das variáveis de ambiente
        $adminEmail = env('ADMIN_EMAIL');
        $adminPassword = env('ADMIN_PASSWORD');
        $adminName = env('ADMIN_NAME', 'Admin');

        // Validações
        if (!$adminEmail || !$adminPassword) {
            $this->command->warn('ADMIN_EMAIL e ADMIN_PASSWORD não definidos. Pulando criação do admin.');
            return;
        }

        // Verifica se já existe um usuário admin
        if (User::where('email', $adminEmail)->exists()) {
            $this->command->info('✓ Admin user already exists!');
            return;
        }

        // Cria o usuário admin
        User::create([
            'name' => $adminName,
            'email' => $adminEmail,
            'password' => bcrypt($adminPassword),
            'email_verified_at' => now(),
        ]);

        $this->command->info('✓ Admin user created successfully!');
        $this->command->info("  Email: {$adminEmail}");
        $this->command->warn('  IMPORTANTE: Remova ADMIN_PASSWORD das variáveis após confirmar o login!');
    }
}
