#!/bin/bash

apt-get install -y --reinstall language-pack-en language-pack-es
locale-gen
dpkg-reconfigure locales
echo LC_ALL="en_US.utf8" >> /etc/environment
apt-get -y update
apt-get -y install python-dev
apt-get -y install git
apt-get -y install python-pip
apt-get -y install build-essential
apt-get -y install libjpeg-dev
apt-get -y install zlib1g-dev
apt-get -y install libpng12-dev
pip install virtualenvwrapper
apt-get -y install apache2 apache2-mpm-prefork apache2-utils libexpat1 libapache2-mod-wsgi
apt-get -y install mysql-server libapache2-mod-auth-mysql php5-mysql
apt-get -y install libmysqlclient-dev
apt-get -y install unzip
mysql_install_db
/usr/bin/mysql_secure_installation
apt-get install -y php5 libapache2-mod-php5 php5-mcrypt
apt-get install -y phpmyadmin
echo "Include /etc/phpmyadmin/apache.conf" >> /etc/apache2/apache2.conf #CAN CAUSE CONFLICT WITH MODULE AUTOLOAD, WON’T CRASH JUST DISPLAY WARNING
vim /etc/phpmyadmin/apache.conf
service apache2 restart
echo "ServerName localhost" >> /etc/apache2/apache2.conf
echo "ServerSignature off" >> /etc/apache2/apache2.conf
echo "ServerTokens prod" >> /etc/apache2/apache2.conf

echo "Done! Don't forget to enable phpmyadmin"
