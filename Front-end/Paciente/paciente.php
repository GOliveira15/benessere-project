<?php
include('protect.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="../CSS/dashboard.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../../Recursos/favicon.png">

    <title>Clínica Benessere | Visão Geral do Paciente</title>
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.html">
            <img src="../../Recursos/icon.png" width="25" height="25" class="d-inline-block align-top" alt="">
            Clínica Benessere
        </a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Buscar" aria-label="Buscar">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="logout.php">Sair</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Visão Geral <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Paciente/veragendamentos.php">
                                <span data-feather="plus-square"></span>
                                Agendamentos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Paciente/verprescricoes.php">
                                <span data-feather="archive"></span>
                                Prescrições
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Paciente/versolicitacoes.php">
                                <span data-feather="plus-square"></span>
                                Solicitações
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Paciente/verexames.php">
                                <span data-feather="file"></span>
                                Exames
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Visão Geral</h1>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                // Conexão com o banco de dados
                                $servername = "localhost";
                                $username = "root";
                                $password = ""; // Coloque a senha do seu banco, se houver
                                $dbname = "benessere";

                                $connection = new mysqli($servername, $username, $password, $dbname);

                                // Verifica a conexão
                                if ($connection->connect_error) {
                                    die("Erro na conexão com o banco de dados: " . $connection->connect_error);
                                }

                                // Consulta SQL para obter o total de registros nas tabelas consulta_particular e consulta_plano
                                $sql = "SELECT 
                                        (SELECT COUNT(*) FROM consulta_particular WHERE paciente_id='$_SESSION[paciente_id]') + (SELECT COUNT(*) FROM consulta_plano WHERE paciente_id='$_SESSION[paciente_id]') AS total_consultas";

                                $result = $connection->query($sql);

                                // Verificação e exibição do resultado
                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    $totalConsultas = $row['total_consultas'];

                                    // Exibe o total de consultas centralizado na tag <p class="card-text">
                                    echo '<h1 class="card-title text-center">' . $totalConsultas . '</h1>';
                                } else {
                                    echo "Erro na execução da consulta: " . $connection->error;
                                }

                                // Fecha a conexão com o banco de dados
                                $connection->close();
                                ?>
                                <p class="card-text text-center">
                                    Total de Agendamentos
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                // Conexão com o banco de dados
                                $servername = "localhost";
                                $username = "root";
                                $password = ""; // Coloque a senha do seu banco, se houver
                                $dbname = "benessere";

                                $connection = new mysqli($servername, $username, $password, $dbname);

                                // Verifica a conexão
                                if ($connection->connect_error) {
                                    die("Erro na conexão com o banco de dados: " . $connection->connect_error);
                                }

                                // Consulta SQL para obter o total de registros nas tabelas prescricao_particular e prescricao_plano
                                $sql = "SELECT 
                                        (SELECT COUNT(*) FROM prescricao_particular WHERE paciente_id='$_SESSION[paciente_id]') + (SELECT COUNT(*) FROM prescricao_plano WHERE paciente_id='$_SESSION[paciente_id]') AS total_prescricoes";

                                $result = $connection->query($sql);

                                // Verificação e exibição do resultado
                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    $totalPrescricoes = $row['total_prescricoes'];

                                    // Exibe o total de prescrições centralizado na tag <p class="card-text">
                                    echo '<h1 class="card-title text-center">' . $totalPrescricoes . '</h1>';
                                } else {
                                    echo "Erro na execução da consulta: " . $connection->error;
                                }

                                // Fecha a conexão com o banco de dados
                                $connection->close();
                                ?>
                                <p class="card-text text-center">
                                    Total de Prescrições
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                // Conexão com o banco de dados
                                $servername = "localhost";
                                $username = "root";
                                $password = ""; // Coloque a senha do seu banco, se houver
                                $dbname = "benessere";

                                $connection = new mysqli($servername, $username, $password, $dbname);

                                // Verifica a conexão
                                if ($connection->connect_error) {
                                    die("Erro na conexão com o banco de dados: " . $connection->connect_error);
                                }

                                // Consulta SQL para obter o total de registros nas tabelas solicitacao_plano e solicitacao_particular
                                $sql = "SELECT
                                        (SELECT COUNT(*) FROM solicitacao_plano WHERE paciente_id='$_SESSION[paciente_id]') + (SELECT COUNT(*) FROM solicitacao_particular WHERE paciente_id='$_SESSION[paciente_id]') AS total_solicitacoes";

                                $result = $connection->query($sql);

                                // Verificação e exibição do resultado
                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    $totalSolicitacoes = $row['total_solicitacoes'];

                                    // Exibe o total de solicitações centralizado na tag <p class="card-text">
                                    echo '<h1 class="card-title text-center">' . $totalSolicitacoes . '</h1>';
                                } else {
                                    echo "Erro na execução da consulta: " . $connection->error;
                                }

                                // Fecha a conexão com o banco de dados
                                $connection->close();
                                ?>
                                <p class="card-text text-center">
                                    Total de Solicitações
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                // Conexão com o banco de dados
                                $servername = "localhost";
                                $username = "root";
                                $password = ""; // Coloque a senha do seu banco, se houver
                                $dbname = "benessere";

                                $connection = new mysqli($servername, $username, $password, $dbname);

                                // Verifica a conexão
                                if ($connection->connect_error) {
                                    die("Erro na conexão com o banco de dados: " . $connection->connect_error);
                                }

                                // Consulta SQL para obter o total de registros nas tabelas exame_particular e exame_plano
                                $sql = "SELECT 
                                        (SELECT COUNT(*) FROM exame_particular WHERE paciente_id='$_SESSION[paciente_id]') + (SELECT COUNT(*) FROM exame_plano WHERE paciente_id='$_SESSION[paciente_id]') AS total_exames";

                                $result = $connection->query($sql);

                                // Verificação e exibição do resultado
                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    $totalExames = $row['total_exames'];

                                    // Exibe o total de exames centralizado na tag <p class="card-text">
                                    echo '<h1 class="card-title text-center">' . $totalExames . '</h1>';
                                } else {
                                    echo "Erro na execução da consulta: " . $connection->error;
                                }

                                // Fecha a conexão com o banco de dados
                                $connection->close();
                                ?>
                                <p class="card-text text-center">
                                    Total de Exames
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <img class="card-img-top" src="../../Recursos/medicos.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Agendamentos</h5>
                                <p class="card-text">
                                    Confira os seus agendamentos.
                                </p>
                                <a href="../Paciente/veragendamentos.php" class="btn btn-primary">Ver agendamentos</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <img class="card-img-top" src="../../Recursos/exames.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Exames</h5>
                                <p class="card-text">
                                    Acompanhe os exames.
                                </p>
                                <a href="../Paciente/verexames.php" class="btn btn-primary">Ver exames</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
</body>

</html>