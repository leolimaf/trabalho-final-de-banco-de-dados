-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema trabalho_final
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema trabalho_final
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `trabalho_final` DEFAULT CHARACTER SET utf8 ;
USE `trabalho_final` ;

-- -----------------------------------------------------
-- Table `trabalho_final`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho_final`.`Cliente` (
  `cod_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(120) NOT NULL,
  `endereco` VARCHAR(120) NOT NULL,
  `estado_civil` VARCHAR(45) NOT NULL,
  `idade` INT NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `doenca_pre_existente` TINYINT(1) NOT NULL,
  `exames_realizados` TEXT NULL,
  PRIMARY KEY (`cod_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho_final`.`Plano_de_Saude`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho_final`.`Plano_de_Saude` (
  `cod_plano_de_saude` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `registro_anvisa` VARCHAR(45) NOT NULL,
  `valor_consulta` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`cod_plano_de_saude`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho_final`.`Possui`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho_final`.`Possui` (
  `fk_Cliente_cod_cliente` INT NOT NULL,
  `fk_Plano_de_Saude_cod_plano_de_saude` INT NOT NULL,
  INDEX `fk_Possui_Cliente_idx` (`fk_Cliente_cod_cliente` ASC) VISIBLE,
  INDEX `fk_Possui_Plano_de_Saude1_idx` (`fk_Plano_de_Saude_cod_plano_de_saude` ASC) VISIBLE,
  CONSTRAINT `fk_Possui_Cliente`
    FOREIGN KEY (`fk_Cliente_cod_cliente`)
    REFERENCES `trabalho_final`.`Cliente` (`cod_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Possui_Plano_de_Saude1`
    FOREIGN KEY (`fk_Plano_de_Saude_cod_plano_de_saude`)
    REFERENCES `trabalho_final`.`Plano_de_Saude` (`cod_plano_de_saude`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho_final`.`Funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho_final`.`Funcionario` (
  `cod_funcionario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(120) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `endereco` VARCHAR(120) NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `funcao` VARCHAR(45) NOT NULL,
  `data_admissao` DATE NOT NULL,
  `salario_bruto` DECIMAL(10,2) NOT NULL,
  `estado_civil` VARCHAR(45) NOT NULL,
  `dependentes` INT NOT NULL,
  PRIMARY KEY (`cod_funcionario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho_final`.`Informacoes_de_Pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho_final`.`Informacoes_de_Pagamento` (
  `cod_pagamento` INT NOT NULL AUTO_INCREMENT,
  `valor_recebido` DECIMAL(10,2) NOT NULL,
  `comissao_clinica` DECIMAL(10,2) NULL,
  `data_recebimento` DATE NOT NULL,
  `data_repasse` DATE NOT NULL,
  `imposto_retido` DECIMAL(10,2) NOT NULL DEFAULT 0.05,
  `fk_Funcionario_cod_funcionario` INT NOT NULL,
  `fk_Plano_de_Saude_cod_plano_de_saude` INT NOT NULL,
  PRIMARY KEY (`cod_pagamento`),
  INDEX `fk_Pagamento_Funcionario1_idx` (`fk_Funcionario_cod_funcionario` ASC) VISIBLE,
  INDEX `fk_Informacoes_de_Pagamento_Plano_de_Saude1_idx` (`fk_Plano_de_Saude_cod_plano_de_saude` ASC) VISIBLE,
  CONSTRAINT `fk_Pagamento_Funcionario1`
    FOREIGN KEY (`fk_Funcionario_cod_funcionario`)
    REFERENCES `trabalho_final`.`Funcionario` (`cod_funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Informacoes_de_Pagamento_Plano_de_Saude1`
    FOREIGN KEY (`fk_Plano_de_Saude_cod_plano_de_saude`)
    REFERENCES `trabalho_final`.`Plano_de_Saude` (`cod_plano_de_saude`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho_final`.`Medico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho_final`.`Medico` (
  `crm` VARCHAR(45) NOT NULL,
  `especialidade` VARCHAR(45) NOT NULL,
  `escola_origem` VARCHAR(45) NOT NULL,
  `tipo_residencia_medica` VARCHAR(45) NOT NULL,
  `regime_trabalho` VARCHAR(45) NOT NULL,
  `fk_Funcionario_cod_funcionario` INT NOT NULL,
  INDEX `fk_Medico_Funcionario1_idx` (`fk_Funcionario_cod_funcionario` ASC) VISIBLE,
  PRIMARY KEY (`fk_Funcionario_cod_funcionario`),
  CONSTRAINT `fk_Medico_Funcionario1`
    FOREIGN KEY (`fk_Funcionario_cod_funcionario`)
    REFERENCES `trabalho_final`.`Funcionario` (`cod_funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho_final`.`Consulta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho_final`.`Consulta` (
  `fk_Medico_fk_Funcionario_cod_funcionario` INT NOT NULL,
  `Cliente_cod_cliente` INT NOT NULL,
  INDEX `fk_Consulta_Medico1_idx` (`fk_Medico_fk_Funcionario_cod_funcionario` ASC) VISIBLE,
  INDEX `fk_Consulta_Cliente1_idx` (`Cliente_cod_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_Consulta_Medico1`
    FOREIGN KEY (`fk_Medico_fk_Funcionario_cod_funcionario`)
    REFERENCES `trabalho_final`.`Medico` (`fk_Funcionario_cod_funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Consulta_Cliente1`
    FOREIGN KEY (`Cliente_cod_cliente`)
    REFERENCES `trabalho_final`.`Cliente` (`cod_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho_final`.`Atende`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho_final`.`Atende` (
  `fk_Plano_de_Saude_cod_plano_de_saude` INT NOT NULL,
  `fk_Medico_fk_Funcionario_cod_funcionario` INT NOT NULL,
  INDEX `fk_Atende_Plano_de_Saude1_idx` (`fk_Plano_de_Saude_cod_plano_de_saude` ASC) VISIBLE,
  INDEX `fk_Atende_Medico1_idx` (`fk_Medico_fk_Funcionario_cod_funcionario` ASC) VISIBLE,
  CONSTRAINT `fk_Atende_Plano_de_Saude1`
    FOREIGN KEY (`fk_Plano_de_Saude_cod_plano_de_saude`)
    REFERENCES `trabalho_final`.`Plano_de_Saude` (`cod_plano_de_saude`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Atende_Medico1`
    FOREIGN KEY (`fk_Medico_fk_Funcionario_cod_funcionario`)
    REFERENCES `trabalho_final`.`Medico` (`fk_Funcionario_cod_funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
