# Coin Logs

## API CRUD
Endpoint `https://coin-log.herokuapp.com/api`
### Propietarios
---
URI: ``/duenos``
#### Creación
``POST``
``/``
##### Parámetros
- nombres "obligatorio"
- apellidos "obligatorio"
- celular "12 dígitos"
- email "email válido"
#### Actualización
``PUT``
``/1``
##### Parámetros
- id "obligatorio, id de propietario a editar"
- nombres "maximo 255 caracteres"
- apellidos "maximo 255 caracteres"
- celular "12 dígitos"
- email "email válido"

#### Eliminación
``DELETE``
``/{id de propietario}``

#### Consulta
``GET``
``/``
#### Consulta Especifica
``GET``
``/{id de Propietario}``

### Equipos
---
URI: ``/equipos``
#### Creación
``POST``
``/``
##### Parámetros
- nick "obligatorio"
- serial "obligatorio"
- ip 
- propietario "obligatorio, id de propietario válido"
#### Actualización
``PUT``
``/1``
##### Parámetros
- id "obligatorio, id de equipo a editar"
- nick "maximo 255 caracteres"
- serial "maximo 255 caracteres"
- ip
- propietario "id de propietario válido"

#### Eliminación
``DELETE``
``/{id de equipo}``

#### Consulta
``GET``
``/``

#### Consulta Especifica
``GET``
``/{id de Equipo}``

### Planes
---
URI: ``/planes``
#### Creación
``POST``
``/``
##### Parámetros
- nick "obligatorio"
- tiempo "obligatorio tiempo en horas minutos y segundo" 
- valor "obligatorio, decimal con dos decimales"
#### Actualización
``PUT``
``/1``
##### Parámetros
- id "obligatorio, id de plan a editar"
- nick "maximo 255 caracteres"
- tiempo "tiempo en horas minutos y segundo"
- valor "decimal con dos decimales"

#### Eliminación
``DELETE``
``/{id de plan}``

#### Consulta
``GET``
``/``

#### Consulta Especifica
``GET``
``/{id de Plan}``

### Registros
---
URI: ``/registros``
#### Creación
``POST``
``/``
##### Parámetros
- fecha "fecha válida"
- log "texto sin límite"
- tipo "no es obligatorio _Evento_ por defecto"
- saldo "numérico"
- equipo_id "obligatorio, id del equipo"

#### Consulta
``GET``
``/``

#### Consulta Especifica
``GET``
``/{id de Equipo}``

### Planes para Equipos
---
URI: ``/plan/equipo``
#### Creación
``POST``
``/``
##### Parámetros
- plan_id "obligatorio id de plan"
- equipo_id "obligatorio id de equipo"

#### Actualización
``PUT``
``/``
##### Parámetros
- plan_id "obligatorio id de plan"
- equipo_id "obligatorio id de equipo"
- new_plan_id "obligatorio id de nuevo plan"

#### Eliminación
``DELETE``
``/``
##### Parámetros
- plan_id "obligatorio id de plan"
- equipo_id "obligatorio id de equipo"
