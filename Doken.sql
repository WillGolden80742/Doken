-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 19/03/2022 às 23:49
-- Versão do servidor: 10.4.22-MariaDB
-- Versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ChatPHP`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `nomeCliente` varchar(20) NOT NULL,
  `nickName` varchar(20) NOT NULL,
  `senha` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`nomeCliente`, `nickName`, `senha`) VALUES
('Alyssom', 'ally77', 'f6541153606baa043898e9286252be3da213b53bf88371f07172449974967ae1cfa02eb32939df66a9cdb465fe2b15cbf5c5cb8324b4b0d6ca2596d641e395e7'),
('Rafael', 'rafa77', '82f86d39196c5d8c2dcda74c3a7e4cf94c12d0fb2c7f66947e9f538116d1c1d6e7520eb1cd066e2d2088f3c602be8dacbdc838ec7521fc4b10385118f833ad1c'),
(' Уилл Голден', 'willGolden', 'e873256f027a2d3b26874ee64740bfe310ca60072c2b17e0ce69e546eabffbfe10d6bff8cf749a53c9390e6299ca621f5c4938f8fe2974f6c0e99877338639db');

-- --------------------------------------------------------

--
-- Estrutura para tabela `documents`
--

CREATE TABLE `documents` (
  `clienteId` varchar(20) NOT NULL,
  `picture` longblob NOT NULL,
  `hashDoc` varchar(128) DEFAULT NULL,
  `typeDoc` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `profilepicture`
--

CREATE TABLE `profilepicture` (
  `clienteId` varchar(20) NOT NULL,
  `picture` longblob NOT NULL,
  `format` varchar(20) NOT NULL,
  `updated` varchar(20) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `token`
--

CREATE TABLE `token` (
  `clienteID` varchar(20) NOT NULL,
  `tokenHash` varchar(128) NOT NULL,
  `date` varchar(64) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `typeDoc`
--

CREATE TABLE `typeDoc` (
  `docId` int(20) NOT NULL,
  `type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `typeDoc`
--

INSERT INTO `typeDoc` (`docId`, `type`) VALUES
(1, 'CPF'),
(2, 'RG'),
(3, 'Cert. Nascimento');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`nickName`),
  ADD KEY `nickName` (`nickName`);

--
-- Índices de tabela `documents`
--
ALTER TABLE `documents`
  ADD KEY `clienteId_FK` (`clienteId`),
  ADD KEY `typeDoc_FK` (`typeDoc`);

--
-- Índices de tabela `profilepicture`
--
ALTER TABLE `profilepicture`
  ADD KEY `clienteId` (`clienteId`),
  ADD KEY `clienteId_2` (`clienteId`);

--
-- Índices de tabela `token`
--
ALTER TABLE `token`
  ADD KEY `nickName_Fk` (`clienteID`);

--
-- Índices de tabela `typeDoc`
--
ALTER TABLE `typeDoc`
  ADD PRIMARY KEY (`docId`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `typeDoc`
--
ALTER TABLE `typeDoc`
  MODIFY `docId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `clienteId_FK` FOREIGN KEY (`clienteId`) REFERENCES `clientes` (`nickName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `typeDoc_FK` FOREIGN KEY (`typeDoc`) REFERENCES `typeDoc` (`docId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `profilepicture`
--
ALTER TABLE `profilepicture`
  ADD CONSTRAINT `clienteId` FOREIGN KEY (`clienteId`) REFERENCES `clientes` (`nickName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `nickName_Fk` FOREIGN KEY (`clienteID`) REFERENCES `clientes` (`nickName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
