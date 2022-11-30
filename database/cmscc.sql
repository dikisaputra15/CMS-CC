-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 10:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmscc`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive_services`
--

CREATE TABLE `archive_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archive_services`
--

INSERT INTO `archive_services` (`id`, `id_client`, `id_service`, `start_date`, `duration`, `end_date`) VALUES
(1, 34, 6, '2021-10-16', 12, '2022-10-16'),
(2, 34, 7, '2022-11-01', 12, '2023-11-01'),
(3, 34, 6, '2022-11-01', 12, '2023-11-01'),
(6, 34, 6, '2021-10-16', 12, '2022-10-16'),
(7, 34, 6, '2022-11-23', 12, '2023-11-23'),
(8, 34, 6, '2021-10-16', 12, '2022-10-16'),
(9, 21, 6, '2022-03-03', 12, '2023-03-03'),
(10, 21, 6, '2022-03-03', 12, '2023-03-03'),
(11, 17, 6, '2022-11-01', 12, '2023-11-01'),
(12, 10, 7, '2021-12-01', 12, '2022-12-01'),
(13, 35, 8, '2022-11-29', 12, '2023-11-29'),
(14, 36, 11, '2022-11-30', 12, '2023-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_since` date NOT NULL,
  `client_poc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `concord_poc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_user_poc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_subs` int(11) DEFAULT NULL,
  `list_of_subs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `nama_client`, `address`, `client_since`, `client_poc`, `concord_poc`, `end_user_poc`, `no_of_subs`, `list_of_subs`, `contract_no`, `contract_value`) VALUES
