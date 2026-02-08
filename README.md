Aquí tienes el código fuente completo. Solo tienes que crear un archivo llamado `README.md` en la raíz de tu proyecto, abrirlo con cualquier editor de texto (como el Bloc de notas o VS Code) y pegar este contenido dentro.

Al subirlo a GitHub, se verá perfectamente maquetado con los títulos, checks y tablas.

```markdown
# 👟 API REST - Tienda de Zapatillas (Proyecto DWES)

Bienvenido a la API REST para la gestión de una tienda de zapatillas. Este proyecto ha sido desarrollado utilizando **Laravel 11** y cumple con los estándares más altos de desarrollo de APIs (Nivel Platino), incluyendo validaciones de seguridad, documentación automática y tests automatizados.

---

## 🏆 Objetivos y Requisitos Cumplidos

Este proyecto supera los requisitos básicos, alcanzando el nivel máximo de exigencia:

### 🥈 Nivel Plata (Básico)
- [x] **CRUD Completo:** Endpoints operativos para Crear, Leer, Actualizar y Borrar productos.
- [x] **Persistencia de Datos:** Uso de base de datos SQL con Migraciones y Seeders.
- [x] **Integración Frontend:** La aplicación web consume la API real (`/api/productos`) mediante JavaScript.
- [x] **Uso de Framework:** Desarrollo estructurado sobre Laravel (Controladores, Modelos, Rutas).

### 🥇 Nivel Oro (Avanzado)
- [x] **Filtrado Avanzado:** El endpoint `GET` permite filtrar por categoría, precio máximo y búsqueda por nombre.
    - Ejemplo: `/api/productos?categoria=running&precio_max=100`
- [x] **Idempotencia:** Uso correcto de los verbos HTTP (`PUT`, `DELETE`, `GET`, `POST`) y códigos de estado (`200`, `201`, `204`, `404`).

### 💎 Nivel Platino (Excelencia)
- [x] **Seguridad y Validación:** El controlador blinda las entradas usando `$request->validate()`, impidiendo datos corruptos o incompletos.
- [x] **Tests Automatizados:** Batería de pruebas completa (`tests/Feature/ProductoApiTest.php`) que verifica el funcionamiento de la API automáticamente.
- [x] **Documentación Interactiva:** Generada automáticamente con **Scribe**. Disponible en la ruta `/docs`.

---

## 🛠️ Requisitos Previos

Para ejecutar este proyecto necesitas tener instalado en tu ordenador:
* PHP 8.2 o superior.
* Composer.
* Git.
* Un servidor de base de datos (MySQL, MariaDB o SQLite).

---

## 🚀 Guía de Instalación

Sigue estos pasos para desplegar el proyecto en tu máquina local:

### 1. Clonar el repositorio
```bash
git clone https://github.com/elvisentuchabe/API-rest-DWES.git
cd api-rest-dwes

```

### 2. Instalar dependencias

Es crucial ejecutar este comando para descargar Laravel y las herramientas de documentación (Scribe).

```bash
composer install

```

### 3. Configurar el entorno

Duplica el archivo de ejemplo y genera la clave de la aplicación.

```bash
cp .env.example .env
php artisan key:generate

```

> **Nota:** Configura tus credenciales de base de datos en el archivo `.env` (DB_DATABASE, DB_USERNAME, etc.). Si usas SQLite, puedes crear el archivo `database/database.sqlite`.

### 4. Base de Datos y Datos de Prueba

Ejecuta las migraciones y los "seeders" para llenar la tienda con zapatillas de prueba.

```bash
php artisan migrate:fresh --seed

```

### 5. Generar la Documentación

Crea la página web de documentación de la API.

```bash
php artisan scribe:generate

```

### 6. Arrancar el servidor

```bash
php artisan serve

```

La aplicación estará disponible en: `http://127.0.0.1:8000`

---

## 🧪 Cómo ejecutar las Pruebas (Tests)

Para verificar que la API funciona correctamente y cumple con los requisitos de calidad (Nivel Platino), ejecuta:

```bash
php artisan test

```

Deberías ver todos los tests en color **VERDE (PASS)** via `tests/Feature/ProductoApiTest.php`.

---

## 📚 Documentación de la API

Una vez arrancado el servidor, puedes visitar la documentación completa e interactiva en:

👉 **http://127.0.0.1:8000/docs**

Aquí podrás ver todos los endpoints, los parámetros requeridos y probar las peticiones directamente desde el navegador.

---

## 🌐 Endpoints Principales

| Método | URL | Descripción |
| --- | --- | --- |
| `GET` | `/api/productos` | Lista todos los productos. |
| `GET` | `/api/productos?categoria=running` | Filtra productos por categoría. |
| `POST` | `/api/productos` | Crea un producto nuevo (Requiere validación). |
| `GET` | `/api/productos/{id}` | Muestra el detalle de un producto. |
| `PUT` | `/api/productos/{id}` | Actualiza un producto existente. |
| `DELETE` | `/api/productos/{id}` | Elimina un producto. |

---

**Autor:** Vicente Romero Sáiz

**Asignatura:** Desarrollo Web en Entorno Servidor (DWES)
