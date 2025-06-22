<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #e0dadc;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 2rem;
            color: #42373c;
        }

        .titulo-principal {
            text-align: center;
            margin: 40px 0 20px;
            font-size: 2.2rem;
            font-weight: 600;
            color: #42373c;
        }

        .navbar {
            box-shadow: 0 2px 8px rgba(255, 192, 203, 0.15);
            border-radius: 0 0 12px 12px;
            background-color: #fff0f5;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #b13e74 !important;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #d63384 !important;
        }

        .filtros-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .filtros-container select {
            padding: 8px 12px;
            border-radius: 10px;
            border: 1px solid #f5c2da;
            background-color: #ffffff;
            font-size: 1rem;
            transition: box-shadow 0.3s ease;
            color: #b13e74;
        }

        .filtros-container select:focus {
            outline: none;
            box-shadow: 0 0 8px rgba(247, 143, 179, 0.4);
        }

        .tareas-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(330px, 1fr));
            gap: 20px;
            padding: 0 30px 50px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .tarea-card {
            border-radius: 20px;
            padding: 20px 24px;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(255, 192, 203, 0.15);
            border: 1px solid #ffe0eb;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            min-height: 220px;
        }

        .tarea-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 16px rgba(255, 174, 200, 0.3);
        }

        .tarea-titulo {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 8px;
            color: #42373c;
        }

        .tarea-descripcion {
            font-size: 1rem;
            color: #6b4060;
            margin-bottom: 10px;
        }

        .tarea-meta {
            font-size: 0.9rem;
            color: #a87c9f;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 8px;
            background-color: #ffe0eb;
            font-size: 0.85rem;
            color: #a45c84;
        }

        .accion-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 10px;
            font-size: 0.95rem;
            cursor: pointer;
            font-weight: 500;
            background-color: #f78fb3;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .accion-btn:hover {
            background-color: #e6679c;
        }

        .alert {
            margin: 20px auto;
            max-width: 800px;
            border-radius: 12px;
            font-size: 1rem;
            background-color: #fff0f5;
            border: 1px dashed #f5c2da;
            color: #a45c84;
        }

        .dropdown-menu .dropdown-item {
            font-size: 0.95rem;
            color: #b13e74;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #ffe0eb;
            color: #d63384;
        }



        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .tarea-card {
            border-radius: 8px;
            padding: 1.25rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: transform 0.2s, box-shadow 0.2s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .tarea-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .tarea-titulo {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
        .tarea-descripcion {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 0.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .tarea-meta {
            font-size: 0.85rem;
            margin-bottom: 0.3rem;
        }
        .card-header {
            padding: 1rem 1.25rem;
        }
        .badge {
            font-weight: 500;
        }

    </style>

</head>
<body class="bg-light">
    <?php
    function obtenerColoresTarea($colorNombre) {
        switch (strtolower($colorNombre)) {
            case 'rojo': return ['#FF6B6B', '#FFECEC'];
            case 'azul': return ['#1E90FF', '#E6F0FF'];
            case 'verde': return ['#28A745', '#E9F7EF'];
            case 'naranja': return ['#FFA600', '#FFF3E0'];
            case 'celeste': return ['#00C1FF', '#E0F7FF'];
            case 'gris': return ['#6C757D', '#F0F0F0'];
            case 'violeta': return ['#8A2BE2', '#F3E8FF'];
            default: return ['#CCCCCC', '#F9F9F9'];
        }
    }
    ?>

    <!-- Barra de navegación mejorada -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">TareaPlanner</a>
            
            <div class="d-flex align-items-center">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2"><a class="nav-link active" href="#"><i class="bi bi-kanban"></i> Tablero</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="<?= base_url('tareas/crear') ?>"><i class="bi bi-plus-circle"></i> Crear Tarea</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="<?= base_url('tareas/historial') ?>"><i class="bi bi-clock-history"></i> Historial</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="<?= base_url('/Colaborar') ?>"><i class="bi bi-clock-history"></i> Invitaciones</a></li>
                </ul>

                <div class="dropdown ms-3">
                    <button class="btn btn-outline-primary dropdown-toggle d-flex align-items-center" type="button" id="dropdownCuenta" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-2"></i> Cuenta
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownCuenta">
                        <li><a class="dropdown-item" href="<?= site_url('usuario/editar') ?>"><i class="bi bi-pencil-square me-2"></i>Editar perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="<?= site_url('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <?php if (!empty($RecordatorioAlerta)): ?>
            <div class="alert alert-warning alert-dismissible fade show mb-4">
                <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill me-2"></i>Recordatorios</h5>
                <ul class="mb-0">
                    <?php foreach ($RecordatorioAlerta as $mensaje): ?>
                        <li><?= $mensaje ?></li>
                    <?php endforeach; ?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Sección de estadísticas/resumen -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card border-start border-primary border-4 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-muted">Tareas Activas</h5>
                        <p class="display-6 fw-bold text-primary"><?= count($tareas_propias) ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-start border-warning border-4 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-muted">Colaboraciones</h5>
                        <p class="display-6 fw-bold text-warning"><?= count($tareas_colaborativas) ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-start border-success border-4 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-muted">Próximas</h5>
                        <p class="display-6 fw-bold text-success"><?= count(array_filter($tareas_propias, function($t) { 
                            return strtotime($t['fecha_vencimiento']) <= strtotime('+3 days'); 
                        })) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Mis Tareas -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h2 class="h5 mb-0 fw-bold"><i class="bi bi-list-task me-2"></i>Mis Tareas</h2>
                <div class="filtros-container d-flex gap-2">
                    <select id="filtro-prioridad-tareas" class="form-select form-select-sm w-auto">
                        <option value="">Prioridad</option>
                        <option value="baja">Baja</option>
                        <option value="normal">Normal</option>
                        <option value="alta">Alta</option>
                    </select>

                    <select id="filtro-estado-tareas" class="form-select form-select-sm w-auto">
                        <option value="">Estado</option>
                        <option value="definida">Definida</option>
                        <option value="en_proceso">En Proceso</option>
                        <option value="completada">Completada</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <?php if (!empty($tareas_propias)): ?>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="tareasContainer">
                        <?php foreach ($tareas_propias as $tarea): ?>
                            <?php [$borde, $fondo] = obtenerColoresTarea($tarea['color']); ?>
                            <div class="col">
                                <div class="tarea-card h-100 show"
                                    draggable="true"
                                    data-estado="<?= esc(strtolower($tarea['estado'])) ?>"
                                    data-prioridad="<?= esc(strtolower($tarea['prioridad'])) ?>"
                                    data-fecha="<?= esc($tarea['fecha_vencimiento']) ?>"
                                    style="background-color: <?= esc($fondo) ?>; border-left: 6px solid <?= esc($borde) ?>;">
                                    <form method="POST" action="<?= site_url('tarea') ?>" style="margin: 0;">
                                        <input type="hidden" name="tarea_id" value="<?= esc($tarea['id']) ?>">
                                        <button type="submit" style="all: unset; cursor: pointer; display: block; width: 100%;">
                                            <div class="tarea-titulo fw-bold"><?= esc($tarea['titulo']) ?></div>
                                            <div class="tarea-descripcion text-muted mb-2"><?= esc($tarea['descripcion']) ?></div>
                                            <hr class="my-2">
                                            <div class="tarea-meta"><strong>Estado:</strong> <span class="badge bg-light text-dark"><?= esc($tarea['estado']) ?></span></div>
                                            <div class="tarea-meta"><strong>Prioridad:</strong> <span class="badge bg-<?= esc(strtolower($tarea['prioridad'])) == 'alta' ? 'danger' : (esc(strtolower($tarea['prioridad'])) == 'normal' ? 'warning' : 'success') ?>"><?= esc($tarea['prioridad']) ?></span></div>
                                            <div class="tarea-meta"><strong>Vence:</strong> <?= date('d/m/Y', strtotime(esc($tarea['fecha_vencimiento']))) ?></div>
                                            <?php if (!empty($tarea['fecha_recordatorio'])): ?>
                                                <div class="tarea-meta"><i class="bi bi-alarm"></i> <?= date('d/m/Y H:i', strtotime(esc($tarea['fecha_recordatorio']))) ?></div>
                                            <?php endif; ?>
                                        </button>
                                    </form>

                                    <div class="d-flex gap-2 mt-3">
                                        <form action="<?= site_url('tarea/editar') ?>" method="post" class="flex-grow-1">
                                            <input type="hidden" name="id_tarea" value="<?= esc($tarea['id']) ?>">
                                            <button type="submit" class="btn btn-sm btn-warning w-100"><i class="bi bi-pencil"></i> Editar</button>
                                        </form>
                                        <form action="<?= site_url('tarea/baja') ?>" method="post" class="flex-grow-1">
                                            <input type="hidden" name="id_tarea" value="<?= esc($tarea['id']) ?>">
                                            <button type="submit" class="btn btn-sm btn-secondary w-100"><i class="bi bi-trash"></i> Borrar</button>
                                        </form>
                                    </div>

                                    <?php if ($tarea['estado'] === 'completada' && !$tarea['archivada']): ?>
                                        <a href="<?= site_url('tarea/archivar/' . $tarea['id']) ?>"
                                           class="d-block text-center mt-2 btn btn-success btn-sm rounded-top-0">
                                            <i class="bi bi-archive"></i> Archivar
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-5">
                        <i class="bi bi-check-circle-fill text-muted" style="font-size: 3rem;"></i>
                        <h5 class="mt-3">No tienes tareas activas</h5>
                        <p class="text-muted">¡Crea tu primera tarea para comenzar!</p>
                        <a href="<?= base_url('tareas/crear') ?>" class="btn btn-primary mt-2">
                            <i class="bi bi-plus-circle"></i> Crear Tarea
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sección de Colaboraciones -->
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h2 class="h5 mb-0 fw-bold"><i class="bi bi-people-fill me-2"></i>Mis Colaboraciones</h2>
                <div class="filtros-container d-flex gap-2">
                    <select id="filtro-prioridad-colaboraciones" class="form-select form-select-sm w-auto">
                        <option value="">Prioridad</option>
                        <option value="baja">Baja</option>
                        <option value="normal">Normal</option>
                        <option value="alta">Alta</option>
                    </select>

                    <select id="filtro-estado-colaboraciones" class="form-select form-select-sm w-auto">
                        <option value="">Estado</option>
                        <option value="definida">Definida</option>
                        <option value="en_proceso">En Proceso</option>
                        <option value="completada">Completada</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <?php if (!empty($tareas_colaborativas)): ?>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="colaboracionesContainer">
                        <?php foreach ($tareas_colaborativas as $tarea): ?>
                            <?php [$borde, $fondo] = obtenerColoresTarea($tarea['color']); ?>
                            <div class="col">
                                <div class="tarea-card h-100 show"
                                    data-estado="<?= esc(strtolower($tarea['estado'])) ?>"
                                    data-prioridad="<?= esc(strtolower($tarea['prioridad'])) ?>"
                                    data-fecha="<?= esc($tarea['fecha_vencimiento']) ?>"
                                    style="background-color: <?= esc($fondo) ?>; border-left: 6px solid <?= esc($borde) ?>;">
                                    <form method="POST" action="<?= site_url('tarea/colaborar') ?>" style="margin: 0;">
                                        <input type="hidden" name="tarea_id" value="<?= esc($tarea['id']) ?>">
                                        <button type="submit" style="all: unset; cursor: pointer; display: block; width: 100%;">
                                            <div class="tarea-titulo fw-bold"><?= esc($tarea['titulo']) ?></div>
                                            <div class="tarea-descripcion text-muted mb-2"><?= esc($tarea['descripcion']) ?></div>
                                            <hr class="my-2">
                                            <div class="tarea-meta"><strong>Estado:</strong> <span class="badge bg-light text-dark"><?= esc($tarea['estado']) ?></span></div>
                                            <div class="tarea-meta"><strong>Prioridad:</strong> <span class="badge bg-<?= esc(strtolower($tarea['prioridad'])) == 'alta' ? 'danger' : (esc(strtolower($tarea['prioridad'])) == 'normal' ? 'warning' : 'success') ?>"><?= esc($tarea['prioridad']) ?></span></div>
                                            <div class="tarea-meta"><strong>Vence:</strong> <?= date('d/m/Y', strtotime(esc($tarea['fecha_vencimiento']))) ?></div>
                                            <?php if (!empty($tarea['fecha_recordatorio'])): ?>
                                                <div class="tarea-meta"><i class="bi bi-alarm"></i> <?= date('d/m/Y H:i', strtotime(esc($tarea['fecha_recordatorio']))) ?></div>
                                            <?php endif; ?>
                                        </button>
                                    </form>
                                    <div class="tarea-meta mt-2"><i class="bi bi-person"></i> Propietario: ID <?= esc($tarea['usuario_id']) ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-5">
                        <i class="bi bi-person-plus text-muted" style="font-size: 3rem;"></i>
                        <h5 class="mt-3">No tienes colaboraciones</h5>
                        <p class="text-muted">¡Únete a tareas de otros usuarios para colaborar!</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener("DOMContentLoaded", () => {
            // Animación para mostrar las tarjetas
            document.querySelectorAll('.tarea-card').forEach((card, i) => {
                setTimeout(() => card.classList.add('show'), i * 100);
            });

            // Inicializar filtros
            const filtrosTareas = {
                prioridad: document.getElementById('filtro-prioridad-tareas'),
                estado: document.getElementById('filtro-estado-tareas'),
            };

            const filtrosColaboraciones = {
                prioridad: document.getElementById('filtro-prioridad-colaboraciones'),
                estado: document.getElementById('filtro-estado-colaboraciones'),
            };

            // Asignar eventos a los filtros de tareas
            Object.values(filtrosTareas).forEach(el => {
                el.addEventListener('change', () => filtrarTareas('tareasContainer', filtrosTareas));
            });

            // Asignar eventos a los filtros de colaboraciones
            Object.values(filtrosColaboraciones).forEach(el => {
                el.addEventListener('change', () => filtrarTareas('colaboracionesContainer', filtrosColaboraciones));
            });

            // Función para filtrar las tarjetas
            function filtrarTareas(containerId, filtros) {
                const container = document.getElementById(containerId);
                if (!container) return;

                const cards = container.querySelectorAll('.tarea-card');
                const prio = filtros.prioridad.value.toLowerCase();
                const estado = filtros.estado.value.toLowerCase();

                let hasVisibleCards = false;
                
                cards.forEach(card => {
                    const cardPrio = card.dataset.prioridad.toLowerCase();
                    const cardEstado = card.dataset.estado.toLowerCase();
                    
                    const matchPrio = !prio || cardPrio === prio;
                    const matchEstado = !estado || cardEstado === estado;
                    
                    const shouldShow = matchPrio && matchEstado;
                    card.style.display = shouldShow ? 'block' : 'none';
                    
                    if (shouldShow) hasVisibleCards = true;
                });

                // Mostrar mensaje si no hay resultados
                const noResultsMsg = container.parentElement.querySelector('.no-results');
                if (noResultsMsg) {
                    noResultsMsg.style.display = hasVisibleCards ? 'none' : 'block';
                }
            }

            // Drag and drop (solo para tareas propias)
            let dragged = null;
            document.querySelectorAll('#tareasContainer .tarea-card[draggable="true"]').forEach(card => {
                card.addEventListener('dragstart', () => dragged = card);
                card.addEventListener('dragover', e => e.preventDefault());
                card.addEventListener('drop', e => {
                    e.preventDefault();
                    if (dragged && dragged !== card) {
                        const container = document.getElementById('tareasContainer');
                        container.insertBefore(dragged, card);
                    }
                });
            });
        });
    </script>
</body>
</html>
