Library Management System
Overview
The Library Management System is a Laravel-based application designed to manage books, authors, and user borrowing activities. It provides functionalities for user registration, authentication, and CRUD operations for books and authors.

Table of Contents
Installation
Configuration
API Endpoints
Testing
License
Installation
Clone the repository:

bash

git clone https://github.com/your-username/library-management-system.git
Navigate to the project directory:

bash

cd library-management-system
Install dependencies:

bash

composer install
Copy the example environment file:

bash
Копировать код
cp .env.example .env
Generate an application key:

bash
Копировать код
php artisan key:generate
Run migrations:

bash
Копировать код
php artisan migrate
Start the development server:

bash
Копировать код
php artisan serve
Configuration
Database Configuration

Update the .env file with your database credentials:

env
Копировать код
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library_management
DB_USERNAME=root
DB_PASSWORD=
Mail Configuration

Configure your mail settings in the .env file:

env
Копировать код
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=from@example.com
MAIL_FROM_NAME="${APP_NAME}"
API Endpoints
Authentication
Register User

Endpoint: POST /register

Request Body:

json
Копировать код
{
    "name": "User Name",
    "email": "user@example.com",
    "password": "password",
    "password_confirmation": "password"
}
Response:

json
Копировать код
{
    "token": "your_generated_token"
}
Login User

Endpoint: POST /login

Request Body:

json
Копировать код
{
    "email": "user@example.com",
    "password": "password"
}
Response:

json
Копировать код
{
    "token": "your_generated_token"
}
Logout User

Endpoint: POST /logout

Headers:

text
Копировать код
Authorization: Bearer your_generated_token
Response: 204 No Content

Books
Create Book

Endpoint: POST /books

Request Body:

json
Копировать код
{
    "title": "Book Title",
    "author_id": 1,
    "isbn": "9780743273565",
    "published_at": "1925-04-10",
    "status": "available"
}
Response: 201 Created

Get Books

Endpoint: GET /books

Query Parameters:

search: Optional search term
Response: Paginated list of books

Update Book

Endpoint: PUT /books/{id}

Request Body:

json
Копировать код
{
    "title": "Updated Book Title",
    "author_id": 1,
    "isbn": "9780743273565",
    "published_at": "1925-04-10",
    "status": "available"
}
Response: 200 OK

Delete Book

Endpoint: DELETE /books/{id}
Response: 204 No Content
Authors
Create Author

Endpoint: POST /authors

Request Body:

json
Копировать код
{
    "name": "Author Name",
    "birthdate": "1980-01-01",
    "bio": "Author biography."
}
Response: 201 Created

Get Authors

Endpoint: GET /authors
Response: Paginated list of authors
Update Author

Endpoint: PUT /authors/{id}

Request Body:

json
Копировать код
{
    "name": "Updated Author Name",
    "birthdate": "1980-01-01",
    "bio": "Updated biography."
}
Response: 200 OK

Delete Author

Endpoint: DELETE /authors/{id}
Response: 204 No Content
Testing
Run Unit and Feature Tests:

bash
Копировать код
php artisan test
Ensure that your tests are passing and that any failing tests are debugged accordingly.

Test Authentication and Registration:

Use Postman or any API testing tool to test the registration and login endpoints, verifying that you receive the expected JSON responses and status codes.

License
This project is licensed under the MIT License. See the LICENSE file for details.
