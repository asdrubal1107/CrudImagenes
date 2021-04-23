<?php
    require_once('../Controllers/Controlador.php');
    $ListarImagenes = $Controlador->ListarImagenes();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Imagenes</h1>
    <table border=1>
        <thead>
            <tr>
                <th><a href="../Controllers/Controlador.php?NuevaImagen">Nueva imagen</a></th>
            </tr>
            <tr>
                <th>Id</th>
                <th>Imagen Name</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($ListarImagenes as $data){ ?>
            <tr>
                <td><?php echo $data['id'] ?></td>
                <td><?php echo $data['imagen'] ?></td>
                <td><span><img src="img/<?php echo $data['imagen'] ?>"></span></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>