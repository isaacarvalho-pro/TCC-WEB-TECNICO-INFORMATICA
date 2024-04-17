<?php 

    include_once('../PHP/config.php');

    if (isset($_POST['update'])) {

        $id = $_GET['id'];
    
        $user = $_POST['user'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
    
        $sqlUpdate = $conn->prepare("UPDATE USUARIOS SET USERNAME='$user', USER_PASSWORD='$password', EMAIL='$email', CEll='$tel'
        WHERE ID=$id");
    
        $sqlUpdate->execute();
        

         echo "<script>";
         echo "alert('Dados atualizados com sucesso!!!.');";
         echo "window.location.href = 'Gerenciamento/HTML/users.php';";
         echo "</script>";
    
    }

?>