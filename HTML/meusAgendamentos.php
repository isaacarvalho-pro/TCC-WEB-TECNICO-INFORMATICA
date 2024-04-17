<?php
include_once('../PHP/config.php');

session_start();
if ((!isset($_SESSION['user']) == true) and (!isset($_SESSION['password']) == true)) {
    unset($_SESSION['user']);
    unset($_SESSION['password']);
    header('Location: login.php');
}
$logado = $_SESSION['user'];
$senhalogado = $_SESSION['password'];


//uso essa query de busca para conseguir acesso ao id do usuario 
$sql = "SELECT * FROM USUARIOS WHERE USERNAME = '$logado' and USER_PASSWORD = '$senhalogado'";

$stmt = $conn->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
$id_Docliente = $resultado['ID'];




$selectAgendamento = "SELECT * FROM AGENDAMENTO WHERE ID_CLIENTE = $id_Docliente";

$resultAgendamento = $conn->query($selectAgendamento);


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../JS/scripts.js"></script>
    <title>Document</title>
</head>

<body style="background-color: black;">
    <header class="">
        <nav class="navbar bg-body-tertiary-black">
            <div class="container-fluid">
                <p style="color: white; font-family: 'Sarala', sans-serif">Bem vindo <?php echo $logado ?></p>
                <form class="d-flex" role="search">
                    <a href="formAgendamento.php" class="btn btn-primary" style="margin: 10px;">Agendar</a>
                    <a href="meusAgendamentos.php" class="btn btn-light" style="margin: 10px;">Meus agendamentos</a>
                    <a href="../PHP/sair.php" class="btn btn-danger" style="margin: 10px;">Sair</a>
                </form>
            </div>
        </nav>
    </header>

    <main class="contents-main">
        <h1 class="titulo-servico">Meus agendamentos</h1>
        <div class="container" style="margin-top: 40px;">
            <table class="table table-bordered border-primary">
                <thead>
                    <tr style="color:white">
                        <th scope="col">#</th>
                        <th scope="col">Data</th>
                        <th scope="col">Horário</th>
                        <th scope="col">Tipo de Corte</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody style="color:white">

                    <?php 
                    
                    while($agenda_data = $resultAgendamento->fetch(PDO::FETCH_ASSOC)){
                        $dia = $agenda_data['data'];
                        $hora = $agenda_data['horario'];
                        $tipoCorte = $agenda_data['tipoCorte'];
                        $idCorte = $agenda_data['id'];

                        echo "<tr>";
                        echo "<td>".$idCorte."</td>";
                        echo "<td>".$dia."</td>";
                        echo "<td>".$hora."</td>";
                        echo "<td>".$tipoCorte."</td>";
                        echo "<td> <a class='btn btn-sm btn-danger' href='../PHP/deletAgendamento.php?ID_AGENDAMENTO=$agenda_data[id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                        </svg>
                        </a>
                        </td>";
                    }
                    
                    ?>

                </tbody>
            </table>
        </div>
    </main>


</body>

</html>