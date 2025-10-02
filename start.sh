#!/bin/bash

echo "🚀 Starting Laravel application..."

# Limpa cache de configuração
echo "📦 Clearing config cache..."
php artisan config:clear

# Roda as migrações
echo "🗄️  Running migrations..."
php artisan migrate --force

# Inicia o servidor
echo "✅ Starting web server..."
php artisan serve --host=0.0.0.0 --port=$PORT
