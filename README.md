# Docker & Laravel Installation and Container Setup Guide
## 1. Docker Installation
To get started with Docker, you need to install it on your system.
1. Download and install Docker.
2. Launch Docker after installation.
3. Ensure Docker is working correctly by running the following command in your terminal:
```bash
docker --version
```
## 2. Download Docker Configuration
After installing Docker, you need to download the initial configuration for Docker and Laravel. Follow these steps:
1. Clone the repository or navigate to your project directory:
```bash
git clone https://github.com/MarooDev/laravel
cd laravel
```
## 3. Build and Start Docker Containers
After cloning the repository and checking out the first commit, you need to build and start the Docker containers. Follow these steps:
```bash
git checkout <first_commit_hash>
```
1. Build the Docker images using the following command:
```bash
docker-compose build
```
2. Start the containers in detached mode:
```bash
docker-compose up -d
```
## 4. Install Laravel and Configure the Project
Before pulling the changes with your Laravel-specific configurations, you'll need to install Laravel and set up the project. Follow these steps:
1. Install the project dependencies. First, enter the Laravel container:
```bash
docker exec -it laravel_app bash
```
2. Install Laravel using Composer:
```bash
composer create-project --prefer-dist laravel/laravel temp-laravel
```
3. Move the files from the `temp-laravel` directory to the main project directory and remove the temporary directory using the following command:
```bash
mv temp-laravel/* temp-laravel/.* ./ 2>/dev/null && rmdir temp-laravel
```
4. Run Composer to install PHP dependencies:
```bash
composer install
```
5. Install NPM dependencies:
```bash
npm install
```
6. Set the correct permissions for the storage directory:
```bash
chmod -R 775 storage
chown -R www-data:www-data storage
```
7. Generate the application key:
```bash
php artisan key:generate
```
## 5. Pull the Latest Changes with Laravel-Specific Modifications
Once Laravel is installed and configured, you can now pull the second commit that contains your Laravel-specific changes:
1. Checkout the second commit with the changes:
```bash
git checkout <last_commit_hash>
```
2. Verify that the Laravel-specific modifications are applied, including configuration files, routes, and other necessary changes.
