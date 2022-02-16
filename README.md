# Coin Logs

## API CRUD
Endpoint `https://coin-log.herokuapp.com/api`
### Propietarios
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
- id "obligatorio, id de registro a editar"
- nombres "maximo 255 caracteres"
- apellidos "maximo 255 caracteres"
- celular "12 dígitos"
- email "email válido"

#### Eliminación
``DELETE``
``/{id}``

#### Consulta
``GET``
``/``
#### Consulta Especifica
``GET``
``/{id de Propietario}``

### Equipos
URI: ``/equipos``
#### Creación
``POST``
``/``
##### Parámetros
- nick "obligatorio"
- serial "obligatorio"
- ip 
- propietario "id de propietario válido"
#### Actualización
``PUT``
``/1``
##### Parámetros
- id "obligatorio, id de registro a editar"
- nick "maximo 255 caracteres"
- serial "maximo 255 caracteres"
- ip
- propietario "id de propietario válido"

#### Eliminación
``DELETE``
``/{id}``

#### Consulta
``GET``
``/``

#### Consulta Especifica
``GET``
``/{id de Equipo}``

### Registros
URI: ``/registros``
#### Creación
``POST``
``/``
##### Parámetros
- fecha "fecha válida"
- log "obligatorio"
- saldo "numérico"
- equipo_id "id del equipo"

#### Consulta
``GET``
``/``

#### Consulta Especifica
``GET``
``/{id de Equipo}``

