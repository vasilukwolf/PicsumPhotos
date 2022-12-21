docker-compose up -d
docker-compose exec -T app php artisan key:generate
docker-compose exec -T app composer install
docker-compose exec -T app php artisan migrate
echo 'Admin token'
echo 'http://127.0.0.1:8100/admin/9ac051793bd31855bb6d377cdc9357228f032626a79920dd1da7a6ed8b4211cf'
