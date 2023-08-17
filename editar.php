<?php
require_once "modelo/peticiones.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $precio = $_POST['precio'];

        if (Cel::update($id, $nombre, $marca, $precio)) {
            // Actualización exitosa, redirige de vuelta a la página principal o a donde sea necesario
            header("Location: sesion.php");
            exit();
        } else {
            // Error al actualizar, muestra un mensaje o realiza una acción apropiada
            echo "Error al actualizar el celular.";
        }
    } else {
        echo "ID de celular no especificado.";
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $celular = Cel::getWhere($id);


    if ($celular) {
        // Mostrar el formulario de edición
?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Editar celular</title>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        </head>
        <body>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 container justify-content-center card">
                        <h1 class="text-center"> Registro </h1>
                        <div class="card-body">
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="form-group">
                                    <label> Nombre : </label>
                                    <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($celular[0]['nombre']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label> Marca : </label>
                                    <input type="text" name="marca" class="form-control" value="<?php echo htmlspecialchars($celular[0]['marca']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label> Precio : </label>
                                    <input type="text" name="precio" class="form-control" value="<?php echo htmlspecialchars($celular[0]['precio']); ?>" required>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success"> Guardar </button>
                                    <a href="sesion.php" class="btn btn-danger ml-2">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
        </html>
<?php
    } else {
        
        echo "El celular no existe.";
    }
} else {
   
    echo "ID de celular no especificado.";
}
?>
