<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileInfo extends Model
{
    protected $table = 'profile_info';

    protected $fillable = [
        'name',
        'title',
        'avatar',
        'about',
        'skills',
        'resume_file',
        'email',
        'linkedin_url',
        'github_url',
    ];

    protected $casts = [
        'skills' => 'array',
    ];

    /**
     * Obtém o perfil (singleton pattern - só deve existir 1 registro)
     */
    public static function get(): ?self
    {
        return static::first();
    }
}
