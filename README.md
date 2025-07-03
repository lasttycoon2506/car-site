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


## Features Pictures
### Home
![Screenshot 2025-07-03 113033](https://github.com/user-attachments/assets/9ccea27d-f89e-4898-933a-822e92098579)

### Filter
![Screenshot 2025-07-03 115637](https://github.com/user-attachments/assets/ace4b119-e475-4550-9b3f-2d54d0aa8ab2)

### Create User
![Screenshot 2025-07-03 115938](https://github.com/user-attachments/assets/fcaafc52-3b1b-4dc8-bfe8-dc34c9a0598c)








