## Documentación de API REST TPE

La API REST del TPE recibe consultas tipo HTTP GET, PUT, DELETE y POST con la sintaxis descrita debajo, donde se especifican las URI, sus parámetros y opciones para los mismos. 
El servidor responde en formato JSON o en formato texto con un mensaje descriptivo de la acción resultado de la consulta realizada.
Para que funcione correctamente la colección de POSTMAN es necesario que la 'carpeta' se llame 'APIREST_TPE' y una vez dentro clonar el repositorio remoto:
https://github.com/rodriguezlunac/APIREST_TPE 

### Locomotoras
#### ***Listar todos las locomotoras***

Muestra todas las locomotoras con sus respectivos campos.
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | locomotoras    |http://localhost/carpeta/APIREST_TPE/api/locomotoras|

##### Respuestas

- `200 Solicitud exitosa`: Si la URI es correcta se listarán todas las locomotoras.
- `404 El servidor no puede encontrar el recurso solicitado`: Si no hay locomotoras para listar.

#### Listar una locomotora por id
Muestra una locomotora seleccionada por su id con sus respectivos campos.
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | locomotora    |http://localhost/carpeta/APIREST_TPE/api/locomotora/|

Por ejemplo:

http://localhost/carpeta/APIREST_TPE/api/locomotora/1

##### Respuestas
- `200 Solicitud exitosa`: Si el id existe se mostrará en pantalla la locomotora solicitada.
- `400 El servidor no puede procesar la petición debido a un error del cliente`: Si el id no es un valor válido  se mostrará en pantalla que se esperaba un valor númerico mayor a cero.
- `404 El servidor no puede encontrar el recurso solicitado`: Si el id no existe, se mostrará en pantalla que la locomotora con el id solicitado no existe.

#### ***Eliminar una locomotora por id***

Elimina una locomotora seleccionada por su id.
| VERBO | RECURSO | URI|
| -------- | ------- |-------------------------------------------------------|
| `DELETE`| locomotora |http://localhost/carpeta/APIREST_TPE/api/locomotora/ |

Por ejemplo:

http://localhost/carpeta/APIREST_TPE/api/locomotora/1

##### Respuestas
- `200 Solicitud exitosa`: Si el id existe se mostrará en pantalla un mensaje que diga que la locomotora con el id correspondiente ha sido eliminada con exito.
- `400 El servidor no puede procesar la petición debido a un error del cliente`: Si el id no es un valor válido  se mostrará en pantalla que se esperaba un valor númerico mayor a cero.
- `404 El servidor no puede encontrar el recurso solicitado`: Si el id no existe se mostrará en pantalla que la locomotora con el id solicitado no existe.

#### ***Modificar una locomotora por id***

Modifica una locomotora por su id. 

| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `PUT`      | locomotora    |http://localhost/carpeta/APIREST_TPE/api/locomotora/|

Para modificar una locomotora debemos completar el body de la siguiente manera, completanto todos los campos respetando su tipo:

Formato para escribir en el body:
```javascript
{
    "modelo": "",
    "anio_fabricacion": ,
    "lugar_fabricacion": ""
}
```
- "modelo" tipo varchar,
- "anio_fabricacion" tipo int,
- "lugar_fabricacion" tipo varchar.

Por ejemplo:

http://localhost/carpeta/APIREST_TPE/api/locomotora/1

```javascript
{
    "modelo": "XPO-789",
    "anio_fabricacion": 1920,
    "lugar_fabricacion": "Argentina"
    }
```
Siendo "anio_fabricacion" un valor positivo mayor a 1000 y menor o igual a 2023.

##### Respuestas

- `201 Creado con exito`: Si el id existe y el body se completo correctamente se mostrará en pantalla un mensaje que diga que la locomotora con el id correspondiente ha sido modificada con exito.
- `400 El servidor no puede procesar la petición debido a un error del cliente`: Si el body se completo erroneamente se mostrará en pantalla el mensaje error al modificar la locomotora y si el id no es un valor válido se mostrará en pantalla que se esperaba un valor númerico mayor a cero.
- `404 El servidor no puede encontrar el recurso solicitado`: Si el id no existe se mostrará en pantalla que el id de la locomotora solicitada no existe.
#### ***Ingresar una locomotora***

Ingresa una locomotora.

| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `POST`      | locomotoras    |http://localhost/carpeta/APIREST_TPE/api/locomotoras|

Para ingresar un vagon debemos completar el body de la siguiente manera, completanto todos los campos respetando su tipo:

