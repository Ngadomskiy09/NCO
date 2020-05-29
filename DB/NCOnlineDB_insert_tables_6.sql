-- Fri May 29 2020
-- Model: NCOnlineDB   Version 6.0

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Table `nconline`.`Test`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`Test` (
  `formID` INT NOT NULL AUTO_INCREMENT,
  `Programmer` VARCHAR(255) NULL,
  `Runtime` TIME NULL,
  `Model` VARCHAR(20) NULL,
  `FWC` VARCHAR(6) NULL,
  `Media` VARCHAR(25) NULL,
  `Program_number` VARCHAR(35) NULL,
  `Used_to_make` VARCHAR(255) NULL,
  `Program_Date` DATE NULL,
  `Program_Time` TIME NULL,
  `Program_type` VARCHAR(40) NULL,
  `Part_Status` CHAR(50) NULL,
  `Rev_reason` CHAR(20) NULL,
  `Graphic` CHAR(10) NULL,
  `MCD_compare` CHAR(5) NULL,
  `Prev_buy_off` CHAR(12) NULL,
  `Programmers_instructions` VARCHAR(50) NULL,
  `programmers_notes` TEXT NULL,
  `Milling_proc` CHAR(20) NULL,
  `operators_notes` TEXT NULL,
  `Geometry` CHAR(20) NULL,
  `Signature` VARCHAR(50) NULL,
  `Layout_Date` DATE NULL,
  `layout_notes` TEXT NULL,
  `Shop_signature` CHAR(50) NULL,
  `Shop_Date` DATE NULL,
  PRIMARY KEY (`formID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `permission` VARCHAR(3) NULL,
  `name` VARCHAR(128) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`quality_alert`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`quality_alert` (
  `quality_alert_num` INT NOT NULL AUTO_INCREMENT,
  `formID` INT NOT NULL,
  `operator_signature` VARCHAR(64) NULL,
  `work_order` INT(9) NULL,
  `machine` VARCHAR(45) NULL,
  `date` DATE NULL,
  `part_number` CHAR(6) NULL,
  `error_discrepancy` VARCHAR(512) NULL,
  `cause` TEXT NULL,
  PRIMARY KEY (`quality_alert_num`),
  INDEX `fk_quality_alert_formID1_idx` (`formID` ASC),
  CONSTRAINT `fk_quality_alert_formID1`
    FOREIGN KEY (`formID`)
    REFERENCES `nconline`.`Test` (`formID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`first_part_mto_run`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`first_part_mto_run` (
  `first_part_mto_run_id` INT NOT NULL AUTO_INCREMENT,
  `formID` INT NOT NULL,
  `operators_name` VARCHAR(64) NULL,
  `date` DATE NULL,
  `p_o_num` INT NULL,
  `machine` INT NULL,
  `shift` TINYINT(3) NULL,
  `seq_from_to` VARCHAR(45) NULL,
  PRIMARY KEY (`first_part_mto_run_id`),
  INDEX `fk_first_mto_run_copy1_formID1_idx` (`formID` ASC),
  CONSTRAINT `fk_first_mto_run_copy1_formID1`
    FOREIGN KEY (`formID`)
    REFERENCES `nconline`.`Test` (`formID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`cutter_list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`cutter_list` (
  `cutter_list_id` INT NOT NULL AUTO_INCREMENT,
  `formID` INT NOT NULL,
  `cutter_list_number` INT NULL,
  `tool_id` VARCHAR(64) NULL,
  `tool_description` VARCHAR(128) NULL,
  `tool_num` VARCHAR(45) NULL,
  PRIMARY KEY (`cutter_list_id`),
  INDEX `fk_cutter_list_formID1_idx` (`formID` ASC),
  CONSTRAINT `fk_cutter_list_formID1`
    FOREIGN KEY (`formID`)
    REFERENCES `nconline`.`Test` (`formID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`tooling_sequence`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`tooling_sequence` (
  `tooling_sequence_id` INT NOT NULL AUTO_INCREMENT,
  `formID` INT NOT NULL,
  `tool_num_1` TINYINT(5) NULL,
  `tool_description_1` VARCHAR(128) NULL,
  `tool_num_2` INT NULL,
  `tool_description_2` VARCHAR(128) NULL,
  `programmers_notes` TEXT NULL,
  `operators_notes` TEXT NULL,
  `mto_comments` TEXT NULL,
  `fr_rpm_100` TINYINT NULL,
  `tooling_mto_status` VARCHAR(45) NULL,
  `file_url` VARCHAR(255) NULL,
  PRIMARY KEY (`tooling_sequence_id`),
  INDEX `fk_tooling_sequence_copy1_formID1_idx` (`formID` ASC),
  CONSTRAINT `fk_tooling_sequence_copy1_formID1`
    FOREIGN KEY (`formID`)
    REFERENCES `nconline`.`Test` (`formID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
