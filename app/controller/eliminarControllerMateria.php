<?php
require_once '../config/conexion.php';
session_start();

if (!isset($_SESSION['usuario_sesion'])) {
    header("location: ../../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $eliminacion = $conexion->prepare("DELETE FROM t_materia WHERE id_materia = :id_materia");
        $eliminacion->bindParam(":id_materia", $_GET['id'], PDO::PARAM_INT);
        $eliminacion->execute();

        header("location: ../../materias.php"); 
        exit();
    } else {
        echo "URL no válida";
    }
} else {
    echo "Método no válido";
}
?>
