# EnUygun-E-Commerce-Symfony-MySql
Enuygun PHP Bootcamp Graduation Project


Technologies Used and Versions


    -> Php 8.0.0
    -> Composer 2.3.8
    -> Symfony 5.4
    -> MySql 10.4.17 
    

To make the system work, we open our downloaded file folder via ide or text editor. Then we download the packages we need to use through Composer.

    -> composer install
     
At the end of this process, the vendor and var folders are added to our folder. Then we run our server for our database operations. For our database operations, please update our DATABASE_URL variable on our .env page to suit you. Then we enter the commands in our terminal to create our current model information and database in the migrations folder.

    -> php bin/console doctrine:database:create
    -> php bin/console make:migration
    -> php bin/console doctrine:migrations:migrate
    
The necessary database and tables for the system were created.

    -> symfony server:start 

We run the project using the above command and if we have followed every step correctly, it goes to the "Home Page" page at https://127.0.0.1:8000/. By default, a user with the user role is created for login to the panel and its information is:
  
    -> test@test.com pass= 123456 

Admin username and password

    -> tanerculha@outlook.com.tr pass= 123456 

Our system is currently working. After that, you can add, delete, update categories, products and users on the panel.