<?php
    require 'config.php';

    if($_POST){
        $nombre = $_POST['name'];
        $email = $_POST['email'];
        $telefono = $_POST['phone'];
        try {
            $sqlInsert = "INSERT INTO clientes (nombre, email, phone) VALUES (:nombre, :email, :telefono)";
            $ps = $conn->prepare($sqlInsert);
            $ps->bindParam(':nombre', $nombre);
            $ps->bindParam(':email', $email);
            $ps->bindParam(':telefono', $telefono);
            $ps->execute();
            header("Location: index.php");
            exit();
        } catch(PDOException $e) {
                echo "Error al guardar el cliente: " . $e->getMessage();
        }
    }
?>