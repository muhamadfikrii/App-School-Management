<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

---

# 🎓 App Samlosier
> **A Digital School Information System** built with **Laravel 12** & **Filament 4**

**App Samlosier** is a web-based **School Information Management System** designed to help schools manage their data efficiently.  
Developed with **Laravel 12** and **Filament 4**, this application features a modern admin panel, role-based authentication, and user-friendly dashboards.

---

## 🧩 Key Features

- 📚 **Student Management**
- 👨‍🏫 **Teacher Management**
- 🏫 **Class Management**
- 🗓️ **Lesson Schedule**
- 🧮 **Grades & Report Cards**
- 🔐 **Multi-Role Authentication (Admin & Teacher)**
- 🎨 **Modern Admin Dashboard (Filament v4)**

---

## 🧰 Tech Stack

| Technology | Version / Details |
|-------------|------------------|
| **Laravel** | 12.x |
| **Filament** | 4.x |
| **Livewire** | 3.x |
| **PHP** | 8.2+ |
| **Database** | MySQL / MariaDB |
| **Frontend** | Tailwind CSS + Blade |
| **Build Tools** | Vite & Composer |

---

## 🔐 Demo Accounts

| Role | Email | Password |
|------|----------------------|-----------|
| 🛠️ **Admin** | `admin@example.com` | `password` |
| 👨‍🏫 **Teacher** | `guru@smlsr.com` | `password` |

> Use the credentials above to explore the login system and dashboard for each role.

---

## ⚙️ How to Run the Project (via Terminal)

1. Clone the Repository
```bash
git clone https://github.com/muhamadfikrii/app-samlosier.git
cd app-samlosier
```

2. Install Dependencies
```bash
composer install
npm install
npm run build
```

3. Setup Environment File
```bash
cp .env.example .env
```

Then update your .env file with your local database credentials:
```env
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
```

4. Generate Application Key
```bash
php artisan key:generate
```

5. Run Migrations & Seeders
```bash
php artisan migrate --seed
This will automatically create all necessary tables and seed demo accounts.
```

6. Start the Development Server
```bash
php artisan serve
```

🪪 License
This project is open-sourced software licensed under the MIT license

<p align="center"> Made with ❤️ using <a href="https://laravel.com">Laravel</a> & <a href="https://filamentphp.com">Filament</a> </p>