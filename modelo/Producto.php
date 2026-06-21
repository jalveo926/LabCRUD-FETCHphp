<?php

require_once "conexion.php";

class Producto {

    // Propiedades
    private $conexion;
    private $codigo;
    private $producto;
    private $precio;
    private $cantidad;
    private $id;

    public function __construct($pdo) {
        $this->conexion = $pdo;
    }

    // Setters
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function setProducto($producto){
        $this->producto = $producto;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }

    public function setId($id){
        $this->id = $id;
    }

    // Validaciones
    public function validar() {

        $errores = [];

        if (empty($this->codigo)) {
            $errores[] = "Código vacío";
        }

        if (empty($this->producto)) {
            $errores[] = "Producto vacío";
        }

        if (empty($this->precio)) {
            $errores[] = "Precio vacío";
        }

        if (empty($this->cantidad)) {
            $errores[] = "Cantidad vacía";
        }

        return $errores;
    }

    // Guardar
    public function guardar() {

        $query = $this->conexion->prepare(
            "INSERT INTO productos(codigo, producto, precio, cantidad)
             VALUES(:cod, :pro, :pre, :cant)"
        );

        $query->bindParam(":cod", $this->codigo);
        $query->bindParam(":pro", $this->producto);
        $query->bindParam(":pre", $this->precio);
        $query->bindParam(":cant", $this->cantidad);

        return $query->execute();
    }

    // Modificar
    public function modificar() {

        $query = $this->conexion->prepare(
            "UPDATE productos
             SET codigo = :cod,
                 producto = :pro,
                 precio = :pre,
                 cantidad = :cant
             WHERE id = :id"
        );

        $query->bindParam(":cod", $this->codigo);
        $query->bindParam(":pro", $this->producto);
        $query->bindParam(":pre", $this->precio);
        $query->bindParam(":cant", $this->cantidad);
        $query->bindParam(":id", $this->id);

        return $query->execute();
    }

    // Eliminar producto 
    public function eliminar($id) {
        $query = $this->conexion->prepare(
            "DELETE FROM productos WHERE id = :id"
        );

        $query->bindParam(":id", $id);

        return $query->execute() ? "ok" : "error";
    }

    // Buscar/Listar productos 
    public function buscar($filtro = "") {

        if ($filtro == "") {
            $consulta = $this->conexion->prepare(
                "SELECT * FROM productos ORDER BY id DESC"
            );
        } else {
            $consulta = $this->conexion->prepare(
                "SELECT * FROM productos 
                 WHERE id LIKE :filtro 
                 OR producto LIKE :filtro 
                 OR precio LIKE :filtro"
            );

            $busqueda = "%".$filtro."%";
            $consulta->bindParam(":filtro", $busqueda);
        }

        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>