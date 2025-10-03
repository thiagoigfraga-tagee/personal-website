<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function() {

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
    // Admin/Editor Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', function () {
            $stats = [
                'total_posts' => Post::count(),
                'published_posts' => Post::whereNotNull('published_at')->count(),
                'draft_posts' => Post::whereNull('published_at')->count(),
                'total_tags' => \App\Models\Tag::count(),
            ];
            return view('admin.dashboard', compact('stats'));
        })->name('dashboard');
        
        // Posts CRUD
        Route::get('/posts', function () {
            return view('admin.posts.index');
        })->name('posts.index');
        
        Route::get('/posts/create', function () {
            return view('admin.posts.create');
        })->name('posts.create');
        
        Route::get('/posts/{post}/edit', function (\App\Models\Post $post) {
            return view('admin.posts.edit', ['post' => $post]);
        })->name('posts.edit');
        
        // Tags CRUD
        Route::get('/tags', function () {
            return view('admin.tags.index');
        })->name('tags.index');
    });
});

}); // Fim do grupo de localização

require __DIR__.'/auth.php';
