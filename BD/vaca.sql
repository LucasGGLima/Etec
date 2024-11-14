-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31-Ago-2024 às 03:15
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaca`
--

CREATE TABLE `vaca` (
  `id_vaca` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nome_animal` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especie` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idade_animal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nasc` date NOT NULL,
  `peso` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_animal` int(20) NOT NULL,
  `num_lactacao` int(3) NOT NULL,
  `ultima_lactacao` date NOT NULL,
  `status_animal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `vaca`
--

INSERT INTO `vaca` (`id_vaca`, `id_usuario`, `nome_animal`, `especie`, `idade_animal`, `data_nasc`, `peso`, `cod_animal`, `num_lactacao`, `ultima_lactacao`, `status_animal`) VALUES
(1, 1, 'aniaml', 'ayrshire', '12121-12-12', '0000-00-00', '21', 490, 454, '2024-08-06', '2'),
(2, 1, 'aniaml', 'ayrshire', '12121-12-12', '0000-00-00', '21', 490, 454, '2024-08-06', '2'),
(3, 1, 'aniaml', 'ayrshire', '12121-12-12', '0000-00-00', '21', 490, 454, '2024-08-06', '2'),
(4, 1, 'aniaml', 'ayrshire', '12121-12-12', '0000-00-00', '21', 490, 454, '2024-08-06', '2'),
(5, 1, 'supervaca', 'jersey', '2002-12-19', '0000-00-00', '80', 123, 2131, '2121-09-12', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vaca`
--
ALTER TABLE `vaca`
  ADD PRIMARY KEY (`id_vaca`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vaca`
--
ALTER TABLE `vaca`
  MODIFY `id_vaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `vaca`
--
ALTER TABLE `vaca`
  ADD CONSTRAINT `vaca_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
