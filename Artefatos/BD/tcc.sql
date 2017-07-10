-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jul-2017 às 03:31
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `matricula` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `senha`, `email`) VALUES
('141150222', 'Allan Pedroso', '123', 'allandinbr@hotmail.com'),
('141150442', 'Victor Costa', '12345', 'victorsc_rs@gmail.com'),
('151151483', 'Rodrigo Machado', '54321', 'rodrigo.blizzard92@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `idAvaliacao` int(11) NOT NULL,
  `nota` float DEFAULT NULL,
  `caminhoFeedback` varchar(100) DEFAULT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `professor_siape` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `monografia`
--

CREATE TABLE `monografia` (
  `idMonografia` int(11) NOT NULL,
  `versao` varchar(45) DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  `caminhoEntrega` varchar(100) DEFAULT NULL,
  `abstract` longtext,
  `aluno_matricula` varchar(50) NOT NULL,
  `professor_orientador` varchar(20) NOT NULL,
  `Professor_Coorientador` varchar(20) NOT NULL,
  `isFinal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `monografia`
--

INSERT INTO `monografia` (`idMonografia`, `versao`, `titulo`, `caminhoEntrega`, `abstract`, `aluno_matricula`, `professor_orientador`, `Professor_Coorientador`, `isFinal`) VALUES
(1, '1', 'Estudo das lontras da Noruega e seus comportamentos', 'ccbdafd99af01cea28068358eaf36389.pdf', 'sdsdddsssssssssssssssssssssss', '141150442', '123', '123', 0),
(2, '2', 'Desenvolvimento de Gerador de Geradores usando um Gerador de Gerador de Geradores.', 'md5 vai aqui', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '151151483', '123456789', '987654321', 0),
(5, NULL, 'TCC XOIA MANO MUTO LOCO DEMAIS BEM LOCO NE', NULL, NULL, '141150222', '123', '123456789', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `siape` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`siape`, `nome`, `senha`, `email`) VALUES
('123', 'Bernardino', '12345', 'bernardino@gmail.com'),
('123456789', 'João Pablo', '123', 'lalal@lalal.com'),
('987654321', 'Elder', '123', 'leoric@unipampa.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prof_avalia_monografia`
--

CREATE TABLE `prof_avalia_monografia` (
  `monografia_idMonografia` int(11) NOT NULL,
  `professor_siape` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `prof_avalia_monografia`
--

INSERT INTO `prof_avalia_monografia` (`monografia_idMonografia`, `professor_siape`) VALUES
(5, '123456789'),
(5, '987654321');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `nomeTurma` varchar(15) NOT NULL,
  `Professor_siape` varchar(20) NOT NULL
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

CREATE TABLE `turma_has_aluno` (
  `Turma_nomeTurma` varchar(15) NOT NULL,
  `Aluno_matricula` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma_has_aluno`
--

INSERT INTO `turma_has_aluno` (`Turma_nomeTurma`, `Aluno_matricula`) VALUES
('CC/TCC 1', '141150222'),
('ES/TCC 1', '141150442'),
('ES/TCC 1', '151151483');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `professor_siape` (`professor_siape`);

--
-- Indexes for table `monografia`
--
ALTER TABLE `monografia`
  ADD PRIMARY KEY (`idMonografia`,`aluno_matricula`,`professor_orientador`,`Professor_Coorientador`),
  ADD KEY `fk_Monografia_Aluno1_idx` (`aluno_matricula`),
  ADD KEY `fk_Monografia_Professor1_idx` (`professor_orientador`),
  ADD KEY `fk_Monografia_Professor2_idx` (`Professor_Coorientador`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`siape`);

--
-- Indexes for table `prof_avalia_monografia`
--
ALTER TABLE `prof_avalia_monografia`
  ADD PRIMARY KEY (`monografia_idMonografia`,`professor_siape`),
  ADD KEY `professor_siape` (`professor_siape`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`nomeTurma`),
  ADD KEY `fk_Turma_Professor1_idx` (`Professor_siape`);

--
-- Indexes for table `turma_has_aluno`
--
ALTER TABLE `turma_has_aluno`
  ADD PRIMARY KEY (`Turma_nomeTurma`,`Aluno_matricula`),
  ADD KEY `fk_Turma_has_Aluno_Aluno1_idx` (`Aluno_matricula`),
  ADD KEY `fk_Turma_has_Aluno_Turma1_idx` (`Turma_nomeTurma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `monografia`
--
ALTER TABLE `monografia`
  MODIFY `idMonografia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`professor_siape`) REFERENCES `prof_avalia_monografia` (`Professor_siape`),
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
