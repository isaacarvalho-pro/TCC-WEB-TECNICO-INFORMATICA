<?php

    session_start();
    include_once('../../../PHP/config.php');
    
    if((!isset($_SESSION['user']) == true) and (!isset($_SESSION['password']) == true))
    {   
        unset($_SESSION['user']);
        unset($_SESSION['password']);
        header('Location: ../../login.php');
    }
    $logado = $_SESSION['user'];


    $selectAgendamento = "SELECT * FROM AGENDAMENTO ORDER BY DATA ASC";

    $resultAgendamento = $conn->query($selectAgendamento);

    


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barbearia Chico leme</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
  <div class="container">
        <div class="topmenu">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
            <a class="navbar-brand" href="../../index.php">Chico leme Barbearia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="users.php"><i class="fa-solid fa-users"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="agenda.php"><i class="fa-solid fa-calendar-days"></i></a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
        </div>




    <div class="divTitulo">
      <h1>Tabela de Agendamento</h1>
    </div>
    <br>
    <div class="tabelaAgendamento">
      <table class="table table-striped table-bordered tabela">
        <thead>
          <tr>
            <th scope="col">Horário</th>
            <th scope="col">Dia</th>
            <th scope="col">ID do cliente</th>
            <th scope="col">Tipo de corte</th>
            <th scope="col">info</th> 
          </tr>
        </thead>
        <tbody>
          <?php 

            while($agenda_data = $resultAgendamento->fetch(PDO::FETCH_ASSOC)){
              $horario = $agenda_data['horario'];
              $dia = $agenda_data['data'];
              $idCliente = $agenda_data['id_cliente'];
              $tipoDoCorte = $agenda_data['tipoCorte'];

                echo "<tr>";
                echo "<td>".$horario."</td>";
                echo "<td>".$dia."</td>";
                echo "<td>".$idCliente."</td>";
                echo "<td>".$tipoDoCorte."</td>";
                echo "<td> <a class='btn btn-sm btn-primary' href='informaAgenda.php?ID_USER=$agenda_data[id_cliente]'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-circle' viewBox='0 0 16 16'>
                <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
                </svg> </a>'
              
                <a class='btn btn-sm btn-danger' href='../php/deletAgenda.php?ID_AGENDAMENTO=$agenda_data[id]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                </svg>
                </a>
                </td>";
                echo "</tr>";
            }

          ?>
        </tbody>
      </table>

    </div>



  </div>


</body>

</html>



<!--

se tiver cadastro nao pedir cpf so o id

se ele não tiver pedir cpf

nome cliente
id(cpf se nao tiver)
Horario 
dia 
mes,
telefone para contato,

tipo de corte,
preço,

(parte onde aparece a quantidade de vezes, de acordo com cpf ou id)
quantidade de cortes
-->