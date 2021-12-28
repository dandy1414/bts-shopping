-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "shoppings" ------------------------------------
CREATE TABLE `shoppings`( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`created_date` Date NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- CREATE TABLE "users" ----------------------------------------
CREATE TABLE `users`( 
	`id` BigInt( 255 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`username` VarChar( 15 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`password` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`email` VarChar( 20 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`phone` VarChar( 12 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`country` VarChar( 15 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`city` VarChar( 15 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`postcode` VarChar( 10 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`name` VarChar( 50 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`address` Text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `unique_username` UNIQUE( `username` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 3;
-- -------------------------------------------------------------


-- Dump data of "shoppings" --------------------------------
BEGIN;

INSERT INTO `shoppings`(`id`,`name`,`created_date`) VALUES 
( '1', 'Baju Anak', '2021-10-10' ),
( '2', 'Baju Pria', '2021-10-10' ),
( '3', 'Baju Pria', '2021-10-10' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "users" ------------------------------------
BEGIN;

INSERT INTO `users`(`id`,`username`,`password`,`email`,`phone`,`country`,`city`,`postcode`,`name`,`address`) VALUES 
( '6', 'Ahmad14', '$2y$10$cHZ6LzKYp.pSzgWnkjoioea6hbJ/E0E2gFk.NVtk87A0YWUihHhTu', 'ahmadi@gmail.com', '08977777', 'Indonesia', 'Bandung', '12345', 'Ahmad', 'Jl. Braga' ),
( '7', 'Ahmad15', '$2y$10$xdCgAd5Jt.8T8ebW0BVTfuk0KYqqBUaHzSBzgHQo5WBAXA/1taBkC', 'ahmada@gmail.com', '08977777', 'Indonesia', 'Bandung', '12345', 'Ahmad', 'Jl. Braga' );
COMMIT;
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


