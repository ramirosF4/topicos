<?php
require_once '../config/conexion.php';
session_start();

if (!isset($_SESSION['usuario_sesion'])) {
    header("location: ../../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $eliminacion = $conexion->prepare("DELETE FROM t_alumnos WHERE id_alumnos = :id_alumnos");
        $eliminacion->bindParam(":id_alumnos", $_GET['id'], PDO::PARAM_INT);
        $eliminacion->execute();

        header("location: ../../alumnos.php"); 
        exit();
    } else {
        echo "URL no válida";
    }
} else {
    echo "Método no válido";
}
?>
