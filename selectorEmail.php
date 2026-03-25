<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUSQUEDA ALUMNO</title>
</head>
<body>

    <?php

    $nombre = strip_tags($_POST['nombre']); 

    $conexion = mysqli_connect("localhost", "root", "", "base1") or
                die ("Problemas con la conexion");

    $registros = mysqli_query($conexion, "SELECT codigo, nombre, mail, codigocurso
                                            FROM alumnos
                                            WHERE nombre LIKE '" . $nombre . "'") or
                die ("Problemas en el select: ". mysqli_error($conexion));

    $nombreCurso = [1=>"PHP", "ASP", "JSP"];

    echo "<br>ALUMNOS DE ". $nombreCurso[$_POST['curso']] . " :<br><br>";

    while ($reg = mysqli_fetch_array($registros)) {
        echo "Codigo: " . $reg['codigo'] . "<br>";
        echo "Nombre: " . $reg['nombre'] . "<br>";
        echo "Mail: " . $reg['mail'] . "<br>";
        echo "Curso: " . $nombreCurso[$reg['codigocurso']] . "<br>";
        echo "<br><hr><br>";        
    }
    
    mysqli_close($conexion);

    ?>

</body>
</html>