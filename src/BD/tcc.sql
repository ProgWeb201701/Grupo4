-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Jun-2017 às 16:45
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

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
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `senha`) VALUES
('141150442', 'Victor Costa', '12345'),
('151151483', 'Rodrigo Machado', '54321');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `idAvaliacao` int(11) NOT NULL,
  `nota` float DEFAULT NULL,
  `caminhoFeedback` varchar(100) DEFAULT NULL,
  `observacao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`idAvaliacao`, `nota`, `caminhoFeedback`, `observacao`) VALUES
(1, 10, 'md5 aqui', 'Bem loco'),
(2, 5, 'md5 aqui', 'Meio bosta'),
(3, 0, 'md5 aqui', 'TA UM LIXO'),
(4, 6, 'md5 aqui', 'DEU PRA PASSAR, NOS VEMOS NO TCC DOIS AMIGO ;)');

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
  `Professor_Coorientador` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `monografia`
--

INSERT INTO `monografia` (`idMonografia`, `versao`, `titulo`, `caminhoEntrega`, `abstract`, `aluno_matricula`, `professor_orientador`, `Professor_Coorientador`) VALUES
(1, '1', 'Estudo das lontras da Noruega e seus comportamentos', 'md5 vai aqui', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '141150442', '123', '123'),
(2, '2', 'Desenvolvimento de Gerador de Geradores usando um Gerador de Gerador de Geradores.', 'md5 vai aqui', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '151151483', '123456789', '987654321'),
(3, '1.2', 'Estudo de desenvolvimento de software para crianças.', 'md5 aqui', 'LOREM IPSUM DOR SIT AMET', '151151483', '987654321', '123456789');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `siape` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`siape`, `nome`, `senha`) VALUES
('123', 'Bernardino', '12345'),
('123456789', 'João Pablo', '123'),
('987654321', 'Elder', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prof_avalia_monografia`
--

CREATE TABLE `prof_avalia_monografia` (
  `Professor_siape` varchar(20) NOT NULL,
  `Monografia_idMonografia` int(11) NOT NULL,
  `Avaliacao_idAvaliacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `prof_avalia_monografia`
--

INSERT INTO `prof_avalia_monografia` (`Professor_siape`, `Monografia_idMonografia`, `Avaliacao_idAvaliacao`) VALUES
('123', 1, 1),
('123', 2, 2),
('123', 2, 4),
('123', 3, 3);

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
  ADD PRIMARY KEY (`idAvaliacao`);

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
  ADD PRIMARY KEY (`Professor_siape`,`Monografia_idMonografia`,`Avaliacao_idAvaliacao`),
  ADD KEY `fk_Professor_has_Monografia_Monografia1_idx` (`Monografia_idMonografia`),
  ADD KEY `fk_Professor_has_Monografia_Professor1_idx` (`Professor_siape`),
  ADD KEY `fk_Prof_Avalia_Monografia_Avaliacao1_idx` (`Avaliacao_idAvaliacao`);

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
  MODIFY `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `monografia`
--
ALTER TABLE `monografia`
  MODIFY `idMonografia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  ADD CONSTRAINT `fk_Prof_Avalia_Monografia_Avaliacao1` FOREIGN KEY (`Avaliacao_idAvaliacao`) REFERENCES `avaliacao` (`idAvaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Professor_has_Monografia_Monografia1` FOREIGN KEY (`Monografia_idMonografia`) REFERENCES `monografia` (`idMonografia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Professor_has_Monografia_Professor1` FOREIGN KEY (`Professor_siape`) REFERENCES `professor` (`siape`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
