a# Mr Egypt Tours

A comprehensive travel and tourism application built with Laravel and Vue.js, designed to manage tours, bookings, and content efficiently.

## Key Features

-   **Modular Architecture**: Built using `nwidart/laravel-modules` for better code organization and scalability. Modules include:

    -   **Tour**: Manage day tours, tour packages, and itineraries.
    -   **Blog**: Publish travel articles and guides.
    -   **Faq**: Manage frequently asked questions.
    -   **Review**: Handle customer reviews.
    -   **Location/City**: Manage destinations.
    -   **Contact**: Handle user inquiries.

-   **Modern Frontend**: Powered by **Vue.js 3**, **TailwindCSS**, and **PrimeVue** for a responsive and interactive user interface.
-   **Payment Integration**: PayPal integration for secure payments.
-   **API First**: RESTful API support using Laravel Sanctum.

## Tech Stack

-   **Backend**: Laravel 11, PHP 8.2+
-   **Frontend**: Vue.js 3, Vite, TailwindCSS
-   **Database**: MySQL

## Installation

1. **Clone the repository**

    ```bash
    git clone <repository-url>
    cd MrEgyptTours
    ```

2. **Install Backend Dependencies**

    ```bash
    composer install
    ```

3. **Install Frontend Dependencies**

    ```bash
    npm install
    ```

4. **Environment Setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Database Setup**

    - Configure your database credentials in `.env`.
    - Run migrations and seeders:
        ```bash
        php artisan migrate --seed
        ```

6. **Serve Application**
    - Backend: `php artisan serve`
    - Frontend: `npm run dev`
