This task was build using [Laravel](https://laravel.com/docs/7.x)

# Steps to run The project

- git clone of the master branch
- run composer install
- renaming .env.example to .env
- run composer dump-autoload

# Notes

- for API [documentation](https://documenter.getpostman.com/view/5140236/TzJpgeh8) that contains examples for success
  and failures endpoints

# Testing

- vendor/bin/phpunit

# Docker

- run docker-compose up -d
- run docker exec -it id of container bash
- then run composer install
- php artisan config:cache

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
