<?php

require "modelo/conexion.php";
require "modelo/Producto.php";

$producto = new Producto($pdo);

$accion = $_POST['Accion'] ?? '';

switch ($accion) {

    // ---------- LISTAR ----------
    case "Listar":

        $busqueda = $_POST['busqueda'] ?? '';
        $resultado = $producto->buscar($busqueda);

        foreach ($resultado as $data) {
            echo "<tr>
                    <td>" . $data['id'] . "</td>
                    <td>" . $data['producto'] . "</td>
                    <td>" . $data['precio'] . "</td>
                    <td>" . $data['cantidad'] . "</td>
                    <td>
                        <button type='button' class='btn btn-success' onclick=Editar('" . $data['id'] . "')>Editar</button>
                        <button type='button' class='btn btn-danger' onclick=Eliminar('" . $data['id'] . "')>Eliminar</button>
                    </td>        
                </tr>";
        }

    break;

    // ---------- EDITAR (obtener un producto) ----------
    case "Editar":

        $id = $_POST['id'] ?? '';
        $resultado = $producto->buscarPorId($id);

        echo json_encode($resultado);

    break;

    // ---------- ELIMINAR ----------
    case "Eliminar":

        $id = $_POST['id'] ?? '';

        echo $producto->eliminar($id) ? "ok" : "error";

    break;

    // ---------- GUARDAR / MODIFICAR ----------
    case "Guardar":
    case "Modificar":

        $response = [
            "success" => false,
            "message" => "",
            "accion" => "",
            "errors" => []
        ];

        $producto->setCodigo($_POST['codigo'] ?? '');
        $producto->setProducto($_POST['producto'] ?? '');
        $producto->setPrecio($_POST['precio'] ?? '');
        $producto->setCantidad($_POST['cantidad'] ?? '');

        $errores = $producto->validar();

        if (!empty($errores)) {

            $response["message"] = "Errores en formulario";
            $response["errors"] = $errores;

        } else {

            if ($accion === "Guardar") {

                if ($producto->guardar()) {

                    $response["success"] = true;
                    $response["message"] = "Producto registrado correctamente";
                    $response["accion"] = "guardar";

                } else {

                    $response["message"] = "Error al guardar";
                }

            } else {

                $producto->setId($_POST['idp'] ?? '');

                if ($producto->modificar()) {

                    $response["success"] = true;
                    $response["message"] = "Producto modificado correctamente";
                    $response["accion"] = "modificar";

                } else {

                    $response["message"] = "Error al modificar";
                }
            }
        }

        echo json_encode($response);

    break;

    // ---------- ACCIÓN NO VÁLIDA ----------
    default:

        echo json_encode([
            "success" => false,
            "message" => "Acción no válida",
            "accion" => "",
            "errors" => []
        ]);

    break;
}

?>
