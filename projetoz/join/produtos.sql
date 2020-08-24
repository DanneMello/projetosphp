-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Ago-2020 às 22:33
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `produtos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria_produto`
--

CREATE TABLE `tb_categoria_produto` (
  `id_categoria_planejamento` int(11) NOT NULL,
  `nome_categoria` varchar(150) NOT NULL,
  `PK_tb_categoria_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_categoria_produto`
--

INSERT INTO `tb_categoria_produto` (`id_categoria_planejamento`, `nome_categoria`, `PK_tb_categoria_produto`) VALUES
(1, 'automovel', 0),
(2, 'imovel', 2001),
(30, 'Esportes', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id_produto` int(11) NOT NULL,
  `id_categoria_produto` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `nome_produto` varchar(150) NOT NULL,
  `valor_produto` float(10,2) NOT NULL,
  `PK_tb_produto` int(11) NOT NULL,
  `IXFK_tb_produto_tb_categoria_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `id_categoria_produto`, `data_cadastro`, `nome_produto`, `valor_produto`, `PK_tb_produto`, `IXFK_tb_produto_tb_categoria_produto`) VALUES
(0, 1, '2020-08-15 00:00:00', 'uno', 25000.00, 0, 0),
(21, 2, '2011-08-16 00:00:00', 'Tênis Att', 500.00, 0, 0),
(555, 20, '1996-02-23 00:00:00', 'Pineapple', 58.90, 0, 0),
(2000, 0, '2020-08-15 00:00:00', 'corsa', 30000.33, 2000, 1),
(3232, 20, '1990-08-15 00:00:00', 'Pastel', 1.09, 0, 0),
(5858, 20, '2020-08-15 00:00:00', 'Café', 25.84, 0, 0),
(8987, 20, '2021-02-25 00:00:00', 'Erva Mate', 9.90, 0, 0),
(86868, 30, '2003-08-25 00:00:00', 'Barco', 35000.00, 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_categoria_produto`
--
ALTER TABLE `tb_categoria_produto`
  ADD PRIMARY KEY (`id_categoria_planejamento`);

--
-- Índices para tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `IXFK_tb_produto_tb_categoria_produto` (`PK_tb_produto`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD CONSTRAINT `IXFK_tb_produto_tb_categoria_produto` FOREIGN KEY (`PK_tb_produto`) REFERENCES `tb_produto` (`id_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
