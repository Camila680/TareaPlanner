<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de la Tarea - TareaPlanner</title>
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
        
        .state-form {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
        }
        
        .state-form label {
            margin-right: 1rem;
            cursor: pointer;
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
        }
    </style>
</head>
<div class="main-container">
    <a href="<?= base_url() ?>" class="btn-volver">
        <i class="bi bi-arrow-left"></i> Volver al tablero
    </a>
</div>
<body>
    <div class="main-container">
        <div class="page-header">
            <h1 class="page-title"><i class="bi bi-card-checklist me-2"></i>Detalles de la Tarea</h1>
        </div>
        <?php    function obtenerColoresTarea($colorNombre)
{
    switch (strtolower($colorNombre)) {
        case 'rojo': //alata
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
                
                <?php if (!empty($colaboradores_disponibles)): ?>
                    <div class="collaborators-card">
                        <h4 class="section-title"><i class="bi bi-people-fill me-2"></i>Colaboradores disponibles</h4>
                        <p class="text-muted mb-3">Puedes asignar estos colaboradores a las subtareas (<?= count($colaboradores_disponibles) ?>)</p>
                        
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
                
                
            </div>
            
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
                                <div class="meta-value"><?= esc($sub['estado']) ?></div>
                            </div>
                            
                            <div>
                                <div class="meta-label">Prioridad</div>
                                <div class="meta-value">
                                    <span class="badge-priority badge-<?= strtolower($sub['prioridad']) ?>">
                                        <?= esc($sub['prioridad']) ?>
                                    </span>
                                </div>
                            </div>
                            
                            <div>
                                <div class="meta-label">Vencimiento</div>
                                <div class="meta-value"><?= date('d/m/Y', strtotime(esc($sub['fecha_vencimiento']))) ?></div>
                            </div>
                            
                            <?php if ($sub['fecha_recordatorio']): ?>
                            <div>
                                <div class="meta-label">Recordatorio</div>
                                <div class="meta-value"><?= date('d/m/Y H:i', strtotime(esc($sub['fecha_recordatorio']))) ?></div>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <?php if (!empty($sub['responsables'])): ?>
                            <div>
                                <h5 class="meta-label mb-2">Responsables:</h5>
                                <ul class="responsibles-list">
                                    <?php foreach ($sub['responsables'] as $usuario): ?>
                                        <li class="responsible-item">
                                            <div>
                                                <i class="bi bi-person-check me-2"></i>
                                                <?= esc($usuario['nombre']) ?> (<?= esc($usuario['correo']) ?>)
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php else: ?>
                            <p class="text-muted"><i class="bi bi-info-circle"></i> Sin responsables asignados</p>
                        <?php endif; ?>
                        
                        <?php
                            $esResponsable = false;
                            foreach ($sub['responsables'] as $usuario) {
                                if ($usuario['correo'] === $correo_usuario_logueado) {
                                    $esResponsable = true;
                                    break;
                                }
                            }
                        ?>
                        
                        <?php if ($esResponsable): ?>
                            <div class="state-form">
                                <h5 class="meta-label mb-2">Cambiar estado:</h5>
                                <form action="<?= site_url('/subtareas/cambiarEstado') ?>" method="post" onChange="this.submit();">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="subtarea_id" value="<?= esc($sub['id']) ?>">
                                    <input type="hidden" name="tarea_id" value="<?= esc($idTarea ?? '') ?>">
                                    
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="estado" id="estado_<?= $sub['id'] ?>_en_proceso" value="en_proceso"
                                            <?= $sub['estado'] === 'en_proceso' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="estado_<?= $sub['id'] ?>_en_proceso">En Proceso</label>
                                    </div>
                                    
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="estado" id="estado_<?= $sub['id'] ?>_completada" value="completada"
                                            <?= $sub['estado'] === 'completada' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="estado_<?= $sub['id'] ?>_completada">Completada</label>
                                    </div>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty-state">
                    <i class="bi bi-list-check"></i>
                    <h5>No hay subtareas registradas</h5>
                    <p>Esta tarea no tiene subtareas asociadas</p>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> No se encontró la tarea
            </div>
        <?php endif; ?>
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
    </script>
</body>
</html>