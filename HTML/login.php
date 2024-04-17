<?php

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
    <script src="../JS/login.js"></script>

</head>

<body>
    <header class="header-main">
        <nav class="topmenu">
            <a href="index.php" class="voltar">Voltar para a página principal</a>
        </nav>
    </header>

    <main class="contents-main">
        <div class="background-login">
            <div class="main-login">
                <form id="form-login" class="login-box" action="../PHP/testLogin.php" method="POST">
                    <div class="div-inputs" id="divInput">
                        <h1 class="text-login">Entre na sua conta</h1>
                    <br>
                        <div class="username-input">
                            <i class="fa-regular fa-circle-user"></i>
                            <input type="text" name="user" id="user" class="inputs" placeholder="Username">
                        </div>
                           
                        <div class="password-input">
                            <i class="fa-solid fa-key"></i>
                            <input type="password" name="password" id="password" class="inputs" placeholder="Senha">
                        </div>
            
                        <div class="div-butaoLogin">
                            <input type="submit" id="login-button" name="submit" class="botao-login inputs"  value="Login" onclick="">
                        </div>

                        <!-- <div class="div-esqueciSenha">
                            <a class="esqueciSenhaInput inputs" onclick="esqueciSenha()">Esqueci a Senha!</a>
                        </div> -->

                        <div class="div-registro">
                            <a href="registra.php">Não tem uma conta ainda?</a>
                        </div>



                    </div>

                    <!-- <div class="esqueciSenha" id="esqueciSenha">
                        <h1 class="text-login">Esqueci a Senha</h1>

                        <div class="email-input">
                            <i class="fa-regular fa-envelope"></i>
                            <input type="text" id="email" class="inputs" placeholder="Digite seu Email">
                        </div>

                        <div class="botaoEsqueci div-butaoLogin">
                            <button type="button" id="esqueciSenha-button" class="botao-login inputs" onclick="">Enviar codigo</button>
                        </div>
                    </div> -->
                    
                    
                </form>
            </div>
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>



