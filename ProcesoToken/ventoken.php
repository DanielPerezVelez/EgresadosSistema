<!DOCTYPE html>
<html>
<head>
    <Title> Genera tu código de acceso</Title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">

<body>

    <form action="correo.php" method="POST" action="registra.php">
    <?php
        //MENSAJE DE CONFIRMACIÓN DESPUES DE LA EJECUCION DEL SCRIPT PHP
        if (isset($_GET['enviado'])) { ?>
            <span>Hemos enviado el email de confirmacion</span>
            <?php
            }
        ?>
        <br><!-- Se aplica un salto de linea para separar el borde con el campo imput-->

        <input type="text" name="email"placeholder="Correo Electrónico" required="">
        <button type="submit" name=enviar> Enviar codigo </button>
    </form>
</body>
</html> <!-- Cierre del codigo HTML-->
