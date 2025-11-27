<?php
include("conexion.php");
$conexion = connection();

session_start();

$nomUser =  $_POST["nom_user"]; 
$password = $_POST["password"];
$date = date("Y-m-d");

if (isset($_POST["login"])) {
    // Handle Login
    if ($nomUser === "admin" && $password === "admin") {
        $_SESSION["isAdmin"] = true;
        header("Location: ../otherpages/adminpage.php");
        exit();
    } else {
        $sql = "SELECT * FROM `usuarios` WHERE `nom_user` = ?";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $nomUser);
    
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                if ($password == $row["password"]) {
                    header("Location: ../otherpages/index.html");
                    exit();
                } else {
                    echo "Invalid password";
                }
            } else {
                echo "User not found";
            }
        } else {
            echo "Error: " . mysqli_error($conexion); // Error handling for query execution
        }
    
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conexion);
}
include "login.html";
?>

<style>
.error-message {
    color: #ffffff; /* Color del texto */
    background-color: #ff4d4d; /* Color de fondo */
    padding: 10px; /* Espacio interno */
    font-family: Arial, sans-serif; /* Fuente */
    font-size: 26px; /* Tamaño de fuente */
    text-align: center; /* Alineación de texto */
}
</style>