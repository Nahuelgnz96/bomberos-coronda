function eliminarBombero(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción eliminará el bombero seleccionado',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si se confirma la eliminación, redireccionar al controlador para eliminar el bombero
            window.location.href = `../Controller/eliminar_bombero.php?id=${id}`;
        }
    });
}