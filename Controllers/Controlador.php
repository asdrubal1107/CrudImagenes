<?php
    require_once('ConexionDB.php');
    require_once('../Models/Crud.php');

    class Controlador{

        public function __construct(){}

        public function ListarImagenes(){
            $Crud = new Crud();
            return $Crud->ListarImagenes();
        }

        public function Guardar($txtImagen){
            $Crud = new Crud();
            $Crud->Guardar($txtImagen);
            header('Location:../Views/index.php');
        }

    }


$Controlador = new Controlador();

if(isset($_GET['NuevaImagen'])){
    header('Location:../Views/NuevaImagen.html');
}

if(isset($_POST["NuevoProducto"])) {
    
    /*$txtFoto = isset($_FILES["ImagenProducto"]["name"]) ? $_FILES["ImagenProducto"]["name"] : "";
    $fecha = date('H-m-d_h:i:sa');
    $nombreImg = ($txtFoto!="") ? $fecha . '__' .$_FILES["ImagenProducto"]["name"] : 'ImagenDefecto.jpeg';
    $tmpFoto = $_FILES["ImagenProducto"]["tmp_name"];
    if($tmpFoto != "") {
        echo $nombreImg;
        if (move_uploaded_file($tmpFoto, "../Views/img/".$nombreImg)) {
            $Controlador->Guardar($nombreImg);
        }
    }*/
    $target_dir = "../Views/img/";
    $fecha = date('H-m-d_h:i:sa');
    $nombreImg = $fecha . $_FILES["ImagenProducto"]["name"];
    $target_file = $target_dir . $nombreImg;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["ImagenProducto"]["tmp_name"]);
    if(file_exists($target_file)){ //Verificar si la imagen existe en la bd
        echo "Lo sentimos, el producto ya existe en la base de datos, intente de nuevo<br>";
        echo "<a href='../Views/index.php'>Intentar de nuevo</a>";
        $uploadOk = 0;
    }else if($check !== false) {
        $uploadOk = 1;
    } else if($check !== true){
        echo "Lo sentimos, el archivo a subir no es una imagen, intente de nuevo y procure cargar una imagen<br>";
        echo "<a href='../Views/index.php'>Intentar de nuevo</a>";
        $uploadOk = 0;
    }else if ($_FILES["ImagenProducto"]["size"] > 5120) { //Verificar tamaño del archivo
        echo "Lo sentimos, la imagen supera el tamaño permitido(5mb), intente de nuev con una imagen mas liviana<br>";
        echo "<a href='../Views/index.php'>Intentar de nuevo</a>";
        $uploadOk = 0;
    }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Lo sentimos, este tipo de imagenes no es permitida, intente con imagenes tipo jpg, png, jpeg y gif<br>";
        echo "<a href='../Views/index.php'>Intentar de nuevo</a>";
        $uploadOk = 0;
    } 
    
    if ($uploadOk == 0) {
        echo "<br>Lo sentimos, ocurrio un error, intente de nuevo<br>";
        echo "<a href='../Views/index.php'>Intentar de nuevo</a>";
      // if everything is ok, try to upload file
    }else {
        if (move_uploaded_file($_FILES["ImagenProducto"]["tmp_name"], $target_file)) {
            $Controlador->Guardar($nombreImg);
        }else {
            echo "Lo sentimos, la imagen no se pudo cargar";
        }
    }
  }
?>