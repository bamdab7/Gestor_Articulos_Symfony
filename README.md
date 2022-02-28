# PRACTICA 3 Y 4

## Descripcion general del proyecto.
En este proyecto planteamos una solución a una peticion de un cliente en el que nos pedia una aplicación web.
Nuestro cliente solicita una aplicación para poder almacenar sus articulos, clasificarlos en funcion de la categoria e incluso editar y añadir comentarios en ellos.

## Como usar la aplicación web.
Esta aplicacion web consta de una serie de funcionalidades que permiten al usuario tener control de su programa.
La aplicacion web permite insertar articulos en una base de datos que persiste y poder añadirle caracterisiticas para poder ordenarlos.
También se puede eliminar o actualizar los articulos existentes.

## Requisitos necesarios
Esto es un proyecto creado en Visual Studio Code, con lo cual es recomendable tener este programa instalado para que todo funcione correctamente.
Es importante tener la ultima version de Symfony, en caso de dudar cual se tiene. Ademas, necesitaremos algunas dependencias importantes para poder hacer actualizaciones o migraciones en nuestro proyecto.

    composer require symfony/orm-pack

    composer require --dev symfony/maker-bundle

Esto serian algunas lineas de comandos que deberiamos introducir en nuestro Visual Studio para poder comprobar que tenemos todo actualizador y correcto.

## Funcionamiento de la aplicacion web.
Esta aplicacio web consta de una interfaz intuitiva en la que el usuario podrá indentificar de una manera bastante simple, las diferentes secciones de la página. 
En el inicio se ven los distintos articulos que existen en la aplicación. En los laterales tendremos unas secciones con las que podremos filtrar por la categoria de los articulos. 
Arriba en la izquierda tendremos un boton en el que podremos añadir nuestros articulos nuevos. Tras acceder a ese botón, la pagina nos llevará a un formulario donde tras introducir los datos, los añadirá a su base de datos. 
Volviendo a la pantalla de inicio tendremos la posibilidad de ver en mayor detalle el articulo que seleccionemos.


## Tecnologías usadas.
- Visual Studio Code 
- Symfony V6.1
- Boostrap

## Autores
Este proyecto fue realizado por **Nerea Pena Carbajales**, en A Coruña, 2022.

## Licencia
Licencia *Creative Commons de Atribución y no Comercial*.

## Contribuciones
Todas las **sugerencias** podrán ser implementadas tras un proceso de analisis. Si algun usuario tiene interés en participar que no dude en comentar las ideas. Serán valoradas en función de los siguientes criterios:

| Imprescindible | Recomendable |
| -- | -- |
| Nombre del autor | Anotaciones|
| Código claro | Mejoras a largo plazo|
| Mejoras o sugerencias | Código extenso|

