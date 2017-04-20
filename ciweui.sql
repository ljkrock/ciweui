-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-19 10:36:57
-- 服务器版本： 5.7.14
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciweui`
--

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `password` varchar(60) NOT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '性别',
  `avatar` text NOT NULL,
  `isvip` tinyint(1) NOT NULL DEFAULT '0',
  `regtime` int(10) NOT NULL,
  `uptime` int(10) NOT NULL COMMENT '最后修改时间',
  `status` tinyint(1) NOT NULL COMMENT '状态'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `sex`, `avatar`, `isvip`, `regtime`, `uptime`, `status`) VALUES
(1, '111', '123@qq.com', '$2y$10$TbcUIRi7qrVWoFmCbfa9cu7XdGjddBzd83sphU.XzcOYt934w3RsW', 1, './uploads/111115.jpg', 0, 1492567828, 1492567828, 1),
(2, '123', '111@qq.com', '$2y$10$1XY61pagP.QkfCkfon4ERu5D9bxQYYJlJhTq7GXBG.N5R5Ou3gRFG', 0, './uploads/', 0, 1492568669, 1492568669, 1),
(3, '123', '222@qq.com', '$2y$10$E5Lbt0L68dOr5vZZvefk9.8cXvnpJPBPFqFIrnHgphrX4FEpdgqLG', 0, './uploads/', 0, 1492568744, 1492568744, 1),
(4, '222', '124@qq.com', '$2y$10$hshGiw10tM/5Qqj96kdkuOpYUcJuw6EfhPzgZyLq9QPmtS4l7ONTO', 1, './uploads/111117.jpg', 0, 1492568806, 1492568806, 1),
(5, '111', '222321@qq.com', '$2y$10$9LsLxTI3Acd7XmANF3PGguQOk1NhSOq7iFTf0SEGVHAVgSsCtFjT2', 1, './uploads/', 0, 1492568906, 1492568906, 1),
(6, '123', '12121@qq.com', '$2y$10$yTjSj2am/TqYQc0WMpaPfek9VqlW2wXETXpXUBSV3/irIK28H0B06', 1, './uploads/', 0, 1492568990, 1492568990, 1),
(7, '123', '321123@qq.com', '$2y$10$G6tnv03y1NK.64nEtBDDIeMP31r8aupJ0ub3STgENWRXJdXVEVQ6K', 1, './uploads/12.jpg', 0, 1492569143, 1492569143, 1),
(8, '123', '2233@qq.com', '$2y$10$PT.g5e1GcCkcgk6A1D8ju.yGM1X4D7rn4uScJfwbYxuAA8tQ0n/GC', 1, './uploads/13.jpg', 0, 1492569256, 1492569256, 1),
(9, '111', '12312421342@qq.com', '$2y$10$H8K7kmQfGWaPbgAXu63qbuLlwKr4oue0wT544ePW6qbwbExOpZ9sm', 1, './uploads/15.jpg', 0, 1492569640, 1492569640, 1),
(10, '111', '123321123@qq.com', '$2y$10$Qumq9SD5aoVemSGFpAXN2eFfr.ZFXmiZRW0OJ1CG.q9dhS/4DLdIW', 1, './uploads/16.jpg', 0, 1492569762, 1492569762, 1),
(11, 'ljkrock2', '55555555@qq.com', '', 0, './uploads/111119.jpg', 0, 0, 1492585448, 1),
(12, '1234', '9876@qq.com', '', 0, './uploads/111118.jpg', 0, 1492584638, 1492584638, 1),
(13, '123', '111222@qq.com', '', 1, './uploads/u819201812,3553302270fm214gp01.jpg', 0, 1492584986, 1492584986, 1),
(14, '111', '222333@qq.com', '$2y$10$zujzsSE5iTFYd9lp.4XLR.XhNFVFeBnLhcN0lB76bxVRreVRb30bm', 1, './uploads/122.jpg', 0, 1492585302, 1492585302, 1),
(15, 'qwert2', '333444555@qq.com', '', 0, '', 0, 0, 1492596434, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
