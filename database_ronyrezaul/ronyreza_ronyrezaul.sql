-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2020 at 05:03 AM
-- Server version: 10.2.34-MariaDB-log
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ronyreza_ronyrezaul`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `panel_id` int(11) NOT NULL,
  `description_name` varchar(255) NOT NULL,
  `description_title` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `is_cover` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `user_id`, `panel_id`, `description_name`, `description_title`, `picture`, `is_cover`) VALUES
(292, 'Home Album', 1, 1, 'Rony Rezaul', 'Photography & Direction', 'assets/images/T53A0114_1603883480.jpg', 0),
(293, 'Home Album', 1, 1, 'Rony Rezaul', 'Photography & Direction', 'assets/images/T53A0160_1603883483.jpg', 0),
(294, 'Home Album', 1, 1, 'Rony Rezaul', 'Photography & Direction', 'assets/images/T53A0171_1603883486.jpg', 0),
(295, 'Home Album', 1, 1, 'Rony Rezaul', 'Photography & Direction', 'assets/images/T53A0184_1603883489.jpg', 0),
(296, 'Home Album', 1, 1, 'Rony Rezaul', 'Photography & Direction', 'assets/images/T53A6449;_1603884904.jpg', 0),
(297, 'Home Album', 1, 1, 'Rony Rezaul', 'Photography & Direction', 'assets/images/T53A6563_1603884907.jpg', 0),
(298, 'Fashion Album 1', 1, 2, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A6449;_1603885462.jpg', 0),
(299, 'Fashion Album 1', 1, 2, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A6471_1603885466.jpg', 0),
(300, 'Fashion Album 1', 1, 2, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A6484_1603885483.jpg', 0),
(301, 'Fashion Album 1', 1, 2, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A6512_1603885492.jpg', 0),
(302, 'Fashion Album 1', 1, 2, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A6559_1603885502.jpg', 0),
(303, 'Fashion Album 1', 1, 2, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A6563_1603885511.jpg', 0),
(304, 'Fashion Album 1', 1, 2, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A6571_1603885514.jpg', 0),
(305, 'Fashion Album 1', 1, 2, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A6593_1603885522.jpg', 0),
(306, 'Fashion Album 1', 1, 2, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A6610_1603885532.jpg', 0),
(307, 'Fashion Album 1', 1, 2, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A6625_1603885541.jpg', 0),
(308, 'Fashion Album 1', 1, 2, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A6712_1603885555.jpg', 0),
(309, 'Fashion Album 1', 1, 2, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A6780_1603885569.jpg', 0),
(310, 'Fashion Album 1', 1, 2, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A6801_1603885578.jpg', 0),
(311, 'Fashion Album 1', 1, 2, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A6817_1603885586.jpg', 0),
(312, 'Commercial Album 1', 1, 3, 'Rony Rezaul', 'Photography & Direction', 'assets/images/86189040_1300956856763471_2159373603534012416_o_1603902307.jpg', 0),
(313, 'Commercial Album 1', 1, 3, 'Rony Rezaul', 'Photography & Direction', 'assets/images/86701830_1304239286435228_7333045870620835840_o_1603902309.jpg', 0),
(314, 'Commercial Album 1', 1, 3, 'Rony Rezaul', 'Photography & Direction', 'assets/images/87152849_1305921362933687_6978022813076553728_o_1603902313.jpg', 0),
(315, 'Commercial Album 1', 1, 3, 'Rony Rezaul', 'Photography & Direction', 'assets/images/87179941_1308194006039756_5988212217772769280_o_1603902316.jpg', 0),
(316, 'Commercial Album 1', 1, 3, 'Rony Rezaul', 'Photography & Direction', 'assets/images/87389922_1309881619204328_2632217144540004352_o_1603902322.jpg', 0),
(317, 'Commercial Album 1', 1, 3, 'Rony Rezaul', 'Photography & Direction', 'assets/images/IMG_0082_1603902325.jpg', 0),
(318, 'Editorial Album 1', 1, 5, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A0114_1603966436.jpg', 0),
(319, 'Editorial Album 1', 1, 5, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A0160_1603966445.jpg', 0),
(320, 'Editorial Album 1', 1, 5, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A0171_1603966453.jpg', 0),
(321, 'Editorial Album 1', 1, 5, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/T53A0184_1603966461.jpg', 0),
(322, 'Beauty Album 1', 1, 6, 'Rony Rezaul', 'Photography & Direction', 'assets/images/T53A5769_1603999209.jpg', 0),
(323, 'Beauty Album 1', 1, 6, 'Rony Rezaul', 'Photography & Direction', 'assets/images/T53A5815_1603999222.jpg', 0),
(324, 'Beauty Album 1', 1, 6, 'Rony Rezaul', 'Photography & Direction', 'assets/images/T53A5867_1603999238.jpg', 0),
(325, 'Beauty Album 1', 1, 6, 'Rony Rezaul', 'Photography & Direction', 'assets/images/T53A5925_1603999256.jpg', 0),
(326, 'Beauty Album 1', 1, 6, 'Rony Rezaul', 'Photography & Direction', 'assets/images/T53A5990_1603999273.jpg', 0),
(327, 'Beauty Album 1', 1, 6, 'Rony Rezaul', 'Photography & Direction', 'assets/images/T53A6007_1603999296.jpg', 0),
(328, 'Beauty Album 1', 1, 6, 'Rony Rezaul', 'Photography & Direction', 'assets/images/T53A6021_1603999312.jpg', 0),
(329, 'home', 1, 1, 'fj', '', 'assets/images/IMG_4660_1603999405.jpg', 0),
(330, 'home', 1, 1, 'fj', '', 'assets/images/IMG_4660_1603999415.jpg', 0),
(331, 'home', 1, 1, 'fj', '', 'assets/images/IMG_4660_1603999419.jpg', 0),
(332, 'Product Album 1', 1, 30, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/AI8A6412_1604000010.jpg', 0),
(333, 'Product Album 1', 1, 30, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/AI8A6431_1604000017.jpg', 0),
(334, 'Product Album 1', 1, 30, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/AI8A6445_1604000022.jpg', 0),
(335, 'Product Album 1', 1, 30, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/AI8A6480_1604000027.jpg', 0),
(336, 'Product Album 1', 1, 30, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/AI8A6490_1604000035.jpg', 0),
(337, 'Product Album 1', 1, 30, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/AI8A6509_1604000043.jpg', 0),
(338, 'Product Album 1', 1, 30, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/AI8A6530_1604000049.jpg', 0),
(339, 'Product Album 1', 1, 30, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/AI8A6543_1604000054.jpg', 0),
(340, 'Product Album 1', 1, 30, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/AI8A6561_1604000062.jpg', 0),
(341, 'Product Album 1', 1, 30, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/AI8A6576_1604000070.jpg', 0),
(342, 'Product Album 1', 1, 30, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/AI8A6641_1604000076.jpg', 0),
(343, 'Product Album 1', 1, 30, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/IMG_1474_1604000083.jpg', 0),
(344, 'home', 1, 1, 'cover', '', 'assets/images/IMG_4660_1604248089.jpg', 0),
(345, 'home', 1, 1, 'cover', '', 'assets/images/IMG_6869_1604248302.jpg', 0),
(352, 'Beauty Album 2', 1, 6, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/a5db0e59a1c91a2cc6880070becd0fe9.jpg', 0),
(353, 'Beauty Album 2', 1, 6, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/80231c9821a91515560b81153d149fc8.jpg', 0),
(354, 'Beauty Album 2', 1, 6, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/9218780e20e865f2583c134153955769.jpg', 0),
(355, 'Beauty Album 2', 1, 6, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/ade1e95b37a9812d0f6e13d8085d857d.jpg', 0),
(356, 'Beauty Album 2', 1, 6, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/9f0381fd674eb5dc5151e790a145e547.jpg', 0),
(357, 'Beauty Album 2', 1, 6, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/48c093dbf0c9f62d253ba2950794331c.jpg', 0),
(358, 'Beauty Album 2', 1, 6, 'Rony Rezaul,Monir Hossain', 'Photography & Direction,MUA', 'assets/images/3c48b7ec3b75b4ac052e073c18b65fe9.jpg', 1),
(359, 'home', 1, 1, 'jgj', '', 'assets/images/13fe29e12285938edf54c73bf56b2e67.jpg', 0),
(360, 'home', 1, 1, 'jgj', '', 'assets/images/dc88632858c9ca7f544b3ddc7f4fc646.jpg', 0),
(361, 'home', 1, 1, 'jgj', '', 'assets/images/03b22f3b48c32850051f24a31e7e98e0.jpg', 0),
(362, 'home', 1, 1, 'jgj', '', 'assets/images/8f8074a87b52e5911448d92b641039d6.jpg', 0),
(363, 'home', 1, 1, 'jgj', '', 'assets/images/3232800ff2dfa395a819415b5384ccc3.jpg', 0),
(364, 'home', 1, 1, 'jgj', '', 'assets/images/8a342a47ca4e165ac82403014424aced.jpg', 0),
(365, 'home', 1, 1, 'jgj', '', 'assets/images/cfce417b6a4138df6dcaf91df386a85c.jpg', 0),
(366, 'home', 1, 1, 'jgj', '', 'assets/images/ba0c0003c772ca2ef52251afbdffbf75.jpg', 0),
(367, 'home', 1, 1, 'jgj', '', 'assets/images/e16316258cb36c9090678a142bb3065c.jpg', 0),
(368, 'home', 1, 1, 'jgj', '', 'assets/images/87d739b68cbd782e75f8635f17d79c0d.jpg', 0),
(369, 'home', 1, 1, 'jgj', '', 'assets/images/34e0bab89a26aa2f247bd9a03d78f775.jpg', 0),
(370, 'home', 1, 1, 'jgj', '', 'assets/images/9e5ccc9fb2d2ca8e4ef07ff5f8b9c47e.jpg', 0),
(371, 'home', 1, 1, 'jgj', '', 'assets/images/e916b52f6e9fd9fec07542fbba259830.jpg', 0),
(372, 'home', 1, 1, 'jgj', '', 'assets/images/5192d360c1a2180bc1fbd199f2ec6a97.jpg', 0),
(373, 'home', 1, 1, 'jgj', '', 'assets/images/724f86c7bdd2ff60fae6889c92e66d1f.jpg', 0),
(374, 'home', 1, 1, 'jgj', '', 'assets/images/6781d80cdb467f3d90fcdfdf0b3b1942.jpg', 0),
(375, 'home', 1, 1, 'jgj', '', 'assets/images/235fc20b302d28dfae19c5add35a9459.jpg', 0),
(376, 'home', 1, 1, 'jgj', '', 'assets/images/59fa0d9fca7e01f5115b801d55467f20.jpg', 0),
(377, 'home', 1, 1, 'jgj', '', 'assets/images/ddb84118243099a6ff9283489c24b9cb.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `footer_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`footer_id`, `name`, `user_id`) VALUES
(1, '©Rony Rezaul Photography', 1);

