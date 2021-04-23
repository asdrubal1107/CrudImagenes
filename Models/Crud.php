<?php
    class Crud{
        public function __construct(){}

        public function ListarImagenes(){
            $Db = ConexionDB::Conectar();
            $sql = $Db->query('SELECT * FROM imagenes');
            $sql->execute();
            ConexionDB::CerrarConexion($Db);
            return $sql->fetchAll();
        }

        public function Guardar($txtImagen){
            $Db = ConexionDB::Conectar();
            $sql = $Db->prepare('INSERT INTO imagenes(imagen)
            VALUES (:txtImagen)');
            $sql->bindvalue('txtImagen', $txtImagen);
            try {
                $sql->execute();
                $mensaje = "Registro exitoso";
            } catch (Exception $e) {
                $mensaje = $e.getMessage();
            }
            ConexionDB::CerrarConexion($Db);
            return $mensaje;
        }
    }
?>