<h1>Job Portal API</h1>
<h2>Project Overview</h2>
<p>This project is a Laravel-based job portal API using Sanctum for authentication. It follows the Repository and Service Patterns for clean and maintainable code.</p>

<hr>

<h2>Features</h2>
<h3>- User authentication with Laravel Sanctum</h3>
<h3>- Repository and Service Patterns for clean architecture</h3>
<h3>- Job API with filtering, sorting, and searching</h3>
<h3>- Migrations, Factories, and Seeders for database setup</h3>
<h3>- Well-documented API with Postman Collection</h3>

<hr>

<h2>Setup Instructions</h2>
<h3>1. Clone the Repository</h3>
<p>git clone https://github.com/Ezzeldien-M-Abdalaziz/ASTUDIO.git</p>
<p>cd job-portal-api</p>

<h3>2. Install Dependencies</h3>
<p>composer install</p>

<h3>3. Set Up Environment</h3>
<p>cp .env.example .env</p>
<p>php artisan key:generate</p>
<p>Update the .env file with your database credentials.</p>

<h3>4. Run Migrations and Seeders</h3>
<p>php artisan migrate --seed</p>

<h3>5. Serve the Application</h3>
<p>php artisan serve</p>

<hr>
<hr>

<h2>Authentication</h2>
<h3>Default Admin Credentials</h3>
<h3>Email: ezz@example.com</h3>
<h3>Password: password</h3>

<h3>Login API</h3>
<h3>Endpoint: POST /api/login</h3>

<h3>Request Body:</h3>
<p>{ "email": "ezz@example.com", "password": "password" }</p>

<h3>Response:</h3>
<p>{ "token": "your-access-token" }</p>

<h3>Use the token for authenticated requests:</h3>
<p>Authorization: Bearer your-access-token</p>

<hr>

<h3>Available Filters:</h3>
<h3>- title (partial match)</h3>
<h3>- company_name (partial match)</h3>
<h3>- salary_min / salary_max (comparisons)</h3>
<h3>- is_remote, status, job_type (exact match)</h3>
<h3>- published_at, created_at (date comparisons)</h3>
<h3>- locations, languages, categories (relationship filters)</h3>

<hr>

<h2>API Documentation & Postman Collection</h2>
<h3>A Postman Collection is included for testing.</h3>
<h3>Import the file: postman_collection.json into Postman.</h3>

<hr>

<h2>Assumptions & Design Decisions</h2>
<h3>- Used Laravel Sanctum for API authentication</h3>
<h3>- Followed Repository & Service Patterns for maintainability</h3>
<h3>- Applied Eloquent Relationships for job attributes</h3>
<h3>- Seeded database with factories for testing purposes</h3>


