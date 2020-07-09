#!/bin/bash

# sleep until instance is ready
until [[ -f /var/lib/cloud/instance/boot-finished ]]; do
  sleep 1
done

# install nginx
sudo apt-get -y update
sudo apt-get -y install mysql-client