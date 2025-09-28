<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/product.css">
    <title>Producto</title>
</head>
<body>
    <div class="cont">
        <div class="subcont">
            <nav>
                <ul>
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="../Inventario.php">Inventario</a></li>
                    <li><a href="../Añadir.php">Añadir Producto</a></li>
                </ul>
            </nav>

            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <td class="title">Nombre</td>
                            <td class="title">Descripcion</td>
                            <td class="title">Precio</td>
                            <td class="title">Editar</td>
                            <td class="title">ELiminar</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($productos as $pro){
                        ?>
                        <tr>
                            <td><?php echo $pro['Nombre']?></td>
                            <td><?php echo $pro['Descripcion']?></td>
                            <td><?php echo $pro['Precio']?></td>
                            <td class="cont-edit"><a class="edit" href="../controller/C_Edit.php?id=<?php echo $pro["id_productos"];?>">Editar producto</a></td>
                            <td class="cont-delete"><a class="delete" href="../controller/C_Delete.php?id=<?php echo $pro["id_productos"];?>">Eliminar producto</a></td>
                        </tr>
                        <?php } ?>        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>
</html>