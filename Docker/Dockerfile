# creates a layer from the node:carbon Docker image
# this initializes a new build stage and sets the Base Image for subsequent instructions. As such, a valid Dockerfile must start with a FROM instruction.
FROM node:carbon
# sets the environment variable <key> to the value <value>. This value will be in the environment for all subsequent instructions in the build stage and can be replaced inline in many as well. 
# Can be: ENV foo=/app
ENV foo /app
# create the app directory for inside the Docker image
WORKDIR /usr/src$foo 
# copy and install app dependencies from the package.json (and the package-lock.json) into the root of the directory created above
COPY package*.json ./
# will execute any commands in a new layer on top of the current image and commit the results. The resulting committed image will be used for the next step in the Dockerfile.
RUN npm install
# create  its working directories
# creates a mount point with the specified name and marks it as holding externally mounted volumes from the native host or other containers.
VOLUME /tmp
# bundle app source inside Docker image
COPY . .
# expose port 8080 to have it mapped by Docker daemon
# informs Docker that the container listens on the specified network ports at runtime. You can specify whether the port listens on TCP or UDP, and the default is TCP if the protocol is not specified. This makes it possible for the host and the outside world to access the isolated Docker Container
EXPOSE 8080 
# define the command to run the app (it's the npm start script from the package.json file)
CMD [ "npm", "start" ]



# docker build - builds an image from a Dockerfile
# docker images - displays all Docker images on that machine
# docker run - starts container and runs any commands in that container
# docker run including
#	-p - allows you to specify ports in host and Docker container
#	-it - opens up an interactive terminal after the container starts running
#	-v - bind mount a volume to the container
#	-e - set environmental variables
#	-d - starts the container in daemon mode (it runs in a background process)
# docker rmi - removes one or more images
# docker rm - removes one or more containers
# docker kill - kills one or more running containers
# docker ps - displays a list of running containers
# docker tag - tags the image with an alias that can be referenced later (good for versioning)
# docker login - login to Docker registry
# docker network ls - 

# docker build -t api-container:0.0.1 .
# docker build -t app-container:0.0.1 .
# docker run -p 3000:3000 -d container-name
# docker run -p 7777:7777 -d container-name
# docker pull mongo:4.0.4
# docker run -d -p 27017-27019:27017-27019 --name mongodb mongo:4.0.4


docker run --rm --name ssh-test -it -p 7655:22 alpine:latest ash
docker run --name ssh-test -p 7655:22 alpine:latest
docker run -d --name ssh-test -p 7655:22 alpine:latest

docker run -d -p 7655:22 yjjy0921/redhat7.2
docker run -d ubuntu
docker inspect -f "{{ .NetworkSettings.IPAddress }}" Container_Name

docker inspect -f "{{ .NetworkSettings.IPAddress }}" naughty_haibt