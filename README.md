# Library Management System

Welcome to the **Library Management System**! This Laravel-based application provides a comprehensive solution for managing books, authors, and user borrowing activities.

## Table of Contents

- [Overview](#overview)
- [Installation](#installation)
- [Configuration](#configuration)
- [API Endpoints](#api-endpoints)
- [Testing](#testing)
- [License](#license)

## Overview

This project is designed to manage books, authors, and user interactions in a library setting. Users can register, log in, and perform CRUD operations on books and authors. It includes functionalities for borrowing and returning books.

## Installation

### Clone the Repository

```bash
git clone https://github.com/your-username/library-management-system.git
Navigate to the Project Directory
bash

cd library-management-system
Install Dependencies
bash

composer install
Set Up Environment
bash

cp .env.example .env
php artisan key:generate
Run Migrations
bash

php artisan migrate
Configuration
Update your .env file with the following environment variables:

.env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library_management_system
DB_USERNAME=root
DB_PASSWORD=
Mail Configuration
For email functionality, configure your .env file with mail settings:

.env

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

API Endpoints
Authentication

POST /login - Authenticate and return a token.
POST /register - Register a new user and return a token.

Books

GET /books - List all books with optional search.
POST /books - Create a new book.
PUT /books/{id} - Update a book.
DELETE /books/{id} - Delete a book.

Authors

GET /authors - List all authors.
POST /authors - Create a new author.
PUT /authors/{id} - Update an author.
DELETE /authors/{id} - Delete an author.
Borrowing
POST /books/{bookId}/borrow - Borrow a book.
POST /books/{bookId}/return - Return a borrowed book.

Testing
To run the tests, use the following command:

bash

php artisan test
Test Results
PASS: Tests that passed.
FAIL: Tests that failed.
For detailed test results, refer to the tests directory.

License
This project is licensed under the MIT License - see the LICENSE file for details.
