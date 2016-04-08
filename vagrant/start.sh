#!/bin/bash -eux

docker exec sprint_db mysql -uroot -pchangeme -e 'DROP DATABASE IF EXISTS sprint;'
docker exec sprint_db mysql -uroot -pchangeme -e 'CREATE DATABASE sprint;'

docker exec sprint_db mysql -uroot -pchangeme -e 'DROP DATABASE IF EXISTS test_sprint;'
docker exec sprint_db mysql -uroot -pchangeme -e 'CREATE DATABASE test_sprint;'

docker exec sprint_db chmod 777 /vagrant/init.sql

docker exec sprint_db sh -c 'mysql -uroot -pchangeme sprint < /vagrant/init.sql'
# docker exec sprint_db sh -c 'mysql -uroot -pchangeme test_sprint < /vagrant/init.sql'
