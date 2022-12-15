-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2022 at 03:42 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyrok`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
CREATE TABLE IF NOT EXISTS `administrators` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Role` varchar(5) NOT NULL,
  `Password` varchar(150) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`userID`, `Firstname`, `Lastname`, `Username`, `Email`, `Role`, `Password`) VALUES
(20, 'Steph', 'Powell', 'Steffy', 'rohan.powell36@yahoo.com', 'ADMIN', '$2y$10$fA7sYfNBVfupaku0OKPf7.QwwGWeQxbTfgwxLbZzehs9gIZYxpLwO'),
(24, 'James', 'Bond', 'James', 'james@yahoo.com', 'ADMIN', '$2y$10$Jac8MXfKlTsL0mMlwcQFsuThfnsKLozuoOsZErIrbrVrS/VvED2Rm');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

DROP TABLE IF EXISTS `codes`;
CREATE TABLE IF NOT EXISTS `codes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expires` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `email` (`email`),
  KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=624 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`Id`, `email`, `code`, `expires`) VALUES
(1, 'testingh@yahoo.com', '12834', 'Date1649232379'),
(2, 'testingh@yahoo.com', '10886', '1649233387'),
(3, 'testingh@yahoo.com', '67730', '1649233494'),
(4, 'testingh@yahoo.com', '67744', '1649233655'),
(5, 'testingh@yahoo.com', '28069', '1649233738'),
(6, 'testingh@yahoo.com', '96856', '1649233853'),
(7, 'oiu@ert', '61467', '1649234131'),
(8, '', '97836', '1649234212'),
(9, '', '63811', '1649234311'),
(10, '', '76634', '1649234313'),
(11, '', '14159', '1649234319'),
(12, '', '34247', '1649234388'),
(13, 'rpowell18@stu.ucc.edu.jm', '35135', '1649238342'),
(14, 'steffy@yahoo.com', '86527', '1649238602'),
(15, 'yesyet@fhgjhk', '29923', '1649238710'),
(16, 'rpowell18@stu.ucc.edu.jm', '22091', '1649238886'),
(17, 'steffy@yahoo.com', '52546', '1649239295'),
(18, 'hkjlkl@fhgh', '37161', '1649239458'),
(19, 'steffy@yahoo.com', '79808', '1649239618'),
(20, 'rpowell18@stu.ucc.edu.jm', '44514', '1649239670'),
(21, 'rohan.powell36@yahoo.com', '52768', '1649239848'),
(22, 'rpowell18@stu.ucc.edu.jm', '52696', '1649240139'),
(23, 'rpowell18@stu.ucc.edu.jm', '48673', '1649240285'),
(24, 'kjhghf@ydyhkjkn', '68480', '1649276050'),
(25, '', '64671', '1649276294'),
(26, '', '87845', '1649276306'),
(27, '', '14771', '1649276480'),
(28, '', '53189', '1649276489'),
(29, '', '82889', '1649276495'),
(30, '', '30814', '1649276502'),
(31, '', '72625', '1649276559'),
(32, 'rpowell18@stu.ucc.edu.jm', '40003', '1649277042'),
(33, 'def@fefe', '69116', '1649277063'),
(34, 'rpowell18@stu.ucc.edu.jm', '65000', '1649277615'),
(35, '', '96702', '1649277704'),
(36, '', '53346', '1649277719'),
(37, 'def@fefe', '16829', '1649277727'),
(38, 'WESTMORELANDDIVHQ@JCF.GOV.JM', '46158', '1649277757'),
(39, 'WESTMORELANDDIVHQ@JCF.GOV.JM', '52767', '1649278074'),
(40, 'WESTMORELANDDIVHQ@JCF.GOV.JM', '99256', '1649278078'),
(41, 'WESTMORELANDDIVHQ@JCF.GOV.JM', '45562', '1649278081'),
(42, 'WESTMORELANDDIVHQ@JCF.GOV.JM', '51370', '1649278082'),
(43, '', '77371', '1649278099'),
(44, '', '62100', '1649278109'),
(45, '', '46340', '1649278465'),
(46, '', '30578', '1649278467'),
(47, 'rpowell18@stu.ucc.edu.jm', '65720', '1649278475'),
(48, '', '56831', '1649278488'),
(49, '', '59493', '1649278563'),
(50, 'WESTMORELANDDIVHQ@JCF.GOV.JM', '46226', '1649278567'),
(51, 'WESTMORELANDDIVHQ@JCF.GOV.JM', '66213', '1649278618'),
(52, 'WESTMORELANDDIVHQ@JCF.GOV.JM', '54714', '1649278621'),
(53, 'WESTMORELANDDIVHQ@JCF.GOV.JM', '93974', '1649278622'),
(54, '', '60838', '1649278628'),
(55, 'WESTMORELANDDIVHQ@JCF.GOV.JM', '42568', '1649278633'),
(56, '', '35882', '1649278798'),
(57, 'rpowell18@stu.ucc.edu.jm', '61156', '1649278802'),
(58, 'phoenix@yahoo.com', '30191', '1649279052'),
(59, '', '31079', '1649279060'),
(60, 'phoenix@yahoo.com', '76054', '1649279066'),
(61, '', '72921', '1649279103'),
(62, 'phoenix@yahoo.com', '73029', '1649279107'),
(63, 'WESTMORELANDDIVHQ@JCF.GOV.JM', '60025', '1649279451'),
(64, 'rohan.powell36@yahoo.com', '11290', '1649286450'),
(65, 'phoenix@yahoo.com', '95359', '1649286629'),
(66, 'testingh@yahoo.com', '53433', '1649286637'),
(67, 'phoenix@yahoo.com', '66188', '1649286804'),
(68, 'phoenix@yahoo.com', '22621', '1649286814'),
(69, '', '49082', '1649286829'),
(70, 'phoenix@yahoo.com', '70559', '1649287064'),
(71, 'phoenix@yahoo.com', '75435', '1649287081'),
(72, 'testingh@yahoo.com', '15427', '1649287217'),
(73, '', '33381', '1649292422'),
(74, 'efffeew@we', '37686', '1649292436'),
(75, '', '37395', '1649292451'),
(76, '', '70419', '1649292462'),
(77, 'testinghghfgjh@yahoo.com', '96717', '1649292554'),
(78, 'WESTMORELANDDIVHQ@JCF.GOV.JM', '31411', '1649292669'),
(79, 'phoenix@yahoo.com', '38880', '1649292950'),
(80, 'testingh@yahoo.com', '19310', '1649293048'),
(81, 'phoenix@yahoo.com', '50980', '1649293062'),
(82, 'testingh@yahoo.com', '54509', '1649293203'),
(83, 'testingh@yahoo.com', '52865', '1649293250'),
(84, 'phoenix@yahoo.com', '59818', '1649293309'),
(85, 'phoenix@yahoo.com', '57875', '1649293538'),
(86, 'phoenix@yahoo.com', '94992', '1649293626'),
(87, 'phoenix@yahoo.com', '59013', '1649294504'),
(88, 'testingh@yahoo.com', '64972', '1649294632'),
(89, 'phoenix@yahoo.com', '11418', '1649294652'),
(90, 'phoenix@yahoo.com', '90255', '1649294812'),
(91, 'testingh@yahoo.com', '55284', '1649295243'),
(92, 'rohan.powell36@yahoo.com', '38665', '1649296049'),
(93, 'rohan.powell36@yahoo.com', '56757', '1649296319'),
(94, 'rohan.powell36@yahoo.com', '48624', '1649333766'),
(95, 'rohan.powell36@yahoo.com', '81825', '1649334988'),
(96, 'rohan.powell36@yahoo.com', '42301', '1649334988'),
(97, 'rohan.powell36@yahoo.com', '75411', '1649334989'),
(98, 'rohan.powell36@yahoo.com', '39002', '1649334989'),
(99, 'rohan.powell36@yahoo.com', '85662', '1649334989'),
(100, 'rohan.powell36@yahoo.com', '89655', '1649334989'),
(101, 'rohan.powell36@yahoo.com', '89299', '1649334989'),
(102, 'rohan.powell36@yahoo.com', '75010', '1649334989'),
(103, 'rohan.powell36@yahoo.com', '96227', '1649334989'),
(104, 'rohan.powell36@yahoo.com', '93158', '1649334989'),
(105, 'rohan.powell36@yahoo.com', '50660', '1649334989'),
(106, 'rohan.powell36@yahoo.com', '21828', '1649334989'),
(107, 'rohan.powell36@yahoo.com', '82824', '1649334989'),
(108, 'rohan.powell36@yahoo.com', '23703', '1649334989'),
(109, 'rohan.powell36@yahoo.com', '90561', '1649334989'),
(110, 'rohan.powell36@yahoo.com', '48545', '1649334989'),
(111, 'rohan.powell36@yahoo.com', '84341', '1649334989'),
(112, 'rohan.powell36@yahoo.com', '96665', '1649334989'),
(113, 'rohan.powell36@yahoo.com', '12866', '1649334989'),
(114, 'rohan.powell36@yahoo.com', '59405', '1649334989'),
(115, 'rohan.powell36@yahoo.com', '65893', '1649334989'),
(116, 'rohan.powell36@yahoo.com', '63630', '1649334989'),
(117, 'rohan.powell36@yahoo.com', '65575', '1649334989'),
(118, 'rohan.powell36@yahoo.com', '75206', '1649334989'),
(119, 'rohan.powell36@yahoo.com', '65217', '1649334989'),
(120, 'rohan.powell36@yahoo.com', '27847', '1649334989'),
(121, 'rohan.powell36@yahoo.com', '90883', '1649334989'),
(122, 'rohan.powell36@yahoo.com', '58232', '1649334989'),
(123, 'rohan.powell36@yahoo.com', '16120', '1649334989'),
(124, 'rohan.powell36@yahoo.com', '18357', '1649334989'),
(125, 'rohan.powell36@yahoo.com', '35694', '1649334989'),
(126, 'rohan.powell36@yahoo.com', '45729', '1649334989'),
(127, 'rohan.powell36@yahoo.com', '38409', '1649334989'),
(128, 'rohan.powell36@yahoo.com', '45701', '1649334989'),
(129, 'rohan.powell36@yahoo.com', '74679', '1649334989'),
(130, 'rohan.powell36@yahoo.com', '72635', '1649334989'),
(131, 'rohan.powell36@yahoo.com', '26362', '1649334989'),
(132, 'rohan.powell36@yahoo.com', '93107', '1649334989'),
(133, 'rohan.powell36@yahoo.com', '63436', '1649334990'),
(134, 'rohan.powell36@yahoo.com', '15382', '1649334990'),
(135, 'rohan.powell36@yahoo.com', '34762', '1649334990'),
(136, 'rohan.powell36@yahoo.com', '77742', '1649334990'),
(137, 'rohan.powell36@yahoo.com', '45142', '1649334990'),
(138, 'rohan.powell36@yahoo.com', '24474', '1649334990'),
(139, 'rohan.powell36@yahoo.com', '44869', '1649334990'),
(140, 'rohan.powell36@yahoo.com', '64109', '1649334990'),
(141, 'rohan.powell36@yahoo.com', '47852', '1649334990'),
(142, 'rohan.powell36@yahoo.com', '59753', '1649334990'),
(143, 'rohan.powell36@yahoo.com', '53189', '1649334990'),
(144, 'rohan.powell36@yahoo.com', '27677', '1649334990'),
(145, 'rohan.powell36@yahoo.com', '39862', '1649334990'),
(146, 'rohan.powell36@yahoo.com', '21346', '1649334990'),
(147, 'rohan.powell36@yahoo.com', '46256', '1649334990'),
(148, 'rohan.powell36@yahoo.com', '36462', '1649334990'),
(149, 'rohan.powell36@yahoo.com', '40032', '1649334990'),
(150, 'rohan.powell36@yahoo.com', '90782', '1649334990'),
(151, 'rohan.powell36@yahoo.com', '42926', '1649334990'),
(152, 'rohan.powell36@yahoo.com', '81456', '1649334990'),
(153, 'rohan.powell36@yahoo.com', '98063', '1649334990'),
(154, 'rohan.powell36@yahoo.com', '97866', '1649334990'),
(155, 'rohan.powell36@yahoo.com', '97651', '1649334990'),
(156, 'rohan.powell36@yahoo.com', '80548', '1649334990'),
(157, 'rohan.powell36@yahoo.com', '50100', '1649334990'),
(158, 'rohan.powell36@yahoo.com', '98457', '1649334990'),
(159, 'rohan.powell36@yahoo.com', '15952', '1649334990'),
(160, 'rohan.powell36@yahoo.com', '95631', '1649334990'),
(161, 'rohan.powell36@yahoo.com', '42461', '1649334990'),
(162, 'rohan.powell36@yahoo.com', '22932', '1649334990'),
(163, 'rohan.powell36@yahoo.com', '28232', '1649334990'),
(164, 'rohan.powell36@yahoo.com', '12492', '1649334990'),
(165, 'rohan.powell36@yahoo.com', '86119', '1649334990'),
(166, 'rohan.powell36@yahoo.com', '26679', '1649334990'),
(167, 'rohan.powell36@yahoo.com', '54264', '1649334990'),
(168, 'rohan.powell36@yahoo.com', '14395', '1649334990'),
(169, 'rohan.powell36@yahoo.com', '56753', '1649334990'),
(170, 'rohan.powell36@yahoo.com', '53642', '1649334990'),
(171, 'rohan.powell36@yahoo.com', '92121', '1649334990'),
(172, 'rohan.powell36@yahoo.com', '36882', '1649334990'),
(173, 'rohan.powell36@yahoo.com', '46975', '1649334990'),
(174, 'rohan.powell36@yahoo.com', '31500', '1649334990'),
(175, 'rohan.powell36@yahoo.com', '74174', '1649334990'),
(176, 'rohan.powell36@yahoo.com', '64381', '1649334990'),
(177, 'rohan.powell36@yahoo.com', '60529', '1649334990'),
(178, 'rohan.powell36@yahoo.com', '29009', '1649334990'),
(179, 'rohan.powell36@yahoo.com', '12013', '1649334990'),
(180, 'rohan.powell36@yahoo.com', '12313', '1649334990'),
(181, 'rohan.powell36@yahoo.com', '94835', '1649334990'),
(182, 'rohan.powell36@yahoo.com', '74039', '1649334990'),
(183, 'rohan.powell36@yahoo.com', '76579', '1649334990'),
(184, 'rohan.powell36@yahoo.com', '29478', '1649334990'),
(185, 'rohan.powell36@yahoo.com', '76685', '1649334990'),
(186, 'rohan.powell36@yahoo.com', '71206', '1649334990'),
(187, 'rohan.powell36@yahoo.com', '83736', '1649334990'),
(188, 'rohan.powell36@yahoo.com', '10511', '1649334990'),
(189, 'rohan.powell36@yahoo.com', '69510', '1649334990'),
(190, 'rohan.powell36@yahoo.com', '32436', '1649334990'),
(191, 'rohan.powell36@yahoo.com', '21882', '1649334990'),
(192, 'rohan.powell36@yahoo.com', '64487', '1649334990'),
(193, 'rohan.powell36@yahoo.com', '96527', '1649334990'),
(194, 'rohan.powell36@yahoo.com', '99298', '1649334990'),
(195, 'rohan.powell36@yahoo.com', '19485', '1649334990'),
(196, 'rohan.powell36@yahoo.com', '11640', '1649334990'),
(197, 'rohan.powell36@yahoo.com', '93225', '1649334990'),
(198, 'rohan.powell36@yahoo.com', '55093', '1649334990'),
(199, 'rohan.powell36@yahoo.com', '81811', '1649334990'),
(200, 'rohan.powell36@yahoo.com', '76423', '1649334990'),
(201, 'rohan.powell36@yahoo.com', '49725', '1649334990'),
(202, 'rohan.powell36@yahoo.com', '10062', '1649334990'),
(203, 'rohan.powell36@yahoo.com', '55897', '1649334990'),
(204, 'rohan.powell36@yahoo.com', '90358', '1649334990'),
(205, 'rohan.powell36@yahoo.com', '72107', '1649334990'),
(206, 'rohan.powell36@yahoo.com', '88140', '1649334990'),
(207, 'rohan.powell36@yahoo.com', '27964', '1649334990'),
(208, 'rohan.powell36@yahoo.com', '97047', '1649334990'),
(209, 'rohan.powell36@yahoo.com', '69573', '1649334990'),
(210, 'rohan.powell36@yahoo.com', '49602', '1649334990'),
(211, 'rohan.powell36@yahoo.com', '99412', '1649334990'),
(212, 'rohan.powell36@yahoo.com', '44889', '1649334990'),
(213, 'rohan.powell36@yahoo.com', '69812', '1649334990'),
(214, 'rohan.powell36@yahoo.com', '74793', '1649334990'),
(215, 'rohan.powell36@yahoo.com', '70083', '1649334990'),
(216, 'rohan.powell36@yahoo.com', '35009', '1649334990'),
(217, 'rohan.powell36@yahoo.com', '93585', '1649334990'),
(218, 'rohan.powell36@yahoo.com', '69958', '1649334990'),
(219, 'rohan.powell36@yahoo.com', '69688', '1649334990'),
(220, 'rohan.powell36@yahoo.com', '87365', '1649334990'),
(221, 'rohan.powell36@yahoo.com', '67908', '1649334990'),
(222, 'rohan.powell36@yahoo.com', '79592', '1649334990'),
(223, 'rohan.powell36@yahoo.com', '57455', '1649334990'),
(224, 'rohan.powell36@yahoo.com', '46922', '1649334990'),
(225, 'rohan.powell36@yahoo.com', '96685', '1649334990'),
(226, 'rohan.powell36@yahoo.com', '35738', '1649334990'),
(227, 'rohan.powell36@yahoo.com', '49947', '1649334990'),
(228, 'rohan.powell36@yahoo.com', '55825', '1649334990'),
(229, 'rohan.powell36@yahoo.com', '81898', '1649334991'),
(230, 'rohan.powell36@yahoo.com', '20146', '1649334991'),
(231, 'rohan.powell36@yahoo.com', '36395', '1649334991'),
(232, 'rohan.powell36@yahoo.com', '30110', '1649334991'),
(233, 'rohan.powell36@yahoo.com', '16319', '1649334991'),
(234, 'rohan.powell36@yahoo.com', '46212', '1649334991'),
(235, 'rohan.powell36@yahoo.com', '88175', '1649334991'),
(236, 'rohan.powell36@yahoo.com', '77967', '1649334991'),
(237, 'rohan.powell36@yahoo.com', '48996', '1649334991'),
(238, 'rohan.powell36@yahoo.com', '90288', '1649334991'),
(239, 'rohan.powell36@yahoo.com', '49520', '1649334991'),
(240, 'rohan.powell36@yahoo.com', '95902', '1649334991'),
(241, 'rohan.powell36@yahoo.com', '85839', '1649334991'),
(242, 'rohan.powell36@yahoo.com', '51568', '1649334991'),
(243, 'rohan.powell36@yahoo.com', '14575', '1649334991'),
(244, 'rohan.powell36@yahoo.com', '78081', '1649334991'),
(245, 'rohan.powell36@yahoo.com', '85680', '1649334991'),
(246, 'rohan.powell36@yahoo.com', '20172', '1649334991'),
(247, 'rohan.powell36@yahoo.com', '66066', '1649335319'),
(248, 'rohan.powell36@yahoo.com', '73790', '1649335319'),
(249, 'rohan.powell36@yahoo.com', '11885', '1649335319'),
(250, 'rohan.powell36@yahoo.com', '64556', '1649335319'),
(251, 'rohan.powell36@yahoo.com', '13234', '1649335319'),
(252, 'rohan.powell36@yahoo.com', '95289', '1649335319'),
(253, 'rohan.powell36@yahoo.com', '50105', '1649335319'),
(254, 'rohan.powell36@yahoo.com', '46223', '1649335319'),
(255, 'rohan.powell36@yahoo.com', '75717', '1649335319'),
(256, 'rohan.powell36@yahoo.com', '94738', '1649335319'),
(257, 'rohan.powell36@yahoo.com', '31302', '1649335319'),
(258, 'rohan.powell36@yahoo.com', '89210', '1649335319'),
(259, 'rohan.powell36@yahoo.com', '38968', '1649335319'),
(260, 'rohan.powell36@yahoo.com', '77085', '1649335319'),
(261, 'rohan.powell36@yahoo.com', '11708', '1649335319'),
(262, 'rohan.powell36@yahoo.com', '36456', '1649335319'),
(263, 'rohan.powell36@yahoo.com', '43880', '1649335320'),
(264, 'rohan.powell36@yahoo.com', '98737', '1649335320'),
(265, 'rohan.powell36@yahoo.com', '88205', '1649335320'),
(266, 'rohan.powell36@yahoo.com', '98962', '1649335320'),
(267, 'rohan.powell36@yahoo.com', '65942', '1649335320'),
(268, 'rohan.powell36@yahoo.com', '62702', '1649335320'),
(269, 'rohan.powell36@yahoo.com', '36838', '1649335320'),
(270, 'rohan.powell36@yahoo.com', '87727', '1649335320'),
(271, 'rohan.powell36@yahoo.com', '80297', '1649335320'),
(272, 'rohan.powell36@yahoo.com', '89561', '1649335320'),
(273, 'rohan.powell36@yahoo.com', '94379', '1649335320'),
(274, 'rohan.powell36@yahoo.com', '15163', '1649335320'),
(275, 'rohan.powell36@yahoo.com', '34772', '1649335320'),
(276, 'rohan.powell36@yahoo.com', '88013', '1649335320'),
(277, 'rohan.powell36@yahoo.com', '92724', '1649335320'),
(278, 'rohan.powell36@yahoo.com', '66838', '1649335320'),
(279, 'rohan.powell36@yahoo.com', '41843', '1649335320'),
(280, 'rohan.powell36@yahoo.com', '83652', '1649335320'),
(281, 'rohan.powell36@yahoo.com', '78055', '1649335320'),
(282, 'rohan.powell36@yahoo.com', '53511', '1649335320'),
(283, 'rohan.powell36@yahoo.com', '81949', '1649335320'),
(284, 'rohan.powell36@yahoo.com', '42785', '1649335320'),
(285, 'rohan.powell36@yahoo.com', '62101', '1649335320'),
(286, 'rohan.powell36@yahoo.com', '78546', '1649335320'),
(287, 'rohan.powell36@yahoo.com', '91345', '1649335320'),
(288, 'rohan.powell36@yahoo.com', '50329', '1649335320'),
(289, 'rohan.powell36@yahoo.com', '50545', '1649335320'),
(290, 'rohan.powell36@yahoo.com', '45774', '1649335320'),
(291, 'rohan.powell36@yahoo.com', '54654', '1649335320'),
(292, 'rohan.powell36@yahoo.com', '84243', '1649335320'),
(293, 'rohan.powell36@yahoo.com', '82515', '1649335320'),
(294, 'rohan.powell36@yahoo.com', '95773', '1649335320'),
(295, 'rohan.powell36@yahoo.com', '37767', '1649335320'),
(296, 'rohan.powell36@yahoo.com', '41079', '1649335320'),
(297, 'rohan.powell36@yahoo.com', '14606', '1649335320'),
(298, 'rohan.powell36@yahoo.com', '14515', '1649335320'),
(299, 'rohan.powell36@yahoo.com', '10532', '1649335320'),
(300, 'rohan.powell36@yahoo.com', '10561', '1649335320'),
(301, 'rohan.powell36@yahoo.com', '60886', '1649335320'),
(302, 'rohan.powell36@yahoo.com', '41295', '1649335320'),
(303, 'rohan.powell36@yahoo.com', '88806', '1649335320'),
(304, 'rohan.powell36@yahoo.com', '34031', '1649335320'),
(305, 'rohan.powell36@yahoo.com', '76789', '1649335320'),
(306, 'rohan.powell36@yahoo.com', '39853', '1649335320'),
(307, 'rohan.powell36@yahoo.com', '43810', '1649335320'),
(308, 'rohan.powell36@yahoo.com', '62107', '1649335320'),
(309, 'rohan.powell36@yahoo.com', '94116', '1649335320'),
(310, 'rohan.powell36@yahoo.com', '44852', '1649335320'),
(311, 'rohan.powell36@yahoo.com', '58937', '1649335320'),
(312, 'rohan.powell36@yahoo.com', '59900', '1649335320'),
(313, 'rohan.powell36@yahoo.com', '34417', '1649335320'),
(314, 'rohan.powell36@yahoo.com', '15399', '1649335320'),
(315, 'rohan.powell36@yahoo.com', '94790', '1649335320'),
(316, 'rohan.powell36@yahoo.com', '39617', '1649335320'),
(317, 'rohan.powell36@yahoo.com', '82729', '1649335320'),
(318, 'rohan.powell36@yahoo.com', '30201', '1649335320'),
(319, 'rohan.powell36@yahoo.com', '72859', '1649335320'),
(320, 'rohan.powell36@yahoo.com', '69638', '1649335320'),
(321, 'rohan.powell36@yahoo.com', '61957', '1649335320'),
(322, 'rohan.powell36@yahoo.com', '65279', '1649335320'),
(323, 'rohan.powell36@yahoo.com', '38755', '1649335320'),
(324, 'rohan.powell36@yahoo.com', '54004', '1649335320'),
(325, 'rohan.powell36@yahoo.com', '82505', '1649335320'),
(326, 'rohan.powell36@yahoo.com', '59027', '1649335320'),
(327, 'rohan.powell36@yahoo.com', '58002', '1649335320'),
(328, 'rohan.powell36@yahoo.com', '86976', '1649335320'),
(329, 'rohan.powell36@yahoo.com', '87786', '1649335320'),
(330, 'rohan.powell36@yahoo.com', '89040', '1649335320'),
(331, 'rohan.powell36@yahoo.com', '38171', '1649335320'),
(332, 'rohan.powell36@yahoo.com', '18894', '1649335320'),
(333, 'rohan.powell36@yahoo.com', '18768', '1649335320'),
(334, 'rohan.powell36@yahoo.com', '46587', '1649335320'),
(335, 'rohan.powell36@yahoo.com', '59051', '1649335320'),
(336, 'rohan.powell36@yahoo.com', '50096', '1649335320'),
(337, 'rohan.powell36@yahoo.com', '85911', '1649335320'),
(338, 'rohan.powell36@yahoo.com', '72078', '1649335320'),
(339, 'rohan.powell36@yahoo.com', '85992', '1649335320'),
(340, 'rohan.powell36@yahoo.com', '92654', '1649335320'),
(341, 'rohan.powell36@yahoo.com', '51808', '1649335320'),
(342, 'rohan.powell36@yahoo.com', '64739', '1649335320'),
(343, 'rohan.powell36@yahoo.com', '15991', '1649335320'),
(344, 'rohan.powell36@yahoo.com', '60216', '1649335320'),
(345, 'rohan.powell36@yahoo.com', '24177', '1649335320'),
(346, 'rohan.powell36@yahoo.com', '52311', '1649335320'),
(347, 'rohan.powell36@yahoo.com', '45813', '1649335320'),
(348, 'rohan.powell36@yahoo.com', '92623', '1649335320'),
(349, 'rohan.powell36@yahoo.com', '85424', '1649335320'),
(350, 'rohan.powell36@yahoo.com', '59775', '1649335320'),
(351, 'rohan.powell36@yahoo.com', '30282', '1649335320'),
(352, 'rohan.powell36@yahoo.com', '82617', '1649335320'),
(353, 'rohan.powell36@yahoo.com', '98018', '1649335320'),
(354, 'rohan.powell36@yahoo.com', '80128', '1649335320'),
(355, 'rohan.powell36@yahoo.com', '60484', '1649335320'),
(356, 'rohan.powell36@yahoo.com', '97140', '1649335320'),
(357, 'rohan.powell36@yahoo.com', '15014', '1649335320'),
(358, 'rohan.powell36@yahoo.com', '41995', '1649335320'),
(359, 'rohan.powell36@yahoo.com', '97956', '1649335320'),
(360, 'rohan.powell36@yahoo.com', '87621', '1649335320'),
(361, 'rohan.powell36@yahoo.com', '93705', '1649335320'),
(362, 'rohan.powell36@yahoo.com', '69137', '1649335320'),
(363, 'rohan.powell36@yahoo.com', '35614', '1649335320'),
(364, 'rohan.powell36@yahoo.com', '75745', '1649335320'),
(365, 'rohan.powell36@yahoo.com', '36093', '1649335320'),
(366, 'rohan.powell36@yahoo.com', '50888', '1649335320'),
(367, 'rohan.powell36@yahoo.com', '24094', '1649335320'),
(368, 'rohan.powell36@yahoo.com', '44935', '1649335320'),
(369, 'rohan.powell36@yahoo.com', '31658', '1649335320'),
(370, 'rohan.powell36@yahoo.com', '12328', '1649335320'),
(371, 'rohan.powell36@yahoo.com', '21152', '1649335320'),
(372, 'rohan.powell36@yahoo.com', '30908', '1649335320'),
(373, 'rohan.powell36@yahoo.com', '17837', '1649335320'),
(374, 'rohan.powell36@yahoo.com', '57521', '1649335320'),
(375, 'rohan.powell36@yahoo.com', '97164', '1649335320'),
(376, 'rohan.powell36@yahoo.com', '46541', '1649335320'),
(377, 'rohan.powell36@yahoo.com', '27937', '1649335320'),
(378, 'rohan.powell36@yahoo.com', '12889', '1649335320'),
(379, 'rohan.powell36@yahoo.com', '17280', '1649335320'),
(380, 'rohan.powell36@yahoo.com', '52253', '1649335320'),
(381, 'rohan.powell36@yahoo.com', '73962', '1649335320'),
(382, 'rohan.powell36@yahoo.com', '82594', '1649335320'),
(383, 'rohan.powell36@yahoo.com', '66312', '1649335320'),
(384, 'rohan.powell36@yahoo.com', '74657', '1649335320'),
(385, 'rohan.powell36@yahoo.com', '93190', '1649335320'),
(386, 'rohan.powell36@yahoo.com', '10121', '1649335320'),
(387, 'rohan.powell36@yahoo.com', '21932', '1649335320'),
(388, 'rohan.powell36@yahoo.com', '43012', '1649335320'),
(389, 'rohan.powell36@yahoo.com', '40692', '1649335320'),
(390, 'rohan.powell36@yahoo.com', '16408', '1649335320'),
(391, 'rohan.powell36@yahoo.com', '67084', '1649335320'),
(392, 'rohan.powell36@yahoo.com', '90735', '1649335320'),
(393, 'rohan.powell36@yahoo.com', '32630', '1649335320'),
(394, 'rohan.powell36@yahoo.com', '86017', '1649335320'),
(395, 'rohan.powell36@yahoo.com', '93625', '1649335320'),
(396, 'rohan.powell36@yahoo.com', '78541', '1649335320'),
(397, 'rohan.powell36@yahoo.com', '38156', '1649335320'),
(398, 'rohan.powell36@yahoo.com', '47669', '1649335320'),
(399, 'rohan.powell36@yahoo.com', '46755', '1649335320'),
(400, 'rohan.powell36@yahoo.com', '72342', '1649335320'),
(401, 'rohan.powell36@yahoo.com', '18621', '1649335320'),
(402, 'rohan.powell36@yahoo.com', '65862', '1649335320'),
(403, 'rohan.powell36@yahoo.com', '90880', '1649335320'),
(404, 'rohan.powell36@yahoo.com', '51443', '1649335320'),
(405, 'rohan.powell36@yahoo.com', '24386', '1649335320'),
(406, 'rohan.powell36@yahoo.com', '11865', '1649335320'),
(407, 'rohan.powell36@yahoo.com', '70578', '1649335320'),
(408, 'rohan.powell36@yahoo.com', '36979', '1649335320'),
(409, 'rohan.powell36@yahoo.com', '84487', '1649335320'),
(410, 'rohan.powell36@yahoo.com', '81019', '1649335320'),
(411, 'rohan.powell36@yahoo.com', '38055', '1649335320'),
(412, 'rohan.powell36@yahoo.com', '81940', '1649335320'),
(413, 'rohan.powell36@yahoo.com', '18484', '1649335320'),
(414, 'rohan.powell36@yahoo.com', '73408', '1649335320'),
(415, 'rohan.powell36@yahoo.com', '26184', '1649335320'),
(416, 'rohan.powell36@yahoo.com', '37290', '1649335320'),
(417, 'rohan.powell36@yahoo.com', '83983', '1649335321'),
(418, 'rohan.powell36@yahoo.com', '80067', '1649335321'),
(419, 'rohan.powell36@yahoo.com', '21102', '1649335321'),
(420, 'rohan.powell36@yahoo.com', '21113', '1649335321'),
(421, 'rohan.powell36@yahoo.com', '33650', '1649335321'),
(422, 'rohan.powell36@yahoo.com', '61972', '1649335321'),
(423, 'rohan.powell36@yahoo.com', '71241', '1649335321'),
(424, 'rohan.powell36@yahoo.com', '10982', '1649335321'),
(425, 'rohan.powell36@yahoo.com', '61673', '1649335321'),
(426, 'rohan.powell36@yahoo.com', '61066', '1649335321'),
(427, 'rohan.powell36@yahoo.com', '27139', '1649335321'),
(428, 'rohan.powell36@yahoo.com', '80070', '1649335321'),
(429, 'rohan.powell36@yahoo.com', '22947', '1649335321'),
(430, 'rohan.powell36@yahoo.com', '83129', '1649335321'),
(431, 'rohan.powell36@yahoo.com', '32518', '1649335321'),
(432, 'rohan.powell36@yahoo.com', '17685', '1649335321'),
(433, 'rohan.powell36@yahoo.com', '62286', '1649335321'),
(434, 'rohan.powell36@yahoo.com', '58386', '1649335321'),
(435, 'rohan.powell36@yahoo.com', '39128', '1649335321'),
(436, 'rohan.powell36@yahoo.com', '49974', '1649335321'),
(437, 'rohan.powell36@yahoo.com', '36981', '1649335321'),
(438, 'rohan.powell36@yahoo.com', '84427', '1649335321'),
(439, 'rohan.powell36@yahoo.com', '48298', '1649335321'),
(440, 'rohan.powell36@yahoo.com', '57996', '1649335321'),
(441, 'rohan.powell36@yahoo.com', '90437', '1649335321'),
(442, 'rohan.powell36@yahoo.com', '39576', '1649335321'),
(443, 'rohan.powell36@yahoo.com', '25001', '1649335321'),
(444, 'rohan.powell36@yahoo.com', '78750', '1649335321'),
(445, 'rohan.powell36@yahoo.com', '15851', '1649335321'),
(446, 'rohan.powell36@yahoo.com', '55492', '1649335321'),
(447, 'rohan.powell36@yahoo.com', '20475', '1649335321'),
(448, 'rohan.powell36@yahoo.com', '74341', '1649335321'),
(449, 'rohan.powell36@yahoo.com', '49284', '1649335321'),
(450, 'rohan.powell36@yahoo.com', '73102', '1649335321'),
(451, 'rohan.powell36@yahoo.com', '41443', '1649335321'),
(452, 'rohan.powell36@yahoo.com', '76402', '1649335321'),
(453, 'rohan.powell36@yahoo.com', '85133', '1649335321'),
(454, 'rohan.powell36@yahoo.com', '14145', '1649335321'),
(455, 'rohan.powell36@yahoo.com', '97099', '1649335321'),
(456, 'rohan.powell36@yahoo.com', '53110', '1649335321'),
(457, 'rohan.powell36@yahoo.com', '19432', '1649335321'),
(458, 'rohan.powell36@yahoo.com', '92189', '1649335321'),
(459, 'rohan.powell36@yahoo.com', '82535', '1649335321'),
(460, 'rohan.powell36@yahoo.com', '93712', '1649335321'),
(461, 'rohan.powell36@yahoo.com', '31458', '1649335321'),
(462, 'rohan.powell36@yahoo.com', '65064', '1649335321'),
(463, 'rohan.powell36@yahoo.com', '10498', '1649335321'),
(464, 'rohan.powell36@yahoo.com', '59242', '1649335321'),
(465, 'rohan.powell36@yahoo.com', '89102', '1649335321'),
(466, 'rohan.powell36@yahoo.com', '66329', '1649335321'),
(467, 'rohan.powell36@yahoo.com', '62602', '1649335321'),
(468, 'rohan.powell36@yahoo.com', '67857', '1649335321'),
(469, 'rohan.powell36@yahoo.com', '10540', '1649335321'),
(470, 'rohan.powell36@yahoo.com', '92645', '1649335321'),
(471, 'rohan.powell36@yahoo.com', '48053', '1649335321'),
(472, 'rohan.powell36@yahoo.com', '12272', '1649335321'),
(473, 'rohan.powell36@yahoo.com', '99568', '1649335321'),
(474, 'rohan.powell36@yahoo.com', '99907', '1649335321'),
(475, 'rohan.powell36@yahoo.com', '42878', '1649335321'),
(476, 'rohan.powell36@yahoo.com', '35070', '1649335321'),
(477, 'rohan.powell36@yahoo.com', '51061', '1649335321'),
(478, 'rohan.powell36@yahoo.com', '69443', '1649335321'),
(479, 'rohan.powell36@yahoo.com', '29128', '1649335321'),
(480, 'rohan.powell36@yahoo.com', '34219', '1649335321'),
(481, 'rohan.powell36@yahoo.com', '59039', '1649335321'),
(482, 'rohan.powell36@yahoo.com', '19794', '1649335321'),
(483, 'rohan.powell36@yahoo.com', '62570', '1649335321'),
(484, 'rohan.powell36@yahoo.com', '99170', '1649335321'),
(485, 'rohan.powell36@yahoo.com', '44301', '1649335321'),
(486, 'rohan.powell36@yahoo.com', '33014', '1649335321'),
(487, 'rohan.powell36@yahoo.com', '69226', '1649335321'),
(488, 'rohan.powell36@yahoo.com', '67527', '1649335321'),
(489, 'rohan.powell36@yahoo.com', '29404', '1649335321'),
(490, 'rohan.powell36@yahoo.com', '32099', '1649335321'),
(491, 'rohan.powell36@yahoo.com', '34277', '1649335321'),
(492, 'rohan.powell36@yahoo.com', '41486', '1649335321'),
(493, 'rohan.powell36@yahoo.com', '51834', '1649335321'),
(494, 'rohan.powell36@yahoo.com', '56881', '1649335321'),
(495, 'rohan.powell36@yahoo.com', '31996', '1649335321'),
(496, 'rohan.powell36@yahoo.com', '15843', '1649335321'),
(497, 'rohan.powell36@yahoo.com', '24057', '1649335321'),
(498, 'rohan.powell36@yahoo.com', '64346', '1649335321'),
(499, 'rohan.powell36@yahoo.com', '38402', '1649335321'),
(500, 'rohan.powell36@yahoo.com', '38461', '1649335569'),
(501, 'rohan.powell36@yahoo.com', '57351', '1649335626'),
(502, 'rohan.powell36@yahoo.com', '98298', '1649335626'),
(503, 'rohan.powell36@yahoo.com', '86148', '1649335710'),
(504, 'rohan.powell36@yahoo.com', '56885', '1649335710'),
(505, 'rohan.powell36@yahoo.com', '81554', '1649335803'),
(506, 'rohan.powell36@yahoo.com', '32658', '1649335891'),
(507, 'rohan.powell36@yahoo.com', '28201', '1649336139'),
(508, 'rohan.powell36@yahoo.com', '66444', '1649336156'),
(509, 'rohan.powell36@yahoo.com', '16045', '1649336733'),
(510, 'rohan.powell36@yahoo.com', '33596', '1649336927'),
(511, 'rohan.powell36@yahoo.com', '33758', '1649337034'),
(512, 'rohan.powell36@gmail.com', '68113', '1649337497'),
(513, 'rohan.powell36@yahoo.com', '77215', '1649339628'),
(514, 'rohan.powell36@yahoo.com', '59132', '1649339702'),
(515, 'rohan.powell36@yahoo.com', '55461', '1649339764'),
(516, 'rohan.powell36@yahoo.com', '56244', '1649339776'),
(517, 'rohan.powell36@yahoo.com', '87582', '1649339814'),
(518, 'rohan.powell36@yahoo.com', '43699', '1649339861'),
(519, 'rohan.powell36@yahoo.com', '19839', '1649339888'),
(520, 'rohan.powell36@yahoo.com', '85139', '1649339949'),
(521, '', '25177', '1649351507'),
(522, '', '56326', '1649351593'),
(523, '', '78837', '1649351828'),
(524, '', '61080', '1649351837'),
(525, '', '88681', '1649351944'),
(526, '', '20036', '1649352130'),
(527, '', '88871', '1649352135'),
(528, '', '65927', '1649352139'),
(529, '', '94288', '1649352143'),
(530, '', '79527', '1649352345'),
(531, '', '99081', '1649352347'),
(532, '', '59912', '1649352350'),
(533, '', '40221', '1649352351'),
(534, '', '35686', '1649352352'),
(535, 'rpowell18@stu.ucc.edu.jm', '27770', '1649352817'),
(536, 'rpowell18@stu.ucc.edu.jm', '64063', '1649353328'),
(537, 'rohan.powell36@yahoo.com', '22134', '1649353352'),
(538, 'rohan.powell36@yahoo.com', '92663', '1649353432'),
(539, 'rpowell18@stu.ucc.edu.jm', '39091', '1649353606'),
(540, 'rpowell18@stu.ucc.edu.jm', '87279', '1649353680'),
(541, 'rpowell18@stu.ucc.edu.jm', '60770', '1649353703'),
(542, 'rpowell18@stu.ucc.edu.jm', '26647', '1649353758'),
(543, 'rpowell18@stu.ucc.edu.jm', '45654', '1649353846'),
(544, 'rpowell18@stu.ucc.edu.jm', '68888', '1649353901'),
(545, 'rpowell18@stu.ucc.edu.jm', '50037', '1649354319'),
(546, 'rpowell18@stu.ucc.edu.jm', '62093', '1649354358'),
(547, 'rpowell18@stu.ucc.edu.jm', '45722', '1649355214'),
(548, 'rohan.powell36@yahoo.com', '48114', '1649358930'),
(549, 'rpowell18@stu.ucc.edu.jm', '28446', '1649359815'),
(550, 'rohan.powell36@gmail.com', '25361', '1649360722'),
(551, 'rohan.powell36@yahoo.com', '44716', '1649361381'),
(552, 'rohan.powell36@gmail.com', '74412', '1649361966'),
(553, 'rohan.powell36@yahoo.com', '45217', '1649362045'),
(554, 'rohan.powell36@gmail.com', '72269', '1649362286'),
(555, 'rohan.powell36@gmail.com', '59843', '1649362353'),
(556, 'rohan.powell36@yahoo.com', '90073', '1649364072'),
(557, 'rpowell18@stu.ucc.edu.jm', '56856', '1649445115'),
(558, 'okeive@stu.ucc.edu.jm', '34500', '1649537094'),
(559, 'okeive@stu.ucc.edu.jm', '27384', '1649537520'),
(560, 'rohan.powell36@yahoo.com', '11978', '1649538036'),
(561, 'rohan.powell36@gmail.com', '16792', '1649538723'),
(562, 'rohan.powell36@gmail.com', '31595', '1649539198'),
(563, 'rohan.powell36@yahoo.com', '93023', '1649539540'),
(564, 'rohan.powell36@gmail.com', '80302', '1649539667'),
(565, 'rohan.powell36@yahoo.com', '57605', '1649550992'),
(566, 'rpowell18@stu.ucc.edu.jm', '51895', '1649551086'),
(567, 'rpowell18@stu.ucc.edu.jm', '52004', '1649551680'),
(568, 'rohan.powell36@yahoo.com', '38128', '1649627353'),
(569, 'oneikaamelia@gmail.com', '22615', '1649957569'),
(570, 'rpowell18@stu.ucc.edu.jm', '36098', '1650027046'),
(571, 'rpowell18@stu.ucc.edu.jm', '20063', '1650080035'),
(572, 'wallaceyanique@gmail.com', '15604', '1650138100'),
(573, 'wallaceyanique@gmail.com', '66425', '1650138358'),
(574, 'wallaceyanique@gmail.com', '49412', '1650139250'),
(575, 'rohan.powell36@yahoo.com', '39002', '1650140777'),
(576, 'wallaceyanique@gmail.com', '10712', '1650143513'),
(577, 'gennalife23@gmail.com', '88272', '1650755153'),
(578, 'rohan.powell36@gmail.com', '37475', '1650764775'),
(579, 'rohan.powell36@gmail.com', '38434', '1650764919'),
(580, 'rohan.powell36@gmail.com', '65598', '1650765109'),
(581, 'rohan.powell36@gmail.com', '24869', '1650765488'),
(582, 'rohan.powell36@yahoo.com', '91393', '1651295204'),
(583, 'abby@yahoo.com', '83083', '1651300687'),
(584, 'abby@yahoo.com', '21355', '1651300895'),
(585, 'abby@yahoo.com', '99738', '1651300976'),
(586, 'rohan.powell36@yahoo.com', '86964', '1651708477'),
(587, 'rohan.powell36@yahoo.com', '88798', '1651708600'),
(588, 'rohan.powell36@yahoo.com', '16418', '1651711640'),
(589, 'rpowell18@stu.ucc.edu.jm', '51576', '1651758634'),
(590, 'rpowell18@stu.ucc.edu.jm', '61047', '1651759232'),
(591, 'rpowell18@stu.ucc.edu.jm', '43862', '1651764880'),
(592, 'rpowell18@stu.ucc.edu.jm', '37444', '1651765458'),
(593, 'rpowell18@stu.ucc.edu.jm', '33933', '1651765847'),
(594, 'rpowell18@stu.ucc.edu.jm', '84979', '1651769463'),
(595, 'rohan.powell36@yahoo.com', '44453', '1651770206'),
(596, 'rohan.powell36@yahoo.com', '26509', '1651770961'),
(597, 'rohan.powell36@yahoo.com', '93991', '1651770963'),
(598, 'rohan.powell36@yahoo.com', '78755', '1651770980'),
(599, 'rohan.powell36@yahoo.coml', '26814', '1651771215'),
(600, 'rohan.powell36@yahoo.coml', '77357', '1651771291'),
(601, 'rohan.powell36@yahoo.coml', '90430', '1651771556'),
(602, 'rohan.powell36@yahoo.com', '62947', '1651771761'),
(603, 'rohan.powell36@yahoo.com', '20248', '1651771992'),
(604, 'rohan.powell36@yahoo.com', '85686', '1651772900'),
(605, 'rohan.powell36@yahoo.coml', '41070', '1651773349'),
(606, 'rohan.powell36@yahoo.com', '82815', '1651773361'),
(607, 'rohan.powell36@yahoo.com', '99681', '1651774020'),
(608, 'rohan.powell36@yahoo.com', '43658', '1651774033'),
(609, 'rohan.powell36@yahoo.com', '84761', '1651774483'),
(610, 'rohan.powell36@yahoo.com', '83636', '1651774902'),
(611, 'rpowell18@stu.ucc.edu.jm', '64763', '1661005176'),
(612, 'rohan.powell36@yahoo.com', '56408', '1661005335'),
(613, 'rohan.powell36@yahoo.com', '94658', '1661006912'),
(614, 'rohan.powell36@yahoo.com', '90296', '1661006921'),
(615, 'rohan.powell36@yahoo.com', '36988', '1661006954'),
(616, 'rohan.powell36@yahoo.com', '68537', '1661008139'),
(617, 'rohan.powell36@yahoo.com', '12198', '1661008964'),
(618, 'rohan.powell36@gmail.com', '33024', '1661737423'),
(619, 'rohan.powell36@gmail.com', '10960', '1661737682'),
(620, 'rohan.powell36@yahoo.com', '95866', '1661738044'),
(621, 'rohan.powell36@yahoo.com', '43224', '1661738741'),
(622, 'rohan.powell36@gmail.com', '13374', '1661742146'),
(623, 'rohan.powell36@gmail.com', '31673', '1661742293');

