## Documentación de API REST TPE

### Locomotoras
#### Listar todos las locomotoras
Muestra todas las locomotoras con sus respectivos campos.
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagones     |http://localhost/carpeta/APIREST_TPE/api/locomotoras|

Si la URI es correcta el código de error será `200 Solicitud exitosa`, por el contrario el código de error será `404 El servidor no puede encontrar el recurso solicitado` y se deberá corregir para poder mostrar lo solicitado.
#### Listar una locomotora por id
Muestra una locomotora seleccionada por su id con sus respectivos campos.
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/locomotora/|

Por ejemplo:

http://localhost/carpeta/APIREST_TPE/api/locomotora/1

Si la URI es correcta, es decir, el id existe, el código de error será `200 Solicitud exitosa` y se mostrará en pantalla el vagón solicitado, por el contrario el código de error será `404 El servidor no puede encontrar el recurso solicitado` y se mostrará en pantalla que el vagón con el id solicitado no existe, se deberá corregir para poder mostrar lo solicitado.
#### Eliminar una locomotora por id
Elimina una locomotora seleccionada por su id.
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `DELETE`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/locomotora/|

Por ejemplo:

http://localhost/carpeta/APIREST_TPE/api/locomotora/1

Si la URI es correcta, es decir, el id existe, el código de error será `200 Solicitud exitosa` y se mostrará en pantalla un mensaje que diga que el vagón con el id correspondiente ha sido eliminado con exito, por el contrario el código de error será `404 El servidor no puede encontrar el recurso solicitado` y se mostrará en pantalla que el vagón con el id solicitado no existe, se deberá corregir para poder mostrar lo solicitado.
#### Modificar una locomotora por id
Para modificar un vagon debemos 'rellenar' el body de la siguiente manera, completanto todos los campos respetando su tipo:
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `PUT`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/locomotora/|

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

Por ejemplo

http://localhost/carpeta/APIREST_TPE/api/locomotora/1

```javascript
    {
        "modelo": "XPO-789",
        "anio_fabricacion": 1920,
        "lugar_fabricacion": "Argentina"
    }
```

Si la URI es correcta, es decir, el id existe y el body se completo correctamente el código de error será `200 Solicitud exitosa` y se mostrará en pantalla un mensaje que diga que el vagón con el id correspondiente ha sido modificado con exito, por el contrario el código de error será `400 El servidor no puede procesar la petición debido a un error del cliente` mostrando en pantalla el mensaje parametros no seteados y si la "columna" y/o "orden" no exiten el código de error será `404 El servidor no puede encontrar el recurso solicitado` y se mostrará en pantalla columna y/o roden inexistente, esto se deberá corregir para poder realizar la petición correctamente.
#### Ingresar una locomotora
Para ingresar un vagon debemos 'rellenar' el body de la siguiente manera, completanto todos los campos respetando su tipo:
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `POST`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/locomotoras|

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
Por ejemplo

http://localhost/carpeta/APIREST_TPE/api/locomotora/1

```javascript
    {
        "modelo": "XPO-789",
        "anio_fabricacion": 1920,
        "lugar_fabricacion": "Argentina"
    }
```

Si la URI es correcta, es decir, el id existe y el body se completo correctamente el código de error será `200 Solicitud exitosa` y se mostrará en pantalla un mensaje que diga que el vagón con el id correspondiente ha sido modificado con exito, por el contrario el código de error será `404 El servidor no puede encontrar el recurso solicitado` y se mostrará en pantalla que el vagón con el id solicitado no existe o que faltan parametros para completar la solicitud, esto se deberá corregir para poder realizarla.
#### Ordenar las locomotoras por columna y orden
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/locomotoras/ordenadas?columna=&orden=|
#### Filtrar por año de fabricación mayor a un valor dado
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/locomotoras/filtro?anio_fabricacion=|
#### Paginado de locomotoras
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/locomotoras/paginado?pagina=|
#### Resumen
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagones     |http://localhost/carpeta/APIREST_TPE/api/locomotoras|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/locomotora/|
| `DELETE`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/locomotora/|
| `PUT`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/locomotora/|
| `POST`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/locomotoras|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/locomotoras/ordenadas?columna=&orden=|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/locomotoras/filtro?anio_fabricacion=|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/locomotoras/paginado?pagina=|
### Vagones
#### Listar todos los vagones
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagones     |http://localhost/carpeta/APIREST_TPE/api/vagones|
#### Listar un vagón por id
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagon/|
#### Eliminar un vagón por id
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `DELETE`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagon/|
#### Modificar un vagón por id
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `DELETE`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagon/|
#### Ingresar un vagón
Para insertar un vagon debemos 'rellenar' el body de la siguiente manera, completanto todos los campos respetando su tipo:
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `POST`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagones|

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

