Nuestra api tiene como objetivo acceder a los datos de los jugadores que estan en la base de datos.
Para no tener que chequear en la DB dejamos los id de los jugadores disponibles y los clubes.
id_jugador : 1001,1002,1003,1004,1005,1006
id_clubes : 3001,3002,3003,3004
URL's de la api:
Obtener listado de jugadores mediante get(GET): Lista todos los jugadores ordenados por defecto. (descendentemente por su edad).
http://localhost/entrega3-web2/api/jugadores/

Obtener un jugador en especifico por su ID(GET): Muestra el jugador indicado. (cambiar ID en la URL por el numero de id del jugador elegido).
http://localhost/entrega3-web2/api/jugadores/ID

Obtener listado de todos los jugadores ordenados(GET): Obtiene una lista de todos los jugadores ordenados ascendentemente por su edad.
http://localhost/entrega3-web2/api/jugadores?sort=edad&order=asc

 Crea el jugador (POST): Se crea el jugador indicado mediante el body, siempre tiene que tener nombre,apellido,edad,posicion y el id del club.
http://localhost/entrega3-web2/api/jugadores/

Inserta y actualiza la informacion del jugador (PUT): Se actualiza la informacion (obtenida por el body) de un jugador indicado mediante su respectivo ID (cambiar en la URL por el numero de id del jugador elegido). 
http://localhost/entrega3-web2/api/jugadores/ID



