<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/edit.css">
    <title>Document</title>
</head>
<body>
    <div class="cont">
        <div class="subcont">
            <nav>
                <ul>
                    <li><a href="../Views/adminV.php">Inicio</a></li>
                    <li><a href="../Inventario.php">Inventario</a></li>
                    <li><a href="../Añadir.php">Añadir producto</a></li>
                </ul>
            </nav>

            <div class="table">
                    <h1>Edita tu producto</h1>
                <table>
                    <thead>
                        <tr>
                            <td class="titulos">Id</td>
                            <td class="titulos">Nombre</td>
                            <td class="titulos">Descripcion</td>
                            <td class="titulos">Precio</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($productos as $pro){
                        ?>
                        <form action="../controller/C_Update.php" method="post">
                            <tr>
                                <td><input class="datos" type="hidden" value="<?php echo $pro['id_productos']?>" name="id"></td>
                                <td><input class="datos" type="text" value="<?php echo $pro['Nombre']?>" name="Nombre"></td>
                                <td><textarea class="datos" value="<?php echo $pro['Descripcion']?>" name="Descripcion" cols="20" rows="5" ></textarea></td>
                                <td><input class="datos" type="text" value="<?php echo $pro['Precio']?>" name="Precio"></td>
                                <td class="datosU" ><button  class="actualizar">Actualizar producto</button></td>
                            </tr>

                        </form>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>