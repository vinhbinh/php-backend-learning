# PHP Backend REST API
Simple RESTful API built with pure PHP using MVC architecture.
Includes authentication, authorization, and CRUD operations.

## Tech Stack
- PHP (OOP, MVC)
- MySQL
- PDO
- REST API
- Token-based Authentication
- Git & GitHub

## Features
- User registration & login
- Token-based authentication
- Middleware authorization
- CRUD users
- Protected routes

## Project Structure
src/
├── controllers
├── models
├── core
├── routes
├── config
public/
└── index.php

## Installation

1. Clone repository
- Git clone https://github.com/vinhbinh/php-backend-learning.git

2. Import database
- Create MySQL database
- Import SQL file

3. Configure database
- Update database config in config/database.php

4. Run project
- Use PHP built-in server:
php -S localhost:8000 -t public

## API Endpoints
POST /register
POST /login
GET /users (protected)

## Authentication
Use Bearer Token in Authorization header:
Authorization: Bearer <token>

## Notes
This project is for learning purposes and junior backend practice.