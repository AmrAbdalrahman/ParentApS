This task was build using [Laravel](https://laravel.com/docs/7.x)

# Steps to run The project

- git clone of the master branch
- run composer install
- renaming .env.example to .env
- run composer dump-autoload
- the base url is 'http://127.0.0.1:8000/api/v1/users'

# Notes

- for API [documentation](https://documenter.getpostman.com/view/5140236/TzJpgeh8) that contains examples for success
  and failures endpoints
  
- cache is implemented with 10 minutes for each response

# Testing

- run vendor/bin/phpunit

# Docker

- run docker-compose up -d
- run docker exec -it id of container bash
- then run composer install
- php artisan config:cache
- the base url is 'http://127.0.0.1:8080/api/v1/users'

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
