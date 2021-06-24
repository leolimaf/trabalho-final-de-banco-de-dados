<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Leonardo Lima">
    <meta name="description" content="Módulo de gerenciamento de clinica de consultas médicas proposto no trabalho final da disciplina de Banco de Dados do curso de Ciência da Computação da EMGE - Escola de Engenharia e Ciência da Computação">
    <title>Módulo de Gerenciamento de Clínica de Consultas Médicas</title>
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
          <a href="../index.php" class="navbar-brand">Trabalho Final - Banco de Dados</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-md-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="download">Modelo <span class="caret"></span></a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" rel="noopener" href="modelo-conceitual.php">Conceitual</a>
                  <a class="dropdown-item" href="modelo-logico.php">Lógico</a>
                  <a class="dropdown-item" href="modelo-fisico.php">Físico</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../dicionario-de-dados.php">Dicionário de Dados</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="download">Cadastrar / Consultar <span class="caret"></span></a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" rel="noopener" href="../cliente.php">Cliente</a>
                  <a class="dropdown-item" href="#">Plano de Saúde</a>
                  <a class="dropdown-item" href="#">Funcionário</a>
                  <a class="dropdown-item" href="#">Médico</a>
                  <a class="dropdown-item" href="#">Informações de Pagamento</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="container">
          <div class="row">
              <div class="col">
                <div class="card border-primary mt-5 mb-5">
                    <div class="card-header">Módulo de Gerenciamento</div>
                    <div class="card-body">
                      <h4 class="card-title mb-3">Clínica de Consultas Médicas - Modelo Físico</h4>
                      <pre>-- MySQL Workbench Forward Engineering

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
  `comissao_clinica` DECIMAL(10,2) NOT NULL DEFAULT 0.1,
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
  `fk_Cliente_cod_cliente` INT NOT NULL,
  INDEX `fk_Consulta_Medico1_idx` (`fk_Medico_fk_Funcionario_cod_funcionario` ASC) VISIBLE,
  INDEX `fk_Consulta_Cliente1_idx` (`fk_Cliente_cod_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_Consulta_Medico1`
    FOREIGN KEY (`fk_Medico_fk_Funcionario_cod_funcionario`)
    REFERENCES `trabalho_final`.`Medico` (`fk_Funcionario_cod_funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Consulta_Cliente1`
    FOREIGN KEY (`fk_Cliente_cod_cliente`)
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
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;</pre>
                    </div>
                  </div>
              </div>
          </div>
      </div>

      <footer class="footer mt-auto py-3 bg-primary">
        <div class="container text-center">
          <span class="text-light"><a href="https://github.com/leolimaf/trabalho-final-de-banco-de-dados" target="_blank" style="color: #ffffff; font-size: 33px;"><i class="fa fa-github" aria-hidden="true"></i></a></span>
        </div>
      </footer>

      <script src="../assets/js/jquery.min.js"></script>
      <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>