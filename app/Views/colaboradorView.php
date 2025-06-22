<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Asignar Colaborador</title>
</head>
<body>
 <script>
  window.onload = function() {
    document.getElementById("autoForm").submit();
  };
</script>
    <?php if (!empty($tarea_id)): ?>
        <form id="autoForm" action="<?= base_url('/tarea') ?>" method="POST">
            <input type="hidden" name="tarea_id" value="<?= $tarea_id ?>">
        </form>
    <?php endif; ?>
    <?php if (empty($tarea_id)): ?>
            <h2>Asignar Colaborador a Subtarea</h2>

    
    
    <?php if (!empty($colaboradores)): ?>
        <form action="<?= base_url('subtarea/guardarAsignacion') ?>" method="post">
            <input type="hidden" name="subtarea_id" value="<?= esc($subtarea_id) ?>">
            <label for="usuario_id">Seleccionar colaborador:</label>
            <select name="usuario_id" required>
                <?php foreach ($colaboradores as $colab): ?>
                    <option value="<?= esc($colab['id']) ?>">
                        <?= esc($colab['nombre']) ?> (<?= esc($colab['correo']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Asignar</button>
        </form>
    <?php else: ?>
            <p>No hay colaboradores disponibles para asignar.</p>
    <?php endif; ?>
    <?php endif; ?> 
</body>
</html>
