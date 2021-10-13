-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.8-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for itams
CREATE DATABASE IF NOT EXISTS `itams` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `itams`;

-- Dumping structure for procedure itams.new_asset
DELIMITER //
CREATE PROCEDURE `new_asset`(
in `in_asset_tag` VARCHAR(200),
in `in_asset_name` VARCHAR(200),
in `in_descriptions` VARCHAR(200),
in `in_serial_no` VARCHAR(200),
in `in_price` VARCHAR(200),
in `in_sbu` VARCHAR(200),
in `in_date_purchase` VARCHAR(200),
in `in_installed_os` VARCHAR(200),
in `in_ms_office` VARCHAR(200),
in `in_remarks` VARCHAR(200),
in `in_type_of` VARCHAR(200),
in `in_status` VARCHAR(200),
in `in_quantity` VARCHAR(200)
)
BEGIN
	INSERT INTO tbl_assets(
    asset_tag, asset_name, descriptions, serial_no, price, sbu, date_purchase, installed_os, ms_office, remarks, type_of, status, quantity) VALUES (
    in_asset_tag,in_asset_name,in_descriptions,in_serial_no,in_price,in_sbu,in_date_purchase,in_installed_os,in_ms_office,in_remarks,in_type_of,in_status,in_quantity);
END//
DELIMITER ;

-- Dumping structure for procedure itams.new_users
DELIMITER //
CREATE PROCEDURE `new_users`(
in `in_employee_id` VARCHAR(200),
in `in_first_name` VARCHAR(200),
in `in_last_name` VARCHAR(200),
in `in_mid_initial` VARCHAR(200),
in `in_email` VARCHAR(200),
in `in_user_name` VARCHAR(200),
in `in_position` VARCHAR(200),
in `in_password_1` VARCHAR(200),
in `in_password_2` VARCHAR(200),
in `in_sbu_id` VARCHAR(200),
in `in_dept_id` VARCHAR(200),
in `in_user_type` VARCHAR(200)
)
BEGIN
	INSERT INTO tbl_employees (employee_id, first_name, last_name, mid_initial, email, user_name, position, password_1, password_2, sbu_id, dept_id, user_type) VALUES (
    in_employee_id, in_first_name, in_last_name, in_mid_initial, in_email, in_user_name, in_position, in_password_1, in_password_2, in_sbu_id, in_dept_id, in_user_type);
END//
DELIMITER ;

-- Dumping structure for procedure itams.sp_update_asset_details
DELIMITER //
CREATE PROCEDURE `sp_update_asset_details`(
in `upd_id` VARCHAR(200),
in `upd_asset_tag` VARCHAR(200),
in `upd_asset_name` VARCHAR(200),
in `upd_descriptions` VARCHAR(200),
in `upd_serial_no` VARCHAR(200),
in `upd_price` VARCHAR(200),
in `upd_sbu` VARCHAR(200),
in `upd_date_purchase` VARCHAR(200),
in `upd_installed_os` VARCHAR(200),
in `upd_ms_office` VARCHAR(200),
in `upd_remarks` VARCHAR(200),
in `upd_type_of` VARCHAR(200),
in `upd_status` VARCHAR(200)
)
BEGIN
	UPDATE tbl_assets as asset
    SET
    asset.asset_tag = upd_asset_tag, 
    asset.date_purchase = upd_date_purchase, 
    asset.asset_name = upd_asset_name, 
    asset.serial_no = upd_serial_no, 
    asset.descriptions = upd_descriptions, 
    asset.sbu = upd_sbu, 
    asset.price = upd_price, 
    asset.installed_os = upd_installed_os, 
    asset.ms_office = upd_ms_office, 
    asset.remarks = upd_remarks, 
    asset.type_of = upd_type_of, 
    asset.status = upd_status
    WHERE asset.id = upd_id;
END//
DELIMITER ;

-- Dumping structure for table itams.tbl_accountability
CREATE TABLE IF NOT EXISTS `tbl_accountability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record_id` varchar(50) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table itams.tbl_accountability: ~30 rows (approximately)
/*!40000 ALTER TABLE `tbl_accountability` DISABLE KEYS */;
INSERT INTO `tbl_accountability` (`id`, `record_id`, `date_created`, `user_id`) VALUES
	(1, '1', '2021-10-01 09:19:56', 1),
	(2, 'NA', '2021-10-01 09:26:01', 1),
	(3, 'NA', '2021-10-01 09:26:03', 1),
	(4, 'NA', '2021-10-01 09:26:04', 1),
	(5, '1', '2021-10-01 09:27:50', 1),
	(6, '0', '2021-10-01 09:34:43', 1),
	(7, '0', '2021-10-01 09:35:06', 1),
	(8, '0', '2021-10-01 09:35:50', 1),
	(9, '0', '2021-10-01 09:35:51', 1),
	(10, '0', '2021-10-01 09:36:27', 1),
	(11, '0', '2021-10-01 09:36:27', 1),
	(12, '0', '2021-10-01 09:36:44', 1),
	(13, '0', '2021-10-01 09:37:14', 1),
	(14, '0', '2021-10-01 09:38:03', 1),
	(15, '0', '2021-10-01 09:38:04', 1),
	(16, '0', '2021-10-01 09:38:04', 1),
	(17, '0', '2021-10-01 09:38:04', 1),
	(18, '0', '2021-10-01 09:38:04', 1),
	(19, '0', '2021-10-01 09:38:05', 1),
	(20, '0', '2021-10-01 09:39:14', 1),
	(21, '0', '2021-10-01 09:40:10', 1),
	(22, '0', '2021-10-01 09:41:08', 1),
	(23, '0', '2021-10-01 09:41:44', 1),
	(24, '0', '2021-10-01 09:42:24', 1),
	(25, '0', '2021-10-01 09:42:52', 1),
	(26, '0', '2021-10-01 09:43:05', 1),
	(27, '0', '2021-10-01 09:43:35', 1),
	(28, 'NA', '2021-10-01 09:44:06', 1),
	(29, '1', '2021-10-13 15:05:11', 1),
	(30, '4', '2021-10-13 15:05:27', 1),
	(31, 'NA', '2021-10-13 15:05:44', 1);
/*!40000 ALTER TABLE `tbl_accountability` ENABLE KEYS */;

-- Dumping structure for table itams.tbl_assets
CREATE TABLE IF NOT EXISTS `tbl_assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_tag` varchar(50) NOT NULL,
  `asset_name` varchar(50) NOT NULL DEFAULT '',
  `descriptions` varchar(255) DEFAULT '',
  `serial_no` varchar(50) NOT NULL DEFAULT '',
  `price` varchar(50) DEFAULT NULL,
  `sbu` varchar(50) NOT NULL DEFAULT '',
  `date_purchase` datetime DEFAULT NULL,
  `installed_os` varchar(50) NOT NULL DEFAULT '',
  `ms_office` varchar(50) NOT NULL DEFAULT '',
  `remarks` varchar(255) NOT NULL DEFAULT '',
  `type_of` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '',
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_assets_tbl_item` (`type_of`),
  CONSTRAINT `FK_tbl_assets_tbl_item` FOREIGN KEY (`type_of`) REFERENCES `tbl_item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table itams.tbl_assets: ~202 rows (approximately)
