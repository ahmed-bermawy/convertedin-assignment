# <p align="center">Convertedin Assignment</p>

## Setup Instructions

1. Clone the repository by run `git clone git@github.com:ahmed-bermawy/convertedin-assignment.git`
2. Run `composer install`
3. Run `php artisan key:generate`
4. Create a new database and update the `.env` file with the database credentials 
5. Run `php artisan cache:clear`
6. Run `php artisan migrate`
7. Run `php artisan db:seed`
8. Run `npm install`
9. Run `npm run dev`
10. Run `php artisan serve`
11. After installation is finished you can access the application on `http://localhost:8000/`


## Docker Setup Instructions

1. Clone the repository by run `git clone git@github.com:ahmed-bermawy/convertedin-assignment.git`
2. cd into the project directory by run `cd convertedin-assignment`
3. Build the image by run `docker-compose build`
4. Run the container by run `docker-compose up -d`
5. To access the container run `docker exec -it convertedin-assignment /bin/bash`
6. Then install dependencies of composer by run `composer install` inside the container 
7. To migrate database run `docker exec -it convertedin-assignment php artisan migrate`
8. To seed database run `docker-compose exec convertedin-assignment php artisan db:seed`
9. After installation is finished you can access the application on `http://localhost:8010/`

