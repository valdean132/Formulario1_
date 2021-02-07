-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 07/02/2021 às 01:22
-- Versão do servidor: 10.4.17-MariaDB
-- Versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_canaa`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `res_form`
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
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `res_form`
--
ALTER TABLE `res_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `res_form`
--
ALTER TABLE `res_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
