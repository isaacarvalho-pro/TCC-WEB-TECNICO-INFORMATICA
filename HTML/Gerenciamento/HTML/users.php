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

    

    $selectUsers = "SELECT * FROM USUARIOS WHERE NIVELACESSO <> 1 ORDER BY ID DESC";

    $result = $conn->query($selectUsers);
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


        <div class="centralizarTabela">

            <div class="divTitulo">
                <h1>Clientes cadastrados</h1>
            </div>

            <br>

            <div class="tabela-clientes">
                <table class="table table-striped table-bordered tabela">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Username</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Número</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($user_data = $result->fetch(PDO::FETCH_ASSOC))
                            {
                                $id = $user_data['ID'];
                                $nome = $user_data['USERNAME'];
                                $email = $user_data['EMAIL'];
                                $numero = $user_data['CELL'];



                                echo "<tr>";
                                echo "<td>".$id."</td>";
                                echo "<td>".$nome."</td>";
                                echo "<td>".$email."</td>";
                                echo "<td>".$numero."</td>";
                                echo "<td> <a class='btn btn-sm btn-primary' href='../../editUser.php?ID_USER=$user_data[ID]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'> <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/> <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/> 
                                </svg>
                                </a>

                                <a class='btn btn-sm btn-danger' href='../../deletUser.php?ID_USER=$user_data[ID]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                                </a>

                                <a class='btn btn-sm btn-warning' style='color: white' href='../php/menosVipClient.php?ID_USER=$user_data[ID]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-0-circle' viewBox='0 0 16 16'>
                                <path d='M7.988 12.158c-1.851 0-2.941-1.57-2.941-3.99V7.84c0-2.408 1.101-3.996 2.965-3.996 1.857 0 2.935 1.57 2.935 3.996v.328c0 2.408-1.101 3.99-2.959 3.99ZM8 4.951c-1.008 0-1.629 1.09-1.629 2.895v.31c0 1.81.627 2.895 1.629 2.895s1.623-1.09 1.623-2.895v-.31c0-1.8-.621-2.895-1.623-2.895Z'/>
                                <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z'/>
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

    </div>


</body>

</html>