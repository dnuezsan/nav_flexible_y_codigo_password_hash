<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesion</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<html>

<body>
    <header>
        <h1 id='titulo'>PH&#928 CHALLENGE</h1>
    </header>
    <nav>
        <div class="enlaces_nav" id="caja1"><a href="inicio.php">Inicio</a></div>
        <div class="enlaces_nav" id="caja2"><a href="#">Quiénes somos</a></div>
        <div class="enlaces_nav" id="ultima"><a href="inicio_sesion.php">Iniciar Sesión</a></div>
    </nav>
    <h1 id="pagina">Introduzca sus datos</h1>
    <aside>
        <div id="contenido_aside">
            <!-- <div class="cajasAside"><a class="enlacesAside" href="pagina_edicion_empleados.php">Gestión de empleados</a></div>
            <div class="cajasAside"><a class="enlacesAside" href="pagina_busqueda_empleados.php">Buscar por DNI</a></div>
            <div class="cajasAside"><a class="enlacesAside" href="pagina_busqueda_nombre_empleado.php">Buscar por nombre</a></div> -->
        </div>
    </aside>
    <main>
        <!-- <h1 id="indicacion">Introduzca el DNI del empleado</h1> -->

        <form action="" method="POST">
            <table>
                <tr class="campos">
                    <td><label for="usuario">Usuario</label></td>
                    <td class="entradas"><input type="text" name="usuario"></td>
                </tr>
                <tr>
                    <td><label for="contrasenia">Contraseña</label></td>
                    <td class="entradas"><input type="text" name="contrasenia"></td>
                </tr>
            </table>
            <input type="submit" id="boton" name="entrar" value="Entrar">
            <?php
            require "metodos_sql.php";

            $conexion = new Metodos_sql();
            
            if (isset($_POST["entrar"])) {
                $conexion->inicioSesion();
            }
            ?>
        </form>
    </main>

    <footer>

    </footer>
</body>

</html>