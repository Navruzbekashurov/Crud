# Restaurant Management System

A Laravel-based restaurant management system with MySQL database.

## Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js and npm
- Docker and Docker Compose

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd <project-directory>
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install JavaScript dependencies:
```bash
npm install
```

4. Copy the environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

## Database Setup

1. Start MySQL container:
```bash
docker-compose up -d restaurant-db
```

2. Update your `.env` file with the following database settings:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=33060
DB_DATABASE=restaurant
DB_USERNAME=myuser
DB_PASSWORD=mypassword
```

3. Run database migrations:
```bash
php artisan migrate
```

## Running the Application

1. Start the Laravel development server:
```bash
php artisan serve
```

2. In a new terminal, start the Vite development server:
```bash
npm run dev
```

3. Access the application at:
- Frontend: http://localhost:8000
- MySQL: localhost:33060

## Docker Commands

- Start MySQL: `docker-compose up -d restaurant-db`
- Stop MySQL: `docker-compose down`
- View logs: `docker-compose logs -f restaurant-db`
- Access MySQL shell: `docker exec -it restaurant-mysql mysql -u myuser -p`

## Development

- Run tests: `php artisan test`
- Clear cache: `php artisan cache:clear`
- View routes: `php artisan route:list`

## License

This project is licensed under the MIT License.
