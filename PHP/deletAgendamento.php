<?php

include_once('../PHP/config.php');

// Editar Dados do Funcionário

if (!empty($_GET['ID_AGENDAMENTO'])) {

    $id = $_GET['ID_AGENDAMENTO'];

    $stmt = $conn->prepare("SELECT * FROM AGENDAMENTO WHERE ID=$id");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $numRows = count($rows);

    if ($numRows > 0) {
        $sqlDelete = $conn->prepare("DELETE FROM AGENDAMENTO WHERE ID=$id");
        $sqlDelete->execute();

        echo "<script>";
        echo "alert('Agendamento deletado com sucesso!.');";
        echo "window.location.href = '../HTML/meusAgendamentos.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Agendamento não existe!.');";
        echo "window.location.href = '../HTML/meusAgendamentos.php';";
        echo "</script>";
    };
};

?>