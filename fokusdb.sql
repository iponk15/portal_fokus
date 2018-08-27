/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100134
 Source Host           : localhost:3306
 Source Schema         : fokusdb

 Target Server Type    : MySQL
 Target Server Version : 100134
 File Encoding         : 65001

 Date: 28/08/2018 04:55:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for fokus_admin
-- ----------------------------
DROP TABLE IF EXISTS `fokus_admin`;
CREATE TABLE `fokus_admin`  (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_role_id` int(11) DEFAULT NULL,
  `admin_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `admin_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `admin_password` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `admin_salt` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `admin_nohp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `admin_alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `admin_tipe` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '1' COMMENT '1=superadmin,2=author',
  `admin_foto` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `admin_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '1' COMMENT '0=off,1=on',
  `admin_createdby` int(255) DEFAULT NULL,
  `admin_createddate` datetime(0) DEFAULT NULL,
  `admin_lastupdate` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_updatedby` int(11) DEFAULT NULL,
  `admin_ip` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for fokus_group
-- ----------------------------
DROP TABLE IF EXISTS `fokus_group`;
CREATE TABLE `fokus_group`  (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_role_id` int(255) DEFAULT NULL,
  `group_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `group_deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `group_ip_temp` char(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `group_data` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `group_controller` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `group_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '0 = off, 1 = on',
  `group_createdby` char(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `group_createddate` datetime(0) DEFAULT NULL,
  `group_updatedby` char(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `group_lastupdate` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for fokus_icon
-- ----------------------------
DROP TABLE IF EXISTS `fokus_icon`;
CREATE TABLE `fokus_icon`  (
  `icon_id` int(11) NOT NULL AUTO_INCREMENT,
  `icon_tipe` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '1 = flaticon, 2 = fa',
  `icon_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `icon_color` enum('1','2','3','4','5','6') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '1 = success, 2 = warning, 3 = danger, 4 = info, 5 = primary, 6 = secondary',
  `icon_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '0 = off, 1 = on',
  PRIMARY KEY (`icon_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 285 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for fokus_menu
-- ----------------------------
DROP TABLE IF EXISTS `fokus_menu`;
CREATE TABLE `fokus_menu`  (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `menu_controllers` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `menu_is_primary` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '0 = false, 1 = true',
  `menu_url` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `menu_sub_menu` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `menu_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '0 = off, 1 = on',
  `menu_ip_temp` char(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `menu_createdby` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `menu_createddate` datetime(0) DEFAULT NULL,
  `menu_udpatedby` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `menu_lastupdate` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for fokus_role
-- ----------------------------
DROP TABLE IF EXISTS `fokus_role`;
CREATE TABLE `fokus_role`  (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `role_deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `role_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '0 = off, 1 = on',
  `role_ip_temp` char(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `role_createdby` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `role_createddate` datetime(0) DEFAULT NULL,
  `role_updatedby` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `role_lastupdate` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for fokus_user
-- ----------------------------
DROP TABLE IF EXISTS `fokus_user`;
CREATE TABLE `fokus_user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_salt` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_hp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_foto` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '0=off,1=on',
  `user_lastupdate` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
