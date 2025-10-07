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
    
    # Создаем совместимую версию composer.json для PHP 7.4
    cat > composer.json << 'COMPOSER_EOF'
{
    "$schema": "https://getcomposer.org/schema.json",
    "name": "laravel/laravel",
    "type": "project",
    "description": "The skeleton application for the Laravel framework.",
    "keywords": ["laravel", "framework"],
    "license": "MIT",
    "require": {
        "php": "^7.4|^8.0",
        "laravel/framework": "^9.0",
        "laravel/tinker": "^2.7"
    },
    "require-dev": {
        "fakerphp/faker": "^1.9.1",
        "laravel/pint": "^1.0",
        "laravel/sail": "^1.0.1",
        "mockery/mockery": "^1.4.4",
        "nunomaduro/collision": "^6.0",
        "phpunit/phpunit": "^9.5.10"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/"
        }
    },
    "scripts": {
        "post-autoload-dump": [
            "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
            "@php artisan package:discover --ansi"
        ],
        "post-update-cmd": [
            "@php artisan vendor:publish --tag=laravel-assets --ansi --force"
        ],
        "post-root-package-install": [
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
        ],
        "post-create-project-cmd": [
            "@php artisan key:generate --ansi",
            "@php -r \"file_exists('database/database.sqlite') || touch('database/database.sqlite');\"",
            "@php artisan migrate --graceful --ansi"
        ],
        "pre-package-uninstall": [
            "Illuminate\\Foundation\\ComposerScripts::prePackageUninstall"
        ]
    },
    "extra": {
        "laravel": {
            "dont-discover": []
        }
    },
    "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true,
        "allow-plugins": {
            "pestphp/pest-plugin": true,
            "php-http/discovery": true
        }
    },
    "minimum-stability": "stable",
    "prefer-stable": true
}
COMPOSER_EOF
    
    echo "✅ Created PHP 7.4 compatible composer.json"
    
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
