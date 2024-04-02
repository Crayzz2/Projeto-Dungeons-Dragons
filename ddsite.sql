-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jun-2023 às 02:08
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ddsite`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `ID_USER` int(11) NOT NULL,
  `USERNAME` varchar(25) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`ID_USER`, `USERNAME`, `EMAIL`, `PASSWORD`) VALUES
(1, 'crayzz', 'thiago.lacerda.fazzolo@hotmail.com', '123'),
(2, 'samuk', 'samukinhagrai@hotmail.com', '123'),
(3, 'geraldo', 'romulo@paunocu.com', '123'),
(4, 'beafazzolo', 'bea@bea', '123'),
(5, 'samuel', 'teste@hotmail.com', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
