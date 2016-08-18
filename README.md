# Sasyc
***
Sasyc es un sistema para la gestión de ayudas socio-economicas.
#### Requirements
***
  - PHP >= 5.5
  - Git
  - Composer
  - Laravel 4.2

### Versión
***
1.0.0

### Dependencias
***

Sasyc usa un numero de proyectos de código abierto para que funcione correctamente:

* [Laravel] - The PHP Framework For Web Artisans
* [Twitter Bootstrap] - Great UI boilerplate for modern web apps
* [jQuery] - Fast, small, and feature-rich JavaScript library

Además Sasyc es de código abierto y cuenta con un [repositorio público][sasyc]
 en GitHub.

### Instalación
***
Sasyc requiere [PHP](http://php.net/) v5.4+.

Descargar archivo zip y extraerlo [última versión pre-construidos](https://github.com/kentronvzla/sasyc). O clonar el repositorio y hacer `cd` en él.

Instalar las dependencias e iniciar el servidor .

```sh
$ cd sasyc
$ composer install
```
Asegúrese de que se está ejecutando la bd, las credenciales se configuran en `app\config\database.php` (o en el archivo `.env`)
Si usted no tiene un archivo ` .env` puede utilizar el ejemplo uno. Sólo cambiar el nombre `.env.example` a `.env`. Introduzca sus credenciales de bd aquí.
Para este proyecto se debe configurar el archivo `app\config\database.php` ya que no posee archivo `.env`

Correr los comandos de artisan.
```sh
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
```

### Contribuyendo
***
- Cree su rama de la característica:  `git checkout -b my-new-feature`
- Confirme los cambios: `git commit -am 'Add some feature'`
- Suba los cambios a la rama: `git push origin my-new-feature`
- Enviar un pull request

### Todos
***
 - Pruebas de escritura
 - Añadir comentarios al código
 - Añadir Modo nocturno

### Licencia
***
Sasyc is (c) 2014 - 2016 Kentron Sistemas de Información C.A ([@kentron]) y puede ser distribuido libremente bajo la [MIT license](http://opensource.org/licenses/MIT). Ver el archivo `MIT-LICENSE`.

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)

   [sasyc]: <https://github.com/kentronvzla/sasyc>
   [git-repo-url]: <https://github.com/kentronvzla/sasyc.git>
   [PHP]: <https://php.net/>
   [Laravel]: <https://laravel.com/>
   [Node.js]: <http://nodejs.org>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [Socket.io]: <http://socket.io/>
   [jQuery]: <http://jquery.com>
   [@kentron]: <https://twitter.com/kentron>
   [Express]: <http://expressjs.com>
   [AngularJS]: <http://angularjs.org>
   [Gulp]: <http://gulpjs.com>
