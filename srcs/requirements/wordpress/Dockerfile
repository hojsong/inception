# 베이스 이미지 설정
FROM debian:bookworm

# 컨테이너가 리스닝할 포트 지정
EXPOSE 9000

# 패키지 설치를 위해 패키지 관리자 업데이트 및 필요한 패키지 설치
RUN apt-get update 
RUN apt-get upgrade -y \
&& apt-get install -y lsb-release apt-transport-https ca-certificates curl software-properties-common gnupg2 wget \
&& curl -fsSL https://packages.sury.org/php/apt.gpg | apt-key add - \
&& echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list \
&& apt-get update \
&& apt-get -y install php7.4 php7.4-fpm php7.4-mysql php7.4-cli php7.4-common php7.4-json php7.4-opcache php7.4-readline php7.4-mbstring php7.4-xml php7.4-gd php7.4-curl

# 워드프레스 설치를 위한 디렉토리 생성 및 최신 버전 다운로드
RUN mkdir -p /var/www
RUN wget https://wordpress.org/latest.tar.gz
RUN tar -xvf latest.tar.gz && mv /wordpress/* /var/www
RUN chown -R www-data:www-data /var/www
RUN rm -r /wordpress latest.tar.gz

# PHP-FPM 풀 설정 파일 복사
COPY ./conf/www.conf /etc/php/7.4/fpm/pool.d/
# 워드프레스 설정 파일 복사
COPY ./conf/wp-config.php /var/www/
# 워드프레스 설정 스크립트 복사
COPY ./tools/wp-set.sh /tmp/
# 설정 스크립트 실행 권한 부여
RUN chmod +x /tmp/wp-set.sh
# 컨테이너 시작 시 실행할 명령어 설정
ENTRYPOINT [ "sh", "/tmp/wp-set.sh" ]