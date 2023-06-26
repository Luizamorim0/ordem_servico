-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/06/2023 às 03:38
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_final_php`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` char(110) NOT NULL,
  `senha` char(14) NOT NULL,
  `cpf` char(15) NOT NULL,
  `rg` char(14) NOT NULL,
  `telefone` char(14) NOT NULL,
  `endereco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `senha`, `cpf`, `rg`, `telefone`, `endereco`) VALUES
(6, 'Luiz Eduardo Paz', 'luizeduardo92@gmail.com', 'teste', '239.129.593-34', '123456789', '(85)93948-2838', 'Av Raul Barbosa 2388');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` char(15) NOT NULL,
  `peca_1` varchar(50) NOT NULL,
  `valor1` decimal(10,2) NOT NULL,
  `peca_2` varchar(50) NOT NULL,
  `valor2` decimal(10,2) NOT NULL,
  `peca_3` varchar(50) NOT NULL,
  `valor3` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `email`, `cpf`, `peca_1`, `valor1`, `peca_2`, `valor2`, `peca_3`, `valor3`) VALUES
('Luiz Eduardo Paz', 'luizeduardopaz23@gmail.com', '123.456.789-10', 'asd', 123.00, 'asdwe', 123.00, 'qwe', 482.00),
('Luiz Eduardo Paz', 'luizeduardopaz23@gmail.com', '123.456.789-10', 'asd', 123.00, 'asdwe', 123.00, 'qwe', 482.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
