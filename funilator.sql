-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Maio-2018 às 18:24
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `funilator`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fun_calculo`
--

CREATE TABLE `fun_calculo` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `nr_pct_visi_leads` double NOT NULL,
  `nr_pct_leads_opor` double NOT NULL,
  `nr_pct_opor_clie` double NOT NULL,
  `nr_tx_conversao` double NOT NULL,
  `nr_clientes` int(11) NOT NULL,
  `nr_opor` int(11) NOT NULL,
  `nr_leads` int(11) NOT NULL,
  `nr_visi` varchar(45) NOT NULL,
  `nr_tm` varchar(45) NOT NULL,
  `nr_cac` double NOT NULL,
  `nr_cpl` double NOT NULL,
  `nr_receita` double NOT NULL,
  `nr_despesa_campanha` double NOT NULL,
  `nr_lucro` double NOT NULL,
  `nr_prejuizo` double NOT NULL,
  `dt_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fun_usuario`
--

CREATE TABLE `fun_usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nm_usuario` varchar(100) NOT NULL,
  `ds_senha` varchar(100) NOT NULL,
  `ds_email` varchar(100) NOT NULL,
  `nm_empresa` varchar(100) DEFAULT NULL,
  `ds_cargo` varchar(100) DEFAULT NULL,
  `ds_area_atuacao` varchar(100) DEFAULT NULL,
  `is_verificado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fun_usuario`
--

INSERT INTO `fun_usuario` (`id`, `nm_usuario`, `ds_senha`, `ds_email`, `nm_empresa`, `ds_cargo`, `ds_area_atuacao`, `is_verificado`) VALUES
(1, 'admin', 'admin', 'admin@admin', NULL, NULL, NULL, 0),
(2, '\0', '\0', '\0', NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fun_calculo`
--
ALTER TABLE `fun_calculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_FUN_CALCULO_FUN_USUARIO_idx` (`id_usuario`);

--
-- Indexes for table `fun_usuario`
--
ALTER TABLE `fun_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fun_calculo`
--
ALTER TABLE `fun_calculo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fun_usuario`
--
ALTER TABLE `fun_usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `fun_calculo`
--
ALTER TABLE `fun_calculo`
  ADD CONSTRAINT `fk_FUN_CALCULO_FUN_USUARIO` FOREIGN KEY (`id_usuario`) REFERENCES `fun_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
