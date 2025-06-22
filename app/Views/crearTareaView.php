<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 2rem;
        }
        
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        .form-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }
        
        .note-box {
            background-color: #f8f9fa;
            border-left: 4px solid #0d6efd;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #212529;
            font-weight: 600;
            font-size: 1.8rem;
        }
        
        label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #495057;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        
        .btn-primary {
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        
        .btn-volver {
            background-color: #f8f9fa;
            color: #495057;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: 1px solid #dee2e6;
            margin-bottom: 1rem;
            transition: all 0.2s ease;
        }
        
        .btn-volver:hover {
            background-color: #e9ecef;
            color: #212529;
            transform: translateY(-1px);
        }
        
        .form-text-muted {
            font-size: 0.85rem;
            color: #6c757d;
        }
        
        .priority-tag {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-right: 0.5rem;
        }
        
        .priority-high {
            background-color: #ffc9c9;
            color: #c92a2a;
        }
        
        .priority-medium {
            background-color: #fff3bf;
            color: #e67700;
        }
        
        .priority-low {
            background-color: #d3f9d8;
            color: #2b8a3e;
        }
        
        @media (min-width: 992px) {
            .form-layout {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1.5rem;
            }
            
            .full-width {
                grid-column: span 2;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <a href="javascript:history.back()" class="btn-volver">
            <i class="bi bi-arrow-left"></i> Volver al tablero
        </a>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="form-container">
                    <h1><i class="bi bi-plus-circle me-2"></i>Crear Nueva Tarea</h1>
                    
                    <form action="<?= base_url('tareas/guardar') ?>" method="post">
                        <div class="form-layout">
                            <div class="mb-3 full-width">
                                <label for="titulo">Título:</label>
                                <input type="text" class="form-control" name="titulo" id="titulo" required placeholder="Ej: Revisar informe mensual">
                            </div>

                            <div class="mb-3 full-width">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="4" placeholder="Detalles de la tarea..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="prioridad">Prioridad:</label>
                                <select class="form-select" name="prioridad" id="prioridad">
                                    <option value="baja">Baja</option>
                                    <option value="normal" selected>Normal</option>
                                    <option value="alta">Alta</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="color">Color:</label>
                                <select class="form-select" name="color" id="color">
                                    <option value="">Seleccionar color</option>
                                    <option value="rojo">Rojo</option>
                                    <option value="azul">Azul</option>
                                    <option value="verde">Verde</option>
                                    <option value="naranja">Naranja</option>
                                    <option value="celeste">Celeste</option>
                                    <option value="gris">Gris</option>
                                    <option value="violeta">Violeta</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="fecha_vencimiento">Fecha de vencimiento:</label>
                                <input type="date" class="form-control" name="fecha_vencimiento" id="fecha_vencimiento">
                            </div>

                            <div class="mb-3">
                                <label for="fecha_recordatorio">Fecha de recordatorio:</label>
                                <input type="date" class="form-control" name="fecha_recordatorio" id="fecha_recordatorio">
                            </div>
                        </div>

                        <input type="hidden" name="tarea_id" value="1">

                        <button type="submit" class="btn btn-primary w-100 mt-3">
                            <i class="bi bi-save-fill me-2"></i>Guardar Tarea
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="note-box">
                    <h5 class="d-flex align-items-center mb-3">
                        <i class="bi bi-lightbulb-fill text-warning me-2"></i> 
                        Recomendaciones de colores
                    </h5>
                    
                    <div class="mb-3">
                        <span class="priority-tag priority-high">Alta prioridad</span>
                        <span class="text-muted">Usar: Rojo o Naranja</span>
                    </div>
                    
                    <div class="mb-3">
                        <span class="priority-tag priority-medium">Prioridad normal</span>
                        <span class="text-muted">Usar: Azul, Celeste o Violeta</span>
                    </div>
                    
                    <div class="mb-3">
                        <span class="priority-tag priority-low">Baja prioridad</span>
                        <span class="text-muted">Usar: Verde o Gris</span>
                    </div>
                    
                    <hr>
                    
                    <div class="d-flex align-items-center text-muted">
                        <i class="bi bi-info-circle-fill me-2"></i>
                        <small>Los colores ayudan a identificar rápidamente el tipo de tarea.</small>
                    </div>
                </div>
                
                <div class="note-box">
                    <h5 class="d-flex align-items-center mb-3">
                        <i class="bi bi-clock-fill text-primary me-2"></i>
                        Recordatorios
                    </h5>
                    
                    <p class="text-muted">
                        Configurar recordatorios te ayudará a no olvidar tareas importantes. 
                        Te enviaremos una notificación el día seleccionado.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Cambiar colores recomendados según prioridad seleccionada
        document.getElementById('prioridad').addEventListener('change', function() {
            const colorSelect = document.getElementById('color');
            colorSelect.innerHTML = '<option value="">Seleccionar color</option>';
            
            if(this.value === 'alta') {
                colorSelect.innerHTML += `
                    <option value="rojo">Rojo</option>
                    <option value="naranja">Naranja</option>
                `;
            } else if(this.value === 'normal') {
                colorSelect.innerHTML += `
                    <option value="azul">Azul</option>
                    <option value="celeste">Celeste</option>
                    <option value="violeta">Violeta</option>
                `;
            } else {
                colorSelect.innerHTML += `
                    <option value="verde">Verde</option>
                    <option value="gris">Gris</option>
                `;
            }
        });
    </script>
</body>
</html>