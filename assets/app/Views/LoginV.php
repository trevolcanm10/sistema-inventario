<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="contenedorP">
        <div class="contS">
            <div class="cont_iz">
                <h1>Sistema de Inventario de Productos</h1>
                <h3 class="subtitle">Consulte productos y precios facilmente</h3>
            </div>
            
            <div class="cont_de">
                <div class="cont_sub">
                    <form action="../Login.php" method="post">
                        <div class="logotipo">
                            <h2 class="logo">
                                Inicia Sesion
                            </h2>
                        </div>
                        <input type="email" name="Email" placeholder="Ingrese su correo electronico" class="email">
                        <input type="password" name="Contrasena" placeholder="Ingrese su contraseña" class="password">
                        <button class="Ingresar">Ingresar</button>
                    </form>
                </div>
            </div>
            <footer>
                <h2 class="final">
                    Sistema de Inventario
                </h2>
            </footer>
        </div>
    </div>
</body>
</html>