-- --------------------------------------------------------

--
-- Table structure for table `coordinates`
--

DROP TABLE IF EXISTS `coordinates`;
CREATE TABLE IF NOT EXISTS `coordinates` (
  `StoreID` int(5) NOT NULL,
  `Longitude` varchar(12) NOT NULL,
  `Lattitude` varchar(12) NOT NULL,
  PRIMARY KEY (`StoreID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coordinates`
--

INSERT INTO `coordinates` (`StoreID`, `Longitude`, `Lattitude`) VALUES
(30, '-78.1318989', '18.2237887'),
(31, ' -78.1318989', '18.2251732'),
(32, '-78.1340103', '18.2106209'),
(34, '-78.0349714', '18.2615286'),
(35, '-78.1335559', '18.2221587'),
(36, '-77.976227', '18.2353747'),
(37, '-77.92478346', '18.45998419'),
(38, '-77.5102776', '18.0448469'),
(39, '-77.9010518', '18.9623568'),
(40, '-77.925613', '18.4554447');

-- --------------------------------------------------------

--
-- Table structure for table `customerorder`
--

DROP TABLE IF EXISTS `customerorder`;
CREATE TABLE IF NOT EXISTS `customerorder` (
  `CustomerId` int(10) NOT NULL,
  `orderID` int(10) NOT NULL AUTO_INCREMENT,
  `isCashout` tinyint(1) NOT NULL,
  `OrderDate` varchar(12) NOT NULL,
  PRIMARY KEY (`orderID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerorder`
--

INSERT INTO `customerorder` (`CustomerId`, `orderID`, `isCashout`, `OrderDate`) VALUES
(45, 30, 1, '24/08/2022'),
(45, 31, 1, '25/08/2022'),
(45, 32, 1, '25/08/2022'),
(44, 33, 1, '26/08/2022'),
(44, 34, 1, '26/08/2022'),
(45, 35, 1, '26/08/2022'),
(45, 36, 1, '26/08/2022'),
(45, 37, 1, '26/08/2022'),
(46, 38, 0, '29/08/2022'),
(46, 39, 1, '29/08/2022'),
(46, 40, 1, '08/09/2022'),
(46, 41, 0, '08/09/2022'),
(46, 42, 1, '08/09/2022'),
(46, 43, 1, '08/09/2022');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telephone` varchar(12) NOT NULL,
  `Street` varchar(30) NOT NULL,
  `Town` varchar(30) NOT NULL,
  `Parish` varchar(15) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Role` varchar(13) NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`CustomerID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `FirstName`, `LastName`, `Email`, `Telephone`, `Street`, `Town`, `Parish`, `Username`, `Password`, `Role`) VALUES
(36, 'User1', 'powell', 'rpowell18@stu.ucc.edu.jm', '876-297-4495', 'Petersfield', 'Whithorn', 'Westmoreland', 'User1', '$2y$10$ylPbg/mErehODWbwv3/xYuUKSkwNYXvaCbytoFDbMpKoYNPJb4P.6', 'customer'),
(37, 'Okieve ', 'James', 'okeive@stu.ucc.edu.jm', '875-854-5122', 'fhghj', 'vhbn', 'St. Ann', 'OJames', '$2y$10$4r2SLEDEfvKAwUXM0Rw4O.j8d39PkLw1iEQEo5fAJld/P/7mJihvS', 'customer'),
(39, 'Oneika', 'Hutchinon', 'oneikaamelia@gmail.com', '876-965-5245', 'Farm Pen', 'Savanna-La-Mar', 'St. Catherine', 'Neika', '$2y$10$8mBD1QOfTjfH2PyBPb7WZuK644YOKI1CdEg2Skl2DKoSeXf/kaiBa', 'customer'),
(40, 'Yanique', 'Wallace', 'wallaceyanique@gmail.com', '876-854-2222', 'Meadowbrook', 'zpain', 'Kingston', 'YanYan', '$2y$10$vnxEDPd1NyIfC3QRji9qPOs2bb1YsJHm.OdIq5I4fu1.oXbdt0ls6', 'customer'),
(44, 'Rohan', 'Powell', 'rohan.powell36@yahoo.com', '876-854-8654', 'Meadowbrook', 'Greenwich', 'St. Thomas', 'User2', '$2y$10$DCvYtUN7tr/1kOuumCj/ne0ZaK6SeWLFbY.uHqsxikDJ5.NWh08eS', 'customer'),
(45, 'NewUser', 'Powell', 'rohan.powell36@yahoo.com', '876-297-4495', 'Shrewsbury Housing Scheme', 'Petersfield', 'Westmoreland', 'NewUser', '$2y$10$WatreQ7UkeLUiCpiG5lBZOG/BAoHex0FYFXefdTam0oGzybk1POkK', 'customer'),
(46, 'Rohan', 'Powell', 'rohan.powell36@gmail.com', '876-885-8695', 'Shrewsbury Housing Scheme', 'Petersfield', 'Westmoreland', 'RohanP', '$2y$10$tPFHNsTf6vVpMklxABWD0ecO922zEDRCoojfUGGJSWKfZqS2nxi6K', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE IF NOT EXISTS `delivery` (
  `OrderId` int(10) NOT NULL,
  `DeliveryAddress` varchar(150) NOT NULL,
  `DeliveryTime` varchar(12) NOT NULL,
  `DeliveryDate` varchar(12) NOT NULL,
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`OrderId`, `DeliveryAddress`, `DeliveryTime`, `DeliveryDate`) VALUES
(30, 'Pickup at Store', '22:11', '2022-08-25'),
(31, 'Pickup at Store', '01:39', '2022-08-30'),
(32, 'Pickup at Store', '22:24', '2022-09-08'),
(33, 'Pickup at Store', '04:26', '2022-08-29'),
(34, 'Shrewsbury Housing Scheme,Petersfield,Westmoreland', '01:43', '2022-08-12'),
(35, 'Shrewsbury Housing Scheme,Petersfield,Westmoreland', '01:42', '2022-09-06'),
(36, 'Shrewsbury Housing Scheme,Petersfield,Westmoreland', '01:48', '2022-08-17'),
(37, 'Shrewsbury Housing Scheme,Petersfield,Westmoreland', '01:49', '2022-08-29'),
(39, 'Shrewsbury Housing Scheme,Petersfield,Westmoreland', '14:40', '2022-08-29'),
(40, 'Pickup at Store', '22:45', '2022-09-15'),
(42, 'Pickup at Store', '10:00', '2022-09-09'),
(43, 'Pickup at Store', '12:00', '2022-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `managersinfo`
--

DROP TABLE IF EXISTS `managersinfo`;
CREATE TABLE IF NOT EXISTS `managersinfo` (
  `ManagerID` int(4) NOT NULL,
  `Title` varchar(4) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  PRIMARY KEY (`ManagerID`),
  UNIQUE KEY `Email-Address` (`Email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managersinfo`
--

INSERT INTO `managersinfo` (`ManagerID`, `Title`, `Firstname`, `Lastname`, `Email`, `phone`) VALUES
(100, 'Mr', 'Tom', 'Jones', 'tommy@gmail.com', '876-297-4495'),
(230, 'Mr.', 'Rohan', 'Powell', 'rohan.powell36@gmail.com', '876-337-2845'),
(256, 'Mr', 'Li', 'Chowyun', 'Lichowyun@yahoo.com', '876-885-9654'),
(554, 'Mr.', 'Timmy', 'Chin', 'timmyChin@yahoo.com', '876-856-7845'),
(649, 'Mr.', 'Theodore', 'Sprint', 'TheodoreS@yahoo.com', '876-885-7458'),
(748, 'Mr', 'Jonothan', 'Kent', 'johnny@yahoo.com', '876-985-9654'),
(756, 'Ms.', 'Lionetta', 'Lions', 'Lions@yahoo.com', '876-854-9654'),
(888, 'Mr', 'Chow ', 'Yunfat', 'chow@yahoo.com', '876-965-8545');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

DROP TABLE IF EXISTS `ordertable`;
CREATE TABLE IF NOT EXISTS `ordertable` (
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(80) NOT NULL,
  `ProductDescription` varchar(150) NOT NULL,
  `QuantityOrdered` int(100) NOT NULL,
  `UnitPrice` float NOT NULL,
  `PriceForThree` float NOT NULL,
  `Total` float NOT NULL,
  `Amountinstock` int(11) NOT NULL,
  PRIMARY KEY (`OrderId`,`ProductId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`OrderId`, `ProductId`, `ProductName`, `ProductDescription`, `QuantityOrdered`, `UnitPrice`, `PriceForThree`, `Total`, `Amountinstock`) VALUES
(30, 154, 'Heineken 6pk 300ml', 'descrip goes here', 1, 187, 2.89, 187, 24),
(30, 232, 'Adam and Eve Apple Juice 200ml', 'descrip goes here', 1, 270, 2.89, 270, 32),
(30, 456, 'N95 Mask 25pcs', 'descrip goes here', 1, 600, 2.89, 600, 24),
(31, 21, 'Adam and Eve Apple Juice 200ml', 'descrip goes here', 1, 270, 2.89, 270, 6),
(31, 78, 'Heineken 6pk 300ml', 'descrip goes here', 1, 187, 2.89, 187, 24),
(31, 456, 'N95 Mask 25pcs', 'descrip goes here', 1, 600, 2.89, 600, 24),
(32, 394, 'N95 Mask 25pcs', 'descrip goes here', 4, 600, 2.89, 2334, 24),
(32, 635, 'Heineken 6pk 300ml', 'descrip goes here', 1, 187, 2.89, 187, 24),
(33, 21, 'Adam and Eve Apple Juice 200ml', 'descrip goes here', 1, 270, 2.89, 270, 6),
(33, 78, 'Heineken 6pk 300ml', 'descrip goes here', 1, 187, 2.89, 187, 24),
(33, 232, 'Adam and Eve Apple Juice 200ml', 'descrip goes here', 1, 270, 2.89, 270, 32),
(33, 456, 'N95 Mask 25pcs', 'descrip goes here', 1, 600, 2.89, 600, 24),
(34, 21, 'Adam and Eve Apple Juice 200ml', 'descrip goes here', 1, 270, 2.89, 270, 6),
(34, 78, 'Heineken 6pk 300ml', 'descrip goes here', 1, 187, 2.89, 187, 24),
(34, 232, 'Adam and Eve Apple Juice 200ml', 'descrip goes here', 1, 270, 2.89, 270, 32),
(34, 456, 'N95 Mask 25pcs', 'descrip goes here', 1, 600, 2.89, 600, 24),
(35, 21, 'Adam and Eve Apple Juice 200ml', 'descrip goes here', 1, 270, 2.89, 270, 6),
(35, 78, 'Heineken 6pk 300ml', 'descrip goes here', 3, 187, 2.89, 540.43, 24),
(36, 78, 'Heineken 6pk 300ml', 'descrip goes here', 1, 187, 2.89, 187, 24),
(37, 66, 'Adam and Eve Apple Juice 200ml', 'descrip goes here', 1, 270, 2.89, 270, 32),
(37, 394, 'N95 Mask 25pcs', 'descrip goes here', 1, 600, 2.89, 600, 24),
(38, 154, 'Heineken 6pk 300ml', 'descrip goes here', 1, 187, 2.89, 187, 24),
(39, 154, 'Heineken 6pk 300ml', 'descrip goes here', 1, 187, 2.89, 187, 24),
(39, 232, 'Adam and Eve Apple Juice 200ml', 'descrip goes here', 1, 270, 2.89, 270, 32),
(39, 456, 'N95 Mask 25pcs', 'descrip goes here', 4, 600, 2.89, 2334, 24),
(40, 21, 'Adam and Eve Apple Juice 200ml', 'descrip goes here', 2, 270, 2.89, 540, 6),
(40, 154, 'Heineken 6pk 300ml', 'descrip goes here', 4, 187, 2.89, 727.43, 24),
(41, 232, 'Adam and Eve Apple Juice 200ml', 'descrip goes here', 1, 270, 2.89, 270, 32),
(42, 21, 'Adam and Eve Apple Juice 200ml', 'descrip goes here', 1, 270, 2.89, 270, 6),
(42, 78, 'Heineken 6pk 300ml', 'descrip goes here', 1, 187, 2.89, 187, 24),
(42, 394, 'N95 Mask 25pcs', 'descrip goes here', 1, 600, 2.89, 600, 24),
(43, 21, 'Adam and Eve Apple Juice 200ml', 'descrip goes here', 1, 270, 2.89, 270, 6),
(43, 78, 'Heineken 6pk 300ml', 'descrip goes here', 1, 187, 2.89, 187, 24),
(43, 394, 'N95 Mask 25pcs', 'descrip goes here', 1, 600, 2.89, 600, 24);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `OrderId` int(12) NOT NULL,
  `PaymentMethod` varchar(30) NOT NULL,
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`OrderId`, `PaymentMethod`) VALUES
(30, 'Pay on Delivery'),
(31, 'Pay on Delivery'),
(32, 'Pay on Delivery'),
(33, 'Pay on Delivery'),
(34, 'Credit Card'),
(35, 'Pay with PayPal'),
(36, 'Credit Card'),
(37, 'Pay with PayPal'),
(39, 'Pay on Delivery'),
(40, 'Pay on Delivery'),
(42, 'Pay on Delivery'),
(43, 'Pay on Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `storemanagers`
--

DROP TABLE IF EXISTS `storemanagers`;
CREATE TABLE IF NOT EXISTS `storemanagers` (
  `ManagerID` int(5) NOT NULL,
  `StoreID` int(5) NOT NULL,
  PRIMARY KEY (`ManagerID`,`StoreID`) USING BTREE,
  UNIQUE KEY `StoreID` (`StoreID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storemanagers`
--

INSERT INTO `storemanagers` (`ManagerID`, `StoreID`) VALUES
(888, 30),
(888, 31),
(888, 32),
(256, 34),
(756, 35),
(100, 36),
(649, 37),
(554, 38),
(748, 39),
(230, 40);

-- --------------------------------------------------------

--
-- Table structure for table `storeorders`
--

DROP TABLE IF EXISTS `storeorders`;
CREATE TABLE IF NOT EXISTS `storeorders` (
  `orderID` int(10) NOT NULL,
  `StoreName` varchar(50) NOT NULL,
  PRIMARY KEY (`orderID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storeorders`
--

INSERT INTO `storeorders` (`orderID`, `StoreName`) VALUES
(30, 'longpeng'),
(31, 'longpeng'),
(32, 'Shoppers Fair'),
(33, 'Shoppers Fair'),
(34, 'longpeng'),
(35, 'Shoppers Fair'),
(36, 'longpeng'),
(37, 'Grandeur Foods'),
(38, 'Grandeur Foods'),
(39, 'Shoppers Fair'),
(40, 'Shoppers Fair'),
(41, 'D and Y Supermarket'),
(42, 'Shoppers Fair'),
(43, 'longpeng');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `StoreID` int(11) NOT NULL AUTO_INCREMENT,
  `Storename` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Parish` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `OpeningHours` varchar(200) NOT NULL,
  `StoreImage` longblob NOT NULL,
  PRIMARY KEY (`StoreID`),
  UNIQUE KEY `storeemail` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`StoreID`, `Storename`, `Email`, `Parish`, `Address`, `OpeningHours`, `StoreImage`) VALUES
(30, 'longpeng', 'longpeng@yahoo.com', 'Westmoreland', 'Beckford Street', '8am to 8pm on Monday to Fridays and 10am to 9pm on Saturdays. Closed on Sunday.', 0x494d472d36323632396237373133356363352e36313830383437392e6a7067),
(31, 'Shoppers Fair', 'shoppersfair@gmail.com', 'Westmoreland', 'Beckford Plaza', '9am to 5pm on Monday to Fridays and 10am to 6pm on Saturdays and Sundays.', 0x494d472d36323632613138323935323332372e30373738353432322e706e67),
(32, 'D and Y Supermarket', 'dandy@yahoo.com', 'Westmoreland', 'Great George Street', '9am to 5pm on Monday to Fridays and 10am to 6pm on Saturdays and Sundays.', 0x494d472d36323632613362353730646161392e34343837333932362e6a7067),
(34, 'Grandeur Foods', 'grandeur@yahoo.com', 'Westmoreland', 'Whithorn', '8am to 8pm on Monday to Fridays and 10am to 9pm on Saturdays. Closed on Sunday.', 0x494d472d36323661646434353236363038302e39343534343037382e6a7067),
(35, 'Lulufah', 'lulufah@gmail.com', 'Westmoreland', 'Savanna La Mar', '9am to 5pm on Monday to Fridays and 10am to 6pm on Saturdays and Sundays.', 0x494d472d36323661653530333135303433352e36383834303232302e6a7067),
(36, 'Two Two Fa Supermarket', 'two@gmail.com', 'Westmoreland', 'Savana La Mar', '5am to 6pm on monday to fridays', 0x494d472d36323737306338393362646132382e36353439343535382e6a7067),
(37, 'Megamart Cost Club Limited', 'megamartccl@gmail.com', 'St. James', 'Catherine Hall, Montego Bay, St. James', '8am to 10pm Everyday', 0x494d472d36333161306134363135343764332e38393838313634392e6a7067),
(38, 'Superplus Food store', 'superplusfoods@gmail.com', 'Manchester', '4 Manchester Road, Mandeville, Manchester', '8am to 8pm on Mondays to Fridays and 8am to 10 pm on Saturdays. Closed on Sundays', 0x494d472d36333161306337656531616438342e35373238303536372e706e67),
(39, 'Hilo Food store', 'hiloja@gmail.com', 'St. Catherine', 'X473+7R Portmore, St. Catherine', '9am to 9pm Monday to Fridays and 9am to 10pm on Saturdays. Closed on Sundays and Public Holidays', 0x494d472d36333161306565306534356466332e32383734363033302e706e67),
(40, 'Fontana -Montego Bay', 'fontana@gmail.com', 'St. James', 'Alice Eldimire Drive, Montego Bay, St. James', '9am to 9pm Monday to Fridays and 9am to 10pm on Saturdays. Closed on Sundays and Public Holidays', 0x494d472d36333237353861306162363036362e37393033343634342e706e67);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coordinates`
--
ALTER TABLE `coordinates`
  ADD CONSTRAINT `coordinates_ibfk_1` FOREIGN KEY (`StoreID`) REFERENCES `stores` (`StoreID`);

--
-- Constraints for table `customerorder`
--
ALTER TABLE `customerorder`
  ADD CONSTRAINT `customerorder_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `ordertable` (`OrderId`) ON UPDATE NO ACTION;

--
-- Constraints for table `storemanagers`
--
ALTER TABLE `storemanagers`
  ADD CONSTRAINT `storemanagers_ibfk_1` FOREIGN KEY (`StoreID`) REFERENCES `stores` (`StoreID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `storemanagers_ibfk_2` FOREIGN KEY (`ManagerID`) REFERENCES `managersinfo` (`ManagerID`) ON UPDATE NO ACTION;

--
-- Constraints for table `storeorders`
--
ALTER TABLE `storeorders`
  ADD CONSTRAINT `storeorders_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `customerorder` (`orderID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_ibfk_1` FOREIGN KEY (`StoreID`) REFERENCES `storeorders` (`orderID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
