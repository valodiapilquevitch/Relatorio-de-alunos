-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Jul-2015 às 10:39
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `catalogo_alunos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `alunos` (
`alunos_id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `curriculum` longtext,
  `turma` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ciclo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `foto` longtext CHARACTER SET latin1,
  `estatus` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ciclo`
--

CREATE TABLE IF NOT EXISTS `ciclo` (
`ciclo_id` int(11) NOT NULL,
  `ciclo` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `ciclo`
--

INSERT INTO `ciclo` (`ciclo_id`, `ciclo`) VALUES
(1, 'Inovação, Propriedade Intelectual e Transferência de Tecnologia'),
(2, 'Pesquisa, Desenvolvimento e Produção em Saúde'),
(3, 'Parcerias, Negócios, Financiamento e Gestão de Projetos Inovadores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estatus`
--

CREATE TABLE IF NOT EXISTS `estatus` (
`estatus_id` int(11) NOT NULL,
  `estatus` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `estatus`
--

INSERT INTO `estatus` (`estatus_id`, `estatus`) VALUES
(1, 'Formado'),
(2, 'Cursando'),
(3, 'Desistencia'),
(4, 'Trancado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
`id_turma` int(11) NOT NULL,
  `turma` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `turma`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`usuarios_id` int(11) NOT NULL,
  `username` longtext,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuarios_id`, `username`, `password`) VALUES
(1, 'admin', 'Butantan-2014');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
 ADD PRIMARY KEY (`alunos_id`);

--
-- Indexes for table `ciclo`
--
ALTER TABLE `ciclo`
 ADD PRIMARY KEY (`ciclo_id`);

--
-- Indexes for table `estatus`
--
ALTER TABLE `estatus`
 ADD PRIMARY KEY (`estatus_id`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
 ADD PRIMARY KEY (`id_turma`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`usuarios_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
MODIFY `alunos_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciclo`
--
ALTER TABLE `ciclo`
MODIFY `ciclo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `estatus`
--
ALTER TABLE `estatus`
MODIFY `estatus_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `usuarios_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