(9, 'Black & Veatch Indonesia, PT', 'The Manhattan Square Mid Tower, Lt. 6 Unit BCD, Jl. TB Simatupang, Kav 1S, RT008 RW003, Cilandak Timur, Pasar Minggu Jakarta Selatan 12560', '2006-02-09', 'Jack W. Blackburn, Blackburnj@bv.com', 'GG', 'Jack W. Blackburn, Blackburnj@bv.com', 10, 'ThakurB@bv.com 918975767724, KundurVC@bv.com 6281365106484, GastonEK@bv.com 6281398899073, edsalltl@bv.com 66657157201, HammondJ@bv.com 6596618286, MatherLR@bv.com 628111074683, ChaudharyN@bv.com 66631969849, KhandekarN@bv.com 918888802176, RakhmiST@bv.com 6281325642999, ramasamysr@bv.com 66614021238', 'CNCRD-XX-XX', 0),
(10, 'BP International Ltd.', '501 Westlake Park Boulevard Housten TX 77079 US', '2016-12-08', 'Peng Enwei, enwei.peng@bp.com', 'GG', 'Peng Enwei, enwei.peng@bp.com', 5, 'budi.wirawan@se1.bp.com 628121020928, Chikitta.Carnelian@bp.com 6281329317453, enwei.peng@bp.com 6598195329, farina.chairunnisa@bp.com 628159840731, yudha_akbar.pally@bp.com 6281399181871', 'CNCRD-XX-XX', 0),
(11, 'DBS Indonesia, PT', 'Plaza Permata 12th Floor, Jl. M.H. Thamrin Kav. 57', '2006-08-15', 'Edi Setiawan, edisetiawan@dbs.com', 'GG', 'Edi Setiawan, edisetiawan@dbs.com', 5, 'andriyani@dbs.com 628170800375, bambangeko@dbs.com 6281617428830, sujatnopolina@dbs.com 628118119818, edisetiawan@dbs.com 6285781856069, Yoseftrisnandg1@dbs.com 6281574479544', 'CNCRD-GG-2631', 172800000),
(12, 'Embassy of AUSTRALIA - Australian Gov Securities', 'Jl. Patra Kuningan Raya Kav. 1-4, Jakarta, 12950', '2009-06-08', 'Jemma Reid, Jemma.Reid4@dfat.gov.au', 'GG', 'brendan.o\'callaghan@dfat.gov.au', 5, 'brendan.o\'callaghan@dfat.gov.au 8119098711, erin.dowle@dfat.gov.au 81119650252, Sharna Hill 81119670148, Vacant, Vacant', '', 0),
(13, 'Embassy of AUSTRALIA - Defense Attache', 'Jl. HR. Rasuna Said, Kav. C15-16 Kuningan, 12940, DKI Jakarta', '2009-06-08', 'Jonathan.Larnach-Jones, jonathan.larnach-jones@dfat.gov.au', 'GG', 'Jonathan.Larnach-Jones, jonathan.larnach-jones@dfat.gov.au', 6, 'Chris.McIlwain@dfat.gov.au 62811999651, jonathan.larnach-jones@dfat.gov.au 62811164907, kenneth.bowes@dfat.gov.au 62811999646, matthew.campbell@dfat.gov.au 62811999653, Stephen.daley@dfat.gov.au 62811999640, Rod.Griffiths@dfat.gov.au 62811164902, RUS.ADMIN12I@defence.gov.au', '', 0),
(14, 'Embassy of AUSTRALIA - Foreign Affairs', 'Jl. Patra Kuningan raya Kav. 1 - 4 (Kuningan), 12950, DKI Jakarta', '2009-06-08', 'Teeza Wahyuningtyas, Teeza.Wahyuningtyas@dfat.gov.au', 'GG', 'Sean.Daly@dfat.gov.au, robert.manoe@dfat.gov.au / jakt.io@dfat.gov.au', 8, 'Ashton.Papazahariakis@dfat.gov.au, Cass.Morgan@dfat.gov.au, robert.manoe@dfat.gov.au / jakt.io@dfat.gov.au, Penny.Williams@dfat.gov.au, steve.scott@dfat.gov.au, Sean.Daly@dfat.gov.au, Sinead.Ferris@dfat.gov.au, stephen.raper@afp.gov.au', '', 0),
(15, 'Embassy of AUSTRALIA - Strategic Affairs', 'Jl. Patra Kuningan raya No. Kav. 1-4 Rt.6/Rw. 4, Kuningan Timur, Setia Budi, 12950, South Jakarta', '2009-06-08', 'Natalie Edwards, Natalie.Edwards@dfat.gov.au', 'GG', 'marc.daly@dfat.gov.au', 5, 'Alison.Everall@dfat.gov.au 6281110609877, colette.hull@dfat.gov.au 81119675376, Colleen.steward@dfat.gov.au 81138118111, kimberly.everton-moore@dfat.gov.au 628118525517, marc.daly@dfat.gov.au 6281110600880', '', 0),
(16, 'Embassy of Canada', 'World Trade Centre 6th floor, Jl. Jend. Sudirman Kav. 29-31, DKI Jakarta, 12920', '2005-12-30', 'Akhmad Musanif, Akhmad.Musanif@international.gc.ca', 'GG', 'Akhmad Musanif, Akhmad.Musanif@international.gc.ca', 11, 'Antoine.Nouvet@international.gc.ca 628118573105, Drew.Evans@international.gc.ca 628118575209, enric.bouffard@international.gc.ca 628118575195, Mark.Strasser@international.gc.ca 628118573109, nadia.burger@international.gc.ca 6281110604933, Akhmad.Musanif@international.gc.ca 628118575211, Nurwulan.sari@international.gc.ca 628118573089, Richard.LeBars@international.gc.ca 628118575201, Stewart.Taylor2@international.gc.ca 628118575194, Stuart.Shaw@international.gc.ca 628118573104, Tim.Murphy@international.gc.ca 628118575210', '', 0),
(17, 'Embassy of Denmark (Royal Danish)', 'Menara Rajawali, 25th Floor, Jl DR Ide Anak Agung Gde Agung Kawasan Mega Kuningan, Jakarta, 12950', '2020-11-12', 'Baby  WM Arief, babari@um.dk', 'GG', '-', 5, 'jajeps@um.dk 62817883588, \r\nlabola@um.dk 628119454569,\r\nmabeng@um.dk 628176000729,\r\nperbri@um.dk 628176494541, vreamr@um.dk  62817100257', '', 0),
(18, 'Embassy of France', 'Jl. MH Thamrin No. 20, Jakarta, 10350', '2013-11-19', 'Welky Andrest, welky.andrest@diplomatie.gouv.fr', 'GG', 'Myriam Saint-Pierre, myriam.saint-pierre@diplomatie.gouv.fr', 5, 'anne.quenot@diplomatie.gouv.fr, david.cordier@diplomatie.gouv.fr 6281119651777, marie-salome.rinuy@diplomatie.gouv.fr, sven.meic@diplomatie.gouv.fr 6281386494877, laurent.legodec@diplomatie.gouv.fr', '', 0),
(19, 'Embassy of Netherlands', 'JL Rasuna Said Kav S-3 , Kuningan, 12950, Jakarta', '2009-03-30', 'Hugo Brenninkmeijer, hugo.brenninkmeijer@minbuza.nl', 'GG', '-', 10, 'ardi.stoiosbraken@minbuza.nl 8118860002,\r\nberry.spaan@minbuza.nl		8118515440,\r\ndewi.barnas@minbuza.nl		081119592990,\r\nedwin.arifin@minbuza.nl		08118037165,\r\nkaren.hordijk@minbuza.nl		62811886028,\r\nJAK-CDP@minbuza.nl		62811886001,\r\nmark.hengstman@minbuza.nl		6281119311159,\r\nmaresa.oosterman@minbuza.nl		628118515436,\r\nNorbert.moerkens@minbuza.nl 		62811886037,\r\ntimor.eldardiry@minbuza.nl		628119318793', '', 0),
(20, 'Embassy of Norway', 'Menara Rajawali Building, 25th floor Jakarta, 12950', '2018-03-15', 'Xuan Ngoc Thi Tran (Nat), Xuan.Ngoc.Thi.Tran@mfa.no', 'GG', 'Xuan Ngoc Thi Tran (Nat), Xuan.Ngoc.Thi.Tran@mfa.no', 8, 'Celine.Lofthus.Gaasrud@mfa.no 6281119620198,\r\nGunhild.Oland.Santos-Nedrelid@mfa.no 8118515479,\r\nKristian.Netland@mfa.no 6281119310983,\r\nMerete.Dyrud@mfa.no 8118515478,\r\noela@mfa.no 6281113308346,\r\nrut.kruger.giverin@mfa.no 8118515480,\r\nValentin.Musangwa@mfa.no 6281317928800,\r\nXuan.Ngoc.Thi.Tran@mfa.no 6281119310982', '', 0),
(21, 'Embassy of Singapore, Defense Attache', 'JL. HR. Rasuna Said Blok X/4 Kav. No. 2, Jakarta 12950', '2007-01-10', 'Kuick Yi Kai Grayson, Kuick_Yi_Kai_Grayson@defence.gov.sg', 'GG', 'Chris Wong Kum Thong, padadaojakarta@gmail.com', 5, 'padadaojakarta@gmail.com 62811860971,\r\nMINDEF_SAFCIC@mindef.gov.sg 6597284638,\r\noscconcord@yahoo.com 6596955013,\r\nlchyekhi3@gmail.com 62811861707,\r\nVacant', '', 0),
(22, 'Embassy of SINGAPORE, MFA', 'Singapore Embassy in Jakarta, JL. HR. Rasuna Said Blok X/4 Kav. No. 2', '2007-01-10', 'Muhammad Danish Durrani MOHAMAD YUSOF, Muhammad_Danish_Durrani_MOHAMAD_YUSOF@mfa.gov.sg', 'GG', 'Mohamad Fazuddin Shah, Mohamad_Fazuddin_Shah_MOHAMAD_SHAH@mfa.gov.sg', 5, 'Bruce_TOW@mfa.gov.sg 628111464421,\r\nMohamad_Fazuddin_Shah_MOHAMAD_SHAH@mfa.gov.sg	6281119310668,\r\nJeremy_SOR@mfa.gov.sg 6281119581610,\r\nMaisarah_Abu_Bakar@mfa.gov.sg 6281119640248,\r\nSIM_Siong_Chye@mfa.gov.sg 6281119339538', '', 0),
(23, 'Embassy of Sweden', 'Menara Rajawali 9th floor, kawasan Mega Kuningan Lot 5.1, 12950, Jakarta', '2020-11-16', 'Yuni Purnama, yuni.purnama@gov.se', 'GG', 'Marina Berg - Ambassador, marina.berg@gov.se', 5, 'anna.m.eriksson@gov.se 628118860143,\r\nmarina.berg@gov.se 628118860140,\r\ngustav.dahlin@gov.se 628118860141,\r\nnicki.khorram-manesh@gov.se 628118860142,\r\nstefan.mattsson@gov.se 628118035244', '', 0),
(24, 'Embassy of Thailand', 'Jl. DR Ide Anak Agung Gde Agung, Kav. E3.3 No.3 (Lot 8.8), Kawasan Mega Kuningan', '2022-09-01', 'Miss Pamila Sirichuchnin, pamsirichuchnin@gmail.com', 'GG', 'Miss Pamila Sirichuchnin, pamsirichuchnin@gmail.com', 3, 'prapand@gmail.com,\r\nnapat.d@mfa.go.th,\r\npamsirichuchnin@gmail.com', '', 0),
(25, 'Embassy of the UNITED STATES', 'Jl. Medan Merdeka Selatan 4-5  10110, Jakarta', '2009-02-02', 'Yorian Yohannes, YorianY@state.gov', 'GG', 'Lawrence Imes, ImesL@state.gov', 30, 'KarlinAR@state.gov 6281110600836,\r\nwaitersbl@state.gov 6281119521353,\r\nJohnsonCP@state.gov 628110623879,\r\nHoelscherCM@state.gov 628118521080,\r\nSpringerDR@state.gov 6281110649183,\r\nChurchGS@state.gov 628119816186,\r\nYoungHW@state.gov 628118061315,\r\nKopeckyJD@state.gov 628118061315,\r\nChesbrojk@state.gov 628119816187,\r\nDurocherJM@state.gov 628118511956,\r\nGianarisJC@state.gov 628111465438,\r\nRuffcornJF@state.gov 08111521651,\r\nmckeeverj@state.gov 08118514881,\r\nGenestK@state.gov 6281119569997,\r\nImesL@state.gov 6281113003437,\r\nRommelLM@state.gov 8111596755,\r\nYangMK@state.gov 6281132044653,\r\nSidabutarMF@state.gov 6281113002261,\r\nLombardoMR@state.gov 628111113486,\r\nCavendishSM@state.gov 08118140871,\r\nHasanahN@state.gov 6281113006904,\r\nMaynardNN@state.gov 628121079936,\r\nSakakiR@state.gov 6281132261464,\r\nSabirinR@state.gov 6281119569995,\r\nChandraR@state.gov 628119816192,\r\nMackoRK@state.gov 6281119348982,\r\nNolandRT@state.gov 081180101044,\r\nMungaraS@state.gov 081180101030,\r\nHowethSO@state.gov 628118014323,\r\nSusantoYY@state.gov 628118014323', '', 0),
(26, 'Embassy of the UNITED STATES - PACOM', 'Jl. Medan Merdeka Sel. No.3-5, RT.11/RW.2, Gambir, 10110, Jakarta', '2009-02-02', 'Yohanes Yorian, YorianY@state.gov', 'GG', 'Angel Parrish, parrishal1@state.gov', 5, 'parrishal1@state.gov 81110605010,\r\nKniselyDJ@state.gov 81119355158,\r\nMooreIJ@state.gov 81119815440,\r\nCrossOK@state.gov 81119355166,\r\nSmithWP@state.gov 81119355165', '', 0),
(27, 'Environmental IndoKarya', 'Lina Building Suite 301, JL. HR. Rasuna Said Kav. B7, Kuningan, 12910, Jakarta', '2010-11-23', 'Dhian Fitri, Dhian.Fitri@securitas.co.id', 'GG', 'Dhian Fitri, Dhian.Fitri@securitas.co.id', 5, 'agus.arianto@securitas.co.id 6281314030190,\r\ndhian.fitri@securitas.co.id 62811832751,\r\nlaswanto.olas@securitas.co.id 6281908275526,\r\nMarnangkok.Simatupang@securitas.co.id 6281382447870,\r\noperations.center@securitas.co.id 6281387626616', '', 0),
(28, 'ExxonMobil Oil Indonesia', 'Wisma GKBI, 27-31th Floors Jl. Jend. Sudirman No. 28, 10210, Jakarta', '2007-01-16', 'Bram Ibrahim Indra, bram.ibrahim.indra@exxonmobil.com', 'GG', 'Mark Ho Jiann Liang, mark.jl.ho@exxonmobil.com', 5, 'bram.ibrahim.indra@exxonmobil.com 628161815868,\r\nharry.k.dianto@exxonmobil.com 62811279605,\r\nmark.jl.ho@exxonmobil.com 6596448745,\r\nsusana.svojsik@exxonmobil.com 13463371313,\r\nx.yulian@exxonmobil.com 628128229362', '', 0),
(29, 'Freeport Indonesia', 'Plaza 89, 5th Floor, Jl. H. R. Rasuna Said Kav X-7 No. 6, Jakarta, 12940', '2006-08-14', 'Scott Hanna, shanna@fmi.com', 'GG', 'Scott Hanna, shanna@fmi.com', 18, 'ameadows@fmi.com 628119197282,\r\nanasuha1@fmi.com 62811491534,\r\ncarms@fmi.com,		\r\ndjones@fmi.com 6281271113311,\r\ndnorriss@fmi.com,		\r\ndfalgous@fmi.com,		\r\nHorst Dieter Garz 628119866213,\r\njmosher@fmi.com 19282151415,\r\nmjohnson@fmi.com,		\r\nmlamb1@fmi.com,		\r\nrthomasj@fmi.com 628114910504,\r\nrschroed@fmi.com 62811496399,\r\nshanna@fmi.com 628121093602,\r\nscott@ervin.us.com 628123873911,\r\nshankin@fmi.com 628114903101,\r\ntberon@fmi.com 628118083546,\r\nrvinroot@fmi.com,		\r\nbrising@fmi.com 16026187270', '', 0),
(30, 'Frisian Flag Indonesia', 'Jl. Raya Bogor Km. 5, Pasar Rebo PO Box 4047 Jakarta 13040', '2022-03-15', 'Maurits Klavert, maurits.klavert@frieslandcampina.com', 'GG', 'Marco.vanVeen@FrieslandCampina.com, Frida.Chalid@frieslandcampina.com', 0, '-', '', 0),
(31, 'Ignatius Andy Law Offices', 'GD. Equity Tower, Lt. II Unit F SCBD Lot 9, Jl. Jend Sudirman Kav. 52-53, Kebayoran Baru', '2022-08-23', 'Ms. Fay Sara Fiqri, fay.fiqry@ignatiusandy.com', 'GG', 'ignatius.andy@ignatiusandy.com', 0, '-', '', 0),
(34, 'Jakarta Intercultural School', 'Jl. Terogong Raya No. 33, Cilandak, P.O. Box 1078 JKS, 12210', '2012-10-29', 'John Livingstone, jlivingstone@jisedu.or.id', 'GG', '-', 1, 'david@jisedu.or.id 628129983858,\r\nEasy Arisarwindha 6281119100761,\r\njlivingstone@jisedu.or.id 6281119180740', 'AA001', 1000),
(36, 'ff', 'tdf', '2022-10-31', 'ffghb', 'sfd', 'fsbeg', NULL, NULL, '5444', 563);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_clients`
--

CREATE TABLE `detail_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_clients`
--

INSERT INTO `detail_clients` (`id`, `id_client`, `id_service`, `start_date`, `duration`, `end_date`) VALUES
(5, 9, 6, '2022-04-01', 12, '2023-04-01'),
(6, 10, 7, '2021-12-01', 12, '2022-12-01'),
(7, 11, 6, '2022-01-01', 12, '2023-01-01'),
(8, 12, 6, '2022-08-01', 12, '2023-08-01'),
(9, 13, 6, '2022-06-08', 12, '2023-06-08'),
(10, 13, 5, '2022-06-08', 12, '2023-06-08'),
(11, 14, 7, '2022-11-09', 12, '2023-11-09'),
(12, 15, 6, '2022-11-11', 12, '2023-11-11'),
(13, 16, 6, '2022-04-17', 12, '2023-04-17'),
(14, 17, 6, '2022-11-01', 12, '2023-11-01'),
(15, 18, 6, '2022-12-04', 12, '2023-12-04'),
(16, 19, 6, '2022-03-01', 12, '2023-03-01'),
(17, 20, 6, '2022-07-01', 12, '2023-07-01'),
(18, 21, 6, '2022-03-03', 12, '2023-03-03'),
(19, 22, 6, '2022-07-01', 12, '2023-07-01'),
(20, 23, 6, '2021-10-19', 12, '2022-10-19'),
(21, 24, 6, '2022-09-01', 4, '2023-01-01'),
(22, 25, 6, '2022-04-01', 12, '2023-04-01'),
(23, 26, 7, '2022-07-05', 12, '2023-07-05'),
(24, 27, 6, '2022-03-19', 12, '2023-03-19'),
(25, 28, 7, '2020-12-01', 36, '2023-12-01'),
(26, 29, 6, '2022-02-01', 12, '2023-02-01'),
(27, 30, 12, '2022-02-10', 6, '2022-08-10'),
(28, 30, 14, '2022-02-10', 3, '2022-05-10'),
(34, 34, 6, '2021-10-16', 12, '2022-10-16'),
(36, 36, 11, '2022-11-30', 12, '2023-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `detail_propective_clients`
--

CREATE TABLE `detail_propective_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pros_client` int(11) NOT NULL,
  `date` date NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_poc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poc_cc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_propective_clients`
