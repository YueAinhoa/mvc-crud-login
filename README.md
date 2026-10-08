<h1 align="center">🛍️ CRUD de Productos con Login (PHP + MVC)</h1>

<p align="center">
  <img src="docs/crud.png" alt="Pantalla principal del CRUD de productos con diseño en rosa oscuro, tarjetas de resumen y tabla de productos" width="700">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/STATUS-TERMINADO-green" alt="Estado: terminado">
  <img src="https://img.shields.io/badge/PHP-8-777BB4?logo=php&logoColor=white" alt="PHP 8">
  <img src="https://img.shields.io/badge/MySQL-MariaDB-4479A1?logo=mysql&logoColor=white" alt="MySQL / MariaDB">
  <img src="https://img.shields.io/badge/Patr%C3%B3n-MVC-db2777" alt="Patrón MVC">
  <img src="https://img.shields.io/badge/Licencia-MIT-blue" alt="Licencia MIT">
</p>

## Índice

* [Descripción del proyecto](#-descripción-del-proyecto)
* [Estado del proyecto](#-estado-del-proyecto)
* [Funcionalidades y demostración](#-funcionalidades-y-demostración)
* [Seguridad](#-seguridad)
* [Acceso al proyecto](#-acceso-al-proyecto)
* [Abre y ejecuta el proyecto](#-abre-y-ejecuta-el-proyecto)
* [Estructura del proyecto](#-estructura-del-proyecto)
* [Tecnologías utilizadas](#-tecnologías-utilizadas)
* [Personas contribuyentes](#-personas-contribuyentes)
* [Desarrolladora del proyecto](#-desarrolladora-del-proyecto)
* [Licencia](#-licencia)

## 📖 Descripción del proyecto

Aplicación web desarrollada con el patrón **MVC** (Modelo, Vista, Controlador) en **PHP puro**. Incluye un sistema de autenticación con usuario y contraseña y un **CRUD** (crear, leer, actualizar y eliminar) de productos, accesible solo después de iniciar sesión.

Fue creada como **Tarea 3: CRUD / Login**. Su objetivo es demostrar la separación de responsabilidades en MVC, el manejo de sesiones con protección de rutas y el almacenamiento seguro de contraseñas.

## 🚧 Estado del proyecto

<h4 align="center">
✅ Proyecto terminado y entregado ✅
</h4>

## 🔨 Funcionalidades y demostración

- `Patrón MVC`: modelos, vistas, controladores y un enrutador propio en `public/index.php`.
- `Login y logout`: acceso con usuario y contraseña, y cierre de sesión.
- `Rutas protegidas`: sin sesión activa, cualquier URL del CRUD redirige al login.
- `CRUD completo`: crear, leer, actualizar y eliminar productos, con validación de datos.
- `Contraseñas encriptadas`: almacenadas con **bcrypt** mediante `password_hash()`.
- `Diseño responsive`: se adapta a computador y celular.

### Capturas de pantalla

#### Login

![Pantalla de login con tarjeta centrada y fondo rosa](docs/login.png)

#### Mensaje al intentar entrar sin iniciar sesión

![Mensaje "Debes iniciar sesión para acceder" en la pantalla de login](docs/error.png)

#### CRUD de productos

![Tabla de productos con tarjetas de resumen y botones de editar y eliminar](docs/crud.png)

### 🎥 Video demostrativo

[▶️ Ver el video del funcionamiento](https://youtu.be/B1CmDJl9HLk)

En el video se muestra el funcionamiento del login, que no es posible acceder a la sección protegida sin iniciar sesión y la contraseña encriptada en la base de datos.

## 🔒 Seguridad

- Contraseñas con hash bcrypt (más seguro que MD5).
- `Auth::requireLogin()` en el constructor del controlador protegido.
- Consultas preparadas con PDO para reducir el riesgo de inyección SQL.
- Escape de HTML para reducir el riesgo de XSS.
- Eliminación solo por POST.
- `app/` y `database/` bloqueadas con `.htaccess`.

## 📁 Acceso al proyecto

Puedes obtener el código fuente de dos maneras:

- Clonando el repositorio:

```bash
git clone https://github.com/YueAinhoa/mvc-crud-login.git
```

- Desde GitHub, con el botón **Code → Download ZIP**.

## 🚀 Abre y ejecuta el proyecto

**Requisitos:** XAMPP (Apache, PHP 8 y MySQL) y un navegador web.

1. Instala XAMPP e inicia **Apache** y **MySQL**.
2. Clona el repositorio dentro de `htdocs`:

```bash
cd C:\xampp\htdocs
git clone https://github.com/YueAinhoa/mvc-crud-login.git
```

3. Importa `database/schema.sql` en phpMyAdmin.
4. Revisa `app/config/config.php` (credenciales de BD y `BASE_URL`).
5. Crea el usuario inicial:

```bash
C:\xampp\php\php.exe database\seed.php
```

6. Abre en el navegador:

```text
http://localhost/mvc-crud-login/public/
```

### Credenciales de prueba

| Usuario | Contraseña |
|:-------:|:----------:|
| admin   | admin123   |

## 🗂️ Estructura del proyecto

```text
mvc-crud-login/
├── app/
│   ├── config/        → configuración (base de datos y BASE_URL)
│   ├── core/          → Database, Auth y Controller base
│   ├── controllers/   → AuthController y ProductController
│   ├── models/        → User y Product
│   └── views/         → layout, auth y products
├── database/          → schema.sql y seed.php
├── docs/              → capturas de pantalla del README
├── public/            → index.php, css/ y .htaccess
└── README.md
```

## 💻 Tecnologías utilizadas

- ![PHP](https://img.shields.io/badge/-PHP-777BB4?logo=php&logoColor=white) **PHP 8**: lógica del servidor y patrón MVC.
- ![MySQL](https://img.shields.io/badge/-MySQL-4479A1?logo=mysql&logoColor=white) **MySQL / MariaDB**: base de datos.
- ![Apache](https://img.shields.io/badge/-Apache-D22128?logo=apache&logoColor=white) **Apache**: servidor web.
- ![XAMPP](https://img.shields.io/badge/-XAMPP-FB7A24?logo=xampp&logoColor=white) **XAMPP**: entorno de desarrollo local.
- ![HTML5](https://img.shields.io/badge/-HTML5-E34F26?logo=html5&logoColor=white) **HTML**: estructura de las vistas.
- ![CSS3](https://img.shields.io/badge/-CSS3-1572B6?logo=css3&logoColor=white) **CSS3**: estilos y diseño responsive.

## 🤝 Personas contribuyentes

Este es un proyecto académico individual, por lo que no tiene colaboradores. Si encuentras algún error o tienes una sugerencia, puedes abrir un *issue* en el repositorio.

## 👩‍💻 Desarrolladora del proyecto

| [<img src="https://github.com/YueAinhoa.png" width=115><br><sub>Ainhoa Yue</sub>](https://github.com/YueAinhoa) |
| :---: |

## 📄 Licencia

Este proyecto está bajo la licencia **MIT**.