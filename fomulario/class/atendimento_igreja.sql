-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Maio-2021 às 22:19
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `atendimento_igreja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `res_form`
--

CREATE TABLE `res_form` (
  `id` int(11) NOT NULL,
  `momento_registro` datetime NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `resp_ged` varchar(4) NOT NULL,
  `nome_ged` varchar(100) NOT NULL,
  `nome_supervisor` varchar(100) NOT NULL,
  `tipo_ajuda_opcao1` varchar(255) NOT NULL,
  `tipo_ajuda_opcao2` varchar(255) NOT NULL,
  `tipo_ajuda_opcao3` varchar(255) NOT NULL,
  `tipo_ajuda_opcao4` varchar(255) NOT NULL,
  `tipo_ajuda_opcao5` varchar(255) NOT NULL,
  `tipo_ajuda_opcao6` varchar(255) NOT NULL,
  `necessidade` varchar(255) NOT NULL,
  `data_agendamento` varchar(100) NOT NULL,
  `nome_profissional` varchar(100) NOT NULL,
  `situacao_agendamento` varchar(4) NOT NULL,
  `respon_agendamento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `res_form`
--

INSERT INTO `res_form` (`id`, `momento_registro`, `nome`, `email`, `telefone`, `endereco`, `resp_ged`, `nome_ged`, `nome_supervisor`, `tipo_ajuda_opcao1`, `tipo_ajuda_opcao2`, `tipo_ajuda_opcao3`, `tipo_ajuda_opcao4`, `tipo_ajuda_opcao5`, `tipo_ajuda_opcao6`, `necessidade`, `data_agendamento`, `nome_profissional`, `situacao_agendamento`, `respon_agendamento`) VALUES
(1, '2021-05-05 13:33:00', 'Valdean Souza', 'valdeanpds@gmail.com', '92992961661', '46, 46 - 46', 'Sim', 'nome', 'nome', '', '', 'Ajuda Social (alimentícias, medicações, transporte para uma unidade de saúde, etc)', '', '', '', 'aaaaaa', '', '', 'Não', ''),
(2, '2021-05-05 13:36:25', 'Valdean Souza', 'valdeanpds@gmail.com', '92992961661', '46, 46 - 46', 'Sim', 'nome', 'nome', '', '', 'Ajuda Social (alimentícias, medicações, transporte para uma unidade de saúde, etc)', '', '', '', 'aaaaaa', '', '', 'Não', ''),
(3, '2021-05-05 13:37:50', 'Valdean Souza', 'valdeanpds@gmail.com', '92992961661', 'aa, aa - aaa', 'Não', '', '', '', 'Apoio Psicológico (Estou de luto, depressão, ansiedade)', 'Ajuda Social (alimentícias, medicações, transporte para uma unidade de saúde, etc)', '', '', 'aaaaa', 'aaaaa', '', '', 'Não', ''),
(4, '2021-05-06 16:29:15', 'Valdean Souza', 'valdeanpds@gmail.com', '92992961661', 'Beco Benayon, 162 - Compensa 2', 'Sim', 'Getsamane', 'Postor Marcos', 'Apoio Espiritual (Pedido de oração, palavra do pastor, leitura da palavra de Deus)', 'Apoio Psicológico (Estou de luto, depressão, ansiedade)', 'Ajuda Social (alimentícias, medicações, transporte para uma unidade de saúde, etc)', '', '', '', 'Sem nada a declarar', '', '', 'Não', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `cargo`, `nome`, `img`) VALUES
(1, 'valdeanSouza', '1598753', 2, 'Valdean Souza', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `res_form`
--
ALTER TABLE `res_form`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `res_form`
--
ALTER TABLE `res_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
