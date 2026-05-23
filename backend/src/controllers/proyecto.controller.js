const pool = require('../config/database');

function getMissingFields(payload, requiredFields) {
  return requiredFields.filter((field) => {
    const value = payload[field];
    return value === undefined || value === null || String(value).trim() === '';
  });
}

async function obtenerProyectos(req, res) {
  try {
    const result = await pool.query(`
      SELECT
        id_proyecto AS id,
        titulo AS nombre,
        descripcion,
        fecha_inicio,
        fecha_fin,
        estado,
        tipo_proyecto AS beneficiarios,
        imagen
      FROM proyecto
      ORDER BY fecha_inicio DESC, id_proyecto DESC
    `);

    res.json(result.rows);
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
}

async function crearProyecto(req, res) {
  try {
    const missingFields = getMissingFields(req.body, [
      'nombre',
      'descripcion',
      'fecha_inicio',
      'fecha_fin',
      'estado',
      'beneficiarios',
      'imagen',
    ]);

    if (missingFields.length) {
      return res.status(400).json({
        error: 'Faltan campos obligatorios',
        missingFields,
      });
    }

    const result = await pool.query(
      `
        INSERT INTO proyecto (
          titulo,
          descripcion,
          fecha_inicio,
          fecha_fin,
          estado,
          tipo_proyecto,
          imagen
        )
        VALUES ($1, $2, $3, $4, $5, $6, $7)
        RETURNING
          id_proyecto AS id,
          titulo AS nombre,
          descripcion,
          fecha_inicio,
          fecha_fin,
          estado,
          tipo_proyecto AS beneficiarios,
          imagen
      `,
      [
        req.body.nombre,
        req.body.descripcion,
        req.body.fecha_inicio,
        req.body.fecha_fin,
        req.body.estado,
        req.body.beneficiarios,
        req.body.imagen,
      ]
    );

    res.status(201).json(result.rows[0]);
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
}

async function actualizarProyecto(req, res) {
  try {
    const { id } = req.params;
    const missingFields = getMissingFields(req.body, [
      'nombre',
      'descripcion',
      'fecha_inicio',
      'fecha_fin',
      'estado',
      'beneficiarios',
      'imagen',
    ]);

    if (missingFields.length) {
      return res.status(400).json({
        error: 'Faltan campos obligatorios',
        missingFields,
      });
    }

    const result = await pool.query(
      `
        UPDATE proyecto
        SET
          titulo = $1,
          descripcion = $2,
          fecha_inicio = $3,
          fecha_fin = $4,
          estado = $5,
          tipo_proyecto = $6,
          imagen = $7
        WHERE id_proyecto = $8
        RETURNING
          id_proyecto AS id,
          titulo AS nombre,
          descripcion,
          fecha_inicio,
          fecha_fin,
          estado,
          tipo_proyecto AS beneficiarios,
          imagen
      `,
      [
        req.body.nombre,
        req.body.descripcion,
        req.body.fecha_inicio,
        req.body.fecha_fin,
        req.body.estado,
        req.body.beneficiarios,
        req.body.imagen,
        id,
      ]
    );

    if (!result.rows.length) {
      return res.status(404).json({ error: 'Proyecto no encontrado' });
    }

    res.json(result.rows[0]);
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
}

async function eliminarProyecto(req, res) {
  try {
    const { id } = req.params;
    const result = await pool.query(
      `
        DELETE FROM proyecto
        WHERE id_proyecto = $1
        RETURNING
          id_proyecto AS id,
          titulo AS nombre,
          descripcion,
          fecha_inicio,
          fecha_fin,
          estado,
          tipo_proyecto AS beneficiarios,
          imagen
      `,
      [id]
    );

    if (!result.rows.length) {
      return res.status(404).json({ error: 'Proyecto no encontrado' });
    }

    res.json({
      message: 'Proyecto eliminado correctamente',
      proyecto: result.rows[0],
    });
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
}

module.exports = {
  obtenerProyectos,
  crearProyecto,
  actualizarProyecto,
  eliminarProyecto,
};