-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 12-Jun-2017 às 04:09
-- Versão do servidor: 5.5.28
-- versão do PHP: 5.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `tcc`
--
CREATE DATABASE IF NOT EXISTS `tcc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tcc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `matricula` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `siapeOrientador` varchar(20) NOT NULL,
  PRIMARY KEY (`matricula`),
  KEY `siapeOrientador` (`siapeOrientador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `areainteresse`
--

CREATE TABLE IF NOT EXISTS `areainteresse` (
  `codInteresse` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`codInteresse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `codAvaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `nota` varchar(5) DEFAULT NULL,
  `observacao` varchar(500) DEFAULT NULL,
  `siape` varchar(20) NOT NULL,
  PRIMARY KEY (`codAvaliacao`),
  KEY `siape` (`siape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliadoraluno`
--

CREATE TABLE IF NOT EXISTS `avaliadoraluno` (
  `siapeAvaliadorI` varchar(20) NOT NULL,
  `siapeAvaliadorII` varchar(20) NOT NULL,
  KEY `siapeAvaliadorI` (`siapeAvaliadorI`),
  KEY `siapeAvaliadorII` (`siapeAvaliadorII`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliamono`
--

CREATE TABLE IF NOT EXISTS `avaliamono` (
  `codAvaliacao` int(11) NOT NULL,
  `codMono` int(11) NOT NULL,
  KEY `codAvaliacao` (`codAvaliacao`),
  KEY `codMono` (`codMono`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE IF NOT EXISTS `coordenador` (
  `siapeCoordenador` varchar(20) NOT NULL,
  `nomeCoordenador` varchar(50) NOT NULL,
  PRIMARY KEY (`siapeCoordenador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `interesseprof`
--

CREATE TABLE IF NOT EXISTS `interesseprof` (
  `codInteresse` int(11) DEFAULT NULL,
  `siape` varchar(20) DEFAULT NULL,
  KEY `codInteresse` (`codInteresse`),
  KEY `siape` (`siape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `monografia`
--

CREATE TABLE IF NOT EXISTS `monografia` (
  `codMono` int(11) NOT NULL AUTO_INCREMENT,
  `versao` varchar(10) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `matricula` varchar(10) NOT NULL,
  PRIMARY KEY (`codMono`),
  KEY `matricula` (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `siape` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  PRIMARY KEY (`siape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`siapeOrientador`) REFERENCES `professor` (`siape`);

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`siape`) REFERENCES `professor` (`siape`);

--
-- Limitadores para a tabela `avaliadoraluno`
--
ALTER TABLE `avaliadoraluno`
  ADD CONSTRAINT `avaliadoraluno_ibfk_1` FOREIGN KEY (`siapeAvaliadorI`) REFERENCES `professor` (`siape`),
  ADD CONSTRAINT `avaliadoraluno_ibfk_2` FOREIGN KEY (`siapeAvaliadorII`) REFERENCES `professor` (`siape`);

--
-- Limitadores para a tabela `avaliamono`
--
ALTER TABLE `avaliamono`
  ADD CONSTRAINT `avaliamono_ibfk_1` FOREIGN KEY (`codAvaliacao`) REFERENCES `avaliacao` (`codAvaliacao`),
  ADD CONSTRAINT `avaliamono_ibfk_2` FOREIGN KEY (`codMono`) REFERENCES `monografia` (`codMono`);

--
-- Limitadores para a tabela `interesseprof`
--
ALTER TABLE `interesseprof`
  ADD CONSTRAINT `interesseprof_ibfk_1` FOREIGN KEY (`codInteresse`) REFERENCES `areainteresse` (`codInteresse`),
  ADD CONSTRAINT `interesseprof_ibfk_2` FOREIGN KEY (`siape`) REFERENCES `professor` (`siape`);

--
-- Limitadores para a tabela `monografia`
--
ALTER TABLE `monografia`
  ADD CONSTRAINT `monografia_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `aluno` (`matricula`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
