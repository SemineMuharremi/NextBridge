# NextBridge – Online Courses Platform

NextBridge is a full-stack web application for an online course center, built with **PHP** and **MySQL** without any framework. The public site presents the school, its courses and pricing. Students and professors can create accounts and log in, and administrators manage users and incoming messages from a dashboard.

The project focuses on building a complete PHP application by hand: server-side rendering, session-based authentication with roles, CRUD operations, and secure handling of user input.

> The user interface is in **Albanian**. The code, comments and documentation are mixed Albanian and English.

---

## Table of Contents

- [Features](#features)
- [Pages Overview](#pages-overview)
- [User Roles](#user-roles)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Database Schema](#database-schema)
- [Security](#security)
- [Getting Started](#getting-started)
- [Configuration](#configuration)
- [Troubleshooting](#troubleshooting)
- [Possible Improvements](#possible-improvements)
- [Author](#author)
- [License](#license)

---

## Features

### Public website
- Landing page with statistics, "why choose us" highlights and popular courses
- About page with the school's history and a team section
- Course catalog loaded **dynamically from the database**
- **Featured courses** loaded from an XML file (`data/featured_courses.xml`) and parsed with `SimpleXML`
- Four pricing plans: Basic, Standard, Premium and Platinum
- Contact form that stores messages in the database
- Newsletter subscription in the footer, with duplicate-email detection

### Accounts and authentication
- Registration for **students** and **professors**
- Login with role selection and a role-based redirect: admins go to the dashboard, everyone else goes to the home page
- Sessions with a logged-in user menu in the header and a logout action

### Admin dashboard
- Summary cards: number of professors, students and messages, plus an activity indicator
- **Full CRUD** for professors and students: add, edit inline, and delete with confirmation
- Reading and deleting contact-form messages
- Access restricted to users with the `admin` role

---

## Pages Overview

| Page | File | Description |
|------|------|-------------|
| Landing | `index.php` | Hero section, statistics, features, popular courses, contact call-to-action |
| Home | `home.php` | Main page after login: school features and featured courses from XML |
| About | `about.php` | School history (since 2004), mission and team members |
| Courses | `courses.php` | Course cards (name, schedule, description, image) from the `courses` table |
| Pricing | `price.php` | Pricing plans |
| Contact | `contact.php` | Contact form, saved to `contact_messages` |
| Login | `login.php` | Login for students, professors and admins |
| Register | `register.php` | Account creation for students and professors |
| Logout | `logout.php` | Ends the session |
| More | `more.html` | Static page about creative learning for kids |
| Admin | `admin/dashboard.php` | Admin panel (protected) |

The header (`includes/header.php`) and footer (`includes/footer.php`) are shared partials included on the content pages.

---

## User Roles

| Role | Can register publicly | After login | Permissions |
|------|-----------------------|-------------|-------------|
| Student | Yes | `home.php` | Browse the site |
| Professor | Yes | `home.php` | Browse the site |
| Admin | **No** (created in the database) | `admin/dashboard.php` | Manage professors, students and messages |

Each role is stored in its own table (`students`, `profesors`, `admini`). A whitelist in `includes/functions.php` maps role names to table names, so a table name never comes directly from user input:

```php
function role_table(string $role): ?string
{
    $tables = [
        'student'  => 'students',
        'profesor' => 'profesors',
        'admin'    => 'admini',
    ];
    return $tables[$role] ?? null;
}
```

---

## Tech Stack

| Layer | Technology |
|-------|------------|
| Backend | PHP 8 with the `mysqli` extension |
| Database | MySQL / MariaDB |
| Frontend | HTML5, CSS3 (Flexbox, Grid, animations), vanilla JavaScript |
| Data | XML (featured courses) |
| Icons and fonts | Font Awesome 7, Google Fonts (Roboto, Poppins, Playfair Display) |
| Local environment | XAMPP (Apache + PHP + MariaDB) |

---

## Project Structure

```
NextBridge/
├── admin/
│   └── dashboard.php          # Admin panel: stats + CRUD (requires admin role)
├── assets/
│   ├── css/
│   │   └── style.css          # Shared styles (header, footer, navigation)
│   └── images/                # Course, team and page images
├── data/
│   └── featured_courses.xml   # Featured courses shown on the home page
├── database/
│   └── schema.sql             # Database, tables and demo data
├── includes/
│   ├── config.example.php     # Database config template (copy to config.php)
│   ├── db.php                 # Database connection (mysqli, utf8mb4)
│   ├── functions.php          # Helpers: session, escaping, CSRF, auth, roles
│   ├── header.php             # Shared header and navigation
│   └── footer.php             # Shared footer and newsletter form
├── index.php                  # Landing page
├── home.php                   # Home page
├── about.php                  # About page
├── courses.php                # Course catalog (from the database)
├── price.php                  # Pricing plans
├── contact.php                # Contact form
├── login.php                  # Login
├── register.php               # Registration
├── logout.php                 # Logout
├── more.html                  # Static info page
├── .gitignore
├── LICENSE
└── README.md
```

**Separation of concerns**
- `includes/` holds everything shared: configuration, the database connection, helper functions and layout partials.
- `assets/` holds static files only.
- Each page handles its own form submission at the top of the file, before any HTML is sent, and redirects after a successful `POST` (the Post/Redirect/Get pattern), so refreshing the page does not resubmit the form.

---

## Database Schema

The database is called `kurseonline`. The full script is in [`database/schema.sql`](database/schema.sql).

| Table | Columns | Purpose |
|-------|---------|---------|
| `students` | `id`, `username`, `email` (unique), `password`, `created_at` | Student accounts |
| `profesors` | `id`, `username`, `email` (unique), `password`, `created_at` | Professor accounts |
| `admini` | `id`, `username`, `email` (unique), `password`, `created_at` | Administrator accounts |
| `courses` | `id`, `course_name`, `time`, `info`, `image` | Courses shown on `courses.php` |
| `contact_messages` | `id`, `full_name`, `email`, `subject`, `message`, `created_at` | Contact-form submissions |
| `subscribers` | `id`, `email` (unique), `created_at` | Newsletter subscribers |

Notes:
- `password` stores a **bcrypt hash** (255 characters), never plain text.
- Professors and students added by an admin have no password (`NULL`) and cannot log in until one is set.
- `courses.image` holds a file name from `assets/images/`.

---

## Security

Security was a key part of this project. Every form and query is protected against the most common web vulnerabilities.

| Threat | Protection | Where |
|--------|------------|-------|
| SQL injection | Prepared statements with bound parameters on every query | all pages |
| Plain-text passwords | `password_hash()` on registration, `password_verify()` on login | `register.php`, `login.php` |
| Cross-site scripting (XSS) | All output escaped with `e()`, a wrapper around `htmlspecialchars()` | all pages |
| Cross-site request forgery (CSRF) | A per-session random token checked with `hash_equals()` on every `POST` | `includes/functions.php` |
| Unauthorized admin access | `require_admin()` on admin pages | `admin/dashboard.php` |
| Privilege escalation | Public registration only allows the `student` and `profesor` roles | `register.php` |
| Session fixation | `session_regenerate_id(true)` after a successful login | `login.php` |
| User enumeration | The same error message for a wrong email and a wrong password | `login.php` |
| Leaked credentials | Database credentials live in `config.php`, which is ignored by Git | `.gitignore` |
| Destructive `GET` requests | Deletes are sent as `POST` forms with CSRF tokens, not links | `admin/dashboard.php` |
| Information leakage | Database errors are written to the log, not shown to the user | `includes/db.php` |

Example: login with a prepared statement and password verification:

```php
$stmt = $conn->prepare("SELECT id, username, password FROM $table WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();

if ($row && $row['password'] !== null && password_verify($password, $row['password'])) {
    session_regenerate_id(true);
    // ...
}
```

---

## Getting Started

### Requirements

- PHP **8.0** or newer, with the `mysqli` extension enabled (it is enabled by default in XAMPP)
- MySQL **5.7+** or MariaDB **10.4+**
- A web server: [XAMPP](https://www.apachefriends.org/) is recommended on Windows

### Installation with XAMPP

1. **Clone the repository** into the `htdocs` folder:
   ```bash
   cd C:\xampp\htdocs
   git clone https://github.com/SemineMuharremi/NextBridge.git
   ```

2. **Start Apache and MySQL** from the XAMPP Control Panel.

3. **Create the database.** Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin), go to **Import**, choose `database/schema.sql` and click **Go**. You can also use the command line:
   ```bash
   mysql -u root -p < database/schema.sql
   ```
   This creates the `kurseonline` database, all six tables, three demo courses and a demo admin account.

4. **Configure the connection.** Copy the template and edit it if your credentials are different:
   ```bash
   cp includes/config.example.php includes/config.php
   ```

5. **Open the site** at [http://localhost/NextBridge/](http://localhost/NextBridge/).

### Demo accounts

| Role | Email | Password |
|------|-------|----------|
| Admin | `admin@nextbridge.com` | `admin123` |

To try the student or professor experience, create an account on the **Register** page.

> Change the admin password after installing if the site will be reachable by others.

---

## Configuration

`includes/config.php` returns an array with the database settings:

```php
return [
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => '',
    'db_name' => 'kurseonline',
];
```

If `config.php` does not exist, the application falls back to `config.example.php`, which holds the default XAMPP values.

To change the featured courses on the home page, edit `data/featured_courses.xml`:

```xml
<course>
  <title>Web Development</title>
  <time>3 Months</time>
  <description>Learn HTML, CSS, and JavaScript basics.</description>
</course>
```

---

## Troubleshooting

| Problem | Solution |
|---------|----------|
| "Lidhja me databazën dështoi" (database connection failed) | Make sure MySQL is running in XAMPP and the values in `includes/config.php` are correct |
| `Access denied for user 'root'@'localhost'` | Your MySQL root user has a password: add it to `db_pass` in `config.php` |
| Tables not found | Import `database/schema.sql` again |
| Old accounts cannot log in | Accounts created before password hashing was added store plain-text passwords. Register again |
| Images do not load on Linux | File names are case-sensitive on Linux: check the exact spelling in `assets/images/` |
| "Kërkesë e pavlefshme" (invalid request) after submitting a form | The CSRF token expired with the session: reload the page and submit again |

---

## Possible Improvements

Ideas for future development:

- Course enrollment for students and course management for professors
- Course management (add, edit, delete) in the admin panel
- Password reset by email
- Merging the three user tables into one `users` table with a `role` column
- Pagination and search in the admin tables
- Moving the inline page styles into separate CSS files
- A responsive mobile navigation menu
- Automated tests and a Docker setup

---

## Author

**Semine Muharremi**

- GitHub: [@SemineMuharremi](https://github.com/SemineMuharremi)

---

## License

This project is licensed under the [MIT License](LICENSE).
