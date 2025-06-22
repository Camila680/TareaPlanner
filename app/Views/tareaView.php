<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de Tarea - PickTask</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem 0;
        }
        
        .main-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        
        .page-header {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e9ecef;
        }
        
        .page-title {
            font-weight: 600;
            color: #212529;
            margin-bottom: 0.5rem;
        }
        
        .task-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            border-left: 6px solid;
        }
        
        .task-title {
            font-weight: 600;
            font-size: 1.5rem;
            color: #212529;
            margin-bottom: 1rem;
        }
        
        .task-description {
            color: #495057;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        .task-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .meta-item {
            min-width: 200px;
        }
        
        .meta-label {
            font-weight: 500;
            color: #6c757d;
            margin-bottom: 0.25rem;
            font-size: 0.9rem;
        }
        
        .meta-value {
            font-weight: 500;
            color: #212529;
        }
        
        .badge-priority {
            padding: 0.35rem 0.75rem;
            border-radius: 50rem;
            font-weight: 600;
        }
        
        .badge-high {
            background-color: #dc3545;
            color: white;
        }
        
        .badge-medium {
            background-color: #fd7e14;
            color: white;
        }
        
        .badge-low {
            background-color: #28a745;
            color: white;
        }
        
        .section-title {
            font-weight: 600;
            color: #212529;
            margin: 2rem 0 1.5rem;
            padding-left: 0.5rem;
            border-left: 4px solid #0d6efd;
        }
        
        .collaborators-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .collaborator-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .collaborator-item {
            padding: 0.5rem 0;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
        }
        
        .collaborator-item:last-child {
            border-bottom: none;
        }
        
        .btn-action {
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
        }
        
        .btn-invite {
            background-color: #28a745;
            color: white;
        }
        
        .btn-invite:hover {
            background-color: #218838;
        }
        
        .btn-add {
            background-color: #0d6efd;
            color: white;
        }
        
        .btn-add:hover {
            background-color: #0b5ed7;
        }
        
        .subtask-card {
            background: #ffffff;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border-left: 4px solid;
            transition: transform 0.2s ease;
        }
        
        .subtask-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .subtask-title {
            font-weight: 600;
            color: #212529;
            margin-bottom: 0.75rem;
        }
        
        .subtask-description {
            color: #495057;
            margin-bottom: 1rem;
        }
        
        .subtask-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        
        .subtask-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
        }
        
        .responsibles-list {
            list-style: none;
            padding: 0;
            margin: 1rem 0 0 0;
        }
        
        .responsible-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem;
            background-color: #f8f9fa;
            border-radius: 6px;
            margin-bottom: 0.5rem;
        }
        
        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #adb5bd;
        }
        
        /* Modal styles */
        .modal-content {
            border-radius: 12px;
            border: none;
        }
        
        .modal-header {
            border-bottom: 1px solid #e9ecef;
        }
        
        .modal-footer {
            border-top: 1px solid #e9ecef;
        }
        
        @media (max-width: 768px) {
            .task-meta {
                flex-direction: column;
                gap: 1rem;
            }
            
            .subtask-actions {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .btn-action {
                width: 100%;
                justify-content: center;
            }
        }
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
    </style>
</head>
<body>
<div class="main-container">
    <a href="<?= base_url() ?>" class="btn-volver">
        <i class="bi bi-arrow-left"></i> Volver al tablero
    </a>
</div>
    <div class="main-container">
        <div class="page-header">
            <h1 class="page-title"><i class="bi bi-card-checklist me-2"></i>Detalles de la Tarea</h1>
        </div>
        <?php function obtenerColoresTarea($colorNombre) {
            switch (strtolower($colorNombre)) {
                case 'rojo': //alta
                    return ['#FF6B6B', '#FFECEC'];
                case 'azul': //media
                    return ['#1E90FF', '#E6F0FF'];
                case 'verde': //baja
                    return ['#28A745', '#E9F7EF'];
                case 'naranja': //alta
                    return ['#FFA600', '#FFF3E0'];
                case 'celeste': //media
                    return ['#00C1FF', '#E0F7FF'];
                case 'gris': //baja
                    return ['#6C757D', '#F0F0F0'];
                case 'violeta': //media
                    return ['#8A2BE2', '#F3E8FF'];
                default:
                    return ['#CCCCCC', '#F9F9F9'];
            }
        } ?>
        
        <?php if (!empty($tarea)): ?>
            <div class="task-card" style="border-left-color: <?= esc($tarea['color']) ?>;">
                <h2 class="task-title"><?= esc($tarea['titulo']) ?></h2>
                <p class="task-description"><?= esc($tarea['descripcion']) ?></p>
                
                <div class="task-meta">
                    <div class="meta-item">
                        <div class="meta-label">Estado</div>
                        <div class="meta-value"><?= esc($tarea['estado']) ?></div>
                    </div>
                    
                    <div class="meta-item">
                        <div class="meta-label">Prioridad</div>
                        <div class="meta-value">
                            <span class="badge-priority badge-<?= strtolower($tarea['prioridad']) ?>">
                                <?= esc($tarea['prioridad']) ?>
                            </span>
                        </div>
                    </div>
                    
                    <div class="meta-item">
                        <div class="meta-label">Fecha de vencimiento</div>
                        <div class="meta-value"><?= date('d/m/Y', strtotime(esc($tarea['fecha_vencimiento']))) ?></div>
                    </div>
                    
                    <?php if ($tarea['fecha_recordatorio']): ?>
                    <div class="meta-item">
                        <div class="meta-label">Recordatorio</div>
                        <div class="meta-value"><?= date('d/m/Y H:i', strtotime(esc($tarea['fecha_recordatorio']))) ?></div>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="d-flex gap-2">
                    <button onclick="mostrarModalInvitar()" class="btn-action btn-invite">
                        <i class="bi bi-envelope-plus"></i> Invitar por correo
                    </button>
                    <button onclick="mostrarModalSubtarea()" class="btn-action btn-add">
                        <i class="bi bi-plus-circle"></i> Crear subtarea
                    </button>
                </div>
            </div>
            
            <?php if (!empty($colaboradores_disponibles)): ?>
                <div class="collaborators-card">
                    <h4 class="section-title"><i class="bi bi-people-fill me-2"></i>Colaboradores disponibles</h4>
                    <p class="text-muted mb-3">Puedes asignar estos colaboradores a las subtareas</p>
                    
                    <ul class="collaborator-list">
                        <?php foreach ($colaboradores_disponibles as $colab): ?>
                            <li class="collaborator-item">
                                <div>
                                    <i class="bi bi-person-circle me-2"></i>
                                    <strong><?= esc($colab['nombre']) ?></strong> - <?= esc($colab['correo']) ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php else: ?>
                <div class="alert alert-info">
                    <i class="bi bi-info-circle-fill me-2"></i> No hay colaboradores disponibles para asignar
                </div>
            <?php endif; ?>
            
            <h3 class="section-title"><i class="bi bi-list-task me-2"></i>Subtareas</h3>

            <?php if (!empty($subtareas)): ?>
                <?php foreach ($subtareas as $sub): ?>
                    <?php [$borde, $fondo] = obtenerColoresTarea($sub['color']); ?>
                    
                    <div class="subtask-card" style="border-left-color: <?= $borde ?>; background-color: <?= $fondo ?>;">
                        <h4 class="subtask-title"><?= esc($sub['titulo']) ?></h4>
                        <p class="subtask-description"><?= esc($sub['descripcion']) ?></p>
                        
                        <div class="subtask-meta">
                            <div>
                                <div class="meta-label">Estado</div>
                                <div class="meta-value"><?= esc(ucfirst(str_replace('_', ' ', $sub['estado']))) ?></div>
                            </div>
                            
                            <div>
                                <div class="meta-label">Prioridad</div>
                                <div class="meta-value">
                                    <?php 
                                    // Convertir prioridad a formato consistente
                                    $prioridad = strtolower($sub['prioridad']);
                                    $prioridadMostrar = '';
                                    
                                    // Mapeo de valores de prioridad
                                    if ($prioridad === 'alta' || $prioridad === 'high') {
                                        $prioridad = 'alta';
                                        $prioridadMostrar = 'Alta';
                                    } elseif ($prioridad === 'media' || $prioridad === 'normal' || $prioridad === 'medium') {
                                        $prioridad = 'media';
                                        $prioridadMostrar = 'Media';
                                    } elseif ($prioridad === 'baja' || $prioridad === 'low') {
                                        $prioridad = 'baja';
                                        $prioridadMostrar = 'Baja';
                                    } else {
                                        $prioridad = 'media'; // Valor por defecto si no coincide
                                        $prioridadMostrar = ucfirst($prioridad);
                                    }
                                    ?>
                                    <span class="badge-priority badge-<?= esc($prioridad) ?>">
                                        <?= esc($prioridadMostrar) ?>
                                    </span>
                                </div>
                            </div>
                            
                            <div>
                                <div class="meta-label">Vencimiento</div>
                                <div class="meta-value"><?= date('d/m/Y', strtotime(esc($sub['fecha_vencimiento']))) ?></div>
                            </div>
                            
                            <?php if (!empty($sub['fecha_recordatorio'])): ?>
                            <div>
                                <div class="meta-label">Recordatorio</div>
                                <div class="meta-value"><?= date('d/m/Y H:i', strtotime(esc($sub['fecha_recordatorio']))) ?></div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($sub['responsables'])): ?>
                            <div class="mt-3">
                                <h5 class="meta-label mb-2">Responsables:</h5>
                                <ul class="responsibles-list">
                                    <?php foreach ($sub['responsables'] as $usuario): ?>
                                        <li class="responsible-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="bi bi-person-check me-2"></i>
                                                <?= esc($usuario['nombre']) ?> (<?= esc($usuario['correo']) ?>)
                                            </div>
                                            <form action="<?= base_url('subtarea/quitarResponsable') ?>" method="post" style="margin: 0;">
                                                <input type="hidden" name="subtarea_id" value="<?= esc($sub['id']) ?>">
                                                <input type="hidden" name="usuario_id" value="<?= esc($usuario['id']) ?>">
                                                <input type="hidden" name="tarea_id" value="<?= esc($tarea['id']) ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Quitar a <?= esc($usuario['nombre']) ?> de esta subtarea?')">
                                                    <i class="bi bi-x-lg"></i> Quitar
                                                </button>
                                            </form>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php else: ?>
                            <p class="text-muted mt-3"><i class="bi bi-info-circle"></i> Sin responsables asignados</p>
                        <?php endif; ?>
                        
                        <div class="subtask-actions d-flex justify-content-between align-items-center mt-3">
                            <div>
                                <?php if (!empty($colaboradores_disponibles)): ?>
                                    <button type="button" class="btn btn-sm btn-success" onclick="abrirModal(<?= esc($sub['id']) ?>)">
                                        <i class="bi bi-person-plus"></i> Agregar responsable
                                    </button>
                                <?php endif; ?>
                            </div>
                            
                            <div class="d-flex gap-2">
                                <!-- Botón Editar -->
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editarSubtareaModal<?= $sub['id'] ?>">
                                    <i class="bi bi-pencil"></i> Editar
                                </button>
                                
                                <!-- Botón Eliminar -->
                                <form action="<?= base_url('subtarea/eliminar/' . $sub['id']) ?>" method="post" style="margin: 0;">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="tarea_id" value="<?= esc($tarea['id']) ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que querés eliminar esta subtarea?')">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de Edición -->
                    <div class="modal fade" id="editarSubtareaModal<?= $sub['id'] ?>" tabindex="-1" aria-labelledby="editarSubtareaLabel<?= $sub['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="<?= base_url('subtarea/editar/' . $sub['id']) ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarSubtareaLabel<?= $sub['id'] ?>">Editar Subtarea</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Título</label>
                                            <input type="text" class="form-control" name="titulo" value="<?= esc($sub['titulo']) ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Descripción</label>
                                            <textarea class="form-control" name="descripcion" rows="3" required><?= esc($sub['descripcion']) ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Estado</label>
                                            <select name="estado" class="form-select" required>
                                                <option value="creada" <?= $sub['estado'] === 'creada' ? 'selected' : '' ?>>Creada</option>
                                                <option value="en_proceso" <?= $sub['estado'] === 'en_proceso' ? 'selected' : '' ?>>En proceso</option>
                                                <option value="completada" <?= $sub['estado'] === 'completada' ? 'selected' : '' ?>>Completada</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Prioridad</label>
                                            <select name="prioridad" class="form-select" required>
                                                <?php 
                                                // Asegurar que el valor seleccionado coincida con la base de datos
                                                $prioridadActual = strtolower($sub['prioridad']);
                                                if (!in_array($prioridadActual, ['alta', 'media', 'baja'])) {
                                                    $prioridadActual = 'media'; // Valor por defecto si no es válido
                                                }
                                                ?>
                                                <option value="baja" <?= $prioridadActual === 'baja' ? 'selected' : '' ?>>Baja</option>
                                                <option value="media" <?= $prioridadActual === 'media' ? 'selected' : '' ?>>Media</option>
                                                <option value="alta" <?= $prioridadActual === 'alta' ? 'selected' : '' ?>>Alta</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Fecha de vencimiento</label>
                                            <input type="date" class="form-control" name="fecha_vencimiento" value="<?= esc($sub['fecha_vencimiento']) ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Fecha de recordatorio</label>
                                            <input type="datetime-local" class="form-control" name="fecha_recordatorio" value="<?= esc($sub['fecha_recordatorio']) ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Color</label>
                                            <select name="color" class="form-select">
                                                <?php $colores = ['rojo', 'azul', 'verde', 'naranja', 'celeste', 'gris', 'violeta']; ?>
                                                <?php foreach ($colores as $color): ?>
                                                    <option value="<?= $color ?>" <?= $sub['color'] === $color ? 'selected' : '' ?>><?= ucfirst($color) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty-state">
                    <i class="bi bi-list-check"></i>
                    <h5>No hay subtareas registradas</h5>
                    <p>Crea la primera subtarea para comenzar a organizar el trabajo</p>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> No se encontró la tarea
            </div>
        <?php endif; ?>
    </div>

    <!-- Modal para agregar responsable -->
    <div class="modal fade" id="modalAgregarResponsable" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar responsable</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <form action="<?= base_url('subtarea/agregarResponsable') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <input type="hidden" name="subtarea_id" id="modalSubtareaId">
                        <input type="hidden" name="tarea_id" value="<?= esc($tarea['id']) ?>">
                        <div class="mb-3">
                            <label for="usuario_id" class="form-label">Seleccionar colaborador:</label>
                            <select name="usuario_id" id="usuario_id" class="form-select" required>
                                <?php foreach ($colaboradores_disponibles as $colab): ?>
                                    <option value="<?= esc($colab['id']) ?>"><?= esc($colab['nombre']) ?> (<?= esc($colab['correo']) ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Asignar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para invitar por correo -->
    <div class="modal fade" id="modalInvitarCorreo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Invitar colaborador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <form action="<?= base_url('tarea/enviarCorreo') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo del colaborador:</label>
                            <input type="email" name="correo" id="correo" class="form-control" placeholder="ejemplo@gmail.com" required>
                        </div>
                        <input type="hidden" name="tarea_id" value="<?= esc($tarea['id']) ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Enviar invitación</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para crear subtarea -->
    <div class="modal fade" id="modalCrearSubtarea" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear nueva subtarea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <form id="formCrearSubtarea" action="<?= base_url('subtarea/crear') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <input type="hidden" name="tarea_id" value="<?= esc($tarea['id']) ?>">
                        
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado" id="estadoCreada" value="creada" checked required>
                                <label class="form-check-label" for="estadoCreada">Creada</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado" id="estadoProceso" value="en_proceso" required>
                                <label class="form-check-label" for="estadoProceso">En proceso</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado" id="estadoCompletada" value="completada" required>
                                <label class="form-check-label" for="estadoCompletada">Completada</label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="prioridad" class="form-label">Prioridad</label>
                            <select name="prioridad" id="prioridad" class="form-select" required>
                                <option value="alta">Alta</option>
                                <option value="media" selected>Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="fecha_vencimiento" class="form-label">Fecha de vencimiento</label>
                            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="fecha_recordatorio" class="form-label">Fecha de recordatorio</label>
                            <input type="datetime-local" name="fecha_recordatorio" id="fecha_recordatorio" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <select name="color" id="color" class="form-select" required>
                                <option value="rojo">Rojo</option>
                                <option value="azul">Azul</option>
                                <option value="verde">Verde</option>
                                <option value="naranja">Naranja</option>
                                <option value="celeste">Celeste</option>
                                <option value="gris" selected>Gris</option>
                                <option value="violeta">Violeta</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear subtarea</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function abrirModal(subtareaId) {
            document.getElementById('modalSubtareaId').value = subtareaId;
            const modal = new bootstrap.Modal(document.getElementById('modalAgregarResponsable'));
            modal.show();
        }
        
        function mostrarModalInvitar() {
            const modal = new bootstrap.Modal(document.getElementById('modalInvitarCorreo'));
            modal.show();
        }
        
        function mostrarModalSubtarea() {
            const modal = new bootstrap.Modal(document.getElementById('modalCrearSubtarea'));
            modal.show();
        }
        
        // Manejo del formulario de creación de subtarea con AJAX
        document.getElementById('formCrearSubtarea').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = e.target;
            const formData = new FormData(form);
            
            fetch(form.action, {
                method: "POST",
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("✅ Subtarea creada correctamente.");
                    const modal = bootstrap.Modal.getInstance(document.getElementById('modalCrearSubtarea'));
                    modal.hide();
                    location.reload();
                } else {
                    alert("❌ Error: " + (data.message || "No se pudo crear la subtarea."));
                }
            })
            .catch(error => {
                console.error(error);
                alert("⚠️ Hubo un error al enviar los datos.");
            });
        });
        
        function editarSubtarea(event, id) {
            event.preventDefault();
            const form = document.getElementById(`editarSubtareaForm${id}`);
            const formData = new FormData(form);
            
            fetch(`<?= base_url('subtarea/editar/') ?>${id}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    // Mostrar mensaje de éxito
                    alert('Subtarea actualizada correctamente');
                    // Cerrar el modal
                    bootstrap.Modal.getInstance(document.getElementById(`editarSubtareaModal${id}`)).hide();
                    // Recargar solo la parte necesaria de la página si es necesario
                    location.reload(); // O actualizar solo los elementos modificados
                } else {
                    alert('Error al actualizar la subtarea');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al procesar la solicitud');
            });
        }
    </script>
</body>
</html>