<?php
    include("conexion.php");
    session_start();

    $conexion = connection();

    if (isset($_POST["registerRoom"])) {

        $roomName = $_POST["roomName"];
        $roomType = $_POST["roomType"];
        $roomPrice = $_POST["roomPrice"];
        $roomAvailability = $_POST["roomAvailability"];
        $roomPersons = $_POST["roomPersons"];

        $sql = "INSERT INTO habitacion (nombre, tipo, precio, disponibilidad, numero_personas) VALUES ('$roomName', '$roomType', '$roomPrice', '$roomAvailability', '$roomPersons')";
        if (mysqli_query($conexion, $sql)) {
            echo "Room registered successfully!";
        } else {
            echo "Error: " . mysqli_error($conexion);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/adminestilo.css">
    <title>Admin Page</title>
</head>
<body>
    <header>
        <nav class="navbr">
            <h1><a href="../otherpages/index.html">Hotel el Pacifico</a></h1>
            <ul>
                <li>■</li>
                <li>■</li>
                <li>■</li>
            </ul>
        </nav>
    </header>

    <div class="admin-form">
        <h2>Panel de Administrador</h2>

        <h3>Registrar una habitacion</h3>
        <form method="post">
            <div>
                <label for="roomName">Nombre de Habitacion:</label>
                <input type="text" id="roomName" name="roomName" required>
            </div>
            <div>
            <label for="roomType">Tipo de Habitacion:</label>
                <select id="roomType" name="roomType">
                    <option value="single">Single Room</option>
                    <option value="double">Double Room</option>
                    <option value="suite">Suite</option>
                </select>
            </div>
            <div>
                <label for="roomPrice">Precio de Habitacion:</label>
                <input type="text" id="roomPrice" name="roomPrice" required>
            </div>
            <div>
                <label for="roomAvailability">Disponibilidad:</label>
                <input type="text" id="roomAvailability" name="roomAvailability" required>
            </div>
            <div>
                <label for="roomPersons">Numero de personas:</label>
                <input type="text" id="roomPersons" name="roomPersons" required>
            </div>
            <button type="submit" name="registerRoom">Registrar Habitacion</button>
        </form>
    </div>
</body>
</html>
