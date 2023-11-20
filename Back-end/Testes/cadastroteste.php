<?php
require 'cadastro.php';

use PHPUnit\Framework\TestCase;

class TestCadastro extends TestCase {
    public function testCadastrarUsuarioSucesso() {
        $resultado = cadastrarUsuario("Nome Teste", "12345", "123.456.789-09", "Masculino", "teste@email.com", "senha123");

        $this->assertEquals("Cadastro realizado com sucesso!", $resultado);
    }

    public function testCadastrarUsuarioErro() {
        $resultado = cadastrarUsuario("Nome Teste", "12345", "123.456.789-09", "Masculino", "teste@email.com", "senha_invalida");

        $this->assertStringContainsString("Erro ao cadastrar:", $resultado);
    }
}
?>