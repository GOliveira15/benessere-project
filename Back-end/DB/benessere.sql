-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/11/2023 às 03:54
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `benessere`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta_particular`
--

CREATE TABLE `consulta_particular` (
  `consulta_particular_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `data_consulta` date NOT NULL,
  `hora_consulta` time NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `consulta_particular`
--

INSERT INTO `consulta_particular` (`consulta_particular_id`, `paciente_id`, `medico_id`, `data_consulta`, `hora_consulta`, `valor`, `status`) VALUES
(15, 5, 5, '2023-11-10', '13:30:00', 160, 'Cancelada'),
(14, 4, 4, '2023-11-09', '11:45:00', 180, 'Agendada'),
(13, 3, 3, '2023-11-08', '10:00:00', 200, 'Realizada'),
(12, 2, 2, '2023-11-07', '09:15:00', 120, 'Confirmada'),
(11, 1, 1, '2023-11-06', '08:30:00', 150, 'Agendada'),
(16, 6, 6, '2023-11-11', '14:15:00', 250, 'Confirmada'),
(17, 7, 7, '2023-11-12', '15:00:00', 130, 'Realizada'),
(18, 8, 8, '2023-11-13', '16:45:00', 175, 'Agendada'),
(19, 9, 9, '2023-11-14', '18:30:00', 190, 'Confirmada'),
(20, 10, 10, '2023-11-15', '19:15:00', 140, 'Realizada');

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta_plano`
--

CREATE TABLE `consulta_plano` (
  `consulta_plano_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `plano_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `data_consulta` date NOT NULL,
  `hora_consulta` time NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `consulta_plano`
--

INSERT INTO `consulta_plano` (`consulta_plano_id`, `paciente_id`, `plano_id`, `medico_id`, `data_consulta`, `hora_consulta`, `status`) VALUES
(1, 1, 1, 1, '2023-11-06', '08:30:00', 'Agendada'),
(2, 2, 2, 2, '2023-11-07', '09:15:00', 'Confirmada'),
(3, 3, 3, 3, '2023-11-08', '10:00:00', 'Realizada'),
(4, 4, 4, 4, '2023-11-09', '11:45:00', 'Agendada'),
(5, 5, 5, 5, '2023-11-10', '13:30:00', 'Cancelada'),
(6, 6, 6, 6, '2023-11-11', '14:15:00', 'Confirmada'),
(7, 7, 7, 7, '2023-11-12', '15:00:00', 'Realizada'),
(8, 8, 8, 8, '2023-11-13', '16:45:00', 'Agendada'),
(9, 9, 9, 9, '2023-11-14', '18:30:00', 'Confirmada'),
(10, 10, 10, 10, '2023-11-15', '19:15:00', 'Realizada');

-- --------------------------------------------------------

--
-- Estrutura para tabela `exame_particular`
--

CREATE TABLE `exame_particular` (
  `exame_particular_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `consulta_particular_id` int(11) NOT NULL,
  `solicitacao_particular_id` int(11) NOT NULL,
  `arquivo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `exame_particular`
--

INSERT INTO `exame_particular` (`exame_particular_id`, `paciente_id`, `medico_id`, `consulta_particular_id`, `solicitacao_particular_id`, `arquivo`) VALUES
(1, 1, 1, 1, 1, 'exame_paciente1.pdf'),
(2, 2, 2, 2, 2, 'exame_paciente2.pdf'),
(3, 3, 3, 3, 3, 'exame_paciente3.pdf'),
(4, 4, 4, 4, 4, 'exame_paciente4.pdf'),
(5, 5, 5, 5, 5, 'exame_paciente5.pdf'),
(6, 6, 6, 6, 6, 'exame_paciente6.pdf'),
(7, 7, 7, 7, 7, 'exame_paciente7.pdf'),
(8, 8, 8, 8, 8, 'exame_paciente8.pdf'),
(9, 9, 9, 9, 9, 'exame_paciente9.pdf'),
(10, 10, 10, 10, 10, 'exame_paciente10.pdf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `exame_plano`
--

CREATE TABLE `exame_plano` (
  `exame_plano_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `plano_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `consulta_plano_id` int(11) NOT NULL,
  `solicitacao_plano_id` int(11) NOT NULL,
  `arquivo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `exame_plano`
--

