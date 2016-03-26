FROM docker.io/vinik/web:latest

MAINTAINER Vinícius Kirst <vinicius@versul.com.br>

COPY . /var/www/html

RUN mkdir -p /var/www/html/app/tmp/logs
RUN mkdir -p /var/www/html/app/tmp/cache/models
RUN mkdir -p /var/www/html/app/tmp/cache/persistent
RUN chmod -R 777 /var/www/html/app/tmp

EXPOSE 80

CMD apachectl -D FOREGROUND