Formato para escribir en el body:
```javascript
{
    "modelo": "",
    "anio_fabricacion": ,
    "lugar_fabricacion": ""
}
```
- "modelo" tipo varchar,
- "anio_fabricacion" tipo int,
- "lugar_fabricacion" tipo varchar.

Por ejemplo:

```javascript
{
    "modelo": "XPO-789",
    "anio_fabricacion": 1920,
    "lugar_fabricacion": "Argentina"
}
```

Siendo "anio_fabricacion" un valor positivo mayor a 1000 y menor o igual a 2023.

##### Respuestas

- `201 Creado con exito`: Si el id existe y el body se completo correctamente se mostrará en pantalla un mensaje que diga que la locomotora con el id correspondiente ha sido ingresada con exito.
- `400 El servidor no puede procesar la petición debido a un error del cliente`: Si el body se completo erroneamente se mostrará en pantalla el mensaje error al ingresar la locomotora.
- `404 El servidor no puede encontrar el recurso solicitado`: Si el id no existe se mostrará en pantalla que el id de la locomotora solicitada no existe.

#### ***Ordenar las locomotoras por columna y orden***

Ordena todos las locomotoras por una columna seleccionada y en un determinado orden, los valores que pueden tomar son:
- Parametro columna= "anio_fabricacion", "modelo" o "lugar_fabricacion".
- Parametro orden= "asc" o "desc".

| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | locomotoras    |http://localhost/carpeta/APIREST_TPE/api/locomotoras/ordenadas?columna=&orden=|

Por ejemplo:

http://localhost/carpeta/APIREST_TPE/api/locomotoras/ordenadas?columna=modelo&orden=desc


##### Respuestas
- `200 Solicitud exitosa`: Si se encuentran seteados los parametros "columna" y "orden" con valores correctos se mostrará en pantalla las locomotoras ordenadas con esas condiciones.
- `400 El servidor no puede procesar la petición debido a un error del cliente`: Si los parametros no estan seteados se mostrará en pantalla que faltan setear parametros.
- `404 El servidor no puede encontrar el recurso solicitado`: Si estan mal seteados los parametros "columna" y "orden" se mostrará en pantalla que la columna o el orden es inexistente.


#### ***Filtrar por año de fabricación mayor a un valor dado***

Filtra todas las locomotoras con año de fabricación mayor a un valor asignado de tipo int:

| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | locomotoras    |http://localhost/carpeta/APIREST_TPE/api/locomotoras/filtro?anio_fabricacion=|

Por ejemplo:
http://localhost/carpeta/APIREST_TPE/api/locomotoras/filtro?anio_fabricacion=1945

Siendo "anio_fabricacion" un valor positivo y menor o igual a 2023.

##### Respuestas
- `200 Solicitud exitosa`: Si se encuentran seteado el parametro "anio_fabricacion" con valores correctos se mostrará en pantalla las locomotoras que cumplan tal condición.
- `400 El servidor no puede procesar la petición debido a un error del cliente`: Si los parametros no estan seteados se mostrará en pantalla que faltan setear parametros.
-  `404 El servidor no puede encontrar el recurso solicitado`: Si los parametros están seteados con valores incorrectos se mostrará que el año de fabricación no es válido.

#### ***Paginado de locomotoras***

Lista 10 locomotoras por página

| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | locomotoras    |http://localhost/carpeta/APIREST_TPE/api/locomotoras/paginado?pagina=|

Por ejemplo: 

http://localhost/carpeta/APIREST_TPE/api/locomotoras/paginado?pagina=1

Siendo "pagina" un valor entero mayor a cero.

##### Respuestas
- `200 Solicitud exitosa`: Si se encuentra seteado el parametro "pagina" con valores correctos se mostrará en pantalla hasta 10 locomotoras correspondientes a dicha página.
- `400 El servidor no puede procesar la petición debido a un error del cliente`: Si los parametros no estan seteados o el valor no es válido se mostrará en pantalla que los parametros no estan seteados o que la página seleccionada no es válida.
- `404 El servidor no puede encontrar el recurso solicitado`: Si el parametro esta seteado y no es un valor existente se mostrará en pantalla que no existe el número de página seleccionado.

#### ***Resumen***

| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | locomotoras     |http://localhost/carpeta/APIREST_TPE/api/locomotoras|
| `GET`      | locomotora   |http://localhost/carpeta/APIREST_TPE/api/locomotora/1|
| `DELETE`      | locomotora   |http://localhost/carpeta/APIREST_TPE/api/locomotora/1|
| `PUT`      | locomotora   |http://localhost/carpeta/APIREST_TPE/api/locomotora/1|
| `POST`      | locomotoras   |http://localhost/carpeta/APIREST_TPE/api/locomotoras|
| `GET`      | locomotoras   |http://localhost/carpeta/APIREST_TPE/api/locomotoras/ordenadas?columna=modelo&orden=desc|
| `GET`      | locomotoras   |http://localhost/carpeta/APIREST_TPE/api/locomotoras/filtro?anio_fabricacion=1950|
| `GET`      | locomotoras   |http://localhost/carpeta/APIREST_TPE/api/locomotoras/paginado?pagina=1|
### Vagones
#### ***Listar todos los vagones***

Muestra todos los vagones con sus respectivos campos.
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagones     |http://localhost/carpeta/APIREST_TPE/api/vagones|

##### Respuestas

- `200 Solicitud exitosa`: Si la URI es correcta se listarán todos los vagones.
- `404 El servidor no puede encontrar el recurso solicitado`: Si no hay vagones para listar. 

#### ***Listar un vagón por id***

Muestra un vagón seleccionado por su id con sus respectivos campos.
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagon/|

Por ejemplo:

http://localhost/carpeta/APIREST_TPE/api/vagon/1

##### Respuestas
- `200 Solicitud exitosa`: Si el id existe se mostrará en pantalla el vagón solicitado.
- `400 El servidor no puede procesar la petición debido a un error del cliente`: Si el id no es un valor válido  se mostrará en pantalla que se esperaba un valor númerico mayor a cero.
- `404 El servidor no puede encontrar el recurso solicitado`: Si el id no existe, se mostrará en pantalla que el vagón con el id solicitado no existe.


#### ***Eliminar un vagón por id***

Elimina un vagón seleccionado por su id.

| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `DELETE`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagon/|

http://localhost/carpeta/APIREST_TPE/api/vagon/1

##### Respuestas
- `200 Solicitud exitosa`: Si el id existe existe se mostrará en pantalla un mensaje que diga que el vagón con el id correspondiente ha sido eliminado con exito
- `404 El servidor no puede encontrar el recurso solicitado`: Si el id no existe se mostrará en pantalla que el vagón con el id solicitado no existe.


#### ***Modificar un vagón por id***

Modifica un vagón por su id. 

| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `PUT`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagon/|

Para modificar un vagón debemos completar el body de la siguiente manera, completanto todos los campos respetando su tipo:

Formato para escribir en el body:
```javascript

 {
    "nro_vagon": ,
    "tipo": "",
    "capacidad_max": ,
    "modelo": "",
    "descripcion": "",
    "locomotora_id": 
}

```
- "nro_vagon" tipo int, 
- "tipo" tipo varchar,
- "capacidad_max" tipo int,
- "modelo" tipo varchar,
- "descripcion" tipo varchar,
- "locomotora_id" tipo int.

Por ejemplo:

http://localhost/carpeta/APIREST_TPE/api/vagon/1

```javascript

{
    "nro_vagon": 123,
    "tipo": "Comercial",
    "capacidad_max": 5000,
    "modelo": "LB-789",
    "descripcion": "Vagon comercial",
    "locomotora_id": 48
}
```
Siendo "capacidad_max" un valor positivo.

##### Respuestas

- `201 Creado con exito`: Si el id existe y el body se completo correctamente se mostrará en pantalla un mensaje que diga que el vagón con el id correspondiente ha sido modificado con exito.
- `400 El servidor no puede procesar la petición debido a un error del cliente`: Si el body se completo erroneamente se mostrará en pantalla el mensaje error al modificar el vagón y si el id no es un valor válido se mostrará en pantalla que se esperaba un valor númerico mayor a cero.
- `404 El servidor no puede encontrar el recurso solicitado`: Si el id del vagón o la locomotora no existe se mostrará en pantalla que el id del vagón o locomotora no existe.


#### ***Ingresar un vagón***

Ingresa un vagón.

campos respetando su tipo:
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `POST`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagones|

Para ingresarr un vagón debemos completar el body de la siguiente manera, completanto todos los campos respetando su tipo:

Formato para escribir en el body:
```javascript

{
    "nro_vagon": ,
    "tipo": "",
    "capacidad_max": ,
    "modelo": "",
    "descripcion": "",
    "locomotora_id": 
}

```
- "nro_vagon" tipo int, 
- "tipo" tipo varchar,
- "capacidad_max" tipo int,
- "modelo" tipo varchar,
- "descripcion" tipo varchar,
- "locomotora_id" tipo int.

