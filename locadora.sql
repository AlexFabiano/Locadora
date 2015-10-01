SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema locadora
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema locadora
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `locadora` DEFAULT CHARACTER SET latin1 ;
USE `locadora` ;

-- -----------------------------------------------------
-- Table `locadora`.`tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`tipo_usuario` (
  `tipo` VARCHAR(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`tipo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `locadora`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`usuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL DEFAULT NULL,
  `username` VARCHAR(100) NULL DEFAULT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `cpf` VARCHAR(100) NULL DEFAULT NULL,
  `idade` INT(11) NULL DEFAULT NULL,
  `login` VARCHAR(100) NULL DEFAULT NULL,
  `senha` VARCHAR(100) NULL DEFAULT NULL,
  `tipo_usuario` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `tipo_usuario` (`tipo_usuario` ASC),
  CONSTRAINT `usuarios_ibfk_1`
    FOREIGN KEY (`tipo_usuario`)
    REFERENCES `locadora`.`tipo_usuario` (`tipo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `locadora`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`endereco` (
  `rua` INT(11) NOT NULL DEFAULT '0',
  `bairro` INT(11) NULL DEFAULT NULL,
  `cidade` INT(11) NULL DEFAULT NULL,
  `cep` VARCHAR(100) NULL DEFAULT NULL,
  `usuario_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`rua`),
  INDEX `fk_endereco_usuarios_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_endereco_usuarios`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `locadora`.`usuarios` (`id_usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `locadora`.`filmes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`filmes` (
  `idfilme` INT(11) NOT NULL AUTO_INCREMENT,
  `quantidade` VARCHAR(100) NULL DEFAULT NULL,
  `nome` INT(11) NULL DEFAULT NULL,
  `genero` INT(11) NULL DEFAULT NULL,
  `duracao` VARCHAR(100) NULL DEFAULT NULL,
  `ano` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`idfilme`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `locadora`.`reservas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`reservas` (
  `idlocar` INT(11) NOT NULL AUTO_INCREMENT,
  `idfilme` INT(11) NULL DEFAULT NULL,
  `usuarioid` INT(11) NULL DEFAULT NULL,
  `data_reservas` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`idlocar`),
  INDEX `fk_reservas_filmes` (`idfilme` ASC),
  INDEX `fk_reservas_usuarios` (`usuarioid` ASC),
  CONSTRAINT `fk_reservas_filmes`
    FOREIGN KEY (`idfilme`)
    REFERENCES `locadora`.`filmes` (`idfilme`),
  CONSTRAINT `fk_reservas_usuarios`
    FOREIGN KEY (`usuarioid`)
    REFERENCES `locadora`.`usuarios` (`id_usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `locadora`.`iten_reservas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`iten_reservas` (
  `id_iten` INT(11) NOT NULL AUTO_INCREMENT,
  `id_filme` INT(11) NULL DEFAULT NULL,
  `quant` INT(11) NULL DEFAULT NULL,
  `locar_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_iten`),
  INDEX `fk_iten_reserva_filmes` (`id_filme` ASC),
  INDEX `fk_iten_reserva_reservas` (`locar_id` ASC),
  CONSTRAINT `fk_iten_reserva_filmes`
    FOREIGN KEY (`id_filme`)
    REFERENCES `locadora`.`filmes` (`idfilme`),
  CONSTRAINT `fk_iten_reserva_reservas`
    FOREIGN KEY (`locar_id`)
    REFERENCES `locadora`.`reservas` (`idlocar`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
