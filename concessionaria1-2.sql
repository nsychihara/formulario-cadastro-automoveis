-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 03/09/2025 às 13:32
-- Versão do servidor: 8.0.40
-- Versão do PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `concessionaria1`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `automoveis`
--

CREATE TABLE `automoveis` (
  `codigo` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `chassi` varchar(50) NOT NULL,
  `montadora` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `automoveis`
--

INSERT INTO `automoveis` (`codigo`, `nome`, `placa`, `chassi`, `montadora`) VALUES
(1, 'golf', 'GEW2218', '84719324878743', 1),
(2, 'prisma', 'klp0400', '93847237424', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `montadoras`
--

CREATE TABLE `montadoras` (
  `codigo` int NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `montadoras`
--

INSERT INTO `montadoras` (`codigo`, `nome`) VALUES
(1, 'Volkswagen'),
(2, 'Ford'),
(3, 'Fiat'),
(4, 'Chevrolet');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `automoveis`
--
ALTER TABLE `automoveis`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `automoveis`
--
ALTER TABLE `automoveis`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
