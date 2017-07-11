-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 11-Jul-2017 às 14:38
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
  `foto` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `senha`, `email`, `foto`) VALUES
('101001010', 'Gustavo Girardon', '123', 'gutinhoso@gmail.com', NULL),
('1115151515', 'Josefino Andrade', '11111', 'jose@fino.com', NULL),
('141150222', 'Allan Pedroso', '123', 'allandinbr@hotmail.com', NULL),
('141150442', 'Victor Costa', '12345', 'victorsc_rs@gmail.com', NULL),
('151150450', 'Cabrito', 'xexe', 'confia@call.com', NULL),
('151151483', 'Rodrigo Machado', '54321', 'rodrigo.blizzard92@gmail.com', NULL),
('1818', 'Piupiu Macabro dos Santos', '123', 'piupiu@p.com', '../fotos/piupiu.jpg'),
('99999', 'Hyuuga Neji', '99999', 'neji@hyuuga.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_interesse`
--

CREATE TABLE IF NOT EXISTS `area_interesse` (
  `idInteresse` int(11) NOT NULL AUTO_INCREMENT,
  `nomeInteresse` varchar(50) NOT NULL,
  PRIMARY KEY (`idInteresse`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `area_interesse`
--

INSERT INTO `area_interesse` (`idInteresse`, `nomeInteresse`) VALUES
(1, 'Linguagens Formais e Autômatos'),
(2, 'Análise de Algoritmos'),
(3, 'Engenharia de Software'),
(4, 'Otimização Combinatória'),
(5, 'Teoria dos Grafos'),
(6, 'Geometria Computacional'),
(7, 'Segurança Computacional'),
(8, 'Criptografia Computacional'),
(9, 'Reconhecimento de Padrões'),
(10, 'Redes de Computadores'),
(11, 'Sistemas DistribuÍdos'),
(12, 'Arquitetura de Computadores'),
(13, 'Programação Paralela'),
(14, 'Computação em Nuvem'),
(15, 'Linguagens de Programação e Compiladores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `nota` float DEFAULT NULL,
  `caminhoFeedback` varchar(100) DEFAULT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `professor_siape` varchar(20) NOT NULL,
  PRIMARY KEY (`idAvaliacao`),
  KEY `professor_siape` (`professor_siape`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `monografia`
--

INSERT INTO `monografia` (`idMonografia`, `versao`, `titulo`, `caminhoEntrega`, `abstract`, `aluno_matricula`, `professor_orientador`, `Professor_Coorientador`, `isFinal`) VALUES
(1, '1', 'Estudo das lontras da Noruega e seus comportamentos', 'ccbdafd99af01cea28068358eaf36389.pdf', 'sdsdddsssssssssssssssssssssss', '141150442', '123', '123', 0),
(2, '2', 'Desenvolvimento de Gerador de Geradores usando um Gerador de Gerador de Geradores.', '533b6a7cb51b43c293d89b13bd5bfd63.pdf', 'aaa', '151151483', '123456789', '987654321', 1),
(5, NULL, 'TCC XOIA MANO MUTO LOCO DEMAIS BEM LOCO NE', NULL, NULL, '141150222', '123', '123456789', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `siape` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`siape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`siape`, `nome`, `senha`, `email`, `foto`) VALUES
('101010', 'Gilleanes Guedes', '12345', 'gigi@leanes.com.br', NULL),
('11111', 'Andrea Bordin', '12345', 'deia@gmail.com', NULL),
('123', 'Bernardino', '12345', 'bernardino@gmail.com', '../fotos/bernardino.jpg'),
('123456789', 'Joao Pablo', '123', 'lalal@lalal.com', NULL),
('987654321', 'Elder', '123', 'leoric@unipampa.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prof_avalia_monografia`
--

CREATE TABLE IF NOT EXISTS `prof_avalia_monografia` (
  `monografia_idMonografia` int(11) NOT NULL,
  `professor_siape` varchar(20) NOT NULL,
  PRIMARY KEY (`monografia_idMonografia`,`professor_siape`),
  KEY `professor_siape` (`professor_siape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `prof_avalia_monografia`
--

INSERT INTO `prof_avalia_monografia` (`monografia_idMonografia`, `professor_siape`) VALUES
(2, '101010'),
(1, '11111'),
(1, '123'),
(5, '123456789'),
(2, '987654321'),
(5, '987654321');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prof_has_interesse`
--

CREATE TABLE IF NOT EXISTS `prof_has_interesse` (
  `siape` varchar(20) DEFAULT NULL,
  `idInteresse` int(11) DEFAULT NULL,
  KEY `siape` (`siape`),
  KEY `idInteresse` (`idInteresse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `prof_has_interesse`
--

INSERT INTO `prof_has_interesse` (`siape`, `idInteresse`) VALUES
('987654321', 7),
('123', 1),
('123', 11),
('123', 13),
('123', 14);

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
('CC/TCC 1', '141150222'),
('ES/TCC 1', '141150442'),
('ES/TCC 1', '151151483');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`professor_siape`) REFERENCES `prof_avalia_monografia` (`professor_siape`),
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`professor_siape`) REFERENCES `prof_avalia_monografia` (`professor_siape`);

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
  ADD CONSTRAINT `prof_avalia_monografia_ibfk_1` FOREIGN KEY (`monografia_idMonografia`) REFERENCES `monografia` (`idMonografia`),
  ADD CONSTRAINT `prof_avalia_monografia_ibfk_2` FOREIGN KEY (`professor_siape`) REFERENCES `professor` (`siape`),
  ADD CONSTRAINT `prof_avalia_monografia_ibfk_3` FOREIGN KEY (`monografia_idMonografia`) REFERENCES `monografia` (`idMonografia`);

--
-- Limitadores para a tabela `prof_has_interesse`
--
ALTER TABLE `prof_has_interesse`
  ADD CONSTRAINT `prof_has_interesse_ibfk_1` FOREIGN KEY (`siape`) REFERENCES `professor` (`siape`),
  ADD CONSTRAINT `prof_has_interesse_ibfk_2` FOREIGN KEY (`idInteresse`) REFERENCES `area_interesse` (`idInteresse`);

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
