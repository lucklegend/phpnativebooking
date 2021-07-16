-- phpMyAdmin SQL Dump
-- version 2.10.0.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Sep 10, 2007 at 06:04 PM
-- Server version: 4.1.22
-- PHP Version: 4.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `axon_ardmopark`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `calender_event`
-- 

CREATE TABLE `calender_event` (
  `sno` int(255) NOT NULL auto_increment,
  `uid` varchar(255) collate latin1_general_ci NOT NULL default '',
  PRIMARY KEY  (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `calender_event`
-- 

INSERT INTO `calender_event` VALUES (1, '3');
INSERT INTO `calender_event` VALUES (2, '3');
INSERT INTO `calender_event` VALUES (3, '3');
INSERT INTO `calender_event` VALUES (12, '3');
INSERT INTO `calender_event` VALUES (11, '3');
INSERT INTO `calender_event` VALUES (10, '3');

-- --------------------------------------------------------

-- 
-- Table structure for table `facility`
-- 

CREATE TABLE `facility` (
  `sno` int(255) NOT NULL auto_increment,
  `unique_no` varchar(255) collate latin1_general_ci NOT NULL default '',
  `created_by` varchar(255) collate latin1_general_ci NOT NULL default '',
  `created_on` varchar(255) collate latin1_general_ci NOT NULL default '',
  `name` varchar(255) collate latin1_general_ci NOT NULL default '',
  `deposite` varchar(255) collate latin1_general_ci NOT NULL default '',
  `auto_apporve` set('0','1') collate latin1_general_ci NOT NULL default '0',
  `max_booking_per_day` varchar(255) collate latin1_general_ci NOT NULL default '',
  `rule1_1` varchar(255) collate latin1_general_ci NOT NULL default '',
  `rule1_2` varchar(255) collate latin1_general_ci NOT NULL default '',
  `rule1_3` varchar(255) collate latin1_general_ci NOT NULL default '',
  `relation_rule_1` set('0','1') collate latin1_general_ci NOT NULL default '' COMMENT '''0=and'',''1=or''',
  `rule2_1` varchar(255) collate latin1_general_ci NOT NULL default '',
  `rule2_2` varchar(255) collate latin1_general_ci NOT NULL default '',
  `rule2_3` varchar(255) collate latin1_general_ci NOT NULL default '',
  `relation_rule_2` set('0','1') collate latin1_general_ci NOT NULL default '0' COMMENT '''0=and'',''1=or''',
  `rule3_1` varchar(255) collate latin1_general_ci NOT NULL default '',
  `rule3_2` varchar(255) collate latin1_general_ci NOT NULL default '',
  `rule3_3` varchar(255) collate latin1_general_ci NOT NULL default '',
  `open_from` varchar(255) collate latin1_general_ci NOT NULL default '',
  `closed_at` varchar(255) collate latin1_general_ci NOT NULL default '',
  `os` varchar(255) collate latin1_general_ci NOT NULL default '0' COMMENT '''0=time'',''1=session''',
  `from_time` varchar(255) collate latin1_general_ci NOT NULL default '',
  `max_time` varchar(255) collate latin1_general_ci NOT NULL default '',
  `hours` varchar(255) collate latin1_general_ci NOT NULL default '',
  `auto_close_date` set('0','1') collate latin1_general_ci NOT NULL default '',
  `auto_close_start_day` varchar(255) collate latin1_general_ci NOT NULL default '',
  `auto_close_start_month` varchar(255) collate latin1_general_ci NOT NULL default '',
  `auto_close_start_year` varchar(255) collate latin1_general_ci NOT NULL default '',
  `auto_close_end_day` varchar(255) collate latin1_general_ci NOT NULL default '',
  `auto_close_end_month` varchar(255) collate latin1_general_ci NOT NULL default '',
  `auto_close_end_year` varchar(255) collate latin1_general_ci NOT NULL default '',
  `from_date` varchar(255) collate latin1_general_ci NOT NULL default '',
  `to_date` varchar(255) collate latin1_general_ci NOT NULL default '',
  `frame` varchar(255) collate latin1_general_ci NOT NULL default '0',
  `message` varchar(255) collate latin1_general_ci NOT NULL default '',
  `auto_cal` set('0','1') collate latin1_general_ci NOT NULL default '0',
  `enable` set('0','1') collate latin1_general_ci NOT NULL default '1',
  PRIMARY KEY  (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `facility`
-- 

INSERT INTO `facility` VALUES (1, '1189173994', '3', 'Friday 07th  September 2007 02:06:44 PM', 'dfgdfg', '100', '1', '3', '2', '0', '2', '1', '1', '1', '1', '1', '1', '1', '1', '26', '2', 'time_based', '1', '2', '4', '1', '09', '2007', '30', '09', '2007', '1', '01.09.2007', '30.09.2007', '1', 'fsdfsdf', '1', '1');
INSERT INTO `facility` VALUES (2, '1189198205', '3', 'Friday 07th  September 2007 08:50:36 PM', 'sdfsdf', '', '', '1', '0', '1', '2', '1', '0', '1', '1', '1', '0', '1', '1', '0', '0', 'sess', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '1');

-- --------------------------------------------------------

-- 
-- Table structure for table `time_slot`
-- 

CREATE TABLE `time_slot` (
  `id` int(255) NOT NULL auto_increment,
  `time_slot` varchar(255) collate latin1_general_ci NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=289 ;

-- 
-- Dumping data for table `time_slot`
-- 

INSERT INTO `time_slot` VALUES (1, '00:00');
INSERT INTO `time_slot` VALUES (2, '00:05');
INSERT INTO `time_slot` VALUES (3, '00:10');
INSERT INTO `time_slot` VALUES (4, '00:15');
INSERT INTO `time_slot` VALUES (5, '00:20');
INSERT INTO `time_slot` VALUES (6, '00:25');
INSERT INTO `time_slot` VALUES (7, '00:30');
INSERT INTO `time_slot` VALUES (8, '00:35');
INSERT INTO `time_slot` VALUES (9, '00:40');
INSERT INTO `time_slot` VALUES (10, '00:50');
INSERT INTO `time_slot` VALUES (11, '00:55');
INSERT INTO `time_slot` VALUES (12, '01:00');
INSERT INTO `time_slot` VALUES (13, '01:05');
INSERT INTO `time_slot` VALUES (14, '01:10');
INSERT INTO `time_slot` VALUES (15, '01:15');
INSERT INTO `time_slot` VALUES (16, '01:20');
INSERT INTO `time_slot` VALUES (17, '01:25');
INSERT INTO `time_slot` VALUES (18, '01:30');
INSERT INTO `time_slot` VALUES (19, '01:35');
INSERT INTO `time_slot` VALUES (20, '01:40');
INSERT INTO `time_slot` VALUES (21, '01:45');
INSERT INTO `time_slot` VALUES (22, '01:50');
INSERT INTO `time_slot` VALUES (23, '01:55');
INSERT INTO `time_slot` VALUES (24, '02:00');
INSERT INTO `time_slot` VALUES (25, '02:05');
INSERT INTO `time_slot` VALUES (26, '02:10');
INSERT INTO `time_slot` VALUES (27, '02:15');
INSERT INTO `time_slot` VALUES (28, '02:20');
INSERT INTO `time_slot` VALUES (29, '02:25');
INSERT INTO `time_slot` VALUES (30, '02:30');
INSERT INTO `time_slot` VALUES (31, '02:35');
INSERT INTO `time_slot` VALUES (32, '02:40');
INSERT INTO `time_slot` VALUES (33, '02:45');
INSERT INTO `time_slot` VALUES (34, '02:50');
INSERT INTO `time_slot` VALUES (35, '02:55');
INSERT INTO `time_slot` VALUES (36, '03:00');
INSERT INTO `time_slot` VALUES (37, '03:05');
INSERT INTO `time_slot` VALUES (38, '03:10');
INSERT INTO `time_slot` VALUES (39, '03:15');
INSERT INTO `time_slot` VALUES (40, '03:20');
INSERT INTO `time_slot` VALUES (41, '03:25');
INSERT INTO `time_slot` VALUES (42, '03:30');
INSERT INTO `time_slot` VALUES (43, '03:35');
INSERT INTO `time_slot` VALUES (44, '03:40');
INSERT INTO `time_slot` VALUES (45, '03:45');
INSERT INTO `time_slot` VALUES (46, '03:50');
INSERT INTO `time_slot` VALUES (47, '03:55');
INSERT INTO `time_slot` VALUES (48, '04:00');
INSERT INTO `time_slot` VALUES (49, '04:05');
INSERT INTO `time_slot` VALUES (50, '04:10');
INSERT INTO `time_slot` VALUES (51, '04:15');
INSERT INTO `time_slot` VALUES (52, '04:20');
INSERT INTO `time_slot` VALUES (53, '04:25');
INSERT INTO `time_slot` VALUES (54, '04:30');
INSERT INTO `time_slot` VALUES (55, '04:35');
INSERT INTO `time_slot` VALUES (56, '04:40');
INSERT INTO `time_slot` VALUES (57, '04:45');
INSERT INTO `time_slot` VALUES (58, '04:50');
INSERT INTO `time_slot` VALUES (59, '04:55');
INSERT INTO `time_slot` VALUES (60, '05:00');
INSERT INTO `time_slot` VALUES (61, '05:05');
INSERT INTO `time_slot` VALUES (62, '05:10');
INSERT INTO `time_slot` VALUES (63, '05:15');
INSERT INTO `time_slot` VALUES (64, '05:20');
INSERT INTO `time_slot` VALUES (65, '05:25');
INSERT INTO `time_slot` VALUES (66, '05:30');
INSERT INTO `time_slot` VALUES (67, '05:35');
INSERT INTO `time_slot` VALUES (68, '05:40');
INSERT INTO `time_slot` VALUES (69, '05:45');
INSERT INTO `time_slot` VALUES (70, '05:50');
INSERT INTO `time_slot` VALUES (71, '05:55');
INSERT INTO `time_slot` VALUES (72, '06:00');
INSERT INTO `time_slot` VALUES (73, '06:05');
INSERT INTO `time_slot` VALUES (74, '06:10');
INSERT INTO `time_slot` VALUES (75, '06:15');
INSERT INTO `time_slot` VALUES (76, '06:20');
INSERT INTO `time_slot` VALUES (77, '06:25');
INSERT INTO `time_slot` VALUES (78, '06:30');
INSERT INTO `time_slot` VALUES (79, '06:35');
INSERT INTO `time_slot` VALUES (80, '06:40');
INSERT INTO `time_slot` VALUES (81, '06:45');
INSERT INTO `time_slot` VALUES (82, '06:50');
INSERT INTO `time_slot` VALUES (83, '06:55');
INSERT INTO `time_slot` VALUES (84, '07:00');
INSERT INTO `time_slot` VALUES (85, '07:05');
INSERT INTO `time_slot` VALUES (86, '07:10');
INSERT INTO `time_slot` VALUES (87, '07:15');
INSERT INTO `time_slot` VALUES (88, '07:20');
INSERT INTO `time_slot` VALUES (89, '07:25');
INSERT INTO `time_slot` VALUES (90, '07:30');
INSERT INTO `time_slot` VALUES (91, '07:35');
INSERT INTO `time_slot` VALUES (92, '07:40');
INSERT INTO `time_slot` VALUES (93, '07:45');
INSERT INTO `time_slot` VALUES (94, '07:50');
INSERT INTO `time_slot` VALUES (95, '07:55');
INSERT INTO `time_slot` VALUES (96, '08:00');
INSERT INTO `time_slot` VALUES (97, '08:05');
INSERT INTO `time_slot` VALUES (98, '08:10');
INSERT INTO `time_slot` VALUES (99, '08:15');
INSERT INTO `time_slot` VALUES (100, '08:20');
INSERT INTO `time_slot` VALUES (101, '08:25');
INSERT INTO `time_slot` VALUES (102, '08:30');
INSERT INTO `time_slot` VALUES (103, '08:35');
INSERT INTO `time_slot` VALUES (104, '08:40');
INSERT INTO `time_slot` VALUES (105, '08:45');
INSERT INTO `time_slot` VALUES (106, '08:50');
INSERT INTO `time_slot` VALUES (107, '08:55');
INSERT INTO `time_slot` VALUES (108, '09:00');
INSERT INTO `time_slot` VALUES (109, '09:05');
INSERT INTO `time_slot` VALUES (110, '09:10');
INSERT INTO `time_slot` VALUES (111, '09:15');
INSERT INTO `time_slot` VALUES (112, '09:20');
INSERT INTO `time_slot` VALUES (113, '09:25');
INSERT INTO `time_slot` VALUES (114, '09:30');
INSERT INTO `time_slot` VALUES (115, '09:35');
INSERT INTO `time_slot` VALUES (116, '09:40');
INSERT INTO `time_slot` VALUES (117, '09:45');
INSERT INTO `time_slot` VALUES (118, '09:50');
INSERT INTO `time_slot` VALUES (119, '09:55');
INSERT INTO `time_slot` VALUES (120, '10:00');
INSERT INTO `time_slot` VALUES (121, '10:05');
INSERT INTO `time_slot` VALUES (122, '10:10');
INSERT INTO `time_slot` VALUES (123, '10:15');
INSERT INTO `time_slot` VALUES (124, '10:20');
INSERT INTO `time_slot` VALUES (125, '10:25');
INSERT INTO `time_slot` VALUES (126, '10:30');
INSERT INTO `time_slot` VALUES (127, '10:35');
INSERT INTO `time_slot` VALUES (128, '10:40');
INSERT INTO `time_slot` VALUES (129, '10:45');
INSERT INTO `time_slot` VALUES (130, '10:50');
INSERT INTO `time_slot` VALUES (131, '10:55');
INSERT INTO `time_slot` VALUES (132, '11:00');
INSERT INTO `time_slot` VALUES (133, '11:05');
INSERT INTO `time_slot` VALUES (134, '11:10');
INSERT INTO `time_slot` VALUES (135, '11:15');
INSERT INTO `time_slot` VALUES (136, '11:20');
INSERT INTO `time_slot` VALUES (137, '11:25');
INSERT INTO `time_slot` VALUES (138, '11:30');
INSERT INTO `time_slot` VALUES (139, '11:35');
INSERT INTO `time_slot` VALUES (140, '11:40');
INSERT INTO `time_slot` VALUES (141, '11:45');
INSERT INTO `time_slot` VALUES (142, '11:50');
INSERT INTO `time_slot` VALUES (143, '11:55');
INSERT INTO `time_slot` VALUES (144, '12:00');
INSERT INTO `time_slot` VALUES (145, '12:05');
INSERT INTO `time_slot` VALUES (146, '12:10');
INSERT INTO `time_slot` VALUES (147, '12:15');
INSERT INTO `time_slot` VALUES (148, '12:20');
INSERT INTO `time_slot` VALUES (149, '12:25');
INSERT INTO `time_slot` VALUES (150, '12:30');
INSERT INTO `time_slot` VALUES (151, '12:35');
INSERT INTO `time_slot` VALUES (152, '12:40');
INSERT INTO `time_slot` VALUES (153, '12:45');
INSERT INTO `time_slot` VALUES (154, '12:50');
INSERT INTO `time_slot` VALUES (155, '12:55');
INSERT INTO `time_slot` VALUES (156, '13:00');
INSERT INTO `time_slot` VALUES (157, '13:05');
INSERT INTO `time_slot` VALUES (158, '13:10');
INSERT INTO `time_slot` VALUES (159, '13:15');
INSERT INTO `time_slot` VALUES (160, '13:20');
INSERT INTO `time_slot` VALUES (161, '13:25');
INSERT INTO `time_slot` VALUES (162, '13:30');
INSERT INTO `time_slot` VALUES (163, '13:35');
INSERT INTO `time_slot` VALUES (164, '13:40');
INSERT INTO `time_slot` VALUES (165, '13:45');
INSERT INTO `time_slot` VALUES (166, '13:50');
INSERT INTO `time_slot` VALUES (167, '13:55');
INSERT INTO `time_slot` VALUES (168, '14:00');
INSERT INTO `time_slot` VALUES (169, '14:05');
INSERT INTO `time_slot` VALUES (170, '14:10');
INSERT INTO `time_slot` VALUES (171, '14:15');
INSERT INTO `time_slot` VALUES (172, '14:20');
INSERT INTO `time_slot` VALUES (173, '14:25');
INSERT INTO `time_slot` VALUES (174, '14:30');
INSERT INTO `time_slot` VALUES (175, '14:35');
INSERT INTO `time_slot` VALUES (176, '14:40');
INSERT INTO `time_slot` VALUES (177, '14:45');
INSERT INTO `time_slot` VALUES (178, '14:50');
INSERT INTO `time_slot` VALUES (179, '14:55');
INSERT INTO `time_slot` VALUES (180, '15:00');
INSERT INTO `time_slot` VALUES (181, '15:05');
INSERT INTO `time_slot` VALUES (182, '15:10');
INSERT INTO `time_slot` VALUES (183, '15:15');
INSERT INTO `time_slot` VALUES (184, '15:20');
INSERT INTO `time_slot` VALUES (185, '15:25');
INSERT INTO `time_slot` VALUES (186, '15:30');
INSERT INTO `time_slot` VALUES (187, '15:35');
INSERT INTO `time_slot` VALUES (188, '15:40');
INSERT INTO `time_slot` VALUES (189, '15:45');
INSERT INTO `time_slot` VALUES (190, '15:50');
INSERT INTO `time_slot` VALUES (191, '15:55');
INSERT INTO `time_slot` VALUES (192, '16:00');
INSERT INTO `time_slot` VALUES (193, '16:05');
INSERT INTO `time_slot` VALUES (194, '16:10');
INSERT INTO `time_slot` VALUES (195, '16:15');
INSERT INTO `time_slot` VALUES (196, '16:20');
INSERT INTO `time_slot` VALUES (197, '16:25');
INSERT INTO `time_slot` VALUES (198, '16:30');
INSERT INTO `time_slot` VALUES (199, '16:35');
INSERT INTO `time_slot` VALUES (200, '16:40');
INSERT INTO `time_slot` VALUES (201, '16:45');
INSERT INTO `time_slot` VALUES (202, '16:50');
INSERT INTO `time_slot` VALUES (203, '16:55');
INSERT INTO `time_slot` VALUES (204, '17:00');
INSERT INTO `time_slot` VALUES (205, '17:05');
INSERT INTO `time_slot` VALUES (206, '17:10');
INSERT INTO `time_slot` VALUES (207, '17:15');
INSERT INTO `time_slot` VALUES (208, '17:20');
INSERT INTO `time_slot` VALUES (209, '17:25');
INSERT INTO `time_slot` VALUES (210, '17:30');
INSERT INTO `time_slot` VALUES (211, '17:35');
INSERT INTO `time_slot` VALUES (212, '17:40');
INSERT INTO `time_slot` VALUES (213, '17:45');
INSERT INTO `time_slot` VALUES (214, '17:50');
INSERT INTO `time_slot` VALUES (215, '17:55');
INSERT INTO `time_slot` VALUES (216, '18:00');
INSERT INTO `time_slot` VALUES (217, '18:05');
INSERT INTO `time_slot` VALUES (218, '18:10');
INSERT INTO `time_slot` VALUES (219, '18:15');
INSERT INTO `time_slot` VALUES (220, '18:20');
INSERT INTO `time_slot` VALUES (221, '18:25');
INSERT INTO `time_slot` VALUES (222, '18:30');
INSERT INTO `time_slot` VALUES (223, '18:35');
INSERT INTO `time_slot` VALUES (224, '18:40');
INSERT INTO `time_slot` VALUES (225, '18:45');
INSERT INTO `time_slot` VALUES (226, '18:50');
INSERT INTO `time_slot` VALUES (227, '18:55');
INSERT INTO `time_slot` VALUES (228, '19:00');
INSERT INTO `time_slot` VALUES (229, '19:05');
INSERT INTO `time_slot` VALUES (230, '19:10');
INSERT INTO `time_slot` VALUES (231, '19:15');
INSERT INTO `time_slot` VALUES (232, '19:20');
INSERT INTO `time_slot` VALUES (233, '19:25');
INSERT INTO `time_slot` VALUES (234, '19:30');
INSERT INTO `time_slot` VALUES (235, '19:35');
INSERT INTO `time_slot` VALUES (236, '19:40');
INSERT INTO `time_slot` VALUES (237, '19:45');
INSERT INTO `time_slot` VALUES (238, '19:50');
INSERT INTO `time_slot` VALUES (239, '19:55');
INSERT INTO `time_slot` VALUES (240, '20:00');
INSERT INTO `time_slot` VALUES (241, '20:05');
INSERT INTO `time_slot` VALUES (242, '20:10');
INSERT INTO `time_slot` VALUES (243, '20:15');
INSERT INTO `time_slot` VALUES (244, '20:20');
INSERT INTO `time_slot` VALUES (245, '20:25');
INSERT INTO `time_slot` VALUES (246, '20:30');
INSERT INTO `time_slot` VALUES (247, '20:35');
INSERT INTO `time_slot` VALUES (248, '20:40');
INSERT INTO `time_slot` VALUES (249, '20:45');
INSERT INTO `time_slot` VALUES (250, '20:50');
INSERT INTO `time_slot` VALUES (251, '20:55');
INSERT INTO `time_slot` VALUES (252, '21:00');
INSERT INTO `time_slot` VALUES (253, '21:05');
INSERT INTO `time_slot` VALUES (254, '21:10');
INSERT INTO `time_slot` VALUES (255, '21:15');
INSERT INTO `time_slot` VALUES (256, '21:20');
INSERT INTO `time_slot` VALUES (257, '21:25');
INSERT INTO `time_slot` VALUES (258, '21:30');
INSERT INTO `time_slot` VALUES (259, '21:35');
INSERT INTO `time_slot` VALUES (260, '21:40');
INSERT INTO `time_slot` VALUES (261, '21:45');
INSERT INTO `time_slot` VALUES (262, '21:50');
INSERT INTO `time_slot` VALUES (263, '21:55');
INSERT INTO `time_slot` VALUES (264, '22:00');
INSERT INTO `time_slot` VALUES (265, '22:05');
INSERT INTO `time_slot` VALUES (266, '22:10');
INSERT INTO `time_slot` VALUES (267, '22:15');
INSERT INTO `time_slot` VALUES (268, '22:20');
INSERT INTO `time_slot` VALUES (269, '22:25');
INSERT INTO `time_slot` VALUES (270, '22:30');
INSERT INTO `time_slot` VALUES (271, '22:35');
INSERT INTO `time_slot` VALUES (272, '22:40');
INSERT INTO `time_slot` VALUES (273, '22:45');
INSERT INTO `time_slot` VALUES (274, '22:50');
INSERT INTO `time_slot` VALUES (275, '22:55');
INSERT INTO `time_slot` VALUES (276, '23:00');
INSERT INTO `time_slot` VALUES (277, '23:05');
INSERT INTO `time_slot` VALUES (278, '23:10');
INSERT INTO `time_slot` VALUES (279, '23:15');
INSERT INTO `time_slot` VALUES (280, '23:20');
INSERT INTO `time_slot` VALUES (281, '23:25');
INSERT INTO `time_slot` VALUES (282, '23:30');
INSERT INTO `time_slot` VALUES (283, '23:35');
INSERT INTO `time_slot` VALUES (284, '23:40');
INSERT INTO `time_slot` VALUES (285, '23:45');
INSERT INTO `time_slot` VALUES (286, '23:50');
INSERT INTO `time_slot` VALUES (287, '23:55');
INSERT INTO `time_slot` VALUES (288, '24:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `track_time`
-- 

CREATE TABLE `track_time` (
  `sno` int(255) NOT NULL auto_increment,
  `track` varchar(255) collate latin1_general_ci NOT NULL default '',
  `weak` int(11) NOT NULL default '0',
  PRIMARY KEY  (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `track_time`
-- 

INSERT INTO `track_time` VALUES (1, '1189173994', 0);
INSERT INTO `track_time` VALUES (3, '1189198014', 0);
INSERT INTO `track_time` VALUES (4, '1189198205', 0);
INSERT INTO `track_time` VALUES (5, '1189198205', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `user_account`
-- 

CREATE TABLE `user_account` (
  `id` int(255) NOT NULL auto_increment,
  `crypted` varchar(255) collate latin1_general_ci NOT NULL default '',
  `username` varchar(255) collate latin1_general_ci NOT NULL default '',
  `password` varchar(255) collate latin1_general_ci NOT NULL default '',
  `active` set('0','1') collate latin1_general_ci NOT NULL default '1',
  `user_type` set('0','1','2') collate latin1_general_ci NOT NULL default '0' COMMENT '''0=user'',''1=manager'',''2=club''',
  `name` varchar(255) collate latin1_general_ci NOT NULL default '',
  `email` varchar(255) collate latin1_general_ci NOT NULL default '',
  `contact_no` varchar(255) collate latin1_general_ci NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `user_account`
-- 

INSERT INTO `user_account` VALUES (1, 'wrsFi2iCDf34uW7', 'shashi', '111111', '1', '0', 'Shashi Kant', 'itajooba@gmail.com1', '11111');
INSERT INTO `user_account` VALUES (3, '8xSt2feQfbIM8d', 'axon', 'dev', '1', '1', 'Axon', 'shashi@axon.com.sg', '11111111111111');
INSERT INTO `user_account` VALUES (7, '', 'test', '12', '0', '0', 'ettet', 'ete', '12');
