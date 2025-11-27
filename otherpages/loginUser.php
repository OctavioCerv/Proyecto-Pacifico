<?php
    include("conexion.php");
    session_start();

    $conexion = connection();

    if (isset($_POST["registerUser"])) {
        $nom_user = $_POST["username"];
        $password = $_POST["password"];

        // encriptacion de la contraseña del usuario
        $sql = "INSERT INTO usuarios (nom_user, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $nom_user, $password);

        if (mysqli_stmt_execute($stmt)) {
            echo "User registered successfully!";
        } else {
            echo "Error: " . mysqli_error($conexion);
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/adminestilo.css">
    <title>Admin Page</title>
    <script>
        function validateForm() {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;
            let errors = [];

            // Username validation
            if (username.length < 5) {
                errors.push("El nombre de usuario debe tener al menos 5 caracteres.");
            }

            // Password validation
            if (password.length < 8) {
                errors.push("La contraseña debe tener al menos 8 caracteres.");
            }
            if (!/[A-Z]/.test(password)) {
                errors.push("La contraseña debe contener al menos una letra mayúscula.");
            }
            if (!/[a-z]/.test(password)) {
                errors.push("La contraseña debe contener al menos una letra minúscula.");
            }
            if (!/[0-9]/.test(password)) {
                errors.push("La contraseña debe contener al menos un número.");
            }
            if (!/[\W]/.test(password)) {
                errors.push("La contraseña debe contener al menos un carácter especial.");
            }

            if (errors.length > 0) {
                alert(errors.join("\n"));
                return false;
            }
            return true;
        }
    </script>
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
        <h2>Registrate Aqui</h2>
        <form method="post" onsubmit="return validateForm()">
            <div>
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="registerUser">Registrar Usuario</button>
        </form>
    </div>
</body>
</html>
