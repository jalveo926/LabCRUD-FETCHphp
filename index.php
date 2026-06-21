<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Productos</title>

    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-4">

    <div class="row">

        <!-- FORMULARIO -->
        <div class="col-lg-4">

            <div class="card">

                <div class="card-header bg-primary text-white">
                    <h3 class="text-center">Registro de Productos</h3>
                </div>

                <div class="card-body">

                    <form id="frm">

                        <!-- ID oculto para modificar -->
                        <input type="hidden" name="idp" id="idp">

                        <!-- Acción -->
                        <input type="hidden" name="Accion" id="accion" value="Guardar">

                        <div class="form-group">
                            <label>Código</label>
                            <input 
                                type="text"
                                name="codigo"
                                id="codigo"
                                class="form-control"
                                placeholder="Ingrese código">
                        </div>

                        <div class="form-group">
                            <label>Producto</label>
                            <input 
                                type="text"
                                name="producto"
                                id="producto"
                                class="form-control"
                                placeholder="Nombre producto">
                        </div>

                        <div class="form-group">
                            <label>Precio</label>
                            <input 
                                type="number"
                                name="precio"
                                id="precio"
                                class="form-control"
                                placeholder="Ingrese precio">
                        </div>

                        <div class="form-group">
                            <label>Cantidad</label>
                            <input 
                                type="number"
                                name="cantidad"
                                id="cantidad"
                                class="form-control"
                                placeholder="Ingrese cantidad">
                        </div>

                        <div class="form-group">

                            <!-- Cambia entre Registrar y Actualizar -->
                            <button
                                type="button"
                                id="btnAccion"
                                class="btn btn-primary btn-block">

                                Registrar

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        <!-- TABLA -->
        <div class="col-lg-8">

            <div class="row">

                <div class="col-lg-6 ml-auto">

                    <div class="form-group">

                        <label>Buscar:</label>

                        <input
                            type="text"
                            id="buscar"
                            class="form-control"
                            placeholder="Buscar producto">

                    </div>

                </div>

            </div>

            <table class="table table-hover table-responsive">

                <thead class="thead-dark">

                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody id="resultado">

                </tbody>

            </table>

        </div>

    </div>

</div>

<script src="script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>
</html>