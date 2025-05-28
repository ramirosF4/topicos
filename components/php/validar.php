<?php

function reglasValidacion() {
    return [
        'nombre' => [
            'patron' => '/^[a-záéíóúñ\s]{4,70}$/i',
            'error'  => 'El campo NOMBRE solo puede contener letras y espacios. Debe tener entre 4 y 70 caracteres.'
        ],
        'apellido' => [
            'patron' => '/^[a-záéíóúñ\s]{4,50}$/i',
            'error'  => 'El campo APELLIDO solo puede contener letras y espacios. Debe tener entre 4 y 50 caracteres.'
        ],
        'usuario' => [
            'patron' => '/^[a-z][\w]{3,50}$/i',
            'error'  => 'El campo USUARIO debe iniciar con una letra y puede contener letras, números y guiones bajos. Mínimo 4 caracteres.'
        ],
        'password' => [
            'patron' => '/^[a-zA-Z0-9#\$%&*-]{8,30}$/',
            'error'  => 'La CONTRASEÑA debe tener al menos una mayuscula, un numeros, un símbolos y entre 8 y 30 caracteres.'
        ],
        'correo' => [
            'patron' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/',
            'error'  => 'El CORREO debe tener un formato válido, como nombre@dominio.com.'
        ]
    ];
}

function val($campos) {
    $errores = [];
    $reglas = reglasValidacion();

    foreach ($campos as $campo => $nombreVisible) {
        $valor = trim($_POST[$campo] ?? '');

        if ($valor === '') {
            $errores[] = "$nombreVisible es un campo requerido.";
        } elseif (isset($reglas[$campo]) && !preg_match($reglas[$campo]['patron'], $valor)) {
            $errores[] = $reglas[$campo]['error'];
        }
    }

    return $errores;
}

function mostrarErrores(array $errores) {
    if (empty($errores)) return '';

    $html = '<div class="alert alert-danger"><ul>';
    foreach ($errores as $error) {
        $html .= '<li>' . htmlspecialchars($error) . '</li>';
    }
    $html .= '</ul></div>';
    return $html;
}
?>
