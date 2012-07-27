SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `DHCPI` DEFAULT CHARACTER SET latin1 ;
USE `DHCPI` ;

-- -----------------------------------------------------
-- Table `DHCPI`.`configuration`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `DHCPI`.`configuration` (
  `idconfiguration` INT(11) NOT NULL AUTO_INCREMENT ,
  `Options` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`idconfiguration`) )
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `DHCPI`.`reseaux_partages`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `DHCPI`.`reseaux_partages` (
  `idreseaux_partages` INT(11) NOT NULL AUTO_INCREMENT ,
  `Nom` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`idreseaux_partages`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `DHCPI`.`vlans`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `DHCPI`.`vlans` (
  `idvlan` INT(11) NOT NULL AUTO_INCREMENT ,
  `IP` VARCHAR(45) NOT NULL ,
  `Commentaire` VARCHAR(45) NULL DEFAULT NULL ,
  `Netmask` VARCHAR(45) NOT NULL ,
  `DNS_1` VARCHAR(45) NULL DEFAULT NULL ,
  `DNS_2` VARCHAR(45) NULL DEFAULT NULL ,
  `reseaux_partages` INT(11) NULL DEFAULT NULL ,
  `options_vlans` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`idvlan`) ,
  INDEX `fk_vlans_reseaux_partages` (`reseaux_partages` ASC) ,
  CONSTRAINT `fk_vlans_reseaux_partages`
    FOREIGN KEY (`reseaux_partages` )
    REFERENCES `DHCPI`.`reseaux_partages` (`idreseaux_partages` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 18
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `DHCPI`.`machines`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `DHCPI`.`machines` (
  `idmachines` INT(11) NOT NULL AUTO_INCREMENT ,
  `IP` VARCHAR(45) NOT NULL ,
  `Nom` VARCHAR(45) NOT NULL ,
  `Commentaire` VARCHAR(45) NULL DEFAULT NULL ,
  `Adresse_MAC` VARCHAR(45) NOT NULL ,
  `Date_Creation` DATE NOT NULL ,
  `Date_Fermeture` DATE NULL DEFAULT NULL ,
  `Vlan` INT(11) NOT NULL ,
  PRIMARY KEY (`idmachines`) ,
  INDEX `fk_machines_vlans1` (`Vlan` ASC) ,
  CONSTRAINT `fk_machines_vlans1`
    FOREIGN KEY (`Vlan` )
    REFERENCES `DHCPI`.`vlans` (`idvlan` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 539
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `DHCPI`.`utilisateurs`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `DHCPI`.`utilisateurs` (
  `idutilisateurs` INT(11) NOT NULL AUTO_INCREMENT ,
  `Nom` VARCHAR(45) NOT NULL ,
  `Uid` VARCHAR(45) NOT NULL ,
  `Password` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idutilisateurs`) )
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
