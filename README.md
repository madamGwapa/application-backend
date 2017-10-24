# application-backend

<h3> This app uses Laravel 5.5 as the PHP framework </h3>

<h5>Steps on how to install </h5>

1. Install laravel in your machine. You can refer to <a href="https://laravel.com/docs/5.5"> for more information.
2. Open the project in your terminal and run <b>composer update </b>.
3. In the project folder, copy and paste the file named <b>env.example</b> and name it <b>.env</b>
4. Open the <b>.env</b> file and change the settings of the database.
5. Open <b>PHPMyAdmin</b> and create a database with the same name as to the database name in the .env file.
6.In the terminal, run the command <b>php artisan key:generate</b> to generate the app key.
7. In the terminal, run the command <b>php artisan migrate</b> to create the tables in your database.
8. To check for the routes, run the <b>php artisan route:list</b> in the terminal.
9. To run a test for the app, run the command <b>phpunit</b> in the terminal. If it doesn't work, try running the command <b>vendor\\bin\\phpunit</b> instead.
10. To run the app, run the command <b>php artisan serve</b> in the terminal. The default URL would be <b>localhost:8000</b>

<h5>To populate the database</h5>

1. In the terminal, run the command <b>php artisan tinker</b>
2. To create a dummy data for the folder table, run the command <b>factory('App\Folder',10)->create()</b>.
2. To create a dummy data for the workpaper table, run the command <b>factory('App\Workpaper',10)->create()</b>
