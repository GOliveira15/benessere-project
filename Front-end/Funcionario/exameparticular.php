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

    <title>Clínica Benessere | Exame Particular</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../../Recursos/exame.png" alt="" width="72" height="72">
            <h2>Exame Particular</h2>
            <p class="lead">
                Otimize a experiência ao preencher os dados com rapidez, garantindo um acesso contínuo e personalizado
                ao sistema, desfrutando de todas as funcionalidades automatizadas que facilitam o dia a dia.
            </p>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Exame</h4>
                <form class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="paciente">Paciente <span class="text-muted">(Obrigatório)</span></label>
                        <select class="custom-select d-block w-100" id="paciente" required>
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
                            $sql = "SELECT paciente_id, nome_completo FROM paciente";
                            $result = $connection->query($sql);

                            // Preenche as opções do menu suspenso
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['paciente_id'] . "'>" . $row['nome_completo'] . "</option>";
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
                        <label for="medico">Médico <span class="text-muted">(Obrigatório)</span></label>
                        <select class="custom-select d-block w-100" id="medico" required>
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
                                    echo "<option value='" . $row['medico_id'] . "'>" . $row['nome_completo'] . "</option>";
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

                    <div class="mb-3">
                        <label for="consulta">Consulta <span class="text-muted">(Obrigatório)</span></label>
                        <select class="custom-select d-block w-100" id="consulta" required>
                            <option value="">Selecione...</option>
                            <option value="">Nomes aqui</option>
                        </select>
                        <div class="invalid-feedback">
                            É necessário uma consulta válida.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="solicitacao">Solicitação <span class="text-muted">(Obrigatório)</span></label>
                        <select class="custom-select d-block w-100" id="solicitacao" required>
                            <option value="">Selecione...</option>
                            <option value="">Nomes aqui</option>
                        </select>
                        <div class="invalid-feedback">
                            É necessário uma solicitação válida.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="arquivo">Arquivo <span class="text-muted">(Obrigatório)</span></label>
                            <input type="file" class="form-control" id="arquivo" placeholder="Detalhe a solicitação">
                            <div class="invalid-feedback">
                                Por favor insira um arquivo válido.
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">

                    <button class="btn btn-primary btn-lg btn-block" type="submit">Confirmar exame</button>

                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "benessere";

                    $connection = new mysqli($servername, $username, $password, $dbname);

                    if ($connection->connect_error) {
                        die("Erro na conexão com o banco de dados: " . $connection->connect_error);
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
                        $paciente_id = $_POST["paciente_id"];
                        $plano_id = $_POST["plano_id"];
                        $medico_id = $_POST["medico_id"];
                        $consulta_plano_id = $_POST["consulta_particular_id"];
                        $solicitacao_plano_id = $_POST["solicitacao_particular_id"];
                        $arquivo = $_POST["arquivo"];

                        error_log("Paciente: " . $paciente_id);
                        error_log("Plano: " . $plano_id);
                        error_log("Médico: " . $medico_id);
                        error_log("Consulta: " . $consulta_particular_id);
                        error_log("Solicitação: " . $solicitacao_particular_id);
                        error_log("Arquivo: " . $arquivo);

                        $sql = "INSERT INTO exame_particular (paciente_id, plano_id, medico_id, consulta_particular_id, solicitacao_plano, arquivo) VALUES ('$paciente_id', '$plano_id' , '$medico_id', '$consulta_particular_id', '$solicitacao_particular_id', '$arquivo')";

                        if ($connection->query($sql) === TRUE) {
                            "<div class='alert alert-success mt-4 text-center' role='alert'>
                                Cadastro realizado com sucesso
                            </div>";
                        } else {
                            echo
                            "<div class='alert alert-danger mt-4 text-center' role='alert'>
                                Erro ao cadastrar: " . $connection->error .
                            "</div>";
                        }
                    }

                    $connection->close();
                    ?>
                </form>
                <div class="text-center mt-4">
                    <a href="../Funcionario/verexames.php">Voltar para a página anterior</a>
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