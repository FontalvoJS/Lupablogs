<?php
class DB
{
    private static $dbName = 'prueba_blog';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';



    public static function conectar()
    {
       

        $servidor = "mysql:dbname=" . self::$dbName . ";host=" . self::$dbHost;

        try {
            $pdo = new PDO(
                $servidor,
                self::$dbUsername,
                self::$dbUserPassword,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
        } catch (PDOException $e) {
            echo "Error en la conexion de la base de datos" . " " . $e;
        }
        return $pdo;
    }
    public function escogerPost($id)
    {
        $sql = "SELECT * FROM `posts` WHERE id = $id";
        $result = $this->consulta($sql);
        return $result;
    }
    public function iniciarSesion($user, $pass2)
    {

        $sql = "SELECT `pass`,`username` FROM `usuarios` WHERE username = '$user'";
        $query = $this->consulta($sql);
        if (password_verify($pass2, $query[0]['pass'])) {
            session_start();
            $_SESSION['username'] = $user;
            setcookie("active", $user, time() + (86400 * 30), "/");
            return true;
        } else {
            return false;
        }
    }
    public function registro($user, $pass, $mail)
    {
        $sql = "INSERT INTO `usuarios` (`id`, `pass`, `email`, `username`) VALUES (NULL, '$pass', '$mail', '$user')";
        $send = $this->consulta($sql);
        if (isset($send) || !empty($send)) {
            session_start();
            $_SESSION['username'] = $user;
            setcookie("active", $user, time() + (86400 * 30), "/");
            return true;
        }
    }

    public function crearPost($titulo, $descripcion, $categoria, $contenido, $imagen)
    {

        $autor = $_COOKIE['active'];
        $sql = "INSERT INTO `posts` (`id`, `titulo`, `descripcion`, `username`, `fecha`, `categoria`,`redaccion`,`imagen`) VALUES (NULL, '$titulo', '$descripcion', '$autor', current_timestamp(), '$categoria', '$contenido', '$imagen')";
        $result = $this->consulta($sql);
        if (isset($result)) {
            return true;
        } else {
            return false;
        }
    }
    public function consulta($sql)
    {
        $pdo = $this->conectar();
        $query = $pdo->prepare($sql);
        $query->execute();
        $query = $query->fetchAll(PDO::FETCH_ASSOC);
        return $query;
    }
}
