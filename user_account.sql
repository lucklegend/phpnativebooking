-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2008 at 12:16 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

--
-- Database: `axon_ardmoreparkv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
CREATE TABLE IF NOT EXISTS `user_account` (
  `id` int(255) NOT NULL auto_increment,
  `crypted` varchar(255) NOT NULL default '',
  `username` varchar(255) NOT NULL default '',
  `password` varchar(255) NOT NULL default '',
  `active` set('0','1') NOT NULL default '1',
  `user_type` set('0','1','2') NOT NULL default '0' COMMENT '''0=user'',''1=manager'',''2=club''',
  `name` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `contact_no` varchar(255) NOT NULL default '',
  `handphone` text NOT NULL,
  `officephone` varchar(255) NOT NULL default '',
  `title` text NOT NULL,
  `company` text NOT NULL,
  `address` text NOT NULL,
  `fax` text NOT NULL,
  `last_logged_in` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM  AUTO_INCREMENT=33 ;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` VALUES(1, '8HeY4omxqmohW', 'shashi7', 'dev7777', '0', '0', 'Shashi Kant', 'itajooba@gmail.com1', '11111', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(3, 'oyd2VO5PeK4hX', 'axon7', 'dev7777', '0', '1', 'Axon', 'shashi@axon.com.sg', '11111111111111', '', '', '', '', '', '', 'Mon, 7th April 2008 @ 16:13:05');
INSERT INTO `user_account` VALUES(7, '', 'test', '12', '0', '0', 'ettet', 'ete', '12', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(8, 'QkpWn4SpsvhKg', 'shah7', 'dev7777', '1', '1', 'shah', 'asd', 'asd', '', '', 'sad dasd', 'sdsad', 'dsadasd', 'sad', '');
INSERT INTO `user_account` VALUES(9, '6COqYnIwsJ3', 'amit7', 'dev7777', '1', '1', 'amit', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(10, 'V_3xim1RgFl74QwuprMQh', 'anika7', 'dev7777', '1', '0', 'anika', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(11, 'iUbrlTpCdWUowr5', 'test7', 'dev7777', '1', '0', 'test', 'shah@axon.com.sg', '1234567', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(12, 'MYGkUgUHEVy7', 'ard', '123456', '1', '2', 'asdsadasd', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(13, '44kyLHCsGF7RhB', 'resident', '123456', '1', '0', 'Resident New1', 'hello@singtel.com', '1234567', '134', '', 'Architect', 'DS DEzIGn', 'Choa Chu Kang', '1234567', '');
INSERT INTO `user_account` VALUES(14, 'js5evK3i5cnS8', 'manager', '123456', '1', '1', 'Manager Test', '', '', '', '', '', '', '', '', 'Sun, 4th May 2008 @ 18:16:14');
INSERT INTO `user_account` VALUES(15, 'rHllUMJBORudY', 'club', '123456', '1', '2', 'Club Test', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(16, '', 'AP090202', 'Dejoux', '0', '0', 'Dejoux', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(17, 'vgcMX5cV3LbR', 'danielle', '123456', '1', '0', 'danielle', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(18, 'QVeFKEnB7j4lYwS', 'wong', '123456', '1', '0', 'wong', 'wong@ardmorepark.com.sg', '67330862', '', '', '', '', '13 ardmorepark', '', '');
INSERT INTO `user_account` VALUES(19, 'ijowvmD4wl5B', 'quah', '123456', '1', '0', 'quah sohhoon', 'sohhoon.quah@armdorepark.com.sg', '67330862', '', '', 'condo manager', 'kfem', '13 ardmore park', '67330972', '');
INSERT INTO `user_account` VALUES(20, '1Woo1Ls7OHWociE', '9#01-01', '123456', '1', '0', '', '', '67330862', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(21, '2FGqpEJoEW', '11#01-01', '123456', '1', '0', 'Mr Baa', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(22, 'nOb1wIG1bK2f', '15#01-01', '123456', '1', '0', 'Mr Caa', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(23, 'mdikJgG2ic36HEY', 'wong1', '123456', '1', '0', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(24, 'dOvdmFu_QqxoMqqg', 'wong2', '123456', '1', '0', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(25, '', 'janice', '123456', '1', '1', 'janice', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(26, 'EptQJ88TcMb', 'resident1', '123456', '1', '0', 'Resident 1 Test', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(27, 'Mkw6tnujk28Nm6', 'resident2', '123456', '1', '0', 'Resident 2 Test', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(28, 'qdEHjX8HdiilCq6', 'resident3', '123456', '1', '0', 'Resident 3 Test', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(29, 'bQmUid4Wwid1', 'resident4', '123456', '1', '0', 'Resident 4 Test', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(30, 'eD82WU5nmnNT1BEg', 'resident5', '123456', '1', '0', 'Resident 5 Test', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(31, 'mqGUyfUcUdPrGc', 'AP090201', '987654', '1', '0', 'Resident AP090201', 'user@hotmail.com', '123456', '', '', '', '', '', '', '');
INSERT INTO `user_account` VALUES(32, 'xbkTe6gFMfjMglVW', 'ResidentTest', '123456', '1', '0', '', '', '', '', '', '', '', '', '', '');
