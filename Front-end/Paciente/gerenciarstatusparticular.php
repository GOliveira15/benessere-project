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

    <title>Clínica Benessere | Gerenciar status</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../../Recursos/gerenciar.png" alt="" width="72" height="72">
            <h2>Gerenciar status</h2>
            <p class="lead">
                Otimize a experiência ao preencher os dados com rapidez, garantindo um acesso contínuo e personalizado
                ao sistema, desfrutando de todas as funcionalidades automatizadas que facilitam o dia a dia.
            </p>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Gerenciar status</h4>
                <form class="needs-validation" novalidate method="post">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select class="custom-select d-block w-100" id="status" name="status" required>
                            <option value="">Selecione...</option>
                            <option value="Cancelada">Cancelada</option>
                        </select>
                        <div class="invalid-feedback">
                            É necessário um novo status válido.
                        </div>
                    </div>

                    <hr class="mb-4">

                    <button class="btn btn-primary btn-lg btn-block" type="submit">Confirmar status</button>

                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "benessere";

                    $connection = new mysqli($servername, $username, $password, $dbname);

                    if ($connection->connect_error) {
                        die("Erro na conexão com o banco de dados: " . $connection->connect_error);
                    }

                    if (isset($_GET['consulta_particular_id']) && is_numeric($_GET['consulta_particular_id'])) {
                        $consulta_particular_id = $_GET['consulta_particular_id'];
                    } else {
                        // header('Location: index.php');
                    }

                    if (isset($_POST["status"])) {
                        $status = $_POST["status"];

                        error_log("Status: " . $status);

                        $sql = "UPDATE consulta_particular SET status='$status' WHERE consulta_particular_id='$consulta_particular_id'";

                        if ($connection->query($sql) === TRUE) {
                            echo
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
                    <a href="../Paciente/veragendamentos.php">Voltar para a página anterior</a>
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
</body>

</html>