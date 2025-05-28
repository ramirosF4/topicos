<?php
require_once '../config/conexion.php';
session_start();

if (!isset($_SESSION['usuario_sesion'])) {
    header("location: ../../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $eliminacion = $conexion->prepare("DELETE FROM t_profesores WHERE id_profesores = :id_profesores");
        $eliminacion->bindParam(":id_profesores", $_GET['id'], PDO::PARAM_INT);
        $eliminacion->execute();

        header("location: ../../profesores.php"); 
        exit();
    } else {
        echo "URL no válida";
    }
} else {
    echo "Método no válido";
}
?>
