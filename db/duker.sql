-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2015 at 12:33 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `duker`
--

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id` int(3) NOT NULL,
  `menu` varchar(30) CHARACTER SET utf8 NOT NULL,
  `position` int(3) NOT NULL,
  `visible` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `menu`, `position`, `visible`) VALUES
(1, 'This is Duker', 1, 1),
(2, 'Videos', 2, 1),
(10, 'Services', 3, 1),
(12, '', 5, 1),
(13, 'Best Buy', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(3) NOT NULL,
  `information_id` int(3) NOT NULL,
  `menu` varchar(30) CHARACTER SET utf8 NOT NULL,
  `position` int(3) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `information_id`, `menu`, `position`, `visible`, `content`) VALUES
(1, 1, 'About Duker', 1, 1, 'We have successfuly coded dynamic pages in our CMS! #Happy bla bla bla.'),
(2, 1, 'Mission Statement', 2, 1, 'Out mission statement is if you practice PHP 1 hour a day for 3 months you will be a PHP legend.'),
(5, 2, 'Anno Domine', 1, 0, 'Lorem ipsum dolor sit amet, per ex modo primis mollis. Exerci aliquam referrentur his ne. Eum no virtute numquam labores, liber nominavi est at. Causae iudicabit et mea, legimus albucius nec ad, vis vitae detracto gloriatur ad. Per ut assum voluptaria voluptatum, blandit eligendi convenire in has. Omnium epicurei necessitatibus ei his, aperiam electram ius in.\r\n\r\nAd harum molestie detraxit sit, quo posse vocent et, ne vel ipsum vulputate. Ut usu agam aeque electram, ad eum posse eligendi, ea insolens delicata honestatis duo. Cu nam ferri delenit. Facilisi senserit et has, est dicant erroribus suscipiantur in. Cu mea tritani meliore detracto, ea duo saepe accusam mandamus. Ne mandamus salutandi scriptorem quo, te purto mazim pro.\r\n\r\nHas dicta eleifend in. Ea tation detracto eleifend vix, eos dolore philosophia id, vel an nobis dolores scriptorem. Vis oblique urbanitas ex, eam an delectus repudiandae. Per ne dolorum mnesarchum disputando, nec sonet affert ea, mei probo fastidii in. Nam quas cetero cu, eam ad iudico iriure latine, volutpat qualisque sea ea. Vel diam labores postulant eu.\r\n\r\nEx nam magna graecis, omnis referrentur ius eu. Per perfecto mnesarchum moderatius ut. Sea vocent feugait comprehensam in, ad clita possit pri. Vel nulla singulis iracundia eu, eligendi nominati mel id. Veniam nonumes lala. consetetur vix et.\r\n\r\nQuas natum dolor no mei. Illum adipisci principes at eum, vix oratio omittam conceptam ea. Te sonet minimum antiopam duo. Mei at tractatos partiendo, ad pro clita oporteat, et labore scripserit qui. Unum legendos pertinax no mei. Error pericula.'),
(6, 10, 'Testing xyz', 1, 0, 'Lorem ipsum dolor sit amet, ex mundi appetere expetendis qui, cu pri rebum falli appareat. Cum at sale porro, no nec mundi mucius. Cu tacimates incorrupte eam. Vix et agam detraxit. No eum elitr dolorem, cum id modus disputando.\r\n\r\nFuisset propriae ea nec, prima alterum est eu. Debet reprehendunt mea te, illum aeterno laboramus his ad, sea et vitae percipit perpetua. Cum in graeci elaboraret. Ne primis scripserit per, quod nostro equidem pro ei.\r\n\r\nNam id iusto iudico eleifend, mel altera efficiantur eu, cu mea dolorem ceteros tincidunt. Usu albucius dissentias an, lobortis inimicus at pri, ea phaedrum iracundia usu. Ei mel dicant argumentum, ad eam denique persecuti percipitur. At vis rebum ignota.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `hashed_password` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hashed_password`) VALUES
(8, 'ne', 'f60d2a2f7993d5825671faef6f38d5d8a0c34130'),
(9, 'da', 'cdd4f874095045f4ae6670038cbbd05fac9d4802');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
