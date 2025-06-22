<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil - TareaPlanner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .profile-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        
        .profile-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .profile-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .profile-title {
            font-weight: 600;
            color: #212529;
            margin-bottom: 0.5rem;
        }
        
        .profile-subtitle {
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
            margin-top: 1rem;
        }
        
        .password-info {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: -0.5rem;
            margin-bottom: 1rem;
        }
        
        .avatar-container {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e9ecef;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .avatar:hover {
            border-color: #86b7fe;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-card shadow-sm">
            <div class="profile-header">
                <h1 class="profile-title"><i class="bi bi-person-gear me-2"></i>Editar Perfil</h1>
                <p class="profile-subtitle">Actualiza tu información personal</p>
            </div>
            
            <form method="post" action="<?= site_url('usuario/editarguardar') ?>">
                <div class="avatar-container">
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode(esc($usuario['nombre'])) ?>&background=0d6efd&color=fff" 
                         alt="Avatar" class="avatar" id="avatarPreview">
                    <input type="file" id="avatarUpload" style="display: none;" accept="image/*">
                </div>
                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre completo</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" 
                           value="<?= esc($usuario['nombre']) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" 
                           value="<?= esc($usuario['correo']) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="contrasenia" class="form-label">Cambiar contraseña</label>
                    <input type="password" name="contrasenia" id="contrasenia" class="form-control" 
                           placeholder="Ingresa una nueva contraseña">
                    <p class="password-info">
                        <i class="bi bi-info-circle"></i> Deja este campo vacío si no deseas cambiar la contraseña
                    </p>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save-fill me-2"></i>Guardar cambios
                </button>
            </form>
        </div>
    </div>

    <script>
        // Cambiar avatar al hacer clic
        document.getElementById('avatarPreview').addEventListener('click', function() {
            document.getElementById('avatarUpload').click();
        });
        
        document.getElementById('avatarUpload').addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(event) {
                    document.getElementById('avatarPreview').src = event.target.result;
                }
                
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    </script>
</body>
</html>