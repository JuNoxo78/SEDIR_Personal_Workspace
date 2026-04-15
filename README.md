# sedir-web-2026

Rediseño integral del sitio web de SEDIR - 2026. Este repositorio ahora incluye una base backend para convertir el sitio en una plataforma web dinamica.

## Requisitos

- Node.js 18+

## Ejecucion local

1. Instalar dependencias:

```bash
npm install
```

2. Iniciar servidor:

```bash
npm run dev
```

3. Abrir en navegador:

```text
http://localhost:3000
```

## Endpoints API iniciales

- `GET /api/health`: estado del servicio.
- `GET /api/noticias`: noticias de ejemplo en JSON.
- `GET /api/proyectos`: proyectos de ejemplo en JSON.
- `GET /api/dashboard`: indicadores para dashboard (produccion + clima).

## Datos

Los datos iniciales viven en `data/` para una transicion rapida a base de datos en el siguiente paso:

- `data/noticias.json`
- `data/proyectos.json`
- `data/indicadores.json`

## Siguiente fase recomendada

1. Migrar `data/*.json` a PostgreSQL.
2. Agregar capa de servicios y validaciones.
3. Implementar autenticacion para acceso al dashboard administrativo.

## Reglas responsive del equipo (obligatorias)

Todo desarrollo nuevo debe ser responsive (celular, tablet y laptop).

Reglas obligatorias:

- Usar layout flexible (`flex` o `grid`).
- Evitar anchos fijos para contenedores principales.
- Usar imagenes adaptables (`max-width: 100%`, `height: auto`).
- Probar siempre en vista movil (DevTools).
- Mantener un solo CSS base del proyecto (`public/activos/css/estilo_home.css`).

Checklist minimo por pagina:

- Incluir `<meta name="viewport" content="width=device-width, initial-scale=1.0">`.
- Verificar navegacion usable en movil.
- Verificar que no haya scroll horizontal no deseado.
- Verificar textos legibles en pantallas pequenas.

Errores a evitar:

- Disenar solo para escritorio.
- Usar contenedores principales con ancho fijo (ej. `width: 1200px`).
- Imagenes que se desbordan.
- Tipografia demasiado pequena en movil.