#### Ordenar los vagones por columna y orden
Ordena todos los vagones por una columna seleccionada y en un determinado orden, los valores que pueden tomar son:
- Parametro columna= "anio_fabricacion", "modelo" o "lugar_fabricacion".
- Parametro orden= "asc" o "desc".
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `POST`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagones|

Por ejemplo:
http://localhost/carpeta/APIREST_TPE/api/vagones/ordenados?columna=modelo&orden=asc

Si la URI es correcta, es decir, se encuentras seteados los parametros "columna" y "orden" con valores correctos el código de error será `200 Solicitud exitosa` y se mostrará en pantalla los vagones ordenados con esas condiciones, por el contrario, si los parametros no estan seteados, es decir, el código de error será `400 El servidor no puede encontrar el recurso solicitado` y se mostrará en pantalla que el vagón con el id solicitado no existe o que faltan parametros para completar la solicitud, esto se deberá corregir para poder realizarla.

#### Filtrar por capacidad máxima mayor a un valor dado
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagones/filtro?capacidad_max=|
#### Paginado de locomotoras
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagones/paginado?pagina=|
#### Resumen
| VERBO | RECURSO                   | URI|
| ------------- | ---------------- |--------------|
| `GET`      | vagones     |http://localhost/carpeta/APIREST_TPE/api/vagones|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagon/|
| `DELETE`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagon/|
| `PUT`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagon/|
| `POST`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagones|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagones/ordenados?columna=&orden=|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagones/filtro?capacidad_max=|
| `GET`      | vagon    |http://localhost/carpeta/APIREST_TPE/api/vagones/paginado?pagina=|
# APIREST_TPE
URL: http://localhost/carpeta/APIREST_TPE/api/
"carpeta" es donde se guarda el trabajo.

Vagones
1. MÉTODO GET. Para mostrar todos los vagones: 
    URL/vagones
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/vagones

2. MÉTODO GET. Para mostrar un vagon según el :ID:
    URL/vagon/:ID
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/vagon/1

3. MÉTODO DELETE. Para eliminar un vagon según el :ID:
    URL/vagon/:ID
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/vagon/1

4. MÉTODO POST. Para insertar un vagon, no puede quedar nigun campo vacío:
    URL/vagones
    Body {
        "nro_vagon": ?,
        "tipo": "?",
        "capacidad_max": ?,
        "modelo": "?",
        "descripcion": "?",
        "locomotora_id": ?
    }
"nro_vagon" tipo int, 
"tipo" tipo varchar,
"capacidad_max" tipo int,
"modelo" tipo varchar,
"descripcion" tipo varchar,
"locomotora_id" tipo int.
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/vagones
    {
        "nro_vagon": 123,
        "tipo": "Comercial",
        "capacidad_max": 5000,
        "modelo": "LB-789",
        "descripcion": "Vagon comercial",
        "locomotora_id": 48
    }

5. MÉTODO PUT. Para modificar un vagon según el :ID, , no puede quedar nigun campo vacío:
    URL/vagon/:ID
    Body {
        "nro_vagon": ?,
        "tipo": "?",
        "capacidad_max": ?,
        "modelo": "?",
        "descripcion": "?",
        "locomotora_id": ?
    }
