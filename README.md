
### Overview
This project is built using the Laravel framework, leveraging its powerful features to create a robust and scalable web application.

### Key Features
1. **User Authentication**: Secure login and registration system.
2. **CRUD Operations**: Full Create, Read, Update, and Delete functionality for managing data.
4. **Database Integration**: Utilizes Laravel's Eloquent ORM for efficient database operations.
5. **Form Validation**: Server-side validation to ensure data integrity.
6. **Responsive Design**: Mobile-friendly interface for optimal user experience across devices.

### Technical Specifications
- **Framework**: Laravel 11.x
- **PHP Version**: 8.1+
- **Database**: MySQL 5.7+
- **Front-end**: Blade templating engine with Bootstrap 5
- **Authentication**: Laravel Breeze authentication

### Installation
1. Clone the repository:
   ```sh
   git clone <repository-url>
   ```
2. Navigate to the project directory:
   ```sh
   cd <project-directory>
   ```
3. Install the dependencies:
   ```sh
   composer install
   ```
4. Copy `.env.example` to `.env` and configure your environment variables:
   ```sh
   cp .env.example .env
   ```
5. Generate the application key:
   ```sh
   php artisan key:generate
   ```
6. Run the database migrations:
   ```sh
   php artisan migrate
   ```
7. Start the development server:
   ```sh
   php artisan serve
   ```

### Usage
- Access the application at `http://localhost:8000`
- to access the admin privliged pages go to `http:localhost:8000/admin/register` for the first time then `http:localhost:8000/admin/login`
- To generate fake data for testing and development, run the following commands:
  ```sh
  php artisan tinker
  ```
  ```sh
  App\Models\Service::factory(100)->create();
  ```
  ```sh
  App\Models\Decision::factory(100)->create();
  ```
  ```sh
  App\Models\Activity::factory()->count(100)->create();
  ```
  ```sh 
  App\Models\News::factory()->count(100)->create();
  ```
  This will create 100 fake entries each for Services, Decisions, Activities, and News.


### License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
