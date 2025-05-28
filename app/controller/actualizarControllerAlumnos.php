<?php
require_once '../config/conexion.php';
require_once '../../components/php/validarCampos.php';
session_start();

if (!isset($_SESSION['usuario_sesion'])) {
    header("location: ../../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $datos = [];
    $errores = validarCamposObligatorios([
        'id_alumnos' => 'Id_materia',
        'nombre'      => 'Nombre',
        'apellido'    => 'Apellido',
        'matricula'    => 'Matricula',
    ], $datos);

    if (empty($errores)) {
        $agregar = $conexion->prepare("UPDATE t_alumnos SET nombre = :nombre, apellido = :apellido, matricula = :matricula  WHERE id_alumnos = :id_alumnos");

        $agregar->bindParam(':nombre', $datos['nombre']);
        $agregar->bindParam(':apellido', $datos['apellido']);
        $agregar->bindParam(':matricula', $datos['matricula']);
        $agregar->bindParam(':id_alumnos', $datos['id_alumnos'], PDO::PARAM_INT);
        
        if ($agregar->execute()) {
            header("location: ../../alumnos.php");
            exit();
        } else {
            $_SESSION['error'] = "Error al actualizar el profesor.";
            header("location: ../../actualizarAlumnos.php?id=" . $datos['id_alumnos']);
            exit();
        }
  
    } else {
        $_SESSION['error'] = implode('<br>', $errores);
        header("location: ../../actualizarAlumnos.php?id=" . $_POST['id_alumnos']);
        exit();
    }

} else {
    $_SESSION['error'] = "Método no permitido.";
    header("location: ../../alumnos.php");
    exit();
}
