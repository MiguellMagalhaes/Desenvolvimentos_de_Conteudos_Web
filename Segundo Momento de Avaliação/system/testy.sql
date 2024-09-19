-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/01/2024 às 21:58
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testy`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventis`
--

CREATE TABLE `eventis` (
  `id` int(11) NOT NULL,
  `EventName` varchar(120) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `event_type` varchar(120) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `eventis`
--

INSERT INTO `eventis` (`id`, `EventName`, `datetime`, `event_type`, `status`) VALUES
(1, 'Dizzy', '2024-01-09 23:11:13', 'Artes', '1'),
(25, 'Levanta-te e Ri', '2024-05-04 21:00:00', 'Comédia', '1'),
(26, 'Pi100Pe', '2024-01-10 21:30:00', 'Comédia', '1'),
(27, 'João Sousa Tenis', '2024-06-11 16:30:00', 'Desporto', '1'),
(28, 'Willy Wonka', '2024-01-11 22:00:00', 'Filmes', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `userevents`
--

CREATE TABLE `userevents` (
  `user_events_id` int(100) NOT NULL,
  `events_user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `userevents`
--

INSERT INTO `userevents` (`user_events_id`, `events_user_id`) VALUES
(33, 1),
(33, 1),
(14, 1),
(33, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL,
  `Registration_Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `age`, `email`, `status`, `isactive`, `Registration_Date`) VALUES
(14, 'Miguel Magalhães', '$2y$10$ZyHwrjauNuX6lxK5jmDRLuTsw.NkyyFJg7c4190eBZVHiypl9Wxn.', 20, 'miguel@gmail.com', 1, 1, '2023-11-29'),
(33, 'Cristiano Ronaldo', '$2y$10$vU.34aKO/pXwQY4S2OhZK.8VjWU.fZOqSlUEaAGuzmkhc4DB6kvhW', 38, 'siu@gmail.com', 0, 1, '2023-12-04'),
(48, 'Fábio Sequeira', '$2y$10$kAV8DFHvNAdtoHb6IxYucu2O2mKgcBLIHKMW9md2OnADkqW6JuJAq', 19, 'fabio@gmail.com', 1, 1, '2023-12-11'),
(49, 'Rui Reis', '$2y$10$FOlibRyYTjt43KYKrIDDfuMEL5JxSlJYn2RbIdsA0ILTg499eIR.y', 25, 'rui@gmail.com', 1, 1, '2023-12-11'),
(51, '11', '$2y$10$jEWENcqTEXai15snw5cukO8Ou9hkFOMHo9mwOQ9HQRWaZBMWULOG2', 11, 'STRANGERTHINGS@NETFLIX.COM', 0, 1, '2023-12-11'),
(62, 'El Chapo', '$2y$10$CFemlz2yzpOar5EetoGmMe5eEEXyRrk.deHOoVRmc1GvX.b8D0GiK', 57, 'elchapo@gmail.com', 0, 1, '2024-01-03'),
(63, '1234', '$2y$10$ETCPYIE.zhujJZUP.NLQgeonu9tFWHzGlETL3WFo1L1Az.spLYHmS', 74, '1234@gmail.com', 0, 1, '2024-01-03'),
(64, 'Manuel', '$2y$10$9iFKAZI0gZNKzulRmvKHCeSdCBHNA0SqhhlTmM3gB3F17E866Dqpe', 76, 'manuel@gmail.com', 0, 1, '2024-01-10');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `eventis`
--
ALTER TABLE `eventis`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `userevents`
--
ALTER TABLE `userevents`
  ADD KEY `user_events_id` (`user_events_id`),
  ADD KEY `userevents_ibfk_2` (`events_user_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique_constraint` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `eventis`
--
ALTER TABLE `eventis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `userevents`
--
ALTER TABLE `userevents`
  ADD CONSTRAINT `userevents_ibfk_1` FOREIGN KEY (`user_events_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `userevents_ibfk_2` FOREIGN KEY (`events_user_id`) REFERENCES `eventis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
