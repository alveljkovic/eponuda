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

- **PHP** 8.2
- **Backend:** Laravel 12 with Sail  
- **Frontend:** Vue.js 3, Vuetify, TailwindCSS  
- **SPA Handling:** Inertia.js  
- **Web Crawler:** Playwright  
- **Database:** MySQL (via Sail) 

---

## 📦 Installation & Setup

Follow these steps to set up the project locally:

### 1. **Clone the repository:**
   ```bash
   git clone <repository_url>
   cd <project_folder>
   ```

### 1. **Build docker containers**
   ```bash
   docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/opt" \
    -w /opt \
    laravelsail/php[XX]-composer:latest \
    composer install --ignore-platform-reqs
   ```
   - IMPORTANT: change XX with PHP local version

### 2. Start Laravel Sail
- `./vendor/bin/sail up -d`

### 3. Install dependencies
```bash
./vendor/bin/sail composer install
```

### 4. Install NPM packages
```bash
./vendor/bin/sail npm install
```

### 5. Install Playwright package
```bash
./vendor/bin/sail npx playwright install
```

### 6. Generate App key
```bash
./vendor/bin/sail php artisan key:generate
```

### 7. Run migrations
```bash
./vendor/bin/sail php artisan migrate
```

### 8. Run seeder
```bash
./vendor/bin/sail php artisan db:seed
```
Seeder will seed the DB with:
- 3 categories

### 9. Build assets
```bash
./vendor/bin/sail npm run build
```

### 10. Set ENVs
- Make sure to set `QUEUE_CONNECTION=database`

### 11. Start queue worker
```bash
./vendor/bin/sail artisan queue:work
```

### 12. Run the crawler:
- Run init crawler (it will fetch and store all products from page: `https://www.shoptok.si/televizorji/cene/206`)
```bash
./vendor/bin/sail artisan crawl:products --init
```

- Run full crawler (it will fetch and store all products form pages: `https://www.shoptok.si/tv-sprejemniki/cene/56`)
```bash
./vendor/bin/sail artisan crawl:products
```

### 13. Have fun

---

## 🧪 Tests 

Currently, there are no tests implemented. Tests should be added at a later stage.
