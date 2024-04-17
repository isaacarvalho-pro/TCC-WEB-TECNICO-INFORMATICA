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
$vipClient = $resultado['QUANTIDADE_VIPCLIENT'];



//com esse if faço o cadastro do agendamento no banco se os campos nao tiverem vazios e nao tiver outro agendamento igual
if (isset($_POST['submit']) && !empty($_POST['horario']) && !empty($_POST['data']) && !empty($_POST['tipoCorte'])) {


    $dataAgendamento = $_POST['data'];
    $horarioAgendamento = $_POST['horario'];
    $corte = $_POST['tipoCorte'];


    //busca se ja tem um msm agendamento feito
    $sqlVerificaAgenda = "SELECT * FROM AGENDAMENTO WHERE DATA = '$dataAgendamento' AND HORARIO = '$horarioAgendamento'";
    $stmt2 = $conn->prepare($sqlVerificaAgenda);
    $stmt2->execute();

    //faz a contagem do numero de linhas de agendamentos iguais
    $rows = $stmt2->fetchAll();
    $nuwRows = count($rows);


    if ($nuwRows >= 1) {
        echo "<script>";
        echo "alert('Dia e hora já escolhidos, por favor escolha outro!');";
        echo "</script>";
    } else {




        $dataAgendamento = $_POST['data'];
        $horarioAgendamento = $_POST['horario'];
        $corte = $_POST['tipoCorte'];


        $stmt = $conn->prepare("INSERT INTO agendamento (id_cliente,data,horario,tipoCorte) VALUES ('$id_Docliente', '$dataAgendamento', '$horarioAgendamento', '$corte')");
        $stmt->execute();
        $stmt2 = $conn->prepare("UPDATE USUARIOS SET QUANTIDADE_VIPCLIENT = $vipClient + 1 WHERE ID = '$id_Docliente' ");
        $stmt2->execute();

        echo "<script>";
        echo "alert('Agendamento feito com sucesso!!!');";
        echo "</script>";
    }
}



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
                <p style="color: white;">Bem-vindo <?php echo $logado ?></p>
                <form class="d-flex" role="search">
                    <a href="formAgendamento.php" class="btn btn-primary" style="margin: 10px;">Agendar</a>
                    <a href="meusAgendamentos.php" class="btn btn-light" style="margin: 10px;">Meus agendamentos</a>
                    <a href="../PHP/sair.php" class="btn btn-danger" style="margin: 10px;">Sair</a>
                </form>
            </div>
        </nav>
    </header>

    <main class="contents-main">
        <h1 class="titulo-servico">Formulário de Agendamento</h1>
        <div class="container">
            <div class="divForm">
                <form id="form-agenda" action="formAgendamento.php" method="POST">
                    <div class="form-group">
                        <label for="dia">Data:</label>
                        <input type="date" class="form-control" id="data" name="data" min="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dia">Horário:</label>
                        <select class="form-control" id="horario" name="horario" required>
                            <option value="8:00">8:00</option>
                            <option value="8:30">8:30</option>
                            <option value="9:00">9:00</option>
                            <option value="9:30">9:30</option>
                            <option value="10:00">10:00</option>
                            <option value="10:30">10:30</option>
                            <option value="11:00">11:00</option>
                            <option value="11:30">11:30</option>
                            <option value="13:00">13:00</option>
                            <option value="13:30">13:30</option>
                            <option value="14:00">14:00</option>
                            <option value="14:30">14:30</option>
                            <option value="15:00">15:00</option>
                            <option value="15:30">15:30</option>
                            <option value="16:00">16:00</option>
                            <option value="16:30">16:30</option>
                            <option value="17:00">17:00</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipoCorte">Tipo de corte:</label>
                        <select class="form-control" id="tipoCorte" name="tipoCorte" required>
                            <option value="Corte masculino">Corte masculino</option>
                            <option value="Corte feminino">Corte feminino</option>
                            <option value="Descoloração e pintura">Descoloração e pintura</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="btn btn-secondary" value="Agendar">
                    </div>
                </form>
            </div>
        </div>
    </main>

    

</body>

</html>