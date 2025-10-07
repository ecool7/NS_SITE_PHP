# Navigation Systems Website

<p align="center">
<img src="public/img/logo.png" width="200" alt="Navigation Systems Logo">
</p>

<p align="center">
<a href="https://github.com/ecool7/NS_SITE_PHP"><img src="https://img.shields.io/badge/GitHub-Repository-blue" alt="GitHub Repository"></a>
<a href="https://laravel.com"><img src="https://img.shields.io/badge/Laravel-Framework-red" alt="Laravel Framework"></a>
<a href="https://php.net"><img src="https://img.shields.io/badge/PHP-8.3+-purple" alt="PHP Version"></a>
</p>

## About Navigation Systems

Navigation Systems is a comprehensive website showcasing navigation and sensor products including accelerometers, gyroscopes, and IMU sensors. Built with Laravel framework, it features a modern responsive design and detailed product information.

## Features

- **Product Catalog**: Comprehensive display of accelerometers, gyroscopes, and IMU sensors
- **News Section**: Latest updates and company news
- **Responsive Design**: Mobile-friendly interface
- **Product Details**: Detailed specifications and datasheets for each product
- **Modern UI**: Clean and professional design
- **Laravel Framework**: Built with Laravel 11.x for reliability and performance

## Technology Stack

- **Backend**: Laravel 11.x (PHP 8.3+)
- **Frontend**: HTML5, CSS3, JavaScript
- **Database**: MySQL/SQLite
- **Styling**: Custom CSS with responsive design
- **Server**: Apache/Nginx compatible

## Quick Start

### Local Development

1. **Clone the repository**:
   ```bash
   git clone https://github.com/ecool7/NS_SITE_PHP.git
   cd NS_SITE_PHP
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Environment setup**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run the development server**:
   ```bash
   php artisan serve
   ```

5. **Access the application**:
   Open [http://localhost:8000](http://localhost:8000) in your browser

### Production Deployment

#### Cloudways Deployment

For detailed Cloudways deployment instructions, see:
- [CLOUDWAYS_DEPLOYMENT.md](CLOUDWAYS_DEPLOYMENT.md)
- [CLOUDWAYS_REQUIREMENTS.md](CLOUDWAYS_REQUIREMENTS.md)

**Quick Cloudways Setup**:
1. Upload files to your Cloudways server
2. Run the deployment script: `./deploy-cloudways.sh`
3. Configure your `.env` file with production settings
4. Set up SSL certificate
5. Configure domain DNS

## Project Structure

```
NS_SITE_PHP/
├── app/
│   ├── Data/              # Data classes for products and news
│   ├── Http/Controllers/  # Application controllers
│   └── Models/            # Eloquent models
├── public/
│   ├── css/               # Stylesheets
│   ├── img/               # Images and assets
│   └── index.php          # Entry point
├── resources/
│   └── views/             # Blade templates
│       ├── ACCEL/         # Accelerometer pages
│       ├── GYROS/         # Gyroscope pages
│       ├── IMU/           # IMU pages
│       └── *.blade.php    # Main pages
└── routes/
    └── web.php            # Web routes
```

## Product Categories

### Accelerometers
- High-precision accelerometer sensors
- Detailed specifications and datasheets
- Multiple product variants

### Gyroscopes
- Professional gyroscope sensors
- Comprehensive technical details
- Industry-standard performance

### IMU Sensors
- Inertial Measurement Units
- Complete sensor fusion solutions
- Advanced navigation systems

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support and questions:
- GitHub Issues: [Create an issue](https://github.com/ecool7/NS_SITE_PHP/issues)
- Documentation: See deployment guides in the repository
