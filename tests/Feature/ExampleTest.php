<?php

use App\Models\Post;
use App\Models\Tag;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('home page loads successfully', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertSee('Thiago');
});

test('blog index loads successfully', function () {
    $response = $this->get('/blog');
    $response->assertStatus(200);
});

test('contact page loads successfully', function () {
    $response = $this->get('/contato');
    $response->assertStatus(200);
    $response->assertSee('Contato');
});

test('published posts are visible', function () {
    $post = Post::factory()->create([
        'title' => 'Test Post',
        'published_at' => now(),
    ]);
    
    $response = $this->get('/blog');
    $response->assertStatus(200);
    $response->assertSee('Test Post');
});

test('draft posts are not visible on blog', function () {
    $post = Post::factory()->create([
        'title' => 'Draft Post',
        'published_at' => null,
    ]);
    
    $response = $this->get('/blog');
    $response->assertStatus(200);
    $response->assertDontSee('Draft Post');
});
