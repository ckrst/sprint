FROM ubuntu:trusty

MAINTAINER vinicius@versul.com.br

RUN apt-get update
# RUN apt-get -y upgrade

# Install apache, PHP, and supplimentary programs. curl and lynx-cur are for debugging the container.
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install apache2 libapache2-mod-php5 php5-mysql php5-gd php5-curl curl lynx-cur mysql-client

# Enable apache mods.
RUN a2enmod php5
RUN a2enmod rewrite

# Update the PHP.ini file, enable <? ?> tags and quieten logging.
RUN sed -i "s/short_open_tag = Off/short_open_tag = On/" /etc/php5/apache2/php.ini
RUN sed -i "s/error_reporting = .*$/error_reporting = E_ERROR | E_WARNING | E_PARSE/" /etc/php5/apache2/php.ini

# Manually set up the apache environment variables
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

EXPOSE 80

# Copy site into place.
ADD . /var/www/site

WORKDIR /var/www/site

RUN mkdir -p /var/www/site/app/tmp

# Update the default apache site with the config we created.
ADD vagrant/web/apache-config.conf /etc/apache2/sites-enabled/000-default.conf

RUN wget https://phar.phpunit.de/phpunit.phar
RUN chmod +x phpunit.phar
RUN mv phpunit.phar /usr/local/bin/phpunit

# By default, simply start apache.
CMD ["apache2ctl", "-D", "FOREGROUND"]