/*!40000 ALTER TABLE `tbl_assets` DISABLE KEYS */;
INSERT INTO `tbl_assets` (`id`, `asset_tag`, `asset_name`, `descriptions`, `serial_no`, `price`, `sbu`, `date_purchase`, `installed_os`, `ms_office`, `remarks`, `type_of`, `status`, `quantity`) VALUES
	(1, 'SWC-PNKC-WS-00043', 'LENOVO', '', 'PF0B1XEG', '31000', 'PNKC', '2015-10-06 00:00:00', 'WINDOWS 10 HOME SINGLE LANGUAGE', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(2, 'SWC-PNKC-WS-00020', 'LENOVO', '', 'SPF0UYS1L', '0', 'PNKC', '2018-12-01 00:00:00', 'WIN 10 SINGLE LANGUAGE', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(3, 'SWC-PNKC-WS-00071', 'LENOVO', '', 'MP13JH72', '28900', 'PNKC', '2016-09-16 00:00:00', 'WINDOWS 10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(4, 'SWC-PNKC-WS-00002', 'NA', '', 'faded', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN 7 32 bit', 'MS OFFICE 2007', 'WORKING CONDITION', 1, 'Available', 1),
	(5, 'NA', 'TOSHIBA', '', '7 07 1905', '0', 'NA', '0000-00-00 00:00:00', 'NA', 'NA', 'FOR VALIDATION', 1, 'Missing', 1),
	(6, 'SWC-PNKC-WS-00001', 'Intel Core 2 Duo 2.26ghz, 1Gb,', '', 'SGH9120B61', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'MS OFFICE 2007', 'obsolute device', 1, 'Disposed', 1),
	(7, 'SWC-PNKC-WS-00178', 'NA', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'defective motherboard / obsolute device', 2, 'Disposed', 1),
	(8, 'NA', 'Lenovo 320-14, Core I5', '', 'SPF0W3WN3', '0', 'NA', '2018-01-26 00:00:00', '', '', 'FOR VALIDATION', 1, 'Missing', 1),
	(9, 'SWC-PNKC-WS-00171', 'HP', '', 'HP', '0', 'PNKC', '2012-01-01 00:00:00', 'NA', 'NA', 'FOR CHECKING - NO RESPONCE PC', 2, 'Available', 1),
	(10, 'SWC-PNKC-S-00021', 'LENOVO', '', 'R302DH1', '0', 'PNKC', '2017-01-13 00:00:00', 'WINDOWS 10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(11, 'SWC-PNKC-WS-00019', 'LENOVO', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(12, 'SWC-PNKC-WS-00035', 'Hp P2-1350l', '', '3CR3080F21', '0', 'PNKC', '2012-03-30 00:00:00', 'Win7', 'NA', 'No Power Supply', 2, 'Defective', 1),
	(13, 'SWC-PNKC-WS-00172', 'HP', '', '3CR20702W7', '0', 'PNKC', '2014-07-04 00:00:00', 'NA', 'NA', 'WORKING CONDITION', 2, 'In use', 1),
	(14, 'SWC-PNKC-WS-00034', 'LENOVO', '', 'PF0WZA3S', '0', 'PNKC', '1905-10-07 00:00:00', 'WIN10 HOME SINGLE LANGUAGE', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(15, 'SWC-PNKC-WS-00053', 'LENOVO', '', 'YB02051462', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10PRO', 'MS OFFICE 2016', 'WORKING CONDITION', 1, 'In use', 1),
	(16, 'SWC-PNKC-WS-00058', 'LENOVO', '', 'SPF0UHZCE', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(17, 'SWC-PNKC-WS-00008', 'LENOVO', '', 'YB04032031', '0', 'PNKC', '2015-04-20 00:00:00', 'NA', 'NA', 'WORKING CONDITION (but nakatengga lang)', 2, 'Available', 1),
	(18, 'SWC-PNKC-WS-00048', 'NA', '', '5CD833308K', '38500', 'PNKC', '2018-01-11 00:00:00', 'WIN 1O PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(19, 'SWC-PNKC-WS-00116', 'LENOVO', '', 'PF0WNQEH', '0', 'PNKC', '2016-03-06 00:00:00', 'WIN10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(20, 'SWC-PNKC-WS-00104', 'LENOVO', '', 'PF0KNBFA', '22500', 'PNKC', '2016-09-30 00:00:00', 'WIN10', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(21, 'SWC-PNKC-WS-00103', 'NA', '', '5CD833304B', '38500', 'PNKC', '2018-01-11 00:00:00', 'WIN10 SINGLE LANGUAGE', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(22, 'SWC-PNKC-WS-00137', 'HP', '', '5CG8230V6V', '0', 'PNKC', '2019-08-23 00:00:00', 'WIN 10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(23, 'SWC-PNKC-WS-00138', 'LENOVO', '', 'MP17BS6M', '49000', 'PNKC', '2016-10-20 00:00:00', 'WIN 10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(24, 'SWC-PNKC-WS-00055', 'LENOVO', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(25, 'SWC-PNKC-WS-00023', 'ACER', '', 'NXHF9SP0069320478C3400', '0', 'PNKC', '2019-10-22 00:00:00', 'WIN10', 'MS OFFICE 2019', 'WORKING CONDITION', 1, 'In use', 1),
	(26, 'SWC-PNKC-WS-00061', 'DELL ', '', 'JLFBKR2', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10PRO', 'MS OFFICE 2019', 'WORKING CONDITION', 1, 'In use', 1),
	(27, 'SWC-PNKC-WS-00018', 'LENOVO', '', 'U1H553XM', '47000', 'PNKC', '2017-11-15 00:00:00', 'WIN10', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(28, 'SWC-PNKC-WS-00022', 'LENOVO', '', 'R30103HJ', '0', 'NA', '2014-07-07 00:00:00', 'WIN10', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(29, 'SWC-PNKC-WS-00039', 'ACER', '', 'NXHF9SP006932048DC3400', '27000', 'PNKC', '2019-10-30 00:00:00', 'WIN10 PRO', 'MS OFFICE 2016', 'WORKING CONDITION', 1, 'In use', 1),
	(30, 'NA', 'LENOVO', '', 'NA', '36500', 'NA', '0000-00-00 00:00:00', 'NA', 'NA', 'FOR VALIDATION', 1, 'Missing', 1),
	(31, 'NA', 'Lenovo 300-15', '', 'PF013YJ4', '30200', 'NA', '2016-10-09 00:00:00', '', 'NA', 'FOR VALIDATION', 1, 'Missing', 1),
	(32, 'NA', 'Lenovo 320-14ikb', '', 'PF0WNNE6', '32500', 'NA', '2018-01-17 00:00:00', '', 'NA', 'FOR VALIDATION', 1, 'Missing', 1),
	(33, 'SWC-PNKC-WS-00003', 'HP', '', '4CE52310NC', '37800', 'PNKC', '2015-08-20 00:00:00', 'WIN10', 'NA', 'WORKING CONDITION', 2, 'In use', 1),
	(34, 'SWC-PNKC-WS-00006', 'LENOVO', '', 'R302DHBH', '36300', 'PNKC', '2017-01-13 00:00:00', 'WIN 10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(35, 'SWC-PNKC-WS-00005', 'LENOVO', '', 'r302JGV2', '46000', 'PNKC', '2017-05-05 00:00:00', 'WIN10', 'NA', 'NO RAM', 2, 'Available', 1),
	(36, 'SWC-PNKC-WS-00096', 'HP', '', '8CG8227P59', '0', 'PNKC', '2019-01-10 00:00:00', 'WIN10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(37, 'SWC-PNKC-WS-00038', 'HP', '', '4CE51006R2', '37800', 'PNKC', '2015-05-13 00:00:00', 'WIN10PRO', 'MS OFFICE 2016', 'WORKING CONDITION', 2, 'In use', 1),
	(38, 'SWC-PNKC-WS-00040', 'Lenovo 300-11ish, I5, 8gb, Win10', '', 'R302DHD5', '36300', 'PNKC', '2017-01-13 00:00:00', 'NA', 'NA', 'WORKING CONDITION', 2, 'Available', 1),
	(39, 'SWC-PNKC-WS-00004', 'Intel Core i7 8th gen', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'For further check up - but working', 2, 'Available', 1),
	(40, 'NA', 'Hp 500-034d, Core I5, 8gb', '', 'NA', '37800', 'NA', '2015-10-22 00:00:00', '', '', 'FOR VALIDATION', 2, 'Missing', 1),
	(41, 'SWC-PNKC-WS-00031', 'NA', '', 'FVHX7R85J1WK', '0', 'PNKC', '2019-01-01 00:00:00', 'WIN10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 3, 'In use', 1),
	(42, 'SWC-PNKC-WS-00024', 'NA', '', 'CLONE DESKTOP', '21000', 'PNKC', '2015-04-27 00:00:00', 'WIN 7', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(43, 'SWC-PNKC-WS-00025', 'LENOVO', '', 'SU38CKN03', '46000', 'PNKC', '2017-04-05 00:00:00', 'WIN10 SINGLE LANGUAGE', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(44, 'SWC-PNKC-WS-00026', 'HP', '', '3CR318006X', '21000', 'PNKC', '2014-06-07 00:00:00', 'WIN8PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(45, 'SWC-PNKC-WS-00028', 'Hp Pavilion P6555d Core I3, 2gb, Win7', '', 'CNX032060SB', '0', 'PNKC', '2014-04-07 00:00:00', 'na', 'NA', 'FOR CHECKING', 2, 'Available', 1),
	(46, 'SWC-PNKC-WS-00063', 'NA', '', '86HWC4640XXY18G0956', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 5, 'In use', 1),
	(47, 'SWC-PNKC-WS-00101', 'LENOVO', '', 'MP14N0MZ', '35000', 'PNKC', '2017-07-07 00:00:00', 'WIN10PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(48, 'SWC-PNKC-WS-00102', 'LENOVO', '', 'SPF0ST7VN', '47995', 'PNKC', '2017-10-16 00:00:00', 'WIN10PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(49, 'SWC-PNKC-WS-00021', 'HP', '', '5CD8342M17', '51500', 'PNKC', '2018-01-11 00:00:00', 'WIN 10', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(50, 'SWC-PNKC-WS-00050', 'ACER', '', 'NXHF9SP0069360E45B3400', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10 PRO', 'MS OFFICE 2019', 'WORKING CONDITION', 1, 'In use', 1),
	(51, 'SWC-PNKC-WS-00027', 'HP', '', '3CR20912KP', '0', 'PNKC', '1905-04-07 00:00:00', 'WIN 10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(52, 'SWC-PNKC-WS-00072', 'LENOVO', '', 'G6BE04500JGJ', '27000', 'PNKC', '0000-00-00 00:00:00', 'WIN10 PRO LICENSE OS', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(53, 'SWC-PNKC-WS-00044', 'LENOVO', '', 'SR302JGUA', '47000', 'PNKC', '2017-07-07 00:00:00', 'WIN10 SINGLE LANGUAGE', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(54, 'SWC-PNKC-WS-00030', 'Hp 500-034d', '', '4CE4230756', '37800', 'PNKC', '2014-10-25 00:00:00', 'WIN8.1 SINGLE LANGUAGE', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(55, 'SWC-PNKC-WS-00029', 'LENOVO', '', 'R3004A9H', '27500', 'PNKC', '2015-05-13 00:00:00', 'WIN8.1 SINGLE LANGUAGE', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(56, 'SWC-PNKC-WS-00051', 'HP', '', '5CD8333075', '38500', 'PNKC', '2018-11-01 00:00:00', 'WIN10 PRO 64BIT', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(57, 'SWC-PNKC-WS-00059', 'HP', '', '5cd932b4tz', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10 PRO 64BIT', 'MS OFFICE 2019', 'WORKING CONDITION', 1, 'In use', 1),
	(58, 'NA', 'LENOVO', '', 'PCON9URP', '97200', 'NA', '0000-00-00 00:00:00', 'WIN10 PRO 64BIT', 'NA', 'FOR VALIDATION', 1, 'Missing', 1),
	(59, 'NA', 'NA', '', 'C02P60FLGQT', '113980', 'NA', '2015-01-30 00:00:00', 'MAC OS', 'NA', 'NA', 1, 'In use', 1),
	(60, 'SWC-PNKC-WS-00060', 'LENOVO', '', 'SPF0SZL90', '0', 'PNKC', '2017-02-11 00:00:00', 'WIN10PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(61, 'SWC-PNKC-WS-00073', 'HP', '', '8CG82716QQ', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10PRO', '', 'WORKING CONDITION', 2, 'In use', 1),
	(62, 'SWC-PNKC-WS-00100', 'ACER', '', 'NXVLFSP00U03430CCF7600', '0', 'PNKC', '2020-12-01 00:00:00', 'WIN10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(63, 'SWC-PNKC-WS-00049', 'LENOVO', '', 'MP12VA6U', '28900', 'PNKC', '2016-09-19 00:00:00', 'WIN10 HOME SINGLE LANGUALE', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(64, 'SWC-PNKC-WS-00065', 'LENOVO', '', 'UB03140039', '0', 'PNKC', '2015-02-05 00:00:00', 'WIN10 HOME SINGLE LANGUALE', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'Available', 1),
	(65, 'SWC-PNKC-WS-00066', 'LENOVO', '', 'YB06453164', '0', 'PNKC', '2015-10-01 00:00:00', 'WIN10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'Available', 1),
	(66, 'SWC-PNKC-WS-00067', 'LENOVO', '', 'UB03138034', '0', 'PNKC', '2015-04-29 00:00:00', 'WIN 8.1 PRO', 'MS OFFICE 2007', 'WORKING CONDITION', 1, 'Available', 1),
	(67, 'SWC-PNKC-WS-00157', 'HP Compaq', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'HP compaq', 1, 'Defective', 1),
	(68, 'NA', 'NA', '', '5CB13505JQ', '0', 'NA', '0000-00-00 00:00:00', '', '', 'FOR VALIDATION', 1, 'Missing', 1),
	(69, 'SWC-PNKC-WS-00009', 'HP', '', '3CR3080DVY', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN8', 'MS OFFICE 2010', 'WORKING CONDITION', 2, 'In use', 1),
	(70, 'SWC-PNKC-WS-00014', 'HP', '', '4CE41201FF', '22000', 'PNKC', '2014-02-10 00:00:00', 'WIN8 PRO', 'MS Office 2013', 'WORKING CONDITION', 2, 'Available', 1),
	(71, 'SWC-PNKC-WS-00015', 'DELL', '', '78YQG52', '27000', 'PNKC', '2016-01-04 00:00:00', 'WIN10PRO', 'MS Office 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(72, 'SWC-PNKC-WS-00139', 'HP', '', '5CD8271SFL', '51500', 'PNKC', '2018-11-01 00:00:00', 'WIN 10 HOME SINGLE LANGUAGE', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(73, 'SWC-PNKC-WS-00068', 'HP', '', '8CG9158DPS', '0', 'PNKC', '2019-06-28 00:00:00', 'WIN 10 PRO', 'MS OFFICE 2016', 'WORKING CONDITION', 1, 'In use', 1),
	(74, 'SWC-PNKC-WS-00140', 'LENOVO', '', 'PF0MCGAS', '32000', 'PNKC', '2017-01-13 00:00:00', 'WIN 10 HOME SINGLE LANGUAGE', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(75, 'SWC-PNKC-WS-00107', 'ACER', '', 'NXVUSP00J033171B17600', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(76, 'SWC-PNKC-WS-00054', 'LENOVO', '', 'NA', '0', 'PNKC', '2017-07-19 00:00:00', 'WIN10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(77, 'SWC-PNKC-WS-00095', 'LENOVO', '', '24MK1N0CX08H055024', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10 PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(78, 'SWC-PNKC-WS-00115', 'Lenovo 320-14, Core I5', '', 'PF0WNQJ8', '0', 'PNKC', '0000-00-00 00:00:00', '', '', 'DEFECTIVE BOARD, stock on bios no more memory', 1, 'Disposed', 1),
	(79, 'SWC-PNKC-WS-00042', 'HP', '', '4CE41201F3', '22000', 'PNKC', '2014-10-25 00:00:00', 'WIN8.1 PRO', 'MS OFFICE 2007', 'WORKING CONDITION', 2, 'In use', 1),
	(80, 'SWC-PNKC-WS-00041', 'HP', '', '4CE244026J', '36800', 'PNKC', '2017-04-20 00:00:00', 'WIN7', 'MS OFFICE 2013', 'WORKING CONDITION', 2, 'In use', 1),
	(81, 'SWC-PNKC-WS-00108', 'Clone Desktop', '', 'NA', '0', 'PNKC', '2014-04-07 00:00:00', 'WIN XP', 'NA', 'For further check up - but working', 2, 'Available', 1),
	(82, 'SWC-PNKC-WS-00069', 'ASUS', '', 'K1N0CX08H039025', '0', 'PNKC', '2019-08-23 00:00:00', 'WIN 10 PRO', 'MS OFFICE 2019', 'WORKING CONDITION', 1, 'In use', 1),
	(83, 'SWC-PNKC-WS-00013', 'ACER', '', 'NXVLUSP02Q039152677600', '0', 'PNKC', '2021-01-01 00:00:00', 'WIN10 PRO', 'Office 365 ( Personal)', 'WORKING CONDITION', 1, 'In use', 1),
	(84, 'SWC-PNKC-WS-00033', 'LENOVO', '', 'MP16RX5V', '49500', 'PNKC', '2017-10-16 00:00:00', 'WIN10 SINGLE LANGUAGE', 'MS OFFICE 2013', 'keyboard malfunction ', 1, 'Available', 1),
	(85, 'SWC-PNKC-WS-00012', 'HP', '', '5CD8342M05', '51500', 'PNKC', '2018-01-11 00:00:00', 'WIN10 PRO v. 2004', 'MS OFFICE 2013', 'As of 03/02/2021 Good Condition', 1, 'In use', 1),
	(86, 'SWC-PNKC-WS-00032', 'LENOVO', '', 'SPF0UYCPY', '47995', 'PNKC', '2018-01-04 00:00:00', 'WIN10PRO', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(87, 'SWC-PNKC-WS-00052', 'TOSHIBA', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10PRO', 'MS OFFICE 2019', 'WORKING CONDITION', 1, 'In use', 1),
	(88, 'SWC-PNKC-WS-00105', 'lenovo ideapad 310 core i5 7th gen, geforce nvidia', '', 'MTM80TU003APH', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'WORKING CONDITION', 1, 'Available', 1),
	(89, 'SWC-PNKC-WS-00046', 'NA', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', '(KINAHOY) no power', 1, 'Disposed', 1),
	(90, 'SWC-PNKC-WS-00106', 'Acer Aspire One Es1-132/ 2gb Ram/ 500gb/ Intel Cel', '', 'NXGG2SP0016512534F7600', '13000', 'PNKC', '2017-05-18 00:00:00', 'NA', 'NA', 'WORKING CONDITION - no charger', 1, 'Available', 1),
	(91, 'SWC-PNKC-WS-00070', 'Acer swift Intel core i3 7th gen 4gb ram', '', 'NXGXLSP00183407F5D6600', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN 10 PRO', 'MS OFFICE 2013', 'working', 1, 'Available', 1),
	(92, 'SWC-PNKC-WS-00142', 'Intel core i5 8th gen nvidia geforce', '', '5CD8333082', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'WORKING CONDITION', 1, 'In use', 1),
	(93, 'SWC-PNKC-WS-00143', 'Intel core i5 8th gen', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'DEFECTIVE BOARD', 1, 'Disposed', 1),
	(94, 'SWC-PNKC-WS-00144', 'Intel core i3 12gb ram', '', 'YB04101765', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10 PRO 64 BIT', 'MS OFFICE 2031', 'for replacement of ssd and addtl ram', 1, 'Defective', 1),
	(95, 'SWC-PNKC-WS-00109', 'lenovo intel core i3 amd radeon', '', 'YB06454801', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'REPLACE LCD', 1, 'Defective', 1),
	(96, 'SWC-PNKC-WS-00105', 'NA', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'WORKING CONDITION', 1, 'Available', 1),
	(97, 'SWC-PNKC-WS-00062', 'lenovo 320-15 core i7 8gb ram', '', 'SPF0SZKZN', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN 10 home single language', 'MS OFFICE 2013', 'WORKING CONDITION', 1, 'In use', 1),
	(98, 'SWC-PNKC-WS-00110', 'Lenovo 310-14ikb I5-7200u 8gb 1tb', '', 'F0F3R8C', '32500', 'PNKC', '2017-01-23 00:00:00', '', '', '(HINGES BROKEN) defective device', 1, 'Disposed', 1),
	(99, 'NA', 'Lenovo-G4070-I3, Core I3, 4gb', '', 'YB06454801', '25500', 'NA', '1905-07-07 00:00:00', '', '', 'FOR VALIDATION', 1, 'Missing', 1),
	(100, 'SWC-PNKC-WS-00074', 'Lenovo-G4070-I5, Core I5, 4gb', '', 'YB018922724', '0', 'PNKC', '2015-04-25 00:00:00', '', '', '(KINAHOY NA)', 1, 'Disposed', 1),
	(101, 'SWC-PNKC-WS-00114', 'Compaq Cq42-263tu, Core I5, 4gb, Win7', '', 'CNU0416094', '0', 'PNKC', '2013-01-01 00:00:00', '', '', 'obsolete', 1, 'Disposed', 1),
	(102, 'NA', 'Toshiba Nb510-1005, Atom, 2gb', '', 'PF0K11GN', '32500', 'NA', '2017-01-16 00:00:00', '', '', 'FOR VALIDATION', 1, 'Missing', 1),
	(103, 'SWC-PNKC-WS-00111', '', '', '6C091782Q', '0', 'PNKC', '2014-07-04 00:00:00', '', '', 'DEFECTIVE DEVICE', 1, 'Disposed', 1),
	(104, 'SWC-PNKC-WS-00011', 'LENOVO', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10 PRO', 'NA', 'WORKING CONDITION - RECOVERY PC', 2, 'In use', 1),
	(105, 'SWC-PNKC-WS-00056', 'INTEL NUC CORE I5 8TH GEN', '', 'G6BE04500KMC', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10 PRO', 'NA', 'WORKING CONDITION', 3, 'In use', 1),
	(106, 'SWC-PNKC-WS-00057', 'INTEL NUC CORE I5 8TH GEN', '', 'G6BE04500JHC', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'WORKING CONDITION', 3, 'In use', 1),
	(107, 'SWC-PNKC-WS-00036', 'Lenovo', '', 'R300E7U6', '0', 'PNKC', '2015-01-03 00:00:00', 'NA', 'NA', 'motherboard problem', 2, 'Defective', 1),
	(108, 'SWC-PNKC-WS-00037', 'Lenovo300-115h I5, 1tb, 8gb, Win10', '', 'R30341CL', '36300', 'PNKC', '2014-04-07 00:00:00', 'NA', 'NA', 'no ram no hdd, no ssd', 2, 'Available', 1),
	(109, 'SWC-PNKC-WS-00045', 'HP COMPAQ 8000 ELITE Small form fader', '', 'SGH038PJ4D', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'DEFECTIVE BOARD', 2, 'Disposed', 1),
	(110, 'SWC-PNKC-WS-00010', 'Intel Core i5', '', 'SMQK013304', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'CASE DEFECTIVE', 2, 'Disposed', 1),
	(111, 'SWC-PNKC-WS-00016', 'Intel Core i5, 4gb', '', 'SMQK013304', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'NO BOARD - SAFE KEEP HDD AND PSU', 2, 'Disposed', 1),
	(112, 'SWC-PNKC-WS-00017', 'Intel Core i3', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'NO BOARD', 2, 'Disposed', 1),
	(113, 'SWC-PNKC-S-00045', 'DELL Power edge R430', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'Windows Server 2016', 'MS OFFICE 2013', 'WORKING CONDITION', 4, 'In use', 1),
	(114, 'SWC-PNKC-S-00046', 'NA', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'WORKING CONDITION', 4, 'In use', 1),
	(115, 'SWC-PNKC-WS-00064', 'LENOVO', '', 'YB000U3C', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN10 HOME SINGLE LANGUAGE', 'MS OFFICE 2013', 'WORKING CONDITION', 5, 'Available', 1),
	(116, 'SWC- PNKC-WS-00087', 'HP Pavillion', '', '5CD833306F', '38500', 'PNKC', '2018-11-27 00:00:00', 'win10 pro', 'MS office 2013', 'missing flex cable', 1, 'Defective', 1),
	(117, 'NA', 'Tablet Lenovo Ip Miix3-10', '', 'P2002A5E', '0', 'NA', '2017-09-30 00:00:00', '', '', 'Available', 5, 'Missing', 1),
	(118, 'NA', 'Tablet Lenovo Ip Miix3-10', '', 'P20029UA', '0', 'NA', '2017-09-16 00:00:00', '', '', 'Available', 5, 'Missing', 1),
	(119, 'NA', 'Tablet Lenovo Ip Miix3-10', '', 'P2002APP', '0', 'NA', '2017-09-16 00:00:00', '', '', 'Available', 5, 'Missing', 1),
	(120, 'NA', 'Lenovo MIIX 3-830', '', 'Y8000U9M', '0', 'NA', '0000-00-00 00:00:00', '', '', 'Available', 5, 'Missing', 1),
	(121, 'NA', 'Lenovo MIIX 3-830', '', 'Y8000Y1X', '0', 'NA', '0000-00-00 00:00:00', '', '', 'Available', 5, 'Missing', 1),
	(122, 'SWC-PNKC-WS-00141', 'Tablet Redfox For Wms', '', 'NA', '10680', 'PNKC', '2003-01-11 00:00:00', 'NA', 'NA', 'NO CHARGER', 6, 'Available', 1),
	(123, 'SWC-PNKC-P-00104', 'APC 625 BACK UP UPS', '', '3B1425X28762', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working properly', 15, 'In use', 1),
	(124, 'SWC-PNKC-P-00105', 'APC 625 BACK UP UPS', '', '3B1612X18573', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working properly', 15, 'In use', 1),
	(125, 'SWC-PNKC-P-00106', 'APC 625 BACK UP UPS', '', '3B1425X28734', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working properly', 15, 'In use', 1),
	(126, 'SWC-PNKC-P-00107', 'APC 625 BACK UP UPS', '', '3B1514X20906', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working properly', 15, 'In use', 1),
	(127, 'SWC-PNKC-P-00108', 'APC 625 BACK UP UPS', '', '3B1714X20554', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'NO BATTERY', 15, 'Defective', 1),
	(128, 'SWC-PNKC-P-00109', 'APC 625 BACK UP UPS', '', '3B1714X20438', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'NO BATTERY', 15, 'Defective', 1),
	(129, 'SWC-PNKC-P-00110', 'APC 625 BACK UP UPS', '', '3B1425X28765', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'NO BATTERY', 15, 'Defective', 1),
	(130, 'SWC-PNKC-WS-00092', 'NA', '', '1710005112', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'CANT OPEN', 7, 'Disposed', 1),
	(131, 'SWC-PNKC-P-00093', 'SAMSUNG MONITOR', '', 'ZZQSH4THA00560K', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Need power cable', 7, 'Defective', 1),
	(132, 'SWC-PNKC-P-00103', 'NA', '', 'FBISNV003614', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Need power apadter', 13, 'Defective', 1),
	(133, 'SWC-PNKC-WS-00047', 'NA', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', '', 'working but hang', 9, 'Available', 1),
	(134, 'SWC-PNKC-P-00123', '24PORT SWITCH CNET', '', 'ADF1107000084', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'WORKING - (LUMA na Switch)', 11, 'Available', 1),
	(135, 'SWC-PNKC-P-00125', '8-port switch', '', '5.19E+14', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'WORKING - Spare', 11, 'Available', 1),
	(136, 'SWC-PNKC-P-00126', 'd-link switch 8port', '', 'F302398009445', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'obsolete ', 11, 'Disposed', 1),
	(137, 'SWC-PNKC-P-00127', 'd-link switch 8port', '', 'F3PW289050155', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'obsolete ', 11, 'Disposed', 1),
	(138, 'SWC-PNKC-S-00047', 'Synology', '', '1950R5RNN9G84', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'brand new', 4, 'Available', 1),
	(139, 'SWC-PNKC-P-00092', 'hanns g', '', '2098E3T01116', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'can\'t power ON', 7, 'Defective', 1),
	(140, 'SWC-PNKC-P-00144', 'HP', '', 'CNC0380TNY', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'need adapter', 7, 'Defective', 1),
	(141, 'SWC-PNKC-P-00129', 'MIKROTIK', '', '6D83060FDD16/637/r2', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'need to check if working', 13, 'Available', 1),
	(142, 'SWC-PNKC-P-00130', 'MIKROTIK', '', '6D8306444770/637/r2', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'need to check if working', 13, 'Available', 1),
	(143, 'SWC-PNKC-P-00131', 'ZKTeco k30', '', 'A8ME193660005', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'no physical adapter', 17, 'Defective', 1),
	(144, 'SWC-PNKC-P-00132', 'ASUS RT-N14UHP WIRELESS HIGH POWER ROUTER', '', 'F3ISNV001191', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'no antenna', 12, 'Available', 1),
	(145, 'SWC-PNKC-P-00151', 'Epson L360', '', '', '0', 'PNKC', '0000-00-00 00:00:00', '', '', 'no power', 8, 'Defective', 1),
	(146, 'SWC-PNKC-P-00152', 'Epson L220', '', '', '0', 'PNKC', '0000-00-00 00:00:00', '', '', 'blinking of on button, ink, paper', 8, 'Defective', 1),
	(147, 'SWC-PNKC-P-00050', 'Epson L120 ', '', 'TP3K372157', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 8, 'In use', 1),
	(148, 'SWC-PNKC-P-00060', 'Epson L1455', '', 'X2SK000981', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 8, 'In use', 1),
	(149, 'SWC-PNKC-P-00090', 'EPSON LX-310', '', 'Q7CY143828', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 8, 'In use', 1),
	(150, 'SWC-PNKC-P-00102', 'PROJECTOR - PANASONIC', '', 'DA6110175', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 14, 'Available', 1),
	(151, 'SWC-PNKC-P-00142', 'Mikrotik router board', '', '780F061EE95D/710', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 12, 'Available', 1),
	(152, 'SWC-PNKC-P-00067', 'Epson WF-C5790', '', 'X3BC005489', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 8, 'In use', 1),
	(153, 'SWC-PNKC-P-00143', 'TPLINK', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 11, 'In use', 1),
	(154, 'SWC-PNKC-P-00146', 'DLINK DES 1024D', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 11, 'In use', 1),
	(155, 'SWC-PNKC-P-00111', 'CISCO LINKSYS', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 11, 'In use', 1),
	(156, 'SWC-PNKC-P-00113', 'CISCO LINKSYS', '', 'na', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 11, 'In use', 1),
	(157, 'SWC-PNKC-AP-00081', 'TP LINK', '', '2.20E+12', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 13, 'In use', 1),
	(158, 'SWC-PNKC-AP-00076', 'RUIJIE', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 13, 'In use', 1),
	(159, 'SWC-PNKC-P-00112', 'RUIJIE', '', 'G1NW1A1011921', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 13, 'In use', 1),
	(160, 'SWC-PNKC-P-00118', 'Mikrotik ', '', '6D8306DCA / 6C / 637 / r2', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 13, 'In use', 1),
	(161, 'SWC-PNKC-P-00120', 'TPLINK', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 13, 'Available', 1),
	(162, 'SWC-PNKC-P-00121', 'TPLINK', '', 'NA', '0', 'NA', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 13, 'In use', 1),
	(163, 'SWC-PNKC-P-00082', 'CANON LIDE 220', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 10, 'In use', 1),
	(164, 'SWC-PNKC-P-00072', 'EPSON LX-310', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 8, 'In use', 1),
	(165, 'SWC-PNKC-P-00073', 'TOSHIBA E Studio 2802am', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 8, 'In use', 1),
	(166, 'SWC-PNKC-P-00089', 'EPSON LX-310', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 8, 'In use', 1),
	(167, 'SWC-PNKC-P-00079', 'SWITCH  D-LINK DGS 1016D', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 11, 'In use', 1),
	(168, 'SWC-PNKC-P-00099', 'epson L360', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 8, 'In use', 1),
	(169, 'SWC-PNKC-P-00101', 'epson L1455', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 8, 'In use', 1),
	(170, 'SWC-PNKC-P-00087', 'EPSON L220', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 8, 'In use', 1),
	(171, 'SWC-PNKC-P-00119', 'EPSON L360', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 8, 'In use', 1),
	(172, 'SWC-PNKC-P-00145', 'EPSON L3110', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 8, 'In use', 1),
	(173, 'SWC-PNKC-P-00095', 'HP laserJet Pro m12w', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'for checking / Power On - OKAY', 8, 'In use', 1),
	(174, 'SWC-PNKC-P-00096', 'HP laserJet Pro m102w', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'for checking / Power On - OKAY', 8, 'In use', 1),
	(175, 'SWC-PNKC-P-00124', 'HP laserJet Pro m102w', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'for checking / Power On - OKAY', 8, 'In use', 1),
	(176, 'SWC-PNKC-WS-00145', 'ASUS ', '', 'JBN0CX21D713480', '0', 'PNKC', '0000-00-00 00:00:00', 'WIN 10 ', 'MS office 2013', 'Working condition', 1, 'In use', 1),
	(177, 'SWC-PNKC-WS-00001', 'Intel Core 2 Duo 2.26ghz, 1Gb, MS OFFICE 2007', '', 'SGH9120B61', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'obsolete ', 1, 'Disposed', 1),
	(178, 'SWC-PNKC-P-00001', 'LCD MONITOR lenovo', '', 'U38WH631', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'for testing need adaptor ', 7, 'Spare of Device Available', 1),
	(179, 'SWC-PNKC-WS-00115', 'LENOVO', '', 'PF0WNQJ8', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'defective board, stuck on bios, no ram, ', 1, 'Disposed', 1),
	(180, 'SWC-PNKC-WS-00074', 'Lenovo-G4070-I5, Core I5, 4gb', '', 'YB018922724', '0', 'PNKC', '2015-04-25 00:00:00', 'NA', 'NA', 'no ram no hdd, (kinahoy na)', 1, 'Disposed', 1),
	(181, 'SWC-PNKC-P-00133', 'YHDAA', '', '5.10E+11', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'working - with 1 usb dongle', 10, 'Available', 1),
	(182, 'SWC-PNKC-P-00147', 'hanns g', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'working', 7, 'Available', 1),
	(183, 'SWC-PNKC-P-00148', 'UPS APC 625 ', '', 'NA', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working properly', 15, 'In use', 1),
	(184, 'SWC-PNKC-WS-00075', 'Acer Aspire', '', 'NXHF9SP0069320483A3400', '0', 'PNKC', '0000-00-00 00:00:00', 'windows 10 pro', 'office 2013', 'Working condition', 1, 'In use', 1),
	(185, 'SWC-PNKC-P-00149', 'LG 15 inches LCD', '', '101UXNU0B135', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 7, 'Available', 1),
	(186, 'SWC-PNKC-P-00150', 'Rasberry Pi generic touch screen monitor', '', '', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'Working condition', 17, 'In use', 1),
	(187, 'SWC-PNKC-WS-00173', 'Aero cool case / gigabyte motherboard X570 gaming ', '', 'NA', '87', 'PNKC', '2021-05-26 00:00:00', 'win 10 pro - license OS / product key - PVF9T-NPD4', 'MS OFFICE 2013', 'Working condition', 2, 'In use', 1),
	(188, 'SWC-PNKC-WS-00097', 'DELL inspiron 14 5000', '', 'DKDYY93', '61990', 'PNKC', '2021-02-06 00:00:00', 'win 10 pro - license OS / product key - MJHD8-TFNJ', 'MS OFFICE 2013 - not license', 'BRAND NEW', 1, 'In use', 1),
	(189, 'SWC-PNKC-WS-00158', 'DELL', '', '84FLF63', '47500', 'PNKC', '2021-06-24 00:00:00', 'win 10 por - license OS / product key - 339PB-6NCV', '', 'BRAND NEW', 1, 'In use', 1),
	(190, 'SWC-PNKC-P-00153', 'DLINK DES 1008A', '', 'R3UO1G9011421', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'WORKING CONDITION', 11, 'In use', 1),
	(191, 'SWC-PNKC-P-00154', 'ImageCLASS MF237w', '', 'WQS09535', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'WORKING CONDITION', 8, 'In use', 1),
	(192, 'SWC-PNKC-P-00083', 'HP', '', '6CM345016F', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'WORKING CONDITION', 7, 'Available', 1),
	(193, 'SWC-PNKC-P-00135', 'APC 650va LI-MS', '', '9B1941A04165', '2200', 'PNKC', '2021-07-27 00:00:00', 'NA', 'NA', 'WORKING CONDITION', 15, 'In use', 1),
	(194, 'SWC-PNKC-P-00134', 'APC BX1200MI-MS', '', '9B2123A01225', '10600', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'WORKING CONDITION', 15, 'In use', 1),
	(195, 'SWC-PNKC-P-00136', 'APC 650va LI-MS', '', '9B1941A04166', '0', 'PNKC', '0000-00-00 00:00:00', 'NA', 'NA', 'WORKING CONDITION', 15, 'In use', 1),
	(196, 'SWC-PNKC-WS-00112', 'ACER Travelmate ', '', 'NXVPNSP02X1280BEBE7600', '37500', 'PNKC', '2021-09-13 00:00:00', 'WIN 10 64 bit', 'NA', 'BRAND NEW', 1, 'In use', 1),
	(197, 'SWC-PNKC-P-00116', 'TPLINK ARCHER C54 AC 1200', '', '22120V9004190', '1350', 'PNKC', '2021-08-14 00:00:00', 'NA', 'NA', 'BRAND NEW', 12, 'In use', 1),
	(198, 'SWC-PNKC-P-00117', 'TPLINK ARCHER C54 AC 1200', '', '22120V9004188', '1350', 'PNKC', '2021-08-14 00:00:00', 'NA', 'NA', 'BRAND NEW', 12, 'In use', 1),
	(199, 'upd_asset_tag', '', '', '', '', '', '0000-00-00 00:00:00', '', '', '', 1, '', 1),
	(200, 'NA', 'NA', 'NA NA NA', 'NA', '100', 'SUKIKO', '2021-10-13 00:00:00', 'Windows 11', '2021', 'Good', 17, 'Available', 1),
	(201, 'NA2', 'NA2', '', 'NA2', '5000', 'SUKIKO', '1970-01-01 00:00:00', 'Windows 11', '2021', 'Good', 2, 'Available', 1),
	(202, 'NA2', 'NA2', 'NA2 NA2 NA2', 'NA2', '100', 'SUKIKO', '2021-10-13 00:00:00', 'Windows 11', '2021', 'Good', 2, 'Available', 1),
	(203, 'SAMPLE', 'Goods', 'GoodsGoodsGoodsGoods', 'Goods', '5000', 'GILI', '2021-10-13 00:00:00', 'Windows 11', '2021', 'Ready to use', 6, 'Available', 1);
/*!40000 ALTER TABLE `tbl_assets` ENABLE KEYS */;

-- Dumping structure for table itams.tbl_dept
CREATE TABLE IF NOT EXISTS `tbl_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(50) NOT NULL,
  `sbu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_dept_tbl_sbu` (`sbu_id`),
  CONSTRAINT `FK_tbl_dept_tbl_sbu` FOREIGN KEY (`sbu_id`) REFERENCES `tbl_sbu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table itams.tbl_dept: ~28 rows (approximately)
/*!40000 ALTER TABLE `tbl_dept` DISABLE KEYS */;
INSERT INTO `tbl_dept` (`id`, `dept_name`, `sbu_id`) VALUES
	(1, 'Engineering', 1),
	(2, 'Accounting', 1),
	(3, 'HR', 1),
	(4, 'IT', 1),
	(5, 'Engineering', 6),
	(6, 'Accounting', 6),
	(7, 'HR', 6),
	(8, 'IT', 6),
	(9, 'Engineering', 2),
	(10, 'Accounting', 2),
	(11, 'HR', 2),
	(12, 'IT', 2),
	(13, 'Engineering', 3),
	(14, 'Accounting', 3),
	(15, 'HR', 3),
	(16, 'IT', 3),
	(17, 'Engineering', 5),
	(18, 'Accounting', 5),
	(19, 'HR', 5),
	(20, 'IT', 5),
	(21, 'Engineering', 4),
	(22, 'Accounting', 4),
	(23, 'HR', 4),
	(24, 'IT', 4),
	(25, 'Engineering', 7),
	(26, 'Accounting', 7),
	(27, 'HR', 7),
	(28, 'IT', 7);
/*!40000 ALTER TABLE `tbl_dept` ENABLE KEYS */;

-- Dumping structure for table itams.tbl_employees
CREATE TABLE IF NOT EXISTS `tbl_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mid_initial` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `password_1` varchar(50) NOT NULL,
  `password_2` varchar(50) NOT NULL,
  `sbu_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sbu_id` (`sbu_id`),
  KEY `dept_id` (`dept_id`),
  KEY `FK_tbl_employees_tbl_users` (`user_type`),
  CONSTRAINT `FK_tbl_employees_tbl_dept` FOREIGN KEY (`dept_id`) REFERENCES `tbl_dept` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tbl_employees_tbl_sbu` FOREIGN KEY (`sbu_id`) REFERENCES `tbl_sbu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tbl_employees_tbl_users` FOREIGN KEY (`user_type`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table itams.tbl_employees: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_employees` DISABLE KEYS */;
INSERT INTO `tbl_employees` (`id`, `employee_id`, `first_name`, `last_name`, `mid_initial`, `email`, `user_name`, `position`, `password_1`, `password_2`, `sbu_id`, `dept_id`, `user_type`) VALUES
	(1, 'AA20210001', 'Admin', 'Biboi', 'A', 'Admin@gmail.com', 'admin123', 'IT', '123123', '123123', 7, 4, 2),
	(2, 'HB20210002', 'hotdag', 'Babaw', 'g', 'qweqwe', 'qweqwe', 'IT', '123123', '123123', 1, 1, 2),
	(3, 'VE20210003', 'venson', 'estrope', 'V', 'venson@gmail.com', 'venson', 'IT', '123', '123', 1, 4, 2);
/*!40000 ALTER TABLE `tbl_employees` ENABLE KEYS */;

-- Dumping structure for table itams.tbl_item
CREATE TABLE IF NOT EXISTS `tbl_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(50) NOT NULL DEFAULT '',
  `type_of_item` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table itams.tbl_item: ~17 rows (approximately)
/*!40000 ALTER TABLE `tbl_item` DISABLE KEYS */;
INSERT INTO `tbl_item` (`id`, `itemname`, `type_of_item`) VALUES
	(1, 'Laptop', 0),
	(2, 'Desktop', 0),
	(3, 'NUC', 0),
	(4, 'Server', 0),
	(5, 'Tablet', 0),
	(6, 'Netbook', 0),
	(7, 'Monitor', 1),
	(8, 'Printer', 1),
	(9, 'Mobile phone', 1),
	(10, 'Scanner', 1),
	(11, 'Switch', 1),
	(12, 'Router', 1),
	(13, 'Access Point', 1),
	(14, 'Projector', 1),
	(15, 'UPS', 1),
	(16, 'AP Extender', 1),
	(17, 'Time keeping', 1);
/*!40000 ALTER TABLE `tbl_item` ENABLE KEYS */;

-- Dumping structure for table itams.tbl_records
CREATE TABLE IF NOT EXISTS `tbl_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` datetime NOT NULL,
  `asset_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `emp_fname` varchar(255) NOT NULL,
  `emp_lname` varchar(255) NOT NULL,
  `emp_sbu` varchar(50) NOT NULL,
  `emp_position` varchar(50) NOT NULL,
  `asset_tag` varchar(50) NOT NULL,
  `asset_name` varchar(50) NOT NULL,
  `asset_descriptions` varchar(255) NOT NULL,
  `asset_type_of` varchar(50) NOT NULL,
  `asset_serial_no` varchar(50) NOT NULL,
  `asset_status` varchar(50) NOT NULL,
  `asset_remarks` varchar(255) NOT NULL,
  `record_status` int(11) NOT NULL,
  `acc_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_records_tbl_assets` (`asset_id`),
  KEY `FK_tbl_records_tbl_employees` (`emp_id`),
  CONSTRAINT `FK_tbl_records_tbl_assets` FOREIGN KEY (`asset_id`) REFERENCES `tbl_assets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tbl_records_tbl_employees` FOREIGN KEY (`emp_id`) REFERENCES `tbl_employees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table itams.tbl_records: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_records` DISABLE KEYS */;
INSERT INTO `tbl_records` (`id`, `date_created`, `asset_id`, `emp_id`, `location`, `emp_fname`, `emp_lname`, `emp_sbu`, `emp_position`, `asset_tag`, `asset_name`, `asset_descriptions`, `asset_type_of`, `asset_serial_no`, `asset_status`, `asset_remarks`, `record_status`, `acc_status`) VALUES
	(1, '2021-10-01 00:00:00', 161, 1, 'dad', 'Admin', 'Admin', '7', 'admin123', 'SWC-PNKC-P-00120', 'TPLINK', '', '13', 'NA', 'Available', 'Working condition', 1, 1),
	(2, '2021-10-13 00:00:00', 201, 1, 'Room 704', 'Admin', 'Admin', '7', 'admin123', 'NA2', 'NA2', 'NA2 NA2 NA2', '2', 'NA2', 'Available', 'Good', 1, 1),
	(3, '2021-10-13 00:00:00', 202, 1, '21', 'Admin', 'Admin', '7', 'NA2', 'NA2', 'NA2', 'NA2 NA2 NA2', '2', 'NA2', 'Available', 'NA2', 1, 1),
	(4, '2021-10-13 00:00:00', 200, 1, 'Room 708', 'Admin', 'Admin', '7', 'admin123', 'NA', 'NA', 'NA NA NA', 'Time keeping', 'NA', 'Available', 'Good', 1, 1);
/*!40000 ALTER TABLE `tbl_records` ENABLE KEYS */;

-- Dumping structure for table itams.tbl_return
CREATE TABLE IF NOT EXISTS `tbl_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `return_date` datetime NOT NULL,
  `record_id` int(11) NOT NULL,
  `collected_by` varchar(255) NOT NULL,
  `asset_remarks` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_return_tbl_records` (`record_id`),
  CONSTRAINT `FK_tbl_return_tbl_records` FOREIGN KEY (`record_id`) REFERENCES `tbl_records` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table itams.tbl_return: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_return` DISABLE KEYS */;
INSERT INTO `tbl_return` (`id`, `return_date`, `record_id`, `collected_by`, `asset_remarks`, `note`) VALUES
	(1, '2021-10-01 09:02:58', 1, 'Jay-ar Revis', 'Available', 'Good'),
	(2, '2021-10-13 15:07:15', 4, 'Jay-ar Revis', 'Available', 'Goods'),
	(3, '2021-10-13 15:07:23', 3, 'Jay-ar Revis', 'Available', 'Goods'),
	(4, '2021-10-13 15:07:30', 2, 'Venson', 'Available', 'Goods'),
	(5, '2021-10-13 15:07:37', 1, 'Goods', 'Available', 'Goods');
/*!40000 ALTER TABLE `tbl_return` ENABLE KEYS */;

-- Dumping structure for table itams.tbl_sbu
CREATE TABLE IF NOT EXISTS `tbl_sbu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sbu_name` varchar(50) NOT NULL DEFAULT '',
  `sbu_means` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table itams.tbl_sbu: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_sbu` DISABLE KEYS */;
INSERT INTO `tbl_sbu` (`id`, `sbu_name`, `sbu_means`) VALUES
	(1, 'AIC', 'AURA INTEGRATORS CORPORATION'),
	(2, 'EXERGY', 'EXERGY PHILIPPINES CORPORATION'),
	(3, 'GILI', 'GLACIER INTEGRATED LOGISTICS INC.'),
	(4, 'PNKC', 'PHIL NIPPON KYOEI CORPORATION'),
	(5, 'MANNVITS', 'MANNVITS CORPORATION'),
	(6, 'CLDI', 'CLDI'),
	(7, 'SUKIKO', 'SUKIKO'),
	(8, 'NA', 'NA');
/*!40000 ALTER TABLE `tbl_sbu` ENABLE KEYS */;

-- Dumping structure for table itams.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL,
  `user_legend` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table itams.tbl_users: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`id`, `user_legend`) VALUES
	(0, 'Superadmin'),
	(1, 'Admin'),
	(2, 'User');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

-- Dumping structure for procedure itams.update_asset
DELIMITER //
CREATE PROCEDURE `update_asset`(
in `upd_id` VARCHAR(200),
in `upd_asset_tag` VARCHAR(200),
in `upd_asset_name` VARCHAR(200),
in `upd_descriptions` VARCHAR(200),
in `upd_serial_no` VARCHAR(200),
in `upd_price` VARCHAR(200),
in `upd_sbu` VARCHAR(200),
in `upd_date_purchase` VARCHAR(200),
in `upd_installed_os` VARCHAR(200),
in `upd_ms_office` VARCHAR(200),
in `upd_remarks` VARCHAR(200),
in `upd_type_of` VARCHAR(200),
in `upd_status` VARCHAR(200)
)
BEGIN
	UPDATE itams.tbl_assets as assets 
    SET 
    assets.asset_tag = upd_asset_tag, 
    assets.asset_name = upd_asset_name,
    assets.descriptions = upd_descriptions,
    assets.serial_no = upd_serial_no, 
    assets.price = upd_price, 
    assets.sbu = upd_sbu, 
    assets.date_purchase = upd_date_purchase, 
    assets.installed_os = upd_installed_os, 
    assets.ms_office = upd_ms_office, 
    assets.remarks = upd_remarks, 
    assets.type_of = upd_type_of,
    assets.status = upd_status
    WHERE assets.id = upd_id;
END//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
