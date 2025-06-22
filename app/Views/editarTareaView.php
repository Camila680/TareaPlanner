<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea - TareaPlanner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem 0;
        }
        
        .edit-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        
        .edit-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .edit-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .edit-title {
            font-weight: 600;
            color: #212529;
            margin-bottom: 0.5rem;
        }
        
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
            margin-bottom: 1.5rem;
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
            width: 100%;
        }
        
        @media (max-width: 768px) {
            .edit-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <div class="edit-card shadow-sm">
            <div class="edit-header">
                <h1 class="edit-title"><i class="bi bi-pencil-square me-2"></i>Editar Tarea</h1>
            </div>
            
            <form action="<?= base_url('tarea/actualizar') ?>" method="post">
                <input type="hidden" name="id" value="<?= esc($tarea['id']) ?>">
                
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" 
                           value="<?= esc($tarea['titulo']) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" 
                              rows="4"><?= esc($tarea['descripcion']) ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="prioridad" class="form-label">Prioridad</label>
                    <select class="form-select" name="prioridad" id="prioridad" required>
                        <option value="baja" <?= $tarea['prioridad'] == 'baja' ? 'selected' : '' ?>>Baja</option>
                        <option value="normal" <?= $tarea['prioridad'] == 'normal' ? 'selected' : '' ?>>Normal</option>
                        <option value="alta" <?= $tarea['prioridad'] == 'alta' ? 'selected' : '' ?>>Alta</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="fecha_vencimiento" class="form-label">Fecha de vencimiento</label>
                    <input type="date" class="form-control" name="fecha_vencimiento" id="fecha_vencimiento" 
                           value="<?= esc($tarea['fecha_vencimiento']) ?>">
                </div>
                
                <div class="mb-3">
                    <label for="fecha_recordatorio" class="form-label">Fecha de recordatorio</label>
                    <input type="date" class="form-control" name="fecha_recordatorio" id="fecha_recordatorio" 
                           value="<?= esc($tarea['fecha_recordatorio']) ?>">
                </div>
                
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <select class="form-select" name="color" id="color">
                        <option value="rojo" <?= $tarea['color'] == 'rojo' ? 'selected' : '' ?>>Rojo</option>
                        <option value="azul" <?= $tarea['color'] == 'azul' ? 'selected' : '' ?>>Azul</option>
                        <option value="verde" <?= $tarea['color'] == 'verde' ? 'selected' : '' ?>>Verde</option>
                        <option value="naranja" <?= $tarea['color'] == 'naranja' ? 'selected' : '' ?>>Naranja</option>
                        <option value="celeste" <?= $tarea['color'] == 'celeste' ? 'selected' : '' ?>>Celeste</option>
                        <option value="gris" <?= $tarea['color'] == 'gris' ? 'selected' : '' ?>>Gris</option>
                        <option value="violeta" <?= $tarea['color'] == 'violeta' ? 'selected' : '' ?>>Violeta</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save-fill me-2"></i>Actualizar Tarea
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>