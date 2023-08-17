<?php
require_once "modelo/peticiones.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode(Cel::getWhere($_GET['id']));
        } else {
            echo json_encode(Cel::getAll());
        }
        break;

    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos != NULL) {
            if (Cel::insert($datos->nombre, $datos->marca, $datos->precio)) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);
        }
        break;

    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos != NULL) {
            if (Cel::update($datos->id, $datos->nombre, $datos->marca, $datos->precio)) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            if (Cel::delete($_GET['id'])) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);
        }
        break;

        case 'HEAD':
            // Obtener información similar a GET, pero sin cuerpo de respuesta
            if (isset($_GET['id'])) {
                $_GET_id = intval($_GET['id']);
                $Data = json_encode(Cel::getWhere($_GET['id']));
                if ($Data) {
                    http_response_code(200);
                } else {
                    http_response_code(404); // No encontrado
                }
            } else {
                $Data = json_encode(Cel::getAll());
                if (!empty($Data)) {
                    http_response_code(200);
                } else {
                    http_response_code(204); // Sin contenido
                }
            }break;

    case 'OPTIONS':
        // Obtener información sobre los métodos disponibles
        $allowedMethods = array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS', 'TRACE');
        header('Allow: ' . implode(', ', $allowedMethods));
        http_response_code(200);
        break;

    case 'TRACE':
        // Diagnosticar enviando de vuelta información relevante de la solicitud
        $requestInfo = array(
            'URL' => $_SERVER['REQUEST_URI'],
            'Method' => $_SERVER['REQUEST_METHOD'],
            'Headers' => getallheaders()
        );
        echo json_encode($requestInfo);
        http_response_code(200);
        break;

    case 'PATCH':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos != NULL) {
            $id = isset($_GET['id']) ? $_GET['id'] : null;

            if ($id !== null && Cel::updatePartial($id, $datos)) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);
        }
        break;

    default:
        http_response_code(405);
        break;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Productos</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/app/index.php">Bodega</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- Aquí puedes agregar elementos de navegación si es necesario -->
            </ul>
            <a href="login.html" class="btn btn-primary rounded">Login</a>
        </div>
    </nav>

    <br>

    <!-- Aquí puedes agregar el contenido de tu página -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
