# NextBridge – Online Courses Platform

A web platform for an online course center, built with **PHP** and **MySQL**. Visitors can browse courses and pricing, contact the school and subscribe to the newsletter. Students and professors can register and log in, and an admin panel manages users and messages.

> The user interface is in Albanian.

## Features

- **Public site**: landing page, home, about, courses (loaded from the database), pricing, and a contact form
- **Featured courses** loaded from an XML file (`data/featured_courses.xml`)
- **Authentication**: registration and login for students and professors, with a role-based redirect
- **Admin dashboard**: statistics, plus add, edit and delete for professors and students, and reading or deleting contact messages
- **Newsletter subscription** in the footer

## Security

- All database queries use **prepared statements** (protects against SQL injection)
- Passwords are hashed with `password_hash()` / `password_verify()`
- All user-supplied output is escaped with `htmlspecialchars()` (protects against XSS)
- **CSRF tokens** on every form
- Admin pages are protected by a role check; admin accounts cannot be created through public registration
- Deletes use `POST` requests, never `GET` links
- Database credentials live in a config file that is excluded from Git

## Tech Stack

| Layer    | Technology                     |
|----------|--------------------------------|
| Backend  | PHP 8 (mysqli)                 |
| Database | MySQL / MariaDB                |
| Frontend | HTML5, CSS3, JavaScript        |
| Icons    | Font Awesome, Google Fonts     |

## Project Structure

```
├── admin/
│   └── dashboard.php        # Admin panel (protected)
├── assets/
│   ├── css/style.css        # Shared styles (header, footer)
│   └── images/
├── data/
│   └── featured_courses.xml
├── database/
│   └── schema.sql           # Tables and demo data
├── includes/
│   ├── config.example.php   # Database config template
│   ├── db.php               # Database connection
│   ├── functions.php        # Helpers: escaping, CSRF, auth
│   ├── header.php
│   └── footer.php
├── index.php                # Landing page
├── home.php
├── about.php
├── courses.php
├── price.php
├── contact.php
├── login.php
├── register.php
├── logout.php
└── more.html
```

## Getting Started

### Requirements

- PHP 8.0+
- MySQL 5.7+ or MariaDB 10.4+
- [XAMPP](https://www.apachefriends.org/) (or any Apache/Nginx + PHP + MySQL setup)

### Installation

1. Clone the repository into your web server folder (for example `C:\xampp\htdocs`):
   ```bash
   git clone https://github.com/SemineMuharremi/NextBridge.git
   ```
2. Import the database through phpMyAdmin (**Import → `database/schema.sql`**), or from the command line:
   ```bash
   mysql -u root -p < database/schema.sql
   ```
3. Copy the config template and add your database credentials:
   ```bash
   cp includes/config.example.php includes/config.php
   ```
4. Open `http://localhost/NextBridge/` in your browser.

### Demo admin account

| Email                  | Password   |
|------------------------|------------|
| admin@nextbridge.com   | admin123   |

Change this password after installing.

## License

This project is licensed under the [MIT License](LICENSE).
