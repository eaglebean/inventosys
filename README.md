# inventosys - mazamitla

### System Requirements
Server:
- Composer
- PHP >= 5.5
- MySQL >= 5.6

install server dependencies:
```shell
# install composer
https://getcomposer.org/doc/00-intro.md

# upgrade mysql from 5.5 to 5.6
$ sudo apt-get remove mysql-server
$ sudo apt-get install mysql-client-5.6 mysql-client-core-5.6
$ sudo apt-get install mysql-server-5.6
```



Frontend:
- nodejs/npm
- gulp
- bower

install front end dependencies:

```shell
########################################
# Install nodejs/npm
########################################
$ sudo apt-get update
$ sudo apt-get install nodejs
$ sudo apt-get install npm

# check if nodejs is running
$ node --version
v0.10.25

# if you get the error: /usr/sbin/node: No such file or directory then create a symlink
$ sudo ln -s /usr/bin/nodejs /usr/bin/node



########################################
# Install bower and gulp
########################################
$ npm install -g bower
$ npm install -g gulp

```


### How to Install Inventosys

1 - Change directory where you want to install
```cd /var/www/```

2 - Clone repo
```git clone https://github.com/eaglebean/inventosys```

3 - Install server dependencies
```
cd inventosys
composer install
```

4 - Install frontend dependencies
```bash
$ sudo npm install
$ bower install
$ gulp
```


5 - Create DB
```sql
CREATE DATABASE inventosys
```



Setup
Create your env file
```bash
# /var/www/inventosys
$ cp .env.eaxmple .env
```

Update DB settings and APP_KEY
```
APP_ENV=local
APP_DEBUG=true

APP_KEY=<para generar la llave, ir a http://www.miraclesalad.com/webtools/md5.php y pegar aqui>

DB_HOST=localhost
DB_DATABASE=inventosys
DB_USERNAME=<tu usuario>
DB_PASSWORD=<tu password>
```


Table migration
```bash
$ php artisan migrate:install
$ php artisan migrate
```




Grant writting privileges

```
 sudo chmod a+w -R storage/logs
```


Setup your virtual host
```
# download the virtual host stup script 
# this script only works in debian distros using apache http server
https://github.com/osroflo/preferences/blob/master/scripts/setup_vh.py

sudo setup_vh.py /var/www/inventosys/public softtlan.inventosys.net 
```
