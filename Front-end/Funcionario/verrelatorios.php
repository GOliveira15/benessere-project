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

    <link href="../CSS/register.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../../Recursos/favicon.png">

    <title>Clínica Benessere | Relatórios</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../../Recursos/relatorio.png" alt="" width="72" height="72">
            <h2>Relatórios</h2>
            <p class="lead">
                Explore o relatório semanal de operações para acompanhar o compromisso contínuo da clínica em fornecer
                cuidados de alta qualidade. Mantenha-se atualizado sobre nossas atividades e realizações.
            </p>
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

                        // Consulta SQL para obter o total de registros em ambas as tabelas
                        $sql = "SELECT SUM(total_registros) AS total_geral
                        FROM (
                            SELECT COUNT(*) AS total_registros FROM consulta_plano
                            UNION ALL
                            SELECT COUNT(*) AS total_registros FROM consulta_particular
                        ) AS total_registros_combinados";

                        $result = $connection->query($sql);

                        // Verificação e exibição do resultado
                        if ($result) {
                            $row = $result->fetch_assoc();
                            $totalGeral = $row['total_geral'];

                            // Exibe somente o valor total centralizado na tag <p class="card-text">
                            echo '<h1 class="card-title text-center">' . $totalGeral . '</h1>';
                        } else {
                            echo "Erro na execução da consulta: " . $connection->error;
                        }

                        // Fecha a conexão com o banco de dados
                        $connection->close();
                        ?>
                        <p class="card-text text-center">
                            Total de Agendamentos Gerais
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

                        // Consulta SQL para obter o total de consultas na tabela consulta_plano
                        $sql = "SELECT COUNT(*) AS total_consultas_plano FROM consulta_plano";

                        $result = $connection->query($sql);

                        // Verificação e exibição do resultado
                        if ($result) {
                            $row = $result->fetch_assoc();
                            $totalConsultasPlano = $row['total_consultas_plano'];

                            // Exibe somente o valor total centralizado na tag <p class="card-text">
                            echo '<h1 class="card-title text-center">' . $totalConsultasPlano . '</h1>';
                        } else {
                            echo "Erro na execução da consulta: " . $connection->error;
                        }

                        // Fecha a conexão com o banco de dados
                        $connection->close();
                        ?>
                        <p class="card-text text-center">
                            Total de Consultas por Plano de Saúde
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

                        // Consulta SQL para obter o total de consultas na tabela consulta_particular
                        $sql = "SELECT COUNT(*) AS total_consultas_particular FROM consulta_particular";

                        $result = $connection->query($sql);

                        // Verificação e exibição do resultado
                        if ($result) {
                            $row = $result->fetch_assoc();
                            $totalConsultasParticular = $row['total_consultas_particular'];

                            // Exibe o valor total centralizado na tag <p class="card-text">
                            echo '<h1 class="card-title text-center">' . $totalConsultasParticular . '</h1>';
                        } else {
                            echo "Erro na execução da consulta: " . $connection->error;
                        }

                        // Fecha a conexão com o banco de dados
                        $connection->close();
                        ?>
                        <p class="card-text text-center">
                            Total de Consultados Particular
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

                        // Consulta SQL para obter a soma do campo valor na tabela consulta_particular
                        $sql = "SELECT SUM(valor) AS total_valor_particular FROM consulta_particular";

                        $result = $connection->query($sql);

                        // Verificação e exibição do resultado
                        if ($result) {
                            $row = $result->fetch_assoc();
                            $totalValorParticular = $row['total_valor_particular'];

                            // Formata o valor como moeda em Real Brasileiro (BRL)
                            $totalFormatado = 'R$ ' . number_format($totalValorParticular, 2, ',', '.');

                            // Exibe o valor total formatado e centralizado na tag <p class="card-text">
                            echo '<h2 class="card-title text-center">' . $totalFormatado . '</h2>';
                        } else {
                            echo "Erro na execução da consulta: " . $connection->error;
                        }

                        // Fecha a conexão com o banco de dados
                        $connection->close();
                        ?>
                        <p class="card-text text-center">
                            Total Faturado com Consultas Particulares
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Tipos de Exames Realizados</h1>
                        <p class="card-text">
                        <table class="table table-striped">
                            <tbody>
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

                                // Consulta SQL para obter os dados combinados e a quantidade total
                                $sql = "SELECT Tipo, SUM(Quantidade) AS Quantidade FROM (
                                            SELECT detalhes AS Tipo, COUNT(*) AS Quantidade FROM solicitacao_particular GROUP BY detalhes
                                            UNION ALL
                                            SELECT descricao AS Tipo, COUNT(*) AS Quantidade FROM solicitacao_plano GROUP BY descricao
                                        ) AS TabelaCombinada GROUP BY Tipo";

                                $result = $connection->query($sql);

                                // Função para exibir os resultados
                                function exibirResultados($result)
                                {
                                    if ($result) {

                                        echo "<table class='table table-bordered text-center'>";
                                        echo "<tr><th>Tipo</th><th>Quantidade</th></tr>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr><td>{$row['Tipo']}</td><td>{$row['Quantidade']}</td></tr>";
                                        }
                                        echo "</table>";
                                    } else {
                                        echo "Erro na execução da consulta: " . $connection->error;
                                    }
                                }

                                // Exibir os resultados combinados
                                exibirResultados($result);

                                // Fecha a conexão com o banco de dados
                                $connection->close();
                                ?>
                            </tbody>
                        </table>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Consultas por Plano de Saúde</h1>
                        <p class="card-text">
                        <table class="table table-striped">
                            <tbody>
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

                                // Consulta SQL para obter o nome do plano e a quantidade de vezes utilizado
                                $sql = "SELECT p.nome_plano, COUNT(cp.plano_id) AS quantidade_utilizada
                                        FROM plano p
                                        LEFT JOIN consulta_plano cp ON p.plano_id = cp.plano_id
                                        GROUP BY p.plano_id";

                                $result = $connection->query($sql);

                                // Função para exibir os resultados
                                function exibirResultados2($result)
                                {
                                    if ($result) {

                                        echo "<table class='table table-bordered text-center'>";
                                        echo "<tr><th>Nome do Plano</th><th>Quantidade</th></tr>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr><td>{$row['nome_plano']}</td><td>{$row['quantidade_utilizada']}</td></tr>";
                                        }
                                        echo "</table>";
                                    } else {
                                        echo "Erro na execução da consulta: " . $connection->error;
                                    }
                                }

                                // Exibir os resultados combinados
                                exibirResultados2($result);

                                // Fecha a conexão com o banco de dados
                                $connection->close();
                                ?>
                            </tbody>
                        </table>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Histórico de Agendamentos</h1>
                        <p class="card-text">
                            <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mb-4 mt-5">

        <div class="text-center mt-4">
            <a href="../Funcionario/funcionario.php">Voltar para a página anterior</a>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2023 Clínica Benessere</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacidade</a></li>
                <li class="list-inline-item"><a href="#">Termos</a></li>
                <li class="list-inline-item"><a href="#">Suporte</a></li>
            </ul>
        </footer>
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

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira"],
            datasets: [{
                data: [0, 1, 24003, 0, 0],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointBackgroundColor: '#007bff'
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: false,
            }
        }
    });
    </script>
</body>

</html>