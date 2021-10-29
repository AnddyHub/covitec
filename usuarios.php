<?php
//realizar conexion
require_once ("conexion.php");
$mensaje = "";
//revisar datos a insertar 
if (isset($_POST["u_usuario"]) and isset($_POST["u_contrasena"]) and isset($_POST["u_nombre_comp"])){
    
    //procedemos a insertar
    $sql = "insert into usuarios (usuario, contrasena, nombre_comp) values('".$_POST["u_usuario"]."','".$_POST["u_contrasena"]."','".$_POST["u_nombre_comp"]."')";
    
    if ($conn->query($sql)) {
        $mensaje = "";
    }else {
        $mensaje = "<p class='msg err-msg'>Error al insertar datos</p>";
    }
}

//realizar consulta de registros y guardarlos en variable
$sql = "select * from usuarios";
$resultado = $conn->query($sql);
//indicar donde poner los registros

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Control de Acceso</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="container">
            <header class="header">
                <div id="titulo">
                    <img src="img/LogotipoCoviteceEncabezado.png" alt="Logotipo de Covitec">
                    <h1>Sistema de control de Acceso</h1>
                </div>
            <div id="navegacion">
                <div id=reporte>
                <img src="img/reporte1.png" alt="">
                <a href="#">Lorem, ipsum dolor.</a>
                </div>
                <div id=reporte>
                <img src="img/reporte2.png" alt="">
                <a href="#">Lorem, ipsum dolor.</a>
                </div>
                <div id=reporte>
                <img src="img/reporte3.png" alt="">
                <a href="#">Lorem, ipsum dolor.</a>
                </div>
                <div id=reporte>
                <img src="img/reporte4.png" alt="">
                <a href="#">Lorem, ipsum dolor.</a>
                </div>
                <div id=reporte>
                <img src="img/usuario.png" alt="">
                <a href="../covitec/usuarios.php">Usuarios Registrados</a>
                </div>
                <div id=reporte>
                <img src="img/cerrar_sesion.png" alt="">
                <a href="index.php">Cerrar Sesión.</a>
                </div>
            </div>
            <div class="user-list">
            <table>
                        <tbody>
                            <tr>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Nombre Completo</th>
                                <th></th>
                            </tr>
                            <?php //ESTO ES PHP
                                if ($resultado->num_rows>0) {
                                    while ($registro = $resultado->fetch_array()) {
                                         echo "<tr>";
                                         echo "<td>".$registro['usuario']."</td>";
                                         echo "<td>".$registro['contrasena']."</td>";
                                         echo "<td>".$registro['nombre_comp']."</td>";
                                         echo "<td>";
                                         echo "<a href='editar.php?id=".$registro['usuario']."' class='edit'>Editar</a>&nbsp;";
                                         echo "<a href='baja.php?id=".$registro['usuario']."' class='delete delete-action'>Dar de baja</a>";
                                         echo "</td>";
                                         echo "</tr>";
                                    }
                                }
                            ?> 
                        </tbody>
                        
                    </table>
            </div>
            <div id="new-user">
                <a href="nuevo_user.php" class = "nuevo">Añadir nuevo usuario</a>
            </div>
        </div>
    </body>
</html>