Por ejemplo:
```javascript

{
    "nro_vagon": 123,
    "tipo": "Comercial",
    "capacidad_max": 5000,
    "modelo": "LB-789",
    "descripcion": "Vagon comercial",
    "locomotora_id": 48
}
```
Siendo "capacidad_max" un valor positivo.

##### Respuestas

- `201 Creado con exito`: Si el id existe y el body se completo correctamente se mostrará en pantalla un mensaje que diga que el vagón con el id correspondiente ha sido ingresado con exito.
- `400 El servidor no puede procesar la petición debido a un error del cliente`: Si el body se completo erroneamente se mostrará en pantalla el mensaje error al ingresar el vagón.
- `404 El servidor no puede encontrar el recurso solicitado`: Si el id del vagón o la locomotora no existe se mostrará en pantalla que el id del vagón o locomotora no existe.

#### ***Ordenar los vagones por columna y orden***

Ordena todos los vagones por una columna seleccionada y en un determinado orden, los valores que pueden tomar son:
- Parametro columna= "nro_vagon", "tipo", "capacidad_max", "modelo", "descripcion" o "locomotora_id".
- Parametro orden= "asc" o "desc".

| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `POST`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagones|

Por ejemplo:
http://localhost/carpeta/APIREST_TPE/api/vagones/ordenados?columna=modelo&orden=asc

##### Respuestas
- `200 Solicitud exitosa`: Si se encuentran seteados los parametros "columna" y "orden" con valores correctos se mostrará en pantalla los vagones ordenados con esas condiciones.
- `400 El servidor no puede procesar la petición debido a un error del cliente`: Si los parametros no estan seteados se mostrará en pantalla que faltan setear parametros.
- `404 El servidor no puede encontrar el recurso solicitado`: Si estan mal seteados los parametros "columna" y "orden" se mostrará en pantalla que la columna o el orden es inexistente.


#### ***Filtrar por capacidad máxima mayor a un valor dado***

Filtra todos los vagones con capacidad máxima mayor a un valor asignado de tipo int:

| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagones/filtro?capacidad_max=|

Por ejemplo:
http://localhost/carpeta/APIREST_TPE/api/vagones/filtro?capacidad_max=5000

Siendo "capacidad_max" un valor positivo.

##### Respuestas
- `200 Solicitud exitosa`: Si se encuentran seteado el parametro "capacidad_max" con valores correctos se mostrará en pantalla los vagones que cumplan tal condición.
- `400 El servidor no puede procesar la petición debido a un error del cliente`: Si los parametros no estan seteados se mostrará en pantalla que faltan setear parametros.
-  `404 El servidor no puede encontrar el recurso solicitado`: Si los parametros están seteados con valores incorrectos se mostrará que la capacidad máxima no es válido.

#### ***Paginado de vagones***

Lista 10 vagones por página
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagones/paginado?pagina=|

Por ejemplo: 

http://localhost/carpeta/APIREST_TPE/api/vagones/paginado?pagina=1


##### Respuestas
- `200 Solicitud exitosa`: Si se encuentra seteado el parametro "pagina" con valores correctos se mostrará en pantalla hasta 10 vagones correspondientes a dicha página.
- `400 El servidor no puede procesar la petición debido a un error del cliente`: Si los parametros no estan seteados o el valor no es válido se mostrará en pantalla que los parametros no estan seteados o que la página seleccionada no es válida.
- `404 El servidor no puede encontrar el recurso solicitado`: Si el parametro esta seteado y no es un valor existente se mostrará en pantalla que no existe el número de página seleccionado.

#### ***Resumen***

| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagones     |http://localhost/carpeta/APIREST_TPE/api/vagones|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagon/1|
| `DELETE`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagon/1|
| `PUT`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagon/1|
| `POST`      | vagones    |http://localhost/carpeta/APIREST_TPE/api/vagones|
| `GET`      | vagones    |http://localhost/carpeta/APIREST_TPE/api/vagones/ordenados?columna=tipo&orden=asc|
| `GET`      | vagones    |http://localhost/carpeta/APIREST_TPE/api/vagones/filtro?capacidad_max=5000|
| `GET`      | vagones    |http://localhost/carpeta/APIREST_TPE/api/vagones/paginado?pagina=1|
