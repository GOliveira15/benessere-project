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

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="../CSS/register.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">

    <link rel="icon" type="image/png" sizes="32x32" href="../../Recursos/favicon.png">

    <title>Clínica Benessere | Agendamento</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../../Recursos/prescricao.png" alt="" width="72" height="72">
            <h2>Agendamento</h2>
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
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="calendar-section">
                            <div class="row no-gutters">
                                <div class="col-md-6">

                                    <div class="calendar calendar-first" id="calendar_first">
                                        <div class="calendar_header">
                                            <button class="switch-month switch-left">
                                                <i class="fa fa-chevron-left"></i>
                                            </button>
                                            <h2></h2>
                                            <button class="switch-month switch-right">
                                                <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                        <div class="calendar_weekdays"></div>
                                        <div class="calendar_content"></div>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="calendar calendar-second" id="calendar_second">
                                        <div class="calendar_header">
                                            <button class="switch-month switch-left">
                                                <i class="fa fa-chevron-left"></i>
                                            </button>
                                            <h2></h2>
                                            <button class="switch-month switch-right">
                                                <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                        <div class="calendar_weekdays"></div>
                                        <div class="calendar_content"></div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 order-md-1">
                        <form class="needs-validation" novalidate method="post" action="">
                            <div class="mb-3">
                                <label for="paciente_id">Paciente <span class="text-muted">(Obrigatório)</span></label>
                                <select class="custom-select d-block w-100" name="paciente_id" id="paciente_id"
                                    required>
                                    <option value="">Selecione...</option>
                                    <?php
                                    // Conexão com o banco de dados
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "benessere";

                                    $connection = new mysqli($servername, $username, $password, $dbname);

                                    // Verifica a conexão
                                    if ($connection->connect_error) {
                                        die("Erro na conexão com o banco de dados: " . $connection->connect_error);
                                    }

                                    // Consulta SQL para obter os paciente
                                    $sql = "SELECT paciente_id, nome_completo FROM paciente WHERE paciente_id='$_SESSION[paciente_id]'";
                                    $result = $connection->query($sql);

                                    // Preenche as opções do menu suspenso
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='$row[paciente_id]'" . $row['paciente_id'] . "'>" . $row['nome_completo'] . "</option>";
                                        }
                                    } else {
                                        echo "0 resultados encontrados";
                                    }

                                    // Fecha a conexão com o banco de dados
                                    $connection->close();
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    É necessário um paciente válido.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="plano_id">Plano <span class="text-muted">(Obrigatório)</span></label>
                                <select class="custom-select d-block w-100" name="plano_id" id="plano_id" required>
                                    <option value="">Selecione...</option>
                                    <?php
                                    // Conexão com o banco de dados
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "benessere";

                                    $connection = new mysqli($servername, $username, $password, $dbname);

                                    // Verifica a conexão
                                    if ($connection->connect_error) {
                                        die("Erro na conexão com o banco de dados: " . $connection->connect_error);
                                    }

                                    // Consulta SQL para obter os plano
                                    $sql = "SELECT plano_id, nome_plano FROM plano";
                                    $result = $connection->query($sql);

                                    // Preenche as opções do menu suspenso
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='$row[plano_id]'" . $row['plano_id'] . "'>" . $row['nome_plano'] . "</option>";
                                        }
                                    } else {
                                        echo "0 resultados encontrados";
                                    }

                                    // Fecha a conexão com o banco de dados
                                    $connection->close();
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    É necessário um plano válido.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="medico_id">Médico <span class="text-muted">(Obrigatório)</span></label>
                                <select class="custom-select d-block w-100" name="medico_id" id="medico_id" required>
                                    <option value="">Selecione...</option>
                                    <?php
                                    // Conexão com o banco de dados
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "benessere";

                                    $connection = new mysqli($servername, $username, $password, $dbname);

                                    // Verifica a conexão
                                    if ($connection->connect_error) {
                                        die("Erro na conexão com o banco de dados: " . $connection->connect_error);
                                    }

                                    // Consulta SQL para obter os médicos
                                    $sql = "SELECT medico_id, nome_completo FROM medico";
                                    $result = $connection->query($sql);

                                    // Preenche as opções do menu suspenso
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='$row[medico_id]'" . $row['medico_id'] . "'>" . $row['nome_completo'] . "</option>";
                                        }
                                    } else {
                                        echo "0 resultados encontrados";
                                    }

                                    // Fecha a conexão com o banco de dados
                                    $connection->close();
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    É necessário um médico válido.
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="data_consulta">Data da Consulta <span
                                            class="text-muted">(Obrigatório)</span></label>
                                    <input type="date" class="form-control" name="data_consulta" id="data_consulta"
                                        placeholder="Informe a data" value="" required>
                                    <div class="invalid-feedback">
                                        É necessário uma data válida.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="hora_consulta">Hora da Consulta <span
                                            class="text-muted">(Obrigatório)</span></label>
                                    <input type="time" class="form-control" name="hora_consulta" id="hora_consulta"
                                        placeholder="Informe a hora" value="" required>
                                    <div class="invalid-feedback">
                                        É necessário uma hora válida.
                                    </div>
                                </div>
                            </div>

                            <hr class="mb-4">

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Confirmar
                                agendamento</button>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="../Paciente/veragendamentos.php">Voltar para a página anterior</a>
                </div>
            </div>
        </div>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "benessere";

        $connection = new mysqli($servername, $username, $password, $dbname);

        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }

        if (isset($_POST["paciente_id"], $_POST["plano_id"], $_POST["medico_id"], $_POST["data_consulta"], $_POST["hora_consulta"])) {
            $paciente_id = $_POST["paciente_id"];
            $plano_id = $_POST["plano_id"];
            $medico_id = $_POST["medico_id"];
            $data_consulta = $_POST["data_consulta"];
            $hora_consulta = $_POST["hora_consulta"];
            $status = "Análise";

            error_log("Paciente: " . $paciente_id);
            error_log("Plano: " . $plano_id);
            error_log("Médico: " . $medico_id);
            error_log("Data da Consulta: " . $data_consulta);
            error_log("Hora da Consulta: " . $hora_consulta);
            error_log("Status: " . $status);

            $sql = "INSERT INTO consulta_plano (paciente_id, plano_id, medico_id, data_consulta, hora_consulta, status) VALUES ('$paciente_id', '$plano_id' , '$medico_id', '$data_consulta', '$hora_consulta', '$status')";

            if ($connection->query($sql) === TRUE) {
                echo
                "<div class='alert alert-success mt-4 text-center' role='alert'>
                    Agendamento Realizado com Sucesso
                </div>";
            } else {
                echo
                "<div class='alert alert-danger mt-4 text-center' role='alert'>
                    rro ao Realizar Agendamento: " . $connection->error .
                "</div>";
}
        }

        $connection->close();
        ?>

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

    <script src="../JS/jquery.min.js"></script>
    <script src="../JS/popper.js"></script>
    <script src="../JS/bootstrap.min.js"></script>
    <script src="../JS/main.js"></script>
</body>

</html>