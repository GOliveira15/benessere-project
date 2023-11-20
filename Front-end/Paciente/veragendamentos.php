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

    <title>Clínica Benessere | Agendamentos</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../../Recursos/agendamento.png" alt="" width="72" height="72">
            <h2>Agendamentos</h2>
            <p class="lead">
                Otimize a experiência ao preencher os dados com rapidez, garantindo um acesso contínuo e personalizado
                ao sistema, desfrutando de todas as funcionalidades automatizadas que facilitam o dia a dia.
            </p>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-1">
                <div class="row">
                    <div class="col-md-10 mb-3">
                        <h4 class="mb-3">Agendamento por Plano de Saúde</h4>
                    </div>
                    <div class="col-md-2 mb-3">
                        <a href="../Paciente/consultaplano.php" class="btn btn-primary btn-lg btn-block">Novo</a>
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Paciente</th>
                            <th scope="col">Plano</th>
                            <th scope="col">Médico</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Status</th>
                            <th scope="col">Cancelar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "benessere";

                        $connection = new mysqli($servername, $username, $password, $dbname);

                        if ($connection->connect_error) {
                            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
                        }

                        $sql = "SELECT * FROM consulta_plano WHERE paciente_id='$_SESSION[paciente_id]'";
                        $rs = mysqli_query($connection, $sql) or die("Erro ao executar a consulta!" . mysqli_error($connection));

                        while ($dados = mysqli_fetch_assoc($rs)) {
                            ?>
                            <tr>
                                <th scope="row">
                                    <?= $dados["consulta_plano_id"] ?>
                                </th>
                                <td>
                                    <?= $dados["paciente_id"] ?>
                                </td>
                                <td>
                                    <?= $dados["plano_id"] ?>
                                </td>
                                <td>
                                    <?= $dados["medico_id"] ?>
                                </td>
                                <td>
                                    <?= $dados["data_consulta"] ?>
                                </td>
                                <td>
                                    <?= $dados["hora_consulta"] ?>
                                </td>
                                <td>
                                    <?= $dados["status"] ?>
                                </td>
                                <td>
                                    <?php
                                    echo "<a href='../Paciente/gerenciarstatusplano.php?consulta_plano_id=$dados[consulta_plano_id]'>Cancelar</a>"
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tr>
                    </tbody>
                </table>

                <div class="row mt-5">
                    <div class="col-md-10 mb-3">
                        <h4 class="mb-3">Agendamento Particular</h4>
                    </div>
                    <div class="col-md-2 mb-3">
                        <a href="../Paciente/consultaparticular.php" class="btn btn-primary btn-lg btn-block">Novo</a>
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Paciente</th>
                            <th scope="col">Médico</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Status</th>
                            <th scope="col">Cancelar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "benessere";

                        $connection = new mysqli($servername, $username, $password, $dbname);

                        if ($connection->connect_error) {
                            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
                        }

                        $sql = "SELECT * FROM consulta_particular WHERE paciente_id='$_SESSION[paciente_id]'";
                        $rs = mysqli_query($connection, $sql) or die("Erro ao executar a consulta!" . mysqli_error($connection));

                        while ($dados = mysqli_fetch_assoc($rs)) {
                            ?>
                            <tr>
                                <th scope="row">
                                    <?= $dados["consulta_particular_id"] ?>
                                </th>
                                <td>
                                    <?= $dados["paciente_id"] ?>
                                </td>
                                <td>
                                    <?= $dados["medico_id"] ?>
                                </td>
                                <td>
                                    <?= $dados["data_consulta"] ?>
                                </td>
                                <td>
                                    <?= $dados["hora_consulta"] ?>
                                </td>
                                <td>
                                    <?= $dados["valor"] ?>
                                </td>
                                <td>
                                    <?= $dados["status"] ?>
                                </td>
                                <td>
                                    <?php
                                    echo "<a href='../Paciente/gerenciarstatusparticular.php?consulta_particular_id=$dados[consulta_particular_id]'>Cancelar</a>"
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>

                <hr class="mb-4 mt-5">

                <div class="text-center mt-4">
                    <a href="../Paciente/paciente.php">Voltar para a página anterior</a>
                </div>
            </div>
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
        (function () {
            'use strict';

            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
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
</body>

</html>