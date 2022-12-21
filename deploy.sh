docker-compose up -d
docker exec app php artisan migrate
echo 'Admin token'
echo '9ac051793bd31855bb6d377cdc9357228f032626a79920dd1da7a6ed8b4211cf'