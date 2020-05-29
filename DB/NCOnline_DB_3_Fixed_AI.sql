SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

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
-- Table `nconline`.`form_completion_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`form_completion_status` (
  `status_id` INT NOT NULL AUTO_INCREMENT,
  `status_level` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`status_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`graphic_check`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`graphic_check` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `graphic_check` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`previous_buy-off`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`previous_buy-off` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `previous_buy-off` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`reason_for_revision`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`reason_for_revision` (
  `reason_for_revision_id` INT NOT NULL AUTO_INCREMENT,
  `reason_for_revision` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`reason_for_revision_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`geometry_acceptable`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`geometry_acceptable` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `acceptance` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`program_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`program_status` (
  `program_status_id` INT NOT NULL AUTO_INCREMENT,
  `program_status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`program_status_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`mto_report`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`mto_report` (
  `mto_report_id` INT NOT NULL AUTO_INCREMENT,
  `programmer_user` INT NOT NULL,
  `parent_report` INT NOT NULL,
  `runtime` VARCHAR(8) NULL,
  `model` VARCHAR(8) NULL,
  `fwc` TINYINT(8) NULL,
  `media_file` VARCHAR(6) NULL,
  `program_number` VARCHAR(23) NULL,
  `used_to_make` TEXT NULL,
  `program_date` VARCHAR(8) NULL,
  `program_type` VARCHAR(45) NULL,
  `program_status` INT NULL,
  `form_completion_status` INT NOT NULL,
  `reason_for_revision` INT NULL,
  `graphic_check` INT NULL,
  `mcd_compare` TINYINT NULL,
  `previous_buy-off` INT NULL,
  `mto_instruction` TEXT NULL,
  `programmer_mto_instructions` TINYINT NULL,
  `shop_approval_date` DATE NULL,
  `shop_approval_signature` INT NULL,
  `layout_check_report_signature` INT NULL,
  `geometry_acceptable` INT NULL,
  `layout_check_report_date` DATE NULL,
  INDEX `fk_mto_report_user_idx` (`programmer_user` ASC),
  PRIMARY KEY (`mto_report_id`),
  INDEX `fk_mto_report_completion_status1_idx` (`form_completion_status` ASC),
  INDEX `fk_mto_report_graphic_check1_idx` (`graphic_check` ASC),
  INDEX `fk_mto_report_previous_buy-off1_idx` (`previous_buy-off` ASC),
  INDEX `fk_mto_report_reason_for_revision1_idx` (`reason_for_revision` ASC),
  INDEX `fk_mto_report_user1_idx` (`shop_approval_signature` ASC),
  INDEX `fk_mto_report_user2_idx` (`layout_check_report_signature` ASC),
  INDEX `fk_mto_report_geometry_acceptable1_idx` (`geometry_acceptable` ASC),
  INDEX `fk_mto_report_program_status1_idx` (`program_status` ASC),
  CONSTRAINT `fk_mto_report_user`
    FOREIGN KEY (`programmer_user`)
    REFERENCES `nconline`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mto_report_completion_status1`
    FOREIGN KEY (`form_completion_status`)
    REFERENCES `nconline`.`form_completion_status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mto_report_graphic_check1`
    FOREIGN KEY (`graphic_check`)
    REFERENCES `nconline`.`graphic_check` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mto_report_previous_buy-off1`
    FOREIGN KEY (`previous_buy-off`)
    REFERENCES `nconline`.`previous_buy-off` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mto_report_reason_for_revision1`
    FOREIGN KEY (`reason_for_revision`)
    REFERENCES `nconline`.`reason_for_revision` (`reason_for_revision_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mto_report_user1`
    FOREIGN KEY (`shop_approval_signature`)
    REFERENCES `nconline`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mto_report_user2`
    FOREIGN KEY (`layout_check_report_signature`)
    REFERENCES `nconline`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mto_report_geometry_acceptable1`
    FOREIGN KEY (`geometry_acceptable`)
    REFERENCES `nconline`.`geometry_acceptable` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mto_report_program_status1`
    FOREIGN KEY (`program_status`)
    REFERENCES `nconline`.`program_status` (`program_status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`milling_acceptable`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`milling_acceptable` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `acceptance` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`first_mto_run`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`first_mto_run` (
  `mto_report_id` INT NOT NULL,
  `date` DATE NULL,
  `po_num` TINYINT(9) NULL,
  `machine` INT NULL,
  `seq_from_to` VARCHAR(45) NULL,
  `shift` TINYINT(3) NULL,
  `milling_acceptable_id` INT NULL,
  `mill_process_notes` TEXT NULL,
  `run_num` INT NOT NULL,
  `operator_signature` INT NULL,
  PRIMARY KEY (`run_num`, `mto_report_id`),
  INDEX `fk_first_mto_run_milling_acceptable1_idx` (`milling_acceptable_id` ASC),
  INDEX `fk_first_mto_run_user1_idx` (`operator_signature` ASC),
  CONSTRAINT `fk_first_mto_run_mto_report1`
    FOREIGN KEY (`mto_report_id`)
    REFERENCES `nconline`.`mto_report` (`mto_report_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_first_mto_run_milling_acceptable1`
    FOREIGN KEY (`milling_acceptable_id`)
    REFERENCES `nconline`.`milling_acceptable` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_first_mto_run_user1`
    FOREIGN KEY (`operator_signature`)
    REFERENCES `nconline`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`quality_alert`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`quality_alert` (
  `quality_alert_num` INT NOT NULL AUTO_INCREMENT,
  `mto_report_id` INT NOT NULL,
  `operator_signature` INT NULL,
  `work_order` INT(9) NULL,
  `machine` VARCHAR(45) NULL,
  `date` DATE NULL,
  `part_number` CHAR(6) NULL,
  `error_discrepancy` VARCHAR(512) NULL,
  `cause` TEXT NULL,
  PRIMARY KEY (`quality_alert_num`, `mto_report_id`),
  INDEX `fk_quality_alert_user1_idx` (`operator_signature` ASC),
  CONSTRAINT `fk_quality_alert_mto_report1`
    FOREIGN KEY (`mto_report_id`)
    REFERENCES `nconline`.`mto_report` (`mto_report_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_quality_alert_user1`
    FOREIGN KEY (`operator_signature`)
    REFERENCES `nconline`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`tooling_mto_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`tooling_mto_status` (
  `tooling_status_id` INT NOT NULL AUTO_INCREMENT,
  `tooling_status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`tooling_status_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`tooling_sequence`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`tooling_sequence` (
  `tooling_sequence_id` INT NOT NULL AUTO_INCREMENT,
  `mto_report_id` INT NOT NULL,
  `sequence_num` INT NULL,
  `tool_num_1` TINYINT(5) NULL,
  `tool_description_1` VARCHAR(128) NULL,
  `tool_num_2` INT NULL,
  `tool_description_2` VARCHAR(128) NULL,
  `programmers_notes` TEXT NULL,
  `operators_notes` TEXT NULL,
  `tooling_mto_status` INT NULL,
  `fr_rpm_100` TINYINT NULL,
  `mto_comments` TEXT NULL,
  PRIMARY KEY (`tooling_sequence_id`),
  INDEX `fk_tooling_sequence_mto_report1_idx` (`mto_report_id` ASC),
  INDEX `fk_tooling_sequence_tooling_mto_status1_idx` (`tooling_mto_status` ASC),
  CONSTRAINT `fk_tooling_sequence_mto_report1`
    FOREIGN KEY (`mto_report_id`)
    REFERENCES `nconline`.`mto_report` (`mto_report_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tooling_sequence_tooling_mto_status1`
    FOREIGN KEY (`tooling_mto_status`)
    REFERENCES `nconline`.`tooling_mto_status` (`tooling_status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`images` (
  `image_id` INT NOT NULL AUTO_INCREMENT,
  `image_path` VARCHAR(256) NOT NULL,
  `image_caption` VARCHAR(64) NULL,
  PRIMARY KEY (`image_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nconline`.`tooling_images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nconline`.`tooling_images` (
  `tooling_sequence_id` INT NOT NULL,
  `image_id` INT NOT NULL,
  PRIMARY KEY (`tooling_sequence_id`, `image_id`),
  INDEX `fk_tooling_images_images1_idx` (`image_id` ASC),
  CONSTRAINT `fk_tooling_images_tooling_sequence1`
    FOREIGN KEY (`tooling_sequence_id`)
    REFERENCES `nconline`.`tooling_sequence` (`tooling_sequence_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tooling_images_images1`
    FOREIGN KEY (`image_id`)
    REFERENCES `nconline`.`images` (`image_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
