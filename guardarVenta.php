<?php
// Include database connection
    require 'config.php';
    if($_POST){
        $proveedor = $_POST['cbxProve'];
        $cliente = $_POST['cbxCliente'];
        $decripcion = $_POST['des'];
        try{
            $sqlInsert = "INSERT INTO ventas (id_proveedor, id_cliente, descripcion) VALUES (:proveedor, :cliente, :descripcion)";
            $ps = $conn->prepare($sqlInsert);
            $ps->bindParam(':proveedor', $proveedor);
            $ps->bindParam(':cliente', $cliente);
            $ps->bindParam(':descripcion', $decripcion);
            $ps->execute();
            header("Location: index.php");
            exit();
        } catch(PDOException $e) {
            echo "Error al guardar la venta: " . $e->getMessage();
        }
    }
?>