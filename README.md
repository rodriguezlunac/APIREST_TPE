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