# IT0049 Technical Formative Assessment 3

This CodeIgniter 4 POS application continues TFA2 with customer and user create/edit forms, server-side validation, and user avatars. It is a learning project and does not include authentication.

## Requirements

- PHP 8.2 or newer with `intl`, `mbstring`, and `mysqli` enabled
- Composer 2
- MySQL or MariaDB

## Local setup

1. Run `composer install` in the project root if needed.
2. Start MySQL and import `database/pos_tfa3.sql` into an empty server. With XAMPP on Windows:

   ```powershell
   & 'C:\xampp\mysql\bin\mysql.exe' --user=root --execute="source database/pos_tfa3.sql"
   ```

   The script creates the `pos_tfa3` database, the `customers` and `users` tables, and sample rows. Do not re-import it over existing tables.
3. Copy `.env.example` to `.env` if `.env` does not exist. Set `app.baseURL` and the real `database.default.*` values. The example uses `http://localhost:8080/`, database `pos_tfa3`, MySQLi, and port `3306`.
4. Run `php spark serve` and open `http://localhost:8080/`.

The document root for another web server must be `public/`. Uploaded avatars are stored in `public/uploads`; the folder is included in the project with an `index.html` placeholder.

## Routes and testing

- `/`, `/about`, `/customers`, and `/users` preserve the TFA2 pages.
- `/customers/new` creates a customer; `/customers/{id}/edit` edits one.
- `/users/new` creates a user; `/users/{id}/edit` edits one.

Customer full name and email are required, and email must be valid. User username and full name are required, and usernames must be unique. Avatars accept JPG or PNG files up to 2 MB; files receive a random safe filename and only that filename is stored in the database. Users without an avatar show a placeholder.

Run the safe checks from the project root:

```powershell
php spark routes
php -l app\Controllers\Customers.php
php -l app\Controllers\Users.php
vendor\bin\phpunit
```

For browser testing, open each new route, submit blank and invalid values to confirm validation, create/edit valid records, test duplicate usernames, and upload valid and invalid avatar files. Do not use destructive database commands.

## Database files

`database/pos_tfa3.sql` is the setup script. `database/pos_tfa3_export.sql` is the matching schema/data export, including the nullable `users.avatar` column. To generate a fresh export from a populated database:

```powershell
& 'C:\xampp\mysql\bin\mysqldump.exe' --user=root --databases pos_tfa3 --skip-add-drop-table --result-file=database/pos_tfa3_export.sql
```
