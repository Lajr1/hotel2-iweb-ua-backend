#  **Hotel2 api**

En un principio, únicamente se va a poder listar las habitaciones disponibles en un rango de fecha, y el tipo de habitaciones que disponemos en la aplicación. Ahora, los endpoints son los siguientes:

## **Listar habitaciones (GET)** (/habitaciones)

 - *Descripción*: Con este endpoint se podrá obtener el listado de habitaciones disponibles (no en estado averiado) en nuestra aplicación. Se podrán pasar los siguientes ***parámetros*** para el filtrado de estas:
 
	 - Fechas (check_in/check_out `date`) (obligatorio): Filtra habitaciones disponibles en ese rango de fechas. Serán necesarios los dos parámetros.
	 - Tipo habitación (room_type `string`): Filtra la búsqueda por tipo de habitación
	 - Precio (maxPrice `float`): Filtra por el máximo de precio que se pague por noche la habitación.
	 - Num. personas (occupants `int`): Filtra por el número de personas que se busque para la aplicación.
	 
 - *Respuesta 200*:
 ```
 {[
    {   room_type: 1,
        occuped_dates:[{from: 10-08-2023, to: 15-08-2023}, ...},...],
        price_per_night: 30.99,
        max_occupants: 4,
        active_offer: {
            name: "Nombre oferta",
            discount: 25,
            range_date: {begining: 20-08-2023, end: 25-12-2023},
        url: "https://url-a-nuestra-pagina-de-reserva.com"
    },
    {   room_type: 1,
        occuped_dates:[{from: 12-08-2023, to: 19-08-2023}, ...},...],
        price_per_night: 30.99,
        max_occupants: 4,
        active_offer: {
            name: "Nombre oferta",
            discount: 25,
            range_date: {begining: 20-08-2023, end: 25-12-2023},
        url: "https://url-a-nuestra-pagina-de-reserva.com"
    }, ... 
]}
```
 
 - Respuesta 40X: {"Error, no se ha podido listar las habitaciones"}

## **Listar tipos de habitaciones (GET)** (/tipo_habitaciones)

 - *Descripción*: Con este endpoint se podrá obtener la lista de todos los tipos de habitaciones.

 - *Respuesta 200*:
 ```
 {[
    {   id_type: 1,
        name: "Habitaciones suite",
        price_per_night: 30.99,
        max_occupants: 4
    }, ... 
 ]}
 ```

 - Respuesta 40X: {"Error, no se ha podido listar los tipos de habitaciones"}