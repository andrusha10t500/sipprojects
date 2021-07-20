#!/bin/bash
$containers=$(docker ps -qa)
$images=$(docker images -qa)

docker stop $containers

if [[ -n "$containers" ]]
    then
      docker rm $containers
fi
if [[ -n "$images" ]]
    then
      docker rmi $images
fi

docker-compose up -d
