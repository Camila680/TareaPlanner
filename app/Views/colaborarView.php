<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Código de Invitación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 1rem;
        }
        
        .auth-container {
            max-width: 480px;
            width: 100%;
            margin: 2rem auto;
        }
        
        .auth-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: none;
        }
        
        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .auth-title {
            font-weight: 600;
            color: #212529;
            margin-bottom: 0.5rem;
        }
        
        .auth-subtitle {
            color: #6c757d;
            font-size: 0.95rem;
        }
        
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .form-control:focus {
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
        
        .auth-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .auth-icon {
            font-size: 2.5rem;
            color: #0d6efd;
            margin-bottom: 1rem;
        }
        
        .alert-container {
            position: fixed;
            top: 20px;
            right: 20px;
            max-width: 400px;
            z-index: 1100;
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
        <a href="javascript:history.back()" class="btn-volver">
            <i class="bi bi-arrow-left"></i> Volver al tablero
        </a>
    <!-- Alertas flotantes -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert-container">
            <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <div><?= session()->getFlashdata('success') ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert-container">
            <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <div><?= session()->getFlashdata('error') ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        </div>
    <?php endif; ?>

    <div class="auth-container">
        <div class="auth-card shadow-sm">
            <div class="auth-header">
                <div class="auth-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
                <h2 class="auth-title">Ingresar Código de Invitación</h2>
                <p class="auth-subtitle">Ingresa el código que recibiste para colaborar en una tarea</p>
            </div>
            
            <form action="<?= base_url('invitacion/verificar') ?>" method="post">
                <div class="mb-3">
                    <label for="codigo" class="form-label">Código de invitación</label>
                    <input type="text" name="codigo" id="codigo" class="form-control" 
                           placeholder="Ej: ABCD-1234-EFGH" required autofocus>
                </div>
                
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-key-fill me-2"></i> Verificar Código
                    </button>
                </div>
            </form>
            
            <div class="auth-footer mt-4">
                <p>¿No tienes un código? <a href="#" class="text-decoration-none">Contacta al propietario de la tarea</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-cierre de alertas después de 5 segundos
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });
    </script>
</body>
</html>