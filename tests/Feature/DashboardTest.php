<?php

use App\Models\User;
use App\Models\Post;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('guests cannot access admin dashboard', function () {
    $response = $this->get(route('admin.dashboard'));
    $response->assertRedirect(route('login'));
});

test('authenticated users can access admin dashboard', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('admin.dashboard'));
    $response->assertStatus(200);
    $response->assertSee('Dashboard');
});

test('admin can access posts page', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('admin.posts.index'));
    $response->assertStatus(200);
});

test('admin can access tags page', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('admin.tags.index'));
    $response->assertStatus(200);
});