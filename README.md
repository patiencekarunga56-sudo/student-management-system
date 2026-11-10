#  Student Management System

Student managment system is a Laravel web application for managing students, courses, lecturers and course registrations at a university. It was built for **BUC3131 Advanced Web Application Development, Coursework Two (2026–2027)** at Makerere University Business School.

- Administrators manage students, courses, registrations and user access.
- Lecturers view their assigned courses and the students registered for them.
- Students view available courses and manage their own registrations.

Repository: [https://github.com/patiencekarunga56-sudo/student-management-system.git]

## Group Members

 Name | Reg.No. | GitHub |
|------|----------|----------------|--------|
| Nakawooya Hajarah  |24/U/0926  | Nakawooyahajarah1-jpg |
| Karunga Patience| 24/U/05333/PS | patiencekarunga56-sudo|
| Kitiibwa Merisha | 24/U/06027/PS| 24/U/06027/PS |
| Sebakeera Marvin| 24/U/20005/EVE SBAKEERAMARVIN-coder|
| Rwomushana Macathy| 24/u/10956/ps  | westboyboy373@gmail.com|
|khalil ayyub kimera  | 24/U/05733/PS | 2400705733-sudo 

See `CONTRIBUTIONS.md` for branches, pull requests and individual contributions.

## Features

- Registration, login and logout, with hashed passwords and session regeneration after login
- Role-based access control for Administrator, Lecturer and Student using Spatie roles and permissions
- Account approval: pending lecturer and administrator accounts cannot access protected pages
- Student management (create, view, update, delete)
- Course management (create, view, update, delete) with lecturer assignment
- Course registration with validation and duplicate-registration prevention (checked in code and by a database unique constraint)
- Role-based dashboards and records: students see only their own registrations, and a course roster is shown only to administrators and the lecturer assigned to that course
- Success and error messages, and form validation errors
- Reusable Blade layout with header, navigation, content section and footer; navigation links and actions change with the user's role and permissions

## Tech Stack

- Laravel  and PHP 
- MySQL
- Spatie Laravel Permission (roles and permissions)
- Blade templates, HTML, CSS, JavaScript
- Git and GitHub

## Requirements

- PHP 
- Composer
- MySQL (XAMPP, WAMP or similar)
- Node.js and npm (only if the project uses Vite assets)

## Installation and Database Setup

1. Clone the repository and enter the project folder:

   ```bash
   git clone [repository-url]
   cd [project-folder]
   ```

2. Install dependencies:

   ```bash
   composer install
   npm install && npm run build
   ```

3. Create the environment file and application key:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Create an empty MySQL database (for example `unitrack`) and set your details in `.env`:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=student_managment
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. Run the migrations and seeders:

   ```bash
   php artisan migrate --seed
   ```

   To rebuild the database from scratch at any time:

   ```bash
   php artisan migrate:fresh --seed
   ```

6. Start the application:

   ```bash
   php artisan serve
   ```

   Open http://127.0.0.1:8000 in your browser.

7. (Optional) Run the tests:

   ```bash
   php artisan test
   ```

## User Roles and Sample Login Credentials

The seeders create the accounts below. The password for all seeded accounts is `password`. These are for local demonstration only.

| Role | Email | Password |
|------|-------|----------|
| Administrator | patience@gmail.com | password |
| Lecturer | khalil@gmail.com | password |
| Student | macarthy@gmail.com | password |

Four more sample students are also seeded: [student emails].

### What each role can do

| Role | Permissions |
|------|-------------|
| Administrator | Manage students, courses and registrations; manage user access and approve accounts |
| Lecturer | View assigned courses and the students registered for them |
| Student | View available courses; register for courses; view and cancel their own registrations |

Roles and permissions are created by `RolesAndPermissionsSeeder`. Routes are protected with authentication, approved-status and role/permission middleware, and users cannot view or delete other users' records.

## Database Design

### Tables

| Table | Purpose | Key columns |
|-------|---------|-------------|
| `users` | All accounts (administrators, lecturers and students) | id, name, email, password |
| `courses` | Courses offered | id, [course columns], `lecturer_id` (foreign key to `users`) |
| `registrations` | Links students to courses | id, `user_id`, `course_id` |
| Spatie tables | Roles and permissions | roles, permissions, model_has_roles, role_has_permissions, etc. |

### Constraints

- `courses.lecturer_id` references `users.id`.
- `registrations.user_id` references `users.id` and `registrations.course_id` references `courses.id`.
- A unique index on (`user_id`, `course_id`) prevents the same student registering for the same course twice.
- Deleting a user or a course also deletes the related registrations (cascade).

### Eloquent relationships

| Model | Relationship | Related model |
|-------|--------------|---------------|
| `User` (lecturer) | `hasMany` | `Course` |
| `Course` | `belongsTo` | `User` (lecturer) |
| `User` (student) | `belongsToMany` via `registrations` | `Course` |
| `Course` | `belongsToMany` via `registrations` | `User` (students) |

Examples:

```php
$student->courses;   // courses a student is registered for
$course->students;   // students registered for a course
```

### Design note

Students are `User` records that have the **Student** role. There is no separate `students` table. This keeps authentication, roles and permissions in one place, and registrations link directly to users.

## Seeded Data

Running `php artisan migrate --seed` creates:

- Roles and permissions (Administrator, Lecturer, Student)
- One administrator, one lecturer and five students
- Four courses
- Sample course registrations

Seeders use `firstOrCreate` and `updateOrCreate`, so running them again does not create duplicate sample records.

## Project Structure

| Path | Contents |
|------|----------|
| `database/migrations` | Table definitions |
| `database/seeders` | `DatabaseSeeder`, `RolesAndPermissionsSeeder` |
| `app/Models` | `User`, `Course` and their relationships |
| `app/Http/Controllers` | `AuthController`, `StudentController`, `CourseController`, `LecturerController`, `RegistrationController` |
| `routes/web.php` | Application routes and middleware |
| `resources/views` | Blade layout and views for students, courses, registrations and dashboards |
| `tests` | Automated tests |



## Screenshots

Screenshots of the working application are in the `screenshots/` folder:
The screenshots are available in the screetshot folder under assets there is a word document that consists of the screenshoots for Login/sign in page, registration page, Admin Dashboard, Student managment,Course managment etc.
 

## Contribution Report

Member:Karunga Patience 
Reg.No:24/U/05333
GitHub Username 'patiencekarunga56-sudo'
Assigned Task :
•	Design the MySQL database structure.
•	Create and manage Laravel migrations.
•	Create tables such as users, students, courses and departments.
•	Define primary keys, foreign keys and table relationships.
•	Ensure database integrity and consistency.
•	Test migrations to ensure successful table creation.

Member:Nakawooya Hajarah
Reg.No:24/U/0926
GitHub Username 'Nakawooyahajarah1-jpg'
Assigned Task :
•	Design user interfaces using Laravel Blade, HTML, CSS, Bootstrap and JavaScript.
•	Develop the system dashboard and navigation menus.
•	Design registration and login pages.
•	Develop student management forms and tables.
•	Create interfaces for viewing and editing student records.
•	Ensure the system is responsive and user-friendly.
creating controllers and modells

Member:khalil ayyub kimera 
Reg.No:24/U/05733/PS
GitHub Username '2400705733-sudo'
Assigned Task :
•	Configure and manage application routes in routes/web.php.
•	Organise routes for different system functionalities.
•	Implement user roles such as Administrator, Lecturer and Student, according to system requirements.
•	Configure roles and permissions.
•	Implement middleware to restrict access to protected pages.
•	Ensure users can only access functionalities permitted by their roles.

Member:KITIIBWA MERISHA
Reg.No:24/U/06027/PS
GitHub Username 'Merisha256'
Assigned Task :
•	Configure database connection settings in the .env file.
•	Establish the connection between Laravel and MySQL.
•	Configure database settings in config/database.php where necessary.
•	Troubleshoot database connection errors.
•	Ensure successful communication between the application and database.
•	Assist with database integration.

Member:sabakeera Marvin
Reg.No:24/U/20005/Eve
GitHub Username ''
Assigned Task :
•	Design the MySQL database structure.
•	Create and manage Laravel migrations.
•	Create tables such as users, students, courses and departments.
•	Define primary keys, foreign keys and table relationships.


Member: rwomushana Macarthy
Reg.No: 24/u/10956/ps
GitHub Username 'westboyboy373@gmail.com'
Assigned Task :
•	Create and manage Laravel database seeders.
•	Insert sample student, user, course and department records.
•	Create default user accounts for testing.
•	Test database seeding and ensure sample data is correctly inserted.
Create and manage Laravel database seeders and assist on UI.
 

Summary of Contributions
Patience: built the controllers and CRUD operations with validation.
Marcarthy: created the migrations and table relationships.
Hajarah: built the Blade layout, dashboard, navigation and forms.
Khalil: set up routes, roles, permissions and middleware.
Merisha: configured the database connection.
Marvin: wrote the seeders and tested the system.




## 2. Branches

| Branch  | Owner |
|--------|-------|
| `main` | Whole group |
| `hajjarah` | Nakawooya Hajarah
| `khalil` | khalil ayyub kimera 
| `patience` | Karunga Patience
| `merisha` | KITIIBWA MERISHA
| `marvin` | Sabakeera Marvin 
| `Macathy` |Rwomushana Macathy



