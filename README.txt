Requisitos 
 * instalar composer https://getcomposer.org/download/   ...........  Composer-Setup.exe
 * php 7.0.2 o superior
 * motor DB mysql
--------------------------------------
----------Pasos--------------

* Exportar la base de datos dbventaslaravel
en el archivo .env se pude configurar los valores de la DB

* ejecutar el comando php artisan serve dentro de la carpeta ProyectVentasAPI\SISTEMA-VENTAS
  para arrancar el servidor de
  laravel recuerda que se debe tener instalado composer...

* Ingresar al puerto http://127.0.0.1:8000
-----------------------------------------------
---------Puntos de entrada del API-------------

metodos
GET      http://127.0.0.1:8000/api/almacen/categoria
GET      http://127.0.0.1:8000/api/almacen/categoria/{id}, ej: http://127.0.0.1:8000/api/almacen/categoria/16
POST     http://127.0.0.1:8000/api/almacen/categoria  ...... se debe mandar un JSON
PUT      http://127.0.0.1:8000/api/almacen/categoria/{id}
DELETE   http://127.0.0.1:8000/api/almacen/categoria/{id}

 
