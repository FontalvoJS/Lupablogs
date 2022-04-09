<?php
class DB
{
    public function conectar()
    {
        define("SERVIDOR", "localhost");
        define("USUARIO", "root");
        define("PASSWORD", "");
        define("BD", "prueba_blog");

        $servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;

        try {
            $pdo = new PDO(
                $servidor,
                USUARIO,
                PASSWORD,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
        } catch (PDOException $e) {
            echo "Error en la conexion de la base de datos" . " " . $e;
        }
        return $pdo;
    }
    public function escogerPost($id)
    {
        $pdo = $this->conectar();
        $sql = "SELECT * FROM `posts` WHERE id = $id";
        $query = $pdo->prepare($sql);
        $query->execute();
        $posts = $query->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }
    public function iniciarSesion($user, $pass)
    {

        $pdo = $this->conectar();
        $sql = "SELECT * FROM `usuarios` WHERE username = '$user' AND pass = '$pass'";
        $query = $pdo->prepare($sql);
        $query->execute();
        if ($query->rowCount() > 0) {
            session_start();
            $_SESSION['username'] = $user;
            setcookie("active", $user, time() + (86400 * 30), "/");
            return "Ok";
        } else {
            echo "Usuario o contraseña incorrectos";
        }
    }
    public function registro($user, $pass, $mail)
    {
        $pdo = $this->conectar();
        $sql = "SELECT `username` FROM `usuarios` WHERE username = '$user' OR email = '$mail'";
        $query = $pdo->prepare($sql);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo "Ya existe";
        } else {
            $sql = "INSERT INTO `usuarios` (`id`, `pass`, `email`, `username`) VALUES (NULL, '$pass', '$mail', '$user')";
            $query = $pdo->prepare($sql);
            $query->execute();
            if ($query->rowCount() > 0) {
                echo "Ok";
            } else {
                echo "Error";
            }
        }
    }
    public function crearPost($titulo, $descripcion, $categoria, $contenido, $imagen)
    {

        $autor = $_COOKIE['active'];
        $pdo = $this->conectar();
        $sql = "INSERT INTO `posts` (`id`, `titulo`, `descripcion`, `username`, `fecha`, `categoria`,`redaccion`,`imagen`) VALUES (NULL, '$titulo', '$descripcion', '$autor', current_timestamp(), '$categoria', '$contenido', '$imagen')";
        $query = $pdo->prepare($sql);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo "Ok";
        } else {
            echo "Error";
        }
    }
}
