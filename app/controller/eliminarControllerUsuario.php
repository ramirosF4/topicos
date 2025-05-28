<?php
require_once '../config/conexion.php';
session_start();

if (!isset($_SESSION['usuario_sesion']) || $_SESSION['usuario_sesion']['rol'] !== 'admin') {
    header("location: ../../login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $validar = $conexion->prepare("SELECT rol FROM t_usuario WHERE id_usuario = :id");
    $validar->bindParam(':id', $id);
    $validar->execute();
    $usuario = $validar->fetch(PDO::FETCH_ASSOC);

    if ($usuario && $usuario['rol'] !== 'admin') {
        $eliminar = $conexion->prepare("DELETE FROM t_usuario WHERE id_usuario = :id");
        $eliminar->bindParam(':id', $id);
        $eliminar->execute();
    }
    header("location: ../../usuarios.php");
    exit();
} else {
    header("location: ../../usuarios.php");
    exit();
}
