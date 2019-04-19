FROM gitpod/workspace-full

USER root

# Add mariadb repo
RUN apt-get install -y software-properties-common
RUN apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0xF1656F24C74CD1D8
RUN add-apt-repository 'deb [arch=amd64] http://nyc2.mirrors.digitalocean.com/mariadb/repo/10.3/ubuntu cosmic main'

# Install mariadb
RUN apt-get update && apt-get install -y mariadb-server
