FROM    debian:bookworm

EXPOSE  3306

RUN     apt-get update
RUN     apt-get upgrade -y
RUN     apt-get -y install mariadb-server mariadb-client
RUN     mkdir -p /var/run/mysqld 
RUN     chown mysql:mysql /var/run/mysqld

COPY    ./conf/my.cnf /etc/mysql/
COPY    ./tools/entry.sh /

RUN     chmod +x /entry.sh

ENTRYPOINT sh /entry.sh
