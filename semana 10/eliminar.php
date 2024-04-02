<?php
// Verificar si se ha enviado un ID válido a través de GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Incluir el archivo de conexión a la base de datos
    include_once "db-mysqli.php";

    // Escapar el ID para evitar inyección de SQL
    $id = $_GET['id'];

    // Preparar la consulta SQL para eliminar el libro
    $consulta = "DELETE FROM libros WHERE id = $id";

    // Ejecutar la consulta
    if ($db->query($consulta) === TRUE) {
        // Redireccionar de vuelta a la página de inicio u otra página deseada
        header("Location: index.php");
        exit();
    } else {
        // Mostrar un mensaje de error si la consulta falla
        echo "Error al eliminar el libro: " . $db->error;
    }

    // Cerrar la conexión a la base de datos
    $db->close();
} else {
    // Mostrar un mensaje de error si no se proporcionó un ID válido
    echo "ID de libro no válido.";
}
?>