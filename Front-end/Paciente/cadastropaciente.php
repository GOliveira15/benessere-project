<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="../CSS/register.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../../Recursos/favicon.png">

    <title>Clínica Benessere | Cadastro de Paciente</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../../Recursos/paciente.png" alt="" width="72" height="72">
            <h2>Cadastro de Paciente</h2>
            <p class="lead">
                Otimize a experiência ao preencher os dados com rapidez, garantindo um acesso contínuo e personalizado
                ao sistema, desfrutando de todas as funcionalidades automatizadas que facilitam o dia a dia.
            </p>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Dados pessoais</h4>
                <form class="needs-validation" novalidate method="post" action="">
                    <div class="mb-3">
                        <label for="fullname">Nome completo <span class="text-muted">(Obrigatório)</span></label>
                        <input type="text" class="form-control" name="fullname" id="fullname"
                            placeholder="Informe o nome completo" value="" required>
                        <div class="invalid-feedback">
                            É necessário um nome válido.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cpf">CPF <span class="text-muted">(Obrigatório)</span></label>
                            <input type="text" class="form-control" name="cpf" id="cpf"
                                placeholder="Informe o CPF sem pontuação" value="" required>
                            <div class="invalid-feedback">
                                É necessário um CPF válido.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefone">Telefone <span class="text-muted">(Obrigatório)</span></label>
                            <input type="text" class="form-control" name="telefone" id="telefone"
                                placeholder="Informe o telefone sem pontuação" value="" required>
                            <div class="invalid-feedback">
                                É necessário um telefone válido.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Gênero <span class="text-muted">(Obrigatório)</span></label>
                        <div class="custom-control custom-radio">
                            <input id="masculino" name="genero" type="radio" class="custom-control-input"
                                value="M" required>
                            <label class="custom-control-label" for="masculino">Masculino</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="feminino" name="genero" type="radio" class="custom-control-input"
                                value="F" required>
                            <label class="custom-control-label" for="feminino">Feminino</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="outro" name="genero" type="radio" class="custom-control-input" value="O"
                                required>
                            <label class="custom-control-label" for="outro">Outro</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="endereco">Endereço completo <span class="text-muted">(Obrigatório)</span></label>
                        <input type="text" class="form-control" name="endereco" id="endereco"
                            placeholder="Logradouro, número, bairro, cidade, estado">
                        <div class="invalid-feedback">
                            Por favor insira um endereço válido.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Obrigatório)</span></label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="email@exemplo.com">
                        <div class="invalid-feedback">
                            Por favor insira um e-mail válido.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="senha">Senha <span class="text-muted">(Obrigatório)</span></label>
                            <input type="password" class="form-control" name="senha" id="senha"
                                placeholder="Senha de até 10 dígitos">
                            <div class="invalid-feedback">
                                Por favor insira uma senha válida.
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">

                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Confirmar cadastro</button>

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
                        $nome_completo = $_POST["fullname"];
                        $cpf = $_POST["cpf"];
                        $telefone = $_POST["telefone"];
                        $genero = $_POST["genero"];
                        $endereco = $_POST["endereco"];
                        $email = $_POST["email"];
                        $senha = $_POST["senha"];

                        error_log("Nome Completo: " . $nome_completo);
                        error_log("CPF: " . $cpf);
                        error_log("Telefone: " . $telefone);
                        error_log("Gênero: " . $genero);
                        error_log("Endereço: " . $endereco);
                        error_log("Email: " . $email);
                        error_log("Senha: " . $senha);

                        $sql = "INSERT INTO paciente (nome_completo, cpf, telefone, genero, endereco, email, senha) VALUES ('$nome_completo', '$cpf', '$telefone', '$genero', '$endereco', '$email', '$senha')";

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
                    <a href="entrarpaciente.php">Voltar para a página anterior</a>
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
        (function () {
            'use strict';

            window.addEventListener('load', function () {
                var forms = document.getElementsByClassName('needs-validation');

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