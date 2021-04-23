<?php
    class ConexionDB{
        private static $Conexion = Null;

        public function __construct(){}

        public static function Conectar(){
            $pdo_options[PDO::ATTR_ERRMODE] =  PDO::ERRMODE_EXCEPTION;
            self::$Conexion = new PDO('mysql:host=localhost;dbname=imgPrueba','root','',$pdo_options);
            return self::$Conexion;
        }

        public static function CerrarConexion($Db){
            return self::$Conexion = NULL;
        }
    }
    $ConexionDB = ConexionDB::Conectar();
?>