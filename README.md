# Laravel Application

This is a Laravel application set up to run in a Docker container. Below are the instructions for setting up and using the application.

## Prerequisites

- Docker
- Docker Compose

## Setup Instructions

1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd laravel-app
   ```

2. **Build the Docker image:**
   ```bash
   docker-compose build
   ```

3. **Run the application:**
   ```bash
   docker-compose up -d
   ```

4. **Access the application:**
   Open your browser and navigate to `http://localhost`.

## Directory Structure

- `src/app`: Core application code (models, controllers, middleware).
- `src/bootstrap`: Bootstrap files for the Laravel application.
- `src/config`: Configuration files for the application.
- `src/database`: Database migrations, factories, and seeders.
- `src/public`: Front-facing files, including the entry point.
- `src/resources`: Views, assets, and language files.
- `src/routes`: Route definitions for the application.
- `src/storage`: Compiled templates and generated files.
- `src/tests`: Test cases for the application.
- `docker/Dockerfile`: Instructions for building the Docker image.
- `docker/php.ini`: Custom PHP configuration settings.
- `docker-compose.yml`: Defines services and how to run the application.
- `composer.json`: Lists dependencies for the application.
- `composer.lock`: Locks versions of dependencies.

## Usage

After setting up the application, you can start developing your Laravel application. Use the provided directories to organize your code and assets. 

For more information on Laravel, please refer to the [Laravel documentation](https://laravel.com/docs).