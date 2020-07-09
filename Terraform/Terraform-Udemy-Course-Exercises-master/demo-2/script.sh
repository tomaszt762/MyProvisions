#!/bin/bash
# Sleep until instance is ready
until [[ -f /var/lib/cloud/instance/boot-finished ]]; do
    sleep 1
done

# Install Nginx
apt-get update
apt-get -y install nginx

# Make sure nginx is started
service nginx start