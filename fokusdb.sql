/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : fokusdb

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 25/08/2018 22:33:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for api
-- ----------------------------
DROP TABLE IF EXISTS `api`;
CREATE TABLE `api`  (
  `api_id` int(11) NOT NULL AUTO_INCREMENT,
  `api_tipe` enum('1','2','3') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '1=get,2=post,3=delete',
  `api_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `api_link` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `api_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `api_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '0=off,1=on',
  `api_createdby` int(255) DEFAULT NULL,
  `api_createddate` datetime(0) DEFAULT NULL,
  `api_lastupdate` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `api_updateby` int(11) DEFAULT NULL,
  `api_ip` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`api_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of api
-- ----------------------------
INSERT INTO `api` VALUES (1, '1', 'Login Nakes', 'http://localhost/rebuild_app/homedika/rest_api?auth=[tipe login]&flag=1', '<p>Fitur api untuk nakes. Auth tipe login ada 4 diantaranya</p><ol><li>Email (email)<br></li><li>Facebook Email (fmail)</li><li>Google Email (gmail)</li><li>No HP (nohp)</li></ol><p>Contoh link menggunakan login email di bawah ini : <br><a href=\"http://localhost/rebuild_app/homedika/rest_api?auth=email&amp;flag=1\">http://localhost/rebuild_app/homedika/rest_api?auth=email&amp;flag=1</a></p><p>Contoh hasil Output :&nbsp;</p><p>{</p><p>&nbsp; &nbsp; \"status\": 1,</p><p>&nbsp; &nbsp; \"result\": \"ali@mail.com\",</p><p>&nbsp; &nbsp; \"user_id\": \"18\"</p><p>}</p><p>field yang di pakai -&gt; \'user_nomail\'</p>', '1', 1, '2018-08-13 11:00:38', '2018-08-13 16:00:38', 1, '::1');
INSERT INTO `api` VALUES (2, '1', 'Login Nakes', 'http://localhost/rebuild_app/homedika/rest_api?auth=[tipe login]&flag=1', '<p>Fitur api untuk nakes. Auth tipe login ada 4 diantaranya</p><ol><li>Email (email)<br></li><li>Facebook Email (fmail)</li><li>Google Email (gmail)</li><li>No HP (nohp)</li></ol><p>Contoh link menggunakan login email di bawah ini : <br><a href=\"http://localhost/rebuild_app/homedika/rest_api?auth=email&amp;flag=1\">http://localhost/rebuild_app/homedika/rest_api?auth=email&amp;flag=1</a></p><p>Contoh hasil Output :&nbsp;</p><p>{</p><p>&nbsp; &nbsp; \"status\": 1,</p><p>&nbsp; &nbsp; \"result\": \"ali@mail.com\",</p><p>&nbsp; &nbsp; \"user_id\": \"18\"</p><p>}</p><p>field yang di pakai -&gt; \'user_nomail\'</p>', NULL, NULL, NULL, '2018-08-13 16:11:36', 1, '::1');
INSERT INTO `api` VALUES (3, '2', 'Update Profile Pasien', 'http://localhost/rebuild_app/homedika/rest_api?tipe=profile&auth=update&keys=6f4922', '<p>Field yang di lempar adalah</p><ol><li>user_nama</li><li>user_email</li><li>user_jenmin</li><li>user_temlahir</li><li>user_tgllahir</li><li>user_golrah</li><li>user_rhesus</li><li>user_nohp</li><li>user_foto</li></ol><p>Parameter get <b>keys</b>&nbsp;adalah parameter field user_id</p>', '1', 1, '2018-08-13 11:40:30', '2018-08-13 16:40:30', NULL, '::1');
INSERT INTO `api` VALUES (4, '1', 'Data Alamat Pasien', 'http://localhost/rebuild_app/homedika/rest_api?type=alamatPasien&keys=45c48c', '<p>API untuk menampilkan informasi alamat pasien. Kyes adalah user id dari pasien. Contoh format output data json :&nbsp;</p><p>[</p><p>&nbsp; &nbsp; {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; \"detsen_userid\": \"9\",</p><p>&nbsp; &nbsp; &nbsp; &nbsp; \"detsen_judul\": \"Kantor Baru\",</p><p>&nbsp; &nbsp; &nbsp; &nbsp; \"detsen_alamat\": \"&lt;p&gt;jln. kebagusan raya no 192&lt;/p&gt;\",</p><p>&nbsp; &nbsp; &nbsp; &nbsp; \"detsen_kotaprov\": \"Pasar Minggu, Jakarta Selatan\",</p><p>&nbsp; &nbsp; &nbsp; &nbsp; \"detsen_kodepos\": \"12345\",</p><p>&nbsp; &nbsp; &nbsp; &nbsp; \"detsen_koordinat_long\": \"Koordinat Long\",</p><p>&nbsp; &nbsp; &nbsp; &nbsp; \"detsen_koordinat_lat\": \"Koordinat Lat\"</p><p>&nbsp; &nbsp; }</p><p>]</p>', '1', 1, '2018-08-14 04:23:01', '2018-08-14 09:23:01', NULL, '::1');
INSERT INTO `api` VALUES (5, '2', 'Create Data Alamat Pasein', 'http://localhost/rebuild_app/homedika/rest_api?tipe=alamatPasien&auth=create&keys=45c48c', '<p>API untuk membuat data alamat pasien.&nbsp; Yang nantinya alamat pasien ini bisa di input berulang-ulang, artinya 1 pasien bisa punya beberapa alamat.&nbsp;</p><p>Keys di atas adalah data user_id pasien. Beberapa list field yang di input adalah :</p><ol><li>detsen_judul</li><li>detsen_alamat</li><li>detsen_kotaprov</li><li>detsen_kodepos</li><li>detsen_koordinat_long</li><li>detsen_koordinat_lat<br></li></ol>', '1', 1, '2018-08-14 04:49:38', '2018-08-14 09:49:38', NULL, '::1');
INSERT INTO `api` VALUES (6, '2', 'Update Alamat Pasien', 'http://localhost/rebuild_app/homedika/rest_api?tipe=alamatPasien&auth=update&keys=45c48c', '<p>Fiture edit data alamat pasien. Keys merupakan field user_id pasien. Beberapa field yang dijadikan inputan antara lain :&nbsp;</p><ol><li>detsen_judul</li><li>detsen_alamat</li><li>detsen_kotaprov</li><li>detsen_kodepos</li><li>detsen_koordinat_long</li><li>detsen_koordinat_lat</li><li>detsen_id<br></li></ol>', '1', 1, '2018-08-14 05:07:31', '2018-08-14 10:07:31', NULL, '::1');
INSERT INTO `api` VALUES (7, '1', 'Hapus Alamat Pasien', 'http://localhost/rebuild_app/homedika/rest_api?tipe=alamatPasien&keys=e4da3b', '<p>Api untuk menghapus data alamat pasien. Keys diatas adalah field detsen_id.</p>', '1', 1, '2018-08-14 05:22:48', '2018-08-14 10:22:48', NULL, '::1');

-- ----------------------------
-- Table structure for config_menu
-- ----------------------------
DROP TABLE IF EXISTS `config_menu`;
CREATE TABLE `config_menu`  (
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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of config_menu
-- ----------------------------
INSERT INTO `config_menu` VALUES (1, 'Welcome', 'welcome', '1', 'welcome', NULL, '1', '::1', '111111', '2018-03-07 03:56:12', '111111', '2018-03-13 03:54:22');
INSERT INTO `config_menu` VALUES (3, 'Config', '[\"admin\",\"menu\",\"group\",\"icon\",\"role\",\"api\"]', NULL, NULL, '[{\"parent\":\"3\",\"order\":\"1\",\"text\":\"Admin\",\"icon_menu\":\"profile-1\",\"icon\":\"fa fa-glass m--font-success |admin|\",\"controller\":\"admin\"},{\"parent\":\"3\",\"order\":\"2\",\"text\":\"Menu\",\"icon_menu\":\"puzzle\",\"icon\":\"fa fa-glass m--font-success |menu|\",\"controller\":\"menu\"},{\"parent\":\"3\",\"order\":\"3\",\"text\":\"Group\",\"icon_menu\":\"users\",\"icon\":\"fa fa-glass m--font-danger |group|\",\"controller\":\"group\"},{\"parent\":\"3\",\"order\":\"4\",\"text\":\"Icon\",\"icon_menu\":\"medical\",\"icon\":\"fa fa-glass m--font-info |icon|\",\"controller\":\"icon\"},{\"parent\":\"3\",\"order\":\"5\",\"text\":\"Role\",\"icon_menu\":\"web\",\"icon\":\"fa fa-glass m--font-danger |role|\",\"controller\":\"role\"},{\"parent\":\"3\",\"order\":\"6\",\"text\":\"API\",\"icon_menu\":\"paper-plane\",\"icon\":\"fa fa-glass m--font-success\",\"controller\":\"api\"}]', '1', '::1', '111111', '2018-03-07 04:12:50', '1', '2018-08-13 09:31:52');
INSERT INTO `config_menu` VALUES (6, 'Master Data', '[\"faq\",\"kontak\",\"sadaten\",\"tentang\",\"nakes\",\"pasien\",\"layanan\",\"doktipe\"]', NULL, NULL, '[{\"parent\":\"6\",\"order\":\"1\",\"text\":\"FAQ\",\"icon_menu\":\"questions-circular-button\",\"icon\":\"fa fa-glass m--font-success\",\"controller\":\"faq\"},{\"parent\":\"6\",\"order\":\"2\",\"text\":\"Kontak\",\"icon_menu\":\"support\",\"icon\":\"fa fa-glass m--font-success\",\"controller\":\"kontak\"},{\"parent\":\"6\",\"order\":\"3\",\"text\":\"Syarat dan Ketentuan\",\"icon_menu\":\"alarm-1\",\"icon\":\"fa fa-glass m--font-success\",\"controller\":\"sadaten\"},{\"parent\":\"6\",\"order\":\"4\",\"text\":\"Tentang\",\"icon_menu\":\"information\",\"icon\":\"fa fa-glass m--font-success\",\"controller\":\"tentang\"},{\"parent\":\"6\",\"order\":\"5\",\"text\":\"Nakes ( Dokter )\",\"icon_menu\":\"profile-1\",\"icon\":\"fa fa-glass m--font-success\",\"controller\":\"nakes\"},{\"parent\":\"6\",\"order\":\"6\",\"text\":\"Pasien\",\"icon_menu\":\"profile\",\"icon\":\"fa fa-glass m--font-success\",\"controller\":\"pasien\"},{\"parent\":\"6\",\"order\":\"7\",\"text\":\"Layanan\",\"icon_menu\":\"book\",\"icon\":\"fa fa-glass m--font-success\",\"controller\":\"layanan\"},{\"parent\":\"6\",\"order\":\"8\",\"text\":\"Tipe Dokumen\",\"icon_menu\":\"book\",\"icon\":\"fa fa-glass m--font-success\",\"controller\":\"doktipe\"}]', '1', '::1', '1', '2018-08-08 16:10:22', '33', '2018-08-23 11:32:41');

-- ----------------------------
-- Table structure for cuti_icon
-- ----------------------------
DROP TABLE IF EXISTS `cuti_icon`;
CREATE TABLE `cuti_icon`  (
  `icon_id` int(11) NOT NULL AUTO_INCREMENT,
  `icon_tipe` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '1 = flaticon, 2 = fa',
  `icon_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `icon_color` enum('1','2','3','4','5','6') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '1 = success, 2 = warning, 3 = danger, 4 = info, 5 = primary, 6 = secondary',
  `icon_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '0 = off, 1 = on',
  PRIMARY KEY (`icon_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 285 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cuti_icon
-- ----------------------------
INSERT INTO `cuti_icon` VALUES (1, '1', 'alarm-1', '', '1');
INSERT INTO `cuti_icon` VALUES (2, '1', 'music-2', '', '1');
INSERT INTO `cuti_icon` VALUES (3, '1', 'support', '', '1');
INSERT INTO `cuti_icon` VALUES (4, '1', 'stopwatch', '', '1');
INSERT INTO `cuti_icon` VALUES (5, '1', 'puzzle', '', '1');
INSERT INTO `cuti_icon` VALUES (6, '1', 'settings-1', '', '1');
INSERT INTO `cuti_icon` VALUES (7, '1', 'calendar-3', '', '1');
INSERT INTO `cuti_icon` VALUES (8, '1', 'add-circular-button', '', '1');
INSERT INTO `cuti_icon` VALUES (9, '1', 'plus', '', '1');
INSERT INTO `cuti_icon` VALUES (10, '1', 'menu-1', '', '1');
INSERT INTO `cuti_icon` VALUES (11, '1', 'menu', '', '1');
INSERT INTO `cuti_icon` VALUES (12, '1', 'piggy-bank', '', '1');
INSERT INTO `cuti_icon` VALUES (13, '1', 'confetti', '', '1');
INSERT INTO `cuti_icon` VALUES (14, '1', 'rocket', '', '1');
INSERT INTO `cuti_icon` VALUES (15, '1', 'gift', '', '1');
INSERT INTO `cuti_icon` VALUES (16, '1', 'truck', '', '1');
INSERT INTO `cuti_icon` VALUES (17, '1', 'user-settings', '', '1');
INSERT INTO `cuti_icon` VALUES (18, '1', 'user-add', '', '1');
INSERT INTO `cuti_icon` VALUES (19, '1', 'user-ok', '', '1');
INSERT INTO `cuti_icon` VALUES (20, '1', 'internet', '', '1');
INSERT INTO `cuti_icon` VALUES (21, '1', 'alert-2', '', '1');
INSERT INTO `cuti_icon` VALUES (22, '1', 'alarm', '', '1');
INSERT INTO `cuti_icon` VALUES (23, '1', 'grid-menu', '', '1');
INSERT INTO `cuti_icon` VALUES (24, '1', 'up-arrow-1', '', '1');
INSERT INTO `cuti_icon` VALUES (25, '1', 'more-1', '', '1');
INSERT INTO `cuti_icon` VALUES (26, '1', 'more-v3', '', '1');
INSERT INTO `cuti_icon` VALUES (27, '1', 'lock-1', '', '1');
INSERT INTO `cuti_icon` VALUES (28, '1', 'profile-1', '', '1');
INSERT INTO `cuti_icon` VALUES (29, '1', 'users', '', '1');
INSERT INTO `cuti_icon` VALUES (30, '1', 'map-location', '', '1');
INSERT INTO `cuti_icon` VALUES (31, '1', 'placeholder-2', '', '1');
INSERT INTO `cuti_icon` VALUES (32, '1', 'route', '', '1');
INSERT INTO `cuti_icon` VALUES (33, '1', 'more-v4', '', '1');
INSERT INTO `cuti_icon` VALUES (34, '1', 'lock', '', '1');
INSERT INTO `cuti_icon` VALUES (35, '1', 'multimedia-2', '', '1');
INSERT INTO `cuti_icon` VALUES (36, '1', 'add', '', '1');
INSERT INTO `cuti_icon` VALUES (37, '1', 'more-v5', '', '1');
INSERT INTO `cuti_icon` VALUES (38, '1', 'more-v6', '', '1');
INSERT INTO `cuti_icon` VALUES (39, '1', 'grid-menu-v2', '', '1');
INSERT INTO `cuti_icon` VALUES (40, '1', 'suitcase', '', '1');
INSERT INTO `cuti_icon` VALUES (41, '1', 'app', '', '1');
INSERT INTO `cuti_icon` VALUES (42, '1', 'interface-9', '', '1');
INSERT INTO `cuti_icon` VALUES (43, '1', 'time-3', '', '1');
INSERT INTO `cuti_icon` VALUES (44, '1', 'list-3', '', '1');
INSERT INTO `cuti_icon` VALUES (45, '1', 'list-2', '', '1');
INSERT INTO `cuti_icon` VALUES (46, '1', 'file-1', '', '1');
INSERT INTO `cuti_icon` VALUES (47, '1', 'folder-4', '', '1');
INSERT INTO `cuti_icon` VALUES (48, '1', 'folder-3', '', '1');
INSERT INTO `cuti_icon` VALUES (49, '1', 'folder-2', '', '1');
INSERT INTO `cuti_icon` VALUES (50, '1', 'folder-1', '', '1');
INSERT INTO `cuti_icon` VALUES (51, '1', 'time-2', '', '1');
INSERT INTO `cuti_icon` VALUES (52, '1', 'search-1', '', '1');
INSERT INTO `cuti_icon` VALUES (53, '1', 'tool-1', '', '1');
INSERT INTO `cuti_icon` VALUES (54, '1', 'security', '', '1');
INSERT INTO `cuti_icon` VALUES (55, '1', 'interface-8', '', '1');
INSERT INTO `cuti_icon` VALUES (56, '1', 'interface-7', '', '1');
INSERT INTO `cuti_icon` VALUES (57, '1', 'interface-6', '', '1');
INSERT INTO `cuti_icon` VALUES (58, '1', 'placeholder-1', '', '1');
INSERT INTO `cuti_icon` VALUES (59, '1', 'placeholder', '', '1');
INSERT INTO `cuti_icon` VALUES (60, '1', 'web', '', '1');
INSERT INTO `cuti_icon` VALUES (61, '1', 'multimedia-1', '', '1');
INSERT INTO `cuti_icon` VALUES (62, '1', 'tabs', '', '1');
INSERT INTO `cuti_icon` VALUES (63, '1', 'signs-2', '', '1');
INSERT INTO `cuti_icon` VALUES (64, '1', 'interface-5', '', '1');
INSERT INTO `cuti_icon` VALUES (65, '1', 'network', '', '1');
INSERT INTO `cuti_icon` VALUES (66, '1', 'share', '', '1');
INSERT INTO `cuti_icon` VALUES (67, '1', 'info', '', '1');
INSERT INTO `cuti_icon` VALUES (68, '1', 'exclamation-2', '', '1');
INSERT INTO `cuti_icon` VALUES (69, '1', 'music', '', '1');
INSERT INTO `cuti_icon` VALUES (70, '1', 'medical', '', '1');
INSERT INTO `cuti_icon` VALUES (71, '1', 'imac', '', '1');
INSERT INTO `cuti_icon` VALUES (72, '1', 'profile', '', '1');
INSERT INTO `cuti_icon` VALUES (73, '1', 'time-1', '', '1');
INSERT INTO `cuti_icon` VALUES (74, '1', 'list-1', '', '1');
INSERT INTO `cuti_icon` VALUES (75, '1', 'multimedia', '', '1');
INSERT INTO `cuti_icon` VALUES (76, '1', 'interface-4', '', '1');
INSERT INTO `cuti_icon` VALUES (77, '1', 'file', '', '1');
INSERT INTO `cuti_icon` VALUES (78, '1', 'background', '', '1');
INSERT INTO `cuti_icon` VALUES (79, '1', 'chat-1', '', '1');
INSERT INTO `cuti_icon` VALUES (80, '1', 'graph', '', '1');
INSERT INTO `cuti_icon` VALUES (81, '1', 'pie-chart', '', '1');
INSERT INTO `cuti_icon` VALUES (82, '1', 'bag', '', '1');
INSERT INTO `cuti_icon` VALUES (83, '1', 'cart', '', '1');
INSERT INTO `cuti_icon` VALUES (84, '1', 'warning-2', '', '1');
INSERT INTO `cuti_icon` VALUES (85, '1', 'download', '', '1');
INSERT INTO `cuti_icon` VALUES (86, '1', 'edit-1', '', '1');
INSERT INTO `cuti_icon` VALUES (87, '1', 'visible', '', '1');
INSERT INTO `cuti_icon` VALUES (88, '1', 'line-graph', '', '1');
INSERT INTO `cuti_icon` VALUES (89, '1', 'browser', '', '1');
INSERT INTO `cuti_icon` VALUES (90, '1', 'statistics', '', '1');
INSERT INTO `cuti_icon` VALUES (91, '1', 'paper-plane', '', '1');
INSERT INTO `cuti_icon` VALUES (92, '1', 'cogwheel-2', '', '1');
INSERT INTO `cuti_icon` VALUES (93, '1', 'lifebuoy', '', '1');
INSERT INTO `cuti_icon` VALUES (94, '1', 'settings', '', '1');
INSERT INTO `cuti_icon` VALUES (96, '1', 'user', '', '1');
INSERT INTO `cuti_icon` VALUES (97, '1', 'apps', '', '1');
INSERT INTO `cuti_icon` VALUES (98, '1', 'clock-1', '', '1');
INSERT INTO `cuti_icon` VALUES (99, '1', 'close', '', '1');
INSERT INTO `cuti_icon` VALUES (100, '1', 'pin', '', '1');
INSERT INTO `cuti_icon` VALUES (101, '1', 'circle', '', '1');
INSERT INTO `cuti_icon` VALUES (102, '1', 'interface-3', '', '1');
INSERT INTO `cuti_icon` VALUES (103, '1', 'technology-1', '', '1');
INSERT INTO `cuti_icon` VALUES (104, '1', 'danger', '', '1');
INSERT INTO `cuti_icon` VALUES (105, '1', 'exclamation-square', '', '1');
INSERT INTO `cuti_icon` VALUES (106, '1', 'cancel', '', '1');
INSERT INTO `cuti_icon` VALUES (107, '1', 'calendar-2', '', '1');
INSERT INTO `cuti_icon` VALUES (108, '1', 'warning-sign', '', '1');
INSERT INTO `cuti_icon` VALUES (109, '1', 'more', '', '1');
INSERT INTO `cuti_icon` VALUES (110, '1', 'exclamation-1', '', '1');
INSERT INTO `cuti_icon` VALUES (111, '1', 'cogwheel-1', '', '1');
INSERT INTO `cuti_icon` VALUES (112, '1', 'more-v2', '', '1');
INSERT INTO `cuti_icon` VALUES (113, '1', 'up-arrow', '', '1');
INSERT INTO `cuti_icon` VALUES (114, '1', 'computer', '', '1');
INSERT INTO `cuti_icon` VALUES (115, '1', 'alert-1', '', '1');
INSERT INTO `cuti_icon` VALUES (116, '1', 'alert-off', '', '1');
INSERT INTO `cuti_icon` VALUES (117, '1', 'map', '', '1');
INSERT INTO `cuti_icon` VALUES (118, '1', 'interface-2', '', '1');
INSERT INTO `cuti_icon` VALUES (119, '1', 'graphic-2', '', '1');
INSERT INTO `cuti_icon` VALUES (120, '1', 'cogwheel', '', '1');
INSERT INTO `cuti_icon` VALUES (121, '1', 'alert', '', '1');
INSERT INTO `cuti_icon` VALUES (122, '1', 'folder', '', '1');
INSERT INTO `cuti_icon` VALUES (123, '1', 'interface-1', '', '1');
INSERT INTO `cuti_icon` VALUES (124, '1', 'interface', '', '1');
INSERT INTO `cuti_icon` VALUES (125, '1', 'calendar-1', '', '1');
INSERT INTO `cuti_icon` VALUES (126, '1', 'time', '', '1');
INSERT INTO `cuti_icon` VALUES (127, '1', 'signs-1', '', '1');
INSERT INTO `cuti_icon` VALUES (128, '1', 'calendar', '', '1');
INSERT INTO `cuti_icon` VALUES (129, '1', 'chat', '', '1');
INSERT INTO `cuti_icon` VALUES (130, '1', 'infinity', '', '1');
INSERT INTO `cuti_icon` VALUES (131, '1', 'list', '', '1');
INSERT INTO `cuti_icon` VALUES (132, '1', 'bell', '', '1');
INSERT INTO `cuti_icon` VALUES (133, '1', 'delete', '', '1');
INSERT INTO `cuti_icon` VALUES (134, '1', 'squares-4', '', '1');
INSERT INTO `cuti_icon` VALUES (135, '1', 'clipboard', '', '1');
INSERT INTO `cuti_icon` VALUES (136, '1', 'shapes', '', '1');
INSERT INTO `cuti_icon` VALUES (137, '1', 'comment', '', '1');
INSERT INTO `cuti_icon` VALUES (139, '1', 'squares-3', '', '1');
INSERT INTO `cuti_icon` VALUES (140, '1', 'mark', '', '1');
INSERT INTO `cuti_icon` VALUES (141, '1', 'signs', '', '1');
INSERT INTO `cuti_icon` VALUES (142, '1', 'squares-2', '', '1');
INSERT INTO `cuti_icon` VALUES (143, '1', 'business', '', '1');
INSERT INTO `cuti_icon` VALUES (144, '1', 'car', '', '1');
INSERT INTO `cuti_icon` VALUES (145, '1', 'light', '', '1');
INSERT INTO `cuti_icon` VALUES (146, '1', 'information', '', '1');
INSERT INTO `cuti_icon` VALUES (147, '1', 'dashboard', '', '1');
INSERT INTO `cuti_icon` VALUES (148, '1', 'edit', '', '1');
INSERT INTO `cuti_icon` VALUES (149, '1', 'location', '', '1');
INSERT INTO `cuti_icon` VALUES (150, '1', 'technology', '', '1');
INSERT INTO `cuti_icon` VALUES (151, '1', 'exclamation', '', '1');
INSERT INTO `cuti_icon` VALUES (152, '1', 'tea-cup', '', '1');
INSERT INTO `cuti_icon` VALUES (153, '1', 'notes', '', '1');
INSERT INTO `cuti_icon` VALUES (154, '1', 'analytics', '', '1');
INSERT INTO `cuti_icon` VALUES (155, '1', 'transport', '', '1');
INSERT INTO `cuti_icon` VALUES (156, '1', 'layers', '', '1');
INSERT INTO `cuti_icon` VALUES (157, '1', 'book', '', '1');
INSERT INTO `cuti_icon` VALUES (158, '1', 'squares-1', '', '1');
INSERT INTO `cuti_icon` VALUES (159, '1', 'clock', '', '1');
INSERT INTO `cuti_icon` VALUES (160, '1', 'graphic-1', '', '1');
INSERT INTO `cuti_icon` VALUES (161, '1', 'symbol', '', '1');
INSERT INTO `cuti_icon` VALUES (162, '1', 'graphic', '', '1');
INSERT INTO `cuti_icon` VALUES (163, '1', 'tool', '', '1');
INSERT INTO `cuti_icon` VALUES (164, '1', 'laptop', '', '1');
INSERT INTO `cuti_icon` VALUES (165, '1', 'event-calendar-symbol', '', '1');
INSERT INTO `cuti_icon` VALUES (166, '1', 'logout', '', '1');
INSERT INTO `cuti_icon` VALUES (167, '1', 'refresh', '', '1');
INSERT INTO `cuti_icon` VALUES (168, '1', 'questions-circular-button', '', '1');
INSERT INTO `cuti_icon` VALUES (169, '1', 'search-magnifier-interface-symbol', '', '1');
INSERT INTO `cuti_icon` VALUES (170, '1', 'search', '', '1');
INSERT INTO `cuti_icon` VALUES (171, '1', 'attachment', '', '1');
INSERT INTO `cuti_icon` VALUES (172, '1', 'speech-bubble-1', '', '1');
INSERT INTO `cuti_icon` VALUES (173, '1', 'open-box', '', '1');
INSERT INTO `cuti_icon` VALUES (174, '1', 'coins', '', '1');
INSERT INTO `cuti_icon` VALUES (175, '1', 'speech-bubble', '', '1');
INSERT INTO `cuti_icon` VALUES (176, '1', 'squares', '', '1');
INSERT INTO `cuti_icon` VALUES (177, '1', 'diagram', '', '1');
INSERT INTO `cuti_icon` VALUES (178, '2', 'glass', '1', '1');
INSERT INTO `cuti_icon` VALUES (179, '2', 'glass', '2', '1');
INSERT INTO `cuti_icon` VALUES (180, '2', 'glass', '3', '1');
INSERT INTO `cuti_icon` VALUES (181, '2', 'glass', '4', '1');
INSERT INTO `cuti_icon` VALUES (182, '2', 'glass', '5', '1');
INSERT INTO `cuti_icon` VALUES (183, '2', 'glass', '6', '1');
INSERT INTO `cuti_icon` VALUES (184, '2', 'music', '1', '1');
INSERT INTO `cuti_icon` VALUES (185, '2', 'music', '2', '1');
INSERT INTO `cuti_icon` VALUES (186, '2', 'music', '3', '1');
INSERT INTO `cuti_icon` VALUES (187, '2', 'music', '4', '1');
INSERT INTO `cuti_icon` VALUES (188, '2', 'music', '5', '1');
INSERT INTO `cuti_icon` VALUES (189, '2', 'music', '6', '1');
INSERT INTO `cuti_icon` VALUES (190, '2', 'search', '1', '1');
INSERT INTO `cuti_icon` VALUES (191, '2', 'search', '2', '1');
INSERT INTO `cuti_icon` VALUES (192, '2', 'search', '3', '1');
INSERT INTO `cuti_icon` VALUES (193, '2', 'search', '4', '1');
INSERT INTO `cuti_icon` VALUES (194, '2', 'search', '5', '1');
INSERT INTO `cuti_icon` VALUES (195, '2', 'search', '6', '1');
INSERT INTO `cuti_icon` VALUES (196, '2', 'envelope-o', '1', '1');
INSERT INTO `cuti_icon` VALUES (197, '2', 'envelope-o', '2', '1');
INSERT INTO `cuti_icon` VALUES (198, '2', 'envelope-o', '3', '1');
INSERT INTO `cuti_icon` VALUES (199, '2', 'envelope-o', '4', '1');
INSERT INTO `cuti_icon` VALUES (200, '2', 'envelope-o', '5', '1');
INSERT INTO `cuti_icon` VALUES (201, '2', 'envelope-o', '6', '1');
INSERT INTO `cuti_icon` VALUES (204, '2', 'heart', '1', '1');
INSERT INTO `cuti_icon` VALUES (205, '2', 'heart', '2', '1');
INSERT INTO `cuti_icon` VALUES (206, '2', 'heart', '3', '1');
INSERT INTO `cuti_icon` VALUES (207, '2', 'heart', '4', '1');
INSERT INTO `cuti_icon` VALUES (208, '2', 'heart', '5', '1');
INSERT INTO `cuti_icon` VALUES (209, '2', 'heart', '6', '1');
INSERT INTO `cuti_icon` VALUES (213, '2', 'star', '1', '1');
INSERT INTO `cuti_icon` VALUES (214, '2', 'star', '2', '1');
INSERT INTO `cuti_icon` VALUES (215, '2', 'star', '3', '1');
INSERT INTO `cuti_icon` VALUES (216, '2', 'star', '4', '1');
INSERT INTO `cuti_icon` VALUES (217, '2', 'star', '5', '1');
INSERT INTO `cuti_icon` VALUES (218, '2', 'star', '6', '1');
INSERT INTO `cuti_icon` VALUES (219, '2', 'star-o', '1', '1');
INSERT INTO `cuti_icon` VALUES (220, '2', 'star-o', '2', '1');
INSERT INTO `cuti_icon` VALUES (221, '2', 'star-o', '3', '1');
INSERT INTO `cuti_icon` VALUES (222, '2', 'star-o', '4', '1');
INSERT INTO `cuti_icon` VALUES (223, '2', 'star-o', '5', '1');
INSERT INTO `cuti_icon` VALUES (224, '2', 'star-o', '6', '1');
INSERT INTO `cuti_icon` VALUES (225, '2', 'user', '1', '1');
INSERT INTO `cuti_icon` VALUES (226, '2', 'user', '2', '1');
INSERT INTO `cuti_icon` VALUES (227, '2', 'user', '3', '1');
INSERT INTO `cuti_icon` VALUES (228, '2', 'user', '4', '1');
INSERT INTO `cuti_icon` VALUES (229, '2', 'user', '5', '1');
INSERT INTO `cuti_icon` VALUES (230, '2', 'user', '6', '1');
INSERT INTO `cuti_icon` VALUES (231, '2', 'th-large', '1', '1');
INSERT INTO `cuti_icon` VALUES (232, '2', 'th-large', '2', '1');
INSERT INTO `cuti_icon` VALUES (233, '2', 'th-large', '3', '1');
INSERT INTO `cuti_icon` VALUES (234, '2', 'th-large', '4', '1');
INSERT INTO `cuti_icon` VALUES (235, '2', 'th-large', '5', '1');
INSERT INTO `cuti_icon` VALUES (236, '2', 'th-large', '6', '1');
INSERT INTO `cuti_icon` VALUES (237, '2', 'th', '1', '1');
INSERT INTO `cuti_icon` VALUES (238, '2', 'th', '2', '1');
INSERT INTO `cuti_icon` VALUES (239, '2', 'th', '3', '1');
INSERT INTO `cuti_icon` VALUES (240, '2', 'th', '4', '1');
INSERT INTO `cuti_icon` VALUES (241, '2', 'th', '5', '1');
INSERT INTO `cuti_icon` VALUES (242, '2', 'th', '6', '1');
INSERT INTO `cuti_icon` VALUES (243, '2', 'th-list', '1', '1');
INSERT INTO `cuti_icon` VALUES (244, '2', 'th-list', '2', '1');
INSERT INTO `cuti_icon` VALUES (245, '2', 'th-list', '3', '1');
INSERT INTO `cuti_icon` VALUES (246, '2', 'th-list', '4', '1');
INSERT INTO `cuti_icon` VALUES (247, '2', 'th-list', '5', '1');
INSERT INTO `cuti_icon` VALUES (248, '2', 'th-list', '6', '1');
INSERT INTO `cuti_icon` VALUES (249, '2', 'check', '1', '1');
INSERT INTO `cuti_icon` VALUES (250, '2', 'check', '2', '1');
INSERT INTO `cuti_icon` VALUES (251, '2', 'check', '3', '1');
INSERT INTO `cuti_icon` VALUES (252, '2', 'check', '4', '1');
INSERT INTO `cuti_icon` VALUES (253, '2', 'check', '5', '1');
INSERT INTO `cuti_icon` VALUES (254, '2', 'check', '6', '1');
INSERT INTO `cuti_icon` VALUES (255, '2', 'remove', '1', '1');
INSERT INTO `cuti_icon` VALUES (256, '2', 'remove', '2', '1');
INSERT INTO `cuti_icon` VALUES (257, '2', 'remove', '3', '1');
INSERT INTO `cuti_icon` VALUES (258, '2', 'remove', '4', '1');
INSERT INTO `cuti_icon` VALUES (259, '2', 'remove', '5', '1');
INSERT INTO `cuti_icon` VALUES (260, '2', 'remove', '6', '1');
INSERT INTO `cuti_icon` VALUES (261, '2', 'close', '1', '1');
INSERT INTO `cuti_icon` VALUES (262, '2', 'close', '2', '1');
INSERT INTO `cuti_icon` VALUES (263, '2', 'close', '3', '1');
INSERT INTO `cuti_icon` VALUES (264, '2', 'close', '4', '1');
INSERT INTO `cuti_icon` VALUES (265, '2', 'close', '5', '1');
INSERT INTO `cuti_icon` VALUES (266, '2', 'close', '6', '1');
INSERT INTO `cuti_icon` VALUES (267, '2', 'times', '1', '1');
INSERT INTO `cuti_icon` VALUES (268, '2', 'times', '2', '1');
INSERT INTO `cuti_icon` VALUES (269, '2', 'times', '3', '1');
INSERT INTO `cuti_icon` VALUES (270, '2', 'times', '4', '1');
INSERT INTO `cuti_icon` VALUES (271, '2', 'times', '5', '1');
INSERT INTO `cuti_icon` VALUES (272, '2', 'times', '6', '1');
INSERT INTO `cuti_icon` VALUES (273, '2', 'search-plus', '1', '1');
INSERT INTO `cuti_icon` VALUES (274, '2', 'search-plus', '2', '1');
INSERT INTO `cuti_icon` VALUES (275, '2', 'search-plus', '3', '1');
INSERT INTO `cuti_icon` VALUES (276, '2', 'search-plus', '4', '1');
INSERT INTO `cuti_icon` VALUES (277, '2', 'search-plus', '4', '1');
INSERT INTO `cuti_icon` VALUES (278, '2', 'search-plus', '6', '1');
INSERT INTO `cuti_icon` VALUES (279, '2', 'search-minus', '1', '1');
INSERT INTO `cuti_icon` VALUES (280, '2', 'search-minus', '2', '1');
INSERT INTO `cuti_icon` VALUES (281, '2', 'search-minus', '3', '1');
INSERT INTO `cuti_icon` VALUES (282, '2', 'search-minus', '4', '1');
INSERT INTO `cuti_icon` VALUES (283, '2', 'search-minus', '5', '1');
INSERT INTO `cuti_icon` VALUES (284, '2', 'search-minus', '6', '1');

-- ----------------------------
-- Table structure for detail_pasien
-- ----------------------------
DROP TABLE IF EXISTS `detail_pasien`;
CREATE TABLE `detail_pasien`  (
  `detsen_id` int(11) NOT NULL AUTO_INCREMENT,
  `detsen_userid` int(11) DEFAULT NULL,
  `detsen_judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `detsen_alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `detsen_kotaprov` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `detsen_kodepos` int(11) DEFAULT NULL,
  `detsen_koordinat_long` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `detsen_koordinat_lat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `detsen_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '1' COMMENT '0=of,1=on',
  PRIMARY KEY (`detsen_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detail_pasien
-- ----------------------------
INSERT INTO `detail_pasien` VALUES (4, 9, 'Kantor Baru', '<p>jln. kebagusan raya no 192</p>', 'Pasar Minggu, Jakarta Selatan', 12345, 'Koordinat Long', 'Koordinat Lat', '1');
INSERT INTO `detail_pasien` VALUES (5, 37, 'test', 'tse', 'test', 0, 'test', 'test', '1');
INSERT INTO `detail_pasien` VALUES (6, 37, 'test', 'tse', 'test', 12345, 'test', 'test', '1');

-- ----------------------------
-- Table structure for dokumen_nakes
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_nakes`;
CREATE TABLE `dokumen_nakes`  (
  `doknak_id` int(11) NOT NULL AUTO_INCREMENT,
  `doknak_userid` int(11) DEFAULT NULL,
  `doknak_nomer` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `doknak_doktypeid` int(11) DEFAULT NULL,
  `doknak_link` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`doknak_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dokumen_nakes
-- ----------------------------
INSERT INTO `dokumen_nakes` VALUES (1, 40, 'DOK001', 1, 'ini inknya');
INSERT INTO `dokumen_nakes` VALUES (2, 40, 'DOK002', 3, 'ini link nomer 3');

-- ----------------------------
-- Table structure for faq_kategori
-- ----------------------------
DROP TABLE IF EXISTS `faq_kategori`;
CREATE TABLE `faq_kategori`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `flag` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '0=pasien, 1=nakes',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of faq_kategori
-- ----------------------------
INSERT INTO `faq_kategori` VALUES (1, 'PERTANYAAN UMUM', '0');
INSERT INTO `faq_kategori` VALUES (2, 'Med Visit', '1');
INSERT INTO `faq_kategori` VALUES (3, 'Med Talk', '1');
INSERT INTO `faq_kategori` VALUES (4, 'Med Visit', '0');
INSERT INTO `faq_kategori` VALUES (5, 'Med Talk', '0');
INSERT INTO `faq_kategori` VALUES (12, 'Pertanyaan Umum', '1');

-- ----------------------------
-- Table structure for faq_pertanyaan
-- ----------------------------
DROP TABLE IF EXISTS `faq_pertanyaan`;
CREATE TABLE `faq_pertanyaan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `faq_kategori_id` int(11) NOT NULL,
  `pertanyaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jawaban` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of faq_pertanyaan
-- ----------------------------
INSERT INTO `faq_pertanyaan` VALUES (1, 1, 'Apa itu Homedika ?', '<p><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Homedika.com adalah wirausaha sosial berbasis teknologi yang menghubungkan tenaga kesehatan dan fasilitas kesehatan dengan masyarakat untuk memberikan berbagai layanan kesehatan.</span><br></p>');
INSERT INTO `faq_pertanyaan` VALUES (2, 1, 'Apa keuntungan ikut Homedika ?', '<div style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify; padding-left: 3em;\"><u>Untuk keluarga/masyarakat/pasien</u><br></div><ul type=\"square\" style=\"margin-bottom: 10px; color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify; padding-left: 4em;\"><li><span style=\"font-weight: 700;\">Menghemat waktu&nbsp;</span>melalui layanan segera</li><li><span style=\"font-weight: 700;\">Meningkatkan kenyamanan dan kemudahan&nbsp;</span>mendapatkan layanan</li><li><span style=\"font-weight: 700;\">Menghemat waktu</span>&nbsp;melalui layanan gawat darurat</li><li>Dapat&nbsp;<span style=\"font-weight: 700;\">memilih tenaga kesehatan</span>&nbsp;sesuai keinginan</li><li><span style=\"font-weight: 700;\">Tanpa antri</span></li><li><span style=\"font-weight: 700;\">Tanpa transportasi</span></li></ul><div style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify; padding-left: 3em;\"><u>Untuk tenaga kesehatan</u><br></div><ul type=\"square\" style=\"margin-bottom: 10px; color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify; padding-left: 4em;\"><li><span style=\"font-weight: 700;\">Menentukan waktu praktek</span>&nbsp;kapanpun</li><li>Memberikan pelayanan kesehatan&nbsp;<span style=\"font-weight: 700;\">sesuai kemampuan</span></li><li><span style=\"font-weight: 700;\">Meningkatkan pendapatan</span></li><li><span style=\"font-weight: 700;\">Menentukan harga layanan</span>&nbsp;sendiri</li><li><span style=\"font-weight: 700;\">Meningkatkan produktivitas</span></li></ul>');
INSERT INTO `faq_pertanyaan` VALUES (3, 2, 'Apa saja syarat menjadi tenaga kesehatan di Homedika?', '<p><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Homedika.com menyediakan tenaga kesehatan yang terkualifikasi dan memenuhi syarat. Oleh karena itu syarat utama adalah anda memiliki ijazah profesi, Surat Tanda Registrasi (STR) masing-masing profesi, Sertifikat Kompetensi (Serkom). Namun Homedika.com tidak terbatas pada usia, wilayah, pengalaman, keahlian, siapapun yang telah mendapatkan pendidikan profesi tenaga ksehatan, memiliki STR dapat mendaftarkan diri sebagai tenaga kesehatan di Homedika.com.</span><br></p>');
INSERT INTO `faq_pertanyaan` VALUES (4, 2, 'Apakah tenaga medis harus memiliki Surat Izin Praktek?', '<p><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Bagi tenaga medis yang memiliki Surat Izin Praktek (SIP), anda bisa memberikan layanan kesehatan secara lengkap. Bagi yang tidak memiliki SIP, anda tetap bisa memberikan layanan kesehatan secara khusus yang tidak mengharuskan kepemilikan SIP sebagai syarat dan ketentuan layanan. Kami telah melakukan analisis dan kategorisasi layanan yang membutuhkan dan tidak membutuhkan SIP sebagai syarat dan ketentuannya.</span><br></p>');
INSERT INTO `faq_pertanyaan` VALUES (5, 2, 'Siapa saja tenaga medis yang dapat bergabung dengan homedika?', '<p><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Dokter umum, dokter gigi, perawat, bidan, ahli gizi, fisioterapis, apoteker, tenaga kesehatan masyarakat, analis laboratorium,</span><br></p>');
INSERT INTO `faq_pertanyaan` VALUES (6, 2, 'Apa saja layanan kesehatan yang disediakan oleh homedika?', '<ul style=\"margin-bottom: 10px; color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\"><li type=\"A\"><span style=\"font-weight: 700;\"><u>Dokter</u></span><ul><li type=\"square\">Homevisit</li><li type=\"square\">Promosi kesehatan / penyuluhan</li><li type=\"square\">Pengobatan masal</li><li type=\"square\">Layanan kesehatan sosial</li><li type=\"square\">Edukasi dan konsultasi</li><li type=\"square\">Layanan kedokteran lainnya</li></ul></li><span style=\"font-weight: 700;\"></span><li type=\"A\"><span style=\"font-weight: 700;\"><u>Dokter Gigi</u></span><ul><li type=\"square\">Promosi kesehatan / penyuluhan</li><li type=\"square\">Pengobatan masal</li><li type=\"square\">Layanan kesehatan sosial</li><li type=\"square\">Pendaftaran layanan di tempat praktek</li><li type=\"square\">Edukasi dan konsultasi</li><li type=\"square\">Layanan kedokteran gigi lainnya</li></ul></li><span style=\"font-weight: 700;\"></span><li type=\"A\"><span style=\"font-weight: 700;\"><u>Perawat</u></span><ul><li type=\"circle\">Homevisit:<ul><li type=\"square\">Pemasangan kateter (selang kencing) atau gangguan fungsi perkemihan</li><li type=\"square\">Pemasangan NGT (selang makan) atau sonde</li><li type=\"square\">Pemasangan infuse atau terapi cairan</li><li type=\"square\">Perawatan Suctioning atau pengisapan lender</li><li type=\"square\">Pemasangan oksigen atau oksigenasi</li><li type=\"square\">Perawatan luka diabetes / gangrene / DM</li><li type=\"square\">Perawatan luka bakar</li><li type=\"square\">Perawatan luka amputasi</li><li type=\"square\">Perawatan luka operasi atau pasca operasi bedah</li><li type=\"square\">Perawatan luka amputasi</li><li type=\"square\">Perawatan luka operasi atau pasca operasi bedah</li><li type=\"square\">Perawatan stoma atau kolostomi</li><li type=\"square\">Perawatan kulit wajah dan kecantikan</li><li type=\"square\">Perawatan bayi baru lahir</li><li type=\"square\">Perawatan balita</li><li type=\"square\">Perawatan lansia atau usia lanjut</li><li type=\"square\">Nursing home atau Personal Hygiene atau layanan perawatan kebersihan pasien</li><li type=\"square\">Perawatan kasus HIV / AIDS dan TBC</li><li type=\"square\">Perawatan sakit jantung kronis atau gagal jantung</li><li type=\"square\">Perawatan sakit paru atau sesak nafas</li><li type=\"square\">Perawatan sakit gangguan persayarafan atau stroke</li><li type=\"square\">Perawatan sakit asma atau pemberian nebulizer atau uap</li><li type=\"square\">Perawatan kelumpuhan atau disabilitas</li><li type=\"square\">Perawatan sakit kencing manis atau diabetes mellitus</li><li type=\"square\">Perawatan telinga hidung tenggorokan</li><li type=\"square\">Perawatan gangguan kesehatan mental</li><li type=\"square\">Nursing home personal hygiene</li><li type=\"square\">Layanan keperawatan lainnya</li><li type=\"square\">Promosi kesehatan / penyuluhan</li><li type=\"square\">Pengobatan masal</li><li type=\"square\">Layanan kesehatan sosial</li><li type=\"square\">Edukasi dan konsultasi</li></ul></li></ul></li><span style=\"font-weight: 700;\"></span><li type=\"A\"><span style=\"font-weight: 700;\"><u>Bidan</u></span><ul><li type=\"circle\">Homevisit:<ul><li type=\"square\">Perawatan Ibu Hamil</li><li type=\"square\">Perawatan ibu Nifas atau post partum atau pasca melahirkan</li><li type=\"square\">Perawatan KB</li><li type=\"square\">Imunisasi Balita</li><li type=\"square\">Imunisasi pranikah</li><li type=\"square\">Senam hamil</li><li type=\"square\">Memandikan dan pijat bayi</li><li type=\"square\">Breastcare / perawatan payudara</li><li type=\"square\">Promosi kesehatan / penyuluhan</li><li type=\"square\">Pengobatan masal</li><li type=\"square\">Layanan kesehatan sosial</li><li type=\"square\">Edukasi dan konsultasi</li><li type=\"square\">Layanan kebidanan lain</li></ul></li></ul></li><span style=\"font-weight: 700;\"></span><li type=\"A\"><span style=\"font-weight: 700;\"><u>Ahli Gizi</u></span><ul><li type=\"square\">Homevisit</li><li type=\"square\">Promosi kesehatan / penyuluhan</li><li type=\"square\">Pengobatan masal</li><li type=\"square\">Layanan kesehatan sosial</li><li type=\"square\">Edukasi dan konsultasi</li><li type=\"square\">Layanan Gizi lain</li></ul></li><span style=\"font-weight: 700;\"></span><li type=\"A\"><span style=\"font-weight: 700;\"><u>Fisioterapis</u></span><ul><li type=\"circle\">Homevisit:<ul><li type=\"square\">Perawatan fisioterapi dan rehabilitasi medik</li><li type=\"square\">Perawatan paket jasa inhalasi dan fisioterapi dada</li><li type=\"square\">Fisioterapi Tumbuh Kembang Anak</li><li type=\"square\">Fisioterapi Kesehatan dan Keselamatan Kerja</li><li type=\"square\">Fisioterapi Usia Lanjut</li><li type=\"square\">Fisioterapi Olahraga</li><li type=\"square\">Fisioterapi otot dan tulang</li><li type=\"square\">Fisioterapi jantung dan paru</li><li type=\"square\">Fisioterapi saraf</li><li type=\"square\">Fisioterapi kecacatan fisik</li><li type=\"square\">Promosi kesehatan / penyuluhan</li><li type=\"square\">Pengobatan masal</li><li type=\"square\">Layanan kesehatan sosial</li><li type=\"square\">Edukasi dan konsultasi</li><li type=\"square\">Layanan fisioterapi lain</li></ul></li></ul></li><span style=\"font-weight: 700;\"></span><li type=\"A\"><span style=\"font-weight: 700;\"><u>Apoteker</u></span><ul><li type=\"square\">Promosi kesehatan / penyuluhan</li><li type=\"square\">Pengobatan masal</li><li type=\"square\">Layanan kesehatan sosial</li><li type=\"square\">Layanan kesehatan sosial</li><li type=\"square\">Layanan kefarmasian lainnya</li></ul></li><span style=\"font-weight: 700;\"></span><li type=\"A\"><span style=\"font-weight: 700;\"><u>Tenaga Kesehatan Masyarakat</u></span><ul><li type=\"square\">Promosi kesehatan / penyuluhan</li><li type=\"square\">Kedokteran pencegahan</li><li type=\"square\">Pengobatan masal</li><li type=\"square\">Pengobatan masal</li><li type=\"square\">Layanan kesehatan masyarakat lain</li></ul></li><span style=\"font-weight: 700;\"></span><li type=\"A\"><span style=\"font-weight: 700;\"><u>Analis Laboratorium</u></span><ul><li type=\"square\">Promosi kesehatan / penyuluhan</li><li type=\"square\">Edukasi dan konsultasi</li><li type=\"square\">Pengobatan masal</li><li type=\"square\">Layanan kesehatan sosial</li><li type=\"square\">Layanan analisis laboratorium lain</li></ul></li></ul>');
INSERT INTO `faq_pertanyaan` VALUES (7, 2, 'Bagaimana cara mendaftar jadi tenaga medis di Homedika.com?', '<p><u style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Untuk mendaftar menjadi tenaga medis di Homedika.com ikuti langkah-langkah berikut ini :</u><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\"></span></p><ul type=\"1\" style=\"margin-bottom: 10px; color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify; padding-left: 4em;\"><li>Masuk ke website Homedika.com</li><li>Pilih&nbsp;<span style=\"font-weight: 700;\">\"daftar tenaga medis\"</span>&nbsp;pada menu home</li><li>Input data untuk registrasi, yaitu nama lengkap, profesi, tariff, alamat, Kota, telpon, jenis kelamin, tanggal lahir, agama, email, keterangan, dan password.</li><li>Baca dan setujui&nbsp;<span style=\"font-weight: 700;\">\"syarat dan ketentuan yang berlaku\"</span></li><li>Tekan&nbsp;<span style=\"font-weight: 700;\">\"Submit\"</span></li><li>Anda akan menerima email form verifikasi pendaftaran, periksa biodata anda, jika sudah benar tekan&nbsp;<span style=\"font-weight: 700;\">\"Lanjutkan aktivasi akun, data tersebut diatas telah sesuai dengan data diri saya\"</span></li><li><span style=\"font-weight: 700;\">Download surat perjanjian, bubuhkan tanda tangan</span>&nbsp;diatas materia, lalu kirimkan&nbsp;<span style=\"font-weight: 700;\">Surat Perjanjian</span>&nbsp;melalui pos ke Jl. Kedawung No.17 Kota Malang, kodepos 65141. Anda dapat mendownload surat perjanjian pada email form verifikasi pendaftaran atau pada halaman form verifikasi pendaftaran atau pada link berikut ini</li><li>Anda dapat login dengan memasukkan&nbsp;<span style=\"font-weight: 700;\">email</span>&nbsp;dan&nbsp;<span style=\"font-weight: 700;\">password</span></li><li><span style=\"font-weight: 700;\">Upload</span>&nbsp;informasi foto profil, scan KTP, scan Ijazah, Scan STR, Scan SIP. Pastikan anda mengupload foto profil, KTP, Ijazah, STR, dan SIP untuk menyelesaikan proses validasi profil dan akun.</li><li>Pihak homedika.com akan melakukan&nbsp;<span style=\"font-weight: 700;\">validasi akhir</span>&nbsp;untuk memeriksa kelengkapan dan kebenaran berkas yang anda upload. Jika proses validasi berhasil, anda sudah dapat melakukan transaksi pelayanan kesehatan</li><li><span style=\"font-weight: 700;\">Customer Service</span>&nbsp;kami akan mendampingi anda dalam melengkapi proses pendaftaran</li></ul>');
INSERT INTO `faq_pertanyaan` VALUES (8, 2, 'Bagaimana cara mendapatkan pasien?', '<p><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Setelah anda menyelesaikan proses pendaftaran dan melengkapi berkas administrasi yang terdiri dari foto profil, scan KTP, scan Ijazah, Scan STR, Scan SIP (jika ada), dan mengirimkan surat perjanjian admin akan melakukan validasri akhir. Jika proses validasi berhasil, admin mengapprove profil anda dan memungkinkan anda mendapatkan pemesanan transaksi medis. Tenaga medis dapat menuliskan profil lengkapnya yang dapat mempengaruhi pasien untuk memilihnya.</span><br></p>');
INSERT INTO `faq_pertanyaan` VALUES (9, 2, 'Bagaimana cara pembayaran tenaga medis?', '<p><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Setiap tenaga medis yang memberikan pelayanan kesehatan akan dibayarkan berdasarkan harga yang ditetapkan masing-masing tenaga medis dan dipotong 20% untuk management fee Homedika.com. Setiap tenaga medis berhak menetapkan harga minimal 50.000 per layanan dan nominal maksimal tidak terbatas. Biaya ini sudah meliputi transportasi, bahan yang digunakan selama pelayanan, dan potongan sebesar 20 persen dari total pelayanan sebagai management fee Homedika.com. Biaya dirumuskan untuk setiap 1 kali kunjungan, bukan untuk 1 bulan ataupun 1 pekan.</span><br></p>');
INSERT INTO `faq_pertanyaan` VALUES (10, 2, 'Bagaimana pemesanan atau order atau invitasi pelayanan kesehatan berlangsung?', '<ul style=\"margin-bottom: 10px; color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\"><li>Setelah profil anda diaktivasi, direview, divaldiasi, dan diverifikasi, anda akan berkesempatan menerima pemesanan layanan kesehatan.</li><li>Pemesanan pelayanan kesehatan akan dikirimkan ke email anda dengan menginformasikan nama pasien, nomer rekam medis, alamat, tanggal pesan, tanggal periksa, shift periksa, tanggal lahir pasien, umur pasien, layanan, dan keluhan.</li><li>Anda dapat menyetujui transaksi medis dengan menekan tombol&nbsp;<span style=\"font-weight: 700;\">\"YA\"</span>. Penting bagi anda untuk segera merespon&nbsp;<span style=\"font-weight: 700;\">\"YA\"</span>&nbsp;terhadap berbagai pemesanan atau order atau invitasi homecare yang anda dapatkan.</li><li>Selama masa promo, kami memberikan diskon 20% berupa free management fee. Oleh karenanya segera setelah anda menerima pemesanan dengan menekan tombol&nbsp;<span style=\"font-weight: 700;\">\"YA\"</span>, kami akan mengirimkan konfirmasi pemesanan kepada pasien bahwa tenaga medis menerima pemesanan dan kami juga mengirimkan email kepada anda (tenaga medis) segera menghubungi pasien dan melakukan atau menjadwalkan pelayanan</li></ul>');
INSERT INTO `faq_pertanyaan` VALUES (11, 2, 'Apakah saya dapat melakukan cuti menjadi tenaga medis homedika.com?', '<div style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify; padding-left: 3em;\"><u>Jika anda sedang ingin cuti atau berhenti memberikan layanan melalu homedika.com, anda dapat menghentikan penerimaan invitasi homecare dengan cara :</u><ul style=\"margin-bottom: 10px;\"><li>Masuk&nbsp;<span style=\"font-weight: 700;\">login</span>&nbsp;ke profil anda</li><li>Pilih menu<span style=\"font-weight: 700;\">\"edit profil\"</span></li><li>Pada kolom available pilih&nbsp;<span style=\"font-weight: 700;\">\"Tidak\"</span>.</li><li>Jika anda ingin bekerja lagi anda dapat memilih&nbsp;<span style=\"font-weight: 700;\">\"Ya\"</span>&nbsp;pada kolom&nbsp;<i>available</i>.</li><li></li></ul></div>');
INSERT INTO `faq_pertanyaan` VALUES (12, 2, 'Apakah tenaga medis dapat bekerja part time atau harus bekerja full time?', '<div style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify; padding-left: 3em;\">Pada Homedika.com, tenaga medis memiliki keleluasaan untuk bekerja part time atau full time. Anda dapat memperbaharui ketersediaan waktu di profil, anda dapat mengatur waktu pemberiaan layanan yang sesuai dengan waktu anda, dan anda dapat memilih untuk menerima atau menolak layanan. Bagaimanpun juga, tenaga medis dengan ketersediaan waktu yang lebih besar tentunya akan berpeluang menerima pemesanan pelayanan kesehatan lebih banyak.</div><div><br></div>');
INSERT INTO `faq_pertanyaan` VALUES (13, 2, 'Apakah Homedika.com merupakan agency?', '<p><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Homedika.com adalah program yang memungkinkan tenaga medis memberikan pelayanan secara langsung dengan pasien tanpa melalui agency. Tenaga medis dapat bergabung secara gratis, namun tetap melalui proses seleksi, verifikasi, dan validasi yang tepat. Homedika.com hanya berperan menghubungkan tenaga medis dengan pasien. Pasien dapat memilih tenaga medis sesuai dengan kebutuhan dan kemampuan, sebaliknya tenaga medis dapat memilih untuk menerima atau menolak memberikan layanan kesehatan sesuai kemampuan pemberian layanan. Homedika.com berusaha membantu pasien mendapatkan tenaga medis terbaik dengan memberikan pasien akses kepada berbagai tenaga medis dan informasi lengkap tenaga medis. Oleh karena itu, homedika.com tidak bertanggung jawab atas hasil pelayanan tenaga medis dan segala akibat yang ditimbulkan sebagai resiko pemberikan pelayanan kesehatan. Hal ini dikarenakan Homedika.com hanya berperan sebagai penghubung layanan dan bukan penyedia layanan kesehatan.</span><br></p>');
INSERT INTO `faq_pertanyaan` VALUES (14, 2, 'Apakah ada biaya untuk mendaftar Homedika.com?', '<p><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Selama masa promosi, mendaftar Homedika.com sebagai tenaga medis tidak dikenakan biaya apapun, sebaliknya Homedika.com akan memberikan peluang kepada anda mendapatkan fee layanan setiap kunjungan perawatan yang diberikan oleh tenaga medis. Kami mengenakan charge atau potongan 20% dari total biaya pelayanan untuk memastikan homedika.com memiliki daya keberlangsungan yang lama dan dapat terus tumbuh untuk membantu lebih banyak orang.</span><br></p>');
INSERT INTO `faq_pertanyaan` VALUES (15, 2, 'Apa itu program \"Siapa Peduli\"?', '<p><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Kami homedika.com berkomitmen memberikan layanan kesehatan secara gratis untuk pasien-pasien yang tidak mampu melalui program \"Siapa Peduli\". Homedika.com telah bekerja sama dengan Yayasan Indonesia Medika untuk menanggung biaya pelayanan untuk transaksi medis yang diberikan oleh tenaga medis homedika.com untuk pasien-pasien yang tidak mampu. Tenaga medis akan mendapatkan honorarium seperti pada pelayanan normal yang akan ditanggung oleh pihak homedika.com</span>&nbsp;&nbsp;&nbsp;&nbsp;<br></p>');
INSERT INTO `faq_pertanyaan` VALUES (16, 3, 'Bagaimana cara mendaftar menjadi pasien homedika.com?', '<p><u style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Untuk mendaftar menjadi tenaga medis di Homedika.com ikuti langkah-langkah berikut ini :</u><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\"></span></p><ul a\"=\"\" style=\"margin-bottom: 10px; color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Masuk ke website Homedika.com<li type=\"A\">Pilih&nbsp;<span style=\"font-weight: 700;\">\"daftar pasien\"</span>&nbsp;pada menu home</li><li type=\"A\">Input data untuk registrasi, yaitu nama lengkap, alamat, kota, telpon, jenis kelamin, tanggal lahir, agama, email password, dan konfirmasi password</li><li type=\"A\">Baca dan setujui&nbsp;<span style=\"font-weight: 700;\">\"syarat dan ketentuan yang berlaku\"</span></li><li type=\"A\">Tekan&nbsp;<span style=\"font-weight: 700;\">\"Submit\"</span></li><li type=\"A\">Anda akan menerima email form verifikasi pendaftaran, periksa biodata anda, jika sudah benar tekan&nbsp;<span style=\"font-weight: 700;\">\"Lanjutkan aktivasi akun, data tersebut diatas telah sesuai dengan data diri saya\"</span></li><li type=\"A\">Anda dapat login dengan memasukkan&nbsp;<span style=\"font-weight: 700;\">email</span>&nbsp;dan&nbsp;<span style=\"font-weight: 700;\">password</span></li><li type=\"A\">Jika proses validasi berhasil, anda sudah dapat melakukan&nbsp;<span style=\"font-weight: 700;\">transaksi pelayanan kesehatan.</span></li><li type=\"A\"><span style=\"font-weight: 700;\">Customer Service</span>&nbsp;kami akan mendampingi anda dalam melengkapi proses pendaftaran</li></ul>');
INSERT INTO `faq_pertanyaan` VALUES (17, 3, 'Bagaimana cara memesan tenaga medis homedika.com?', '<p><u style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Untuk mendaftar menjadi tenaga medis di Homedika.com ikuti langkah-langkah berikut ini :</u><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\"></span></p><ul a\"=\"\" style=\"margin-bottom: 10px; color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Masuk ke website Homedika.com<li type=\"A\">Pilih&nbsp;<span style=\"font-weight: 700;\">\"login pasien\"</span>&nbsp;pada menu home</li><li type=\"A\">Input data untuk login sebagai pasien, yaitu email dan password.</li><li type=\"A\">Tekan&nbsp;<span style=\"font-weight: 700;\">\"Login\"</span></li><li type=\"A\">Lalu&nbsp;<span style=\"font-weight: 700;\">Pilih Provinsi, Pilih Kota, Pilih Profesi</span>, dan&nbsp;<span style=\"font-weight: 700;\">Pilih Layanan</span>&nbsp;yang anda inginkan.</li><li type=\"A\">Pilih jenis layanan :<ul><li type=\"disc\"><span style=\"font-weight: 700;\">Emergency Care :</span>Melalui layanan ini anda langsung mendapatkan tenaga kesehatan yang dapat memberikan pelayanan dengan segera</li><li type=\"disc\"><span style=\"font-weight: 700;\">Available Care :</span>: Melalui layanan ini anda dapat memilih tenaga kesehatan dengan proses penjadwalan</li></ul></li><li type=\"A\">Tekan&nbsp;<span style=\"font-weight: 700;\">\"pilih\"</span>&nbsp;pada tenaga medis yang anda ingin pesan</li><li type=\"A\">Anda akan masuk ke Form Pemesanan tenaga kesehatan, lalu&nbsp;<span style=\"font-weight: 700;\">\"pilih tanggal pemesanan\"</span>,&nbsp;<span style=\"font-weight: 700;\">\"pilih waktu pemesanan\"</span>, isi kolom&nbsp;<span style=\"font-weight: 700;\">\"Keluhan Awal\"</span>, isi kolom&nbsp;<span style=\"font-weight: 700;\">\"Keterangan Lain\"</span>.</li><li type=\"A\">Pilih dan setujui pernyataan&nbsp;<span style=\"font-weight: 700;\">\"Saya menyetujui syarat dan ketentuan yang berlaku\"</span>,</li><li type=\"A\">Tekan&nbsp;<span style=\"font-weight: 700;\">\"Lanjut ke form invoice\"</span></li><li type=\"A\">Cek&nbsp;<span style=\"font-weight: 700;\">\"form invoice\"</span>, jika sudah sesuai tekan&nbsp;<span style=\"font-weight: 700;\">\"Lanjut ke Pemesanan\"</span>,</li><li type=\"A\">Jika tenaga medis menyetujui pemesanan, kami akan mengirimkan email konfirmasi dan anda sudah dapat&nbsp;<span style=\"font-weight: 700;\">menghubungi tenaga medis</span>. Jika tenaga medis menolak pemesanan, anda bisa masuk ke menu utama dan memilih&nbsp;<span style=\"font-weight: 700;\">tenaga medis lain</span>.</li><li type=\"A\"><span style=\"font-weight: 700;\">Customer Service</span>&nbsp;kami akan mendampingi anda dalam melengkapi proses pendaftaran</li></ul>');
INSERT INTO `faq_pertanyaan` VALUES (18, 3, 'Bagaimana proses seleksi tenaga medis? ', '<p><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Pada Homedika.com, kami ingin membangun dan menjaga hubungan esensial dan jangka panjang dengan tenaga medis profesional dan mereka yang membutuhkan layanan kesehatan. Oleh karenanya, setiap tenaga kesehatan profesional harus melalui proses seleksi, verifikasi, dan validasi yang meliputi aspek informasi personal, pendidikan keilmuan, registrasi profesi, perizinan, dan informasi penting dan pendukung lainnya. Homedika.com mengumpulkan informasi lengkap terkait tenaga kesehatan yang didukung oleh informasi tambahan. Disamping itu tenaga medis telah melalui proses perjanjian terlebih dahulu. Homedika.com bukanlah penyedia layanan kesehatan, kami adalah penghubung pasien dengan tenaga medis. Oleh karenanya, informasi-informasi yang kami kumpulkan tersebut sebagai komitmen kami dalam menjaga kualifikasi dari tenaga medis yang ingin terhubung melalui homedika.com. Dengan demikian kami berfokus pada menyeleksi dan mengevaluasi tenaga – tenaga medis yang ingin terhubung melalui homedika.com.</span><br></p>');
INSERT INTO `faq_pertanyaan` VALUES (19, 3, 'Berapa biaya pelayanan tenaga kesehatan?', '<div style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify; padding-left: 3em;\">Homedika.com memberikan kebebasan penentunan harga kepada tenaga medis secara mandiri, sehingga tenaga medis dapat mengestimasi biaya perawatan sesuai kebutuhan dan pasien dapat memilih tenaga medis yang sesuai dengan kemampuan dana yang dimiliki. Biaya yang tercantum sudah meliputi transportasi tenaga kesehatan, penggunaan alat dan bahan, dan biaya management fee untuk Homedika.com. Tenaga medis tidak dibenarkan melakukan penarikan biaya tambahan di luar biaya yang telah ditampilkan dalam profil tenaga medis.</div><div><br></div>');
INSERT INTO `faq_pertanyaan` VALUES (20, 3, 'Bagaimana saya bisa menemukan tenaga medis yang tepat?', '<p><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Pasien dapat secara langsung memilih sesuai kriteria yang diinginkan, meliputi informasi lokasi (provinsi dan kota/kabupaten), profesi spesifik tenaga medis, harga, jenis kelamin, jenis pelayanan, riwayat pendidikan, ketersediaan hari, pengalaman, usia, tempat tinggal, dan informasi tambahan lainnya. Informasi – informasi yang kami sediakan tersebut dharapkan dapat menjadi pertimbangan pasien atau keluarga pasien dalam memilih tenaga kesehatan. Homedika.com juga menyediakan Customer Service untuk membantu pasien mengidentifikasi kebutuhan pelayanan kesehatannya. Kami juga memberikan rekomendasi yang didasarkan pada kualifikasi dan kualitas pelayanan. Sebagai evaluasi tambahan, kami juga memberikan kesempatan kepada pasien atau keluarga pasien yang telah menggunakan jasa untuk memberikan ulasan secara terbuka dan penilaian atas layanan yang diberikan tenaga medis.</span><br></p>');
INSERT INTO `faq_pertanyaan` VALUES (21, 3, 'Bagaimana jika tenaga kesehatan tidak memberikan pelayanan kesehatan sesuai dengan jadwal yang disepakati?', '<p><i style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Customer Service</i><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">&nbsp;kami tersedia untuk memberikan bantuan teknis terkait pelayanan kesehatan yang disediakan oleh tenaga-tenaga medis yang telah mendaftarkan diri di homedika.com. Dengan demikian, kami akan memberikan solusi terkait permasalahan-permasalahan yang muncul di lapangan.</span><br></p>');
INSERT INTO `faq_pertanyaan` VALUES (22, 4, 'Cara Daftar Pasien', '<p><u style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Untuk mendaftar menjadi tenaga medis di Homedika.com ikuti langkah-langkah berikut ini :</u><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\"></span></p><ul style=\"margin-bottom: 10px; color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\"><li type=\"a\">Masuk ke website Homedika.com</li><li type=\"a\">Pilih&nbsp;<span style=\"font-weight: 700;\">\"daftar pasien\"</span>&nbsp;pada menu home</li><li type=\"a\">Input data untuk registrasi, yaitu nama lengkap, alamat, kota, telpon, jenis kelamin, tanggal lahir, agama, email password, dan konfirmasi password.</li><li type=\"a\">Baca dan setujui&nbsp;<span style=\"font-weight: 700;\">\"syarat dan ketentuan yang berlaku\"</span></li><li type=\"a\">Tekan&nbsp;<span style=\"font-weight: 700;\">\"Submit\"</span></li><li type=\"a\">Anda akan menerima email form verifikasi pendaftaran, periksa biodata anda, jika sudah benar tekan&nbsp;<span style=\"font-weight: 700;\">\"Lanjutkan aktivasi akun, data tersebut diatas telah sesuai dengan data diri saya\"</span></li><li type=\"a\">Anda dapat login dengan memasukkan&nbsp;<span style=\"font-weight: 700;\">email</span>&nbsp;dan&nbsp;<span style=\"font-weight: 700;\">password</span></li><li type=\"a\">Jika proses validasi berhasil, anda sudah dapat melakukan&nbsp;<span style=\"font-weight: 700;\">transaksi pelayanan kesehatan</span>.</li><li type=\"a\"><span style=\"font-weight: 700;\">Customer Service</span>&nbsp;kami akan mendampingi anda dalam melengkapi proses pendaftaran</li></ul>');
INSERT INTO `faq_pertanyaan` VALUES (23, 4, 'Cara Memesan Tenaga Medis', '<p><u style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Untuk melakukan pemesanan tenaga medis di Homedika.com ikuti langkah-langkah berikut ini :</u><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\"></span></p><ul style=\"margin-bottom: 10px; color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\"><li type=\"a\">Masuk ke website Homedika.com</li><li type=\"a\">Pilih&nbsp;<span style=\"font-weight: 700;\">\"login pasien\"</span>&nbsp;pada menu home</li><li type=\"a\">Input data untuk login sebagai pasien, yaitu email dan password.</li><li type=\"a\">Tekan&nbsp;<span style=\"font-weight: 700;\">\"Login\"</span></li><li type=\"a\">Lalu&nbsp;<span style=\"font-weight: 700;\">Pilih Provinsi</span>,&nbsp;<span style=\"font-weight: 700;\">Pilih Kota</span>,&nbsp;<span style=\"font-weight: 700;\">Pilih Profesi</span>, dan&nbsp;<span style=\"font-weight: 700;\">Pilih Layanan</span>&nbsp;yang anda inginkan.</li><li type=\"a\">Pilih jenis layanan :<ul><li type=\"circle\"><span style=\"font-weight: 700;\">Layanan Segera :</span>&nbsp;Melalui layanan ini anda langsung mendapatkan tenaga medis yang dapat memberikan pelayanan dengan segera</li><li type=\"circle\"><span style=\"font-weight: 700;\">Layanan Umum :</span>&nbsp;Melalui layanan ini anda dapat memilih tenaga medis dengan proses penjadwalan</li></ul></li><li type=\"a\">Tekan&nbsp;<span style=\"font-weight: 700;\">\"pilih\"</span>&nbsp;pada tenaga medis yang anda ingin pesan</li><li type=\"a\">Anda akan masuk ke Form Pemesanan tenaga kesehatan, lalu&nbsp;<span style=\"font-weight: 700;\">\"pilih tanggal pemesanan\"</span>,&nbsp;<span style=\"font-weight: 700;\">\"pilih waktu pemesanan\"</span>, isi kolom&nbsp;<span style=\"font-weight: 700;\">\"Keluhan Awal\"</span>, isi kolom&nbsp;<span style=\"font-weight: 700;\">\"Keterangan Lain\"</span>.</li><li type=\"a\">Pilih dan setujui pernyataan&nbsp;<span style=\"font-weight: 700;\">\"Saya menyetujui syarat dan ketentuan yang berlaku\"</span>,</li><li type=\"a\">Tekan&nbsp;<span style=\"font-weight: 700;\">\"Lanjut ke form invoice\"</span></li><li type=\"a\">Cek \"form invoice\", jika sudah sesuai tekan&nbsp;<span style=\"font-weight: 700;\">\"Lanjut ke Pemesanan\"</span>,</li><li type=\"a\">Jika tenaga medis menyetujui pemesanan, kami akan mengirimkan email konfirmasi dan anda sudah dapat&nbsp;<span style=\"font-weight: 700;\">menghubungi tenaga medis</span>. Jika tenaga medis menolak pemesanan, anda bisa masuk ke menu utama dan memilih&nbsp;<span style=\"font-weight: 700;\">tenaga medis lain</span>.</li><li type=\"a\"><span style=\"font-weight: 700;\">Customer Service</span>&nbsp;kami akan mendampingi anda dalam melengkapi proses pendaftaran</li></ul>');
INSERT INTO `faq_pertanyaan` VALUES (24, 4, 'Cara Daftar Tenaga Medis', '<p><u style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Untuk mendaftar menjadi tenaga medis di Homedika.com ikuti langkah-langkah berikut ini :</u><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\"></span></p><ul style=\"margin-bottom: 10px; color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\"><li type=\"a\">Masuk ke website Homedika.com</li><li type=\"a\">Pilih&nbsp;<span style=\"font-weight: 700;\">\"daftar tenaga medis\"</span>&nbsp;pada menu home</li><li type=\"a\">Input data untuk registrasi, yaitu nama lengkap, profesi, tariff, alamat, Kota, telpon, jenis kelamin, tanggal lahir, agama, email, keterangan, dan password.</li><li type=\"a\">Baca dan setujui&nbsp;<span style=\"font-weight: 700;\">\"syarat dan ketentuan yang berlaku\"</span></li><li type=\"a\">Tekan&nbsp;<span style=\"font-weight: 700;\">\"Submit\"</span></li><li type=\"a\">Anda akan menerima email form verifikasi pendaftaran, periksa biodata anda, jika sudah benar tekan&nbsp;<span style=\"font-weight: 700;\">\"Lanjutkan aktivasi akun, data tersebut diatas telah sesuai dengan data diri saya\"</span></li><li type=\"a\"><span style=\"font-weight: 700;\">Download surat perjanjian</span>, bubuhkan&nbsp;<span style=\"font-weight: 700;\">tanda tangan</span>&nbsp;diatas materia, lalu kirimkan&nbsp;<span style=\"font-weight: 700;\">Surat Perjanjian</span>&nbsp;melalui pos ke Jl. Kedawung No.17 Kota Malang, kodepos 65141. Anda dapat mendownload surat perjanjian pada email form verifikasi pendaftaran atau pada halaman form verifikasi pendaftaran atau pada link berikut ini</li><li type=\"a\">Anda dapat login dengan memasukkan&nbsp;<span style=\"font-weight: 700;\">email</span>&nbsp;dan&nbsp;<span style=\"font-weight: 700;\">password</span></li><li type=\"a\"><span style=\"font-weight: 700;\">Upload</span>&nbsp;informasi foto profil, scan KTP, scan Ijazah, Scan STR, Scan SIP (jika ada). Pastikan anda mengupload foto profil, KTP, Ijazah, STR, dan SIP (jika ada) untuk menyelesaikan proses validasi profil dan akun.</li><li type=\"a\">Pihak homedika.com akan melakukan&nbsp;<span style=\"font-weight: 700;\">validasi akhir</span>&nbsp;untuk memeriksa kelengkapan dan kebenaran berkas yang anda upload. Jika proses validasi berhasil, anda sudah dapat melakukan&nbsp;<span style=\"font-weight: 700;\">transaksi pelayanan kesehatan</span>.</li><li type=\"a\"><span style=\"font-weight: 700;\">Customer Service</span>&nbsp;kami akan mendampingi anda dalam melengkapi proses pendaftaran</li></ul>');
INSERT INTO `faq_pertanyaan` VALUES (25, 5, 'Layanan Segera', '<p><span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Melalui layanan ini anda langsung mendapatkan tenaga medis yang dapat memberikan pelayanan dengan segera&nbsp;</span><br></p>');
INSERT INTO `faq_pertanyaan` VALUES (26, 5, 'Layanan Umum', '<span style=\"color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px; text-align: justify;\">Melalui layanan ini anda dapat memilih tenaga medis dengan proses penjadwalan</span>');
INSERT INTO `faq_pertanyaan` VALUES (35, 12, 'Apakah nakes itu ?', '<p>Nakes adalah Tenaga Kesehatan</p>');

-- ----------------------------
-- Table structure for fokus_user
-- ----------------------------
DROP TABLE IF EXISTS `fokus_user`;
CREATE TABLE `fokus_user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '0=off,1=in',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for keys
-- ----------------------------
DROP TABLE IF EXISTS `keys`;
CREATE TABLE `keys`  (
  `homed_id` int(11) NOT NULL AUTO_INCREMENT,
  `homed_key` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `homed_value` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`homed_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of keys
-- ----------------------------
INSERT INTO `keys` VALUES (1, 'HOMED-API-KEY', 'LrduZpOcmAD64J07Vfvf');

-- ----------------------------
-- Table structure for konfig
-- ----------------------------
DROP TABLE IF EXISTS `konfig`;
CREATE TABLE `konfig`  (
  `konfig_id` int(11) NOT NULL AUTO_INCREMENT,
  `konfig_key` char(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `konfig_fitur` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `konfig_isi` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`konfig_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of konfig
-- ----------------------------
INSERT INTO `konfig` VALUES (5, '7c89fc', 'Tentang Kami', '{\"tentang_deskripsi\":\"<p style=\\\"text-align: center; \\\"><\\/p><h1 style=\\\"text-align: center;\\\">Tentang Homedika<\\/h1><div style=\\\"text-align: center;\\\">Tentang apa itu Homedika, dan apa tujuan kami<\\/div><div style=\\\"text-align: center;\\\"><br><\\/div><p style=\\\"\\\"><\\/p><p style=\\\"text-align: center;\\\"><\\/p>\\r\\n<div style=\\\"position:relative;padding-bottom: 56.25%;padding-top: 25px;height: 0;\\\">\\r\\n<iframe style=\\\"position: absolute;\\r\\n\\twidth: 100%;\\r\\n\\theight: 100%;\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/TERxK747yXs\\\" frameborder=\\\"0\\\" allow=\\\"autoplay; encrypted-media\\\" allowfullscreen=\\\"\\\"><\\/iframe><br><p><\\/p><\\/div>\"}');
INSERT INTO `konfig` VALUES (6, '1ed05a', 'Syarat dan Ketentuan', '[{\"judul\":\"Untuk Pasiean\",\"deskripsi\":\"<p style=\\\"text-align: justify; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 2em 1em 1em; color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px;\\\">Ini untuk pasien<\\/p>\"},{\"judul\":\"Untuk Medis \\/ Faskes\",\"deskripsi\":\"<p style=\\\"text-align: justify; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 2em 1em 1em; color: rgb(119, 119, 119); font-family: Lato, serif; font-size: 16px;\\\">Ini untuk medis \\/ nakes<\\/p>\"}]');
INSERT INTO `konfig` VALUES (7, 'da23c4', 'Kontak', '{\"kontak_alamat\":\"Jln. Kebagusan Raya\",\"kontak_koordinat_long\":\"Koordinat Long\",\"kontak_koordinat_lat\":\"Koordinat Lat\",\"kontak_noKantor\":\"No. 192\",\"kontak_noCs\":\"0822-4-5555-838\",\"kontak_email\":\"a@m.com\"}');

-- ----------------------------
-- Table structure for layanan
-- ----------------------------
DROP TABLE IF EXISTS `layanan`;
CREATE TABLE `layanan`  (
  `layanan_id` int(11) NOT NULL AUTO_INCREMENT,
  `layanan_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `layanan_harga` int(255) DEFAULT NULL,
  `layanan_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `layanan_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '1' COMMENT '0=of, 1=on',
  `layanan_createdby` int(255) DEFAULT NULL,
  `layanan_createddate` datetime(0) DEFAULT NULL,
  `layanan_lastudpate` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `layanan_udpatedby` int(255) DEFAULT NULL,
  `layanan_ip` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`layanan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of layanan
-- ----------------------------
INSERT INTO `layanan` VALUES (1, 'Dermabrasion', 150000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:18:18', NULL, NULL);
INSERT INTO `layanan` VALUES (2, 'Anti Aging Treatment', 200000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:22:48', NULL, NULL);
INSERT INTO `layanan` VALUES (3, 'Perawatan bekas luka', 65000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:23:10', NULL, NULL);
INSERT INTO `layanan` VALUES (4, 'photo facial', 85000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:23:27', NULL, NULL);
INSERT INTO `layanan` VALUES (5, 'Pengobatan Jerawat', 125000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:23:40', NULL, NULL);
INSERT INTO `layanan` VALUES (6, 'keluarga berencana dan pelayanan kontrasepsi penuh', 45000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:27:12', NULL, NULL);
INSERT INTO `layanan` VALUES (7, 'Pemeriksaan Kesehatan', 50000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:27:23', NULL, NULL);
INSERT INTO `layanan` VALUES (8, 'Pengendalian Diabetes', 350000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:27:34', NULL, NULL);
INSERT INTO `layanan` VALUES (9, 'Vaccination/ Immunization', 140000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:27:42', NULL, NULL);
INSERT INTO `layanan` VALUES (10, 'Fever Treatment', 90000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:27:53', NULL, NULL);
INSERT INTO `layanan` VALUES (11, 'Obat Pencegahan', 60000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:32:41', NULL, NULL);
INSERT INTO `layanan` VALUES (12, 'Pemeriksaan Kesehatan', 80000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:32:52', NULL, NULL);
INSERT INTO `layanan` VALUES (13, 'Pengelolaan Kondisi Medis Akut', 100000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:33:03', NULL, NULL);
INSERT INTO `layanan` VALUES (14, 'Konseling dan Penanganan Stress', 120000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:33:15', NULL, NULL);
INSERT INTO `layanan` VALUES (15, 'Body acupuncture', 170000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:33:26', NULL, NULL);
INSERT INTO `layanan` VALUES (16, 'Fever Treatment', 75000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:33:38', NULL, NULL);
INSERT INTO `layanan` VALUES (17, 'Back Pain Physiotherapy', 40000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:33:57', NULL, NULL);
INSERT INTO `layanan` VALUES (18, 'keluarga berencana dan pelayanan kontrasepsi penuh', 30000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:34:09', NULL, NULL);
INSERT INTO `layanan` VALUES (19, 'Vaccination/ Immunization', 340000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:34:22', NULL, NULL);
INSERT INTO `layanan` VALUES (20, 'Travel Vaccination and Consultation', 90000, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:34:31', NULL, NULL);
INSERT INTO `layanan` VALUES (21, 'Tes Alergi', 62500, '', '1', 1, '2018-08-15 00:00:00', '2018-08-15 11:34:44', NULL, NULL);

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_pasienid` int(11) DEFAULT NULL,
  `order_almtpasien` int(11) DEFAULT NULL,
  `order_nakesid` int(11) DEFAULT NULL,
  `order_metodebayar` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '1=transfer,2=cash',
  `order_biayatransport` int(11) DEFAULT NULL,
  `order_biayalayanan` int(11) DEFAULT NULL,
  `order_totalbayar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `order_rating` int(11) DEFAULT NULL,
  `order_komen` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `order_komenbtl` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `order_tanggal` datetime(0) DEFAULT NULL,
  `order_waktubrkt` time(0) DEFAULT NULL,
  `order_waktutolak` time(0) DEFAULT NULL,
  `order_waktuselsai` time(0) DEFAULT NULL,
  `order_statbayar` enum('1','2','3') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '1=pasien,2=nakes,3=homedika',
  `order_tipe` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '1=visit,2=talk',
  PRIMARY KEY (`order_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES (1, 36, 1, 34, '1', 10000, 10000, '20000', 5, 'Dokternya sangat menyenangkan', NULL, '2018-08-11 10:10:40', '10:21:38', NULL, '12:22:01', '', '1');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'Superadmin', '<p>Semua akses bisa di buka</p>', '1', '::1', '1', '2018-07-26 05:16:54', '1', '2018-07-26 03:08:23');
INSERT INTO `role` VALUES (3, 'Bod', '<p>Role BOS</p>', '1', '::1', '1', '2018-08-08 12:18:07', '1', '2018-08-08 17:18:07');
INSERT INTO `role` VALUES (4, '', '', NULL, '::1', '1', '2018-08-12 11:48:16', '1', '2018-08-12 16:48:16');
INSERT INTO `role` VALUES (5, '', '', NULL, '::1', '1', '2018-08-12 11:48:24', '1', '2018-08-12 16:48:24');

-- ----------------------------
-- Table structure for tipe_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `tipe_dokumen`;
CREATE TABLE `tipe_dokumen`  (
  `doktipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `doktipe_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `doktipe_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `doktipe_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '1' COMMENT '0=off,1=on',
  `doktipe_createdby` int(255) DEFAULT NULL,
  `doktipe_createddate` datetime(0) DEFAULT NULL,
  `doktipe_lastupdate` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `doktipe_updatedby` int(11) DEFAULT NULL,
  `doktipe_ip` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`doktipe_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tipe_dokumen
-- ----------------------------
INSERT INTO `tipe_dokumen` VALUES (1, 'KTP', 'KTP', '1', 33, '2018-08-23 11:56:56', '2018-08-23 16:56:56', NULL, '::1');
INSERT INTO `tipe_dokumen` VALUES (2, 'Ijazah', 'Ijazah', '1', 33, '2018-08-23 11:57:13', '2018-08-23 16:57:13', NULL, '::1');
INSERT INTO `tipe_dokumen` VALUES (3, 'SIP', 'SIP', '1', 33, '2018-08-23 11:57:21', '2018-08-23 16:57:21', NULL, '::1');
INSERT INTO `tipe_dokumen` VALUES (4, 'STR', 'STR', '1', 33, '2018-08-23 11:57:27', '2018-08-23 16:57:27', NULL, '::1');
INSERT INTO `tipe_dokumen` VALUES (5, 'Kartu Anggota Organisasi Profesi', 'Kartu Anggota Organisasi Profesi', '1', 33, '2018-08-23 11:57:44', '2018-08-23 16:57:44', NULL, '::1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_password` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_email` varchar(65) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_gmail` varchar(65) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_fmail` varchar(65) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_role_id` int(255) DEFAULT NULL,
  `user_tipe` enum('0','1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '0=pasien, 1=nakes, 2=admin_web',
  `user_foto` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_nip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_nohp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_jenmin` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '0=pria,1=wanita',
  `user_temlahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_tgllahir` date DEFAULT NULL,
  `user_golrah` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_rhesus` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '0=-,1=+',
  `user_detkes_keahlian` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_detkes_waktu` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_detkes_lokasi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_detkes_pengalaman` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `user_detkes_pendidikan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_detkes_usia` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_detkes_tipe` enum('1','2','3','4','5','6') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '1=dokter,2=perawat,3=bidan,4=psikolog,5=fisioterapi,6=ahli gizi',
  `user_detkes_layanan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_ip_temp` char(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '1' COMMENT '0 = off, 1 = on',
  `user_createdby` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_createddate` datetime(0) DEFAULT NULL,
  `user_updatedby` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_lastupdate` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (33, '52bf5813ac145ff0a24008216c686059', 'Admin', 'admin@mail.com', NULL, NULL, 1, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '2018-07-26 05:28:57', '1', '2018-08-10 14:36:44');
INSERT INTO `user` VALUES (36, NULL, 'Irfan Isma Somantri', 'irfan.isma@gmail.com', NULL, NULL, NULL, '0', NULL, NULL, '08546378364', '1', 'Jakarta', '1990-02-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25', NULL, NULL, '125.166.19.96', '1', '33', '2018-08-10 16:05:13', NULL, '2018-08-10 16:05:13');
INSERT INTO `user` VALUES (37, NULL, 'Rizal Ferdian', 'rizalferdian95@gmail.com', 'rizalferdian95@gmail.com', NULL, NULL, '0', NULL, NULL, '087777284179', '0', 'jakarta', '2018-08-17', 'O', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2018-08-13 13:35:30');
INSERT INTO `user` VALUES (39, NULL, 'dr. Theresia Tedjasukmana', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dokter Umum', '10:00 - 18:00', 'Jl. Yos Sudarso Lorong 101 Nomor 51, Landmark: Ramayana Permai, Jakarta', '<div class=\"pure-u-1\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Camphor; vertical-align: top; display: inline-block; zoom: 1; text-rendering: auto; width: 414.505px; color: rgb(65, 65, 70);\"><div class=\"p-entity__item\" data-qa-id=\"experience-item\" style=\"box-sizing: inherit; margin: 0px 0px 8px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><span class=\"u-spacer--right-less p-entity__item-title-label\" style=\"box-sizing: inherit; margin: 0px 8px 0px 0px; padding: 0px 0px 0px 12px; border: 0px; font: inherit; vertical-align: baseline; position: relative; color: inherit;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: inherit;\">2002 - Present Employer at PTT Clinic</span></span></div></div><div class=\"pure-u-1\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Camphor; vertical-align: top; display: inline-block; zoom: 1; text-rendering: auto; width: 414.505px; color: rgb(65, 65, 70);\"><div class=\"p-entity__item\" data-qa-id=\"experience-item\" style=\"box-sizing: inherit; margin: 0px 0px 8px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><span class=\"u-spacer--right-less p-entity__item-title-label\" style=\"box-sizing: inherit; margin: 0px 8px 0px 0px; padding: 0px 0px 0px 12px; border: 0px; font: inherit; vertical-align: baseline; position: relative; color: inherit;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: inherit;\">2008 - Present Employer at House of Ariesta</span></span></div></div><div class=\"pure-u-1\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Camphor; vertical-align: top; display: inline-block; zoom: 1; text-rendering: auto; width: 414.505px; color: rgb(65, 65, 70);\"><div class=\"p-entity__item\" data-qa-id=\"experience-item\" style=\"box-sizing: inherit; margin: 0px 0px 8px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><span class=\"u-spacer--right-less p-entity__item-title-label\" style=\"box-sizing: inherit; margin: 0px 8px 0px 0px; padding: 0px 0px 0px 12px; border: 0px; font: inherit; vertical-align: baseline; position: relative; color: inherit;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: inherit;\">2002 - Present Dokter at Klinik Theresia Tedjasukmana</span></span></div></div>', 'dr. - Tarumanagara University, 2002', '30', '1', '5,4,2,17,1,19,6,15,10,16,14,11', '::1', '1', '1', '2018-08-15 05:59:40', NULL, '2018-08-15 10:57:51');
INSERT INTO `user` VALUES (40, NULL, 'Dr. Dwi Susilowati', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dokter Umum & Ahli Nutrisi', '18:00 - 21:00', 'Komplek BPPT , Jl. Teknologi V No. 2 , Meruya Utara, Landmark: dari Srengseng langsung belok kiri, Jakarta', '<ul><li>1978 - Present Doctor at Own Pratical<br></li></ul>', 'dr. - Universitas Brawijaya & MSc - Cornell University, USA', '38', '1', '14,18,9,20,19,10', '::1', '1', '1', '2018-08-15 06:26:40', NULL, '2018-08-15 11:26:40');
INSERT INTO `user` VALUES (41, NULL, 'dr. Oetomo Hadisoedarmo', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dokter Umum & Ahli Akupuntur', '8:00 - 13:30', 'Jl. Kemanggisan Utama Raya No F 11, Slipi, Jakarta', '<div class=\"pure-u-1\" data-reactid=\"275\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Camphor; vertical-align: top; display: inline-block; zoom: 1; text-rendering: auto; width: 414.505px; color: rgb(65, 65, 70);\"><div class=\"p-entity__item\" data-qa-id=\"experience-item\" data-reactid=\"276\" style=\"box-sizing: inherit; margin: 0px 0px 8px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><span class=\"u-spacer--right-less p-entity__item-title-label\" data-reactid=\"277\" style=\"box-sizing: inherit; margin: 0px 8px 0px 0px; padding: 0px 0px 0px 12px; border: 0px; font: inherit; vertical-align: baseline; position: relative; color: inherit;\"><span data-reactid=\"278\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: inherit;\">1975 - 1978 Head of Clinic at Puskesmas Tanah Merah, Irian Jaya</span></span></div></div><div class=\"pure-u-1\" data-reactid=\"279\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Camphor; vertical-align: top; display: inline-block; zoom: 1; text-rendering: auto; width: 414.505px; color: rgb(65, 65, 70);\"><div class=\"p-entity__item\" data-qa-id=\"experience-item\" data-reactid=\"280\" style=\"box-sizing: inherit; margin: 0px 0px 8px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><span class=\"u-spacer--right-less p-entity__item-title-label\" data-reactid=\"281\" style=\"box-sizing: inherit; margin: 0px 8px 0px 0px; padding: 0px 0px 0px 12px; border: 0px; font: inherit; vertical-align: baseline; position: relative; color: inherit;\"><span data-reactid=\"282\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: inherit;\">1978 - 2005 General Physician at RSUD Jayapura, Irian Jaya</span></span></div></div><div class=\"pure-u-1\" data-reactid=\"283\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Camphor; vertical-align: top; display: inline-block; zoom: 1; text-rendering: auto; width: 414.505px; color: rgb(65, 65, 70);\"><div class=\"p-entity__item\" data-qa-id=\"experience-item\" data-reactid=\"284\" style=\"box-sizing: inherit; margin: 0px 0px 8px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><span class=\"u-spacer--right-less p-entity__item-title-label\" data-reactid=\"285\" style=\"box-sizing: inherit; margin: 0px 8px 0px 0px; padding: 0px 0px 0px 12px; border: 0px; font: inherit; vertical-align: baseline; position: relative; color: inherit;\"><span data-reactid=\"286\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: inherit;\">1988 - 1995 Director at RSUD Jayapura, Irian Jaya</span></span></div></div><div class=\"pure-u-1\" data-reactid=\"287\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Camphor; vertical-align: top; display: inline-block; zoom: 1; text-rendering: auto; width: 414.505px; color: rgb(65, 65, 70);\"><div class=\"p-entity__item\" data-qa-id=\"experience-item\" data-reactid=\"288\" style=\"box-sizing: inherit; margin: 0px 0px 8px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><span class=\"u-spacer--right-less p-entity__item-title-label\" data-reactid=\"289\" style=\"box-sizing: inherit; margin: 0px 8px 0px 0px; padding: 0px 0px 0px 12px; border: 0px; font: inherit; vertical-align: baseline; position: relative; color: inherit;\"><span data-reactid=\"290\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: inherit;\">1983 - 1986 Secretary at Indonesian Medical Association, Irian Jaya</span></span></div></div><div class=\"pure-u-1\" data-reactid=\"291\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Camphor; vertical-align: top; display: inline-block; zoom: 1; text-rendering: auto; width: 414.505px; color: rgb(65, 65, 70);\"><div class=\"p-entity__item\" data-qa-id=\"experience-item\" data-reactid=\"292\" style=\"box-sizing: inherit; margin: 0px 0px 8px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><span class=\"u-spacer--right-less p-entity__item-title-label\" data-reactid=\"293\" style=\"box-sizing: inherit; margin: 0px 8px 0px 0px; padding: 0px 0px 0px 12px; border: 0px; font: inherit; vertical-align: baseline; position: relative; color: inherit;\"><span data-reactid=\"294\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: inherit;\">1993 - 1996 Chairman at PERSI (Perhimpunan Rumah Sakit Indonesia), Irian jaya</span></span></div></div><div class=\"pure-u-1\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Camphor; vertical-align: top; display: inline-block; zoom: 1; text-rendering: auto; width: 414.505px; color: rgb(65, 65, 70);\"><div class=\"p-entity__item\" data-qa-id=\"experience-item\" style=\"box-sizing: inherit; margin: 0px 0px 8px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><span class=\"u-spacer--right-less p-entity__item-title-label\" style=\"box-sizing: inherit; margin: 0px 8px 0px 0px; padding: 0px 0px 0px 12px; border: 0px; font: inherit; vertical-align: baseline; position: relative; color: inherit;\"><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: inherit;\">1993 - 1996 Chairman at PAKSI (Perhimpunan Akupunturis Seluruh Indonesia), Irian Jaya</span></span></div></div>', 'dr. - Universitas Diponegoro, 1974', '40', '1', '17,15,1,10', '::1', '1', '1', '2018-08-15 06:32:25', NULL, '2018-08-15 11:32:25');

-- ----------------------------
-- Table structure for user_group
-- ----------------------------
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group`  (
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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_group
-- ----------------------------
INSERT INTO `user_group` VALUES (7, 1, 'Group A', 'Group A', '::1', '[{\"menu_id\":\"1\",\"menu_nama\":\"Welcome\",\"menu_controllers\":\"welcome\",\"menu_is_primary\":1,\"menu_url\":\"welcome\",\"menu_sub_menu\":\"\"},{\"menu_id\":\"3\",\"menu_nama\":\"Config\",\"menu_controllers\":[\"admin\",\"menu\",\"group\",\"icon\",\"role\",\"api\"],\"menu_is_primary\":\"\",\"menu_url\":\"\",\"menu_sub_menu\":[{\"text\":\"Admin\",\"icon_menu\":\"profile-1\",\"controller\":\"admin\",\"parent\":3},{\"text\":\"Menu\",\"icon_menu\":\"puzzle\",\"controller\":\"menu\",\"parent\":3},{\"text\":\"Group\",\"icon_menu\":\"users\",\"controller\":\"group\",\"parent\":3},{\"text\":\"Icon\",\"icon_menu\":\"medical\",\"controller\":\"icon\",\"parent\":3},{\"text\":\"Role\",\"icon_menu\":\"web\",\"controller\":\"role\",\"parent\":3},{\"text\":\"API\",\"icon_menu\":\"paper-plane\",\"controller\":\"api\",\"parent\":3}]},{\"menu_id\":\"6\",\"menu_nama\":\"Master Data\",\"menu_controllers\":[\"faq\",\"kontak\",\"sadaten\",\"tentang\",\"nakes\",\"pasien\",\"layanan\",\"doktipe\"],\"menu_is_primary\":\"\",\"menu_url\":\"\",\"menu_sub_menu\":[{\"text\":\"FAQ\",\"icon_menu\":\"questions-circular-button\",\"controller\":\"faq\",\"parent\":6},{\"text\":\"Kontak\",\"icon_menu\":\"support\",\"controller\":\"kontak\",\"parent\":6},{\"text\":\"Syarat dan Ketentuan\",\"icon_menu\":\"alarm-1\",\"controller\":\"sadaten\",\"parent\":6},{\"text\":\"Tentang\",\"icon_menu\":\"information\",\"controller\":\"tentang\",\"parent\":6},{\"text\":\"Nakes ( Dokter )\",\"icon_menu\":\"profile-1\",\"controller\":\"nakes\",\"parent\":6},{\"text\":\"Pasien\",\"icon_menu\":\"profile\",\"controller\":\"pasien\",\"parent\":6},{\"text\":\"Layanan\",\"icon_menu\":\"book\",\"controller\":\"layanan\",\"parent\":6},{\"text\":\"Tipe Dokumen\",\"icon_menu\":\"book\",\"controller\":\"doktipe\",\"parent\":6}]}]', '[\"welcome\",\"admin\",\"menu\",\"group\",\"icon\",\"role\",\"api\",\"faq\",\"kontak\",\"sadaten\",\"tentang\",\"nakes\",\"pasien\",\"layanan\",\"doktipe\"]', '1', '111111', '2018-03-22 10:45:23', '33', '2018-08-23 11:34:40');

SET FOREIGN_KEY_CHECKS = 1;
