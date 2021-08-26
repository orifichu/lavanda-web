/*
 Navicat Premium Data Transfer

 Source Server         : La Maria
 Source Server Type    : MariaDB
 Source Server Version : 100413
 Source Host           : localhost:3307
 Source Schema         : lavanda

 Target Server Type    : MariaDB
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 26/08/2021 16:17:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for links
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links`  (
  `id_link` bigint(255) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `esta_activo` bit(1) NOT NULL,
  PRIMARY KEY (`id_link`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of links
-- ----------------------------
INSERT INTO `links` VALUES (1, 'YouTube', 'http://youtube.com', b'1');
INSERT INTO `links` VALUES (2, 'Facebook', 'http://facebook.com', b'1');

SET FOREIGN_KEY_CHECKS = 1;
