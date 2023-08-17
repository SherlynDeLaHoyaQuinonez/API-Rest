<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Agregar Celular</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-gray bg-gray">
    <a class="navbar-brand" href="/api_cel/sesion.php">Inventario </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
      <button id="logoutBtn" class="btn btn-primary rounded"> Cerrar Sesion </button>
    </div>
  </nav>

  <br>

  <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 container justify-content-center card">
                <h1 class="text-center"> Registro </h1>
                <div class="card-body">
                  <form action="agregar.php" method="post"> <!--agregar el metodo Post-->
                    <div class="form-group">
                      <label> Nombre : </label>
                      <input type="text" name="nombre" class="form-control" required> 
                    </div>
                    <div class="form-group">
                      <label> Marca : </label>
                      <input type="text" name="marca" class="form-control" required> 
                    </div>
                    <div class="form-group">
                      <label> Precio : </label>
                      <input type="number" name="precio" class="form-control" required> 
                    <div class="box-footer">
                      <br>
                      <button class="btn btn-primary"> Guardar </button>
                      <a href="sesion.php" class="btn btn-danger ml-2">Cancelar</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>

  <!-- Agregar aquí tus scripts -->

</body>

</html>