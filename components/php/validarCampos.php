<?php
function validarCamposObligatorios(array $campos, array &$datosLimpiados): array {
    $errores = [];

    foreach ($campos as $campo => $nombreVisible) {
        $valor = trim($_POST[$campo] ?? '');
        $datosLimpiados[$campo] = $valor;

        if ($valor === '') {
            $errores[] = "El campo <strong>$nombreVisible</strong> es obligatorio.";
        }
    }

    return $errores;
}
?>