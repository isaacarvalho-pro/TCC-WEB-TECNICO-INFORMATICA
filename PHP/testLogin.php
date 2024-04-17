<?php

    session_start();
    // print_r($_REQUEST);
    
    if(isset($_POST['submit']) && !empty($_POST['user']) && !empty($_POST['password']))
    {
        //acessa
        include_once('config.php');
        $user = $_POST['user'];
        $senha = $_POST['password'];


        $stmt = $conn->prepare("SELECT * FROM USUARIOS WHERE USERNAME = '$user' and USER_PASSWORD = '$senha'");
        $stmt->execute();

        $busca = $conn->prepare("SELECT NIVELACESSO FROM USUARIOS WHERE USERNAME = '$user' and USER_PASSWORD ='$senha'");
        $busca->bindParam(1,$user);
        $busca->bindParam(2,$senha);
        $busca->execute();

        $nivelAcesso = $busca->fetchColumn();


        $rows = $stmt->fetchAll();
        $numRows = count($rows);

        
        if($numRows < 1)
        {
            unset($_SESSION['user']);
            unset($_SESSION['password']);
            header('Location: ../HTML/login.php');
        }
        else
        {
            if($nivelAcesso == 1){
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $senha;
                header('Location: ../HTML/Gerenciamento/HTML/users.php');
            }
            else
            {
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $senha;
                header('Location: ../HTML/formAgendamento.php');
            }
            
        }
        

    }
    else
    {
        header('Location: ../HTML/login.php');
    }

?>