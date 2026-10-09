# IT0049 Technical Formative Assessment 2

## From Arrays to a Real Database

This continues the four-page CodeIgniter 4 project from TFA1. The Customer Accounts and User Accounts pages now read fictional records from MySQL through CodeIgniter Models. It is a read-only learning activity, not a complete POS system.

## Requirements

- PHP 8.2 or newer with `intl`, `mbstring`, and `mysqli` enabled
- Composer 2
- MySQL or MariaDB (XAMPP's MySQL service works locally)

## Local setup

1. Run `composer install` in the project root to install the framework dependencies, if needed.
2. Start MySQL. Import `database/pos_tfa2.sql` into an empty server. For XAMPP on Windows, from the project root run:

   ```powershell
   & 'C:\xampp\mysql\bin\mysql.exe' --user=root --execute="source database/pos_tfa2.sql"
   ```

   Use your own MySQL username and connection options if they differ. The script creates the `pos_tfa2` database, the exact `customers` and `users` tables, and five sample rows in each. It is a setup script for an empty database; do not re-import it over existing tables.
3. Copy `.env.example` to `.env` if `.env` does not already exist. Set `app.baseURL` to your local URL with a trailing slash and fill in the real `database.default.*` settings. The local XAMPP setup uses `http://localhost:8080/`, host `127.0.0.1`, database `pos_tfa2`, MySQLi, and port `3306`. Set the username and password for your own MySQL installation. `.env` is ignored by Git.
4. Run `php spark serve` and open `http://localhost:8080/`.

If using another web server, point its document root at `public/`. The four routes are `/`, `/about`, `/customers`, and `/users`.

## How it works

`app/Config/Routes.php` sends a URL to its controller. The Customers and Users controllers call their Models, which use the configured MySQL connection to read the tables. Each controller passes its records to a view; `foreach` creates the table rows, and `esc()` escapes their displayed values. The shared header and `public/css/style.css` keep the same simple navigation and styling as TFA1.

TFA1 showed a Role column on the user page. TFA2's required `users` table has no `role` field, so the TFA2 page shows only Username and Full Name. Confirm this difference with the instructor; no role data was invented.

## Database export and submission

`database/pos_tfa2.sql` is the importable setup script. `database/pos_tfa2_export.sql` is an export generated from the populated local database. If you need a fresh export after changing the data, run this from the project root with your own connection settings:

```powershell
& 'C:\xampp\mysql\bin\mysqldump.exe' --user=root --databases pos_tfa2 --skip-add-drop-table --result-file=database/pos_tfa2_export.sql
```

Submission checklist:

- [ ] [GitHub repository](https://github.com/weseemahmed11-tech/TA1) includes the project files and database export.
- [ ] A working hosted application URL is supplied after deployment.
- [ ] Hosted `.env` settings use that host's database credentials and base URL; do not commit `.env`.
