# Coin Logs

## API CRUD
Endpoint `https://coin-log.herokuapp.com/api`
### Propietarios
URI: ``/duenos``
#### Creación
``POST``
``/``
##### Parámetros
- *nombres* _obligatorio_
- *apellidos* _obligatorio_
- *celular* _12 dígitos_
- *email* _email válido_
#### Actualización
``PUT``
``/1``
##### Parámetros
- *id* _obligatorio, id de registro a editar_
- *nombres* _maximo 255 caracteres_
- *apellidos* _maximo 255 caracteres_
- *celular* _12 dígitos_
- *email* _email válido_

#### Eliminación
``DELETE``
``/{id}``

#### Consulta
``GET``
``/``

### Equipos
URI: ``/equipos``
#### Creación
``POST``
``/``
##### Parámetros
- *nick* _obligatorio_
- *serial* _obligatorio_
- *ip* 
- *propietario* _id de propietario válido_
#### Actualización
``PUT``
``/1``
##### Parámetros
- *id* _obligatorio, id de registro a editar_
- *nick* _maximo 255 caracteres_
- *serial* _maximo 255 caracteres_
- *ip*
- *propietario* _id de propietario válido_

#### Eliminación
``DELETE``
``/{id}``

#### Consulta
``GET``
``/``

### Registros
URI: ``/registros``
#### Creación
``POST``
``/``
##### Parámetros
- *fecha* _fecha válida_
- *log* _obligatorio_
- *saldo* _numérico_
- *equipo_id* _id del equipo_

#### Consulta
``GET``
``/``

