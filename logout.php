<?php
session_start();

// Limpieza de los valores contenidos en la memoria del servidor
session_unset();

// Destrucción total del identificador único de sesión del cliente
session_destroy();

// Redirección forzada hacia el portal público de autenticación
header("Location: index.php");
exit();
?>