# Cloudways Deployment Guide for PHP 7.4 Compatibility

## Проблема с версией PHP

Ваш сервер Cloudways использует **PHP 7.4.33**, а проект требует **PHP 8.2+**.

## Решение 1: Обновить PHP (Рекомендуется)

### В панели Cloudways:
1. Зайдите в ваш сервер
2. Перейдите в "Server Management" → "PHP Settings"
3. Измените версию PHP на **8.3** или **8.2**
4. Примените изменения
5. Перезапустите сервер

### После обновления PHP:
```bash
# Удалите старые зависимости
rm -rf vendor composer.lock

# Установите новые зависимости
composer install --no-dev --optimize-autoloader

# Запустите развертывание
./deploy-cloudways.sh
```

## Решение 2: Использовать совместимую версию (PHP 7.4)

Если обновление PHP невозможно, используйте совместимую версию:

### 1. Замените composer.json
```bash
# На сервере выполните:
mv composer.json composer-php82.json
mv composer-php74.json composer.json
```

### 2. Установите совместимые зависимости
```bash
# Удалите старые зависимости
rm -rf vendor composer.lock

# Установите совместимые зависимости
composer install --no-dev --optimize-autoloader
```

### 3. Создайте файл .env
```bash
cp .env.example .env
```

### 4. Настройте .env для продакшена
```env
APP_NAME="Navigation Systems"
APP_ENV=production
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
APP_DEBUG=false
APP_URL=https://your-domain.com

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_cloudways_database
DB_USERNAME=your_cloudways_db_user
DB_PASSWORD=your_cloudways_db_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=your_smtp_host
MAIL_PORT=587
MAIL_USERNAME=your_email
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@your-domain.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### 5. Генерируйте ключ и настройте права
```bash
# Генерируйте ключ приложения
php artisan key:generate

# Установите права доступа
chmod -R 755 storage
chmod -R 755 bootstrap/cache

# Очистите кэш
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Оптимизируйте для продакшена
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Проверка развертывания

### Проверьте версию PHP:
```bash
php -v
# Должно показать PHP 7.4.x или выше
```

### Проверьте Laravel:
```bash
php artisan --version
# Должно показать Laravel 9.x
```

### Проверьте сайт:
- Откройте ваш домен в браузере
- Проверьте все страницы
- Убедитесь, что CSS и изображения загружаются

## Возможные проблемы

### 1. Ошибки прав доступа
```bash
# Исправьте права доступа
sudo chown -R www-data:www-data storage
sudo chown -R www-data:www-data bootstrap/cache
```

### 2. Проблемы с базой данных
```bash
# Проверьте подключение к БД
php artisan tinker
# В tinker выполните:
DB::connection()->getPdo();
```

### 3. Ошибки маршрутизации
```bash
# Очистите кэш маршрутов
php artisan route:clear
php artisan route:cache
```

## Мониторинг

### Просмотр логов:
```bash
tail -f storage/logs/laravel.log
```

### Проверка статуса:
```bash
php artisan about
```

## Рекомендации

1. **Обновите PHP до 8.3** для лучшей производительности
2. **Используйте SSL** для безопасности
3. **Настройте регулярные бэкапы** базы данных
4. **Мониторьте производительность** через панель Cloudways

## Поддержка

При возникновении проблем:
1. Проверьте логи Laravel
2. Проверьте логи веб-сервера в панели Cloudways
3. Убедитесь в правильности настроек .env
4. Проверьте права доступа к файлам
