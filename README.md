# Multi-Auth System with Laravel Breeze

A complete multi-authentication system built with Laravel Breeze featuring **5 different user types** with separate login/registration systems and dedicated dashboards.

---

## 🚀 Features

- **5 User Types:** User, Seller, Admin, Audit, Staff  
- **Separate Authentication:** Each user type has dedicated login/registration  
- **Custom Dashboards:** Tailored dashboard for each user role  
- **Middleware Protection:** Route protection for each user type  
- **Breeze Integration:** Built on Laravel Breeze authentication scaffolding  
- **Responsive Design:** Modern, mobile-friendly interface  

---

## 🧑‍💻 User Types & Access

| User Type | Login URL | Registration URL | Dashboard URL |
|------------|------------|------------------|----------------|
| User | `/login` | `/register` | `/dashboard` |
| Seller | `/seller/login` | `/seller/register` | `/seller/dashboard` |
| Admin | `/admin/login` | `/admin/register` | `/admin/dashboard` |
| Audit | `/audit/login` | `/audit/register` | `/audit/dashboard` |
| Staff | `/staff/login` | `/staff/register` | `/staff/dashboard` |

---

## ⚙️ Installation

### Prerequisites
- PHP 8.1 or higher  
- Composer  
- Node.js & NPM  
- MySQL Database  

---

### Step-by-Step Installation

#### 1️⃣ Create new Laravel project
```bash
composer create-project laravel/laravel multi-auth-system
cd multi-auth-system
```

#### 2️⃣ Install Laravel Breeze
```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run build
```

#### 3️⃣ Setup database in `.env` file
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=multi_auth_system
DB_USERNAME=root
DB_PASSWORD=
```

#### 4️⃣ Create models and migrations
```bash
php artisan make:model Seller -m
php artisan make:model Admin -m
php artisan make:model Audit -m
php artisan make:model Staff -m
```

#### 5️⃣ Run all migrations
```bash
php artisan migrate
```

---

## 🧩 Configuration

### Update `config/auth.php` with multi-guard setup

```php
'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
    'seller' => [
        'driver' => 'session',
        'provider' => 'sellers',
    ],
    'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
    ],
    'audit' => [
        'driver' => 'session',
        'provider' => 'audits',
    ],
    'staff' => [
        'driver' => 'session',
        'provider' => 'staff',
    ],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],
    'sellers' => [
        'driver' => 'eloquent',
        'model' => App\Models\Seller::class,
    ],
    'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\Admin::class,
    ],
    'audits' => [
        'driver' => 'eloquent',
        'model' => App\Models\Audit::class,
    ],
    'staff' => [
        'driver' => 'eloquent',
        'model' => App\Models\Staff::class,
    ],
],
```

---

## 🧱 Middleware Setup

Register custom middleware in `app/Http/Kernel.php`:

```php
protected $middlewareAliases = [
    // ... existing middleware
    'seller' => \App\Http\Middleware\SellerMiddleware::class,
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    'audit' => \App\Http\Middleware\AuditMiddleware::class,
    'staff' => \App\Http\Middleware\StaffMiddleware::class,
];
```

---

## 🛣️ Routes Setup

Update `routes/web.php` with multi-auth routes:

```php
// Seller routes
Route::prefix('seller')->name('seller.')->group(function () {
    Route::get('/login', [SellerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [SellerAuthController::class, 'login']);
    Route::get('/register', [SellerAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [SellerAuthController::class, 'register']);
    Route::post('/logout', [SellerAuthController::class, 'logout'])->name('logout');
    
    Route::middleware(['seller'])->group(function () {
        Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('dashboard');
    });
});

// Repeat similar structure for admin, audit, and staff routes
```

---

## 🧰 Running the Application

Run migrations:
```bash
php artisan migrate
```

Build frontend assets:
```bash
npm run build
```

Serve the application:
```bash
php artisan serve
```

### Access the application at:
- Main page → http://localhost:8000  
- Seller → http://localhost:8000/seller/login  
- Admin → http://localhost:8000/admin/login  
- Audit → http://localhost:8000/audit/login  
- Staff → http://localhost:8000/staff/login  

---

## 🧮 Features Overview

### 🛍️ Seller Dashboard
- Product management  
- Order tracking  
- Revenue analytics  
- Inventory management  

### 🧑‍💼 Admin Dashboard
- User management  
- Seller approvals  
- System analytics  
- Platform management  

### 🕵️ Audit Dashboard
- Compliance monitoring  
- Audit trails  
- System health checks  
- Report generation  

### 👨‍🔧 Staff Dashboard
- Task management  
- Performance tracking  
- Schedule management  
- Team collaboration  

---

## 🧾 Troubleshooting

If you encounter issues:

Clear application cache:
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

- Check middleware registration in `Kernel.php`  
- Verify database migrations ran successfully  
- Ensure all model files exist in `app/Models/` directory  

---

## 💬 Support

For issues and questions, please check the **GitHub repository Issues** section.

---
