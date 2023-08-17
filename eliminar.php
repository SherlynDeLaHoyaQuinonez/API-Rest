<?php
require_once "modelo/peticiones.php";

if (isset($_GET['id'])) {
    $celuId = $_GET['id'];
    
    if (Cel::delete($celuId)) {
        // Eliminación exitosa, redirige de vuelta a la página principal o a donde sea necesario
        header("Location: sesion.php");
        exit();
    } else {
        // Error al eliminar, muestra un mensaje o realiza una acción apropiada
        echo "Error al eliminar el celular.";
    }
} else {
    // ID no especificado, redirige o muestra un mensaje de error
    echo "ID no especificado.";
}
?>