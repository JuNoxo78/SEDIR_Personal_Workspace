const express = require('express');
const path = require('path');

const healthRoutes = require('./routes/health.routes');
const authRoutes = require('./routes/auth.routes');
const noticiaRoutes = require('./routes/noticia.routes');
const proyectoRoutes = require('./routes/proyecto.routes');
const { notFoundHandler, errorHandler } = require('./middleware/errorHandler');

const app = express();

app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, '..', '..', 'public')));

app.use(healthRoutes);
app.use('/api/auth', authRoutes);
app.use('/api/noticias', noticiaRoutes);
app.use('/api/proyectos', proyectoRoutes);

app.use(notFoundHandler);
app.use(errorHandler);

module.exports = app;