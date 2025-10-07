#!/bin/bash

# Cloudways PHP 7.4 Compatibility Fix Script
# Используйте этот скрипт если на сервере PHP 7.4

echo "🔧 Fixing PHP 7.4 compatibility issues..."

# Проверяем версию PHP
PHP_VERSION=$(php -r "echo PHP_VERSION;")
echo "📋 Current PHP version: $PHP_VERSION"

if [[ "$PHP_VERSION" == 7.4* ]]; then
    echo "⚠️  PHP 7.4 detected. Using compatible version..."
    
    # Создаем резервную копию оригинального composer.json
    if [ -f "composer.json" ]; then
        cp composer.json composer-php82.json
        echo "✅ Backed up original composer.json"
    fi
    
    # Используем совместимую версию
    if [ -f "composer-php74.json" ]; then
        cp composer-php74.json composer.json
        echo "✅ Using PHP 7.4 compatible composer.json"
    else
        echo "❌ composer-php74.json not found!"
        exit 1
    fi
    
    # Удаляем старые зависимости
    echo "🧹 Removing old dependencies..."
    rm -rf vendor composer.lock
    
    # Устанавливаем совместимые зависимости
    echo "📦 Installing PHP 7.4 compatible dependencies..."
    composer install --no-dev --optimize-autoloader
    
    if [ $? -eq 0 ]; then
        echo "✅ Dependencies installed successfully"
    else
        echo "❌ Failed to install dependencies"
        exit 1
    fi
    
else
    echo "✅ PHP version is compatible (8.0+)"
    echo "📦 Installing dependencies..."
    composer install --no-dev --optimize-autoloader
fi

# Создаем .env файл если его нет
if [ ! -f ".env" ]; then
    echo "📝 Creating .env file..."
    cp .env.example .env
    echo "⚠️  Please configure your .env file with production settings"
fi

# Генерируем ключ приложения
echo "🔑 Generating application key..."
php artisan key:generate --force

# Устанавливаем права доступа
echo "🔐 Setting permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache

# Очищаем кэш
echo "🧹 Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Оптимизируем для продакшена
echo "⚡ Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ PHP compatibility fix completed!"
echo ""
echo "📋 Next steps:"
echo "1. Configure your .env file with production settings"
echo "2. Set up your database connection"
echo "3. Run 'php artisan migrate' if needed"
echo "4. Check your website at your domain"
echo "5. Monitor logs with 'tail -f storage/logs/laravel.log'"
echo ""
echo "🌐 Your Laravel application should now be running!"
