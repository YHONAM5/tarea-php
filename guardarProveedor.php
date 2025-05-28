<?php
// Include database connection
    require 'config.php';

    if($_POST){
        $nombre = $_POST['name'];
        $ruc = $_POST['ruc'];

        try{
            $Sql = "insert into proveedores (nombre,ruc) values (:nombre, :ruc)";
            $ps = $conn->prepare($Sql);
            $ps->bindParam(':nombre', $nombre);
            $ps->bindParam(':ruc', $ruc);
            $ps->execute();
            header("Location: index.php");
            exit();

        }catch(PDOException $e){
            echo "Error al guardar el proveedor: " . $e->getMessage();
        }
    }
?>