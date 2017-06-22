-- MySQL Script generated by MySQL Workbench
-- Sat Jun 17 18:19:06 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tcc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tcc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tcc` DEFAULT CHARACTER SET utf8 ;
USE `tcc` ;

-- -----------------------------------------------------
-- Table `tcc`.`Professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tcc`.`Professor` (
  `siape` VARCHAR(20) NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`siape`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcc`.`Aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tcc`.`Aluno` (
  `matricula` VARCHAR(50) NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`matricula`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcc`.`Monografia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tcc`.`Monografia` (
  `idMonografia` INT NOT NULL AUTO_INCREMENT,
  `versao` VARCHAR(45) NULL,
  `titulo` VARCHAR(100) NOT NULL,
  `caminhoEntrega` VARCHAR(100) NULL,
  `abstract` LONGTEXT NULL,
  `aluno_matricula` VARCHAR(50) NOT NULL,
  `professor_orientador` VARCHAR(20) NOT NULL,
  `Professor_Coorientador` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idMonografia`, `aluno_matricula`, `professor_orientador`, `Professor_Coorientador`),
  INDEX `fk_Monografia_Aluno1_idx` (`aluno_matricula` ASC),
  INDEX `fk_Monografia_Professor1_idx` (`professor_orientador` ASC),
  INDEX `fk_Monografia_Professor2_idx` (`Professor_Coorientador` ASC),
  CONSTRAINT `fk_Monografia_Aluno1`
    FOREIGN KEY (`aluno_matricula`)
    REFERENCES `tcc`.`Aluno` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Monografia_Professor1`
    FOREIGN KEY (`professor_orientador`)
    REFERENCES `tcc`.`Professor` (`siape`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Monografia_Professor2`
    FOREIGN KEY (`Professor_Coorientador`)
    REFERENCES `tcc`.`Professor` (`siape`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcc`.`Avaliacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tcc`.`Avaliacao` (
  `idAvaliacao` INT NOT NULL AUTO_INCREMENT,
  `nota` FLOAT NULL,
  `caminhoFeedback` VARCHAR(100) NULL,
  `observacao` VARCHAR(100) NULL,
  PRIMARY KEY (`idAvaliacao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcc`.`Turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tcc`.`Turma` (
  `nomeTurma` VARCHAR(15) NOT NULL,
  `Professor_siape` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`nomeTurma`),
  INDEX `fk_Turma_Professor1_idx` (`Professor_siape` ASC),
  CONSTRAINT `fk_Turma_Professor1`
    FOREIGN KEY (`Professor_siape`)
    REFERENCES `tcc`.`Professor` (`siape`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcc`.`Prof_Avalia_Monografia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tcc`.`Prof_Avalia_Monografia` (
  `Professor_siape` VARCHAR(20) NOT NULL,
  `Monografia_idMonografia` INT NOT NULL,
  `Avaliacao_idAvaliacao` INT NOT NULL,
  PRIMARY KEY (`Professor_siape`, `Monografia_idMonografia`, `Avaliacao_idAvaliacao`),
  INDEX `fk_Professor_has_Monografia_Monografia1_idx` (`Monografia_idMonografia` ASC),
  INDEX `fk_Professor_has_Monografia_Professor1_idx` (`Professor_siape` ASC),
  INDEX `fk_Prof_Avalia_Monografia_Avaliacao1_idx` (`Avaliacao_idAvaliacao` ASC),
  CONSTRAINT `fk_Professor_has_Monografia_Professor1`
    FOREIGN KEY (`Professor_siape`)
    REFERENCES `tcc`.`Professor` (`siape`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Professor_has_Monografia_Monografia1`
    FOREIGN KEY (`Monografia_idMonografia`)
    REFERENCES `tcc`.`Monografia` (`idMonografia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prof_Avalia_Monografia_Avaliacao1`
    FOREIGN KEY (`Avaliacao_idAvaliacao`)
    REFERENCES `tcc`.`Avaliacao` (`idAvaliacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcc`.`Turma_has_Aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tcc`.`Turma_has_Aluno` (
  `Turma_nomeTurma` VARCHAR(15) NOT NULL,
  `Aluno_matricula` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`Turma_nomeTurma`, `Aluno_matricula`),
  INDEX `fk_Turma_has_Aluno_Aluno1_idx` (`Aluno_matricula` ASC),
  INDEX `fk_Turma_has_Aluno_Turma1_idx` (`Turma_nomeTurma` ASC),
  CONSTRAINT `fk_Turma_has_Aluno_Turma1`
    FOREIGN KEY (`Turma_nomeTurma`)
    REFERENCES `tcc`.`Turma` (`nomeTurma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Turma_has_Aluno_Aluno1`
    FOREIGN KEY (`Aluno_matricula`)
    REFERENCES `tcc`.`Aluno` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
