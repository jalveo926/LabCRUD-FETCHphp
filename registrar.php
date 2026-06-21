<?php

require "modelo/conexion.php";
require "modelo/Producto.php";

$response = [
    "success" => false,
    "message" => "",
    "accion" => "",
    "errors" => []
];

if ($_POST) {

    $producto = new Producto($pdo);

    $producto->setCodigo($_POST['codigo']);
    $producto->setProducto($_POST['producto']);
    $producto->setPrecio($_POST['precio']);
    $producto->setCantidad($_POST['cantidad']);

    // Validar
    $errores = $producto->validar();

    if (!empty($errores)) {

        $response["message"] = "Errores en formulario";
        $response["errors"] = $errores;

    } else {

        switch ($_POST['Accion']) {

            case "Guardar":

                if ($producto->guardar()) {

                    $response["success"] = true;
                    $response["message"] = "Producto registrado correctamente";
                    $response["accion"] = "guardar";

                } else {

                    $response["message"] = "Error al guardar";
                }

            break;

            case "Modificar":

                $producto->setId($_POST['idp']);

                if ($producto->modificar()) {

                    $response["success"] = true;
                    $response["message"] = "Producto modificado correctamente";
                    $response["accion"] = "modificar";

                } else {

                    $response["message"] = "Error al modificar";
                }

            break;

            default:

                $response["message"] = "Acción no válida";

            break;
        }
    }
}

echo json_encode($response);
?>