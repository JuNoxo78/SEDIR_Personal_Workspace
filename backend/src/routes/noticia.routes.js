const express = require('express');

const {
  obtenerNoticias,
  crearNoticia,
  actualizarNoticia,
  eliminarNoticia,
} = require('../controllers/noticia.controller');
const { requireAdmin, requireAuth } = require('../middleware/auth.middleware');

const router = express.Router();

router.get('/', obtenerNoticias);
router.post('/', requireAuth, requireAdmin, crearNoticia);
router.put('/:id', requireAuth, requireAdmin, actualizarNoticia);
router.delete('/:id', requireAuth, requireAdmin, eliminarNoticia);

module.exports = router;
