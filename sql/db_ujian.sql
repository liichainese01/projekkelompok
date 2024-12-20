-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 07:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `pilihan_id` int(11) NOT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `pilihan_text` varchar(255) DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pilihan`
--

INSERT INTO `pilihan` (`pilihan_id`, `soal_id`, `pilihan_text`, `is_correct`) VALUES
(1169, 293, 'Mistar baja', 0),
(1170, 293, 'Jangka sorong', 0),
(1171, 293, 'Mikrometer sekrup', 1),
(1172, 293, 'Penggaris plastik', 0),
(1173, 294, 'Meningkatkan daya tahan mesin', 0),
(1174, 294, 'Mendinginkan material kerja', 1),
(1175, 294, 'Membersihkan serpihan logam', 0),
(1176, 294, 'Melindungi mesin dari korosi', 0),
(1177, 295, 'Pahat bubut', 0),
(1178, 295, 'Spindel', 0),
(1179, 295, 'Chuck', 1),
(1180, 295, 'Tailstock', 0),
(1181, 296, 'Besi cor', 0),
(1182, 296, 'Aluminium', 0),
(1183, 296, 'Baja karbon', 1),
(1184, 296, 'Tembaga', 0),
(1185, 297, 'Mengubah gerak rotasi menjadi gerak lurus', 0),
(1186, 297, 'Mengubah gerak lurus menjadi gerak rotasi', 1),
(1187, 297, 'Meningkatkan efisiensi bahan bakar', 0),
(1188, 297, 'Mengurangi getaran mesin', 0),
(1189, 298, 'Mengurangi gesekan', 1),
(1190, 298, 'Meningkatkan suhu mesin', 0),
(1191, 298, 'Meningkatkan daya mesin', 0),
(1192, 298, 'Membersihkan mesin', 0),
(1193, 299, 'Tang', 0),
(1194, 299, 'Obeng', 0),
(1195, 299, 'Kunci momen', 1),
(1196, 299, 'Kunci inggris', 0),
(1197, 300, 'Pahat HSS', 0),
(1198, 300, 'Pahat karbida', 1),
(1199, 300, 'Pahat baja karbon', 0),
(1200, 300, 'Pahat tembaga', 0),
(1201, 301, 'Mencetak logam cair ke dalam cetakan', 1),
(1202, 301, 'Memanaskan logam hingga mencair', 0),
(1203, 301, 'Mengelas dua logam bersama', 0),
(1204, 301, 'Mendinginkan logam cair secara cepat', 0),
(1205, 302, 'Camshaft', 0),
(1206, 302, 'Connecting rod', 1),
(1207, 302, 'Rocker arm', 0),
(1208, 302, 'Crankcase', 0),
(1209, 303, 'Mesin bubut', 0),
(1210, 303, 'Mesin freis', 0),
(1211, 303, 'Mesin bor', 0),
(1212, 303, 'Mesin gerinda', 1),
(1213, 304, 'Teknik pengelasan tanpa gas', 0),
(1214, 304, 'Pengelasan dengan elektroda tungsten', 1),
(1215, 304, 'Pengelasan menggunakan nyala api', 0),
(1216, 304, 'Pengelasan tanpa listrik', 0),
(1217, 305, 'Proses pelapisan logam', 0),
(1218, 305, 'Proses meningkatkan kandungan karbon pada permukaan logam', 1),
(1219, 305, 'Proses pembersihan logam', 0),
(1220, 305, 'Proses pemanasan logam hingga mencair', 0),
(1221, 306, 'Memotong material', 0),
(1222, 306, 'Membuat permukaan datar', 1),
(1223, 306, 'Membentuk lubang pada material', 0),
(1224, 306, 'Mencetak logam', 0),
(1225, 307, 'Memperbaiki kekuatan logam', 1),
(1226, 307, 'Mengurangi massa logam', 0),
(1227, 307, 'Membentuk logam menjadi cair', 0),
(1228, 307, 'Menghilangkan karat', 0),
(1229, 308, 'MIG welding', 0),
(1230, 308, 'TIG welding', 0),
(1231, 308, 'Spot welding', 1),
(1232, 308, 'Arc welding', 0),
(1233, 309, 'Bensin', 0),
(1234, 309, 'Solar', 1),
(1235, 309, 'Ethanol', 0),
(1236, 309, 'LPG', 0),
(1237, 310, 'Menyimpan energi kinetik', 1),
(1238, 310, 'Meningkatkan gesekan pada mesin', 0),
(1239, 310, 'Mengurangi kebisingan mesin', 0),
(1240, 310, 'Menghubungkan roda dengan mesin', 0),
(1241, 311, 'Radiator', 1),
(1242, 311, 'Alternator', 0),
(1243, 311, 'Camshaft', 0),
(1244, 311, 'Rocker arm', 0),
(1245, 312, 'PBESI', 1),
(1246, 312, 'PSSI', 0),
(1247, 312, 'KONI', 0),
(1248, 312, 'IESPA', 0),
(1249, 313, 'Free Fire', 0),
(1250, 313, 'Dota 2', 0),
(1251, 313, 'Mobile Legends', 1),
(1252, 313, 'PUBG', 0),
(1253, 314, 'MPL', 1),
(1254, 314, 'MDL', 0),
(1255, 314, 'PIALA KONI', 0),
(1256, 314, 'MSC', 0),
(1257, 315, 'ONIC Esports', 0),
(1258, 315, 'EVOS Divine', 1),
(1259, 315, 'Team RRQ', 0),
(1260, 315, 'EVOS Phoenix', 0),
(1261, 316, 'PUBG Association', 0),
(1262, 316, 'PBESI', 1),
(1263, 316, 'FIFA Foundation', 0),
(1264, 316, 'KONI', 0),
(1265, 317, 'Genshin Impact', 0),
(1266, 317, 'Dota 2', 1),
(1267, 317, 'Minecraft', 0),
(1268, 317, 'Candy Crush', 0),
(1269, 318, 'Lemon', 1),
(1270, 318, 'Wann', 0),
(1271, 318, 'Alberttt', 0),
(1272, 318, 'Vyn', 0),
(1273, 319, 'RRQ', 0),
(1274, 319, 'EVOS Legends', 0),
(1275, 319, 'Alter Ego', 0),
(1276, 319, 'ONIC Esports', 1),
(1277, 320, 'Call of Duty', 0),
(1278, 320, 'Mobile Legends', 1),
(1279, 320, 'League of Legends', 0),
(1280, 320, 'Overwatch', 0),
(1281, 321, 'Membunuh semua anggota tim musuh', 1),
(1282, 321, 'Meraih Chicken Dinner', 0),
(1283, 321, 'Menang tanpa menggunakan senjata', 0),
(1284, 321, 'Peringkat tertinggi di game', 0),
(1285, 322, 'Menjaga lane', 0),
(1286, 322, 'Membunuh monster di hutan', 1),
(1287, 322, 'Menyerang turret musuh', 0),
(1288, 322, 'Melindungi core', 0),
(1289, 323, 'MPL', 0),
(1290, 323, 'The International', 1),
(1291, 323, 'Worlds Championship', 0),
(1292, 323, 'SEA Games', 0),
(1293, 324, 'Indonesia', 0),
(1294, 324, 'Filipina', 1),
(1295, 324, 'Malaysia', 0),
(1296, 324, 'Singapura', 0),
(1297, 325, 'PUBG', 0),
(1298, 325, 'Mobile Legends', 1),
(1299, 325, 'Dota 2', 0),
(1300, 325, 'Free Fire', 0),
(1301, 326, 'RRQ', 1),
(1302, 326, 'EVOS', 0),
(1303, 326, 'ONIC', 0),
(1304, 326, 'Bigetron', 0),
(1305, 327, 'Mocha', 0),
(1306, 327, 'Rhino', 1),
(1307, 327, 'Milo', 0),
(1308, 327, 'Lancelot', 0),
(1309, 328, 'Free Fire', 0),
(1310, 328, 'PUBG Mobile', 1),
(1311, 328, 'Dota 2', 0),
(1312, 328, 'League of Legends', 0),
(1313, 329, 'Membunuh musuh', 0),
(1314, 329, 'Membantu tim dengan skill pendukung', 1),
(1315, 329, 'Mengambil buff hutan', 0),
(1316, 329, 'Menyerang turret', 0),
(1317, 330, 'Persatuan Bulu Tangkis Elektronik Seluruh Indonesia', 0),
(1318, 330, 'Pengurus Besar Elektronik Sports Indonesia', 0),
(1319, 330, 'Pengurus Besar eSports Indonesia', 1),
(1320, 330, 'Perhimpunan Besar eSports Seluruh Indonesia', 0),
(1321, 331, 'FFML', 1),
(1322, 331, 'PIALA FF', 0),
(1323, 331, 'FFWS', 0),
(1324, 331, 'MPL', 0),
(1325, 332, 'Indonesia', 0),
(1326, 332, 'Filipina', 0),
(1327, 332, 'Vietnam', 1),
(1328, 332, 'Thailand', 0),
(1329, 333, 'Clash Royale', 0),
(1330, 333, 'Hearthstone', 0),
(1331, 333, 'Magic: The Gathering', 0),
(1332, 333, 'Semua di atas', 1),
(1333, 334, 'Xepher', 1),
(1334, 334, 'Alberttt', 0),
(1335, 334, 'Lemon', 0),
(1336, 334, 'Wann', 0),
(1337, 335, 'ONIC Ultra', 0),
(1338, 335, 'Bigetron Red Aliens', 1),
(1339, 335, 'EVOS Nova', 0),
(1340, 335, 'Alter Ego X', 0),
(1341, 336, 'Menjaga lane', 0),
(1342, 336, 'Membunuh musuh dari jarak jauh', 1),
(1343, 336, 'Membantu tank', 0),
(1344, 336, 'Mengambil buff', 0),
(1345, 337, 'Evolution Victorious', 1),
(1346, 337, 'Energy Victory', 0),
(1347, 337, 'Evolution Overcome', 0),
(1348, 337, 'Electric Void', 0),
(1349, 338, 'DJ Alok', 0),
(1350, 338, 'Hip Hop Bundle', 1),
(1351, 338, 'Chrono', 0),
(1352, 338, 'Angelic Pants', 0),
(1353, 339, '1v1', 0),
(1354, 339, '3v3', 0),
(1355, 339, '5v5', 1),
(1356, 339, '6v6', 0),
(1357, 340, 'PUBG dan Free Fire', 0),
(1358, 340, 'Mobile Legends dan Valorant', 0),
(1359, 340, 'FIFA dan Dota 2', 0),
(1360, 340, 'Semua di atas', 1),
(1361, 341, 'ONIC Esports', 0),
(1362, 341, 'RRQ Hoshi', 0),
(1363, 341, 'EVOS Legends', 1),
(1364, 341, 'Aura Fire', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `exam_active` tinyint(1) DEFAULT 0,
  `kejuruan` varchar(255) DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_name`, `exam_active`, `kejuruan`, `last_updated`) VALUES
