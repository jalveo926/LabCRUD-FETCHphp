// Cargar productos al iniciar
ListarProductos();


// Listar productos
function ListarProductos(busqueda = "") {

    let datos = new FormData();
    datos.append("Accion", "Listar");
    datos.append("busqueda", busqueda);

    fetch("controlador.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.text())
    .then(response => {
        resultado.innerHTML = response;
    });

}



//Registrar o modificar producto
btnAccion.addEventListener("click", () => {

    let datos = new FormData(frm);

    fetch("controlador.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.json())
    .then(response => {

        // Si todo salió bien
        if (response.success) {

            Swal.fire({
                icon: "success",
                title: response.message,
                showConfirmButton: false,
                timer: 1500
            });

            // Si era modificar → volver a estado inicial
            if (response.accion === "modificar") {

                btnAccion.textContent = "Registrar";
                accion.value = "Guardar";
                idp.value = "";

            }

            frm.reset();
            ListarProductos();

        }

        // Si hubo errores
        else {

            let errores = response.errors.join("<br>");

            Swal.fire({
                icon: "error",
                title: response.message,
                html: errores
            });

        }

    });

});



//Eliminar producto
function Eliminar(id) {

    Swal.fire({
        title: "¿Eliminar producto?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí",
        cancelButtonText: "No"
    })
    .then((result) => {

        if (result.isConfirmed) {

            let datos = new FormData();
            datos.append("Accion", "Eliminar");
            datos.append("id", id);

            fetch("controlador.php", {
                method: "POST",
                body: datos
            })
            .then(response => response.text())
            .then(response => {

                if (response === "ok") {

                    Swal.fire({
                        icon: "success",
                        title: "Producto eliminado",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    ListarProductos();

                }

            });

        }

    });

}


//Editar producto
function Editar(id) {

    let datos = new FormData();
    datos.append("Accion", "Editar");
    datos.append("id", id);

    fetch("controlador.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.json())
    .then(response => {

        // llenar formulario
        idp.value = response.id;
        codigo.value = response.codigo;
        producto.value = response.producto;
        precio.value = response.precio;
        cantidad.value = response.cantidad;

        // cambiar estado
        btnAccion.textContent = "Actualizar";
        accion.value = "Modificar";

    });

}



//Buscar productos
buscar.addEventListener("keyup", () => {

    let valor = buscar.value.trim();

    switch (valor) {

        case "":

            ListarProductos();
            break;

        default:

            ListarProductos(valor);
            break;
    }

});
