$("#changePassword").click(function () {
    // alert("hola");
    Swal.fire({
        title: "¿Está seguro?",
        text: "Se realizará el cambio de contraseña",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById("formCard").submit();
        } else if (result.isDenied) {
          Swal.fire("No se realizó el cambio de contraseña", "", "info");
        }
    });
});
