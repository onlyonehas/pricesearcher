**INSTALLATION PROCESS**

1. clone the repository to your desired location

2. run `composer install` to install all the dependicies 

3. set up a `local database`
   
    (You may be required to change the configuration in `.env` file line 13)
    
    I used windows `xampp phpmyadmin 127.0.0.1:3306` 

4. run `php bin/console doctrine:migrations:migrate`

5. run `php bin/console server:start`
