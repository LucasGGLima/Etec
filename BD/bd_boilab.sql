-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/10/2024 às 03:18
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
-- Banco de dados: `bd_boilab`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_ciclo_animal`
--

CREATE TABLE `tb_ciclo_animal` (
  `id_ciclo` int(11) NOT NULL,
  `id_animal` int(4) NOT NULL,
  `num_gestacoes` int(3) NOT NULL,
  `status_animal` varchar(20) NOT NULL,
  `ultimo_parto` date NOT NULL,
  `parto_previsto` date NOT NULL,
  `fim_da_lactacao` date NOT NULL,
  `fim_da_transicao` date NOT NULL,
  `data_cio` date NOT NULL,
  `dia_da_fecundacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_ciclo_animal`
--

INSERT INTO `tb_ciclo_animal` (`id_ciclo`, `id_animal`, `num_gestacoes`, `status_animal`, `ultimo_parto`, `parto_previsto`, `fim_da_lactacao`, `fim_da_transicao`, `data_cio`, `dia_da_fecundacao`) VALUES
(3, 15, 0, '2', '2024-10-18', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `data_nasc` date NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nome`, `sobrenome`, `data_nasc`, `telefone`, `senha`, `email`) VALUES
(1, 'adrian', 'pereia', '2024-10-02', '40028922', 'senhas', 'adrian@email.com'),
(2, 'adrian', 'pereira', '2000-10-10', '(12) 13232-', '$2y$10$yLtxyXI4TnYaMBCBr.zCqOZwbgdLkRgmNQ.wkv1rVxZDS8i2/LPmW', 'adrian@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_vaca`
--

CREATE TABLE `tb_vaca` (
  `id_vaca` int(5) NOT NULL,
  `id_usuario` int(4) NOT NULL,
  `nome_animal` varchar(50) NOT NULL,
  `data_nasc` date NOT NULL,
  `idade` int(2) NOT NULL,
  `peso` varchar(5) NOT NULL,
  `cod_animal` varchar(50) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `data_cad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_vaca`
--

INSERT INTO `tb_vaca` (`id_vaca`, `id_usuario`, `nome_animal`, `data_nasc`, `idade`, `peso`, `cod_animal`, `especie`, `data_cad`) VALUES
(15, 2, 'lucas', '2024-10-17', 2, '21', '213', 'ayrshire', '2024-10-11');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_ciclo_animal`
--
ALTER TABLE `tb_ciclo_animal`
  ADD PRIMARY KEY (`id_ciclo`);

--
-- Índices de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices de tabela `tb_vaca`
--
ALTER TABLE `tb_vaca`
  ADD PRIMARY KEY (`id_vaca`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_ciclo_animal`
--
ALTER TABLE `tb_ciclo_animal`
  MODIFY `id_ciclo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_vaca`
--
ALTER TABLE `tb_vaca`
  MODIFY `id_vaca` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
