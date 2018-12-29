-- ===================================================================
-- Sales-DatabaseBuild
--   This script builds the dbSales database and its table.  It also 
-- inserts data into the table.
-- ===================================================================

-- -------------------------------------------------------------------
-- Save selected MySQL settings
-- -------------------------------------------------------------------
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -------------------------------------------------------------------
-- Delete and create database
-- -------------------------------------------------------------------
DROP SCHEMA IF EXISTS `dbSales` ;
CREATE SCHEMA IF NOT EXISTS `dbSales` DEFAULT CHARACTER SET utf8 ;

-- -------------------------------------------------------------------
-- Switch to dbCities database
-- -------------------------------------------------------------------
USE dbSales;

-- -------------------------------------------------------------------
-- Delete and create table `dbSales`.`tbSales`
-- -------------------------------------------------------------------
DROP TABLE IF EXISTS `dbSales`.`tbSales` ;
CREATE TABLE IF NOT EXISTS `dbSales`.`tbSales` (
  `SaleID` INT NOT NULL AUTO_INCREMENT,
  `NumberOfTickets`  INT NOT NULL,
  `TotalPrice`  decimal NOT NULL,
  PRIMARY KEY (`SaleID`))
ENGINE = InnoDB;

-- -------------------------------------------------------------------
-- Insert data into table `dbSales`.`tbSales`
-- -------------------------------------------------------------------
INSERT INTO tbSales (NumberOfTickets,TotalPrice) VALUES 
  ('1','375'),
  ('3','1125'),
  ('5','1875'),
  ('4','1000'),
  ('2','300');
SELECT * FROM tbSales;

-- -------------------------------------------------------------------
-- Restore saved MySQL settings
-- -------------------------------------------------------------------
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
