# APIREST_TPE
URL: http://localhost/carpeta/APIREST_TPE/api/
"carpeta" donde se guarda el trabajo.

Vagones
1. Para mostrar todos los vagones GET: 
    URL/vagones

2. Para mostrar un vagon según el :ID, GET:
    URL/vagon/:ID

3. Para eliminar un vagon según el :ID, DELETE:
    URL/vagon/:ID

4. Para insertar un vagon POST:
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

5. Para modificar un vagon según el :ID, PUT:
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

6. Para ordenar vagones según la columna que elijas, asc o desc:
    URL/vagones/ordenados?columna=modelo&orden=asc
    El parámetro "columna=" puede tomar los valores "nro_vagon", "tipo", "capacidad_max", "modelo", "descripcion" o "locomotora_id".
    El parámetro "orden=" puede tomar los valores "asc" o "desc".

7. Para filtrar vagones según su capacidad maxima: 
    URL/vagones/filtro?capacidad_max=20000
    Devuelve los vagones con capacidad mayor al valor indicado


Locomotoras
1. Para mostrar todas las locomotoras GET: 
    URL/locomotoras

2. Para mostrar una locomotora según el :ID, GET:
    URL/locomotora/:ID

3. Para eliminar una locomotora según el :ID, DELETE:
    URL/locomotora/:ID

4. Para insertar una locomotora POST:
    URL/locomotoras
    Body {
        "modelo": "?",
        "anio_fabricacion": ?,
        "lugar_fabricacion": "?"
    }
"modelo" tipo varchar,
"anio_fabricacion" tipo int,
"lugar_fabricacion" tipo varchar.

5. Para modificar un locomotora según el :ID, PUT:
    URL/locomotora/:ID
    Body {
        "modelo": "?",
        "anio_fabricacion": ?,
        "lugar_fabricacion": "?"
    }
"modelo" tipo varchar,
"anio_fabricacion" tipo int,
"lugar_fabricacion" tipo varchar.

6. Para ordenar locomotoras según la columna que elijas, asc o desc:
    URL/locomotoras/ordenados?columna=anio_fabricacion&orden=desc
    El parámetro "columna=" puede tomar los valores "anio_fabricacion", "modelo" o "lugar_fabricacion".
    El parámetro "orden=" puede tomar los valores "asc" o "desc".

7. Para filtrar locomotoras según el año de fabricación: 
    URL/locomotoras/filtro?anio_fabricacion=2000
    Devuelve las locomotoras con año de fabricación mayor al valor indicado