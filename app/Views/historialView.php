<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-bottom: 3rem;
        }
        
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        
        .page-header {
            text-align: center;
            margin: 2rem 0 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e9ecef;
        }
        
        .page-title {
            font-weight: 600;
            color: #212529;
            margin-bottom: 0.5rem;
        }
        
        .section-title {
            font-weight: 500;
            color: #495057;
            margin: 2rem 0 1rem;
            padding-left: 0.5rem;
            border-left: 4px solid #0d6efd;
        }
        
        .tareas-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
            margin: 1.5rem 0;
        }
        
        .tarea-card {
            background: #ffffff;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s, box-shadow 0.2s;
            border-left: 6px solid;
            height: 100%;
        }
        
        .tarea-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .tarea-card.archivada {
            border-left-color: #6c757d;
            background-color: #f8f9fa;
        }
        
        .tarea-card.completada {
            border-left-color: #28a745;
        }
        
        .tarea-card.en-proceso {
            border-left-color: #ffc107;
        }
        
        .tarea-card.definida {
            border-left-color: #17a2b8;
        }
        
        .tarea-titulo {
            font-weight: 600;
            font-size: 1.1rem;
            color: #212529;
            margin-bottom: 0.75rem;
        }
        
        .tarea-meta {
            font-size: 0.9rem;
            color: #495057;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: flex-start;
        }
        
        .tarea-meta strong {
            min-width: 120px;
            display: inline-block;
            color: #6c757d;
        }
        
        .badge-estado {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.35rem 0.65rem;
            border-radius: 50rem;
        }
        
        .btn-toggle {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: #f8f9fa;
            color: #495057;
            border: 1px solid #dee2e6;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
            margin: 1rem 0;
        }
        
        .btn-toggle:hover {
            background-color: #e9ecef;
            color: #212529;
        }
        
        .btn-volver {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: #f8f9fa;
            color: #495057;
            border: 1px solid #dee2e6;
            padding: 0.6rem 1.25rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
            margin-top: 2rem;
            text-decoration: none;
        }
        
        .btn-volver:hover {
            background-color: #e9ecef;
            color: #212529;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem 0;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #adb5bd;
        }
        
        .divider {
            border-top: 1px solid #e9ecef;
            margin: 2rem 0;
        }
        
        @media (max-width: 768px) {
            .tareas-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="page-header">
            <h1 class="page-title"><i class="bi bi-clock-history me-2"></i>Historial de Tareas</h1>
            <p class="text-muted">Revisa todas tus tareas activas y archivadas</p>
        </div>
        
        <button class="btn-toggle" onclick="toggleArchivadas()">
            <i class="bi bi-archive"></i> Mostrar tareas archivadas
        </button>
        
        <div id="tareasArchivadasContainer" style="display: none;">
            <h3 class="section-title"><i class="bi bi-archive-fill me-2"></i>Tareas Archivadas</h3>
            
            <?php if (empty($tareasArchivadas)): ?>
                <div class="empty-state">
                    <i class="bi bi-archive"></i>
                    <h5>No hay tareas archivadas</h5>
                    <p>Las tareas completadas que archives aparecerán aquí</p>
                </div>
            <?php else: ?>
                <div class="tareas-container">
                    <?php foreach ($tareasArchivadas as $tarea): ?>
                        <div class="tarea-card archivada">
                            <div class="tarea-titulo"><?= esc($tarea['titulo']) ?></div>
                            <div class="tarea-meta"><strong>Estado:</strong> <span class="badge-estado bg-secondary"><?= esc($tarea['estado']) ?></span></div>
                            <div class="tarea-meta"><strong>Prioridad:</strong> <span class="badge-estado bg-<?= esc(strtolower($tarea['prioridad'])) == 'alta' ? 'danger' : (esc(strtolower($tarea['prioridad'])) == 'normal' ? 'warning' : 'success') ?>"><?= esc($tarea['prioridad']) ?></span></div>
                            <div class="tarea-meta"><strong>Vencimiento:</strong> <?= date('d/m/Y', strtotime(esc($tarea['fecha_vencimiento']))) ?></div>
                            <?php if ($tarea['fecha_recordatorio']): ?>
                                <div class="tarea-meta"><strong><i class="bi bi-alarm me-1"></i>Recordatorio:</strong> <?= date('d/m/Y H:i', strtotime(esc($tarea['fecha_recordatorio']))) ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <div class="divider"></div>
        </div>
        
        <h3 class="section-title"><i class="bi bi-list-task me-2"></i>Tareas Activas</h3>
        
        <?php if (empty($tareasActivas)): ?>
            <div class="empty-state">
                <i class="bi bi-check-circle"></i>
                <h5>No hay tareas activas</h5>
                <p>¡Crea nuevas tareas para comenzar a organizarte!</p>
            </div>
        <?php else: ?>
            <div class="tareas-container">
                <?php foreach ($tareasActivas as $tarea): ?>
                    <div class="tarea-card <?= strtolower(str_replace(' ', '-', esc($tarea['estado']))) ?>">
                        <div class="tarea-titulo"><?= esc($tarea['titulo']) ?></div>
                        <div class="tarea-meta"><strong>Estado:</strong> <span class="badge-estado bg-<?= esc(strtolower($tarea['estado'])) == 'completada' ? 'success' : (esc(strtolower($tarea['estado'])) == 'en proceso' ? 'warning' : 'info') ?>"><?= esc($tarea['estado']) ?></span></div>
                        <div class="tarea-meta"><strong>Prioridad:</strong> <span class="badge-estado bg-<?= esc(strtolower($tarea['prioridad'])) == 'alta' ? 'danger' : (esc(strtolower($tarea['prioridad'])) == 'normal' ? 'warning' : 'success') ?>"><?= esc($tarea['prioridad']) ?></span></div>
                        <div class="tarea-meta"><strong>Vencimiento:</strong> <?= date('d/m/Y', strtotime(esc($tarea['fecha_vencimiento']))) ?></div>
                        <?php if ($tarea['fecha_recordatorio']): ?>
                            <div class="tarea-meta"><strong><i class="bi bi-alarm me-1"></i>Recordatorio:</strong> <?= date('d/m/Y H:i', strtotime(esc($tarea['fecha_recordatorio']))) ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <div class="text-center">
            <a href="javascript:history.back()" class="btn-volver">
                <i class="bi bi-arrow-left"></i> Volver al tablero
            </a>
        </div>
    </div>

    <script>
        function toggleArchivadas() {
            const contenedor = document.getElementById("tareasArchivadasContainer");
            const boton = document.querySelector(".btn-toggle");
            
            if (contenedor.style.display === "none") {
                contenedor.style.display = "block";
                boton.innerHTML = '<i class="bi bi-archive-fill"></i> Ocultar tareas archivadas';
            } else {
                contenedor.style.display = "none";
                boton.innerHTML = '<i class="bi bi-archive"></i> Mostrar tareas archivadas';
            }
        }
        
        // Animación para las tarjetas al cargar
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.tarea-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>