-- MySQL Script generated by MySQL Workbench
-- Sun May 21 18:08:39 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema store_management_system
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `store_management_system` ;

-- -----------------------------------------------------
-- Schema store_management_system
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `store_management_system` DEFAULT CHARACTER SET utf8 ;
USE `store_management_system` ;

-- -----------------------------------------------------
-- Table `store_management_system`.`manufacture`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `store_management_system`.`manufacture` ;

CREATE TABLE IF NOT EXISTS `store_management_system`.`manufacture` (
  `manufacture_id` VARCHAR(20) NOT NULL,
  `name` VARCHAR(200) NULL,
  `time_create` TIMESTAMP NULL,
  `time_edit` TIMESTAMP NULL,
  `admin_create` VARCHAR(20) NULL,
  `admin_edit` VARCHAR(20) NULL,
  `ip_create` VARCHAR(50) NULL,
  `ip_edit` VARCHAR(50) NULL,
  `active` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`manufacture_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store_management_system`.`brand`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `store_management_system`.`brand` ;

CREATE TABLE IF NOT EXISTS `store_management_system`.`brand` (
  `brand_id` VARCHAR(20) NOT NULL,
  `name` VARCHAR(50) NULL,
  `manufacture_id` VARCHAR(20) NULL,
  `sort_order` BIGINT NULL,
  `time_create` TIMESTAMP NULL,
  `time_edit` TIMESTAMP NULL,
  `admin_create` VARCHAR(20) NULL,
  `admin_edit` VARCHAR(20) NULL,
  `ip_create` VARCHAR(50) NULL,
  `ip_edit` VARCHAR(50) NULL,
  `active` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`brand_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store_management_system`.`item_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `store_management_system`.`item_category` ;

CREATE TABLE IF NOT EXISTS `store_management_system`.`item_category` (
  `item_category_id` VARCHAR(20) NOT NULL,
  `name` VARCHAR(100) NULL,
  `sort_order` BIGINT NULL,
  `time_create` TIMESTAMP NULL,
  `time_edit` TIMESTAMP NULL,
  `admin_create` VARCHAR(20) NULL,
  `admin_edit` VARCHAR(20) NULL,
  `ip_create` VARCHAR(50) NULL,
  `ip_edit` VARCHAR(50) NULL,
  `active` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`item_category_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store_management_system`.`color`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `store_management_system`.`color` ;

CREATE TABLE IF NOT EXISTS `store_management_system`.`color` (
  `color_id` VARCHAR(20) NOT NULL,
  `name` VARCHAR(200) NULL,
  `sort_oder` BIGINT NULL,
  `time_create` TIMESTAMP NULL,
  `time_edit` TIMESTAMP NULL,
  `admin_create` VARCHAR(20) NULL,
  `admin_edit` VARCHAR(20) NULL,
  `ip_create` VARCHAR(50) NULL,
  `ip_edit` VARCHAR(50) NULL,
  `active` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`color_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store_management_system`.`item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `store_management_system`.`item` ;

CREATE TABLE IF NOT EXISTS `store_management_system`.`item` (
  `item_id` VARCHAR(20) NOT NULL,
  `code` VARCHAR(50) NULL,
  `name` VARCHAR(200) NULL,
  `is_pack` TINYINT NULL DEFAULT 0,
  `item_child` VARCHAR(20) NULL,
  `item_category_id` VARCHAR(20) NULL,
  `brand_id` VARCHAR(20) NULL,
  `manufacture_id` VARCHAR(20) NULL,
  `size` VARCHAR(100) NULL,
  `volume_value` DOUBLE NULL,
  `volume_unit` VARCHAR(20) NULL,
  `weight_value` DOUBLE NULL,
  `weight_unit` VARCHAR(20) NULL,
  `length_value` DOUBLE NULL,
  `length_unit` VARCHAR(20) NULL,
  `width_value` DOUBLE NULL,
  `width_unit` VARCHAR(20) NULL,
  `height_value` DOUBLE NULL,
  `height_unit` VARCHAR(20) NULL,
  `color_id` VARCHAR(20) NULL,
  `variant` VARCHAR(200) NULL,
  `time_create` TIMESTAMP NULL,
  `time_edit` TIMESTAMP NULL,
  `admin_create` VARCHAR(20) NULL,
  `admin_edit` VARCHAR(20) NULL,
  `ip_create` VARCHAR(50) NULL,
  `ip_edit` VARCHAR(50) NULL,
  `active` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`item_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store_management_system`.`sale`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `store_management_system`.`sale` ;

CREATE TABLE IF NOT EXISTS `store_management_system`.`sale` (
  `sale_id` VARCHAR(20) NOT NULL,
  `brand_id` VARCHAR(20) NULL,
  `item_id` VARCHAR(20) NULL,
  `time_create` TIMESTAMP NULL,
  `time_edit` TIMESTAMP NULL,
  `admin_create` VARCHAR(20) NULL,
  `admin_edit` VARCHAR(20) NULL,
  `ip_create` VARCHAR(50) NULL,
  `ip_edit` VARCHAR(50) NULL,
  `active` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`sale_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store_management_system`.`store`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `store_management_system`.`store` ;

CREATE TABLE IF NOT EXISTS `store_management_system`.`store` (
  `store_id` VARCHAR(20) NOT NULL,
  `name` VARCHAR(200) NULL,
  `address` VARCHAR(200) NULL,
  `sort_order` BIGINT NULL,
  `time_create` TIMESTAMP NULL,
  `time_edit` TIMESTAMP NULL,
  `admin_create` VARCHAR(20) NULL,
  `admin_edit` VARCHAR(20) NULL,
  `ip_create` VARCHAR(50) NULL,
  `ip_edit` VARCHAR(50) NULL,
  `active` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`store_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store_management_system`.`store_stock`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `store_management_system`.`store_stock` ;

CREATE TABLE IF NOT EXISTS `store_management_system`.`store_stock` (
  `store_stock_id` VARCHAR(20) NOT NULL,
  `store_id` VARCHAR(20) NULL,
  `item_id` VARCHAR(20) NULL,
  `brand_id` VARCHAR(20) NULL,
  `stock` BIGINT(20) NULL,
  `time_create` TIMESTAMP NULL,
  `time_edit` TIMESTAMP NULL,
  `admin_create` VARCHAR(20) NULL,
  `admin_edit` VARCHAR(20) NULL,
  `ip_create` VARCHAR(50) NULL,
  `ip_edit` VARCHAR(50) NULL,
  `active` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`store_stock_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store_management_system`.`exchange_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `store_management_system`.`exchange_type` ;

CREATE TABLE IF NOT EXISTS `store_management_system`.`exchange_type` (
  `exchange_type_id` VARCHAR(20) NOT NULL,
  `name` VARCHAR(100) NULL,
  `source_supplier` TINYINT(1) NULL DEFAULT 0,
  `source_warehouse` TINYINT(1) NULL DEFAULT 0,
  `source_store` TINYINT(1) NULL DEFAULT 0,
  `destination_buyer` TINYINT(1) NULL DEFAULT 0,
  `destination_warehouse` TINYINT(1) NULL DEFAULT 0,
  `destination_store` TINYINT(1) NULL DEFAULT 0,
  `default_value` TINYINT(1) NULL DEFAULT 0,
  `sort_order` BIGINT NULL,
  `time_create` TIMESTAMP NULL,
  `time_edit` TIMESTAMP NULL,
  `admin_create` VARCHAR(20) NULL,
  `admin_edit` VARCHAR(20) NULL,
  `ip_create` VARCHAR(50) NULL,
  `ip_edit` VARCHAR(50) NULL,
  `active` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`exchange_type_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store_management_system`.`item_exchange`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `store_management_system`.`item_exchange` ;

CREATE TABLE IF NOT EXISTS `store_management_system`.`item_exchange` (
  `item_exchange_id` VARCHAR(20) NOT NULL,
  `exchange_type_id` VARCHAR(20) NULL,
  `date_time` TIMESTAMP NULL,
  `source_supplier` VARCHAR(20) NULL,
  `source_warehouse` VARCHAR(20) NULL,
  `source_store` VARCHAR(20) NULL,
  `source_item` VARCHAR(20) NULL,
  `source_quantity` BIGINT(20) NULL,
  `source_stock_before` BIGINT NULL,
  `source_stock_after` BIGINT NULL,
  `destination_buyer` VARCHAR(20) NULL,
  `destination_warehouse` VARCHAR(20) NULL,
  `destination_store` VARCHAR(20) NULL,
  `destination_item` VARCHAR(20) NULL,
  `destination_quantity` BIGINT(20) NULL,
  `destination_stock_before` BIGINT NULL,
  `destination_stock_after` BIGINT NULL,
  `pack` TINYINT(1) NULL DEFAULT 0,
  `unpack` TINYINT(1) NULL DEFAULT 0,
  `time_create` TIMESTAMP NULL,
  `time_edit` TIMESTAMP NULL,
  `admin_create` VARCHAR(20) NULL,
  `admin_edit` VARCHAR(20) NULL,
  `ip_create` VARCHAR(50) NULL,
  `ip_edit` VARCHAR(50) NULL,
  `active` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`item_exchange_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store_management_system`.`supplier`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `store_management_system`.`supplier` ;

CREATE TABLE IF NOT EXISTS `store_management_system`.`supplier` (
  `supplier_id` VARCHAR(20) NOT NULL,
  `name` VARCHAR(200) NULL,
  `company` VARCHAR(200) NULL,
  `address` VARCHAR(255) NULL,
  `country_id` VARCHAR(20) NULL,
  `state_id` VARCHAR(20) NULL,
  `city_id` VARCHAR(20) NULL,
  `phone` VARCHAR(50) NULL,
  `email` VARCHAR(100) NULL,
  `contact_person_name` VARCHAR(50) NULL,
  `contact_person_phone` VARCHAR(50) NULL,
  `contact_person_email` VARCHAR(100) NULL,
  `time_create` TIMESTAMP NULL,
  `time_edit` TIMESTAMP NULL,
  `admin_create` VARCHAR(20) NULL,
  `admin_edit` VARCHAR(20) NULL,
  `ip_create` VARCHAR(50) NULL,
  `ip_edit` VARCHAR(50) NULL,
  `active` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`supplier_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store_management_system`.`warehouse`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `store_management_system`.`warehouse` ;

CREATE TABLE IF NOT EXISTS `store_management_system`.`warehouse` (
  `warehouse_id` VARCHAR(20) NOT NULL,
  `name` VARCHAR(200) NULL,
  `address` VARCHAR(200) NULL,
  `sort_order` BIGINT NULL,
  `time_create` TIMESTAMP NULL,
  `time_edit` TIMESTAMP NULL,
  `admin_create` VARCHAR(20) NULL,
  `admin_edit` VARCHAR(20) NULL,
  `ip_create` VARCHAR(50) NULL,
  `ip_edit` VARCHAR(50) NULL,
  `active` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`warehouse_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store_management_system`.`warehouse_stock`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `store_management_system`.`warehouse_stock` ;

CREATE TABLE IF NOT EXISTS `store_management_system`.`warehouse_stock` (
  `warehouse_stock_id` VARCHAR(20) NOT NULL,
  `warehouse_id` VARCHAR(20) NULL,
  `item_id` VARCHAR(20) NULL,
  `brand_id` VARCHAR(20) NULL,
  `stock` BIGINT(20) NULL,
  `time_create` TIMESTAMP NULL,
  `time_edit` TIMESTAMP NULL,
  `admin_create` VARCHAR(20) NULL,
  `admin_edit` VARCHAR(20) NULL,
  `ip_create` VARCHAR(50) NULL,
  `ip_edit` VARCHAR(50) NULL,
  `active` TINYINT(1) NULL DEFAULT 1,
  PRIMARY KEY (`warehouse_stock_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
