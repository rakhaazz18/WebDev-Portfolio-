# 🎨 Portfolio Website

A modern and elegant portfolio website built with Laravel 12, showcasing projects, skills, experiences, and blog posts.

## ✨ Features

- 📝 **Blog Posts** - Share your thoughts and articles
- 💼 **Work Experience** - Display your professional journey
- 🚀 **Project Showcase** - Highlight your best work with featured projects
- 🛠️ **Skills Management** - Categorized skills with proficiency levels
- 🔗 **Project-Skill Relationships** - Link projects with technologies used
- 👤 **User Management** - Multi-user support with authentication
- 🎨 **Luxury Theme** - Beautiful and modern UI design
- 📱 **Responsive Design** - Works perfectly on all devices

## 🛠️ Tech Stack

- **Backend:** Laravel 12
- **Frontend:** Blade Templates, JavaScript, CSS
- **Database:** MySQL
- **Server:** PHP 8.2+
- **Package Manager:** Composer, NPM

## 📊 Database Structure

The project includes:
- **Users** - User authentication and profiles
- **Projects** - Portfolio projects with images and links
- **Skills** - Technical skills with categories and proficiency
- **Experiences** - Work history and positions
- **Posts** - Blog articles and content
- **Project-Skill** - Many-to-many relationship pivot table

See `database/ERD_Portfolio.drawio` for complete database diagram.

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## 🚀 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- MySQL/MariaDB
- Node.js & NPM

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/rakhaazz18/WebDev-Portfolio-.git
   cd WebDev-Portfolio-
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database in `.env`**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=portfolio_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Import database**
   
   **Option 1: Using SQL files (Recommended)**
   ```bash
   # Via PowerShell
   cd database
   C:\xampp\mysql\bin\mysql.exe -u root < portfolio_database.sql
   C:\xampp\mysql\bin\mysql.exe -u root portfolio_db < sample_data.sql
   
   # Or double-click
   import_database.bat
   ```
   
   **Option 2: Using Laravel Migration**
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Build assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

7. **Run the application**
   ```bash
   php artisan serve
   ```

8. **Visit** `http://localhost:8000`

## 🔐 Default Login

If you imported sample data:
```
Email: admin@portfolio.com
Password: password
```

## 📁 Project Structure

```
portfolio/
├── app/
│   ├── Http/Controllers/    # Application controllers
│   └── Models/              # Eloquent models
├── database/
│   ├── migrations/          # Database migrations
│   ├── seeders/             # Database seeders
│   ├── portfolio_database.sql   # Complete database schema
│   ├── sample_data.sql          # Sample data for testing
│   └── ERD_Portfolio.drawio     # Database ERD diagram
├── public/
│   ├── css/                 # Compiled CSS
│   ├── js/                  # Compiled JavaScript
│   └── images/              # Public images
├── resources/
│   ├── views/               # Blade templates
│   ├── css/                 # Source CSS
│   └── js/                  # Source JavaScript
└── routes/
    └── web.php              # Web routes
```

## 🧪 Testing

Test database connection:
```bash
php test_database.php
```

Run Laravel tests:
```bash
php artisan test
```

## 📝 Available Routes

- `/` - Home page
- `/about` - About page
- `/projects` - Projects showcase
- `/experience` - Work experience
- `/contact` - Contact form

## 🛠️ Development

```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Run migrations
php artisan migrate

# Seed database
php artisan db:seed

# Create new seeder
php artisan make:seeder NameSeeder
```

## 📊 Database Tools

- **phpMyAdmin**: `http://localhost/phpmyadmin`
- **View ERD**: Open `database/ERD_Portfolio.drawio` in [draw.io](https://app.diagrams.net)
- **Documentation**: See `database/README_DATABASE.md`

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Author

**Rakha Aziz**
- GitHub: [@rakhaazz18](https://github.com/rakhaazz18)

---

Built with ❤️ using Laravel
