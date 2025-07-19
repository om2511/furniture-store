# Furniture Store E-commerce Website

A modern, responsive furniture e-commerce platform built with Laravel 12, featuring complete user authentication, product catalog management, and shopping cart functionality with a clean, professional design.

## 🚀 Features

### Core Functionality
- **User Authentication System**
  - User registration and login
  - Password reset functionality
  - Email verification
  - Profile management
  - Secure session handling

- **Product Management**
  - Product catalog with categories
  - Advanced search and filtering
  - Product detail pages with image galleries
  - Related product suggestions
  - SEO-friendly product URLs (slugs)
  - Stock management

- **Shopping Cart**
  - Add/update/remove items
  - Quantity management with stock validation
  - Real-time cart updates
  - Persistent cart storage
  - Cart total calculations

- **Category System**
  - Organized product categorization
  - Category-based filtering
  - Featured categories display

### User Experience
- **Responsive Design**: Mobile-first approach with Bootstrap styling
- **Search & Filter**: Advanced product search with category filters
- **Modern UI**: Clean, professional interface optimized for furniture retail
- **Performance**: Optimized database queries with proper relationships

## 🛠️ Technologies Used

### Backend
- **Laravel 12** - Modern PHP framework
- **PHP 8.2+** - Latest PHP features
- **MySQL/SQLite** - Database management
- **Laravel Breeze** - Authentication scaffolding
- **Intervention Image** - Image processing

### Frontend
- **Tailwind CSS 3** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework
- **Vite** - Modern build tool
- **Responsive Design** - Mobile-first approach

### Development Tools
- **Composer** - PHP dependency management
- **NPM** - Node package management
- **Laravel Pint** - Code formatting
- **PHPUnit** - Testing framework

## 📦 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL or SQLite

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd furniture-store
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   - Update `.env` file with your database credentials
   - For SQLite: Create `database/database.sqlite` file
   ```bash
   php artisan migrate --seed
   ```

6. **Build frontend assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

7. **Start the application**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` to access the application.

## 🗂️ Project Structure

```
furniture-store/
├── app/
│   ├── Http/Controllers/     # Application controllers
│   │   ├── Auth/            # Authentication controllers
│   │   ├── CartController.php
│   │   ├── HomeController.php
│   │   └── ProductController.php
│   └── Models/              # Eloquent models
│       ├── Cart.php
│       ├── Category.php
│       ├── Product.php
│       └── User.php
├── database/
│   ├── migrations/          # Database schema
│   └── seeders/            # Sample data
├── resources/
│   ├── views/              # Blade templates
│   │   ├── auth/           # Authentication views
│   │   ├── cart/           # Shopping cart views
│   │   ├── products/       # Product catalog views
│   │   └── layouts/        # Layout templates
│   ├── css/               # Stylesheets
│   └── js/                # JavaScript files
└── routes/
    ├── web.php            # Web routes
    └── auth.php           # Authentication routes
```

## 🎯 Key Features Details

### Authentication System
- Complete user registration and login flow
- Password reset with email verification
- Profile management with update capabilities
- Secure middleware protection for authenticated routes

### Product Catalog
- Organized product display with pagination
- Category-based navigation and filtering
- Advanced search functionality
- Individual product detail pages
- Related product suggestions
- SEO-optimized URLs with slugs

### Shopping Cart
- Session-based cart for guests
- Database-persistent cart for authenticated users
- Real-time quantity updates
- Stock validation
- Cart total calculations
- Easy item removal

## 🔐 Default Access

### User Registration
- Register new accounts through the registration form
- Email verification (optional)
- Automatic login after registration

### Sample Data
The application includes seeded sample data:
- **Categories**: Various furniture categories
- **Products**: Sample furniture items with images
- **Test Users**: For development testing

## 🚀 Usage

### For Users
1. **Browse Products**: Visit the homepage to see featured products and categories
2. **Search & Filter**: Use the search bar and category filters on the products page
3. **View Details**: Click any product to see detailed information
4. **Add to Cart**: Register/login to add items to your shopping cart
5. **Manage Cart**: Update quantities or remove items as needed

### For Developers
1. **Database Seeding**: `php artisan db:seed` to populate sample data
2. **Testing**: `php artisan test` to run the test suite
3. **Code Formatting**: `./vendor/bin/pint` to format code
4. **Development Server**: `php artisan serve` for local development

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/new-feature`)
3. Commit your changes (`git commit -am 'Add new feature'`)
4. Push to the branch (`git push origin feature/new-feature`)
5. Create a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## 🐛 Support

For support and questions:
- Create an issue in the repository
- Check existing documentation
- Review the Laravel documentation for framework-specific questions

## 🔄 Recent Updates

- ✅ Complete authentication system implementation
- ✅ Enhanced product catalog with search and filtering
- ✅ Shopping cart functionality with session persistence
- ✅ Responsive design optimization
- ✅ Database seeding with sample furniture data
- ✅ Image handling and optimization