# Install Book Management System
1. Clone the repo from git.
2. run composer install 
3. change db crendentials in .env file 
4. run php artisan migrate
5. run php artisan key:generate
6. run php artisan serve

# Seed Data in Book table
1. run php artisan db:seed ( this will create 10 records in book table )

# Overview
1. Used Laravel Breeze for authentication Login and register and for frontend
2. after login you will see books list with Title, author, rating, creation date, rate this book ( for add rating ), add comment, view comments
3. Rate this book column - here you will see dropdowm of rating from 1 to 5, select rating and submit with Rate button than you will see rating in Rating colum.
4. Add Comment column - here you will redirect to new page with particular book there you will see a comment form to add comment - fill that form and submit 
5. View Comments Column - here you will redirect to comments page where you will see all comments on that book with book details.

# Packages Used
1. Laravel Breeze - for authentication , Login & Register and for front end
2. Seeder and Factory  -  for adding some dummy books to database
3. Repository Design pattern - for listing the books 
4. Factories Design pattern - for adding and listing comments
5. Custom Service
6. Migrations - for creating tables - books, rating, comments with relationships to each other