(21, 'Hussein', 0, 'Teknik Mesin', '2024-12-13 03:35:22'),
(22, 'Bambang', 0, 'Teknik Mesin', '2024-12-13 03:51:30'),
(23, 'Bambang', 0, 'Teknik Mesin', '2024-12-13 15:34:33'),
(24, 'Test', 0, 'Teknik Mekanik Industri', '2024-12-13 11:00:38'),
(25, 'Test', 0, 'Teknik Mekanik Industri', '2024-12-13 15:34:37'),
(26, 'Bambang', 0, 'Teknik Mesin', '2024-12-13 15:34:40'),
(27, 'Ahmad', 0, 'Teknik Kendaraan', '2024-12-13 15:27:54'),
(28, 'admin', 0, 'Teknik Mekanik Industri', '2024-12-13 15:32:59'),
(29, 'admin', 0, 'Teknik Mekanik Industri', '2024-12-13 15:34:42'),
(30, 'Udin', 0, 'Teknik Mesin', '2024-12-13 15:33:21'),
(31, 'Udin', 0, 'Teknik Kendaraan', '2024-12-13 15:34:45'),
(32, 'Bagas', 0, 'Teknik PSHT', '2024-12-13 15:34:07'),
(35, 'Wahyudi', 0, 'Teknik Mesin', '2024-12-13 17:11:03'),
(40, 'Faaaaa', 0, 'Teknik Mesin', '2024-12-14 02:49:17'),
(45, 'Aksyal', 0, 'Teknik Mesin', '2024-12-14 04:02:31'),
(55, 'Zidan', 0, 'Teknik Mesin', '2024-12-14 04:35:32'),
(58, 'Bagas Wahyudi', 0, 'Teknik Mesin', '2024-12-16 04:57:20'),
(63, 'Kosmara', 0, 'Teknik Mesin', '2024-12-16 04:59:31'),
(64, 'Kosmara', 1, 'Teknik Mesin', '2024-12-16 04:59:33'),
(65, 'Ahmad', 1, 'Teknik Mesin', '2024-12-16 05:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `soal_id` int(11) NOT NULL,
  `soal_text` text DEFAULT NULL,
  `ujian_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`soal_id`, `soal_text`, `ujian_id`) VALUES
(293, 'Alat pengukur panjang yang paling presisi adalah?', 2),
(294, 'Apa fungsi dari coolant pada mesin?', 2),
(295, 'Bagian mesin bubut yang berfungsi memutar benda kerja adalah?', 2),
(296, 'Jenis logam yang paling sering digunakan dalam pengelasan MIG adalah?', 2),
(297, 'Apa fungsi dari poros engkol pada mesin?', 2),
(298, 'Sistem pelumasan pada mesin bertujuan untuk?', 2),
(299, 'Apa nama alat yang digunakan untuk mengencangkan baut dengan presisi?', 2),
(300, 'Jenis pahat yang digunakan untuk membubut material keras disebut?', 2),
(301, 'Apa yang dimaksud dengan proses pengecoran?', 2),
(302, 'Komponen mesin yang berfungsi menghubungkan piston dengan poros engkol adalah?', 2),
(303, 'Jenis mesin yang digunakan untuk menggerinda permukaan adalah?', 2),
(304, 'Apa itu TIG dalam proses pengelasan?', 2),
(305, 'Apa yang dimaksud dengan carburizing?', 2),
(306, 'Apa fungsi utama dari milling machine?', 2),
(307, 'Proses perlakuan panas (heat treatment) bertujuan untuk?', 2),
(308, 'Apa jenis pengelasan yang menggunakan tekanan disebut?', 2),
(309, 'Bahan bakar utama yang digunakan dalam mesin diesel adalah?', 2),
(310, 'Apa fungsi flywheel pada mesin?', 2),
(311, 'Komponen utama pada sistem pendingin mesin adalah?', 2),
(312, 'Apa nama organisasi eSports resmi di Indonesia?', 1),
(313, 'Tim eSports Indonesia EVOS Legends dikenal dalam game apa?', 1),
(314, 'Turnamen Mobile Legends terbesar di Indonesia disebut?', 1),
(315, 'Free Fire World Series 2021 dimenangkan oleh tim Indonesia bernama?', 1),
(316, 'Organisasi eSports yang mendukung berbagai game kompetitif di Indonesia adalah?', 1),
(317, 'Game berikut yang termasuk eSports dan populer di Indonesia adalah?', 1),
(318, 'Siapa pemain legendaris Mobile Legends Indonesia yang dijuluki \'Baby Alien\'?', 1),
(319, 'MPL ID Season 11 dimenangkan oleh tim mana?', 1),
(320, 'Game eSports apa yang sering dimainkan pada turnamen Piala Presiden eSports?', 1),
(321, 'Istilah \'ACE\' dalam PUBG berarti?', 1),
(322, 'Pemain yang menjadi \'jungler\' di game Mobile Legends biasanya bertugas?', 1),
(323, 'Game Dota 2 memiliki turnamen tahunan terbesar bernama?', 1),
(324, 'Siapa tim eSports yang memenangkan SEA Games 2023 untuk Mobile Legends?', 1),
(325, 'Pemain \'Rekt\' dikenal sebagai pro player di game?', 1),
(326, 'Apa nama tim eSports dari Indonesia yang sering dijuluki \'Raja dari Segala Raja\'?', 1),
(327, 'Apa nama maskot MPL Indonesia?', 1),
(328, 'Tim Bigetron Red Aliens terkenal karena permainan mereka di game?', 1),
(329, 'Apa peran support di game Mobile Legends?', 1),
(330, 'Apa singkatan dari PBESI?', 1),
(331, 'Turnamen Free Fire terbesar di Indonesia disebut?', 1),
(332, 'Turnamen eSports SEA Games 2021 diadakan di negara?', 1),
(333, 'Game eSports yang dimainkan dengan senjata berbasis kartu adalah?', 1),
(334, 'Siapa pemain legendaris Dota 2 asal Indonesia?', 1),
(335, 'Apa nama tim PUBG Mobile yang populer di Indonesia?', 1),
(336, 'Pemain dengan role \'marksman\' di Mobile Legends bertugas?', 1),
(337, 'EVOS adalah singkatan dari?', 1),
(338, 'Apa nama skin legendaris yang paling mahal di Free Fire?', 1),
(339, 'Pemain Dota 2 biasanya bertanding dalam format?', 1),
(340, 'Tim Alter Ego memiliki divisi eSports untuk game?', 1),
(341, 'Tim mana yang terkenal sebagai juara dunia pertama Mobile Legends?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `ujian_id` int(11) NOT NULL,
  `kodeujian` varchar(255) DEFAULT NULL,
  `timer` int(11) DEFAULT NULL,
  `kejuruan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`ujian_id`, `kodeujian`, `timer`, `kejuruan`) VALUES
