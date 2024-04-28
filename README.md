# <p align="center">Convertedin Assignment</p>

## Setup Instructions

1. Clone the repository
2. Run `composer install`
3. Run `php artisan key:generate`
4. Create a new database and update the `.env` file with the database credentials 
5. Run `php artisan cahce:clear`
6. Run `php artisan migrate`
7. Run `php artisan db:seed`
8. Run `npm install`
9. Run `npm run dev`
10. Run `php artisan serve`
11. After installation is finished you can access the application on `http://localhost:8000/`


## Docker Setup Instructions

1. Clone the repository 
2. Build the image by run `docker-compose build`
3. Run the container by run `docker-compose up -d`
4. To migrate database run `docker exec -it convertedin-assignment php artisan migrate`
5. To seed database run `docker-compose exec convertedin-assignment php artisan db:seed`
6. To access the container run `docker exec -it convertedin-assignment /bin/bash`
7. After installation is finished you can access the application on `http://localhost:8010/`

