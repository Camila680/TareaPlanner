<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rutas de autenticación
$routes->get('/login', 'UsuarioController::login');
$routes->get('/logout', 'usuarioController::logout');
$routes->get('/registro', 'UsuarioController::registrarse');
$routes->post('usuario/guardarRegistro', 'usuarioController::guardarRegistro');
$routes->post('usuario/autenticar', 'usuarioController::autenticar');

// Rutas de usuario
$routes->get('usuario/editar', 'UsuarioController::editarView');
$routes->post('usuario/editarguardar', 'UsuarioController::editarGuardar');

// Rutas principales
$routes->get('/', 'Home::inicio');
$routes->get('/redirigirATarea', 'TareaController::redirigirATarea');

// Rutas de tareas
$routes->get('tareas/crear', 'tareaController::crear');
$routes->post('tareas/guardar', 'tareaController::guardar');
$routes->post('/tarea', 'tareaController::mostrarDetalles');
$routes->get('tarea/mostrarDetalles', 'tareaController::mostrarDetalles');
$routes->post('tarea/editar', 'TareaController::editar');
$routes->post('tarea/actualizar', 'TareaController::actualizar');
$routes->post('tarea/baja', 'TareaController::baja');
$routes->get('tareas/historial', 'tareaController::historial');
$routes->get('tarea/archivar/(:num)', 'tareaController::archivar/$1');

// Rutas de subtareas
$routes->post('subtarea/guardar', 'subTareaController::guardar');
$routes->post('subtarea/crear', 'subTareaController::crear');
$routes->post('subtarea/eliminar/(:num)', 'subTareaController::eliminar/$1');
$routes->post('subtarea/editar/(:num)', 'subTareaController::editar/$1');
$routes->post('subtarea/quitarResponsable', 'subTareaController::quitarResponsable');
$routes->post('subtarea/agregarResponsable', 'subTareaController::agregarResponsable');
$routes->post('/subtareas/cambiarEstado', 'subTareaController::cambiarEstado');

// Rutas de colaboración
$routes->get('/colaboradores', 'colaboracionController::mostrarDetalles');
$routes->post('tarea/colaborar', 'colaboracionController::tareaColaborar');
$routes->get('/Colaborar', 'colaboracionController::ColaborarEnTarea');

// Rutas de invitación
$routes->post('tarea/enviarCorreo', 'InvitacionController::enviarCorreo');
$routes->post('invitacion/verificar', 'InvitacionController::IniciarColaboracion');