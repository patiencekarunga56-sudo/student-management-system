Student Management System
A web-based Student Management System developed using Laravel 11, MySQL, Spatie Laravel-Permission, and Tailwind CSS. The application provides dedicated portals for students, staff, and administrators, with role-based access control and academic course management.
🛠️ Installation Guide
Follow these steps to set up and run the project locally.
1. Clone the Repository
git clone YOUR_REPOSITORY_URL
cd YOUR_REPO_NAME
2. Install Dependencies
composer install
npm install
npm run build
3. Configure Environment
Copy the example environment file:
cp .env.example .env
Generate the application key:
php artisan key:generate
Configure your MySQL database details in the .env file:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
Create the database in MySQL before proceeding.
4. Run Migrations and Seeders
php artisan migrate:fresh --seed
Note: This command resets existing database tables and inserts the default system records.
5. Start the Application
php artisan serve
Open your browser and visit:
http://127.0.0.1:8000
________________________________________
🔐 Default Login Credentials
Use the following accounts to access the different system portals:
Role	Email	Password
Student	macarthy@gmail.com
password
Staff	khalil@gmail.com
password
Admin	patience@gmail.com
password
Security Note: These credentials are for local development and testing only. Change the default passwords before production deployment.
________________________________________
💻 Technologies Used
•	Laravel 11
•	PHP
•	MySQL
•	Spatie Laravel-Permission
•	Tailwind CSS
•	Blade Templates
•	Git & GitHub
________________________________________
Developed for academic coursework, practical demonstration, and individual presentation.

