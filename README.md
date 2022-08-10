# EnUygun-E-Commerce-Symfony-PHP-MySql
EnUygun PHP Bootcamp Graduation Project

Note: The database is in the "Database" folder.

Technologies Used and Versions


    -> Php 8.0.0
    -> Composer 2.3.8
    -> Symfony 5.4
    -> MySql 10.4.17 
    

To make the system work, we open our downloaded file folder via ide or text editor. Then we download the packages we need to use through Composer.

    -> composer install
     
At the end of this process, the vendor and var folders are added to our folder. Then we run our server for our database operations. For our database operations, please update our DATABASE_URL variable on our .env page to suit you. Then we enter the commands in our terminal to create our current model information and database in the migrations folder.

    -> .env ---> DATABASE_URL="mysql://root:@127.0.0.1:3306/e_commerce?serverVersion=mariadb-10.4.17"
    -> php bin/console doctrine:database:create
    -> php bin/console make:migration
    -> php bin/console doctrine:migrations:migrate
    
The necessary database and tables for the system were created.

    -> symfony server:start 

We run the project using the above command and if we have followed every step correctly, it goes to the "Home Page" page at https://127.0.0.1:8000/. 
<br>
<br>Username and password for "Login";
  
    -> test@test.com pass= 123456 

Username and password for "admin";

    -> tanerculha@outlook.com.tr pass= 123456 

To access the "Admin" panel;

    -> http://127.0.0.1:8000/admin

Our system is currently working. After that, you can add, delete, update categories and products on the panel. 

For "Register";

    -> http://127.0.0.1:8000/user_register
   
New records are assigned as "USER_ROLE". You can give "USER_ADMIN" authorization from database.

The index page where the product is listed.

    -> http://127.0.0.1:8000/

This is the page where the products in the basket are listed.

    -> http://127.0.0.1:8000/carts

If there is a product in the cart, the shopping completion page, that is, the purchase page;
On the far right of the "cart" page, the total price of the products in the cart is written. This is also a button, when we click on it, the purchase will take place.
Example;

    -> http://127.0.0.1:8000/buy?totalPrice=105000
