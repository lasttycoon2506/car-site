# Laravel Application

This is a Laravel application setup with Docker, including PHP and MySQL.

## Project Structure

- **src/**: Contains the main application code.
  - **app/**: Application logic, including controllers and models.
  - **bootstrap/**: Files that bootstrap the Laravel application.
  - **config/**: Configuration files for various aspects of the application.
  - **database/**: Database-related files, including migrations and seeders.
  - **public/**: Public-facing files, including the entry point `index.php`.
  - **resources/**: Views, raw assets, and language files.
  - **routes/**: Route definitions for handling requests.
  - **storage/**: Compiled templates, sessions, and caches.
  - **tests/**: Test files for unit and feature testing.
  - **composer.json**: Composer configuration file listing dependencies.

- **docker/**: Contains Docker-related files.
  - **mysql/**: MySQL configuration.
    - **my.cnf**: MySQL configuration settings.
  - **php/**: PHP Dockerfile for building the PHP image.
    - **Dockerfile**: Instructions to build the PHP Docker image.

- **.env.example**: Example environment configuration file.

- **docker-compose.yml**: Defines services, networks, and volumes for the Docker application.

## Setup Instructions

1. **Clone the repository**:
   ```
   git clone <repository-url>
   cd laravel-app
   ```

2. **Build and run the Docker containers**:
   ```
   docker-compose up -d
   ```

3. **Install Composer dependencies**:
   ```
   docker-compose exec php composer install
   ```

4. **Set up the environment file**:
   Copy `.env.example` to `.env` and configure your environment variables.

5. **Generate the application key**:
   ```
   docker-compose exec php php artisan key:generate
   ```

6. **Run migrations**:
   ```
   docker-compose exec php php artisan migrate
   ```

## Usage

Access the application at `http://localhost` after starting the Docker containers. 

## Contributing

Feel free to submit issues or pull requests for improvements or bug fixes.