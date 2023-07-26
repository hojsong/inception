#!/bin/bash

sudo apt update

sudo apt install apt-transport-https ca-certificates curl gnupg2 software-properties-common

curl -4fsSL https://download.docker.com/linux/debian/gpg | sudo apt-key add -

sudo apt-key fingerprint 0EBFCD88

echo "nameserver 8.8.8.8" | sudo tee /etc/resolv.conf > /dev/null

sudo add-apt-repository \
"deb [arch=amd64] https://download.docker.com/linux/debian \
$(lsb_release -cs) \
stable"

sudo apt update

# Docker 설치
sudo apt install docker-ce docker-ce-cli containerd.io

sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

# # PHP 오류에 대한 설치
# sudo apt-get install -y software-properties-common
# sudo add-apt-repository ppa:ondrej/php
# sudo apt-get update
# apt-get install -y lsb-release apt-transport-https ca-certificates curl software-properties-common
# curl -fsSL https://packages.sury.org/php/apt.gpg | gpg --dearmor -o /usr/share/keyrings/php-archive-keyring.gpg
# echo "deb [signed-by=/usr/share/keyrings/php-archive-keyring.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list

#443 포트 열어주기
sudo iptables -A INPUT -p tcp --dport 443 -j ACCEPT
sudo sh -c 'iptables-save > /etc/iptables/rules.v4'
sudo ufw allow 443/tcp

sudo apt update

sudo apt install make
