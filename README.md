# Car Website

Buy and sell cars using Vue/Tailwind/Typescript/PHP/Laravel/MySQL (Docker)

## Features
-View/Filter cars
-Create/Login to account
-Sell cars
-Make offer(s) for cars
-Edit/Delete cars
-View/Read notifications
-Upload car images to Cloudinary

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
   configure your environment variables in a .env file

5. **Run migrations**:
   ```
   docker-compose exec php php artisan migrate
   ```


