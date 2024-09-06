<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Documentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        h1, h2, h3 {
            color: #333;
        }
        h1 {
            margin-top: 0;
        }
        code {
            background: #e0e0e0;
            padding: 2px 4px;
            border-radius: 4px;
            font-size: 0.9em;
        }
        pre {
            background: #e0e0e0;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }
        .section {
            background: #fff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .section h2 {
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .section code {
            background: #f9f9f9;
            border: 1px solid #ddd;
            padding: 2px 4px;
            border-radius: 4px;
        }
        .section ul {
            list-style: none;
            padding: 0;
        }
        .section ul li {
            margin: 10px 0;
        }
        .section pre {
            font-size: 1em;
        }
        footer {
            text-align: center;
            padding: 10px 0;
            background: #333;
            color: #fff;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Library Management System</h1>
        </div>
    </header>

    <div class="container">
        <div class="section">
            <h2>Overview</h2>
            <p>Welcome to the Library Management System! This Laravel-based application provides a comprehensive solution for managing books, authors, and user borrowing activities. Users can register, log in, and perform CRUD operations on books and authors.</p>
        </div>

        <div class="section">
            <h2>Installation</h2>
            <h3>Clone the Repository</h3>
            <pre><code>git clone https://github.com/your-username/library-management-system.git</code></pre>

            <h3>Navigate to the Project Directory</h3>
            <pre><code>cd library-management-system</code></pre>

            <h3>Install Dependencies</h3>
            <pre><code>composer install</code></pre>

            <h3>Set Up Environment</h3>
            <pre><code>cp .env.example .env</code></pre>
            <pre><code>php artisan key:generate</code></pre>

            <h3>Run Migrations</h3>
            <pre><code>php artisan migrate</code></pre>

            <h3>Start the Development Server</h3>
            <pre><code>php artisan serve</code></pre>
        </div>

        <div class="section">
            <h2>Configuration</h2>
            <h3>Database Configuration</h3>
            <pre><code># .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library_management
DB_USERNAME=root
DB_PASSWORD=
</code></pre>

            <h3>Mail Configuration</h3>
            <pre><code># .env file
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=from@example.com
MAIL_FROM_NAME="${APP_NAME}"
</code></pre>
        </div>

        <div class="section">
            <h2>API Endpoints</h2>
            <h3>Authentication</h3>
            <h4>Register User</h4>
            <pre><code>POST /register

Request Body:
{
    "name": "User Name",
    "email": "user@example.com",
    "password": "password",
    "password_confirmation": "password"
}

Response:
{
    "token": "your_generated_token"
}
</code></pre>

            <h4>Login User</h4>
            <pre><code>POST /login

Request Body:
{
    "email": "user@example.com",
    "password": "password"
}

Response:
{
    "token": "your_generated_token"
}
</code></pre>

            <h4>Logout User</h4>
            <pre><code>POST /logout

Headers:
Authorization: Bearer your_generated_token

Response: 204 No Content</code></pre>

            <h3>Books</h3>
            <h4>Create Book</h4>
            <pre><code>POST /books

Request Body:
{
    "title": "Book Title",
    "author_id": 1,
    "isbn": "9780743273565",
    "published_at": "1925-04-10",
    "status": "available"
}

Response: 201 Created</code></pre>

            <h4>Get Books</h4>
            <pre><code>GET /books

Query Parameters:
search: Optional search term

Response: Paginated list of books</code></pre>

            <h4>Update Book</h4>
            <pre><code>PUT /books/{id}

Request Body:
{
    "title": "Updated Book Title",
    "author_id": 1,
    "isbn": "9780743273565",
    "published_at": "1925-04-10",
    "status": "available"
}

Response: 200 OK</code></pre>

            <h4>Delete Book</h4>
            <pre><code>DELETE /books/{id}

Response: 204 No Content</code></pre>

            <h3>Authors</h3>
            <h4>Create Author</h4>
            <pre><code>POST /authors

Request Body:
{
    "name": "Author Name",
    "birthdate": "1980-01-01",
    "bio": "Author biography."
}

Response: 201 Created</code></pre>

            <h4>Get Authors</h4>
            <pre><code>GET /authors

Response: Paginated list of authors</code></pre>

            <h4>Update Author</h4>
            <pre><code>PUT /authors/{id}

Request Body:
{
    "name": "Updated Author Name",
    "birthdate": "1980-01-01",
    "bio": "Updated biography."
}

Response: 200 OK</code></pre>

            <h4>Delete Author</h4>
            <pre><code>DELETE /authors/{id}

Response: 204 No Content</code></pre>
        </div>

        <div class="section">
            <h2>Testing</h2>
            <h3>Run Unit and Feature Tests</h3>
            <pre><code>php artisan test</code></pre>

            <h3>Test Authentication and Registration</h3>
            <p>Use Postman or any API testing tool to verify registration and login functionalities. Ensure you receive the expected JSON responses and status codes.</p>
        </div>

        <div class="section">
            <h2>License</h2>
            <p>This project is licensed under the MIT License. See the <a href="LICENSE">LICENSE</a> file for details.</p>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Library Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>
