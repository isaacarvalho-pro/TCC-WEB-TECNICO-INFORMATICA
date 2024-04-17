<?php

include_once('../PHP/config.php');

// Editar Dados do Funcionário

if (!empty($_GET['ID_USER'])) {

    $id = $_GET['ID_USER'];

    $stmt = $conn->prepare("SELECT * FROM USUARIOS WHERE ID=$id");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $numRows = count($rows);

    if ($numRows > 0) {
        $sqlDeleteAgenda = $conn->prepare("DELETE FROM AGENDAMENTO WHERE ID_CLIENTE=$id");
        $sqlDeleteAgenda->execute();

        
        $sqlDelete = $conn->prepare("DELETE FROM USUARIOS WHERE ID=$id");
        $sqlDelete->execute();


        echo "<script>";
        echo "alert('Usuario deletado com sucesso!.');";
        echo "window.location.href = 'Gerenciamento/HTML/users.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Usuario não existe!.');";
        echo "window.location.href = 'Gerenciamento/HTML/users.php';";
        echo "</script>";
    };
};

?>