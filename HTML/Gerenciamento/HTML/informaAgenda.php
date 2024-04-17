<?php

    session_start();
    include_once('../../../PHP/config.php');
    

    $id = $_GET['ID_USER'];

    if((!isset($_SESSION['user']) == true) and (!isset($_SESSION['password']) == true))
    {   
        unset($_SESSION['user']);
        unset($_SESSION['password']);
        header('Location: ../../login.php');
    }
    $logado = $_SESSION['user'];

    

    $selectAgendamento = "SELECT * FROM AGENDAMENTO WHERE id_cliente = '$id'";

    $resultAgendamento = $conn->query($selectAgendamento);

    $selectUsuario = "SELECT * FROM USUARIOS WHERE id = '$id'";
    $resultUsuario = $conn->query($selectUsuario);

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
      <h1>Informações sobre o agendamento</h1>
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
            <th scope="col">Username</th>
            <th scope="col">E-mail</th>
            <th scope="col">Número</th>
          </tr>
        </thead>
        <tbody>
          <?php 

            while($agenda_data = $resultAgendamento->fetch(PDO::FETCH_ASSOC) and $user_data = $resultUsuario->fetch(PDO::FETCH_ASSOC)){
              $horario = $agenda_data['horario'];
              $dia = $agenda_data['data'];
              $idCliente = $agenda_data['id_cliente'];
              $tipoDoCorte = $agenda_data['tipoCorte'];

                echo "<tr>";
                echo "<td>".$horario."</td>";
                echo "<td>".$dia."</td>";
                echo "<td>".$idCliente."</td>";
                echo "<td>".$tipoDoCorte."</td>";
                
                $nome = $user_data['USERNAME'];
                $email = $user_data['EMAIL'];
                $numero = $user_data['CELL'];

                echo "<td>".$nome."</td>";
                echo "<td>".$email."</td>";
                echo "<td>".$numero."</td>";
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