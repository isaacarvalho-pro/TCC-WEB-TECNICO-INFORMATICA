<?php 


include_once("../PHP/config.php"); 

$id = $_GET['ID_USER'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE ID=$id");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $numRows = count($rows);

    if ($numRows > 0)
    {
        foreach ($rows as $user_data)
        {
        $user = $user_data['USERNAME'];
        $password = $user_data['USER_PASSWORD'];
        $email = $user_data['EMAIL'];
        $tel = $user_data['CELL'];

        // $funcao = $user_data['Funcao'];
        // $email = $user_data['Email'];
        // $sexo = $user_data['Sexo'];
        // $salario = $user_data['Salario'];
        // $data_admi = $user_data['Dt_Admissao'];

        // if($user_data['Dt_Demissao'] == "1900-01-01" ) {
        //     $data_demi = null;
        // }
        // else {
        //     $data_demi = $user_data['Dt_Demissao'];
        // };

        // $status = $user_data['Status_func'];
        }
    }
    else
    {
        header('Location: funcionário.php');
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script></head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<body>
    <header class="header-main">
        <nav class="topmenu">
            <a href="Gerenciamento/HTML/users.php" class="voltar">Voltar para a tabela de usuários</a>
        </nav>
    </header>

    <main class="contents-main">
        <div class="background-login">
            <div class="main-login">
                <form id="form-login" class="login-box" action="<?php echo "saveEdit.php?id=$id"; ?>" method="POST">
                    <h1 class="text-login">Atualize os Dados</h1>
                    <div class="div-inputs">
                        <div class="username-input">
                            <i class="fa-regular fa-circle-user"></i>
                            <input type="text"  name="user" id="user" class="inputs" placeholder="Username" value="<?php echo $user ?>">
                        </div>
                        <div class="password-input">
                            <i class="fa-solid fa-key"></i>
                            <input type="password" name="password" id="password" class="inputs" placeholder="Senha" value="<?php echo $password ?>">
                        </div>

                        <div class="tel-input">
                            <i class="fa-solid fa-mobile"></i>
                            <input type="text" id="tel"  name="tel" class="inputs tel" placeholder="Celular" value="<?php echo $tel?>">
                        </div>
                        
                        <div class="email-input">
                            <i class="fa-regular fa-envelope"></i>
                            <input type="email" id="email" name="email" class="inputs" placeholder="E-mail" value="<?php echo $email ?>">
                        </div>

                    

                        <div class="div-butaoLogin">
                            <input type="submit"  name="update" id="update" class="botao-login inputs" onclick="validaRegistro()" value="Registrar">
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
$(document).ready(function(){
    $('.tel').mask('(00)00000-0000');
});
</script>