# MrEgyptTours - Tour Booking Platform

A comprehensive tour booking and management platform built with Laravel 11 and Vue.js 3, featuring a modular architecture, multi-language support, and integrated payment processing.

## 🚀 Key Features

### Core Functionality

-   **Online Booking System**: User-friendly booking interface with real-time availability
-   **Payment Integration**: Secure PayPal payment processing
-   **Multi-Language Support**: Built-in internationalization using Spatie Translatable
-   **Category Management**: Organize tours by categories and locations
-   **Admin Dashboard**: Full-featured admin panel built with Vue.js and PrimeVue

## 🏗️ Architecture

### Modular Structure

The application follows a **modular monolith architecture** using `nwidart/laravel-modules`, providing:

-   **Separation of Concerns**: Each module is self-contained with its own controllers, models, views, and routes
-   **Scalability**: Easy to add, remove, or modify modules without affecting others
-   **Maintainability**: Clear boundaries between different features
-   **Reusability**: Modules can be reused across different projects

### Available Modules

| Module        | Description                                                       |
| ------------- | ----------------------------------------------------------------- |
| **Tour**      | Core tour management with pricing tiers, images, and translations |
| **Booking**   | Booking system with dynamic pricing based on group size           |
| **PayPal**    | Payment processing and transaction management                     |
| **Category**  | Tour categorization and organization                              |
| **Location**  | Geographic location management for tours                          |
| **City**      | City-based tour filtering                                         |
| **Inclusion** | Tour inclusions (what's included in the package)                  |
| **Exclusion** | Tour exclusions (what's not included)                             |
| **Review**    | Customer review and rating system                                 |
| **Blog**      | Content management for travel articles                            |
| **Faq**       | Frequently asked questions management                             |
| **Contact**   | Contact form with validation and spam protection                  |
| **Setting**   | Application settings and configuration                            |
| **Home**      | Landing page and public-facing content                            |

## 💎 Advantages

### 1. **Modular Architecture**

-   **Independent Development**: Teams can work on different modules simultaneously
-   **Easy Testing**: Each module can be tested independently
-   **Flexible Deployment**: Modules can be enabled/disabled as needed
-   **Clean Codebase**: Better organization and reduced coupling

### 2. **Multi-Language Support (Spatie Translatable)**

-   **JSON-based Translations**: Store translations directly in database columns
-   **Easy to Extend**: Add new languages without database migrations
-   **Performance**: No additional joins required for translations
-   **Developer-Friendly**: Simple API for managing translations


### 3. **Service Layer Pattern**

-   **Business Logic Separation**: Services handle complex operations
-   **Reusability**: Service methods can be used across controllers
-   **Testability**: Easy to unit test business logic

### 4. **Trait-Based Utilities**

-   **Code Reusability**: Common functionality shared across modules
-   **DRY Principle**: Don't Repeat Yourself
-   **Available Traits**:
    -   `ImagesUtility`: Image upload, storage, and deletion
    -   `TourUtility`: Tour-specific helper methods

### 5. **API Resources (Transformers)**

-   **Consistent API Responses**: Standardized data formatting
-   **Data Hiding**: Control what data is exposed to clients
-   **Performance**: Eager loading and optimized queries
-   **Examples**: `TourResource`, `TourListResource`

### 6. **Payment Integration**

-   **PayPal SDK**: Official PayPal integration using `srmklive/paypal`
-   **Secure Transactions**: Industry-standard payment processing
-   **Order Tracking**: Complete payment history and status tracking
-   **Flexible Pricing**: Dynamic pricing based on group size (1, 2-5, 6-20 people)

### 7. **Modern Frontend Stack**

-   **Vue.js 3**: Reactive and component-based UI
-   **PrimeVue**: Rich UI component library
-   **Tailwind CSS**: Utility-first styling
-   **Vite**: Fast build tool and HMR (Hot Module Replacement)
-   **Inertia.js**: SPA-like experience without API complexity

### 8. **Image Management**

-   **Intervention Image**: Advanced image manipulation
-   **Multiple Images**: Support for tour galleries
-   **Automatic Cleanup**: Old images deleted when updating
-   **Storage Optimization**: Efficient file storage and retrieval

### 9. **Form Validation**

-   **Request Classes**: Dedicated validation for each operation
-   **reCAPTCHA Integration**: Spam protection on contact and booking forms
-   **Custom Rules**: Business-specific validation logic
-   **Client & Server Validation**: Double-layer security

### 10. **Developer Experience**

-   **Laravel 11**: Latest Laravel features and improvements
-   **PHP 8.2**: Modern PHP with type safety and performance
-   **PSR-4 Autoloading**: Standard autoloading for modules
-   **Code Organization**: Clear directory structure and naming conventions

## 🛠️ Technology Stack

### Backend

-   **Framework**: Laravel 11.x
-   **PHP**: ^8.2
-   **Database**: MySQL/PostgreSQL (configurable)
-   **Authentication**: Laravel Sanctum

### Frontend

-   **Framework**: Vue.js 3.4
-   **UI Library**: PrimeVue 4.2
-   **Styling**: Tailwind CSS 3.4
-   **Rich Text Editor**: Vue Quill
-   **Build Tool**: Vite 5.0

### Key Packages

-   **nwidart/laravel-modules** (11.0): Modular application structure
-   **spatie/laravel-translatable** (^6.11): Multi-language support
-   **srmklive/paypal** (~3.0): PayPal payment integration
-   **intervention/image** (^3.9): Image processing
-   **cviebrock/eloquent-sluggable** (^11.0): Automatic slug generation

## 📁 Module Structure

Each module follows a consistent structure:

```
Modules/
└── Tour/
    ├── Config/              # Module configuration
    ├── Console/             # Artisan commands
    ├── Database/
    │   ├── Factories/       # Model factories
    │   ├── Migrations/      # Database migrations
    │   └── Seeders/         # Database seeders
    ├── Entities/            # Eloquent models
    ├── Http/
    │   ├── Controllers/
    │   │   └── Api/         # API controllers
    │   ├── Middleware/      # Module-specific middleware
    │   └── Requests/        # Form request validation
    ├── Providers/           # Service providers
    ├── Resources/
    │   ├── assets/          # Module assets (JS, CSS)
    │   └── views/           # Blade templates
    ├── Routes/
    │   ├── api.php          # API routes
    │   └── web.php          # Web routes
    ├── Service/             # Business logic services
    ├── Transformers/        # API resources
    ├── composer.json        # Module dependencies
    ├── module.json          # Module metadata
    └── package.json         # Frontend dependencies
```

## 🔧 Installation

### Prerequisites

-   PHP >= 8.2
-   Composer
-   Node.js >= 18.x
-   MySQL/PostgreSQL


## 🔐 Security Features

-   **CSRF Protection**: Laravel's built-in CSRF protection
-   **SQL Injection Prevention**: Eloquent ORM with parameter binding
-   **XSS Protection**: Automatic output escaping in Blade templates
-   **reCAPTCHA v2**: Spam protection on forms
-   **Form Request Validation**: Server-side validation for all inputs
-   **Sanctum Authentication**: Secure API authentication

## 📊 Database Schema Highlights

### Tours Table

-   Multi-language fields (JSON columns): title, description, itinerary, duration, places
-   Pricing tiers: price_per_person, price_two_five, price_six_twenty
-   Relationships: category, locations, inclusions, exclusions, images, reviews

### Bookings Table

-   Customer information: name, email, phone, country, hotel
-   Booking details: adults, children, date, total_price
-   Payment tracking: linked to PayPal payments

### Translations

-   Stored as JSON in model columns (Spatie Translatable)
-   No separate translation tables needed
-   Easy to query and filter by language

## 🚀 Performance Optimizations

-   **Eager Loading**: Prevents N+1 query problems
-   **API Resources**: Optimized data transformation
-   **Image Optimization**: Intervention Image for resizing
-   **Vite Build**: Fast frontend builds with code splitting
-   **Database Indexing**: Optimized queries on frequently accessed columns


## 📝 License

Proprietary - All rights reserved

## 👥 Development Team

Developed for MrEgyptTours travel agency.

---

**Built with ❤️ using Laravel & Vue.js**
