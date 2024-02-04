eLearning Platform
----------------------

This website is a responsive and user-friendly platform used for online learning.

Technologies Used
------------------
1. Laravel
2. MySQL

Functionality
----------------

1. Users must first log in or register for an account.
2. Once logged in, users can access the dashboard where they can add courses to their cart.
3. Upon adding a course, an email notification is sent to the logged-in email address.
4. Users can then view and watch their selected courses.

Project Setup
----------------
1. Clone the project repository.
2. Set up the `.env` file by copying the `env.example` file and adding necessary SMTP credentials.
3. After setting up the database, run:
    ```
    php artisan key:generate
    ```

4. To set up the project, run the following command:
    ```
    php artisan setup:project
    ```

5. Finally, run the project using:
    ```
    php artisan serve
    ```
