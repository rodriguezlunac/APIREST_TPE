# APIREST_TPE
URL: http://localhost/web2/APIREST_TPE/api/

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
