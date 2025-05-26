# Laravel Application

This project is a Laravel application that is set up to run within Docker containers. It includes a MySQL database and Composer for dependency management.

## Project Structure

- **src/app**: Core application code, including models, controllers, and components.
- **src/bootstrap**: Files for bootstrapping the Laravel application.
- **src/config**: Configuration files for various aspects of the application.
- **src/database**: Database-related files, including migrations and seeders.
- **src/public**: Public-facing files, including the entry point `index.php`.
- **src/resources**: Views, raw assets, and language files.
- **src/routes**: Route definitions for the application.
- **src/storage**: Storage for compiled views and file uploads.
- **src/tests**: Test files for the application.
- **src/composer.json**: Composer configuration file.

## Docker Setup

This project uses Docker to create a consistent development environment. The following services are defined:

- **MySQL**: The database service, configured in `docker/mysql/my.cnf`.
- **PHP**: The application service, built using the Dockerfile located in `docker/php/Dockerfile`.

## Environment Configuration

An example environment configuration file is provided as `.env.example`. Copy this file to `.env` and update the variables as needed for your local setup.

## Installation

1. Clone the repository:
   ```
   git clone <repository-url>
   cd laravel-app
   ```

2. Copy the example environment file:
   ```
   cp .env.example .env
   ```

3. Build and start the Docker containers:
   ```
   docker-compose up -d
   ```

4. Install Composer dependencies:
   ```
   docker-compose exec php composer install
   ```

5. Run database migrations:
   ```
   docker-compose exec php php artisan migrate
   ```

## Usage

You can access the application at `http://localhost` after the containers are up and running. Use the Laravel Artisan commands to manage your application as needed.

## Contributing

Feel free to submit issues or pull requests for improvements or bug fixes.