-- --------------------------------------------------------

--
-- Table structure for table `header_logo`
--

CREATE TABLE `header_logo` (
  `logo_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `large_text` varchar(255) NOT NULL,
  `small_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_logo`
--

INSERT INTO `header_logo` (`logo_id`, `image`, `user_id`, `height`, `width`, `image2`, `image3`, `large_text`, `small_text`) VALUES
(1, 'assets/images/47cb7b8255402078f85936c21a672346.png', 1, 0, 0, 'assets/images/acee7766fca9866cebe4bef9158140a6.png', 'assets/images/13d0fabacbf295300d8a8be39ab4e140.png', 'Rony Rezaul', 'Hi ! I am a fashion photographer from Bangladesh. I like to be creative and bold with my works. Beside photography I like to travel. Thanks for visiting my website.');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `active_status`) VALUES
(1, 'Home', 0),
(2, 'Fashion', 0),
(3, 'Commercial', 0),
(5, 'Editorial', 0),
(6, 'Beauty', 0),
(7, 'About me', 0),
(8, 'Contact', 0),
(9, 'others', 1),
(30, 'Products', 0);

-- --------------------------------------------------------

--
-- Table structure for table `numbers`
--

CREATE TABLE `numbers` (
  `N` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `numbers`
--

INSERT INTO `numbers` (`N`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96),
(97),
(98),
(99),
(100);

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `social_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `social_name`) VALUES
(1, 'Facebook'),
(2, 'Instagram'),
(3, 'Youtube');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_link`
--

CREATE TABLE `social_media_link` (
  `social_id` int(11) NOT NULL,
  `social_media_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_media_link`
--

INSERT INTO `social_media_link` (`social_id`, `social_media_id`, `user_id`, `link`) VALUES
(4, 1, 1, 'https://www.facebook.com/people/Rony-Rezaul/100006279303760'),
(5, 2, 1, 'https://www.instagram.com/rony._rezaul/'),
(6, 3, 1, 'https://www.youtube.com/channel/UCBdECQh-yI5LLKku3cP1_NA');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `sponsor_id` int(11) NOT NULL,
  `sponsor_image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sponsor_id`, `sponsor_image`, `user_id`) VALUES
(38, 'assets/images/c0286734c5f69b6318546819917e573e.jpg', 1),
(39, 'assets/images/6212030029458af611413762c59465a8.jpg', 1),
(40, 'assets/images/598e2b12b22f39041a6de7db824ff282.jpg', 1),
(41, 'assets/images/ffe666d38a0e70cf47b5f04714614887.jpg', 1),
(42, 'assets/images/04ac962e4327aaa8bc7f0364280df146.png', 1),
(43, 'assets/images/e738d03569b10d7f72e9fa7e918bd471.png', 1),
(44, 'assets/images/bc95abd35193bbd6efc73466d9fe5a5e.jpg', 1),
(45, 'assets/images/369a1fee96cdb6985c71a66a3145ebb5.png', 1),
(46, 'assets/images/bb3e2f331e3065ed6077c95ac3df1251.jpg', 1),
(47, 'assets/images/b07b69c79a3c4ea2cf9b53c00a687a34.png', 1),
(48, 'assets/images/d6c1929ab3ea932beb2f4b80692263fc.jpg', 1),
(49, 'assets/images/09580e61bd80b19de3d1e39731a90e75.jpg', 1),
(50, 'assets/images/accc94088c89723dc32c712e0faf060d.png', 1),
(51, 'assets/images/75c3a1fcaaf57384883e2e6d5d975f17.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`, `full_name`, `email`, `phone`) VALUES
(1, 'rony', 'ronyreza', 'Rony Rezaul', 'rony.oxas@gmail.com', '+880 1723074360');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`footer_id`);

--
-- Indexes for table `header_logo`
--
ALTER TABLE `header_logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_link`
--
ALTER TABLE `social_media_link`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `footer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header_logo`
--
ALTER TABLE `header_logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_media_link`
--
ALTER TABLE `social_media_link`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
