<?php

if (isset($_POST['submit'])) {

    include_once('../PHP/config.php');

    $user = $_POST['user'];
    $password = $_POST['password'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];

    //faz o select para verificar se retorna alguma linha de username igual
    $sqlVerificaRedundancia = "SELECT * FROM USUARIOS WHERE USERNAME = '$user'";
    $stmt2 = $conn->prepare($sqlVerificaRedundancia);
    $stmt2->execute();

    $resultadoReduncia = $stmt2->fetchAll();
    $numRows = count($resultadoReduncia);


    if (!empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['tel']) && !empty('email')) {
        if (strlen($password) < 6) {

            echo "<script>";
            echo "alert('Senha deve ter no mínimo 6 digitos!');";
            echo "</script>";
        } else {

            if (strlen($tel) < 14) {

                echo "<script>";
                echo "alert('Digite um número de telefone válido!');";
                echo "</script>";
            } else {
                if ($numRows >= 1) {
                    echo "<script>";
                    echo "alert('Username já está em uso, escolha outro!');";
                    echo "</script>";
                } else {
                    $stmt = $conn->prepare("INSERT INTO USUARIOS(USERNAME,USER_PASSWORD,CELL,EMAIL,NIVELACESSO) VALUES ('$user', '$password', '$tel', '$email', '0')");
                    $stmt->execute();
                    // $result = mysqli_query($conexao, "INSERT INTO USUARIOS(USERNAME,USER_PASSWORD,CELL,EMAIL) VALUES ('$user', '$password', '$tel', '$email')");
                    header('Location: login.php');
                }
            }
        }
    } else {
        echo "<script>";
        echo "alert('Preencha os dados!');";
        echo "</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../JS/register.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<body>
    <header class="header-main">
        <nav class="topmenu">
            <a href="login.php" class="voltar">Voltar para a página de login</a>
        </nav>
    </header>

    <main class="contents-main">
        <div class="background-login">
            <div class="main-login">
                <form id="form-login" class="login-box" action="registra.php" method="POST">
                    <h1 class="text-login">Registre-se</h1>
                    <div class="div-inputs">
                        <div class="username-input">
                            <i class="fa-regular fa-circle-user"></i>
                            <input type="text" name="user" id="user" class="inputs" placeholder="Username">
                        </div>

                        <div class="password-input">
                            <i class="fa-solid fa-key"></i>
                            <input type="password" name="password" id="password" class="inputs" placeholder="Senha">
                        </div>

                        <div class="tel-input">
                            <i class="fa-solid fa-mobile"></i>
                            <input type="text" id="tel" name="tel" class="inputs tel" placeholder="Celular">
                        </div>

                        <div class="email-input">
                            <i class="fa-regular fa-envelope"></i>
                            <input type="email" id="email" name="email" class="inputs" placeholder="E-mail">
                        </div>


                        <div class="div-butaoLogin">
                            <input type="submit" name="submit" id="register-button" class="botao-login inputs" onclick="validaRegistro()" value="Registrar">
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </main>

    <footer>

    </footer>
</body>

</html>




</body>

</html>


<script>
    $(document).ready(function() {
        $('.tel').mask('(00)00000-0000');
    });
</script>