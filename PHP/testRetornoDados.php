<?php 


include_once("../PHP/config.php");

$dataAgendamento = '2023-09-18';
$horarioAgendamento = '14:00';

//busca se ja tem um msm agendamento feito
$sqlVerificaAgenda = "SELECT * FROM AGENDAMENTO WHERE DATA = '$dataAgendamento' AND HORARIO = '$horarioAgendamento'";
$stmt2 = $conn->prepare($sqlVerificaAgenda);
$stmt2->execute();

//faz a contagem do numero de linhas de agendamentos iguais
$rows = $stmt2->fetchAll();
$nuwRows = count($rows);

print_r($nuwRows);

?>