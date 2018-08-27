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

 Date: 28/08/2018 04:23:42
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
-- Records of fokus_admin
-- ----------------------------
INSERT INTO `fokus_admin` VALUES (1, 1, 'Irfan Isma Somantri', 'irfan.isma@gmail.com', 'a5405ebd1be866c5dcf0e62406152d37e4941798', '$2y$12$SvLKrMsyU/XY2ySNUM4/7ug9REAm013GSOTmF.bTYWujK5qnEpmKC', '08973950031', 'Lenteng Agung', '1', NULL, '1', NULL, NULL, '2018-08-26 07:45:50', NULL, NULL);

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
-- Records of fokus_group
-- ----------------------------
INSERT INTO `fokus_group` VALUES (6, 1, 'Group Admin', 'Group khusu untuk admin', '::1', '[{\"menu_id\":\"1\",\"menu_nama\":\"Welcome\",\"menu_controllers\":[],\"menu_is_primary\":1,\"menu_url\":\"welcome\",\"menu_sub_menu\":[]},{\"menu_id\":\"9\",\"menu_nama\":\"Konfigurasi\",\"menu_controllers\":[\"group\",\"icon\",\"menu\",\"role\"],\"menu_is_primary\":0,\"menu_url\":\"\",\"menu_sub_menu\":[{\"text\":\"Group\",\"icon_menu\":\"users\",\"controller\":\"group\",\"parent\":9},{\"text\":\"Icon\",\"icon_menu\":\"medical\",\"controller\":\"icon\",\"parent\":9},{\"text\":\"Menu\",\"icon_menu\":\"puzzle\",\"controller\":\"menu\",\"parent\":9},{\"text\":\"Role\",\"icon_menu\":\"web\",\"controller\":\"role\",\"parent\":9}]},{\"menu_id\":\"10\",\"menu_nama\":\"Master Data\",\"menu_controllers\":[\"penulis\"],\"menu_is_primary\":0,\"menu_url\":\"\",\"menu_sub_menu\":[{\"text\":\"Penulis\",\"icon_menu\":\"book\",\"controller\":\"penulis\",\"parent\":10}]}]', '[\"welcome\",\"group\",\"icon\",\"menu\",\"role\",\"penulis\"]', '1', '1', '2018-08-27 00:59:48', '1', '2018-08-27 12:05:39');

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
-- Records of fokus_icon
-- ----------------------------
INSERT INTO `fokus_icon` VALUES (1, '1', 'alarm-1', '', '1');
INSERT INTO `fokus_icon` VALUES (2, '1', 'music-2', '', '1');
INSERT INTO `fokus_icon` VALUES (3, '1', 'support', '', '1');
INSERT INTO `fokus_icon` VALUES (4, '1', 'stopwatch', '', '1');
INSERT INTO `fokus_icon` VALUES (5, '1', 'puzzle', '', '1');
INSERT INTO `fokus_icon` VALUES (6, '1', 'settings-1', '', '1');
INSERT INTO `fokus_icon` VALUES (7, '1', 'calendar-3', '', '1');
INSERT INTO `fokus_icon` VALUES (8, '1', 'add-circular-button', '', '1');
INSERT INTO `fokus_icon` VALUES (9, '1', 'plus', '', '1');
INSERT INTO `fokus_icon` VALUES (10, '1', 'menu-1', '', '1');
INSERT INTO `fokus_icon` VALUES (11, '1', 'menu', '', '1');
INSERT INTO `fokus_icon` VALUES (12, '1', 'piggy-bank', '', '1');
INSERT INTO `fokus_icon` VALUES (13, '1', 'confetti', '', '1');
INSERT INTO `fokus_icon` VALUES (14, '1', 'rocket', '', '1');
INSERT INTO `fokus_icon` VALUES (15, '1', 'gift', '', '1');
INSERT INTO `fokus_icon` VALUES (16, '1', 'truck', '', '1');
INSERT INTO `fokus_icon` VALUES (17, '1', 'user-settings', '', '1');
INSERT INTO `fokus_icon` VALUES (18, '1', 'user-add', '', '1');
INSERT INTO `fokus_icon` VALUES (19, '1', 'user-ok', '', '1');
INSERT INTO `fokus_icon` VALUES (20, '1', 'internet', '', '1');
INSERT INTO `fokus_icon` VALUES (21, '1', 'alert-2', '', '1');
INSERT INTO `fokus_icon` VALUES (22, '1', 'alarm', '', '1');
INSERT INTO `fokus_icon` VALUES (23, '1', 'grid-menu', '', '1');
INSERT INTO `fokus_icon` VALUES (24, '1', 'up-arrow-1', '', '1');
INSERT INTO `fokus_icon` VALUES (25, '1', 'more-1', '', '1');
INSERT INTO `fokus_icon` VALUES (26, '1', 'more-v3', '', '1');
INSERT INTO `fokus_icon` VALUES (27, '1', 'lock-1', '', '1');
INSERT INTO `fokus_icon` VALUES (28, '1', 'profile-1', '', '1');
INSERT INTO `fokus_icon` VALUES (29, '1', 'users', '', '1');
INSERT INTO `fokus_icon` VALUES (30, '1', 'map-location', '', '1');
INSERT INTO `fokus_icon` VALUES (31, '1', 'placeholder-2', '', '1');
INSERT INTO `fokus_icon` VALUES (32, '1', 'route', '', '1');
INSERT INTO `fokus_icon` VALUES (33, '1', 'more-v4', '', '1');
INSERT INTO `fokus_icon` VALUES (34, '1', 'lock', '', '1');
INSERT INTO `fokus_icon` VALUES (35, '1', 'multimedia-2', '', '1');
INSERT INTO `fokus_icon` VALUES (36, '1', 'add', '', '1');
INSERT INTO `fokus_icon` VALUES (37, '1', 'more-v5', '', '1');
INSERT INTO `fokus_icon` VALUES (38, '1', 'more-v6', '', '1');
INSERT INTO `fokus_icon` VALUES (39, '1', 'grid-menu-v2', '', '1');
INSERT INTO `fokus_icon` VALUES (40, '1', 'suitcase', '', '1');
INSERT INTO `fokus_icon` VALUES (41, '1', 'app', '', '1');
INSERT INTO `fokus_icon` VALUES (42, '1', 'interface-9', '', '1');
INSERT INTO `fokus_icon` VALUES (43, '1', 'time-3', '', '1');
INSERT INTO `fokus_icon` VALUES (44, '1', 'list-3', '', '1');
INSERT INTO `fokus_icon` VALUES (45, '1', 'list-2', '', '1');
INSERT INTO `fokus_icon` VALUES (46, '1', 'file-1', '', '1');
INSERT INTO `fokus_icon` VALUES (47, '1', 'folder-4', '', '1');
INSERT INTO `fokus_icon` VALUES (48, '1', 'folder-3', '', '1');
INSERT INTO `fokus_icon` VALUES (49, '1', 'folder-2', '', '1');
INSERT INTO `fokus_icon` VALUES (50, '1', 'folder-1', '', '1');
INSERT INTO `fokus_icon` VALUES (51, '1', 'time-2', '', '1');
INSERT INTO `fokus_icon` VALUES (52, '1', 'search-1', '', '1');
INSERT INTO `fokus_icon` VALUES (53, '1', 'tool-1', '', '1');
INSERT INTO `fokus_icon` VALUES (54, '1', 'security', '', '1');
INSERT INTO `fokus_icon` VALUES (55, '1', 'interface-8', '', '1');
INSERT INTO `fokus_icon` VALUES (56, '1', 'interface-7', '', '1');
INSERT INTO `fokus_icon` VALUES (57, '1', 'interface-6', '', '1');
INSERT INTO `fokus_icon` VALUES (58, '1', 'placeholder-1', '', '1');
INSERT INTO `fokus_icon` VALUES (59, '1', 'placeholder', '', '1');
INSERT INTO `fokus_icon` VALUES (60, '1', 'web', '', '1');
INSERT INTO `fokus_icon` VALUES (61, '1', 'multimedia-1', '', '1');
INSERT INTO `fokus_icon` VALUES (62, '1', 'tabs', '', '1');
INSERT INTO `fokus_icon` VALUES (63, '1', 'signs-2', '', '1');
INSERT INTO `fokus_icon` VALUES (64, '1', 'interface-5', '', '1');
INSERT INTO `fokus_icon` VALUES (65, '1', 'network', '', '1');
INSERT INTO `fokus_icon` VALUES (66, '1', 'share', '', '1');
INSERT INTO `fokus_icon` VALUES (67, '1', 'info', '', '1');
INSERT INTO `fokus_icon` VALUES (68, '1', 'exclamation-2', '', '1');
INSERT INTO `fokus_icon` VALUES (69, '1', 'music', '', '1');
INSERT INTO `fokus_icon` VALUES (70, '1', 'medical', '', '1');
INSERT INTO `fokus_icon` VALUES (71, '1', 'imac', '', '1');
INSERT INTO `fokus_icon` VALUES (72, '1', 'profile', '', '1');
INSERT INTO `fokus_icon` VALUES (73, '1', 'time-1', '', '1');
INSERT INTO `fokus_icon` VALUES (74, '1', 'list-1', '', '1');
INSERT INTO `fokus_icon` VALUES (75, '1', 'multimedia', '', '1');
INSERT INTO `fokus_icon` VALUES (76, '1', 'interface-4', '', '1');
INSERT INTO `fokus_icon` VALUES (77, '1', 'file', '', '1');
INSERT INTO `fokus_icon` VALUES (78, '1', 'background', '', '1');
INSERT INTO `fokus_icon` VALUES (79, '1', 'chat-1', '', '1');
INSERT INTO `fokus_icon` VALUES (80, '1', 'graph', '', '1');
INSERT INTO `fokus_icon` VALUES (81, '1', 'pie-chart', '', '1');
INSERT INTO `fokus_icon` VALUES (82, '1', 'bag', '', '1');
INSERT INTO `fokus_icon` VALUES (83, '1', 'cart', '', '1');
INSERT INTO `fokus_icon` VALUES (84, '1', 'warning-2', '', '1');
INSERT INTO `fokus_icon` VALUES (85, '1', 'download', '', '1');
INSERT INTO `fokus_icon` VALUES (86, '1', 'edit-1', '', '1');
INSERT INTO `fokus_icon` VALUES (87, '1', 'visible', '', '1');
INSERT INTO `fokus_icon` VALUES (88, '1', 'line-graph', '', '1');
INSERT INTO `fokus_icon` VALUES (89, '1', 'browser', '', '1');
INSERT INTO `fokus_icon` VALUES (90, '1', 'statistics', '', '1');
INSERT INTO `fokus_icon` VALUES (91, '1', 'paper-plane', '', '1');
INSERT INTO `fokus_icon` VALUES (92, '1', 'cogwheel-2', '', '1');
INSERT INTO `fokus_icon` VALUES (93, '1', 'lifebuoy', '', '1');
INSERT INTO `fokus_icon` VALUES (94, '1', 'settings', '', '1');
INSERT INTO `fokus_icon` VALUES (96, '1', 'user', '', '1');
INSERT INTO `fokus_icon` VALUES (97, '1', 'apps', '', '1');
INSERT INTO `fokus_icon` VALUES (98, '1', 'clock-1', '', '1');
INSERT INTO `fokus_icon` VALUES (99, '1', 'close', '', '1');
INSERT INTO `fokus_icon` VALUES (100, '1', 'pin', '', '1');
INSERT INTO `fokus_icon` VALUES (101, '1', 'circle', '', '1');
INSERT INTO `fokus_icon` VALUES (102, '1', 'interface-3', '', '1');
INSERT INTO `fokus_icon` VALUES (103, '1', 'technology-1', '', '1');
INSERT INTO `fokus_icon` VALUES (104, '1', 'danger', '', '1');
INSERT INTO `fokus_icon` VALUES (105, '1', 'exclamation-square', '', '1');
INSERT INTO `fokus_icon` VALUES (106, '1', 'cancel', '', '1');
INSERT INTO `fokus_icon` VALUES (107, '1', 'calendar-2', '', '1');
INSERT INTO `fokus_icon` VALUES (108, '1', 'warning-sign', '', '1');
INSERT INTO `fokus_icon` VALUES (109, '1', 'more', '', '1');
INSERT INTO `fokus_icon` VALUES (110, '1', 'exclamation-1', '', '1');
INSERT INTO `fokus_icon` VALUES (111, '1', 'cogwheel-1', '', '1');
INSERT INTO `fokus_icon` VALUES (112, '1', 'more-v2', '', '1');
INSERT INTO `fokus_icon` VALUES (113, '1', 'up-arrow', '', '1');
INSERT INTO `fokus_icon` VALUES (114, '1', 'computer', '', '1');
INSERT INTO `fokus_icon` VALUES (115, '1', 'alert-1', '', '1');
INSERT INTO `fokus_icon` VALUES (116, '1', 'alert-off', '', '1');
INSERT INTO `fokus_icon` VALUES (117, '1', 'map', '', '1');
INSERT INTO `fokus_icon` VALUES (118, '1', 'interface-2', '', '1');
INSERT INTO `fokus_icon` VALUES (119, '1', 'graphic-2', '', '1');
INSERT INTO `fokus_icon` VALUES (120, '1', 'cogwheel', '', '1');
INSERT INTO `fokus_icon` VALUES (121, '1', 'alert', '', '1');
INSERT INTO `fokus_icon` VALUES (122, '1', 'folder', '', '1');
INSERT INTO `fokus_icon` VALUES (123, '1', 'interface-1', '', '1');
INSERT INTO `fokus_icon` VALUES (124, '1', 'interface', '', '1');
INSERT INTO `fokus_icon` VALUES (125, '1', 'calendar-1', '', '1');
INSERT INTO `fokus_icon` VALUES (126, '1', 'time', '', '1');
INSERT INTO `fokus_icon` VALUES (127, '1', 'signs-1', '', '1');
INSERT INTO `fokus_icon` VALUES (128, '1', 'calendar', '', '1');
INSERT INTO `fokus_icon` VALUES (129, '1', 'chat', '', '1');
INSERT INTO `fokus_icon` VALUES (130, '1', 'infinity', '', '1');
INSERT INTO `fokus_icon` VALUES (131, '1', 'list', '', '1');
INSERT INTO `fokus_icon` VALUES (132, '1', 'bell', '', '1');
INSERT INTO `fokus_icon` VALUES (133, '1', 'delete', '', '1');
INSERT INTO `fokus_icon` VALUES (134, '1', 'squares-4', '', '1');
INSERT INTO `fokus_icon` VALUES (135, '1', 'clipboard', '', '1');
INSERT INTO `fokus_icon` VALUES (136, '1', 'shapes', '', '1');
INSERT INTO `fokus_icon` VALUES (137, '1', 'comment', '', '1');
INSERT INTO `fokus_icon` VALUES (139, '1', 'squares-3', '', '1');
INSERT INTO `fokus_icon` VALUES (140, '1', 'mark', '', '1');
INSERT INTO `fokus_icon` VALUES (141, '1', 'signs', '', '1');
INSERT INTO `fokus_icon` VALUES (142, '1', 'squares-2', '', '1');
INSERT INTO `fokus_icon` VALUES (143, '1', 'business', '', '1');
INSERT INTO `fokus_icon` VALUES (144, '1', 'car', '', '1');
INSERT INTO `fokus_icon` VALUES (145, '1', 'light', '', '1');
INSERT INTO `fokus_icon` VALUES (146, '1', 'information', '', '1');
INSERT INTO `fokus_icon` VALUES (147, '1', 'dashboard', '', '1');
INSERT INTO `fokus_icon` VALUES (148, '1', 'edit', '', '1');
INSERT INTO `fokus_icon` VALUES (149, '1', 'location', '', '1');
INSERT INTO `fokus_icon` VALUES (150, '1', 'technology', '', '1');
INSERT INTO `fokus_icon` VALUES (151, '1', 'exclamation', '', '1');
INSERT INTO `fokus_icon` VALUES (152, '1', 'tea-cup', '', '1');
INSERT INTO `fokus_icon` VALUES (153, '1', 'notes', '', '1');
INSERT INTO `fokus_icon` VALUES (154, '1', 'analytics', '', '1');
INSERT INTO `fokus_icon` VALUES (155, '1', 'transport', '', '1');
INSERT INTO `fokus_icon` VALUES (156, '1', 'layers', '', '1');
INSERT INTO `fokus_icon` VALUES (157, '1', 'book', '', '1');
INSERT INTO `fokus_icon` VALUES (158, '1', 'squares-1', '', '1');
INSERT INTO `fokus_icon` VALUES (159, '1', 'clock', '', '1');
INSERT INTO `fokus_icon` VALUES (160, '1', 'graphic-1', '', '1');
INSERT INTO `fokus_icon` VALUES (161, '1', 'symbol', '', '1');
INSERT INTO `fokus_icon` VALUES (162, '1', 'graphic', '', '1');
INSERT INTO `fokus_icon` VALUES (163, '1', 'tool', '', '1');
INSERT INTO `fokus_icon` VALUES (164, '1', 'laptop', '', '1');
INSERT INTO `fokus_icon` VALUES (165, '1', 'event-calendar-symbol', '', '1');
INSERT INTO `fokus_icon` VALUES (166, '1', 'logout', '', '1');
INSERT INTO `fokus_icon` VALUES (167, '1', 'refresh', '', '1');
INSERT INTO `fokus_icon` VALUES (168, '1', 'questions-circular-button', '', '1');
INSERT INTO `fokus_icon` VALUES (169, '1', 'search-magnifier-interface-symbol', '', '1');
INSERT INTO `fokus_icon` VALUES (170, '1', 'search', '', '1');
INSERT INTO `fokus_icon` VALUES (171, '1', 'attachment', '', '1');
INSERT INTO `fokus_icon` VALUES (172, '1', 'speech-bubble-1', '', '1');
INSERT INTO `fokus_icon` VALUES (173, '1', 'open-box', '', '1');
INSERT INTO `fokus_icon` VALUES (174, '1', 'coins', '', '1');
INSERT INTO `fokus_icon` VALUES (175, '1', 'speech-bubble', '', '1');
INSERT INTO `fokus_icon` VALUES (176, '1', 'squares', '', '1');
INSERT INTO `fokus_icon` VALUES (177, '1', 'diagram', '', '1');
INSERT INTO `fokus_icon` VALUES (178, '2', 'glass', '1', '1');
INSERT INTO `fokus_icon` VALUES (179, '2', 'glass', '2', '1');
INSERT INTO `fokus_icon` VALUES (180, '2', 'glass', '3', '1');
INSERT INTO `fokus_icon` VALUES (181, '2', 'glass', '4', '1');
INSERT INTO `fokus_icon` VALUES (182, '2', 'glass', '5', '1');
INSERT INTO `fokus_icon` VALUES (183, '2', 'glass', '6', '1');
INSERT INTO `fokus_icon` VALUES (184, '2', 'music', '1', '1');
INSERT INTO `fokus_icon` VALUES (185, '2', 'music', '2', '1');
INSERT INTO `fokus_icon` VALUES (186, '2', 'music', '3', '1');
INSERT INTO `fokus_icon` VALUES (187, '2', 'music', '4', '1');
INSERT INTO `fokus_icon` VALUES (188, '2', 'music', '5', '1');
INSERT INTO `fokus_icon` VALUES (189, '2', 'music', '6', '1');
INSERT INTO `fokus_icon` VALUES (190, '2', 'search', '1', '1');
INSERT INTO `fokus_icon` VALUES (191, '2', 'search', '2', '1');
INSERT INTO `fokus_icon` VALUES (192, '2', 'search', '3', '1');
INSERT INTO `fokus_icon` VALUES (193, '2', 'search', '4', '1');
INSERT INTO `fokus_icon` VALUES (194, '2', 'search', '5', '1');
INSERT INTO `fokus_icon` VALUES (195, '2', 'search', '6', '1');
INSERT INTO `fokus_icon` VALUES (196, '2', 'envelope-o', '1', '1');
INSERT INTO `fokus_icon` VALUES (197, '2', 'envelope-o', '2', '1');
INSERT INTO `fokus_icon` VALUES (198, '2', 'envelope-o', '3', '1');
INSERT INTO `fokus_icon` VALUES (199, '2', 'envelope-o', '4', '1');
INSERT INTO `fokus_icon` VALUES (200, '2', 'envelope-o', '5', '1');
INSERT INTO `fokus_icon` VALUES (201, '2', 'envelope-o', '6', '1');
INSERT INTO `fokus_icon` VALUES (204, '2', 'heart', '1', '1');
INSERT INTO `fokus_icon` VALUES (205, '2', 'heart', '2', '1');
INSERT INTO `fokus_icon` VALUES (206, '2', 'heart', '3', '1');
INSERT INTO `fokus_icon` VALUES (207, '2', 'heart', '4', '1');
INSERT INTO `fokus_icon` VALUES (208, '2', 'heart', '5', '1');
INSERT INTO `fokus_icon` VALUES (209, '2', 'heart', '6', '1');
INSERT INTO `fokus_icon` VALUES (213, '2', 'star', '1', '1');
INSERT INTO `fokus_icon` VALUES (214, '2', 'star', '2', '1');
INSERT INTO `fokus_icon` VALUES (215, '2', 'star', '3', '1');
INSERT INTO `fokus_icon` VALUES (216, '2', 'star', '4', '1');
INSERT INTO `fokus_icon` VALUES (217, '2', 'star', '5', '1');
INSERT INTO `fokus_icon` VALUES (218, '2', 'star', '6', '1');
INSERT INTO `fokus_icon` VALUES (219, '2', 'star-o', '1', '1');
INSERT INTO `fokus_icon` VALUES (220, '2', 'star-o', '2', '1');
INSERT INTO `fokus_icon` VALUES (221, '2', 'star-o', '3', '1');
INSERT INTO `fokus_icon` VALUES (222, '2', 'star-o', '4', '1');
INSERT INTO `fokus_icon` VALUES (223, '2', 'star-o', '5', '1');
INSERT INTO `fokus_icon` VALUES (224, '2', 'star-o', '6', '1');
INSERT INTO `fokus_icon` VALUES (225, '2', 'user', '1', '1');
INSERT INTO `fokus_icon` VALUES (226, '2', 'user', '2', '1');
INSERT INTO `fokus_icon` VALUES (227, '2', 'user', '3', '1');
INSERT INTO `fokus_icon` VALUES (228, '2', 'user', '4', '1');
INSERT INTO `fokus_icon` VALUES (229, '2', 'user', '5', '1');
INSERT INTO `fokus_icon` VALUES (230, '2', 'user', '6', '1');
INSERT INTO `fokus_icon` VALUES (231, '2', 'th-large', '1', '1');
INSERT INTO `fokus_icon` VALUES (232, '2', 'th-large', '2', '1');
INSERT INTO `fokus_icon` VALUES (233, '2', 'th-large', '3', '1');
INSERT INTO `fokus_icon` VALUES (234, '2', 'th-large', '4', '1');
INSERT INTO `fokus_icon` VALUES (235, '2', 'th-large', '5', '1');
INSERT INTO `fokus_icon` VALUES (236, '2', 'th-large', '6', '1');
INSERT INTO `fokus_icon` VALUES (237, '2', 'th', '1', '1');
INSERT INTO `fokus_icon` VALUES (238, '2', 'th', '2', '1');
INSERT INTO `fokus_icon` VALUES (239, '2', 'th', '3', '1');
INSERT INTO `fokus_icon` VALUES (240, '2', 'th', '4', '1');
INSERT INTO `fokus_icon` VALUES (241, '2', 'th', '5', '1');
INSERT INTO `fokus_icon` VALUES (242, '2', 'th', '6', '1');
INSERT INTO `fokus_icon` VALUES (243, '2', 'th-list', '1', '1');
INSERT INTO `fokus_icon` VALUES (244, '2', 'th-list', '2', '1');
INSERT INTO `fokus_icon` VALUES (245, '2', 'th-list', '3', '1');
INSERT INTO `fokus_icon` VALUES (246, '2', 'th-list', '4', '1');
INSERT INTO `fokus_icon` VALUES (247, '2', 'th-list', '5', '1');
INSERT INTO `fokus_icon` VALUES (248, '2', 'th-list', '6', '1');
INSERT INTO `fokus_icon` VALUES (249, '2', 'check', '1', '1');
INSERT INTO `fokus_icon` VALUES (250, '2', 'check', '2', '1');
INSERT INTO `fokus_icon` VALUES (251, '2', 'check', '3', '1');
INSERT INTO `fokus_icon` VALUES (252, '2', 'check', '4', '1');
INSERT INTO `fokus_icon` VALUES (253, '2', 'check', '5', '1');
INSERT INTO `fokus_icon` VALUES (254, '2', 'check', '6', '1');
INSERT INTO `fokus_icon` VALUES (255, '2', 'remove', '1', '1');
INSERT INTO `fokus_icon` VALUES (256, '2', 'remove', '2', '1');
INSERT INTO `fokus_icon` VALUES (257, '2', 'remove', '3', '1');
INSERT INTO `fokus_icon` VALUES (258, '2', 'remove', '4', '1');
INSERT INTO `fokus_icon` VALUES (259, '2', 'remove', '5', '1');
INSERT INTO `fokus_icon` VALUES (260, '2', 'remove', '6', '1');
INSERT INTO `fokus_icon` VALUES (261, '2', 'close', '1', '1');
INSERT INTO `fokus_icon` VALUES (262, '2', 'close', '2', '1');
INSERT INTO `fokus_icon` VALUES (263, '2', 'close', '3', '1');
INSERT INTO `fokus_icon` VALUES (264, '2', 'close', '4', '1');
INSERT INTO `fokus_icon` VALUES (265, '2', 'close', '5', '1');
INSERT INTO `fokus_icon` VALUES (266, '2', 'close', '6', '1');
INSERT INTO `fokus_icon` VALUES (267, '2', 'times', '1', '1');
INSERT INTO `fokus_icon` VALUES (268, '2', 'times', '2', '1');
INSERT INTO `fokus_icon` VALUES (269, '2', 'times', '3', '1');
INSERT INTO `fokus_icon` VALUES (270, '2', 'times', '4', '1');
INSERT INTO `fokus_icon` VALUES (271, '2', 'times', '5', '1');
INSERT INTO `fokus_icon` VALUES (272, '2', 'times', '6', '1');
INSERT INTO `fokus_icon` VALUES (273, '2', 'search-plus', '1', '1');
INSERT INTO `fokus_icon` VALUES (274, '2', 'search-plus', '2', '1');
INSERT INTO `fokus_icon` VALUES (275, '2', 'search-plus', '3', '1');
INSERT INTO `fokus_icon` VALUES (276, '2', 'search-plus', '4', '1');
INSERT INTO `fokus_icon` VALUES (277, '2', 'search-plus', '4', '1');
INSERT INTO `fokus_icon` VALUES (278, '2', 'search-plus', '6', '1');
INSERT INTO `fokus_icon` VALUES (279, '2', 'search-minus', '1', '1');
INSERT INTO `fokus_icon` VALUES (280, '2', 'search-minus', '2', '1');
INSERT INTO `fokus_icon` VALUES (281, '2', 'search-minus', '3', '1');
INSERT INTO `fokus_icon` VALUES (282, '2', 'search-minus', '4', '1');
INSERT INTO `fokus_icon` VALUES (283, '2', 'search-minus', '5', '1');
INSERT INTO `fokus_icon` VALUES (284, '2', 'search-minus', '6', '1');

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
-- Records of fokus_menu
-- ----------------------------
INSERT INTO `fokus_menu` VALUES (1, 'Welcome', 'welcome', '1', 'welcome', NULL, '1', '::1', '111111', '2018-03-07 03:56:12', NULL, '2018-08-27 01:32:37');
INSERT INTO `fokus_menu` VALUES (9, 'Konfigurasi', '[\"group\",\"icon\",\"menu\",\"role\"]', '0', NULL, '[{\"parent\":\"9\",\"order\":\"1\",\"text\":\"Group\",\"icon_menu\":\"users\",\"icon\":\"fa fa-glass m--font-success\",\"controller\":\"group\"},{\"parent\":\"9\",\"order\":\"2\",\"text\":\"Icon\",\"icon_menu\":\"medical\",\"icon\":\"fa fa-glass m--font-success\",\"controller\":\"icon\"},{\"parent\":\"9\",\"order\":\"3\",\"text\":\"Menu\",\"icon_menu\":\"puzzle\",\"icon\":\"fa fa-glass m--font-success\",\"controller\":\"menu\"},{\"parent\":\"9\",\"order\":\"4\",\"text\":\"Role\",\"icon_menu\":\"web\",\"icon\":\"fa fa-glass m--font-success\",\"controller\":\"role\"}]', '1', '::1', '1', '2018-08-26 11:17:45', NULL, NULL);
INSERT INTO `fokus_menu` VALUES (10, 'Master Data', '[\"penulis\"]', '0', NULL, '[{\"parent\":\"10\",\"order\":\"1\",\"text\":\"Penulis\",\"icon_menu\":\"book\",\"icon\":\"fa fa-glass m--font-success\",\"controller\":\"penulis\"}]', '1', '::1', '1', '2018-08-26 11:19:16', NULL, NULL);

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
-- Records of fokus_role
-- ----------------------------
INSERT INTO `fokus_role` VALUES (1, 'Admin', '<p>ini adalah role admin</p>', '1', '::1', '1', '2018-08-26 11:27:52', '1', '2018-08-26 16:27:52');
INSERT INTO `fokus_role` VALUES (2, 'Penulis', '<p>ini adalah role untuk penulis</p>', '1', '::1', '1', '2018-08-26 11:28:13', '1', '2018-08-26 16:28:13');

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
