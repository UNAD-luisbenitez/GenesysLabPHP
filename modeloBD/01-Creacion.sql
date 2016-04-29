-- MySQL Script generated by MySQL Workbench
-- 04/28/16 20:52:30
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bd_genesyslab
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_genesyslab
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_genesyslab` DEFAULT CHARACTER SET utf8 ;
USE `bd_genesyslab` ;

-- -----------------------------------------------------
-- Table `bd_genesyslab`.`Cargos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_genesyslab`.`Cargos` (
  `IdCargo` TINYINT(1) UNSIGNED NOT NULL,
  `NameCargo` VARCHAR(100) NOT NULL,
  `DescripcionCargo` VARCHAR(200) NULL,
  PRIMARY KEY (`IdCargo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_genesyslab`.`Dependencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_genesyslab`.`Dependencias` (
  `IdDependencia` TINYINT(1) UNSIGNED NOT NULL,
  `NameDependencia` VARCHAR(120) NOT NULL,
  `DescripcionDependencia` VARCHAR(200) NULL,
  PRIMARY KEY (`IdDependencia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_genesyslab`.`Modulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_genesyslab`.`Modulos` (
  `IdModulo` TINYINT(1) UNSIGNED NOT NULL,
  `NameModulo` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`IdModulo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_genesyslab`.`Personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_genesyslab`.`Personas` (
  `IdPersonas` BIGINT(1) UNSIGNED NOT NULL,
  `NamePersonas` VARCHAR(100) NOT NULL,
  `ApellidoPersonas` VARCHAR(100) NULL,
  `GeneroPersonas` VARCHAR(10) NOT NULL,
  `ProfesionPersonas` VARCHAR(100) NULL,
  `FotoPersonas` LONGBLOB NULL,
  `Cargos_IdCargo` TINYINT(1) UNSIGNED NOT NULL,
  `Dependencias_IdDependencia` TINYINT(1) UNSIGNED NOT NULL,
  `Modulos_IdModulos` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`IdPersonas`, `Cargos_IdCargo`, `Dependencias_IdDependencia`, `Modulos_IdModulos`),
  INDEX `fk_Personas_Cargos_idx` (`Cargos_IdCargo` ASC),
  INDEX `fk_Personas_Dependencias1_idx` (`Dependencias_IdDependencia` ASC),
  INDEX `fk_Personas_Modulos1_idx` (`Modulos_IdModulos` ASC),
  CONSTRAINT `fk_Personas_Cargos`
    FOREIGN KEY (`Cargos_IdCargo`)
    REFERENCES `bd_genesyslab`.`Cargos` (`IdCargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Personas_Dependencias1`
    FOREIGN KEY (`Dependencias_IdDependencia`)
    REFERENCES `bd_genesyslab`.`Dependencias` (`IdDependencia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Personas_Modulos1`
    FOREIGN KEY (`Modulos_IdModulos`)
    REFERENCES `bd_genesyslab`.`Modulos` (`IdModulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_genesyslab`.`SystemAdmins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_genesyslab`.`SystemAdmins` (
  `IdAdmin` BIGINT(1) UNSIGNED NOT NULL,
  `NombreAdmin` VARCHAR(120) NOT NULL,
  `ApellidosAdmin` VARCHAR(120) NULL,
  `PassAdmin` BLOB NOT NULL,
  `FotoAdmin` LONGBLOB NULL,
  PRIMARY KEY (`IdAdmin`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_genesyslab`.`Historiales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_genesyslab`.`Historiales` (
  `SerialHistorial` BIGINT(1) UNSIGNED NOT NULL,
  `HoraIngreso` DATETIME(1) NOT NULL,
  `HoraSalida` DATETIME(1) NULL,
  `Personas_IdPersonas` BIGINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`SerialHistorial`, `Personas_IdPersonas`),
  INDEX `fk_Historiales_Personas1_idx` (`Personas_IdPersonas` ASC),
  CONSTRAINT `fk_Historiales_Personas1`
    FOREIGN KEY (`Personas_IdPersonas`)
    REFERENCES `bd_genesyslab`.`Personas` (`IdPersonas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
