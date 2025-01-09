/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : wdrms

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-07-09 18:26:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for added_system_privilage
-- ----------------------------
DROP TABLE IF EXISTS `added_system_privilage`;
CREATE TABLE `added_system_privilage` (
  `prv_user_id` int(5) NOT NULL,
  `prv_added_id` int(5) NOT NULL,
  `prv_main_id` int(5) NOT NULL,
  KEY `prv_user_id` (`prv_user_id`),
  KEY `prv_added_id` (`prv_added_id`),
  CONSTRAINT `added_system_privilage_ibfk_1` FOREIGN KEY (`prv_user_id`) REFERENCES `user_register` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `added_system_privilage_ibfk_2` FOREIGN KEY (`prv_added_id`) REFERENCES `system_privilages` (`prv_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of added_system_privilage
-- ----------------------------
INSERT INTO `added_system_privilage` VALUES ('1', '102', '100');
INSERT INTO `added_system_privilage` VALUES ('2', '201', '200');
INSERT INTO `added_system_privilage` VALUES ('2', '202', '200');
INSERT INTO `added_system_privilage` VALUES ('2', '203', '200');
INSERT INTO `added_system_privilage` VALUES ('3', '201', '200');
INSERT INTO `added_system_privilage` VALUES ('3', '203', '200');
INSERT INTO `added_system_privilage` VALUES ('3', '204', '200');
INSERT INTO `added_system_privilage` VALUES ('4', '202', '200');
INSERT INTO `added_system_privilage` VALUES ('4', '101', '100');
INSERT INTO `added_system_privilage` VALUES ('4', '102', '100');
INSERT INTO `added_system_privilage` VALUES ('4', '203', '200');
INSERT INTO `added_system_privilage` VALUES ('4', '204', '200');
INSERT INTO `added_system_privilage` VALUES ('1', '101', '100');
INSERT INTO `added_system_privilage` VALUES ('4', '201', '200');
INSERT INTO `added_system_privilage` VALUES ('4', '301', '300');
INSERT INTO `added_system_privilage` VALUES ('4', '302', '300');
INSERT INTO `added_system_privilage` VALUES ('4', '401', '400');
INSERT INTO `added_system_privilage` VALUES ('4', '402', '400');
INSERT INTO `added_system_privilage` VALUES ('4', '501', '500');
INSERT INTO `added_system_privilage` VALUES ('4', '502', '500');
INSERT INTO `added_system_privilage` VALUES ('4', '601', '600');
INSERT INTO `added_system_privilage` VALUES ('4', '701', '700');
INSERT INTO `added_system_privilage` VALUES ('4', '702', '700');
INSERT INTO `added_system_privilage` VALUES ('4', '703', '700');
INSERT INTO `added_system_privilage` VALUES ('4', '704', '700');
INSERT INTO `added_system_privilage` VALUES ('4', '705', '700');
INSERT INTO `added_system_privilage` VALUES ('4', '706', '700');
INSERT INTO `added_system_privilage` VALUES ('4', '707', '700');
INSERT INTO `added_system_privilage` VALUES ('4', '708', '700');
INSERT INTO `added_system_privilage` VALUES ('4', '709', '200');
INSERT INTO `added_system_privilage` VALUES ('4', '800', '800');
INSERT INTO `added_system_privilage` VALUES ('4', '801', '800');
INSERT INTO `added_system_privilage` VALUES ('4', '802', '800');
INSERT INTO `added_system_privilage` VALUES ('4', '803', '800');
INSERT INTO `added_system_privilage` VALUES ('4', '804', '800');
INSERT INTO `added_system_privilage` VALUES ('4', '805', '800');
INSERT INTO `added_system_privilage` VALUES ('1', '201', '200');
INSERT INTO `added_system_privilage` VALUES ('1', '202', '200');
INSERT INTO `added_system_privilage` VALUES ('1', '203', '200');
INSERT INTO `added_system_privilage` VALUES ('1', '204', '200');
INSERT INTO `added_system_privilage` VALUES ('1', '301', '300');
INSERT INTO `added_system_privilage` VALUES ('1', '302', '300');
INSERT INTO `added_system_privilage` VALUES ('1', '401', '400');
INSERT INTO `added_system_privilage` VALUES ('1', '402', '400');
INSERT INTO `added_system_privilage` VALUES ('1', '501', '500');
INSERT INTO `added_system_privilage` VALUES ('1', '502', '500');
INSERT INTO `added_system_privilage` VALUES ('1', '601', '600');
INSERT INTO `added_system_privilage` VALUES ('1', '701', '700');
INSERT INTO `added_system_privilage` VALUES ('1', '702', '700');
INSERT INTO `added_system_privilage` VALUES ('1', '703', '700');
INSERT INTO `added_system_privilage` VALUES ('1', '704', '700');
INSERT INTO `added_system_privilage` VALUES ('1', '705', '700');
INSERT INTO `added_system_privilage` VALUES ('1', '706', '700');
INSERT INTO `added_system_privilage` VALUES ('1', '707', '700');
INSERT INTO `added_system_privilage` VALUES ('1', '708', '700');
INSERT INTO `added_system_privilage` VALUES ('1', '709', '200');
INSERT INTO `added_system_privilage` VALUES ('1', '800', '800');
INSERT INTO `added_system_privilage` VALUES ('1', '801', '800');
INSERT INTO `added_system_privilage` VALUES ('1', '802', '800');
INSERT INTO `added_system_privilage` VALUES ('1', '803', '800');
INSERT INTO `added_system_privilage` VALUES ('1', '804', '800');
INSERT INTO `added_system_privilage` VALUES ('1', '805', '800');
INSERT INTO `added_system_privilage` VALUES ('1', '806', '800');
INSERT INTO `added_system_privilage` VALUES ('1', '807', '800');
INSERT INTO `added_system_privilage` VALUES ('1', '808', '800');
INSERT INTO `added_system_privilage` VALUES ('1', '902', '900');
INSERT INTO `added_system_privilage` VALUES ('1', '901', '900');

-- ----------------------------
-- Table structure for customer_details
-- ----------------------------
DROP TABLE IF EXISTS `customer_details`;
CREATE TABLE `customer_details` (
  `cus_id` int(6) NOT NULL AUTO_INCREMENT,
  `cus_regi_no` varchar(10) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_gender` varchar(100) NOT NULL,
  `cus_nic` varchar(12) DEFAULT NULL,
  `cus_email` varchar(255) NOT NULL,
  `cus_contact` varchar(15) NOT NULL,
  `cus_address` varchar(255) DEFAULT NULL,
  `cus_status` int(155) NOT NULL DEFAULT 1,
  `cus_regi_date` datetime DEFAULT current_timestamp(),
  `cus_login_code` varchar(255) NOT NULL,
  PRIMARY KEY (`cus_id`),
  UNIQUE KEY `cus_contact` (`cus_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_details
-- ----------------------------
INSERT INTO `customer_details` VALUES ('9', 'C00001', 'Nayoma Perera', 'Female', '967878687V', 'nayoma@gmail.com', '0778789789', 'Karandupana, Kegalle.', '1', '2023-02-22 17:05:34', '');
INSERT INTO `customer_details` VALUES ('11', 'C00002', 'k', '', '', '', '', '', '0', '2023-02-24 12:12:03', '');
INSERT INTO `customer_details` VALUES ('15', 'C00003', 'Ashen Silva', 'Male', '912345676V', 'ashen@gmail.com', '0778987876', 'Uthuwankanda, Mawanella.', '1', '2023-03-30 07:32:01', '');
INSERT INTO `customer_details` VALUES ('16', 'C00004', 'Sarath Gamage', 'Male', '887867576V', 'sarath@gmail.com', '0773453432', 'Udawatta, Mawanella.', '0', '2023-03-30 07:33:08', '');
INSERT INTO `customer_details` VALUES ('28', 'C0028', 'Aruni', 'Female', '999999999V', 'aruni@gmail.com', '0769778780', 'kegalle', '1', '2023-06-25 15:41:27', '5d8073d2a20d813e42279d39fc9f129405defb7d');
INSERT INTO `customer_details` VALUES ('29', 'C0029', 'anura', 'Male', '989898756V', 'anu@gmail.com', '0715183116', 'kegll', '1', '2023-06-28 09:38:56', '17789b5f21dc8e9082026b08addb8a2b99f066ac');
INSERT INTO `customer_details` VALUES ('31', 'C0030', 'ami', 'Female', '978978798V', 'am@gmail.com', '0715183111', 'kgl', '1', '2023-06-28 09:49:23', '29856aa486526408e763fe10f6b67b0ceaf811e8');
INSERT INTO `customer_details` VALUES ('33', 'C0033', 'As', 'Male', '444444444444', 'dgmail.com', '4333333333', 'd', '0', '2023-07-01 06:50:51', 'bff0fb42d9c5437a4c17eaf8f30b4998cde0bfc1');
INSERT INTO `customer_details` VALUES ('34', 'C0034', 'Adf', 'Male', '111111111333', 'adm@gmail.com', '0769778785', 'dw', '0', '2023-07-01 07:03:09', 'f122634de99bd85faa073635a9431736b66634f7');

-- ----------------------------
-- Table structure for customer_request_payment_details
-- ----------------------------
DROP TABLE IF EXISTS `customer_request_payment_details`;
CREATE TABLE `customer_request_payment_details` (
  `cus_req_pay_id` int(10) NOT NULL AUTO_INCREMENT,
  `cus_req_no` varchar(10) NOT NULL,
  `cus_req_inv_no` varchar(10) NOT NULL,
  `cus_req_total` decimal(15,2) DEFAULT NULL,
  `cus_req_advance` decimal(15,2) DEFAULT NULL,
  `cus_req_balance` decimal(15,2) DEFAULT NULL,
  `cus_req_added_date_time` datetime DEFAULT current_timestamp(),
  `cus_req_inv_added_user` int(5) DEFAULT NULL,
  `cus_req_status` int(2) DEFAULT 0 COMMENT '0=not completed, 1=payment completed',
  `cus_req_issued_date` datetime DEFAULT NULL,
  `cus_req_note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cus_req_pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_request_payment_details
-- ----------------------------
INSERT INTO `customer_request_payment_details` VALUES ('20', 'CR001', '', '5000.00', '2000.00', '3000.00', '2023-07-09 10:51:46', '1', '0', null, 'ertertr');
INSERT INTO `customer_request_payment_details` VALUES ('21', 'CR0010', '', '3500.00', '100.00', '3400.00', '2023-07-09 11:15:27', '1', '0', null, 'er');

-- ----------------------------
-- Table structure for custom_request_details
-- ----------------------------
DROP TABLE IF EXISTS `custom_request_details`;
CREATE TABLE `custom_request_details` (
  `cus_req_id` int(10) NOT NULL AUTO_INCREMENT,
  `cus_req_no` varchar(10) NOT NULL,
  `cus_req_nic` varchar(15) NOT NULL,
  `cus_phone` varchar(10) NOT NULL,
  `cus_req_note` varchar(255) NOT NULL,
  `cus_req_photo` varchar(255) NOT NULL,
  `cus_req_required_date` date DEFAULT current_timestamp(),
  `cus_req_added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `cus_req_status` int(2) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=cus contact, 2=confirm, 3=cancel, 4=finished, 10 = pending to_assing_tailor',
  `cus_req_complete_status` int(2) DEFAULT 0 COMMENT '0=pending, 1=sent sms',
  PRIMARY KEY (`cus_req_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of custom_request_details
-- ----------------------------
INSERT INTO `custom_request_details` VALUES ('1', 'CR001', '999999999V', '0787987889', 'request', 'CR001.jpg', '2023-07-03', '2023-06-29 07:14:17', '2', '0');
INSERT INTO `custom_request_details` VALUES ('2', 'CR002', '978978798V', '0715183111', 'req bdftbgtbhrgthbtrfhbrfghnbtfngfgtkk kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk kkkkkkkkkkkkk', 'CR002.jpg', '2023-07-03', '2023-06-29 07:15:58', '0', '0');
INSERT INTO `custom_request_details` VALUES ('3', 'CR003', '989898756V', '0715183116', 'reqs', 'CR003.jpg', '2023-07-03', '2023-06-29 07:18:33', '0', '0');
INSERT INTO `custom_request_details` VALUES ('4', 'CR004', '999999999V', '0787987889', 'o', 'CR004.jpg', '2023-07-03', '2023-06-30 07:11:15', '0', '0');
INSERT INTO `custom_request_details` VALUES ('5', 'CR005', '999999999V', '0787987889', 'vtf', 'CR005.jpg', '2023-07-07', '2023-07-03 23:25:10', '0', '0');
INSERT INTO `custom_request_details` VALUES ('6', 'CR006', '999999999V', '0769778780', 'sfcdsgv bhhhhhhhhhhhhhhhhhhhhhhhhhhh\nllllllllllllllllllllllllll kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'CR006.jpg', '2023-07-07', '2023-07-03 23:26:24', '0', '1');
INSERT INTO `custom_request_details` VALUES ('7', 'CR007', '999999999V', '0787987889', 'pending', 'CR007.jpg', '2023-07-04', '2023-07-06 17:44:12', '0', '0');
INSERT INTO `custom_request_details` VALUES ('8', 'CR008', '999999999V', '0787987889', 'tgvuy', 'CR008.jpg', '2023-07-26', '2023-07-06 17:45:33', '0', '0');
INSERT INTO `custom_request_details` VALUES ('9', 'CR009', '999999999V', '0769778780', 'uj87', 'CR009.jpg', '2023-07-24', '2023-07-06 17:58:08', '0', '0');
INSERT INTO `custom_request_details` VALUES ('10', 'CR0010', '999999999V', '0769778780', 'add', 'CR0010.jpg', '2023-07-10', '2023-07-09 09:38:40', '2', '0');

-- ----------------------------
-- Table structure for damage_item_details
-- ----------------------------
DROP TABLE IF EXISTS `damage_item_details`;
CREATE TABLE `damage_item_details` (
  `dmg_tbl_id` int(10) NOT NULL AUTO_INCREMENT,
  `dmg_item_id` int(10) NOT NULL,
  `dmg_itm_note` varchar(200) DEFAULT NULL,
  `dmg_itm_qty` int(10) NOT NULL,
  `dmg_itm_added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `dmg_itm_added_user` int(2) NOT NULL,
  `dmg_itm_status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`dmg_tbl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of damage_item_details
-- ----------------------------
INSERT INTO `damage_item_details` VALUES ('1', '3', 'removed', '1', '2023-04-19 11:04:48', '4', '1');
INSERT INTO `damage_item_details` VALUES ('2', '3', '', '1', '2023-04-19 11:13:58', '4', '1');
INSERT INTO `damage_item_details` VALUES ('3', '3', 'test', '2', '2023-04-19 11:31:23', '4', '1');
INSERT INTO `damage_item_details` VALUES ('4', '4', 'test 2', '1', '2023-04-19 11:33:16', '4', '1');
INSERT INTO `damage_item_details` VALUES ('5', '4', 'By Cashier', '1', '2023-05-30 16:04:37', '4', '1');
INSERT INTO `damage_item_details` VALUES ('6', '7', 'By Cashier', '1', '2023-05-30 16:04:37', '4', '1');
INSERT INTO `damage_item_details` VALUES ('7', '3', 'By Cashier', '1', '2023-05-30 16:08:05', '4', '1');
INSERT INTO `damage_item_details` VALUES ('8', '7', 'By Cashier', '1', '2023-05-30 16:08:05', '4', '1');

-- ----------------------------
-- Table structure for design_details
-- ----------------------------
DROP TABLE IF EXISTS `design_details`;
CREATE TABLE `design_details` (
  `design_id` int(10) NOT NULL AUTO_INCREMENT,
  `design_name` varchar(100) NOT NULL,
  `fabric_id` int(10) NOT NULL,
  `design_status` int(2) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  PRIMARY KEY (`design_id`),
  KEY `fabric_id` (`fabric_id`),
  CONSTRAINT `design_details_ibfk_1` FOREIGN KEY (`fabric_id`) REFERENCES `fabric_details` (`fabric_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of design_details
-- ----------------------------
INSERT INTO `design_details` VALUES ('1', 'Floral', '1', '1');
INSERT INTO `design_details` VALUES ('2', 'Diamond', '1', '1');
INSERT INTO `design_details` VALUES ('3', 'Plain', '1', '1');
INSERT INTO `design_details` VALUES ('4', 'Embroidered', '3', '1');
INSERT INTO `design_details` VALUES ('5', 'Heavy border', '3', '1');
INSERT INTO `design_details` VALUES ('6', 'plain', '4', '1');
INSERT INTO `design_details` VALUES ('7', 'Long Sleeve', '4', '1');
INSERT INTO `design_details` VALUES ('8', 'Short Sleeve', '4', '1');
INSERT INTO `design_details` VALUES ('9', 'Striped', '14', '1');
INSERT INTO `design_details` VALUES ('10', 'Shiny Long Sleeve', '5', '1');
INSERT INTO `design_details` VALUES ('11', 'Shiny Short Sleeve', '5', '1');
INSERT INTO `design_details` VALUES ('12', 'Floral Short Sleeve', '6', '1');
INSERT INTO `design_details` VALUES ('13', 'Floral Long Sleeve', '6', '1');
INSERT INTO `design_details` VALUES ('14', 'Plain', '8', '1');
INSERT INTO `design_details` VALUES ('15', 'Plain', '9', '1');
INSERT INTO `design_details` VALUES ('16', 'Plain', '10', '1');
INSERT INTO `design_details` VALUES ('17', 'Plain Pink Scarf', '9', '1');
INSERT INTO `design_details` VALUES ('18', 'Plain Brown Scarf', '9', '1');
INSERT INTO `design_details` VALUES ('19', 'Plain ', '11', '1');
INSERT INTO `design_details` VALUES ('20', 'Plain ', '12', '1');
INSERT INTO `design_details` VALUES ('21', 'Plain ', '13', '1');
INSERT INTO `design_details` VALUES ('22', 'Striped', '11', '1');
INSERT INTO `design_details` VALUES ('23', 'Plain', '2', '1');
INSERT INTO `design_details` VALUES ('24', 'Floral', '2', '1');
INSERT INTO `design_details` VALUES ('25', 'Plain', '14', '1');
INSERT INTO `design_details` VALUES ('27', 'Stripped', '1', '1');
INSERT INTO `design_details` VALUES ('28', 'Long Sleeve', '6', '1');
INSERT INTO `design_details` VALUES ('29', 'Bordered', '1', '1');
INSERT INTO `design_details` VALUES ('30', 'Sequin', '2', '1');
INSERT INTO `design_details` VALUES ('31', 'Plain', '3', '1');
INSERT INTO `design_details` VALUES ('32', 'Plain', '25', '1');

-- ----------------------------
-- Table structure for fabric_details
-- ----------------------------
DROP TABLE IF EXISTS `fabric_details`;
CREATE TABLE `fabric_details` (
  `fabric_id` int(10) NOT NULL AUTO_INCREMENT,
  `fabric_name` varchar(100) NOT NULL,
  `category_id` int(10) NOT NULL,
  `fabric_status` int(2) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  PRIMARY KEY (`fabric_id`),
  UNIQUE KEY `category_id` (`category_id`,`fabric_name`) USING BTREE,
  CONSTRAINT `fabric_details_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `item_category_details` (`cat_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fabric_details
-- ----------------------------
INSERT INTO `fabric_details` VALUES ('1', 'Cotton', '1', '1');
INSERT INTO `fabric_details` VALUES ('2', 'Silk', '1', '1');
INSERT INTO `fabric_details` VALUES ('3', 'Rayon', '1', '1');
INSERT INTO `fabric_details` VALUES ('4', 'Cotton', '2', '1');
INSERT INTO `fabric_details` VALUES ('5', 'Silk', '2', '1');
INSERT INTO `fabric_details` VALUES ('6', 'Cotton', '3', '1');
INSERT INTO `fabric_details` VALUES ('7', 'Silk', '3', '0');
INSERT INTO `fabric_details` VALUES ('8', 'Rayon', '3', '1');
INSERT INTO `fabric_details` VALUES ('9', 'Cotton', '4', '1');
INSERT INTO `fabric_details` VALUES ('10', 'Silk', '4', '1');
INSERT INTO `fabric_details` VALUES ('11', 'Cotton', '5', '1');
INSERT INTO `fabric_details` VALUES ('12', 'Silk', '5', '1');
INSERT INTO `fabric_details` VALUES ('13', 'Linen', '5', '1');
INSERT INTO `fabric_details` VALUES ('14', 'Linen', '2', '1');
INSERT INTO `fabric_details` VALUES ('25', 'Rayon', '5', '1');

-- ----------------------------
-- Table structure for grn_details
-- ----------------------------
DROP TABLE IF EXISTS `grn_details`;
CREATE TABLE `grn_details` (
  `grn_table_id` int(15) NOT NULL AUTO_INCREMENT,
  `grn_no` varchar(15) NOT NULL,
  `grn_date` date DEFAULT NULL,
  `sup_id` int(10) NOT NULL,
  `total_amount` decimal(50,2) NOT NULL,
  `paid_amount` decimal(50,2) NOT NULL,
  `balance_amount` decimal(50,2) NOT NULL,
  `grn_added_user` int(5) NOT NULL,
  `grn_added_date_time` datetime DEFAULT current_timestamp(),
  `grn_status` int(2) DEFAULT 1 COMMENT '1=active, 0=inactive',
  PRIMARY KEY (`grn_table_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of grn_details
-- ----------------------------
INSERT INTO `grn_details` VALUES ('1', 'G00001', '2023-06-16', '1', '44000.00', '0.00', '44000.00', '1', '2023-06-16 15:30:21', '1');
INSERT INTO `grn_details` VALUES ('2', 'G00002', '2023-06-16', '2', '36200.00', '0.00', '36200.00', '1', '2023-06-16 15:32:38', '1');
INSERT INTO `grn_details` VALUES ('3', 'G00003', '2023-06-16', '3', '40750.00', '0.00', '40750.00', '1', '2023-06-16 16:04:43', '1');
INSERT INTO `grn_details` VALUES ('4', 'G00004', '2023-06-16', '4', '11600.00', '0.00', '11600.00', '1', '2023-06-16 16:06:19', '1');

-- ----------------------------
-- Table structure for grn_item_details
-- ----------------------------
DROP TABLE IF EXISTS `grn_item_details`;
CREATE TABLE `grn_item_details` (
  `grn_itm_tbl_id` int(10) NOT NULL AUTO_INCREMENT,
  `grn_no` varchar(15) DEFAULT '',
  `item_id` int(5) NOT NULL,
  `total_qty` int(5) NOT NULL,
  `unit_price` decimal(15,2) NOT NULL,
  `rent_price` decimal(15,2) NOT NULL,
  `last_update_user` int(2) NOT NULL,
  `last_update_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1 COMMENT '1=active, 0=in_active',
  PRIMARY KEY (`grn_itm_tbl_id`),
  UNIQUE KEY `grn_no` (`grn_no`,`item_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `grn_item_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item_details` (`item_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of grn_item_details
-- ----------------------------
INSERT INTO `grn_item_details` VALUES ('1', 'G00001', '1', '5', '4300.00', '0.00', '1', '2023-06-16 15:29:36', '1');
INSERT INTO `grn_item_details` VALUES ('2', 'G00001', '14', '5', '4500.00', '0.00', '1', '2023-06-16 15:30:17', '1');
INSERT INTO `grn_item_details` VALUES ('3', 'G00002', '8', '6', '3200.00', '0.00', '1', '2023-06-16 15:32:15', '1');
INSERT INTO `grn_item_details` VALUES ('4', 'G00002', '9', '5', '3400.00', '0.00', '1', '2023-06-16 15:32:35', '1');
INSERT INTO `grn_item_details` VALUES ('5', 'G00003', '16', '6', '3750.00', '0.00', '1', '2023-06-16 16:04:14', '1');
INSERT INTO `grn_item_details` VALUES ('6', 'G00003', '18', '5', '3650.00', '0.00', '1', '2023-06-16 16:04:38', '1');
INSERT INTO `grn_item_details` VALUES ('7', 'G00004', '22', '4', '1450.00', '0.00', '1', '2023-06-16 16:05:58', '1');
INSERT INTO `grn_item_details` VALUES ('9', 'G00004', '23', '4', '1450.00', '0.00', '1', '2023-06-16 16:06:16', '1');
INSERT INTO `grn_item_details` VALUES ('10', 'G00005', '1', '5', '1500.00', '0.00', '1', '2023-07-05 06:15:29', '1');
INSERT INTO `grn_item_details` VALUES ('12', 'G00005', '2', '3', '1.00', '0.00', '1', '2023-07-08 14:48:42', '1');
INSERT INTO `grn_item_details` VALUES ('14', 'G00005', '14', '1', '0.00', '0.00', '1', '2023-07-08 15:00:10', '1');
INSERT INTO `grn_item_details` VALUES ('15', 'G00005', '8', '0', '0.00', '0.00', '1', '2023-07-08 15:03:15', '1');

-- ----------------------------
-- Table structure for invoice_details
-- ----------------------------
DROP TABLE IF EXISTS `invoice_details`;
CREATE TABLE `invoice_details` (
  `inv_tbl_id` int(10) NOT NULL AUTO_INCREMENT,
  `inv_no` varchar(10) NOT NULL,
  `inv_cus_id` int(5) NOT NULL,
  `inv_amount` decimal(15,2) NOT NULL,
  `inv_paid_amt` decimal(15,2) NOT NULL,
  `inv_balance_amt` decimal(15,2) NOT NULL,
  `inv_discount_amt` decimal(15,2) NOT NULL,
  `inv_added_user` int(2) NOT NULL,
  `inv_added_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `inv_status` int(2) NOT NULL DEFAULT 1 COMMENT '1 = active, 2 = closed',
  `inv_remind_status` int(2) NOT NULL DEFAULT 0 COMMENT '0= not sent, 1= sent',
  `inv_issue_date` date DEFAULT NULL,
  `inv_return_date` date DEFAULT NULL,
  `inv_fine_reminder` int(2) DEFAULT 0,
  PRIMARY KEY (`inv_tbl_id`),
  KEY `inv_no` (`inv_no`),
  KEY `inv_cus_id` (`inv_cus_id`),
  KEY `inv_added_user` (`inv_added_user`),
  CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`inv_cus_id`) REFERENCES `customer_details` (`cus_id`) ON UPDATE CASCADE,
  CONSTRAINT `invoice_details_ibfk_2` FOREIGN KEY (`inv_added_user`) REFERENCES `user_register` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of invoice_details
-- ----------------------------
INSERT INTO `invoice_details` VALUES ('1', 'INV0001', '11', '7800.00', '8150.00', '-350.00', '0.00', '1', '2023-06-28 10:21:12', '2', '1', '2023-06-28', '2023-06-27', '1');
INSERT INTO `invoice_details` VALUES ('2', 'INV0002', '9', '2500.00', '2000.00', '500.00', '0.00', '1', '2023-07-05 07:27:28', '1', '1', '2023-07-05', '2023-07-12', '0');
INSERT INTO `invoice_details` VALUES ('3', 'INV0003', '9', '0.00', '2500.00', '-2500.00', '0.00', '1', '2023-07-07 04:51:27', '1', '0', '2023-07-07', '0000-00-00', '1');
INSERT INTO `invoice_details` VALUES ('4', 'INV0004', '28', '0.00', '1000.00', '-1000.00', '0.00', '1', '2023-07-07 04:53:07', '1', '0', '2023-07-07', '2023-07-14', '0');
INSERT INTO `invoice_details` VALUES ('5', 'INV0005', '15', '10000.00', '3000.00', '7000.00', '0.00', '1', '2023-07-07 05:35:34', '1', '0', '2023-07-07', '2023-07-14', '0');
INSERT INTO `invoice_details` VALUES ('6', 'INV0006', '15', '2400.00', '0.00', '0.00', '0.00', '1', '2023-07-08 14:43:01', '1', '0', '2023-07-08', '2023-07-15', '0');

-- ----------------------------
-- Table structure for invoice_item_details
-- ----------------------------
DROP TABLE IF EXISTS `invoice_item_details`;
CREATE TABLE `invoice_item_details` (
  `inv_itm_tbl_id` int(20) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(10) NOT NULL,
  `inv_itm_id` int(10) NOT NULL,
  `inv_itm_qty` int(5) NOT NULL,
  `inv_unit_price` decimal(15,2) NOT NULL,
  `inv_itm_status` int(2) DEFAULT 1,
  `inv_itm_added_date_time` datetime DEFAULT current_timestamp(),
  `damage_qty` int(11) DEFAULT 0,
  PRIMARY KEY (`inv_itm_tbl_id`),
  UNIQUE KEY `invoice_no` (`invoice_no`,`inv_itm_id`),
  KEY `inv_itm_id` (`inv_itm_id`),
  CONSTRAINT `invoice_item_details_ibfk_1` FOREIGN KEY (`inv_itm_id`) REFERENCES `item_details` (`item_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of invoice_item_details
-- ----------------------------
INSERT INTO `invoice_item_details` VALUES ('1', 'INV0001', '1', '2', '1500.00', '1', '2023-06-28 10:19:36', '0');
INSERT INTO `invoice_item_details` VALUES ('2', 'INV0001', '8', '2', '2400.00', '1', '2023-06-28 10:21:02', '0');
INSERT INTO `invoice_item_details` VALUES ('30', 'INV0002', '14', '1', '2500.00', '1', '2023-07-05 07:27:14', '0');
INSERT INTO `invoice_item_details` VALUES ('48', 'INV0004', '1', '1', '0.00', '1', '2023-07-07 04:53:02', '0');
INSERT INTO `invoice_item_details` VALUES ('60', 'INV0005', '14', '4', '2500.00', '1', '2023-07-07 05:34:54', '0');
INSERT INTO `invoice_item_details` VALUES ('62', 'INV0006', '8', '1', '2400.00', '1', '2023-07-08 14:42:44', '0');
INSERT INTO `invoice_item_details` VALUES ('64', 'INV0007', '2', '2', '2300.00', '1', '2023-07-08 15:06:46', '0');

-- ----------------------------
-- Table structure for item_category_details
-- ----------------------------
DROP TABLE IF EXISTS `item_category_details`;
CREATE TABLE `item_category_details` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(155) NOT NULL,
  `cat_status` int(2) NOT NULL DEFAULT 1,
  `created_user` int(5) NOT NULL DEFAULT 4,
  PRIMARY KEY (`cat_id`),
  KEY `created_user` (`created_user`),
  CONSTRAINT `item_category_details_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `user_register` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_category_details
-- ----------------------------
INSERT INTO `item_category_details` VALUES ('1', 'Saree', '1', '4');
INSERT INTO `item_category_details` VALUES ('2', 'Shirt', '1', '4');
INSERT INTO `item_category_details` VALUES ('3', 'Coat', '1', '4');
INSERT INTO `item_category_details` VALUES ('4', 'National Kit', '1', '4');
INSERT INTO `item_category_details` VALUES ('5', 'Tie', '1', '4');

-- ----------------------------
-- Table structure for item_details
-- ----------------------------
DROP TABLE IF EXISTS `item_details`;
CREATE TABLE `item_details` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(10) NOT NULL,
  `item_category` int(5) NOT NULL,
  `fabric_type` int(5) NOT NULL,
  `design_type` int(5) NOT NULL,
  `color` varchar(100) NOT NULL,
  `size` int(5) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_keep_days` varchar(2) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `item_rent_price` decimal(15,2) NOT NULL,
  `item_status` int(2) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive, 99=temoporaly deactive',
  `gender_type` varchar(10) NOT NULL,
  `item_added_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `item_added_user` int(5) DEFAULT 4,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `item_name` (`item_name`),
  KEY `item_added_user` (`item_added_user`),
  KEY `item_category` (`item_category`),
  CONSTRAINT `item_details_ibfk_1` FOREIGN KEY (`item_added_user`) REFERENCES `user_register` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `item_details_ibfk_2` FOREIGN KEY (`item_category`) REFERENCES `item_category_details` (`cat_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_details
-- ----------------------------
INSERT INTO `item_details` VALUES ('1', 'I001', '1', '1', '1', 'Black', '1', 'Floral Black Cotton Saree 6.25 M', '4', 'I001.jpg', '0.00', '1', 'Female', '2023-06-13 06:24:25', '1');
INSERT INTO `item_details` VALUES ('2', 'I002', '1', '1', '1', 'White', '1', 'Floral White Cotton Saree 6.25 M', '4', 'I002.jpg', '2300.00', '1', 'Female', '2023-06-13 06:34:55', '1');
INSERT INTO `item_details` VALUES ('3', 'I003', '1', '1', '27', 'Multi Colored', '1', 'Stripped Multi Colored Cotton Saree 6.25 M', '4', 'I003.jpg', '0.00', '1', 'men', '2023-06-13 08:28:37', '1');
INSERT INTO `item_details` VALUES ('4', 'I004', '3', '6', '28', 'White', '7', 'Long Sleeve White Cotton Coat M', '4', 'I004.jpg', '1700.00', '1', 'men', '2023-06-13 08:31:11', '1');
INSERT INTO `item_details` VALUES ('5', 'I005', '3', '6', '28', 'Blue', '7', 'Long Sleeve Blue Cotton Coat M', '4', 'I005.jpg', '1600.00', '1', 'men', '2023-06-13 08:32:01', '1');
INSERT INTO `item_details` VALUES ('6', 'I006', '3', '6', '12', 'Gray', '8', 'Floral Short Sleeve Gray Cotton Coat L', '4', '', '1264.00', '1', 'Male', '2023-06-13 08:32:27', '1');
INSERT INTO `item_details` VALUES ('7', 'I007', '3', '6', '28', 'Green', '7', 'Long Sleeve Green Cotton Coat M', '4', 'I007.jpg', '1800.00', '1', 'men', '2023-06-13 08:44:55', '1');
INSERT INTO `item_details` VALUES ('8', 'I008', '3', '6', '12', 'Multi Colored', '6', 'Floral Short Sleeve Multi Colored Cotton Coat S', '4', '', '2400.00', '1', 'Male', '2023-06-13 11:57:22', '1');
INSERT INTO `item_details` VALUES ('9', 'I009', '3', '8', '14', 'Black', '8', 'Plain Black Rayon Coat L', '4', 'I009.jpg', '2100.00', '1', 'men', '2023-06-13 12:03:04', '1');
INSERT INTO `item_details` VALUES ('10', 'I0010', '1', '1', '29', 'Blue', '1', 'Bordered Blue Cotton Saree 6.25 M', '4', 'I0010.jpg', '2300.00', '1', 'Female', '2023-06-13 12:07:04', '1');
INSERT INTO `item_details` VALUES ('11', 'I0011', '1', '2', '30', 'Dark Blue', '1', 'Sequin Dark Blue Silk Saree 6.25 M', '4', '', '2200.00', '1', 'Female', '2023-06-13 12:09:28', '1');
INSERT INTO `item_details` VALUES ('12', 'I0012', '1', '1', '2', 'Brown', '1', 'Diamond Brown Cotton Saree 6.25 M', '4', 'I0012.jpg', '2600.00', '1', 'Male', '2023-06-13 12:12:28', '1');
INSERT INTO `item_details` VALUES ('13', 'I0013', '1', '3', '31', 'Red', '1', 'Plain Red Rayon Saree 6.25 M', '4', 'I0013.jpg', '2700.00', '1', 'men', '2023-06-13 12:17:15', '1');
INSERT INTO `item_details` VALUES ('14', 'I0014', '1', '1', '1', 'Gold', '1', 'Floral Gold Cotton Saree 6.25 M', '4', 'I0014.jpg', '2500.00', '1', 'Female', '2023-06-13 12:22:52', '1');
INSERT INTO `item_details` VALUES ('15', 'I0015', '1', '2', '30', 'Gold', '1', 'Sequin Gold Silk Saree 6.25 M', '4', 'I0015.jpg', '0.00', '1', 'men', '2023-06-13 12:24:57', '1');
INSERT INTO `item_details` VALUES ('16', 'I0016', '4', '9', '17', 'White', '12', 'Plain Pink Scarf White Cotton National Kit L', '4', 'I0016.jpg', '2600.00', '1', 'men', '2023-06-13 17:36:27', '1');
INSERT INTO `item_details` VALUES ('17', 'I0017', '4', '9', '18', 'White', '12', 'Plain Brown Scarf White Cotton National Kit L', '4', 'I0017.jpg', '2780.00', '1', 'men', '2023-06-13 17:37:22', '1');
INSERT INTO `item_details` VALUES ('18', 'I0018', '4', '10', '16', 'Gold', '11', 'Plain Gold Silk National Kit M', '4', 'I0018.jpg', '2850.00', '1', 'men', '2023-06-13 17:39:52', '1');
INSERT INTO `item_details` VALUES ('19', 'I0019', '4', '9', '15', 'Light Brown', '11', 'Plain Light Brown Cotton National Kit M', '4', 'I0019.jpg', '2800.00', '1', 'men', '2023-06-13 18:06:40', '1');
INSERT INTO `item_details` VALUES ('20', 'I0020', '4', '9', '15', 'White', '12', 'Plain White Cotton National Kit L', '4', 'I0020.jpg', '2900.00', '1', 'men', '2023-06-13 18:08:29', '1');
INSERT INTO `item_details` VALUES ('21', 'I0021', '5', '11', '19', 'Yellow', '13', 'Plain  Yellow Cotton Tie 9 CM', '4', 'I0021.jpg', '1200.00', '1', 'men', '2023-06-15 09:57:25', '1');
INSERT INTO `item_details` VALUES ('22', 'I0022', '5', '11', '19', 'Light Pink', '13', 'Plain  Light Pink Cotton Tie 9 CM', '4', '', '1255.00', '1', 'men', '2023-06-15 09:57:54', '1');
INSERT INTO `item_details` VALUES ('23', 'I0023', '5', '11', '19', 'Light Blue', '13', 'Plain  Light Blue Cotton Tie 9 CM', '4', 'I0023.jpg', '1200.00', '1', 'men', '2023-06-15 09:58:18', '1');
INSERT INTO `item_details` VALUES ('24', 'I0024', '5', '11', '19', 'Dark Green', '13', 'Plain  Dark Green Cotton Tie 9 CM', '4', 'I0024.jpg', '1250.00', '0', 'men', '2023-06-15 09:59:00', '1');
INSERT INTO `item_details` VALUES ('25', 'I0025', '5', '25', '32', 'Purple', '13', 'Plain Purple Rayon Tie 9 CM', '4', '', '1240.00', '0', 'men', '2023-06-15 10:00:24', '1');

-- ----------------------------
-- Table structure for item_return_details
-- ----------------------------
DROP TABLE IF EXISTS `item_return_details`;
CREATE TABLE `item_return_details` (
  `return_id` int(10) NOT NULL AUTO_INCREMENT,
  `return_inv_no` varchar(10) NOT NULL,
  `return_note` varchar(150) NOT NULL,
  `return_fine_charge` decimal(15,2) DEFAULT NULL,
  `other_fine` decimal(15,2) DEFAULT NULL,
  `return_user_id` int(2) NOT NULL,
  `return_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `return_status` int(2) NOT NULL DEFAULT 1,
  `return_type` int(2) DEFAULT 1 COMMENT '1=main_stock, 0=damaged_stock',
  `return_amount` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`return_id`),
  UNIQUE KEY `return_inv_id` (`return_inv_no`) USING BTREE,
  KEY `return_user_id` (`return_user_id`),
  CONSTRAINT `item_return_details_ibfk_3` FOREIGN KEY (`return_user_id`) REFERENCES `user_register` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_return_details
-- ----------------------------
INSERT INTO `item_return_details` VALUES ('29', 'INV0001', '', '350.00', '0.00', '1', '2023-06-28 10:59:24', '1', '1', '1150.00');

-- ----------------------------
-- Table structure for size_details
-- ----------------------------
DROP TABLE IF EXISTS `size_details`;
CREATE TABLE `size_details` (
  `size_id` int(10) NOT NULL AUTO_INCREMENT,
  `size` varchar(50) NOT NULL,
  `category_id` int(10) NOT NULL,
  `size_status` int(2) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  PRIMARY KEY (`size_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `size_details_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `item_category_details` (`cat_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of size_details
-- ----------------------------
INSERT INTO `size_details` VALUES ('1', '6.25 M', '1', '1');
INSERT INTO `size_details` VALUES ('2', 'S', '2', '1');
INSERT INTO `size_details` VALUES ('3', 'M', '2', '1');
INSERT INTO `size_details` VALUES ('4', 'L', '2', '1');
INSERT INTO `size_details` VALUES ('5', 'XL', '2', '1');
INSERT INTO `size_details` VALUES ('6', 'S', '3', '1');
INSERT INTO `size_details` VALUES ('7', 'M', '3', '1');
INSERT INTO `size_details` VALUES ('8', 'L', '3', '1');
INSERT INTO `size_details` VALUES ('9', 'XL', '3', '1');
INSERT INTO `size_details` VALUES ('10', 'S', '4', '1');
INSERT INTO `size_details` VALUES ('11', 'M', '4', '1');
INSERT INTO `size_details` VALUES ('12', 'L', '4', '1');
INSERT INTO `size_details` VALUES ('13', '9 CM', '5', '1');
INSERT INTO `size_details` VALUES ('14', '7.5 CM', '5', '1');

-- ----------------------------
-- Table structure for supplier_details
-- ----------------------------
DROP TABLE IF EXISTS `supplier_details`;
CREATE TABLE `supplier_details` (
  `sup_id` int(6) NOT NULL AUTO_INCREMENT,
  `sup_reg_no` varchar(10) NOT NULL,
  `sup_name` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_details` varchar(255) DEFAULT NULL,
  `sup_email` varchar(255) NOT NULL,
  `sup_contact` varchar(15) NOT NULL,
  `sup_address` varchar(255) DEFAULT NULL,
  `sup_credit_limit` decimal(50,2) DEFAULT NULL,
  `sup_status` int(2) NOT NULL DEFAULT 1,
  `sup_reg_date` datetime DEFAULT current_timestamp(),
  `sup_added_user` int(2) NOT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of supplier_details
-- ----------------------------
INSERT INTO `supplier_details` VALUES ('1', 'S0001', 'Kasun Perera', '', '', 'kasun@gmail.com', '0778989787', 'Kegalle', null, '1', '2023-06-16 15:26:06', '0');
INSERT INTO `supplier_details` VALUES ('2', 'S0002', 'Sadun Dasanayaka', 'k', 'k', 'sadun@gmail.com', '0767878789', 'Kegalle', null, '1', '2023-06-16 15:26:44', '0');
INSERT INTO `supplier_details` VALUES ('3', 'S0003', 'Pasan Godagama', '', '', 'pasan@gmail.com', '0776876756', 'Karandupana', null, '1', '2023-06-16 15:27:28', '0');
INSERT INTO `supplier_details` VALUES ('4', 'S0004', 'Aruna Hewage', '', '', 'aruna@gmail.com', '0778564543', 'Kegalle', null, '1', '2023-06-16 15:28:02', '0');
INSERT INTO `supplier_details` VALUES ('6', 'S0006', 'aaa', '', '', 'sabdun@gmail.com', '0767878989', 'asXA', null, '1', '2023-07-01 07:05:55', '1');

-- ----------------------------
-- Table structure for supplier_payment_transactions
-- ----------------------------
DROP TABLE IF EXISTS `supplier_payment_transactions`;
CREATE TABLE `supplier_payment_transactions` (
  `sup_pay_id` int(10) NOT NULL AUTO_INCREMENT,
  `sup_id` int(5) NOT NULL,
  `sup_grn_id` int(5) NOT NULL,
  `sup_paid_amount` decimal(10,2) NOT NULL,
  `sup_paid_user_id` int(5) NOT NULL,
  `sup_paid_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `sup_paid_status` int(2) NOT NULL DEFAULT 1 COMMENT '1=active payment , 0= cancel',
  PRIMARY KEY (`sup_pay_id`),
  KEY `sup_id` (`sup_id`),
  KEY `sup_grn_id` (`sup_grn_id`),
  KEY `sup_paid_user_id` (`sup_paid_user_id`),
  CONSTRAINT `supplier_payment_transactions_ibfk_3` FOREIGN KEY (`sup_paid_user_id`) REFERENCES `user_register` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `supplier_payment_transactions_ibfk_4` FOREIGN KEY (`sup_id`) REFERENCES `supplier_details` (`sup_id`) ON UPDATE CASCADE,
  CONSTRAINT `supplier_payment_transactions_ibfk_5` FOREIGN KEY (`sup_grn_id`) REFERENCES `grn_details` (`grn_table_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of supplier_payment_transactions
-- ----------------------------

-- ----------------------------
-- Table structure for system_inventory
-- ----------------------------
DROP TABLE IF EXISTS `system_inventory`;
CREATE TABLE `system_inventory` (
  `item_id` int(10) NOT NULL,
  `avl_qty` int(50) NOT NULL,
  `last_update_date_time` datetime DEFAULT current_timestamp(),
  `last_update_user` int(2) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  CONSTRAINT `system_inventory_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item_details` (`item_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_inventory
-- ----------------------------
INSERT INTO `system_inventory` VALUES ('1', '16', '2023-06-16 15:29:36', '1');
INSERT INTO `system_inventory` VALUES ('2', '3', '2023-07-08 14:48:42', '1');
INSERT INTO `system_inventory` VALUES ('8', '7', '2023-06-16 15:32:15', '1');
INSERT INTO `system_inventory` VALUES ('9', '5', '2023-06-16 15:32:35', '1');
INSERT INTO `system_inventory` VALUES ('14', '1', '2023-06-16 15:30:17', '1');
INSERT INTO `system_inventory` VALUES ('16', '6', '2023-06-16 16:04:14', '1');
INSERT INTO `system_inventory` VALUES ('18', '5', '2023-06-16 16:04:38', '1');
INSERT INTO `system_inventory` VALUES ('22', '8', '2023-06-16 16:05:58', '1');
INSERT INTO `system_inventory` VALUES ('23', '4', '2023-06-16 16:06:16', '1');

-- ----------------------------
-- Table structure for system_privilages
-- ----------------------------
DROP TABLE IF EXISTS `system_privilages`;
CREATE TABLE `system_privilages` (
  `prv_id` int(5) NOT NULL,
  `prv_name` varchar(50) NOT NULL,
  `prv_type` int(5) NOT NULL,
  `prv_path` varchar(100) NOT NULL,
  `prv_priority` int(3) DEFAULT NULL,
  `prv_status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`prv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_privilages
-- ----------------------------
INSERT INTO `system_privilages` VALUES ('100', 'User Management', '0', '', '1', '1');
INSERT INTO `system_privilages` VALUES ('101', 'User Registration', '100', './?x=user', '1', '1');
INSERT INTO `system_privilages` VALUES ('102', 'System Privilage', '100', './?x=privilage', '2', '1');
INSERT INTO `system_privilages` VALUES ('200', 'Registration', '0', '', '2', '1');
INSERT INTO `system_privilages` VALUES ('201', 'Item Registration', '200', './?x=item', '1', '1');
INSERT INTO `system_privilages` VALUES ('202', 'Customer Registration', '200', './?x=customer', '2', '1');
INSERT INTO `system_privilages` VALUES ('203', 'Category Registration', '200', './?x=category', '3', '1');
INSERT INTO `system_privilages` VALUES ('204', 'Supplier Registration', '200', './?x=supplier', '4', '1');
INSERT INTO `system_privilages` VALUES ('300', 'GRN ', '0', '', '3', '1');
INSERT INTO `system_privilages` VALUES ('301', 'Add New GRN', '300', './?x=inventory', '1', '1');
INSERT INTO `system_privilages` VALUES ('302', 'Supplier Payment', '300', './?x=supplier_payment', '2', '1');
INSERT INTO `system_privilages` VALUES ('400', 'Sales', '0', '', '4', '1');
INSERT INTO `system_privilages` VALUES ('401', 'New Invoice', '400', './?x=invoice', '1', '1');
INSERT INTO `system_privilages` VALUES ('402', 'Return', '400', './?x=item_return', '2', '1');
INSERT INTO `system_privilages` VALUES ('500', 'Inventory', '0', '', '5', '1');
INSERT INTO `system_privilages` VALUES ('501', 'View Inventory', '500', './?x=system_inventory', '1', '1');
INSERT INTO `system_privilages` VALUES ('502', 'Damaged Items', '500', './?x=item_remove', '2', '1');
INSERT INTO `system_privilages` VALUES ('600', 'Backup', '0', '', '6', '1');
INSERT INTO `system_privilages` VALUES ('601', 'Get System Data Backup', '600', './?x=backup', '1', '1');
INSERT INTO `system_privilages` VALUES ('700', 'Report', '0', '', '7', '1');
INSERT INTO `system_privilages` VALUES ('701', 'Item Summary', '700', './?x=item_summary', '1', '1');
INSERT INTO `system_privilages` VALUES ('702', 'Customer Summary', '700', './?x=cus_summary', '2', '1');
INSERT INTO `system_privilages` VALUES ('703', 'Supplier Summary', '700', './?x=sup_summary', '3', '1');
INSERT INTO `system_privilages` VALUES ('704', 'Date Wise GRN Summary', '700', './?x=date_grn', '4', '1');
INSERT INTO `system_privilages` VALUES ('705', 'GRN Payment Status', '700', './?x=grn_payment_status', '5', '1');
INSERT INTO `system_privilages` VALUES ('706', 'Item Category Wise Sales', '700', './?x=item_cat_sales', '6', '1');
INSERT INTO `system_privilages` VALUES ('707', 'Item Category Wise invoice', '700', './?x=item_cat_invoice', '7', '1');
INSERT INTO `system_privilages` VALUES ('708', 'Item Category wise Sale Chart', '700', './?x=item_cat_chart', '8', '1');
INSERT INTO `system_privilages` VALUES ('709', 'Tailor Registration', '200', './?x=tailor_register', '5', '1');
INSERT INTO `system_privilages` VALUES ('800', 'Dashboard ', '800', '', '8', '1');
INSERT INTO `system_privilages` VALUES ('801', 'Dashboard - Total Customers', '800', '', '1', '1');
INSERT INTO `system_privilages` VALUES ('802', 'Dashboard - Today Invoice', '800', '', '2', '1');
INSERT INTO `system_privilages` VALUES ('803', 'Dashboard - Today Returns', '800', '', '3', '1');
INSERT INTO `system_privilages` VALUES ('804', 'Dashboard - Total Balance', '800', '', '4', '1');
INSERT INTO `system_privilages` VALUES ('805', 'Dashboard - Late Return Invoice', '800', '', '5', '1');
INSERT INTO `system_privilages` VALUES ('806', 'Dashboard - Graph', '800', '', '6', '1');
INSERT INTO `system_privilages` VALUES ('807', 'Dashboard - Recent Store', '800', '', '7', '1');
INSERT INTO `system_privilages` VALUES ('808', 'Dashboard - Low Stock', '800', '', '8', '1');
INSERT INTO `system_privilages` VALUES ('900', 'Custom Request', '0', '', '9', '1');
INSERT INTO `system_privilages` VALUES ('901', 'Request Status', '900', './?x=cus_req_status', '1', '1');
INSERT INTO `system_privilages` VALUES ('902', 'Confirmed Requests', '900', './?x=cus_req_complete', '2', '2');

-- ----------------------------
-- Table structure for system_properties
-- ----------------------------
DROP TABLE IF EXISTS `system_properties`;
CREATE TABLE `system_properties` (
  `type` varchar(10) NOT NULL,
  `value` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_properties
-- ----------------------------
INSERT INTO `system_properties` VALUES ('late_charg', '350');
INSERT INTO `system_properties` VALUES ('low_items', '5');

-- ----------------------------
-- Table structure for tailor_details
-- ----------------------------
DROP TABLE IF EXISTS `tailor_details`;
CREATE TABLE `tailor_details` (
  `tailor_id` int(6) NOT NULL AUTO_INCREMENT,
  `tailor_regi_no` varchar(10) NOT NULL,
  `tailor_name` varchar(255) NOT NULL,
  `tailor_nic` varchar(12) NOT NULL,
  `tailor_email` varchar(255) NOT NULL,
  `tailor_contact` varchar(15) NOT NULL,
  `tailor_address` varchar(255) DEFAULT '',
  `tailor_status` int(2) NOT NULL DEFAULT 1,
  `tailor_regi_date` datetime DEFAULT current_timestamp(),
  `tailor_added_user` int(2) NOT NULL,
  PRIMARY KEY (`tailor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tailor_details
-- ----------------------------
INSERT INTO `tailor_details` VALUES ('1', 'T001', 'Yasith Wijethunga', '878678687V', 'yasith@gmail.com', '0767878787', '', '1', '2023-05-27 13:10:03', '1');
INSERT INTO `tailor_details` VALUES ('2', 'T002', 'Manoj Thilakarathna', '934565756V', 'manoj@gmail.com', '0778787867', '', '0', '2023-05-27 13:12:17', '1');
INSERT INTO `tailor_details` VALUES ('5', 'T005', 'As', '8786755687V', 'h@gmail.com', '0767878788', '', '1', '2023-07-01 06:37:27', '1');
INSERT INTO `tailor_details` VALUES ('6', 'T006', 'As', '222222222222', 'wnoj@gmail.com', '3333333333', 'yj', '1', '2023-07-01 06:47:55', '1');
INSERT INTO `tailor_details` VALUES ('7', 'T008', 'Manoj Thilakarathna', '334565756V', 'imanoj@gmail.com', '0778787864', 'k', '1', '2023-07-01 22:28:05', '1');

-- ----------------------------
-- Table structure for tailor_job_assign_details
-- ----------------------------
DROP TABLE IF EXISTS `tailor_job_assign_details`;
CREATE TABLE `tailor_job_assign_details` (
  `tailor_job_tbl_id` int(10) NOT NULL AUTO_INCREMENT,
  `tailor_id` int(10) NOT NULL,
  `tailor_req_id` varchar(20) NOT NULL,
  `tailor_req_status` int(2) NOT NULL DEFAULT 0 COMMENT '0=pending, 1= completed',
  `tailor_target_date` datetime DEFAULT current_timestamp(),
  `tailor_assign_user` int(2) DEFAULT NULL,
  PRIMARY KEY (`tailor_job_tbl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tailor_job_assign_details
-- ----------------------------
INSERT INTO `tailor_job_assign_details` VALUES ('3', '1', 'CR001', '0', '2023-07-05 00:00:00', '1');
INSERT INTO `tailor_job_assign_details` VALUES ('4', '6', 'CR0010', '0', '2023-07-13 00:00:00', '1');

-- ----------------------------
-- Table structure for user_register
-- ----------------------------
DROP TABLE IF EXISTS `user_register`;
CREATE TABLE `user_register` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(155) NOT NULL,
  `user_nic` varchar(12) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `user_status` int(2) NOT NULL DEFAULT 1 COMMENT '1=active, 2=tempo deactivate,0=deleted',
  `user_regi_date_time` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_register
-- ----------------------------
INSERT INTO `user_register` VALUES ('1', 'Agra Wickramathilaka', '948533715V', 'agra@gmail.com', '0769778780', 'kegalle', 'agraisu', '7c2e5ef540efc167254d72eacf0c1826df98b38a', 'Admin', '1', '2023-02-16 10:28:40');
INSERT INTO `user_register` VALUES ('2', 'Saduni Perera', '954565676V', 'saduni@gmail.com', '0712343456', 'kegalle', 'saduni', '7c2e5ef540efc167254d72eacf0c1826df98b38a', 'Manager', '1', '2023-02-16 10:36:20');
INSERT INTO `user_register` VALUES ('3', 'Supun Fernando', '907865768V', 'supun@gmail.com', '0776787987', 'kegalle', 'supun', '7c2e5ef540efc167254d72eacf0c1826df98b38a', 'Cashier', '0', '2023-02-16 10:37:52');
INSERT INTO `user_register` VALUES ('4', 'Pasan Kumara', '956778687V', 'pasan@gmail.com', '0765765676', 'Kegalle', 'admin', '7c2e5ef540efc167254d72eacf0c1826df98b38a', 'Assistant Manager', '0', '2023-03-03 21:28:26');
