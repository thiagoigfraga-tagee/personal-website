<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create {name} {email} {password}';
    protected $description = 'Create an admin user';

    public function handle()
    {
        if (User::where('email', $this->argument('email'))->exists()) {
            $this->error('User with this email already exists!');
            return 1;
        }

        $user = User::create([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
            'password' => bcrypt($this->argument('password')),
            'email_verified_at' => now(),
        ]);

        $this->info('Admin user created successfully!');
        $this->info('Name: ' . $user->name);
        $this->info('Email: ' . $user->email);
        
        return 0;
    }
}