INSERT INTO `exame_plano` (`exame_plano_id`, `paciente_id`, `plano_id`, `medico_id`, `consulta_plano_id`, `solicitacao_plano_id`, `arquivo`) VALUES
(1, 1, 1, 1, 1, 1, 'arquivo_consulta1.pdf'),
(2, 2, 2, 2, 2, 2, 'arquivo_consulta2.pdf'),
(3, 3, 3, 3, 3, 3, 'arquivo_consulta3.pdf'),
(4, 4, 4, 4, 4, 4, 'arquivo_consulta4.pdf'),
(5, 5, 5, 5, 5, 5, 'arquivo_consulta5.pdf'),
(6, 6, 6, 6, 6, 6, 'arquivo_consulta6.pdf'),
(7, 7, 7, 7, 7, 7, 'arquivo_consulta7.pdf'),
(8, 8, 8, 8, 8, 8, 'arquivo_consulta8.pdf'),
(9, 9, 9, 9, 9, 9, 'arquivo_consulta9.pdf'),
(10, 10, 10, 10, 10, 10, 'arquivo_consulta10.pdf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `funcionario_id` int(11) NOT NULL,
  `nome_completo` varchar(60) NOT NULL,
  `matricula` varchar(15) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `genero` char(1) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`funcionario_id`, `nome_completo`, `matricula`, `cpf`, `genero`, `email`, `senha`) VALUES
(1, 'Ana Oliveira', 'M12345', '12345678901', 'F', 'ana.oliveira@email.com', 'senha123'),
(2, 'Carlos Santos', 'M23456', '23456789012', 'M', 'carlos.santos@email.com', 'senha456'),
(3, 'Mariana Lima', 'M34567', '34567890123', 'F', 'mariana.lima@email.com', 'senha789'),
(4, 'Pedro Costa', 'M45678', '45678901234', 'M', 'pedro.costa@email.com', 'senhaabc'),
(5, 'Isabel Pereira', 'M56789', '56789012345', 'F', 'isabel.pereira@email.com', 'senhadef'),
(6, 'Fernando Santos', 'M67890', '67890123456', 'M', 'fernando.santos@email.com', 'senhaghi'),
(7, 'Luiza Lima', 'M78901', '78901234567', 'F', 'luiza.lima@email.com', 'senhajkl'),
(8, 'Roberto Oliveira', 'M89012', '89012345678', 'M', 'roberto.oliveira@email.com', 'senhamno'),
(9, 'Julia Santos', 'M90123', '90123456789', 'F', 'julia.santos@email.com', 'senhapqr'),
(10, 'André Costa', 'M01234', '12345678900', 'M', 'andre.costa@email.com', 'senhastu');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `medico_id` int(11) NOT NULL,
  `nome_completo` varchar(60) NOT NULL,
  `crm` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `genero` char(1) NOT NULL,
  `especialidade` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `medico`
--

INSERT INTO `medico` (`medico_id`, `nome_completo`, `crm`, `cpf`, `genero`, `especialidade`, `email`, `senha`) VALUES
(1, 'Dr. João Silva', 2147483647, '12345678901', 'M', 'Cardiologia', 'joao.silva@email.com', 'senha123'),
(2, 'Dra. Maria Souza', 2147483647, '23456789012', 'F', 'Dermatologia', 'maria.souza@email.com', 'senha456'),
(3, 'Dr. Carlos Oliveira', 2147483647, '34567890123', 'M', 'Ortopedia', 'carlos.oliveira@email.com', 'senha789'),
(4, 'Dra. Ana Santos', 2147483647, '45678901234', 'F', 'Pediatria', 'ana.santos@email.com', 'senhaabc'),
(5, 'Dr. Luiz Pereira', 2147483647, '56789012345', 'M', 'Ginecologia', 'luiz.pereira@email.com', 'senhadef'),
(6, 'Dra. Julia Costa', 2147483647, '67890123456', 'F', 'Oftalmologia', 'julia.costa@email.com', 'senhaghi'),
(7, 'Dr. Roberto Lima', 2147483647, '78901234567', 'M', 'Neurologia', 'roberto.lima@email.com', 'senhajkl'),
(8, 'Dra. Patricia Oliveira', 2147483647, '89012345678', 'F', 'Oncologia', 'patricia.oliveira@email.com', 'senhamno'),
(9, 'Dr. André Santos', 2147483647, '90123456789', 'M', 'Urologia', 'andre.santos@email.com', 'senhapqr'),
(10, 'Dra. Fernanda Costa', 2147483647, '12345678900', 'F', 'Psiquiatria', 'fernanda.costa@email.com', 'senhastu');

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `paciente_id` int(11) NOT NULL,
  `nome_completo` varchar(60) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `genero` char(1) NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`paciente_id`, `nome_completo`, `cpf`, `telefone`, `genero`, `endereco`, `email`, `senha`) VALUES
