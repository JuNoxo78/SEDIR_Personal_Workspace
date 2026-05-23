const pool = require('../config/database');

function getMissingFields(payload, requiredFields) {
  return requiredFields.filter((field) => {
    const value = payload[field];
    return value === undefined || value === null || String(value).trim() === '';
  });
}

async function obtenerNoticias(req, res) {
  try {
    const result = await pool.query(`
      SELECT
        id_noticia AS id,
        titulo,
        fecha,
        contenido,
        imagen_portada,
        id_categoria_noticia,
        created_at,
        updated_at
      FROM noticia
      ORDER BY fecha DESC, id_noticia DESC
    `);

    res.json(result.rows);
  } catch (error) {
    res.status(500).json({
      error: error.message,
    });
  }
}

async function crearNoticia(req, res) {
  try {
    const categoriaId = Number(req.body.id_categoria_noticia);
    const missingFields = getMissingFields(req.body, [
      'titulo',
      'fecha',
      'contenido',
      'imagen_portada',
      'id_categoria_noticia',
    ]);

    if (missingFields.length) {
      return res.status(400).json({
        error: 'Faltan campos obligatorios',
        missingFields,
      });
    }

    if (!Number.isInteger(categoriaId)) {
      return res.status(400).json({
        error: 'La categoría debe ser un número entero válido',
      });
    }

    const result = await pool.query(
      `
        INSERT INTO noticia (
          titulo,
          fecha,
          contenido,
          imagen_portada,
          id_categoria_noticia
        )
        VALUES ($1, $2, $3, $4, $5)
        RETURNING
          id_noticia AS id,
          titulo,
          fecha,
          contenido,
          imagen_portada,
          id_categoria_noticia,
          created_at,
          updated_at
      `,
      [
        req.body.titulo,
        req.body.fecha,
        req.body.contenido,
        req.body.imagen_portada,
        categoriaId,
      ]
    );

    res.status(201).json(result.rows[0]);
  } catch (error) {
    res.status(500).json({
      error: error.message,
    });
  }
}

async function actualizarNoticia(req, res) {
  try {
    const { id } = req.params;
    const categoriaId = Number(req.body.id_categoria_noticia);
    const missingFields = getMissingFields(req.body, [
      'titulo',
      'fecha',
      'contenido',
      'imagen_portada',
      'id_categoria_noticia',
    ]);

    if (missingFields.length) {
      return res.status(400).json({
        error: 'Faltan campos obligatorios',
        missingFields,
      });
    }

    if (!Number.isInteger(categoriaId)) {
      return res.status(400).json({
        error: 'La categoría debe ser un número entero válido',
      });
    }

    const result = await pool.query(
      `
        UPDATE noticia
        SET
          titulo = $1,
          fecha = $2,
          contenido = $3,
          imagen_portada = $4,
          id_categoria_noticia = $5
        WHERE id_noticia = $6
        RETURNING
          id_noticia AS id,
          titulo,
          fecha,
          contenido,
          imagen_portada,
          id_categoria_noticia,
          created_at,
          updated_at
      `,
      [
        req.body.titulo,
        req.body.fecha,
        req.body.contenido,
        req.body.imagen_portada,
        categoriaId,
        id,
      ]
    );

    if (!result.rows.length) {
      return res.status(404).json({
        error: 'Noticia no encontrada',
      });
    }

    res.json(result.rows[0]);
  } catch (error) {
    res.status(500).json({
      error: error.message,
    });
  }
}

async function eliminarNoticia(req, res) {
  try {
    const { id } = req.params;

    const result = await pool.query(
      `
        DELETE FROM noticia
        WHERE id_noticia = $1
        RETURNING
          id_noticia AS id,
          titulo,
          fecha,
          contenido,
          imagen_portada,
          id_categoria_noticia,
          created_at,
          updated_at
      `,
      [id]
    );

    if (!result.rows.length) {
      return res.status(404).json({
        error: 'Noticia no encontrada',
      });
    }

    res.json({
      message: 'Noticia eliminada correctamente',
      noticia: result.rows[0],
    });
  } catch (error) {
    res.status(500).json({
      error: error.message,
    });
  }
}

module.exports = {
  obtenerNoticias,
  crearNoticia,
  actualizarNoticia,
  eliminarNoticia,
};