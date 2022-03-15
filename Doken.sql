-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 15/03/2022 às 04:25
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
('William Dourado', '324', '49acae3f64f68683b7d3b29129452202be9df718b102cea556f5da254bb0bf3860d83a8fb3e2868fc1de85bd6b0de0d69d5ad5d421f0fe6f5748d81a2bba44e0'),
('Alyssom', 'ally77', 'f6541153606baa043898e9286252be3da213b53bf88371f07172449974967ae1cfa02eb32939df66a9cdb465fe2b15cbf5c5cb8324b4b0d6ca2596d641e395e7'),
('Based Pepe', 'based_Pepe', 'bf829a012991fe8380ee52dde9349ade67c3e748eb2851d66842e8275d205cb973794f6626816c6428b184ee118dddaeb68b9cabcd195028c106820ced31de1c'),
('Гуммо', 'gvmmo', '649620a4b72e5c7a9536703ac9b56ba96f872cc698bdf1e21bda4492b1cbb1f71d1da987e9c2cd8c20aac34609cf5a0856776e0722781a73f259a9d4528d49ee'),
('HongKong77', 'hong_kong77', 'cf3e55a4fb06be6f89aab4d93f0ff97eb8d804134e7667519343d492436458a9441b96aa4e7e4ad9c361d3cb5cecd66565fa112a39a0a7e7bbf5303a50c06511'),
('Juliana Monique', 'juhMonique', 'b996c1d402f3d4a42f74219b2e2d0e65c264552dac45bbe94fdffb169d42b3ef85273f6646b01429362ac0b86dff9f9182e86711694575e821e079e7b01a40be'),
('Lobo da Estepe', 'LoboDaEstepe', '0703f0fbf102bd37bb4397e094ab109c79580516973e5e6715b1dd4155033732247204b307cc98dc516d3a4f63a204a78ce10b3a01635fb8dfa4014ebca2e4ba'),
('Logan', 'logan77', 'a2d7f3ddaa4f7737d5b09efd35aacb9fd46d65aa55abf97ba59afcb702d0e6e4b57a5c8c0fd5dcba795572039296e51d5421c7d8757e7440d830641c732a3d81'),
('Eloa', 'lola', '9306e5a07857d057df506cb4be4dab89f714ff038f47494f9c0ae1fa436b09cdaa8660568920c1f57aa0496987d752457e9885d62859f1ac27167d0500c3c4f0'),
('Marlon', 'marlon77', '7547cb5edd847874d6096a7834a6bc8cc361d5a1747255b0be2f9af381f2ecc23af7738aec80a6ac62f0e299c5cf862e6e7d2aa66347af5c803f725649159d6d'),
('Mayumi Sato', 'mayumi_Sato', '253ec8f659ab7560acd2ae12490af2299c12f4b771d6b2c55fea3f6e277e588121fd13654b1966f5f4c52f7a6fdc3e8ea7d817b1838c00485f71240d8a54fb74'),
('pco', 'pco_cooperative', '45546472d49c709ad4cf6a4258da21cf462dc764b48ec1895f6095eaa5d0b03e06a5b927ee5f7d6ece1f1e328bb8a1429227087db503ab0d758afc91ab3550c7'),
('Pepe BluePill', 'pepe_bluepill', 'ca3ac3b326622426f5954fd543a043e5cc6b4c8b2ad6455a2a6ffa7c40594cca6f094b6d8d0a7bf78d898703ab5169e08d52190ea9454ba7e72efd2f9f6a1671'),
('Rafael', 'rafa77', '82f86d39196c5d8c2dcda74c3a7e4cf94c12d0fb2c7f66947e9f538116d1c1d6e7520eb1cd066e2d2088f3c602be8dacbdc838ec7521fc4b10385118f833ad1c'),
('William Dourado', 'willCruz', 'e04deea2cac576f39302a073c511ae7ce3d4fd9d3fa8151e289c67eedfd34c70bd9ca01a0cddf0890496e15dcffb19f5ba184cbe11d52f5bca532f254659bdb1'),
('WilliamDourado', 'willGolde4353', 'e1503b075a74286ff91554a0480ef61a82c1ad8f9f76699ec62f9a2b1b996c6483b5fd3d9bacd6b2f45fc2bf3411bc597cb104e8af09aa2e68d3d705b66e6a20'),
(' Уилл Голден', 'willGolden', 'e873256f027a2d3b26874ee64740bfe310ca60072c2b17e0ce69e546eabffbfe10d6bff8cf749a53c9390e6299ca621f5c4938f8fe2974f6c0e99877338639db'),
('WilliamDourado', 'willGolden43546', '58d5f7a5e7b72e11bf3d96f19caabe3a1a338cf690e7e639fdd87cbd4b3e9d2d01e6c232c104f75ee28a5a43d6859b454908790778ecd84165fa4cb9ff61cc02'),
('William Dourado', 'willGolden65', '58ac7d9f2d41bc370f31c5b444a1b903e8249a14dcc17d525e14f6a45ce9f703581d3e64fda708b9f8b2bb8b80c073230dbc29fa05a501f36a52592c5dfbc58d'),
('WilliamDourado', 'willGolden7', 'd2d9834d23900330405cd0ce6c6cddaf4eeee85f7171465cc3b2597741a44866630854d1e49d2c0caddb18f246db83b26f828e9420f1bc82cf5970a78865a585'),
('WilliamDourado', 'willGolden_', 'a33f95951f026f046e55118b4a7d1d3728f433b08f45cd7f99b830f3fb89f3875a7568f1fd387471e6357f497fdb5c3a18eccb4647d444c30da091caf711cffd');

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


--
-- Estrutura para tabela `profilepicture`
--

CREATE TABLE `profilepicture` (
  `clienteId` varchar(20) NOT NULL,
  `picture` longblob NOT NULL,
  `format` varchar(20) NOT NULL,
  `updated` varchar(20) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estrutura para tabela `token`
--

CREATE TABLE `token` (
  `clienteID` varchar(20) NOT NULL,
  `tokenHash` varchar(128) NOT NULL,
  `date` varchar(64) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-------------------------------------------------

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
