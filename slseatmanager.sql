/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : slseatmanager

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 06/08/2018 09:52:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for administrator
-- ----------------------------
DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator`  (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `ajobnum` int(4) NOT NULL,
  `aname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apwd` double(10, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`aid`, `ajobnum`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of administrator
-- ----------------------------
INSERT INTO `administrator` VALUES (1, 1101, '张三', 123);
INSERT INTO `administrator` VALUES (2, 1102, '李四', 123);
INSERT INTO `administrator` VALUES (3, 1103, '王五', 123);

-- ----------------------------
-- Table structure for libraryseat
-- ----------------------------
DROP TABLE IF EXISTS `libraryseat`;
CREATE TABLE `libraryseat`  (
  `aId` int(10) NOT NULL AUTO_INCREMENT,
  `aarea` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `aSeat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `seatId` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `amTimeslot` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amstate` tinyint(1) NULL DEFAULT NULL,
  `amseatInfo` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amjobnum` double(11, 0) NOT NULL,
  `pmTimeslot` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pmstate` tinyint(1) NULL DEFAULT NULL,
  `pmjobnum` double(11, 0) NOT NULL,
  `pmseatInfo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nightTimeslot` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nightstate` tinyint(1) NULL DEFAULT NULL,
  `nseatInfo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nightjobnum` double(11, 0) NOT NULL,
  PRIMARY KEY (`aId`, `aSeat`, `amjobnum`, `pmjobnum`, `nightjobnum`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of libraryseat
-- ----------------------------
INSERT INTO `libraryseat` VALUES (1, '一楼A座', '1排1', '1_1', '', 0, 'one', 0, '', 0, 0, 'two', '', 0, 'three', 0);
INSERT INTO `libraryseat` VALUES (2, '一楼A座', '1排2', '1_2', '2018-4-21', 1, 'one', 20142344917, '2018-4-22', 1, 20142344916, 'two', '2018-4-28', 1, 'three', 20142344918);
INSERT INTO `libraryseat` VALUES (3, '一楼A座', '1排3', '1_3', '', 0, 'one', 0, '', 0, 0, 'two', '', 0, 'three', 0);
INSERT INTO `libraryseat` VALUES (4, '一楼A座', '1排4', '1_4', '', 0, 'one', 0, '', 0, 0, 'two', '', 0, 'three', 0);
INSERT INTO `libraryseat` VALUES (5, '一楼A座', '2排1', '2_1', '', 0, 'one', 0, '', 0, 0, 'two', '', 0, 'three', 0);
INSERT INTO `libraryseat` VALUES (6, '一楼A座', '2排2', '2_2', '', 0, 'one', 0, '', 0, 0, 'two', '', 0, 'three', 0);
INSERT INTO `libraryseat` VALUES (7, '一楼A座', '2排3', '2_3', '', 0, 'one', 0, '', 0, 0, 'two', '', 0, 'three', 0);
INSERT INTO `libraryseat` VALUES (8, '一楼A座', '2排4', '2_4', '2018-4-22', 1, 'one', 20142344989, '', 0, 0, 'two', '', 0, 'three', 0);
INSERT INTO `libraryseat` VALUES (9, '一楼B座', '1排1', '1_1', '', 0, 'one', 0, '', 0, 0, 'two', '', 0, 'three', 0);
INSERT INTO `libraryseat` VALUES (10, '一楼B座', '1排2', '1_2', '', 0, 'one', 0, '', 0, 0, 'two', '', 0, 'three', 0);

-- ----------------------------
-- Table structure for libraryseatinfo
-- ----------------------------
DROP TABLE IF EXISTS `libraryseatinfo`;
CREATE TABLE `libraryseatinfo`  (
  `addressId` int(11) NOT NULL AUTO_INCREMENT,
  `addressName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`addressId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of libraryseatinfo
-- ----------------------------
INSERT INTO `libraryseatinfo` VALUES (1, '一楼A');
INSERT INTO `libraryseatinfo` VALUES (2, '一楼B');

-- ----------------------------
-- Table structure for studentadmin
-- ----------------------------
DROP TABLE IF EXISTS `studentadmin`;
CREATE TABLE `studentadmin`  (
  `sId` int(10) NOT NULL AUTO_INCREMENT,
  `sJobnum` double(11, 0) NOT NULL,
  `sName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sPwd` int(10) NULL DEFAULT NULL,
  `sSex` tinyint(1) NULL DEFAULT NULL,
  `sAge` int(2) NULL DEFAULT NULL,
  `sGrade` int(1) NULL DEFAULT NULL,
  `sPic` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sSaying` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sPhone` double(11, 0) NOT NULL,
  `jifen` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`sId`, `sJobnum`, `sPhone`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 38 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of studentadmin
-- ----------------------------
INSERT INTO `studentadmin` VALUES (1, 20142344918, '孟令凯', 123, 1, 24, 4, 'images/11.png', '读书死，死读书，读死书', 15195802808, 0);
INSERT INTO `studentadmin` VALUES (2, 20142344919, '李琪浩', 123, 1, 23, 4, 'images/12.png', '游戏才是一切', 15195802811, 2);
INSERT INTO `studentadmin` VALUES (3, 20142344917, '赵丽颖', 123, 0, 25, 4, 'images/13.png', '我有一个包子脸', 15195802812, 0);
INSERT INTO `studentadmin` VALUES (4, 20142344914, '张三', 123, 0, 22, 3, 'images/14.png', '天天向上', 15195802813, 1);
INSERT INTO `studentadmin` VALUES (5, 20142344913, '李四', 123, 1, 21, 2, 'images/15.png', '吃好喝好', 15195802818, 2);
INSERT INTO `studentadmin` VALUES (6, 20142344912, '王五', 123, 0, 23, 1, 'images/16.png', '不想长大', 15195802817, 2);
INSERT INTO `studentadmin` VALUES (7, 20142344916, '刘亦菲', 123, 0, 25, 4, 'images/17.png', '就这样', 15195802808, 0);
INSERT INTO `studentadmin` VALUES (8, 20142344915, '康相苏', 123, 0, 25, 4, 'images/18.png', '好好学习', 15195802807, 1);
INSERT INTO `studentadmin` VALUES (9, 20142344911, '刘伟', 123, 0, 24, 4, 'images/20170919111733608.jpg', '代码好难1', 15195802807, 2);
INSERT INTO `studentadmin` VALUES (10, 20142344910, '唐传林', 123, 0, 24, 4, 'images/20170711022456448.jpg', '代码好难2', 15195802807, 2);
INSERT INTO `studentadmin` VALUES (11, 20142344909, '刘迪华', 123, 0, 24, 4, 'images/20170919111733608.jpg', '代码好难3', 15195802807, 2);
INSERT INTO `studentadmin` VALUES (12, 20142344908, '徐帆', 123, 0, 26, 4, 'images/20170711022456448.jpg', 'Java好难', 15195802806, 2);
INSERT INTO `studentadmin` VALUES (13, 20142344907, '黄伟', 123, 0, 26, 4, 'images/20170919111733608.jpg', 'C好难', 15195802804, 2);
INSERT INTO `studentadmin` VALUES (14, 20142344906, '俞健', 123, 0, 20, 4, 'images/20170919111733608.jpg', '4549976794', 15195802807, 2);
INSERT INTO `studentadmin` VALUES (33, 20142344903, '发发发', 123, 1, 6, 5, 'images/httpimg2.2345.comappimagesimagesupload14643421376865.png', '请问请问', 15169803808, 2);
INSERT INTO `studentadmin` VALUES (32, 20142344902, '田七', 123, 1, 66, 6, 'images/httpimg2.2345.comappimagesimagesupload14205289096047.png', '而热热', 1519580207, 2);
INSERT INTO `studentadmin` VALUES (31, 20142344901, '方彬彬', 123, 0, 5, 6, 'images/httpimg2.2345.comappimagesimagesupload14205289096047.png', '213', 15195802807, 2);
INSERT INTO `studentadmin` VALUES (30, 20142344987, '周星驰', 123, 0, 5, 5, 'images/httpimg2.2345.comappimagesimagesupload14639885723832.png', '123', 16195802807, 2);
INSERT INTO `studentadmin` VALUES (29, 20142344988, '王五', 123, 1, 3, 5, 'images/httpimg2.2345.comappimagesimagesupload14515663414413.png', 'eqwe', 16195802808, 2);
INSERT INTO `studentadmin` VALUES (28, 20142344904, '微软', 123, 1, 14, 1, 'images/httpimg3.2345.comappimagesimagesupload14388395059292.png', '打不过苹果', 15195802807, 2);
INSERT INTO `studentadmin` VALUES (27, 20142344905, '谷歌', 123, 1, 18, 4, 'images/5acc15ef018c9.jpg', '好无聊', 15195802807, 2);
INSERT INTO `studentadmin` VALUES (34, 20142344986, '照旧', 123, 0, 56, 15, 'images/httpimg2.2345.comappimagesimagesupload14205289096047.png', '而我却二群无', 17195802808, 2);
INSERT INTO `studentadmin` VALUES (35, 20142344983, '啊实打实', 123, 1, 18, 4, 'images/httpimg3.2345.comappimagesimagesupload14515664797238.png', '3123', 16645772303, 2);
INSERT INTO `studentadmin` VALUES (36, 20142344982, '鸣人', 123, 1, 19, 3, 'images/httpimg3.2345.comappimagesimagesupload14339208392291.png', '123', 15195802806, 2);
INSERT INTO `studentadmin` VALUES (37, 20142344989, '佐助', 123, 0, 19, 2, 'images/httpimg1.2345.combookimgpublicimagescover63452517792.jpg', '绕弯儿', 15195802808, 1);

SET FOREIGN_KEY_CHECKS = 1;
