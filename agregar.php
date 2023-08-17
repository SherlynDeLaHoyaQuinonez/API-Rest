<?php
  // Conectar a la base de datos
  $conexion = mysqli_connect("localhost", "root", "", "api2");

  // Verificar la conexión
  if (mysqli_connect_errno()) {
    echo "Error en la conexión: " . mysqli_connect_error();
    exit();
  }

  // Obtener los datos del formulario
  $nombre = $_POST['nombre'];
  $marca = $_POST['marca'];
  $precio = $_POST['precio'];

  // Insertar el nuevo usuario en la base de datos
  $query = "INSERT INTO celulares (nombre, marca, precio) VALUES ('$nombre', '$marca', '$precio')";
  mysqli_query($conexion, $query);

  // Cerrar la conexión
  mysqli_close($conexion);

  // Redireccionar a la página principal
  header("Location: sesion.php");
?>