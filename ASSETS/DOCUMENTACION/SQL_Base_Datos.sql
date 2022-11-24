-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema Base_Datos_Proyecto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Base_Datos_Proyecto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Base_Datos_Proyecto` DEFAULT CHARACTER SET utf8 ;
USE `Base_Datos_Proyecto` ;

-- -----------------------------------------------------
-- Table `Base_Datos_Proyecto`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Base_Datos_Proyecto`.`rol` (
  `id_pk_rol` TINYINT(1) NOT NULL,
  `nombre_rol` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_pk_rol`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Base_Datos_Proyecto`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Base_Datos_Proyecto`.`usuario` (
  `id_pk_usuario` BIGINT(100) NOT NULL,
  `user_usuario` VARCHAR(100) NOT NULL,
  `pass_usuario` VARCHAR(100) NOT NULL,
  `nombre_usuario` VARCHAR(100) NOT NULL,
  `apellido_usuario` VARCHAR(100) NOT NULL,
  `edad_usuario` INT(2) NOT NULL,
  `genero_usuario` VARCHAR(100) NOT NULL,
  `telefono_usuario` VARCHAR(100) NOT NULL,
  `direccion_usuario` VARCHAR(100) NOT NULL,
  `ciudad_usuario` VARCHAR(100) NOT NULL,
  `cargo_usuario` VARCHAR(100) NOT NULL,
  `correo_usuario` VARCHAR(100) NOT NULL,
  `fecha_registro_usuario` DATE NOT NULL,
  `permiso_usuario` INT(2) NOT NULL,
  `estado_usuario` TINYINT(1) NOT NULL,
  `id_pk_rol_fk` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id_pk_usuario`),
  INDEX `id_pk_rol_fk` (`id_pk_rol_fk` ASC),
  CONSTRAINT `usuario_ibfk_1`
    FOREIGN KEY (`id_pk_rol_fk`)
    REFERENCES `Base_Datos_Proyecto`.`rol` (`id_pk_rol`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
