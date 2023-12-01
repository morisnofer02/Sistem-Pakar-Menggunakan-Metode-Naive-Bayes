-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 01:21 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naive_bayes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aturan`
--

CREATE TABLE `tbl_aturan` (
  `id` int(11) NOT NULL,
  `kerusakan_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL,
  `probabilitas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_aturan`
--

INSERT INTO `tbl_aturan` (`id`, `kerusakan_id`, `gejala_id`, `probabilitas`) VALUES
(80, 11, 18, 0.5),
(81, 11, 19, 1),
(82, 11, 20, 0),
(84, 11, 21, 0.5),
(85, 11, 22, 0),
(86, 11, 23, 0),
(87, 11, 24, 0),
(88, 11, 25, 0.5),
(89, 11, 26, 0),
(90, 11, 27, 0),
(91, 11, 28, 0),
(92, 11, 29, 1),
(93, 11, 30, 0),
(94, 11, 31, 0),
(95, 12, 18, 0),
(96, 12, 19, 0),
(97, 12, 20, 1),
(98, 12, 21, 1),
(99, 12, 22, 0.5),
(100, 12, 23, 0.5),
(101, 12, 24, 0.33),
(102, 12, 25, 0),
(103, 12, 26, 0),
(104, 12, 27, 0),
(105, 12, 28, 0),
(106, 12, 29, 0),
(107, 12, 30, 0),
(108, 12, 31, 0),
(109, 13, 18, 0),
(110, 13, 19, 0),
(111, 13, 20, 0),
(112, 13, 21, 0),
(113, 13, 22, 0),
(114, 13, 23, 0),
(115, 13, 24, 0),
(116, 13, 25, 0),
(117, 13, 26, 0),
(118, 13, 27, 0),
(119, 13, 28, 0),
(120, 13, 29, 0),
(121, 13, 30, 1),
(122, 13, 31, 1),
(123, 14, 18, 0.33),
(124, 14, 19, 0),
(125, 14, 20, 0),
(126, 14, 21, 0),
(127, 14, 22, 0),
(128, 14, 23, 0),
(129, 14, 24, 0),
(130, 14, 25, 1),
(131, 14, 26, 1),
(132, 14, 27, 0.5),
(133, 14, 28, 0),
(134, 14, 29, 0),
(135, 14, 30, 0),
(136, 14, 31, 0),
(137, 15, 18, 1),
(138, 15, 19, 0),
(139, 15, 20, 0),
(140, 15, 21, 0),
(141, 15, 22, 0),
(142, 15, 23, 0),
(143, 15, 24, 0),
(144, 15, 25, 0),
(145, 15, 26, 0.5),
(146, 15, 27, 1),
(147, 15, 28, 1),
(148, 15, 29, 0.5),
(149, 15, 30, 0),
(150, 15, 31, 0),
(151, 16, 18, 0),
(152, 16, 19, 0),
(153, 16, 20, 0),
(154, 16, 21, 0),
(155, 16, 22, 1),
(156, 16, 23, 1),
(157, 16, 24, 1),
(158, 16, 25, 0),
(159, 16, 26, 0),
(160, 16, 27, 0),
(161, 16, 28, 0),
(162, 16, 29, 0),
(163, 16, 30, 0),
(164, 16, 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` char(3) NOT NULL,
  `nama_gejala` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`) VALUES
(18, 'G01', 'Hp mati dengan sendirinya'),
(19, 'G02', 'Hp terkena air'),
(20, 'G03', 'LCD retak / pecah'),
(21, 'G04', 'LCD blank / mati'),
(22, 'G05', 'Layar tidak respon ketika disentuh'),
(23, 'G06', 'Touchscreen tidak berfungsi untuk fitur-fitur tertentu'),
(24, 'G07', 'Touchscreen bergerak sendiri'),
(25, 'G08', 'Sinyal tidak stabil'),
(26, 'G09', 'Mati pada saat melakukan panggilan dan menerima panggilan'),
(27, 'G10', 'Baterai menjadi boros'),
(28, 'G11', 'Kapasitas baterai menurun'),
(29, 'G12', 'Proses pengisian yang tidak normal'),
(30, 'G13', 'Gambar kabur atau tidak fokus'),
(31, 'G14', 'Warna pada gambar tidak akurat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil_diagnosa`
--

CREATE TABLE `tbl_hasil_diagnosa` (
  `id_hasil` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nomor_hp` int(20) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `hasil_probabilitas` float NOT NULL,
  `nama_kerusakan` varchar(128) NOT NULL,
  `solusi` text NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kerusakan`
--

CREATE TABLE `tbl_kerusakan` (
  `id_kerusakan` int(11) NOT NULL,
  `kode_kerusakan` char(3) NOT NULL,
  `nama_kerusakan` varchar(128) NOT NULL,
  `probabilitas` float NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kerusakan`
--

INSERT INTO `tbl_kerusakan` (`id_kerusakan`, `kode_kerusakan`, `nama_kerusakan`, `probabilitas`, `gambar`, `solusi`) VALUES
(11, 'K01', 'IC Power', 0.167, 'ic_plus2.png', 'Cek pada tegangan arus power'),
(12, 'K02', 'LCD', 0.167, 'lcd3.jpg', 'Ganti dengan LCD yang baru'),
(13, 'K03', 'Kamera', 0.167, 'kamera3.jpg', 'Cek pada fitur camera dan funsinya'),
(14, 'K04', 'IC Power Amplifer', 0.167, 'ic_power_amplifer2.png', 'Cek pada tegangan sinyal'),
(15, 'K05', 'Baterai', 0.167, 'baterai.jpg', 'Disarankan mengganti baterai yang baru'),
(16, 'K06', 'Touchscreen', 0.167, 'touchscreen.jpg', 'Lakukan uji sentuh dengan mendownload aplikasi touchscreen test, apabila mengalami kerusakan yang serius disarankan ganti touchscreen yang baru');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama_user`, `username`, `image`, `password`, `role_id`, `date_created`) VALUES
(3, 'ira', 'admin', 'default.jpg', '$2y$10$2qUamXyu2vVEctFBqYcRce4b0u53z.Q1sT/Rn56e0aHBYdBGhYDZy', 1, 1684986297),
(4, 'moris', 'member', 'default.jpg', '$2y$10$mkBt89dOirJlCfMpLo15qOjbo3F3GUQMSB4xaYsulK3KpZM1YKqLm', 2, 1684986342);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Pakar');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt'),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user'),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit'),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-bars'),
(5, 3, 'Submenu Management', 'menu/submenu', 'far fa-fw fa-caret-square-down'),
(6, 4, 'Gejala', 'gejala', 'fas fa-fw fa-edit'),
(7, 4, 'Kerusakan', 'kerusakan', 'fas fa-fw fa-mobile-alt'),
(8, 4, 'Aturan', 'aturan', 'fas fa-fw fa-table'),
(9, 4, 'Laporan', 'laporan', 'fas fa-fw fa-clipboard-list'),
(11, 2, 'Ganti Password', 'user/gantipassword', 'fas fa-fw fa-key');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kerusakan` (`kerusakan_id`),
  ADD KEY `id_gejala` (`gejala_id`);

--
-- Indexes for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tbl_kerusakan`
--
ALTER TABLE `tbl_kerusakan`
  ADD PRIMARY KEY (`id_kerusakan`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kerusakan`
--
ALTER TABLE `tbl_kerusakan`
  MODIFY `id_kerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
