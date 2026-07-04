<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: panel.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Desarrollo Web Integral - UTSelva</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card-login { background: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 320px; }
        .card-login h2 { text-align: center; color: #1a1a1a; margin-bottom: 20px; }
        .form-control { margin-bottom: 15px; }
        .form-control label { display: block; margin-bottom: 5px; color: #333; }
        .form-control input { width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #cccccc; border-radius: 4px; }
        .btn-submit { width: 100%; padding: 10px; background-color: #007bff; border: none; color: #ffffff; border-radius: 4px; font-weight: bold; cursor: pointer; }
        .btn-submit:hover { background-color: #0056b3; }
        .msg-error { color: #d9534f; text-align: center; font-size: 14px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="card-login">
        <h2>Inicio de Sesión</h2>
        <?php if (isset($_GET['err'])): ?>
            <p class="msg-error">Usuario o contraseña incorrectos</p>
        <?php endif; ?>
        <form action="login_process.php" method="POST">
            <div class="form-control">
                <label>Nombre de Usuario:</label>
                <input type="text" name="usuario" required autocomplete="off">
            </div>
            <div class="form-control">
                <label>Contraseña:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn-submit">Autenticar</button>
        </form>
    </div>
</body>
</html>