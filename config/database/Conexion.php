<?php
    class Conexion {

        // Definir la credenciales de la base de datos.

        // Debes comentar las siguientes lìneas de código cuando se este desarrollando.
        // private $host = "50.6.138.109";
        // private $dbName = "jurisges_db";
        // private $user = "jurisges_root";
        // private $password = "grhXZ7XJCjNVurB";

        // Debes descomentar las siguiente líneas cuando se este desarrollando.
        private $host = "localhost";
        private $dbName = "jurisgest";
        private $user = "root";
        private $password = "";

        // Variable para guardar el objeto conexión.
        private $conexion;

        // Cuando se manda a instanciar la clase Conexion, se mandar a llamar la función jurisGest().
        public function __construct() {
            $this->jurisGest();
        }

        // Función encargada de realizar la conexión a la base de datos.
        public function jurisGest() {
            $this->conexion = null;
            try {
                $this->conexion = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->user, $this->password);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $exception) {
                echo "Error de conexión a DB: " . $exception->getMessage();
            }
        }

        // Función encargda de retornar el objeto conexión cuando se mande a llamar.
        public function obtener() {
            return $this->conexion;
        }
    }
?>