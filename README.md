# Stock Performers – Laravel Backend

This project is a **Laravel-based stock performance tracker**.  
It allows users to **log in, upload stock price data (CSV)**, and view a **chart of the top 5 best-performing stocks** based on price gain over time.

Built using:
- 🐘 **Laravel 12 (PHP 8.3)**
- 🐳 **Docker & Docker Compose**
- 🐘 **PostgreSQL 16**
- 📊 **Chart.js**

---

## Features

✅ User authentication (login & registration)  
✅ CSV upload for stock price data  
✅ PostgreSQL database for storing stocks and uploads  
✅ Chart visualization of top 5 performers  
✅ Fully containerized using Docker  

---

## Project Structure
```
backend/
├── app/ # Laravel application code
├── bootstrap/
├── config/
├── database/ # Migrations and seeders
├── public/
├── resources/ # Blade templates, CSS, JS
├── routes/ # Web routes (web.php)
├── storage/
├── Dockerfile
├── docker-compose.yml
├── composer.json
└── .env
```

---

##  Running the Project with Docker

### 1️⃣ Prerequisites

Make sure you have installed:
- [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/) *(optional, for local PHP commands)*

---

### 2️⃣ Clone the Repository

```bash
git clone https://github.com/<your-username>/stock-performers-backend.git
cd stock-performers-backend
```

### 3️⃣ Create a .env File

Create a .env file in the project root (if not already present):

```
APP_NAME="Stock Performers"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=stockdb
DB_USERNAME=postgres
DB_PASSWORD=postgres

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

### 4️⃣ Build and Start Docker Containers

Run the following command from the project root:

```
docker-compose up --build
```
This will:

Build the Laravel app image

Start the app container (laravel_app)

Start the PostgreSQL container (postgres_db)

### 5️⃣ Run Migrations and Generate App Key

After containers are running:
```
docker exec -it laravel_app php artisan key:generate
docker exec -it laravel_app php artisan migrate
```

This creates the necessary tables and generates the Laravel encryption key.

### 6️⃣ Access the Application

Once running, open:

👉 http://localhost:8000

You should see the Laravel login page or dashboard after authentication.

## How the Chart Works

When you upload a CSV, each record (stock name, price, and date) is stored in the PostgreSQL database.
Laravel then:

Groups the data by stock name

Calculates the percentage or price gain from the first to the last entry

Sorts the stocks by their gain

Sends the top 5 results to the Blade view

The Blade template uses Chart.js to render a beautiful bar graph from that data.
