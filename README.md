# sedir-web-2026

Base web de SEDIR con frontend en `public/` y backend activo en `backend/` usando Node.js, Express y PostgreSQL.

## Requisitos

- Node.js 18 o superior.
- PostgreSQL 14 o superior, localmente o con Docker.

## Estructura activa

- `backend/src/app.js`: configuracion de Express.
- `backend/src/server.js`: arranque de la API y validacion de conexion a PostgreSQL.
- `backend/src/config/database.js`: pool de `pg` y prueba `SELECT 1;`.
- `backend/src/routes/health.routes.js`: endpoint `GET /health`.
- `backend/src/middleware/errorHandler.js`: manejo de errores y 404.
- `public/`: frontend estático servido por el backend.

## Variables de entorno

Usa `backend/.env` o copia `backend/.env` como base.

Variables disponibles:

- `PORT`
- `PGHOST`
- `PGPORT`
- `PGUSER`
- `PGPASSWORD`
- `PGDATABASE`
- `PGSSL`

## Levantar PostgreSQL con Docker

El backend ya está configurado para conectarse a PostgreSQL local en `127.0.0.1:55432`.

## Ejecutar la API

```bash
cd backend
npm install
npm run dev
```

La API queda disponible en:

```text
http://localhost:3000
```

Endpoint de verificacion:

- `GET /health`

## Conexion esperada

Cuando la conexion a PostgreSQL es correcta, la consola muestra:

```text
Conexión exitosa a PostgreSQL
```
