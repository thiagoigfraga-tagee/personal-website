#!/bin/bash

echo "🚀 Starting Laravel application..."

# Limpa cache de configuração
echo "📦 Clearing config cache..."
php artisan config:clear

# Roda as migrações
echo "🗄️  Running migrations..."
php artisan migrate --force

# Roda o seeder do admin (se as variáveis estiverem definidas)
echo "👤 Running admin seeder..."
php artisan db:seed --class=AdminUserSeeder --force

# Inicia o servidor
echo "✅ Starting web server..."
php artisan serve --host=0.0.0.0 --port=$PORT
