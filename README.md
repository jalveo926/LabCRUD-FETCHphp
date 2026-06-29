# Sistema CRUD de Gestión de Productos

Aplicación web desarrollada para gestionar productos mediante operaciones **CRUD (Crear, Leer, Actualizar y Eliminar)** utilizando **PHP, JavaScript, MySQL, Bootstrap y AJAX**.

El sistema permite realizar operaciones de forma dinámica sin recargar la página, implementando comunicación asíncrona entre frontend y backend mediante **Fetch API** y manejo de respuestas en **JSON**.

---

## Descripción del Proyecto

El proyecto consiste en un sistema de administración de productos donde el usuario puede:

* Registrar nuevos productos
* Visualizar todos los productos almacenados
* Buscar productos en tiempo real
* Modificar información de productos existentes
* Eliminar productos del sistema
* Validar datos antes de realizar operaciones en base de datos
* Recibir notificaciones dinámicas mediante alertas visuales

La aplicación implementa una arquitectura organizada separando la lógica del sistema en controlador, modelo, conexión a base de datos e interfaz de usuario.

---

## Funcionalidades Implementadas

### Gestión de Productos

✔ Registrar productos
✔ Listar productos almacenados
✔ Buscar productos dinámicamente
✔ Editar información de productos
✔ Eliminar productos

### Validaciones

✔ Validación de campos vacíos
✔ Validación de datos antes de guardar o modificar
✔ Respuestas de error estructuradas en JSON

### Interfaz

✔ Formulario dinámico
✔ Tabla de productos actualizada sin recargar página
✔ Confirmación de eliminación con alertas
✔ Cambio automático entre modo registrar y actualizar

---

## Tecnologías Utilizadas

### Frontend

* HTML5
* CSS3
* JavaScript (Vanilla JavaScript)
* Bootstrap 4
* SweetAlert2

### Backend

* PHP

### Base de Datos

* MySQL

---

## Arquitectura del Proyecto

Estructura general del sistema:

```text
CRUD-PRODUCTOS/
│
├── index.php              # Interfaz principal
├── controlador.php       # Controlador principal
├── script.js             # Lógica frontend y peticiones AJAX
│
└── modelo/
    ├── conexion.php      # Conexión a base de datos
    └── Producto.php      # Modelo con operaciones CRUD
```

La arquitectura implementa separación de responsabilidades para mantener el código organizado y facilitar mantenimiento.

---

## Flujo del Sistema

```text
Usuario interactúa con formulario
            ↓
JavaScript captura evento
            ↓
Fetch API envía solicitud AJAX
            ↓
controlador.php procesa solicitud
            ↓
Producto.php ejecuta lógica de negocio
            ↓
MySQL realiza operación
            ↓
Servidor devuelve respuesta JSON o HTML
            ↓
JavaScript actualiza interfaz sin recargar página
```

---

## Operaciones CRUD Implementadas

## 1. Crear Producto

El usuario registra un nuevo producto desde el formulario.

Se envían datos mediante método POST usando Fetch API.

Ejemplo:

```javascript
fetch("controlador.php", {
    method: "POST",
    body: datos
})
```

Respuesta JSON:

```json
{
  "success": true,
  "message": "Producto registrado correctamente",
  "accion": "guardar"
}
```

---

## 2. Listar Productos

Al iniciar el sistema se consultan automáticamente todos los productos.

```javascript
ListarProductos();
```

El servidor devuelve contenido HTML que se inserta dinámicamente en la tabla.

---

## 3. Modificar Producto

El usuario selecciona editar.

El sistema:

* Busca el producto por ID
* Carga la información en el formulario
* Cambia el botón de Registrar a Actualizar

Ejemplo respuesta JSON:

```json
{
  "id": 10,
  "codigo": "8523",
  "producto": "Televisor LG",
  "precio": 85.00,
  "cantidad": 9
}
```

---

## 4. Eliminar Producto

El usuario confirma eliminación mediante alerta.

```javascript
Swal.fire({
   title: "¿Eliminar producto?"
})
```

El backend elimina el registro y responde:

```text
ok
```

---

## Sistema de Validaciones

La validación se realiza desde el backend antes de ejecutar operaciones.

Validaciones implementadas:

* Código obligatorio
* Nombre obligatorio
* Precio válido
* Cantidad válida

Ejemplo respuesta de error:

```json
{
  "success": false,
  "message": "Errores en formulario",
  "errors": [
      "El código es obligatorio",
      "El precio debe ser válido"
  ]
}
```

---

## Comunicación AJAX y JSON

El sistema implementa comunicación asíncrona utilizando **Fetch API**.

Se manejan dos tipos de respuestas.

### Respuesta HTML

Usada para listar productos.

```javascript
response.text()
```

### Respuesta JSON

Usada para guardar, modificar, editar y validar.

```javascript
response.json()
```

Campos JSON utilizados:

```javascript
response.success
response.message
response.errors
response.accion
response.id
response.codigo
response.producto
response.precio
response.cantidad
```

---

## Base de Datos

Tabla utilizada:

```sql
CREATE TABLE productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  codigo VARCHAR(20) NOT NULL,
  producto VARCHAR(255) NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  cantidad INT NOT NULL
);
```

---

## Conceptos Aplicados

Durante el desarrollo del proyecto se aplicaron conceptos relacionados con:

* Programación orientada a objetos en PHP
* Arquitectura MVC básica
* Operaciones CRUD
* Programación asíncrona con AJAX
* Manipulación del DOM
* Comunicación cliente-servidor
* Manejo de respuestas JSON
* Validación de formularios
* Integración con MySQL
* Diseño de interfaces con Bootstrap

---

## Posibles Mejoras Futuras

* Sistema de autenticación
* Paginación de resultados
* API REST completa
* Categorías de productos
* Diseño responsive avanzado
* Historial de cambios
* Exportación de datos
* Dashboard estadístico

---

## Autores

**Jesús Alveo**
**Roniel Quintero**

Proyecto desarrollado para la asignatura:

**Desarrollo de Software VII**

---

## Objetivo Académico

Desarrollar una aplicación web que permita aplicar conceptos fundamentales de desarrollo backend, interacción con bases de datos, manejo de solicitudes asíncronas y organización estructurada del código mediante separación de responsabilidades.
