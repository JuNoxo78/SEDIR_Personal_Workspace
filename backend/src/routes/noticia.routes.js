const express = require('express');

const {
  obtenerNoticias,
  crearNoticia,
  actualizarNoticia,
  eliminarNoticia,
} = require('../controllers/noticia.controller');
const { requireAuth } = require('../middleware/auth.middleware');

const router = express.Router();

router.get('/', obtenerNoticias);
router.post('/', requireAuth, crearNoticia);
router.put('/:id', requireAuth, actualizarNoticia);
router.delete('/:id', requireAuth, eliminarNoticia);

module.exports = router;