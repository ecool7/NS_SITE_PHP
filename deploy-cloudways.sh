#!/bin/bash

# Cloudways Deployment Script for NS_SITE_PHP
# Запустите этот скрипт на сервере Cloudways после загрузки файлов

echo "🚀 Starting Cloudways deployment for NS_SITE_PHP..."

# Проверяем, что мы в правильной директории
if [ ! -f "artisan" ]; then
    echo "❌ Error: artisan file not found. Make sure you're in the Laravel project root directory."
    exit 1
fi

echo "✅ Laravel project detected"

# Устанавливаем зависимости
echo "📦 Installing dependencies..."
composer install --no-dev --optimize-autoloader

# Генерируем ключ приложения (если его нет)
if [ ! -f ".env" ]; then
    echo "⚠️  Warning: .env file not found. Please create it manually."
else
    echo "🔑 Generating application key..."
    php artisan key:generate --force
fi

# Очищаем кэш
echo "🧹 Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Устанавливаем права доступа
echo "🔐 Setting permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache

# Оптимизируем для продакшена
echo "⚡ Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Оптимизируем автозагрузку
echo "🔄 Optimizing autoloader..."
composer dump-autoload --optimize

echo "✅ Deployment completed successfully!"
echo ""
echo "📋 Next steps:"
echo "1. Verify your .env file has correct database settings"
echo "2. Run 'php artisan migrate' if you need database tables"
echo "3. Check your website at your domain"
echo "4. Monitor logs with 'tail -f storage/logs/laravel.log'"
echo ""
echo "🌐 Your Laravel application should now be running!"
