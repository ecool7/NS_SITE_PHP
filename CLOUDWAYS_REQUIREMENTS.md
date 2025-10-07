# Cloudways Requirements for NS_SITE_PHP

## Системные требования

### PHP
- **Версия**: PHP 8.1 или выше (рекомендуется PHP 8.3)
- **Расширения**:
  - BCMath
  - Ctype
  - cURL
  - DOM
  - Fileinfo
  - JSON
  - Mbstring
  - OpenSSL
  - PCRE
  - PDO
  - Tokenizer
  - XML
  - MySQL/PDO MySQL

### Веб-сервер
- **Apache** с mod_rewrite (рекомендуется)
- **Nginx** (альтернатива)

### База данных
- **MySQL 5.7+** или **MySQL 8.0+**
- **MariaDB 10.3+**

### Дополнительные требования
- **Composer** для управления зависимостями
- **SSL сертификат** (Let's Encrypt или Cloudways SSL)
- **Минимум 1GB RAM** (рекомендуется 2GB+)
- **Минимум 25GB дискового пространства**

## Настройки PHP в Cloudways

### Рекомендуемые настройки php.ini:
```ini
memory_limit = 256M
max_execution_time = 300
max_input_vars = 3000
post_max_size = 64M
upload_max_filesize = 64M
max_file_uploads = 20
```

### Включенные расширения:
- opcache (для кэширования)
- redis (опционально, для кэша)
- imagick (для обработки изображений)

## Настройки веб-сервера

### Apache
- mod_rewrite включен
- .htaccess поддержка
- Gzip сжатие включено

### Nginx
- FastCGI для PHP
- Gzip сжатие включено
- Правила перезаписи URL

## Безопасность

### Обязательные настройки:
- **APP_DEBUG=false** в .env
- **APP_ENV=production** в .env
- **HTTPS** обязательно
- **Firewall** настроен
- **Регулярные бэкапы** базы данных

### Рекомендуемые настройки:
- **WAF** (Web Application Firewall)
- **DDoS защита**
- **Мониторинг** производительности
- **Логирование** ошибок

## Производительность

### Кэширование:
- **OPcache** для PHP
- **Laravel кэш** (config, route, view)
- **CDN** для статических файлов
- **Redis** для сессий (опционально)

### Оптимизация:
- **Gzip сжатие**
- **Минификация** CSS/JS
- **Оптимизация изображений**
- **Lazy loading** для изображений

## Мониторинг

### Логи:
- Laravel логи: `storage/logs/laravel.log`
- Веб-сервер логи через панель Cloudways
- PHP error logs

### Метрики:
- Использование CPU
- Использование RAM
- Использование диска
- Трафик сети
- Время отклика

## Поддержка

### Полезные команды:
```bash
# Проверка статуса
php artisan about

# Очистка кэша
php artisan optimize:clear

# Оптимизация
php artisan optimize

# Проверка конфигурации
php artisan config:show
```

### Контакты:
- Cloudways Support: через панель управления
- Laravel документация: https://laravel.com/docs
- GitHub репозиторий: https://github.com/ecool7/NS_SITE_PHP