(1, 'Ana Oliveira', '12345678901', '(11) 98765-432', 'F', 'Rua A, 123', 'ana.oliveira@email.com', 'senha123'),
(2, 'Carlos Santos', '23456789012', '(21) 87654-321', 'M', 'Av. B, 456', 'carlos.santos@email.com', 'senha456'),
(3, 'Mariana Lima', '34567890123', '(31) 76543-210', 'F', 'Rua C, 789', 'mariana.lima@email.com', 'senha789'),
(4, 'Pedro Costa', '45678901234', '(41) 65432-109', 'M', 'Av. D, 012', 'pedro.costa@email.com', 'senhaabc'),
(5, 'Isabel Pereira', '56789012345', '(51) 54321-098', 'F', 'Rua E, 345', 'isabel.pereira@email.com', 'senhadef'),
(6, 'Fernando Santos', '67890123456', '(61) 43210-987', 'M', 'Av. F, 678', 'fernando.santos@email.com', 'senhaghi'),
(7, 'Luiza Lima', '78901234567', '(71) 32109-876', 'F', 'Rua G, 901', 'luiza.lima@email.com', 'senhajkl'),
(8, 'Roberto Oliveira', '89012345678', '(81) 21098-765', 'M', 'Av. H, 234', 'roberto.oliveira@email.com', 'senhamno'),
(9, 'Julia Santos', '90123456789', '(91) 10987-654', 'F', 'Rua I, 567', 'julia.santos@email.com', 'senhapqr'),
(10, 'André Costa', '12345678900', '(01) 98765-432', 'M', 'Av. J, 890', 'andre.costa@email.com', 'senhastu');

-- --------------------------------------------------------

--
-- Estrutura para tabela `plano`
--

