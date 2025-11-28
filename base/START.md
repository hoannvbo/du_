Getting started (quick) — base/ (Windows + Laragon or PHP built-in server)

Prerequisites
- PHP (>= 8.x), Composer
- A web server (Laragon/Apache) or use PHP built-in server
- MySQL / MariaDB database server

Steps to run locally

1) Install PHP dependencies (only required first time):

   cd base
   composer install

2) Configure database and base URL

   Edit `env.php` and set the database constants and `BASE_URL` to your local URL.

   Example (env.php):

   const DBNAME = "du_an1";
   const DBUSER = "root";
   const DBPASS = "";
   const DBHOST = "127.0.0.1";
   const BASE_URL = "http://localhost/du_an1/base/";

   Create the database named `du_an1` and import any schema you have (this repo does not include SQL schema files).

3) Ensure folders are writeable

   The app writes compiled Blade templates and uploaded files under `storage/` and `public/uploads/` — make sure they exist and are writable.

4) Run the app (two options)

   A) Using Laragon/Apache
      - Point a virtual host / document root to the `base/` directory or use Laragon's AutoServe.
      - Visit the `BASE_URL` configured in `env.php`.

   B) Quick test with PHP built-in server (dev only)
      - A small router is included: `server.php` in the project root. Use:

        cd base
        php -S localhost:8000 server.php

      - Open http://localhost:8000/ or visit pretty paths like http://localhost:8000/list-tourimg (the router sets the required GET param).

Notes
- The repo contains code that expects a database with certain tables (tours, departures, tour_images, tour_logs, etc.). Create the database schema before testing CRUD actions.
- You may want to protect admin routes using the project's auth filter (see `commons/route.php`).

If you'd like, I can:
- Add sample SQL schema to the repo so you can quickly create and seed the database, or
- Add a script to create example data for testing.
