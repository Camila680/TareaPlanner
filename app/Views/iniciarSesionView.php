<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Autenticación - TareaPlanner</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    
    .auth-container {
      width: 90%;
      max-width: 1000px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      display: flex;
      min-height: 600px;
    }
    
    .auth-panel {
      width: 50%;
      padding: 3rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      transition: all 0.4s ease;
    }
    
    .login-panel {
      background-color: #ffffff;
    }
    
    .register-panel {
      background-color: #f8f9fa;
      display: none;
    }
    
    .auth-header {
      text-align: center;
      margin-bottom: 2.5rem;
    }
    
    .auth-title {
      font-weight: 600;
      color: #212529;
      margin-bottom: 0.5rem;
    }
    
    .auth-icon {
      font-size: 2.5rem;
      color: #0d6efd;
      margin-bottom: 1rem;
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
      margin-bottom: 1rem;
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
    
    .toggle-link {
      color: #0d6efd;
      text-decoration: none;
      font-weight: 500;
      cursor: pointer;
      transition: color 0.2s ease;
    }
    
    .toggle-link:hover {
      color: #0b5ed7;
      text-decoration: underline;
    }
    
    @media (max-width: 768px) {
      .auth-container {
        flex-direction: column;
        min-height: auto;
      }
      
      .auth-panel {
        width: 100%;
        padding: 2rem;
      }
      
      .register-panel {
        border-top: 1px solid #dee2e6;
      }
    }
  </style>
</head>
<body>
  <div class="auth-container shadow-lg">
    <!-- Panel de Login -->
    <div class="auth-panel login-panel">
      <div class="auth-header">
        <div class="auth-icon">
          <i class="bi bi-person-circle"></i>
        </div>
        <h2 class="auth-title">Iniciar Sesión</h2>
        <p class="auth-subtitle">Ingresa a tu cuenta para gestionar tus tareas</p>
      </div>
      
      <form action="<?= base_url('usuario/autenticar') ?>" method="post">
        <div class="mb-3">
          <label for="correo" class="form-label">Correo electrónico</label>
          <input type="email" class="form-control" id="correo" name="correo" required placeholder="tu@email.com">
        </div>
        
        <div class="mb-3">
          <label for="clave" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="clave" name="clave" required placeholder="••••••••">
        </div>
        
        <div class="d-grid gap-2 mt-4">
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-box-arrow-in-right me-2"></i> Ingresar
          </button>
        </div>
      </form>
      
      <div class="auth-footer">
        <p>¿No tienes cuenta? <a href="#" class="toggle-link" onclick="toggleRegister()">Regístrate aquí</a></p>
      </div>
    </div>
    
    <!-- Panel de Registro -->
    <div class="auth-panel register-panel">
      <div class="auth-header">
        <div class="auth-icon">
          <i class="bi bi-person-plus"></i>
        </div>
        <h2 class="auth-title">Crear Cuenta</h2>
        <p class="auth-subtitle">Regístrate para comenzar a usar TareaPlanner</p>
      </div>
      
      <form action="<?= base_url('usuario/guardarRegistro') ?>" method="post">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre completo</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Tu nombre completo">
        </div>
        
        <div class="mb-3">
          <label for="correo" class="form-label">Correo electrónico</label>
          <input type="email" class="form-control" id="correo" name="correo" required placeholder="tu@email.com">
        </div>
        
        <div class="mb-3">
          <label for="clave" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="clave" name="clave" required placeholder="••••••••">
        </div>
        
        <div class="d-grid gap-2 mt-4">
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-person-plus me-2"></i> Registrarse
          </button>
        </div>
      </form>
      
      <div class="auth-footer">
        <p>¿Ya tienes cuenta? <a href="#" class="toggle-link" onclick="toggleLogin()">Inicia sesión aquí</a></p>
      </div>
    </div>
  </div>

  <script>
    function toggleRegister() {
      document.querySelector('.login-panel').style.display = 'none';
      document.querySelector('.register-panel').style.display = 'flex';
    }

    function toggleLogin() {
      document.querySelector('.login-panel').style.display = 'flex';
      document.querySelector('.register-panel').style.display = 'none';
    }
    
    // Mostrar mensajes de error/success si existen
    document.addEventListener('DOMContentLoaded', function() {
      const urlParams = new URLSearchParams(window.location.search);
      const showRegister = urlParams.get('register');
      
      if(showRegister === 'true') {
        toggleRegister();
      }
    });
  </script>
</body>
</html>