FROM    debian:bookworm

EXPOSE 443

RUN     apt-get update 
RUN     apt-get upgrade -y
RUN     apt-get -y install nginx openssl


COPY    ./conf/default /etc/nginx/sites-available

RUN     openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/hojsong.key -out /etc/ssl/hojsong.crt \
        -subj "/C=KR/ST=Seoul/L=Seoul/O=42Seoul/OU=hojsong"

RUN     chmod 700 /etc/ssl/hojsong.crt
RUN     chmod 700 /etc/ssl/hojsong.key


ENTRYPOINT ["nginx", "-g", "daemon off;"]
