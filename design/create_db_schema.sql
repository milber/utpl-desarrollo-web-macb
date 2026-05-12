-- MySQL Workbench Forward Engineering

-- -----------------------------------------------------
-- Schema macb_dw
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `macb_dw` ;

-- -----------------------------------------------------
-- Schema macb_dw
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `macb_dw` DEFAULT CHARACTER SET utf8mb4 ;
USE `macb_dw` ;

-- -----------------------------------------------------
-- Table `macb_dw`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `macb_dw`.`usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `cedula` VARCHAR(10) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `fecha_registro` DATETIME NOT NULL,
  `password` VARCHAR(20) NOT NULL,
  UNIQUE INDEX `cedula_UNIQUE` (`cedula` ASC) VISIBLE,
  UNIQUE INDEX `correo_UNIQUE` (`correo` ASC) VISIBLE,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;

