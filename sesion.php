<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>productos</title>
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

    <div class="container text-center">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">acciones</th>
                </tr>
            </thead>
    </div>

    <tbody>
        <?php
        require_once "modelo/peticiones.php";

        $celulares = Cel::getAll();

        foreach ($celulares as $celular) {
            echo "<tr>";
            echo "<td>{$celular['id']}</td>";
            echo "<td>{$celular['nombre']}</td>";
            echo "<td>{$celular['marca']}</td>";
            echo "<td>{$celular['precio']}</td>";

            echo "<td>";
            echo "<a href='editar.php?id={$celular['id']}' class='btn btn-primary'>Editar</a>";
            echo "<a href='eliminar.php?id={$celular['id']}' class='btn btn-danger ml-2'>Eliminar</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
    </table>

    <a href="crear.php" class="btn btn-success">Agregar Celular</a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="module" > import {

        initializeApp
      } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-app.js";
      import {createUserWithEmailAndPassword,
        getAuth, signOut, 
        signInWithEmailAndPassword
      } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-auth.js";
      
      const firebaseConfig = {
        apiKey: "AIzaSyBzwNN5z43ihHxU5SqAGT9sT9ktl4uf9hA",
        authDomain: "api-crud-php.firebaseapp.com",
        projectId: "api-crud-php",
        storageBucket: "api-crud-php.appspot.com",
        messagingSenderId: "1032822382295",
        appId: "1:1032822382295:web:aceefeb3f87c1ee7931a92",
        measurementId: "G-J0MJ01TF95"
      };
      
      const app = initializeApp(firebaseConfig);
      const auth = getAuth(app);

      auth.onAuthStateChanged((user) => {
        if (user) {
            console.log("Usuario autenticado:", user);
        } else {
            console.log("Usuario no autenticado");
            window.location.href = "login.html";
        }
    });

    $(document).on('click', '#logoutBtn', function(event) {
        event.preventDefault();
        signOut(auth)
            .then(() => {
                console.log("Sesión cerrada");
            })
            .catch((error) => {
                console.error("Error al cerrar sesión:", error);
            });
    });

       </script>
</body>

</html>
