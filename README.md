# University Clinic Management System

A modern, web-based clinic management system built with PHP that streamlines patient care, appointments, prescriptions, and medical operations.
<img width="1894" height="889" alt="image" src="https://github.com/user-attachments/assets/e624f971-a09a-41fb-bc14-bb7132378877" />

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Setup](#database-setup)
- [Running the Application](#running-the-application)
- [Project Structure](#project-structure)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Features

- **Patient Management** - Register and manage patient information and medical history
- **Appointment Scheduling** - Book, manage, and track clinic appointments
- **Prescription Management** - Create, issue, and track drug prescriptions
- **Pharmacy/Drug Management** - Maintain inventory of available drugs and medications
- **Session Management** - User authentication and session handling
- **Dashboard** - Comprehensive overview of clinic operations and statistics
- **News & Updates** - Share clinic news and health information with patients
- **Automated Email Notifications** - Send appointment reminders and notifications via SMTP

## Requirements

- **PHP**: 8.3 or higher
- **MySQL/MariaDB**: 5.7 or higher
- **Web Server**: Apache with mod_rewrite enabled or Nginx
- **Composer**: For dependency management
- **Git**: For cloning the repository (optional)

## Installation

### Step 1: Clone the Repository

```bash
git clone https://github.com/Dammy-The-Traveller/University-Clinic-Management-System.git
cd Clinic-Management-System
```

Or if you're downloading as a ZIP file:
```bash
# Extract the ZIP file and navigate to the project directory
cd Clinic-Management-System
```

### Step 2: Install Dependencies

```bash
composer install
```

This will install all required PHP packages including:
- Illuminate Collections
- QR Code generators (Endroid and Bacon)
- PHPMailer for email functionality
- PHP DotEnv for environment variable management
- FPDF for PDF generation
- Symfony Var Dumper for debugging

### Step 3: Set Up Environment Variables

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

### Step 4: Configure Your Environment

Edit the `.env` file with your specific settings:

```env
# Application Settings
APP_NAME="University Clinic-Management-System App"
APP_URL=http://localhost/Clinic-Management-System

# Database Configuration
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=lemsas
DB_USERNAME=root
DB_PASSWORD=your_password_here
DRIVER=mysql


# Email Configuration (SMTP)
SMTP_USERNAME=your-email@example.com
SMTP_PASSWORD=your_password_here

# API Keys
NEWS_API_KEY=your_news_api_key_here

# Application Key
APP_KEY=8e4a27836f97a916fec56bbc07c28ccbb36efd625cce5c77a2963f0279d082f9

# Installation Status
INSTALLED=false
```

### Step 5: Create the Database

Create a new MySQL database:

```bash
mysql -u root -p
```

Then in the MySQL prompt:

```sql
CREATE DATABASE lemsas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

## Database Setup

### Automated Installation

The application includes a built-in installer that guides you through:

1. **Requirement Check** - Verifies your server meets all requirements
2. **Database Configuration** - Collects database connection details
3. **Database Migration** - Runs all migrations and creates tables
4. **Application Setup** - Finalizes the installation

To access the installer:

```
http://localhost/Clinic-Management-System/install
```

### Manual Database Setup

If you prefer to set up the database manually:

```bash
# Run migrations
php migrate.php

# Seed the database (optional)
php seed.php
```

Database migrations are located in the `database/migrations/` directory.

## Running the Application

### Using PHP Built-in Server (Development)

```bash
php -S localhost:8000
```

Then access the application at: `http://localhost:8000`

### Using Apache/WAMP/XAMPP

1. Place the project in your web root:
   - WAMP: `C:\wamp64\www\Clinic-Management-System`
   - XAMPP: `C:\xampp\htdocs\Clinic-Management-System`

2. Access via browser:
   ```
   http://localhost/Clinic-Management-System
   ```

### Using Nginx

Configure your Nginx virtual host:

```nginx
server {
    listen 80;
    server_name clinic.local;
    root /path/to/Clinic-Management-System;

    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
    }
}
```

## Project Structure

```
Clinic-Management-System/
├── Core/                          # Core framework classes
│   ├── App.php
│   ├── Container.php              # Dependency injection container
│   ├── Database.php               # PDO database abstraction layer
│   ├── Router.php                 # URL routing
│   ├── Session.php                # Session management
│   ├── Authenticator.php          # User authentication
│   ├── Validator.php              # Form validation
│   ├── Migrator.php               # Database migrations
│   └── middleware/                # Middleware classes
│
├── Http/
│   ├── Controllers/               # Request handlers
│   │   ├── Dashboard.php
│   │   ├── book_appointment.php
│   │   ├── Appointments/
│   │   ├── Patients/
│   │   ├── Prescription/
│   │   ├── Drug/
│   │   ├── Sessions/              # Login/logout
│   │   ├── registration/          # Patient registration
│   │   ├── apis/                  # API endpoints
│   │   └── install/               # Installation wizard
│   └── Forms/                     # Form validation classes
│
├── database/
│   ├── migrations/                # Database migration files
│   ├── seeders/                   # Database seeders
│   └── dumps/                     # Database schema dumps
│
├── storage/
│   ├── logs/                      # Application logs
│   └── install.lock               # Installation lock file
│
├── views/                         # HTML views and templates
│   ├── index.view.php            # Home page
│   ├── Dashboard.view.php        # Dashboard
│   ├── registration/
│   ├── Patients/
│   ├── Appointments/
│   ├── Prescription/
│   ├── Drug/
│   └── partials/                  # Reusable view components
│
├── public/
│   └── assets/                    # Static files (CSS, JS, images)
│       ├── css/
│       ├── js/
│       ├── images/
│       └── qrcodes/               # Generated QR codes
│
├── vendor/                        # Composer dependencies
├── config.php                     # Configuration file
├── bootstrap.php                  # Application bootstrap
├── route.php                      # Route definitions
├── index.php                      # Application entry point
├── composer.json                  # Composer configuration
├── .env.example                   # Environment variables template
└── README.md                      # This file
```

## Usage

### Access the Application

1. **Home Page**: `http://localhost/Clinic-Management-System`
2. **Login**: Use th credentials on the login page to access the dashboard
3. **Register as Patient**: New nurse can create an account via `http://localhost/Clinic-Management-System/register` after admin has generated a code for the user
4. **Book Appointment**: Navigate to "Book Appointment" section
5. **Dashboard**: View clinic overview and statistics

### Key Sections

#### Patient Management
- Register new patients
- View patient information
- Manage patient medical history

#### Appointments
- Book new appointments
- View scheduled appointments
- Manage appointment statuses

#### Prescriptions
- Create prescriptions for patients
- Track prescription history
- Generate prescription reports

#### Pharmacy
- Manage drug inventory
- Track available medications
- View drug details and information

### Admin Features

Administrators have access to:
- All patient and appointment records
- Prescription management
- User and staff management
- System settings and configuration
- Reports and analytics
-code generation for user

## Testing

The project uses **Pest PHP** for testing. Run tests with:

```bash
composer test
```

Or use specific test commands:

```bash
./vendor/bin/test unit-test        # Run unit tests
./vendor/bin/test functional-test  # Run functional tests
./vendor/bin/pest                  # Run all tests
```

## Security Considerations

- Keep your `.env` file secure and never commit it to version control
- Regularly update dependencies: `composer update`
- Use strong passwords for database and admin accounts
- Enable HTTPS in production
- Implement rate limiting on login endpoints
- Keep PHP and MySQL updated to latest versions
- Validate and sanitize all user inputs

## Troubleshooting

### Common Issues

**Issue**: "Class not found" error
- **Solution**: Run `composer install` to install dependencies

**Issue**: Database connection error
- **Solution**: Verify `.env` database credentials and ensure MySQL is running

**Issue**: 404 errors on routes
- **Solution**: Ensure Apache mod_rewrite is enabled or configure your web server correctly

**Issue**: Blank white page
- **Solution**: Check `storage/logs/` for error messages, or enable error reporting in PHP

## Performance Optimization

- Enable PHP OPcache in production
- Use database query caching
- Implement CDN for static assets
- Compress CSS and JavaScript files
- Enable GZIP compression on web server

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Support

For support, please:
- Open an issue on GitHub
- Contact the development team
- Check the documentation and troubleshooting section

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Author

**Dammy The Traveller**  
Email: adebesindamilare39@gmail.com

---

## Changelog

### Version 1.0.0
- Initial release
- Patient management system
- Appointment scheduling
- Prescription management
- User authentication and authorization

---

**Last Updated**: January 2026

For the latest updates and documentation, visit the [GitHub Repository](https://github.com/Dammy-The-Traveller/University-Clinic-Management-System.git)
