-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2021 at 02:01 PM
-- Server version: 5.7.33-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projec37_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblchat`
--

CREATE TABLE `tblchat` (
  `idchat` int(11) NOT NULL,
  `iduser1` int(11) NOT NULL,
  `iduser2` int(11) NOT NULL,
  `Delete_chat` int(11) NOT NULL DEFAULT '0',
  `archive` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblchat`
--

INSERT INTO `tblchat` (`idchat`, `iduser1`, `iduser2`, `Delete_chat`, `archive`) VALUES
(1, 2, 1, 0, 0),
(12, 1, 3, 0, 0),
(13, 2, 6, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcommenLike`
--

CREATE TABLE `tblcommenLike` (
  `idcommenLike` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcomment` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblcommenLike`
--

INSERT INTO `tblcommenLike` (`idcommenLike`, `iduser`, `idcomment`) VALUES
(16, 1, 2),
(17, 6, 4),
(15, 1, 5),
(18, 6, 5),
(19, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

CREATE TABLE `tblcomment` (
  `idcomment` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `sub` int(11) NOT NULL DEFAULT '0',
  `text` longtext COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblcomment`
--

INSERT INTO `tblcomment` (`idcomment`, `iduser`, `idpost`, `sub`, `text`) VALUES
(1, 1, 2, 0, 'تست کامنت'),
(2, 3, 1, 0, 'تست کامنت'),
(8, 1, 1, 0, 'jsj'),
(3, 2, 2, 0, 'sdfasf'),
(4, 1, 2, 0, 'سلام تست فرم'),
(5, 2, 2, 4, 'تست ریپلای'),
(7, 1, 2, 3, 'afdsaf'),
(9, 2, 14, 0, 'kasld');

-- --------------------------------------------------------

--
-- Table structure for table `tblconnection`
--

CREATE TABLE `tblconnection` (
  `idconnection` int(11) NOT NULL,
  `iduser1` int(11) NOT NULL,
  `iduser2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblconnection`
--

INSERT INTO `tblconnection` (`idconnection`, `iduser1`, `iduser2`) VALUES
(1, 1, 2),
(9, 4, 1),
(11, 1, 7),
(5, 2, 3),
(10, 1, 3),
(12, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tblendorse`
--

CREATE TABLE `tblendorse` (
  `idendorse` int(11) NOT NULL,
  `value` longtext COLLATE utf8_persian_ci NOT NULL,
  `idskill` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `star` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblendorse`
--

INSERT INTO `tblendorse` (`idendorse`, `value`, `idskill`, `iduser`, `star`) VALUES
(11, 'تست', 55, 1, 4),
(9, 'تست', 55, 3, 4),
(10, 'تست', 55, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblinvitation`
--

CREATE TABLE `tblinvitation` (
  `idinvitation` int(11) NOT NULL,
  `value` text COLLATE utf8_persian_ci NOT NULL,
  `iduser_send` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `iduser_get` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblinvitation`
--

INSERT INTO `tblinvitation` (`idinvitation`, `value`, `iduser_send`, `status`, `iduser_get`) VALUES
(1, 'Accept my request please', 2, 1, 1),
(2, 'ahamd ', 3, 1, 2),
(3, 'Hi !', 1, 1, 2),
(4, '72', 1, 1, 3),
(5, '72', 7, 1, 1),
(6, 'سلام', 6, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbllanguages`
--

CREATE TABLE `tbllanguages` (
  `idlanguages` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `value` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `kind` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbllanguages`
--

INSERT INTO `tbllanguages` (`idlanguages`, `iduser`, `value`, `kind`) VALUES
(55, 1, 'arbaic', 1),
(54, 2, 'English', 1),
(53, 2, 'Persian', 1),
(52, 1, 'Arabic', 1),
(51, 1, 'Spanish', 1),
(50, 1, 'French', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblLikePost`
--

CREATE TABLE `tblLikePost` (
  `idPostLike` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblLikePost`
--

INSERT INTO `tblLikePost` (`idPostLike`, `idpost`, `iduser`) VALUES
(9, 2, 1),
(7, 2, 3),
(8, 12, 2),
(10, 1, 1),
(11, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblmenu`
--

CREATE TABLE `tblmenu` (
  `idmenu` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `url` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `icon` text COLLATE utf8_persian_ci NOT NULL,
  `subitem` int(11) NOT NULL,
  `kindadmin` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblmenu`
--

INSERT INTO `tblmenu` (`idmenu`, `name`, `url`, `icon`, `subitem`, `kindadmin`) VALUES
(1, 'خانه', 'main', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" aria-hidden=\"true\" focusable=\"false\" width=\"1em\" height=\"1em\" style=\"-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);\" preserveAspectRatio=\"xMidYMid meet\" viewBox=\"0 0 16 16\"><g fill=\"white\"><path fill-rule=\"evenodd\" d=\"M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z\"/><path fill-rule=\"evenodd\" d=\"M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207L1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z\"/></g></svg>', 0, 0),
(2, 'جستجوی یوزر', 'shearch-user', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" aria-hidden=\"true\" focusable=\"false\" width=\"1em\" height=\"1em\" style=\"-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);\" preserveAspectRatio=\"xMidYMid meet\" viewBox=\"0 0 24 24\"><path d=\"M9.5 3A6.5 6.5 0 0 1 16 9.5c0 1.61-.59 3.09-1.56 4.23l.27.27h.79l5 5l-1.5 1.5l-5-5v-.79l-.27-.27A6.516 6.516 0 0 1 9.5 16A6.5 6.5 0 0 1 3 9.5A6.5 6.5 0 0 1 9.5 3m0 2C7 5 5 7 5 9.5S7 14 9.5 14S14 12 14 9.5S12 5 9.5 5z\" fill=\"white\"/></svg>', 0, 0),
(3, 'براساس کانکشن مشترک', 'search-user-connection', '', 2, 0),
(4, 'مکان،شرکت فعلی و...', 'search-user-sair', '', 2, 0),
(5, 'پست', 'Post', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" aria-hidden=\"true\" focusable=\"false\" width=\"1em\" height=\"1em\" style=\"-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);\" preserveAspectRatio=\"xMidYMid meet\" viewBox=\"0 0 16 16\"><g fill=\"white\"><path d=\"M4 3.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-8z\"/><path d=\"M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z\"/></g></svg>', 0, 0),
(6, 'اضفه کردن پست', 'add-post', '', 5, 0),
(7, 'نتورک من', 'my_network', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-share-2\"><circle cx=\"18\" cy=\"5\" r=\"3\"></circle><circle cx=\"6\" cy=\"12\" r=\"3\"></circle><circle cx=\"18\" cy=\"19\" r=\"3\"></circle><line x1=\"8.59\" y1=\"13.51\" x2=\"15.42\" y2=\"17.49\"></line><line x1=\"15.41\" y1=\"6.51\" x2=\"8.59\" y2=\"10.49\"></line></svg>', 0, 0),
(8, 'درخواست ها', 'invitations', '', 7, 0),
(9, 'افرادی که شاید شما بنشناسید', 'people_you_may_know', '', 7, 0),
(10, 'پیام ها', 'chats', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" aria-hidden=\"true\" focusable=\"false\" width=\"1em\" height=\"1em\" style=\"-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);\" preserveAspectRatio=\"xMidYMid meet\" viewBox=\"0 0 24 24\"><path d=\"M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.767L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.233V16H4V4h16v12z\" fill=\"white\"/></svg>', 0, 0),
(11, 'پیام ها', 'chats', '', 10, 0),
(12, 'جستجو در مکالمات', 'search-chats', '', 10, 0),
(13, 'کانکشن ها', 'myconnections', '', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblmessage`
--

CREATE TABLE `tblmessage` (
  `idmessage` int(11) NOT NULL,
  `idchat` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `ispost` tinyint(1) NOT NULL,
  `text` text COLLATE utf8_persian_ci,
  `idpost` int(11) DEFAULT NULL,
  `messageRead` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblmessage`
--

INSERT INTO `tblmessage` (`idmessage`, `idchat`, `iduser`, `ispost`, `text`, `idpost`, `messageRead`) VALUES
(1, 2, 2, 0, 'salam', NULL, 0),
(2, 1, 2, 1, NULL, 2, 0),
(3, 2, 1, 0, 'chetori ?', NULL, 0),
(4, 1, 1, 1, NULL, 2, 1),
(5, 1, 2, 0, 'sdfdsfsadf', NULL, 0),
(6, 2, 2, 0, 'fsdfa', NULL, 0),
(7, 1, 2, 0, 'fdsadsfjsadlkfjsad', NULL, 0),
(8, 1, 1, 0, '5', NULL, 1),
(9, 1, 1, 0, 'احمد', NULL, 1),
(10, 1, 2, 1, NULL, 13, 0),
(11, 1, 1, 1, NULL, 2, 1),
(13, 12, 1, 0, 'سلام ', NULL, 0),
(14, 1, 1, 0, '5362', NULL, 1),
(15, 1, 1, 0, '55555', NULL, 1),
(16, 1, 1, 1, NULL, 2, 1),
(17, 1, 2, 0, 'salam', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblNotification`
--

CREATE TABLE `tblNotification` (
  `idNotification` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `kind` int(11) NOT NULL,
  `idkind` int(11) NOT NULL,
  `vlaue` mediumtext COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblNotification`
--

INSERT INTO `tblNotification` (`idNotification`, `iduser`, `kind`, `idkind`, `vlaue`, `status`) VALUES
(10, 4, 7, 1, 'ali haqiqatموقعیت شغلیش را عوض کرد', 0),
(9, 3, 7, 1, 'ali haqiqatموقعیت شغلیش را عوض کرد', 0),
(8, 2, 7, 1, 'ali haqiqatموقعیت شغلیش را عوض کرد', 0),
(12, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-19  08:27:52pmبازدید کرد.', 0),
(13, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-19  08:28:21pmبازدید کرد. ', 0),
(14, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-19  08:28:24pmبازدید کرد. ', 0),
(15, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-19  08:29:50pmبازدید کرد. ', 0),
(16, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-19  08:30:02pmبازدید کرد. ', 0),
(17, 1, 2, 2, 'Ahmad Darya navarاز پروفایل شما در تاریخ2021-07-19  08:39:19pmبازدید کرد. ', 1),
(18, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-19  08:39:55pmبازدید کرد. ', 0),
(19, 1, 2, 2, 'Ahmad Darya navarاز پروفایل شما در تاریخ2021-07-19  08:39:55pmبازدید کرد. ', 1),
(20, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-19  08:40:02pmبازدید کرد. ', 0),
(21, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-19  08:42:15pmبازدید کرد. ', 0),
(22, 1, 1, 2, 'Ahmad Darya navarدر این روز متولد شده است.', 1),
(23, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  09:15:39amبازدید کرد. ', 0),
(24, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  09:31:48amبازدید کرد. ', 0),
(25, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  09:31:57amبازدید کرد. ', 0),
(26, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  09:32:03amبازدید کرد. ', 0),
(27, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  09:32:12amبازدید کرد. ', 0),
(28, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  09:32:50amبازدید کرد. ', 0),
(29, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  09:33:35amبازدید کرد. ', 0),
(30, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  09:34:34amبازدید کرد. ', 0),
(31, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  09:34:46amبازدید کرد. ', 0),
(32, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  09:36:27amبازدید کرد. ', 0),
(33, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  09:36:59amبازدید کرد. ', 0),
(34, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  10:16:16amبازدید کرد. ', 0),
(35, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  10:26:14amبازدید کرد. ', 0),
(36, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  10:28:58amبازدید کرد. ', 0),
(37, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  10:29:21amبازدید کرد. ', 0),
(38, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  10:29:52amبازدید کرد. ', 0),
(39, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  10:30:48amبازدید کرد. ', 0),
(40, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  10:31:41amبازدید کرد. ', 0),
(41, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  10:32:00amبازدید کرد. ', 0),
(42, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  10:32:22amبازدید کرد. ', 0),
(43, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  10:32:42amبازدید کرد. ', 0),
(44, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  10:33:04amبازدید کرد. ', 0),
(45, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  10:43:26amبازدید کرد. ', 0),
(46, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  10:44:04amبازدید کرد. ', 0),
(47, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  10:49:21amبازدید کرد. ', 0),
(48, 1, 2, 1, 'ali haqiqatمهارت شما را اندروس کرد.', 0),
(49, 1, 2, 1, 'ali haqiqatمهارت شما را اندروس کرد.', 0),
(50, 1, 2, 1, 'ali haqiqatمهارت شما را اندروس کرد.', 0),
(51, 1, 2, 1, 'ali haqiqatمهارت شما را اندروس کرد.', 0),
(52, 1, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  11:21:09amبازدید کرد. ', 0),
(53, 1, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  11:23:12amبازدید کرد. ', 0),
(54, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  11:23:20amبازدید کرد. ', 0),
(55, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  11:23:38amبازدید کرد. ', 0),
(56, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  11:23:40amبازدید کرد. ', 0),
(57, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  11:23:43amبازدید کرد. ', 0),
(58, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  11:23:59amبازدید کرد. ', 0),
(59, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  11:24:04amبازدید کرد. ', 0),
(60, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  11:24:07amبازدید کرد. ', 0),
(61, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  11:24:39amبازدید کرد. ', 0),
(62, 2, 2, 1, 'ali haqiqatمهارت شما را اندروس کرد.', 0),
(63, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  11:24:53amبازدید کرد. ', 0),
(64, 2, 2, 1, 'ali haqiqatمهارت شما را اندروس کرد.', 0),
(65, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  11:49:35amبازدید کرد. ', 0),
(66, 2, 2, 1, 'ali haqiqatمهارت شما را اندروس کرد.', 0),
(67, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  11:50:58amبازدید کرد. ', 0),
(68, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:11:16pmبازدید کرد. ', 0),
(69, 2, 2, 1, 'ali haqiqatمهارت شما را اندروس کرد.', 0),
(70, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:11:31pmبازدید کرد. ', 0),
(71, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:12:42pmبازدید کرد. ', 0),
(72, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:18:09pmبازدید کرد. ', 0),
(73, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:18:10pmبازدید کرد. ', 0),
(74, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:18:25pmبازدید کرد. ', 0),
(75, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:18:26pmبازدید کرد. ', 0),
(76, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:18:46pmبازدید کرد. ', 0),
(77, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:19:26pmبازدید کرد. ', 0),
(78, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:19:55pmبازدید کرد. ', 0),
(79, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:23:15pmبازدید کرد. ', 0),
(80, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:24:33pmبازدید کرد. ', 0),
(81, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:24:51pmبازدید کرد. ', 0),
(82, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:24:52pmبازدید کرد. ', 0),
(83, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:24:53pmبازدید کرد. ', 0),
(84, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:25:12pmبازدید کرد. ', 0),
(85, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:25:35pmبازدید کرد. ', 0),
(86, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:27:01pmبازدید کرد. ', 0),
(87, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:27:24pmبازدید کرد. ', 0),
(88, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:27:25pmبازدید کرد. ', 0),
(89, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:27:39pmبازدید کرد. ', 0),
(90, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:27:40pmبازدید کرد. ', 0),
(91, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:29:09pmبازدید کرد. ', 0),
(92, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:29:37pmبازدید کرد. ', 0),
(93, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:29:53pmبازدید کرد. ', 0),
(94, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:33:29pmبازدید کرد. ', 0),
(95, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:33:30pmبازدید کرد. ', 0),
(96, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:33:53pmبازدید کرد. ', 0),
(97, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-20  12:37:52pmبازدید کرد. ', 0),
(98, 0, 5, 1, 'ali haqiqatکامنت که ریپلای کرده بودید  را پسندید', 0),
(99, 3, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-23  10:43:13amبازدید کرد. ', 0),
(100, 3, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-23  10:43:53amبازدید کرد. ', 0),
(101, 3, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-23  10:44:13amبازدید کرد. ', 0),
(102, 3, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-23  10:44:19amبازدید کرد. ', 0),
(103, 3, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-23  10:44:57amبازدید کرد. ', 0),
(104, 3, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-23  11:04:11amبازدید کرد. ', 0),
(105, 0, 5, 6, 'احمد  دریانوردکامنت که ریپلای کرده بودید  را پسندید', 0),
(106, 0, 5, 6, 'احمد  دریانوردکامنت که ریپلای کرده بودید  را پسندید', 0),
(107, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:16:07pmبازدید کرد. ', 0),
(108, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:26:32pmبازدید کرد. ', 0),
(109, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:26:48pmبازدید کرد. ', 0),
(110, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:32:20pmبازدید کرد. ', 0),
(111, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:32:38pmبازدید کرد. ', 0),
(112, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:32:40pmبازدید کرد. ', 0),
(113, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:33:03pmبازدید کرد. ', 0),
(114, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:33:04pmبازدید کرد. ', 0),
(115, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:33:53pmبازدید کرد. ', 0),
(116, 3, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:34:16pmبازدید کرد. ', 0),
(117, 7, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:34:35pmبازدید کرد. ', 0),
(118, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:34:53pmبازدید کرد. ', 0),
(119, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:35:31pmبازدید کرد. ', 0),
(120, 7, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:35:42pmبازدید کرد. ', 0),
(121, 7, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:39:26pmبازدید کرد. ', 0),
(122, 7, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:41:56pmبازدید کرد. ', 0),
(123, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:53:30pmبازدید کرد. ', 0),
(124, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:53:35pmبازدید کرد. ', 0),
(125, 3, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:53:38pmبازدید کرد. ', 0),
(126, 6, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  05:53:40pmبازدید کرد. ', 0),
(127, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  06:05:19pmبازدید کرد. ', 0),
(128, 6, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  06:05:40pmبازدید کرد. ', 0),
(129, 6, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-25  06:06:28pmبازدید کرد. ', 0),
(130, 1, 2, 2, 'Ahmad Daryanavardاز پروفایل شما در تاریخ2021-07-26  01:04:07amبازدید کرد. ', 0),
(131, 2, 3, 1, 'ali haqiqatپست شما راپسندید', 0),
(132, 2, 4, 1, 'ali haqiqatبرای پست شما کامنت گذاشت', 0),
(133, 0, 5, 1, 'ali haqiqatکامنت که ریپلای کرده بودید  را پسندید', 0),
(134, 1, 3, 2, 'Ahmad Daryanavardپست شما راپسندید', 0),
(135, 1, 4, 2, 'Ahmad Daryanavardبرای پست شما کامنت گذاشت', 0),
(136, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-26  03:50:03pmبازدید کرد. ', 0),
(137, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-26  03:50:15pmبازدید کرد. ', 0),
(138, 2, 2, 1, 'ali haqiqatمهارت شما را اندروس کرد.', 0),
(139, 2, 2, 1, 'ali haqiqatاز پروفایل شما در تاریخ2021-07-26  03:50:29pmبازدید کرد. ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblPost`
--

CREATE TABLE `tblPost` (
  `postId` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `text` text COLLATE utf8_persian_ci,
  `url` text COLLATE utf8_persian_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblPost`
--

INSERT INTO `tblPost` (`postId`, `iduser`, `text`, `url`) VALUES
(1, 2, 'test ali akbar mamd', NULL),
(2, 2, 'test ali akbar mamd', 'postPhotos/1.jpg'),
(14, 1, 'تست ', NULL),
(13, 1, 'jsj', 'postPhotos/ps4-800x600.jpg'),
(12, 1, '3333', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblSkill`
--

CREATE TABLE `tblSkill` (
  `idSkile` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `value` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `kind` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblSkill`
--

INSERT INTO `tblSkill` (`idSkile`, `iduser`, `value`, `kind`) VALUES
(49, 1, 'خخخخخo', 0),
(50, 1, '58565', 0),
(51, 1, '585965', 0),
(52, 1, 'php', 1),
(53, 1, 'ali', 1),
(54, 1, 'mamd', 1),
(55, 2, 'PHP', 1),
(56, 2, 'JAVA', 1),
(57, 2, 'PAYTHON', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `iduser` int(11) NOT NULL,
  `name` varchar(180) COLLATE utf8_persian_ci NOT NULL,
  `lastname` varchar(180) COLLATE utf8_persian_ci NOT NULL,
  `username` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(280) COLLATE utf8_persian_ci NOT NULL,
  `password` mediumtext COLLATE utf8_persian_ci NOT NULL,
  `date_cratee` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`iduser`, `name`, `lastname`, `username`, `email`, `password`, `date_cratee`) VALUES
(1, 'ali', 'haqiqat', 'ali5381', 'hamoodhaqiqat@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-07-17 09:29:05'),
(2, 'Ahmad', 'Daryanavard', 'ahmad', 'ahmadd.darya79@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-07-17 15:00:18'),
(3, 'mohammad', 'ali', 'mma', 'hamoodhaqiqat@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-07-17 18:06:12'),
(4, 'rain', 'hidri1', 'rain', 'hamoodhaqiqat@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-07-17 18:06:12'),
(5, '9732511', '9732511', 'Amircarnet@gmail.com', 'Amircarnet@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-07-19 20:55:40'),
(6, 'احمد ', 'دریانورد', 'ahmad1', 'ahmad.darya792@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-07-25 15:59:43'),
(7, 'abdollah', 'haqiqat', 'abdollhaq', 'bamplusplusiran@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-07-25 16:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `tblUserDetail`
--

CREATE TABLE `tblUserDetail` (
  `idUserDetail` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `Intro` mediumtext COLLATE utf8_persian_ci,
  `About` mediumtext COLLATE utf8_persian_ci,
  `Featured` mediumtext COLLATE utf8_persian_ci,
  `Background` mediumtext COLLATE utf8_persian_ci,
  `Accomplishments` mediumtext COLLATE utf8_persian_ci,
  `information` mediumtext COLLATE utf8_persian_ci,
  `Current_company` varchar(180) COLLATE utf8_persian_ci DEFAULT NULL,
  `Profile_language` varchar(180) COLLATE utf8_persian_ci DEFAULT NULL,
  `Location` varchar(180) COLLATE utf8_persian_ci DEFAULT NULL,
  `tvalod` varchar(120) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblUserDetail`
--

INSERT INTO `tblUserDetail` (`idUserDetail`, `iduser`, `Intro`, `About`, `Featured`, `Background`, `Accomplishments`, `information`, `Current_company`, `Profile_language`, `Location`, `tvalod`) VALUES
(2, 1, '5ali1', 'al3', 'ali3', 'ali4', '85', 'ali6', 'BAM++', 'EN', 'Khamir', '2000-07-12'),
(3, 2, 'ali1', 'al3', 'ali3', 'ali4', 'ali5', 'ali6', 'BAM++', 'EN', 'q', '2000-07-19'),
(4, 3, 'ali1', 'al3', '', '', '', '', 'BAM++', 'EN', 'shiruz', '2000-01-19'),
(5, 5, '', '', '', '', '', '', '', '', '', '2000-01-19'),
(6, 6, '', '', '', '', '', '', '', '', '', '2021-08-06'),
(7, 7, '', '', '', '', '', '', '', '', '', '1990-12-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblchat`
--
ALTER TABLE `tblchat`
  ADD PRIMARY KEY (`idchat`);

--
-- Indexes for table `tblcommenLike`
--
ALTER TABLE `tblcommenLike`
  ADD PRIMARY KEY (`idcommenLike`);

--
-- Indexes for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD PRIMARY KEY (`idcomment`);

--
-- Indexes for table `tblconnection`
--
ALTER TABLE `tblconnection`
  ADD PRIMARY KEY (`idconnection`);

--
-- Indexes for table `tblendorse`
--
ALTER TABLE `tblendorse`
  ADD PRIMARY KEY (`idendorse`);

--
-- Indexes for table `tblinvitation`
--
ALTER TABLE `tblinvitation`
  ADD PRIMARY KEY (`idinvitation`);

--
-- Indexes for table `tbllanguages`
--
ALTER TABLE `tbllanguages`
  ADD PRIMARY KEY (`idlanguages`);

--
-- Indexes for table `tblLikePost`
--
ALTER TABLE `tblLikePost`
  ADD PRIMARY KEY (`idPostLike`);

--
-- Indexes for table `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `tblmessage`
--
ALTER TABLE `tblmessage`
  ADD PRIMARY KEY (`idmessage`);

--
-- Indexes for table `tblNotification`
--
ALTER TABLE `tblNotification`
  ADD PRIMARY KEY (`idNotification`);

--
-- Indexes for table `tblPost`
--
ALTER TABLE `tblPost`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `tblSkill`
--
ALTER TABLE `tblSkill`
  ADD PRIMARY KEY (`idSkile`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `tblUserDetail`
--
ALTER TABLE `tblUserDetail`
  ADD PRIMARY KEY (`idUserDetail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblchat`
--
ALTER TABLE `tblchat`
  MODIFY `idchat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblcommenLike`
--
ALTER TABLE `tblcommenLike`
  MODIFY `idcommenLike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblcomment`
--
ALTER TABLE `tblcomment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblconnection`
--
ALTER TABLE `tblconnection`
  MODIFY `idconnection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblendorse`
--
ALTER TABLE `tblendorse`
  MODIFY `idendorse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblinvitation`
--
ALTER TABLE `tblinvitation`
  MODIFY `idinvitation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbllanguages`
--
ALTER TABLE `tbllanguages`
  MODIFY `idlanguages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tblLikePost`
--
ALTER TABLE `tblLikePost`
  MODIFY `idPostLike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblmessage`
--
ALTER TABLE `tblmessage`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblNotification`
--
ALTER TABLE `tblNotification`
  MODIFY `idNotification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `tblPost`
--
ALTER TABLE `tblPost`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblSkill`
--
ALTER TABLE `tblSkill`
  MODIFY `idSkile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblUserDetail`
--
ALTER TABLE `tblUserDetail`
  MODIFY `idUserDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
