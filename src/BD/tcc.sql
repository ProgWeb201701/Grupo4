-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 08-Jul-2017 às 19:15
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
  `matricula` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `senha`, `email`) VALUES
('141150442', 'Victor Costa', '12345', 'victorsc_rs@gmail.com'),
('151151483', 'Rodrigo Machado', '54321', 'rodrigo.blizzard92@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `nota` float DEFAULT NULL,
  `caminhoFeedback` varchar(100) DEFAULT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idAvaliacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `monografia`
--

CREATE TABLE IF NOT EXISTS `monografia` (
  `idMonografia` int(11) NOT NULL AUTO_INCREMENT,
  `versao` varchar(45) DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  `caminhoEntrega` varchar(100) DEFAULT NULL,
  `abstract` longtext,
  `aluno_matricula` varchar(50) NOT NULL,
  `professor_orientador` varchar(20) NOT NULL,
  `Professor_Coorientador` varchar(20) NOT NULL,
  `isFinal` tinyint(1) NOT NULL,
  PRIMARY KEY (`idMonografia`,`aluno_matricula`,`professor_orientador`,`Professor_Coorientador`),
  KEY `fk_Monografia_Aluno1_idx` (`aluno_matricula`),
  KEY `fk_Monografia_Professor1_idx` (`professor_orientador`),
  KEY `fk_Monografia_Professor2_idx` (`Professor_Coorientador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `monografia`
--

INSERT INTO `monografia` (`idMonografia`, `versao`, `titulo`, `caminhoEntrega`, `abstract`, `aluno_matricula`, `professor_orientador`, `Professor_Coorientador`, `isFinal`) VALUES
(1, '1', 'Estudo das lontras da Noruega e seus comportamentos', 'md5 vai aqui', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '141150442', '123', '123', 0),
(2, '2', 'Desenvolvimento de Gerador de Geradores usando um Gerador de Gerador de Geradores.', 'md5 vai aqui', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '151151483', '123456789', '987654321', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `siape` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`siape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`siape`, `nome`, `senha`, `email`) VALUES
('123', 'Bernardino', '12345', 'bernardinho@gmail.com'),
('123456789', 'João Pablo', '123', 'lalal@lalal.com'),
('987654321', 'Elder', '123', 'leoric@unipampa.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prof_avalia_monografia`
--

CREATE TABLE IF NOT EXISTS `prof_avalia_monografia` (
  `Professor_siape` varchar(20) NOT NULL,
  `Monografia_idMonografia` int(11) NOT NULL,
  `Avaliacao_idAvaliacao` int(11) NOT NULL,
  PRIMARY KEY (`Professor_siape`,`Monografia_idMonografia`,`Avaliacao_idAvaliacao`),
  KEY `fk_Professor_has_Monografia_Monografia1_idx` (`Monografia_idMonografia`),
  KEY `fk_Professor_has_Monografia_Professor1_idx` (`Professor_siape`),
  KEY `fk_Prof_Avalia_Monografia_Avaliacao1_idx` (`Avaliacao_idAvaliacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `nomeTurma` varchar(15) NOT NULL,
  `Professor_siape` varchar(20) NOT NULL,
  PRIMARY KEY (`nomeTurma`),
  KEY `fk_Turma_Professor1_idx` (`Professor_siape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`nomeTurma`, `Professor_siape`) VALUES
('ES/TCC 1', '123'),
('CC/TCC 1', '123456789');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_has_aluno`
--

CREATE TABLE IF NOT EXISTS `turma_has_aluno` (
  `Turma_nomeTurma` varchar(15) NOT NULL,
  `Aluno_matricula` varchar(50) NOT NULL,
  PRIMARY KEY (`Turma_nomeTurma`,`Aluno_matricula`),
  KEY `fk_Turma_has_Aluno_Aluno1_idx` (`Aluno_matricula`),
  KEY `fk_Turma_has_Aluno_Turma1_idx` (`Turma_nomeTurma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma_has_aluno`
--

INSERT INTO `turma_has_aluno` (`Turma_nomeTurma`, `Aluno_matricula`) VALUES
('ES/TCC 1', '141150442');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `monografia`
--
ALTER TABLE `monografia`
  ADD CONSTRAINT `fk_Monografia_Aluno1` FOREIGN KEY (`aluno_matricula`) REFERENCES `aluno` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Monografia_Professor1` FOREIGN KEY (`professor_orientador`) REFERENCES `professor` (`siape`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Monografia_Professor2` FOREIGN KEY (`Professor_Coorientador`) REFERENCES `professor` (`siape`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `prof_avalia_monografia`
--
ALTER TABLE `prof_avalia_monografia`
  ADD CONSTRAINT `fk_Professor_has_Monografia_Monografia1` FOREIGN KEY (`Monografia_idMonografia`) REFERENCES `monografia` (`idMonografia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Professor_has_Monografia_Professor1` FOREIGN KEY (`Professor_siape`) REFERENCES `professor` (`siape`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prof_Avalia_Monografia_Avaliacao1` FOREIGN KEY (`Avaliacao_idAvaliacao`) REFERENCES `avaliacao` (`idAvaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_Turma_Professor1` FOREIGN KEY (`Professor_siape`) REFERENCES `professor` (`siape`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma_has_aluno`
--
ALTER TABLE `turma_has_aluno`
  ADD CONSTRAINT `fk_Turma_has_Aluno_Aluno1` FOREIGN KEY (`Aluno_matricula`) REFERENCES `aluno` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Turma_has_Aluno_Turma1` FOREIGN KEY (`Turma_nomeTurma`) REFERENCES `turma` (`nomeTurma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
