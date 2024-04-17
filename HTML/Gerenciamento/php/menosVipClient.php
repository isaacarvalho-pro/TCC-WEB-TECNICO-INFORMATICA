<?php

include_once('../../../PHP/config.php');

// Editar Dados do Funcionário

if (!empty($_GET['ID_USER'])) {

    $id = $_GET['ID_USER'];

    $stmt = $conn->prepare("SELECT * FROM USUARIOS WHERE ID=$id");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $numRows = count($rows);

    

    $stmt = $conn->prepare("SELECT * FROM USUARIOS WHERE ID=$id");
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    $vipClient = $resultado['QUANTIDADE_VIPCLIENT'];

    if ($numRows > 0) {
        $sqlDelete = $conn->prepare("UPDATE USUARIOS SET QUANTIDADE_VIPCLIENT = 0 WHERE ID=$id");
        $sqlDelete->execute();

        echo "<script>";
        echo "alert('Vip Client reduzido com sucesso!');";
        echo "window.location.href = '../HTML/users.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Cortes não localizados!');";
        echo "window.location.href = '../HTML/users.php';";
        echo "</script>";
    };
};

?>