<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal API Documentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            line-height: 1.6;
        }
        h1, h2, h3 {
            color: #333;
        }
        code {
            background-color: #f4f4f4;
            padding: 5px;
            border-radius: 5px;
            font-size: 14px;
        }
        pre {
            background: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background: #f8f8f8;
        }
        .container {
            max-width: 900px;
            margin: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Job Portal API</h1>
    <p>This project is a Laravel-based job portal API using <strong>Sanctum</strong> for authentication. It follows the <strong>Repository Pattern</strong> and <strong>Service Pattern</strong> for clean and maintainable code.</p>

    <h2>🚀 Features</h2>
    <ul>
        <li>User authentication with <strong>Laravel Sanctum</strong></li>
        <li><strong>Repository and Service Patterns</strong> for clean architecture</li>
        <li><strong>Job API</strong> with filtering, sorting, and searching</li>
        <li><strong>Migrations, Factories, and Seeders</strong> for database setup</li>
        <li>Well-documented API with <strong>Postman Collection</strong></li>
    </ul>

    <h2>🛠️ Setup Instructions</h2>
    <h3>1️⃣ Clone the Repository</h3>
    <pre><code>git clone https://github.com/yourusername/job-portal-api.git
cd job-portal-api</code></pre>

    <h3>2️⃣ Install Dependencies</h3>
    <pre><code>composer install</code></pre>

    <h3>3️⃣ Set Up Environment</h3>
    <pre><code>cp .env.example .env
php artisan key:generate</code></pre>
    <p>Update the <code>.env</code> file with your database credentials.</p>

    <h3>4️⃣ Run Migrations and Seeders</h3>
    <pre><code>php artisan migrate --seed</code></pre>

    <h3>5️⃣ Serve the Application</h3>
    <pre><code>php artisan serve</code></pre>

    <h2>🔑 Authentication</h2>
    <h3>Default Admin Credentials</h3>
    <ul>
        <li><strong>Email:</strong> ezz@example.com</li>
        <li><strong>Password:</strong> password</li>
    </ul>

    <h3>Login API</h3>
    <p><strong>Endpoint:</strong> <code>POST /api/login</code></p>
    <pre><code>{
  "email": "ezz@example.com",
  "password": "password"
}</code></pre>

    <h3>Response:</h3>
    <pre><code>{
  "token": "your-access-token"
}</code></pre>
    <p>Use the token for authenticated requests by adding it to the <code>Authorization</code> header:</p>
    <pre><code>Authorization: Bearer your-access-token</code></pre>

    <h2>📌 API Endpoints</h2>
    <table>
        <tr>
            <th>Method</th>
            <th>Endpoint</th>
            <th>Description</th>
            <th>Auth Required</th>
        </tr>
        <tr>
            <td>POST</td>
            <td>/api/register</td>
            <td>Register a new user</td>
            <td>❌</td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/api/login</td>
            <td>Login and get token</td>
            <td>❌</td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/api/logout</td>
            <td>Logout user</td>
            <td>✅</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/api/jobs</td>
            <td>Get job listings</td>
            <td>❌</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/api/jobs/{id}</td>
            <td>Get job details</td>
            <td>❌</td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/api/jobs</td>
            <td>Create a new job</td>
            <td>✅ (Admin)</td>
        </tr>
        <tr>
            <td>PUT</td>
            <td>/api/jobs/{id}</td>
            <td>Update a job</td>
            <td>✅ (Admin)</td>
        </tr>
        <tr>
            <td>DELETE</td>
            <td>/api/jobs/{id}</td>
            <td>Delete a job</td>
            <td>✅ (Admin)</td>
        </tr>
    </table>

    <h2>🔍 Filtering and Searching</h2>
    <p>You can filter jobs using query parameters:</p>
    <pre><code>GET /api/jobs?filter[title]=developer&filter[company_name]=Google</code></pre>

    <h3>Available Filters:</h3>
    <ul>
        <li><code>title</code> (partial match)</li>
        <li><code>company_name</code> (partial match)</li>
        <li><code>salary_min</code> / <code>salary_max</code> (<code>></code>, <code><</code>, <code>>=</code>, <code><=</code>)</li>
        <li><code>is_remote</code>, <code>status</code>, <code>job_type</code> (exact match)</li>
        <li><code>published_at</code>, <code>created_at</code> (date comparisons)</li>
        <li><code>locations</code>, <code>languages</code>, <code>categories</code> (relationship filters)</li>
    </ul>

    <h2>📄 API Documentation & Postman Collection</h2>
    <p>A <strong>Postman Collection</strong> is included for easy testing.</p>
    <p>Import the file: <code>postman_collection.json</code> into Postman.</p>

    <h2>🤔 Assumptions & Design Decisions</h2>
    <ul>
        <li>Used <strong>Laravel Sanctum</strong> for API authentication</li>
        <li>Followed <strong>Repository & Service Patterns</strong> for maintainability</li>
        <li>Applied <strong>Eloquent Relationships</strong> for job attributes</li>
        <li>Implemented <strong>EAV model for dynamic job attributes</strong></li>
        <li>Seeded database with <strong>factories for testing purposes</strong></li>
    </ul>

    <h2>📜 License</h2>
    <p>This project is licensed under the MIT License.</p>

    <h2>💡 Author</h2>
    <p><strong>Ezzeldien</strong><br>
    GitHub: <a href="https://github.com/yourusername">yourusername</a></p>
</div>

</body>
</html>
