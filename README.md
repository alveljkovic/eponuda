# 📁 Web shop crawler — Project Overview

This project is a **Web Shop Crawler** built with Laravel and Vue.js. 

---

## 👤 Contact Information

| Detail | Value |
|--------|--------|
| **Name** | Aleksandar Veljković |
| **Email** | aleksandar.veljkovic@gmail.com |

---

## 📝 2. Project Overview
 
It is designed to scrape products from an external shop, store them in the local database, and display them on a custom frontend. The application provides structured product information, including images, prices, and categories. Additionally, it offers a responsive and interactive user interface using Vuetify and TailwindCSS, with SPA-like navigation powered by Inertia.js.

The crawler uses Playwright to automate browser interactions and parse dynamic content. Product data is normalized and stored in the database using Laravel’s Eloquent ORM with chunked upserts to handle large datasets efficiently.

Whole process is done in background by dispatching the jobs.

---

## ⚙️ 3. Features

- **Web Crawler:** Fetchin products from external shops.  
- **DOM Parser:** Parse product details including name, price, images, and categories.  
- **Database Storage:** Efficiently store and update products using Laravel upsert.  
- **Frontend Display:** Display products with paginated lists, categories, and breadcrumbs.  
- **Responsive Design:** Built with Vuetify and TailwindCSS.  
- **SPA-like Navigation:** Powered by Vue.js and Inertia.js for smooth client-side transitions.

---

## 🛠️ Technical Stack

- **PHP 8.3** — Modern, high-performance runtime  
- **Laravel 12** — Robust application framework with built-in support for queues, jobs, events, and file storage  
- **Composer v2** — Dependency management with optimized autoloading
- **Laravel Sail** — Associate users with roles and permissions `spatie/laravel-permission`
- **Laravel's authentication starter kit** - `laravel/breeze`
- **Admin LTE** - Easy AdminLTE integration with Laravel `jeroennoten/laravel-adminlte`
- **Excel/CSV lib** - Supercharged Excel exports and imports in Laravel `maatwebsite/excel`

- **PHP** 8.3
- **Backend:** Laravel 12 with Sail  
- **Frontend:** Vue.js 3, Vuetify, TailwindCSS  
- **SPA Handling:** Inertia.js  
- **Web Crawler:** Playwright  
- **Database:** MySQL / MariaDB (via Sail) 

---

## 📦 Installation & Setup

Follow these steps to set up the project locally:

### 1. **Clone the repository:**
   ```bash
   git clone <repository_url>
   cd <project_folder>
   ```

### 2. Start Laravel Sail
- `./vendor/bin/sail up -d`

### 3. Install dependencies
```bash
./vendor/bin/sail composer install
```

### 4. Install NPM
```bash
./vendor/bin/sail npm install
```

### 5. Generate App key
```bash
./vendor/bin/sail php artisan key:generate
```

### 6. Run migrations
```bash
./vendor/bin/sail php artisan migrate
```

### 7. Run seeder
```bash
./vendor/bin/sail php artisan db:seed
```
Seeder will seed the DB with:
- 3 categories

### 8. Build assets
```bash
./vendor/bin/sail npm run build
```

### 9. Set ENVs
- Make sure to set `QUEUE_CONNECTION=database`

### 10. Start queue worker
```bash
./vendor/bin/sail artisan queue:work
```

### 11. Run the crawler:
- Run init crawler (it will fetch and store all products from page: `https://www.shoptok.si/televizorji/cene/206`)
```bash
./vendor/bin/sail artisan crawl:products --init
```

- Run full crawler (it will fetch and store all products form pages: `https://www.shoptok.si/tv-sprejemniki/cene/56`)
```bash
./vendor/bin/sail artisan crawl:products
```

### 12. Have fun

---

## 🧪 Tests 

Currently, there are no tests implemented. Tests should be added at a later stage.
