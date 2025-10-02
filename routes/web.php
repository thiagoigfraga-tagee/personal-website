<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Models\Post;

Route::get('/', function () {
    $featuredPosts = Post::published()->featured()->take(3)->get();
    
    return view('home', [
        'featuredPosts' => $featuredPosts,
    ]);
})->name('home');

// Contact Route
Route::get('/contato', function () {
    return view('contact');
})->name('contact');

// Blog Routes
Route::get('/blog', function () {
    $posts = Post::published()
        ->with('tags')
        ->paginate(10);
    
    return view('blog.index', compact('posts'));
})->name('blog.index');

Route::get('/blog/{slug}', function ($slug) {
    $post = Post::where('slug', $slug)
        ->with('tags')
        ->firstOrFail();
    
    // Verifica se o post está publicado (exceto para usuários autenticados)
    if (!$post->isPublished() && !Auth::check()) {
        abort(404);
    }
    
    return view('blog.show', compact('post'));
})->name('blog.show');

Route::get('/blog/tag/{slug}', function ($slug) {
    $tag = \App\Models\Tag::where('slug', $slug)->firstOrFail();
    $posts = $tag->posts()
        ->published()
        ->with('tags')
        ->paginate(10);
    
    return view('blog.index', compact('posts', 'tag'));
})->name('blog.tag');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';
