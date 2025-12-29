# Humanifood - Laravel Migration

This is the Laravel version of the Humanifood project, migrated from a legacy PHP application.

## Project Structure

```
humanifood-laravel/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── LegacyController.php      # Legacy PHP router
│   └── LegacyEndpoints/                 # Legacy endpoint files
├── legacy_source/                        # Original PHP application
│   ├── _function.php                    # Database & utility functions
│   ├── auth.php                         # Authentication logic
│   ├── endpoint/                        # API endpoints
│   ├── includes/                        # Shared includes
│   ├── page/                            # Page templates
│   └── page_admin/                      # Admin panel
├── public/
│   ├── assets/                          # CSS, JS, fonts
│   ├── image/                           # Product images, gallery, etc.
│   └── js/                              # JavaScript files & CKEditor
├── resources/
│   ├── legacy_includes/                 # Legacy included files
│   └── legacy_pages/                    # Legacy page templates
├── routes/
│   └── web.php                          # Route definitions
└── storage/                             # Logs, cache, sessions
```

## Installation & Setup

### Prerequisites
- PHP 8.1+ with `mysqli` extension
- MySQL 5.7 or later
- Composer
- Node.js (optional, for asset compilation)

### 1. Clone the Repository
```bash
git clone https://github.com/farosfadillah/humanifood-laravel.git
cd humanifood-laravel
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Environment Configuration
Copy the example environment file and update it with your database credentials:

```bash
cp .env.example .env
```

Edit `.env` and set these values:
```env
APP_NAME=Humanifood
APP_URL=http://localhost/humanifood-laravel

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=humanifood_laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Database Setup
Import the database schema:
```bash
mysql -u root -p humanifood_laravel < humanifood.sql
```

Or if you're using XAMPP (MySQL without password):
```bash
C:\xampp\mysql\bin\mysql.exe -u root humanifood_laravel < humanifood.sql
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Serve the Application

**Using PHP's built-in server:**
```bash
php artisan serve
```
Access: http://localhost:8000

**Using XAMPP:**
Place the project in `C:\xampp\htdocs\humanifood-laravel\` and access via:
http://localhost/humanifood-laravel/public

## Features

### Current Implementation
- **Legacy PHP Compatibility Layer**: All existing PHP pages run under Laravel via `LegacyController`
- **Database**: MySQL database `humanifood_laravel` with all original tables
- **Assets**: All images, CSS, JavaScript, and CKEditor files are in `public/`
- **Endpoints**: Original endpoint files preserved in `app/LegacyEndpoints/` and `legacy_source/endpoint/`

### Database Connection
The legacy code reads database credentials from `.env`:
- DB_HOST (default: 127.0.0.1)
- DB_USERNAME (default: root)
- DB_PASSWORD (default: empty)
- DB_DATABASE (default: humanifood_laravel)

### Routes
All requests are routed through the catch-all route in `routes/web.php` which maps to `LegacyController::serve()`:
- `/` → `legacy_source/index.php`
- `/about` → `legacy_source/page/about.php`
- `/contact` → `legacy_source/page/contact.php`
- `/gallery` → `legacy_source/page/gallery.php`
- `/portfolio` → `legacy_source/page/portfolio.php`
- `/masuk` → `legacy_source/page/auth/login.php`
- `/daftar` → `legacy_source/page/auth/regist.php`

### Authentication
Uses the legacy authentication system from `_function.php` and `endpoint/auth.php`. Session data is stored in `$_SESSION['_userid']`.

### File Uploads
All file upload handling is preserved from the original application. Uploaded files are saved to the legacy structure.

## Migration Path

The current setup allows you to:
1. **Keep the app running** while migrating piece by piece
2. **Gradually convert** legacy PHP pages to Laravel Blade templates and controllers
3. **Migrate database queries** from mysqli to Eloquent/Laravel Query Builder
4. **Refactor endpoints** into proper Laravel API routes and controllers

### Example: Migrating a Page
When you're ready to modernize a page (e.g., `gallery.php`):
1. Create a new Blade template: `resources/views/gallery.blade.php`
2. Create a controller: `app/Http/Controllers/GalleryController.php`
3. Add a route in `routes/web.php`
4. Copy the database queries and convert them to Eloquent

## Troubleshooting

### Database Connection Error
- Verify MySQL is running (`C:\xampp\control_panel.exe`)
- Check DB credentials in `.env`
- Ensure database `humanifood_laravel` exists

### 404 Errors on Pages
- Verify the legacy file exists in `legacy_source/`
- Check file permissions
- Review logs in `storage/logs/laravel.log`

### Asset Not Loading (CSS, JS, Images)
- Ensure files exist in `public/assets/`, `public/image/`, `public/js/`
- Update `APP_URL` in `.env` if using a different base path

### Session/Login Issues
- Ensure `storage/framework/sessions/` directory is writable
- Check that `_SESSION` variables are being set correctly
- Verify cookies are enabled in your browser

## Support

For issues with the legacy code, refer to the original PHP files in `legacy_source/`.
For Laravel-specific questions, visit: https://laravel.com/docs

---

**Last Updated**: December 29, 2025
**Laravel Version**: 12.x
**PHP Version**: 8.1+

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