CREATE TABLE `plano` (
  `plano_id` int(11) NOT NULL,
  `nome_plano` varchar(30) NOT NULL,
  `tipo_plano` varchar(30) NOT NULL,
  `fornecedor` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `plano`
--

INSERT INTO `plano` (`plano_id`, `nome_plano`, `tipo_plano`, `fornecedor`) VALUES
(1, 'Plano A', 'Individual', 'Seguradora X'),
(2, 'Plano B', 'Familiar', 'Seguradora Y'),
(3, 'Plano C', 'Empresarial', 'Seguradora Z'),
(4, 'Plano D', 'Individual', 'Seguradora X'),
(5, 'Plano E', 'Familiar', 'Seguradora Y'),
(6, 'Plano F', 'Empresarial', 'Seguradora Z'),
(7, 'Plano G', 'Individual', 'Seguradora X'),
(8, 'Plano H', 'Familiar', 'Seguradora Y'),
(9, 'Plano I', 'Empresarial', 'Seguradora Z'),
(10, 'Plano J', 'Individual', 'Seguradora X');

-- --------------------------------------------------------

--
-- Estrutura para tabela `prescricao_particular`
--

CREATE TABLE `prescricao_particular` (
  `prescricao_particular_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `consulta_particular_id` int(11) NOT NULL,
  `detalhes` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `prescricao_particular`
--

INSERT INTO `prescricao_particular` (`prescricao_particular_id`, `paciente_id`, `medico_id`, `consulta_particular_id`, `detalhes`) VALUES
(1, 1, 1, 1, 'Paracetamol'),
(2, 2, 2, 2, 'Amoxicilina'),
(3, 3, 3, 3, 'Omeprazol'),
(4, 4, 4, 4, 'Atenolol'),
(5, 5, 5, 5, 'Dipirona'),
(6, 6, 6, 6, 'Ibuprofeno'),
(7, 7, 7, 7, 'Loratadina'),
(8, 8, 8, 8, 'Metformina'),
(9, 9, 9, 9, 'Sinvastatina'),
(10, 10, 10, 10, 'Ondansetrona');

-- --------------------------------------------------------

--
-- Estrutura para tabela `prescricao_plano`
--

CREATE TABLE `prescricao_plano` (
  `prescricao_plano_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `plano_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `consulta_plano_id` int(11) NOT NULL,
  `detalhes` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `prescricao_plano`
--

INSERT INTO `prescricao_plano` (`prescricao_plano_id`, `paciente_id`, `plano_id`, `medico_id`, `consulta_plano_id`, `detalhes`) VALUES
(1, 1, 1, 1, 1, 'Paracetamol'),
(2, 2, 2, 2, 2, 'Aspirina'),
(3, 3, 3, 3, 3, 'Omeprazol'),
(4, 4, 4, 4, 4, 'Ibuprofeno'),
(5, 5, 5, 5, 5, 'Dipirona'),
(6, 6, 6, 6, 6, 'Amoxicilina'),
(7, 7, 7, 7, 7, 'Loratadina'),
(8, 8, 8, 8, 8, 'Metformina'),
(9, 9, 9, 9, 9, 'Sinvastatina'),
(10, 10, 10, 10, 10, 'Ondansetrona');

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacao_particular`
--

CREATE TABLE `solicitacao_particular` (
  `solicitacao_particular_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `consulta_particular_id` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `detalhes` varchar(60) NOT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `solicitacao_particular`
--

INSERT INTO `solicitacao_particular` (`solicitacao_particular_id`, `paciente_id`, `medico_id`, `consulta_particular_id`, `tipo`, `detalhes`, `valor`) VALUES
(1, 1, 1, 1, 'Cardiologia', 'Avaliação de rotina', 150),
(2, 2, 2, 2, 'Dermatologia', 'Tratamento de pele', 120),
(3, 3, 3, 3, 'Gastroenterologia', 'Endoscopia digestiva', 200),
(4, 4, 4, 4, 'Ortopedia', 'Consulta para lesão no joelho', 180),
(5, 5, 5, 5, 'Neurologia', 'Avaliação de dor de cabeça', 160),
(6, 6, 6, 6, 'Oftalmologia', 'Exame de vista', 250),
(7, 7, 7, 7, 'Endocrinologia', 'Acompanhamento de diabetes', 130),
(8, 8, 8, 8, 'Cardiologia', 'Avaliação de pressão arterial', 175),
(9, 9, 9, 9, 'Pneumologia', 'Consulta para problemas respiratórios', 190),
(10, 10, 10, 10, 'Ginecologia', 'Consulta de rotina', 140);

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacao_plano`
--

CREATE TABLE `solicitacao_plano` (
  `solicitacao_plano_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `plano_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `consulta_plano_id` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `descricao` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `solicitacao_plano`
--

INSERT INTO `solicitacao_plano` (`solicitacao_plano_id`, `paciente_id`, `plano_id`, `medico_id`, `consulta_plano_id`, `tipo`, `descricao`) VALUES
(1, 1, 1, 1, 1, 'Cardiologia', 'Avaliação de rotina'),
(2, 2, 2, 2, 2, 'Dermatologia', 'Tratamento de pele'),
(3, 3, 3, 3, 3, 'Gastroenterologia', 'Endoscopia digestiva'),
(4, 4, 4, 4, 4, 'Ortopedia', 'Consulta para lesão no joelho'),
(5, 5, 5, 5, 5, 'Neurologia', 'Avaliação de dor de cabeça'),
(6, 6, 6, 6, 6, 'Oftalmologia', 'Exame de vista'),
(7, 7, 7, 7, 7, 'Endocrinologia', 'Acompanhamento de diabetes'),
(8, 8, 8, 8, 8, 'Cardiologia', 'Avaliação de pressão arterial'),
(9, 9, 9, 9, 9, 'Pneumologia', 'Consulta para problemas respiratórios'),
(10, 10, 10, 10, 10, 'Ginecologia', 'Consulta de rotina');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consulta_particular`
--
ALTER TABLE `consulta_particular`
  ADD PRIMARY KEY (`consulta_particular_id`),
  ADD KEY `fk_paciente_id_consulta_particular` (`paciente_id`),
  ADD KEY `fk_medico_id_consulta_particular` (`medico_id`);

--
-- Índices de tabela `consulta_plano`
--
ALTER TABLE `consulta_plano`
  ADD PRIMARY KEY (`consulta_plano_id`),
  ADD KEY `fk_paciente_id_consulta` (`paciente_id`),
  ADD KEY `fk_plano_id_consulta` (`plano_id`),
  ADD KEY `fk_medico_id_consulta` (`medico_id`);

--
-- Índices de tabela `exame_particular`
--
ALTER TABLE `exame_particular`
  ADD PRIMARY KEY (`exame_particular_id`),
  ADD KEY `fk_paciente_id_exame_particular` (`paciente_id`),
  ADD KEY `fk_medico_id_exame_particular` (`medico_id`),
  ADD KEY `fk_consulta_particular_id_exame_particular` (`consulta_particular_id`),
  ADD KEY `fk_solicitacao_particular_id_exame_particular` (`solicitacao_particular_id`);

--
-- Índices de tabela `exame_plano`
--
ALTER TABLE `exame_plano`
  ADD PRIMARY KEY (`exame_plano_id`),
  ADD KEY `fk_paciente_id_exame` (`paciente_id`),
  ADD KEY `fk_plano_id_exame` (`plano_id`),
  ADD KEY `fk_medico_id_exame` (`medico_id`),
  ADD KEY `fk_consulta_plano_id_exame` (`consulta_plano_id`),
  ADD KEY `fk_solicitacao_plano_id_exame` (`solicitacao_plano_id`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`funcionario_id`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`medico_id`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`paciente_id`);

--
-- Índices de tabela `plano`
--
ALTER TABLE `plano`
  ADD PRIMARY KEY (`plano_id`);

--
-- Índices de tabela `prescricao_particular`
--
ALTER TABLE `prescricao_particular`
  ADD PRIMARY KEY (`prescricao_particular_id`),
  ADD KEY `fk_paciente_id_prescricao_particular` (`paciente_id`),
  ADD KEY `fk_medico_id_prescricao_particular` (`medico_id`),
  ADD KEY `fk_consulta_particular_id_prescricao_particular` (`consulta_particular_id`);

--
-- Índices de tabela `prescricao_plano`
--
ALTER TABLE `prescricao_plano`
  ADD PRIMARY KEY (`prescricao_plano_id`),
  ADD KEY `fk_paciente_id_prescricao_plano` (`paciente_id`),
  ADD KEY `fk_plano_id_prescricao_plano` (`plano_id`),
  ADD KEY `fk_medico_id_prescricao_plano` (`medico_id`),
  ADD KEY `fk_consulta_plano_id_prescricao_plano` (`consulta_plano_id`);

--
-- Índices de tabela `solicitacao_particular`
--
ALTER TABLE `solicitacao_particular`
  ADD PRIMARY KEY (`solicitacao_particular_id`),
  ADD KEY `fk_paciente_id_solicitacao_particular` (`paciente_id`),
  ADD KEY `fk_medico_id_solicitacao_particular` (`medico_id`),
  ADD KEY `fk_consulta_particular_id_solicitacao_particular` (`consulta_particular_id`);

--
-- Índices de tabela `solicitacao_plano`
--
ALTER TABLE `solicitacao_plano`
  ADD PRIMARY KEY (`solicitacao_plano_id`),
  ADD KEY `fk_paciente_id_solicitacao` (`paciente_id`),
  ADD KEY `fk_plano_id_solicitacao` (`plano_id`),
  ADD KEY `fk_medico_id_solicitacao` (`medico_id`),
  ADD KEY `fk_consulta_plano_id_solicitacao` (`consulta_plano_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consulta_particular`
--
ALTER TABLE `consulta_particular`
  MODIFY `consulta_particular_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `consulta_plano`
--
ALTER TABLE `consulta_plano`
  MODIFY `consulta_plano_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `exame_particular`
--
ALTER TABLE `exame_particular`
  MODIFY `exame_particular_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `exame_plano`
--
ALTER TABLE `exame_plano`
  MODIFY `exame_plano_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `funcionario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `medico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `paciente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `plano`
--
ALTER TABLE `plano`
  MODIFY `plano_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `prescricao_particular`
--
ALTER TABLE `prescricao_particular`
  MODIFY `prescricao_particular_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `prescricao_plano`
--
ALTER TABLE `prescricao_plano`
  MODIFY `prescricao_plano_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `solicitacao_particular`
--
ALTER TABLE `solicitacao_particular`
  MODIFY `solicitacao_particular_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `solicitacao_plano`
--
ALTER TABLE `solicitacao_plano`
  MODIFY `solicitacao_plano_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
