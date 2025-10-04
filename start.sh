#!/bin/bash

echo "🚀 Starting Laravel application..."

# Limpa cache de configuração e rotas
echo "📦 Clearing config and route cache..."
php artisan config:clear
php artisan route:clear

# Roda as migrações
echo "🗄️  Running migrations..."
php artisan migrate --force

# Limpa e recria cache de views (força reload do Tailwind)
echo "🎨 Rebuilding view cache..."
php artisan view:clear
php artisan view:cache

# Inicia o servidor
echo "✅ Starting web server..."
php artisan serve --host=0.0.0.0 --port=$PORT
