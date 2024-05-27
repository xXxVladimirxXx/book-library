# Book Library API

This is a simple REST API application for managing a book library. It allows you to track the books available in the library.

## Requirements

- PHP 8.1 or higher
- Composer
- Laravel 11
- MySQL or any other supported database

## Features

- Supports CRUD operations (Create, Read, Update, Delete) for books.
- API endpoints for managing books.
- PHPUnit tests for all endpoints.
- Uses Laravel's Eloquent ORM.

## Installation

1. **Clone the repository:**

    ```sh
    git clone https://github.com/xXxVladimirxXx/book-library.git
    cd book-library
    ```

2. **Install dependencies:**

    ```sh
    composer install
    ```

3. **Create a `.env` file:**

    Copy the `.env.example` file to `.env` and configure your database settings:

    ```sh
    cp .env.example .env
    ```

    Update the database configuration in the `.env` file:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

4. **Generate an application key:**

    ```sh
    php artisan key:generate
    ```

5. **Run migrations:**

    ```sh
    php artisan migrate
    ```

6. **Seed the database (optional):**

    If you want to seed the database with some initial data, you can run:

    ```sh
    php artisan db:seed
    ```

7. **Start the development server:**

    ```sh
    php artisan serve
    ```

    The application will be available at `http://localhost:8000`.

## API Endpoints

- `GET /api/books` - Get all books
- `GET /api/books/{id}` - Get a single book by ID
- `POST /api/books` - Create a new book
- `PATCH /api/books/{id}` - Update an existing book by ID
- `DELETE /api/books/{id}` - Delete a book by ID

## Running Tests

To run the PHPUnit tests, use the following command:

```sh
php artisan test
