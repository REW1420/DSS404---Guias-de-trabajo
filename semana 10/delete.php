<?php
// Verificar si se ha recibido un ID válido a través de GET
if (isset ($_GET['id']) && !empty ($_GET['id'])) {
    // Incluir el archivo de conexión a la base de datos
    include 'database.php';

    try {
        // Conectar a la base de datos
        $cn = Database::connect();

        // Configurar el modo de error para que lance excepciones en caso de errores
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar la consulta SQL para eliminar el usuario con el ID proporcionado
        $query = $cn->prepare("DELETE FROM usuario WHERE idusuario = ?");

        // Ejecutar la consulta SQL con el ID proporcionado como parámetro
        $query->execute(array($_GET['id']));

        // Desconectar de la base de datos
        Database::disconnect();

        // Redirigir de vuelta a la página principal después de eliminar el usuario
        header("Location: index.php");
        exit(); // Terminar el script después de la redirección
    } catch (PDOException $e) {
        // Manejar cualquier excepción que ocurra durante la eliminación del usuario
        echo "Error al eliminar el usuario: " . $e->getMessage();
    }
} else {
    // Si no se proporciona un ID válido a través de GET, redirigir de vuelta a la página principal
    header("Location: index.php");
    exit(); // Terminar el script después de la redirección
}
?>