(1, 'APBN1', 3600, 'Teknik Mekanik Industri'),
(2, 'APBN', 3600, 'Teknik Mesin');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `role` enum('admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`id`, `kode`, `role`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `pilihan_id` int(11) DEFAULT NULL,
  `tanggal_pengerjaan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `user_name`, `soal_id`, `pilihan_id`, `tanggal_pengerjaan`) VALUES
(497, 'admin', 341, 1361, '2024-12-13 16:32:59'),
(498, 'Udin', 311, 1241, '2024-12-13 16:33:21'),
(502, 'Wahyudi', 302, 1205, '2024-12-13 18:11:03'),
(503, 'Wahyudi', 310, 1237, '2024-12-13 18:11:03'),
(504, 'Wahyudi', 311, 1241, '2024-12-13 18:11:03'),
(506, 'Faaaaa', 311, 1244, '2024-12-14 03:49:17'),
(507, 'Ahmad', 311, 1241, '2024-12-14 04:44:18'),
(508, 'Aksyal', 294, 1173, '2024-12-14 05:02:31'),
(509, 'Aksyal', 311, 1241, '2024-12-14 05:02:31'),
(510, 'Udin', 311, 1241, '2024-12-14 05:14:52'),
(511, 'Aksyal', 311, 1241, '2024-12-14 05:18:09'),
(512, 'Aksyal', 310, 1237, '2024-12-14 05:22:08'),
(513, 'Aksyal', 311, 1241, '2024-12-14 05:22:08'),
(514, 'Aksyal', 310, 1237, '2024-12-14 05:24:58'),
(515, 'Aksyal', 311, 1241, '2024-12-14 05:24:58'),
(516, 'Aksyal', 303, 1209, '2024-12-14 05:27:09'),
(517, 'Aksyal', 311, 1241, '2024-12-14 05:27:09'),
(518, 'Aksyal', 307, 1225, '2024-12-14 05:33:13'),
(519, 'Aksyal', 311, 1241, '2024-12-14 05:33:13'),
(520, 'Ahmad', 341, 1362, '2024-12-14 05:34:46'),
(521, 'Zidan', 311, 1241, '2024-12-14 05:35:33'),
(522, 'Aksyal', 311, 1241, '2024-12-14 05:49:48'),
(523, 'Aksyal', 307, 1225, '2024-12-14 05:59:00'),
(524, 'Aksyal', 311, 1241, '2024-12-14 05:59:00'),
(525, 'Bagas Wahyudi', 311, 1241, '2024-12-16 05:57:20'),
(526, 'Kosmara', 311, 1241, '2024-12-16 05:59:31'),
(527, 'Ahmad', 293, 1169, '2024-12-16 06:35:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`pilihan_id`),
  ADD KEY `question_id` (`soal_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`soal_id`),
  ADD KEY `ujian_id` (`ujian_id`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`ujian_id`),
  ADD UNIQUE KEY `kodeujian` (`kodeujian`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`soal_id`),
  ADD KEY `answer` (`pilihan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `pilihan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1565;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `soal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `ujian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=528;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD CONSTRAINT `pilihan_ibfk_1` FOREIGN KEY (`soal_id`) REFERENCES `soal` (`soal_id`);

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`ujian_id`) REFERENCES `ujian` (`ujian_id`);

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `user_answers_ibfk_1` FOREIGN KEY (`soal_id`) REFERENCES `soal` (`soal_id`),
  ADD CONSTRAINT `user_answers_ibfk_2` FOREIGN KEY (`pilihan_id`) REFERENCES `pilihan` (`pilihan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
