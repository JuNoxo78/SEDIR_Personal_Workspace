const express = require('express');

const {
  obtenerProyectos,
  crearProyecto,
  actualizarProyecto,
  eliminarProyecto,
} = require('../controllers/proyecto.controller');
const { requireAuth } = require('../middleware/auth.middleware');

const router = express.Router();

router.get('/', obtenerProyectos);
router.post('/', requireAuth, crearProyecto);
router.put('/:id', requireAuth, actualizarProyecto);
router.delete('/:id', requireAuth, eliminarProyecto);

module.exports = router;