"nro_vagon" tipo int, 
"tipo" tipo varchar,
"capacidad_max" tipo int,
"modelo" tipo varchar,
"descripcion" tipo varchar,
"locomotora_id" tipo int.
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/vagon/1
    
    {
        "nro_vagon": 123,
        "tipo": "Comercial",
        "capacidad_max": 5000,
        "modelo": "LB-789",
        "descripcion": "Vagon comercial",
        "locomotora_id": 48
    }

6. MÉTODO GET. Para ordenar vagones según la columna que elijas, asc o desc:
    URL/vagones/ordenados?columna=&orden=
    El parámetro "columna" puede tomar los valores "nro_vagon", "tipo", "capacidad_max", "modelo", "descripcion" o "locomotora_id".
    El parámetro "orden" puede tomar los valores "asc" o "desc".
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/vagones/ordenados?columna=modelo&orden=asc

7. MÉTODO GET. Para filtrar vagones según su capacidad maxima: 
    URL/vagones/filtro?capacidad_max=
    Devuelve los vagones con capacidad mayor al valor indicado.
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/vagones/filtro?capacidad_max=20000

8. MÉTODO GET. Para paginar los vagones:
    URL/vagones/paginado?pagina=
    El parámetro "pagina=" puede tomar números enteros, si la página no existe se va a indicar como un error.
    http://localhost/carpeta/APIREST_TPE/api/vagones/paginado?pagina=1

Locomotoras
1. MÉTODO GET. Para mostrar todas las locomotoras: 
    URL/locomotoras
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/locomotoras

2. MÉTODO GET. Para mostrar una locomotora según el :ID:
    URL/locomotora/:ID
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/locomotora/1

3. MÉTODO DELETE. Para eliminar una locomotora según el :ID:
    URL/locomotora/:ID
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/locomotora/1

4. MÉTODO POST. Para insertar una locomotora, no puede quedar nigun campo vacío:
    URL/locomotoras
    Body {
        "modelo": "?",
        "anio_fabricacion": ?,
        "lugar_fabricacion": "?"
    }
"modelo" tipo varchar,
"anio_fabricacion" tipo int,
"lugar_fabricacion" tipo varchar.
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/locomotoras
    {
        "modelo": "XPO-789",
        "anio_fabricacion": 1920,
        "lugar_fabricacion": "Argentina"
    }

5. MÉTODO PUT. Para modificar un locomotora según el :ID, no puede quedar nigun campo vacío:
    URL/locomotora/:ID
    Body {
        "modelo": "?",
        "anio_fabricacion": ?,
        "lugar_fabricacion": "?"
    }
"modelo" tipo varchar,
"anio_fabricacion" tipo int,
"lugar_fabricacion" tipo varchar.
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/locomotora/1
    {
        "modelo": "XPO-789",
        "anio_fabricacion": 1920,
        "lugar_fabricacion": "Argentina"
    }

6. MÉTODO GET. Para ordenar locomotoras según la columna que elijas, asc o desc:
    URL/locomotoras/ordenadas?columna=&orden=
    El parámetro "columna" puede tomar los valores "anio_fabricacion", "modelo" o "lugar_fabricacion".
    El parámetro "orden" puede tomar los valores "asc" o "desc".
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/locomotoras/ordenadas?columna=anio_fabricacion&orden=desc

7. MÉTODO GET. Para filtrar locomotoras según el año de fabricación: 
    URL/locomotoras/filtro?anio_fabricacion=
    Devuelve las locomotoras con año de fabricación mayor al valor indicado.
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/locomotoras/filtro?anio_fabricacion=2000

8. MÉTODO GET. Para paginar las locomotoras:
    URL/locomotoras/paginado?pagina=
    El parámetro "pagina" puede tomar números enteros, si la página no existe se va a indicar como un error.
    Por ejemplo: http://localhost/carpeta/APIREST_TPE/api/locomotoras/paginado?pagina=1