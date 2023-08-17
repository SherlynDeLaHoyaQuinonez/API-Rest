<?php
require_once "configuracion/db.php";

class Cel
{

    public static function getAll()
    {
        $db = new Connection();
        $query = "SELECT * FROM celulares";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'id' => $row['id'],
                    'nombre' => $row['nombre'],
                    'marca' => $row['marca'],
                    'precio' => $row['precio']
                ];
            } //end while
            return $datos;
        } //end if
        return $datos;
    } //end getAll

    public static function getWhere($id_celular)
    {
        $db = new Connection();
        $query = "SELECT * FROM celulares WHERE id=$id_celular";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'id' => $row['id'],
                    'nombre' => $row['nombre'],
                    'marca' => $row['marca'],
                    'precio' => $row['precio']
                ];
            } //end while
            return $datos;
        } //end if
        return $datos;
    } //end getWhere

    public static function insert($nombre, $marca, $precio)
    {
        $db = new Connection();
        $query = "INSERT INTO celulares (nombre, marca, precio)
            VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("sss", $nombre, $marca, $precio);
        $stmt->execute();

        if ($stmt->affected_rows) {
            return true;
        } else {
            return false;
        }
    } //end insert

    public static function update($id_celular, $nombre, $marca, $precio)
    {
        $db = new Connection();
        $query = "UPDATE celulares SET
            nombre=?, marca=?, precio=?
            WHERE id=?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("sssi", $nombre, $marca, $precio, $id_celular);
        $stmt->execute();

        if ($stmt->affected_rows) {
            return true;
        } else {
            return false;
        }
    } //end update

    public static function delete($id_celular)
    {
        $db = new Connection();
        $query = "DELETE FROM celulares WHERE id=?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $id_celular);
        $stmt->execute();

        if ($stmt->affected_rows) {
            return true;
        } else {
            return false;
        }
    } //end delete

    public static function handleOptionsRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            // Set allowed methods and headers
            header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
            header('Access-Control-Allow-Headers: Content-Type');
            http_response_code(200);
            exit();
        }
    }

    private static $dbHost = 'localhost'; 
    private static $dbUser = 'root';   
    private static $dbPass = ''; 
    private static $dbName = 'api2'; 

    private static function connectDB()
    {
        $db = new mysqli(self::$dbHost, self::$dbUser, self::$dbPass, self::$dbName);

        if ($db->connect_error) {
            die("Error de conexión a la base de datos: " . $db->connect_error);
        }

        return $db;
    }

    public static function updatePartial($id, $data)
    {
        $db = self::connectDB();

        // Prepare the SQL query
        $query = "UPDATE celulares SET ";
        $updates = [];

        if (isset($data->marca)) {
            $updates[] = "nombre = '{$data->marca}'"; // Corrección aquí: Nombre de columna en mayúsculas
        }
        if (isset($data->nombre)) {
            $updates[] = "marca = '{$data->nombre}'"; // Corrección aquí: Nombre de columna en mayúsculas
        }
        if (isset($data->precio)) {
            $updates[] = "precio = '{$data->precio}'"; // Corrección aquí: Nombre de columna en mayúsculas
        }

        $query .= implode(', ', $updates);
        $query .= " WHERE id = $id";

        // Execute the query
        $result = mysqli_query($db, $query);

        // Check for success
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}//end class Cel
