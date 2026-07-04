<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $usuario = $conn->real_escape_string($_POST['usuario']);
    $password_raw = $_POST['password'];
    

    $sql = "SELECT id, nombre_completo FROM usuarios 
            WHERE usuario = '$usuario' 
            AND password = SHA2('$password_raw', 256)";
            
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows === 1) {
        $usuario_info = $resultado->fetch_assoc();
        
   
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombre'] = $usuario_info['nombre_completo'];
        
        header("Location: panel.php");
        exit();
    } else {
        header("Location: index.php?err=1");
        exit();
    }
}
?>