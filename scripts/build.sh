#!/bin/bash
containers=$(docker ps -qa)
images=$(docker images -qa)

docker stop $containers

if [[ -n "$containers" ]]
    then
      docker rm $containers
fi
if [[ -n "$images" ]]
    then
      docker rmi $images
fi

#docker-compose up -d
#
#docker-compose exec -T backend php artisan key:generate
#docker-compose exec -T backend php artisan migrate
#docker-compose exec -T backend php artisan storage:link
#docker-compose exec -T backend composer install
#docker-compose exec -T backend npm install
#docker-compose exec -T backend npm run dev