--

INSERT INTO `detail_propective_clients` (`id`, `id_pros_client`, `date`, `remarks`, `client_poc`, `poc_cc`) VALUES
(46, 35, '2022-06-30', 'Proposal Highly Sensitive Background Check sent.', 'Lee Bumgarner', 'GG'),
(47, 36, '2019-05-14', 'Proposal Information and Emergency Response Services sent.', 'Mauritz K', '-'),
(48, 36, '2022-06-17', 'Ruby Sunarjo: The proposal related to this matter has submitted to internal stakeholders, I will update soon.', '-', '-'),
(49, 36, '2022-11-23', 'example 2', '-', '-'),
(50, 36, '2022-11-25', 'tes', 'g', 'g'),
(51, 35, '2022-11-25', 'ex', 'e', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_notes`
--

CREATE TABLE `log_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dclient` int(11) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_notes`
--

INSERT INTO `log_notes` (`id`, `id_dclient`, `notes`) VALUES
(1, 14, 'follow up'),
(2, 29, 'follow in'),
(3, 14, 'extend'),
(4, 27, 'test'),
(5, 27, 'example 2'),
(6, 27, 'example 3'),
(7, 14, 'tsggh');

-- --------------------------------------------------------

--
-- Table structure for table `log_service_clients`
--

CREATE TABLE `log_service_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `date` date NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_service_clients`
--

INSERT INTO `log_service_clients` (`id`, `id_client`, `id_service`, `date`, `remarks`) VALUES
(3, 9, 6, '2022-03-25', 'Invoice paid.'),
(4, 9, 6, '2022-03-18', 'Proposal signed received'),
(5, 9, 6, '2022-03-09', 'Invoice sent to client.'),
(6, 9, 6, '2022-02-18', 'Proposal information services renewal sent.'),
(7, 9, 6, '2021-04-06', 'Jan spoke with Security Audit Commission member Savitri regarding a meeting on Concord security consulting services.'),
(8, 9, 6, '2021-03-26', 'Invoice paid'),
(9, 9, 6, '2021-02-11', 'Invoice sent.'),
(10, 9, 6, '2021-02-19', 'signed proposal received.'),
(11, 10, 7, '2021-12-30', 'Inv paid'),
(12, 10, 7, '2021-12-06', 'PO received. Inv sent.'),
(13, 10, 7, '2021-11-23', 'Enwei: to continue our subscription with premium option'),
(14, 10, 7, '2021-11-19', 'Proposal info service Concord Myanmar sent'),
(15, 10, 7, '2021-11-18', 'Enwei: Could I request if you could provide me the pricing for the concord review Myanmar service while we trial the service in the next few days? This will help us make a decision on whether we decide to take up the service for Myanmar'),
(16, 11, 6, '2021-12-21', 'Inv paid'),
(17, 11, 6, '2021-11-15', 'Inv sent'),
(18, 11, 6, '2021-11-15', 'Proposal signed received.'),
(19, 11, 6, '2021-10-25', 'Proposal Information services sent.'),
(20, 11, 6, '2020-12-22', 'Invoice paid.'),
(21, 12, 6, '2021-07-30', 'Inv paid'),
(22, 12, 6, '2021-07-28', 'Proposal for Info services sent. Proposal approved, invoice sent.'),
(23, 12, 6, '2022-07-01', 'Proposal for Info services sent'),
(24, 12, 6, '2022-07-18', 'Reminder sent'),
(25, 12, 6, '2022-07-18', 'Jemma Reid: we will confirm this week about renewal'),
(26, 12, 6, '2022-07-25', 'Reminder sent'),
(27, 12, 6, '2022-07-25', 'Jemma Reid: We do wish to renew, I am just seeking final approval. Will revert ASAP'),
(28, 13, 6, '2021-11-17', 'Inv paid'),
(29, 13, 6, '2021-11-11', 'Additional inv for 1 subscriber sent'),
(30, 13, 6, '2021-06-02', 'Invoice paid.'),
(31, 13, 6, '2021-05-25', 'Invoice sent.'),
(32, 13, 6, '2021-04-22', 'Desi Tanudwidjaja: SMS only subscriber up-date from 33 to 31'),
(33, 13, 6, '2021-04-21', 'Proposal for info service renewal sent.'),
(34, 14, 7, '2021-10-01', 'Proposal Information services renewal sent to client.'),
(35, 14, 7, '2020-11-02', 'Invoice paid'),
(36, 14, 7, '2020-10-27', 'Invoice sent.'),
(37, 14, 7, '2020-10-20', 'Proposal Information services sent to client.'),
(38, 14, 7, '2019-11-12', 'Invoice paid.'),
(39, 14, 7, '2019-11-01', 'Invoice sent.'),
(40, 14, 7, '2019-11-08', 'Signed proposal received.'),
(41, 14, 7, '2022-11-15', 'Proposal for info service sent to Cassandra Morgan'),
(42, 14, 7, '2022-09-19', 'Signed proposal received.'),
(43, 15, 6, '2021-12-17', 'Proposal signed received for standard subscriptions'),
(44, 15, 6, '2021-10-01', 'Proposal Information services renewal sent to client.'),
(45, 15, 6, '2020-11-05', 'Invoice paid'),
(46, 15, 6, '2020-10-06', 'Invoice sent.'),
(47, 15, 6, '2020-10-06', 'Proposal Information Services Renewal sent to client.'),
(48, 15, 6, '2020-02-13', 'Hybrid Course agreed to with eight participants.  Course to commence 13APR20.  Theory part to be conducted at the Concord Office nd the practical exercise to be conducted in Cibubur using the parafe ground and cones.  Only a Certificate of Attendance will be issued'),
(49, 15, 6, '2022-09-16', 'Proposal for info service renewal sent to Natalie Edwards'),
(50, 16, 6, '2022-05-10', 'Invoice sent.'),
(51, 16, 6, '2022-03-15', 'Akhmad Musanif: The funds are usually available to be used at late April for new fiscal year funds, please send the invoice early Apr'),
(52, 16, 6, '2022-03-04', 'Proposal signed received.'),
(53, 16, 6, '2022-01-17', 'Proposal indormation services sent to client.'),
(54, 16, 6, '2021-04-30', 'Inv paid'),
(55, 17, 6, '2021-11-03', 'Inv Paid'),
(56, 17, 6, '2021-11-27', 'Inv sent'),
(57, 17, 6, '2021-10-27', 'Baby M Arif: We confirm to renew the existing subscription for the year 2022 – with the same list of subscribers as before. Please send us the invoice for subscription renewal accordingly'),
(58, 17, 6, '2021-10-14', 'Proposal for info service sent'),
(59, 17, 6, '2020-11-20', 'Service starts.'),
(60, 17, 6, '2020-11-18', 'Invoice paid.'),
(61, 18, 6, '2021-11-11', 'Inv paid'),
(62, 18, 6, '2021-11-08', 'Inv sent'),
(63, 18, 6, '2021-11-08', 'Andrest Welky: Please find attached the signed proposal, we choose standard option'),
(64, 18, 6, '2021-11-02', 'Proposal info service renewal sent to client.'),
(65, 18, 6, '2021-04-27', 'Jan gave briefing to French Embassy regarding Makassar bomb attack and Jkt Police HQ attack.'),
(66, 18, 6, '2022-09-22', 'Proposal for info service renewal sent to Andrest Welky'),
(67, 19, 6, '2022-02-25', 'Inv paid'),
(68, 19, 6, '2022-02-16', 'Inv sent'),
(69, 19, 6, '2022-02-15', 'We would like to extend the standard subscription'),
(70, 19, 6, '2022-01-03', 'Proposal for info service sent'),
(71, 19, 6, '2021-03-06', 'Jan gave presentation to Ambassador and his staff. Dutch Embassy has further interest in charting etc.'),
(72, 20, 6, '2022-04-07', 'Proposal information services renewal sent.'),
(73, 20, 6, '2021-06-25', 'Invoice sent.'),
(74, 20, 6, '2021-05-11', 'Proposal Information services renewal sent to client.'),
(75, 20, 6, '2020-07-02', 'Invoice paid.'),
(76, 20, 6, '2020-07-01', 'Invoice sent.'),
(77, 20, 6, '2020-06-30', 'Proposal information services renewal sent to client.'),
(78, 20, 6, '2019-07-01', 'Service start.'),
(79, 20, 6, '2019-06-27', 'Invoice paid'),
(80, 20, 6, '2019-06-25', 'Invoice sent'),
(81, 20, 6, '2022-07-05', 'Signed proposal received'),
(82, 21, 6, '2022-03-11', 'Inv Paid'),
(83, 21, 6, '2022-03-01', 'Inv sent'),
(84, 21, 6, '2021-12-08', 'Proposal info services renewal sent to client.'),
(85, 21, 6, '2021-05-21', 'Invoice paid'),
(86, 21, 6, '2021-03-02', 'Invoice sent'),
(87, 21, 6, '2020-12-07', 'Proposal info service renewal sent.'),
(88, 21, 6, '2021-01-30', 'Inv paid'),
(89, 21, 6, '2022-07-05', 'Contract awarded. Invoice sent'),
(90, 22, 6, '2022-04-01', 'Danish Durani: Please see attached letter for the extension. Would appreciate your formal acceptance too. Please also send us the invoice for the extension for us to process the payment'),
(91, 22, 6, '2022-03-28', 'Proposal info service for 1 month sent'),
(92, 22, 6, '2022-03-28', 'Danish Durani: We are still in the midst of preparing the documents for a new contract for said services. Could we enquire if you are okay with it and if yes, please provide a quotation for it'),
(93, 22, 6, '2022-03-16', 'Inv paid'),
(94, 22, 6, '2022-03-01', 'Inv sent'),
(95, 22, 6, '2022-01-30', 'Contract awarded for 1 year - standard package'),
(96, 23, 6, '2021-10-20', 'Inv paid'),
(97, 23, 0, '2021-11-15', 'Proposal signed received.'),
(98, 23, 6, '2021-11-15', 'Proposal signed received.'),
(99, 23, 6, '2021-10-12', 'Proposal approved. Invoice sent.'),
(100, 23, 6, '2021-09-15', 'Proposal Information services renewal sent to client.'),
(101, 23, 6, '2020-10-19', 'Invoice paid. Service starts.'),
(102, 23, 6, '2020-10-06', 'Proposal approved. Invoie sent.'),
(103, 23, 6, '2020-10-09', 'Proposal Information sent.'),
(104, 23, 6, '2022-09-12', 'Proposal for Information Service sent to Yuni Purnama'),
(105, 23, 6, '2022-09-21', 'Yuni Purnama: Please advice if it is possible to have only one user? How much does it cost ?'),
(106, 23, 6, '2022-09-23', 'we can accommodate the Embassy if the Embassy needs only one subscriber at a special rate of USD400/month'),
(107, 24, 6, '2021-04-01', 'Proposal Information services sent. Contract with current provider ends in Oct 2021'),
(108, 24, 6, '2021-11-29', 'Proposal information service sent.'),
(109, 24, 6, '2022-04-01', 'Email to Sirichada sent for update'),
(110, 24, 6, '2022-06-30', 'Inquiry received'),
(111, 24, 6, '2022-07-04', 'Types of subscription and pricing schedule sent'),
(112, 24, 6, '2022-07-18', 'Reminder sent'),
(113, 24, 6, '2022-07-18', 'The service is interesting, unfortunately, the price was quite too high for my personal use. I\'ll consider this in the future'),
(114, 24, 6, '2022-08-05', 'Proposal for 3 months subscription approved. Waiting signed proposal'),
(115, 24, 6, '2022-08-25', 'Invoice paid. Service starts 1 Sep 22'),
(116, 24, 6, '2022-09-06', 'New Client'),
(117, 24, 6, '2022-09-01', 'Info service starts. 1 month premium compliment subscriptions, 3 months standard subscriptions'),
(118, 25, 6, '2022-06-27', 'Joey: Awaiting PO for the additonal subscriber for RA dept'),
(119, 25, 6, '2022-03-23', 'Inv paid'),
(120, 25, 6, '2022-03-15', 'Inv sent'),
(121, 25, 6, '2022-03-15', 'PO Received - Standard Subscription'),
(122, 25, 6, '2022-02-18', 'Proposal for info service sent'),
(123, 25, 6, '2021-03-22', 'Invoice paid.'),
(124, 25, 6, '2021-03-10', 'Invoice sent.'),
(125, 25, 6, '2022-09-05', 'Additional 1 subscriber for Medan start'),
(126, 26, 7, '2022-06-27', 'Joey: awaiting approval for PACOM PO'),
(127, 26, 7, '2022-04-01', 'Proposal information service renewal sent.'),
(128, 26, 7, '2021-06-16', 'Invoice paid.'),
(129, 26, 7, '2021-06-02', 'PO received. Inv sent.'),
(130, 26, 7, '2021-04-21', 'Proposal for info service renewal sent.'),
(131, 26, 7, '2020-06-24', 'Service starts.'),
(132, 26, 7, '2020-06-23', 'Invoice paid.'),
(133, 26, 7, '2020-06-02', 'Invoice sent.'),
(134, 26, 7, '2020-02-10', 'Proposal for PACOM sent.'),
(135, 26, 7, '2022-06-30', 'PO received. Inv sent.'),
(136, 27, 6, '2022-03-23', 'Proposal approved. Inv sent'),
(137, 27, 6, '2022-02-15', 'Proposal information services sent to client.'),
(138, 27, 6, '2021-03-05', 'Proposal signed received.'),
(139, 27, 6, '2021-03-01', 'Invoice sent.'),
(140, 27, 6, '2021-02-08', 'Proposal Information services sent to client.'),
(141, 27, 6, '2020-03-03', 'Invoice paid.'),
(142, 28, 7, '2022-01-01', 'Exxon starts premium subscription tes'),
(143, 28, 7, '2020-08-30', 'Proposal for Information services & Ad-Hoc Requested Consulting Services sent to client.'),
(144, 28, 7, '2019-11-30', 'PO extension for 1 year period received.'),
(145, 28, 7, '2019-10-24', 'Reminder sent'),
(146, 28, 7, '2019-09-13', 'Exparation date reminder sent'),
(147, 29, 6, '2022-02-17', 'Inv paid'),
(148, 29, 6, '2022-01-14', 'Inv sent'),
(149, 29, 6, '2021-11-03', 'Proposal info service renewal sent to client.'),
(150, 29, 6, '2021-02-08', 'Invoice paid.'),
(151, 29, 6, '2021-02-03', 'Invoice sent.'),
(152, 29, 6, '2020-12-16', 'Proposal information services renewal sent.'),
(153, 29, 6, '2022-08-24', 'Quotation for service up-garde sent to Mr. Hanna. Waiting for PO'),
(154, 29, 7, '2022-09-20', 'PO for service upgrade to premium received (5 subscribers only)'),
(155, 30, 12, '2022-02-18', 'Proposal information service sent to client.'),
(156, 30, 14, '2022-03-23', 'Invoice SVA sent'),
(157, 30, 12, '2022-03-21', 'Inv 30% down pmnt paid'),
(158, 30, 12, '2022-03-15', 'Invoice 30 % of total value sent - Investigation & Risk Assessment.'),
(159, 30, 12, '2022-02-15', 'Proposal signed received.'),
(160, 30, 12, '2022-07-20', 'Submission Service Receipt Form for signing  by user'),
(161, 30, 12, '2022-07-21', 'Signed Service Receipt received'),
(162, 30, 12, '2022-07-21', 'Submission Service Receipt Form for GR requirement'),
(163, 30, 12, '2022-07-21', 'GR received'),
(164, 30, 12, '2022-07-22', 'Invoice submitted'),
(165, 31, 9, '2022-04-05', 'proposal sent'),
(166, 31, 9, '2022-07-12', 'Waiting response from Client'),
(167, 31, 9, '2022-08-23', 'Invoice down pmnt paid. New client'),
(168, 18, 6, '2022-11-10', 'Inv paid'),
(169, 15, 6, '2022-11-04', 'Inv paid'),
(170, 34, 6, '2021-12-13', 'Inv paid'),
(171, 34, 6, '2022-11-21', 'for example');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(67, '2014_10_12_000000_create_users_table', 1),
(68, '2014_10_12_100000_create_password_resets_table', 1),
(69, '2019_08_19_000000_create_failed_jobs_table', 1),
(70, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(71, '2022_09_30_014852_create_services_table', 1),
(72, '2022_09_30_015953_create_prospective_clients_table', 1),
(73, '2022_09_30_021000_create_detail_propective_clients_table', 1),
(74, '2022_09_30_022104_create_clients_table', 1),
(75, '2022_09_30_023106_create_detail_log_service_clients', 1),
(76, '2022_09_30_023617_create_notes_table', 1),
(77, '2022_09_30_061354_create_permission_tables', 1),
(78, '2022_11_01_014211_create_detail_clients_table', 2),
(79, '2022_11_01_014439_create_log_service_clients_table', 2),
(80, '2022_11_09_043716_create_log_notes_table', 3),
(81, '2022_11_09_072151_create_archive_services_table', 4),
(82, '2022_11_14_020927_create_invoices_table', 5),
(83, '2022_11_14_021429_create_contracts_table', 5),
(84, '2022_11_14_021651_create_proposals_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dclient` int(11) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `id_dclient`, `notes`) VALUES
(5, 27, 'example 3'),
(6, 29, 'follow in'),
(7, 25, 'upgrade license'),
(8, 20, 'Not renewing'),
(10, 14, 'tsggh');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prospective_clients`
--

CREATE TABLE `prospective_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prospective_clients`
--

INSERT INTO `prospective_clients` (`id`, `nama_client`) VALUES
(35, 'Lee Bumgarner'),
(36, 'Frisian Flag Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_services` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_services` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `kode_services`, `nama_services`) VALUES
(5, 'INFO - Basic', 'Info Service- Basic'),
(6, 'INFO - Std', 'Info Service - Standard'),
(7, 'INFO - Prem', 'Info Service - Premium'),
(8, 'INFO - Prem+', 'Inforservice Premium +'),
(10, 'CONS', 'Consulting'),
(11, 'DD', 'Due Dilligence'),
(12, 'INV', 'Investigations'),
(13, 'RS', 'Research'),
(14, 'SVA', 'Security Vulnerability Assessment'),
(15, 'SA', 'Security Audit'),
(16, 'SR', 'Security Review'),
(17, 'TARA', 'Threat Assessment Risk Analysis'),
(18, 'TRNG', 'Training'),
(19, 'OTH', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@admin.com', NULL, '$2y$10$z.NlxYRUgh/Q3/Zn/XlHgeEjjjPBAtrEWySJFGJbp0vqZiy9rA3Qm', 0, NULL, '2022-10-11 20:43:19', '2022-10-13 01:08:54'),
(2, 'Finance', 'finance@finance.com', NULL, '$2y$10$J35EGGAGSyF6SLwDp8skq.Upz4YeMJ24QB5ZaR63nOiBdhYbbPMdy', 1, NULL, '2022-10-11 20:43:19', '2022-10-13 00:07:10'),
(3, 'HR', 'hr@hr.com', NULL, '$2y$10$50UA90azwM9tZ10jK9rFdeI4tltRmYNevmz86eru0geZIS3w/dO96', 2, NULL, '2022-10-11 20:43:19', '2022-10-13 00:07:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive_services`
--
ALTER TABLE `archive_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_clients`
--
ALTER TABLE `detail_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_propective_clients`
--
ALTER TABLE `detail_propective_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_notes`
--
ALTER TABLE `log_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_service_clients`
--
ALTER TABLE `log_service_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prospective_clients`
--
ALTER TABLE `prospective_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive_services`
--
ALTER TABLE `archive_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_clients`
--
ALTER TABLE `detail_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `detail_propective_clients`
--
ALTER TABLE `detail_propective_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_notes`
--
ALTER TABLE `log_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log_service_clients`
--
ALTER TABLE `log_service_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prospective_clients`
--
ALTER TABLE `prospective_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
