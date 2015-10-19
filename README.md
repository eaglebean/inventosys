# inventosys - mazamitla

Como installar

1 - git clone https://github.com/eaglebean/inventosys

2 - composer install

3 - bower install

4 - sudo npm install

5 - gulp



Crear Base de datos

1 - mysql -uroot -p

2 -create database inventosys





Configurar 

1 - cp .env.eaxmple .env

2 - Ajustar valores
```
APP_ENV=local
APP_DEBUG=true

APP_KEY=<para generar la llave, ir a http://www.miraclesalad.com/webtools/md5.php y pegar aqui>

DB_HOST=localhost
DB_DATABASE=inventosys
DB_USERNAME=<tu usuario>
DB_PASSWORD=<tu password>
```






Migrar tablas

1 - php artisan migrate:install

2 - php artisan migrate





Dar privilegios de lectura/escritura

1 - sudo chmod 777 -R storage/logs
