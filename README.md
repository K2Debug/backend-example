# Arsenal fan page

A small, static Laravel page about Arsenal Football Club. It uses Blade and plain CSS; there is no database, frontend build step, or additional frontend package.

## Run locally

1. Install PHP 8.3 or newer and Composer.
2. Install the project dependencies:

   ```sh
   composer install
   ```

3. Create your local environment file and app key:

   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

4. Start Laravel:

   ```sh
   php artisan serve
   ```

   Open `http://127.0.0.1:8000`.

## Deploy on Plesk

1. Set the domain's PHP version to **8.3 or newer**.
2. Upload the complete Laravel project, including `vendor/` if Composer is unavailable on the server. Keep `.env` private.
3. In Plesk, set the domain's **Document root** to the project's `public` directory (for example, `httpdocs/public`). Do not expose the project root as the web root.
4. In the project root, create `.env` from `.env.example` and set:
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `APP_URL` to your site's HTTPS URL
   - `APP_KEY` to a generated key (`php artisan key:generate`); keep the same key on later deployments.
5. If Composer is available, install production dependencies from the project root:

   ```sh
   composer install --no-dev --optimize-autoloader
   ```

6. Ensure `storage/` and `bootstrap/cache/` are writable by the PHP process.

This page does not need a database or Node.js. The server must have the PHP extensions required by Laravel.

## Troubleshooting

- **500 error:** Check `storage/logs/laravel.log`, `.env` values, PHP version, and directory permissions.
- **404 or Laravel welcome page:** Confirm Plesk's document root points to this project's `public` directory.
- **Changes do not appear:** Clear cached Laravel configuration and views from the project root with `php artisan optimize:clear`.
