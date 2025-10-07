# Cloudways Deployment Guide for NS_SITE_PHP

## Подготовка проекта для Cloudways

### 1. Настройка окружения

Создайте файл `.env` на сервере Cloudways со следующими настройками:

```env
APP_NAME="Navigation Systems"
APP_ENV=production
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
APP_DEBUG=false
APP_URL=https://your-domain.com

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
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

### 2. Команды для развертывания на Cloudways

```bash
# 1. Загрузите файлы проекта на сервер Cloudways
# Используйте SFTP/SSH для загрузки всех файлов в папку public_html

# 2. Установите зависимости
composer install --no-dev --optimize-autoloader

# 3. Сгенерируйте ключ приложения
php artisan key:generate

# 4. Очистите кэш
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# 5. Оптимизируйте для продакшена
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 6. Установите правильные права доступа
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
```

### 3. Настройка веб-сервера

#### Apache (.htaccess)
Убедитесь, что файл `public/.htaccess` содержит:

```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

#### Nginx
Если используете Nginx, добавьте в конфигурацию:

```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~ \.php$ {
    fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
    fastcgi_index index.php;
    fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
    include fastcgi_params;
}
```

### 4. Настройка базы данных

1. Создайте базу данных MySQL в панели Cloudways
2. Обновите настройки в `.env` файле
3. Запустите миграции (если нужно):

```bash
php artisan migrate
```

### 5. Настройка SSL

В панели Cloudways включите SSL сертификат для вашего домена.

### 6. Проверка развертывания

После развертывания проверьте:

1. ✅ Главная страница загружается: `https://your-domain.com`
2. ✅ Продукты отображаются: `https://your-domain.com/products`
3. ✅ Новости работают: `https://your-domain.com/news`
4. ✅ Детальные страницы продуктов работают
5. ✅ CSS и изображения загружаются корректно

### 7. Мониторинг и логи

```bash
# Просмотр логов
tail -f storage/logs/laravel.log

# Проверка статуса приложения
php artisan about
```

### 8. Оптимизация производительности

```bash
# Очистка и кэширование
php artisan optimize

# Оптимизация автозагрузки
composer dump-autoload --optimize
```

## Структура файлов для загрузки

Убедитесь, что загрузили все необходимые файлы:

```
public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── .htaccess
├── artisan
├── composer.json
└── composer.lock
```

## Важные замечания

1. **Безопасность**: Убедитесь, что `APP_DEBUG=false` в продакшене
2. **Права доступа**: Папки `storage` и `bootstrap/cache` должны быть доступны для записи
3. **База данных**: Используйте MySQL вместо SQLite для продакшена
4. **Кэширование**: Включите кэширование конфигурации и маршрутов
5. **SSL**: Обязательно используйте HTTPS в продакшене

## Поддержка

При возникновении проблем проверьте:
- Логи Laravel: `storage/logs/laravel.log`
- Логи веб-сервера в панели Cloudways
- Права доступа к файлам и папкам
- Настройки базы данных
