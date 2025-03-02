-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 01:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `APP_ID` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `PAT_ID` int(11) NOT NULL,
  `START_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `END_TIME` timestamp NULL DEFAULT current_timestamp(),
  `APP_MED` varchar(1000) NOT NULL,
  `APP_DETAIL` varchar(1000) DEFAULT NULL,
  `TOTAL_COST` float DEFAULT NULL,
  `AMOUNT_PAID` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`APP_ID`, `EMP_ID`, `PAT_ID`, `START_TIME`, `END_TIME`, `APP_MED`, `APP_DETAIL`, `TOTAL_COST`, `AMOUNT_PAID`) VALUES
(69, 27, 4, '2022-01-12 01:01:00', '2022-01-12 04:00:00', 'Nitrous oxide,Bupivacaine,Propofol', 'doctor notes', 20, 50),
(70, 32, 5, '2022-01-11 06:02:00', '2022-01-11 07:03:00', 'Isoflurane,Ketamine', 'covid', 23.2, 50.5),
(71, 34, 4, '2022-01-11 21:05:00', '2022-01-15 00:08:00', 'Isoflurane,Loperamide,Methylthioninium chloride (methylene blue)', 'stomachache', 23, 51),
(73, 31, 6, '2022-01-12 06:02:00', '2022-01-12 13:09:00', 'Isoflurane,Dihydrocodeine tartrate,Dexamethasone', 'major headache', 20, 30),
(74, 32, 5, '2022-01-12 06:03:00', NULL, '', NULL, NULL, NULL),
(75, 32, 6, '2022-01-11 21:05:00', '2022-01-11 21:30:00', 'Nitrous oxide,Propofol,Bupivacaine', 'covid', NULL, NULL),
(76, 31, 1, '2022-01-18 21:05:00', '2022-01-19 08:04:00', 'Propofol', 'sakit kepala', NULL, NULL),
(77, 32, 3, '2022-01-18 21:05:00', '2022-01-19 08:04:00', 'Lignocaine', 'covid', NULL, NULL),
(78, 34, 3, '2022-01-18 08:04:00', '2022-01-18 09:05:00', 'Nitrous oxide,Propofol', 'covid', 20.5, 30),
(79, 32, 5, '2022-01-19 01:00:00', '2022-01-19 02:00:00', 'Ketamine,Nitrous oxide', 'notes', 56, 87),
(80, 32, 13, '2022-01-18 20:04:00', '2022-01-18 21:05:00', 'Ketamine,Propofol,Lignocaine', 'rerere', 56, 85.2);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `DOCT_ID` int(11) NOT NULL,
  `DOCT_NAME` varchar(200) NOT NULL,
  `DOCT_FILE_PATH` varchar(255) NOT NULL,
  `DOCT_TYPE` varchar(100) NOT NULL,
  `DOCT_DESC` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`DOCT_ID`, `DOCT_NAME`, `DOCT_FILE_PATH`, `DOCT_TYPE`, `DOCT_DESC`) VALUES
(29, 'www', 'file/DITP2313_DoubleOracleAccount_newWorkspace3.pdf', 'Medical Insurance', 'cccsdcsd'),
(31, 'invoice i guess', 'file/Generate Invoice.pdf', 'Invoice', 'patient covid'),
(38, 'ainnn', 'file/Generate_MC_patient_admin.php.pdf', 'Invoice', 'yryrryyr');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMP_ID` int(11) NOT NULL,
  `EMP_FULLNAME` varchar(200) NOT NULL,
  `EMP_USERNAME` varchar(200) NOT NULL,
  `EMP_PASSWORD` varchar(200) NOT NULL,
  `EMP_PHONE` int(200) NOT NULL,
  `EMP_EMAIL` varchar(200) NOT NULL,
  `EMP_POS` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `EMP_FULLNAME`, `EMP_USERNAME`, `EMP_PASSWORD`, `EMP_PHONE`, `EMP_EMAIL`, `EMP_POS`) VALUES
(3, 'SUZY LIM', 'SUZY', '123', 236597845, 'SUZY@GMAIL.COM', 'staff'),
(5, 'LILY ABDULLAH', 'LILY', '123', 2147483647, 'LILY@GMAIL.COM', 'admin'),
(16, 'admin2', 'admin2', 'vv', 105152210, 'vv@yahoo.com', 'admin'),
(30, 'admin 1', 'admin', 'admin', 232323232, 'admin@yahoo.com', 'admin'),
(31, 'azam', 'azam', 'azam', 7877887, 'azam@yahoo.com', 'doctor'),
(32, 'haris', 'haris', 'haris', 52525252, 'haris@yahoo.com', 'doctor'),
(33, 'amin', 'amin', 'amin', 202065262, 'amin@yahoo.co', 'staff'),
(34, 'aisyah', 'aisyah', 'aisyah', 127975868, 'aisyah@yahoo.com', 'doctor'),
(35, 'sejana', 'sejana', '123', 105153326, 'sejana@yahoo.com', 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `med_inventory`
--

CREATE TABLE `med_inventory` (
  `MED_ID` int(11) NOT NULL,
  `MED_NAME` varchar(200) NOT NULL,
  `MED_DESC` varchar(2000) DEFAULT NULL,
  `DOSAGE_FORM` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `med_inventory`
--

INSERT INTO `med_inventory` (`MED_ID`, `MED_NAME`, `MED_DESC`, `DOSAGE_FORM`) VALUES
(1, 'Isoflurane', NULL, 'Inhalation'),
(2, 'Nitrous oxide', NULL, 'Inhalation'),
(3, 'Ketamine', NULL, ''),
(4, 'Propofol', 'Thiopental may be used as an\r\nalternative depending on availability\r\nand cost', ''),
(5, 'Bupivacaine', NULL, ''),
(6, 'Lignocaine', NULL, 'inhalation'),
(7, 'Lidocaine + epinephrine', NULL, ''),
(8, 'Ephedrine', NULL, ''),
(9, 'Atropine', NULL, ''),
(10, 'Midazolam', NULL, ''),
(11, 'Morphine', NULL, ''),
(12, 'Oxygen', 'No more than 30% oxygen should be\r\nused to initiate resuscitation of\r\nneonates less than or equal to 32 weeks\r\nof gestation', ''),
(13, 'Acetylsalicylic acid', NULL, ''),
(14, 'Ibuprofen', ' > 3 months', ''),
(15, 'Paracetamol', 'Not recommended for antiinflammatory use due to lack of\r\nproven benefit to that effect', ''),
(16, 'Fentanyl', 'For the management of cancer pain', ''),
(17, 'Morphine', '', ''),
(18, 'Oxycodone', 'Alternative to morphine for patient\r\nwith severe morphine intolerance', ''),
(19, 'Tramadol', '> 12 years', ''),
(20, 'Dihydrocodeine tartrate', '', ''),
(21, 'Amitriptyline', '', ''),
(22, 'Dexamethasone', '', ''),
(23, 'Diazepam', '', ''),
(24, 'Fluoxetine', '> 8 years old', ''),
(25, 'Haloperidol', '', ''),
(26, 'Hyoscine butylbromide', '', ''),
(27, 'hyoscine hydrobromide', '', ''),
(28, 'Lactulose', '', ''),
(29, 'Loperamide', '', ''),
(30, 'Lorazepam', '', ''),
(31, 'Metoclopramide', 'Not for neonates', ''),
(32, 'Midazolam', '', ''),
(33, 'Ondansetron', '> 1 month', ''),
(34, 'Gabapentin', '', ''),
(35, 'Chlorpheniramine', '> 2 years', ''),
(36, 'Dexamethasone\r\n', '', ''),
(37, 'Epinephrine (adrenaline)\r\n', '', ''),
(38, 'Hydrocortisone\r\n', '', ''),
(39, 'Loratadine\r\n', '', ''),
(40, 'Prednisolone', '', ''),
(41, 'Charcoal, activated', '', ''),
(42, 'Acetylcysteine', '', ''),
(43, 'Atropine', '', ''),
(44, 'Calcium gluconate', '', ''),
(45, 'Flumazenil', '', ''),
(46, 'Methylthioninium chloride\r\n(methylene blue)', '', ''),
(47, 'Naloxone', '', ''),
(48, 'Penicillamine', '', ''),
(49, 'Pralidoxime', '', ''),
(50, 'Sodium nitrite', '', ''),
(51, 'Sodium thiosulfate', '', ''),
(52, 'Deferoxamine', '', ''),
(53, 'Dimercaprol', '', ''),
(54, 'Carbamazepine\r\n', '', ''),
(55, 'Diazepam\r\n\r\n\r\n', '', ''),
(56, 'Lamotrigine\r\n', 'As adjunctive therapy for treatmentresistant partial or generalised seizures', ''),
(57, 'Magnesium sulphate\r\n\r\n', 'For use in eclampsia or severe preeclampsia and not for other convulsant\r\ndisorders', ''),
(58, 'Phenobarbital\r\n', '', ''),
(59, 'Phenytoin\r\n', '', ''),
(60, 'Valproic acid\r\n(sodium valproate)', '', ''),
(61, 'Valproic acid\r\n(sodium valproate)', '', ''),
(62, 'Albendazole', '', ''),
(63, 'Diethylcarbamazine', '', ''),
(64, 'Hyoscine butylbromide', NULL, ''),
(65, 'hyoscine hydrobromide', NULL, ''),
(66, 'Lactulose', NULL, ''),
(67, 'Loperamide', NULL, ''),
(68, 'Lorazepam', NULL, ''),
(69, 'Metoclopramide', 'Not for neonates', ''),
(70, 'Midazolam', NULL, ''),
(71, 'Ondansetron', '> 1 month', ''),
(72, 'Gabapentin', NULL, ''),
(73, 'Chlorpheniramine', '> 2 years', ''),
(74, 'Dexamethasone', NULL, ''),
(75, 'Epinephrine (adrenaline)', NULL, ''),
(76, 'Hydrocortisone', NULL, ''),
(78, 'Prednisolone', NULL, ''),
(79, 'Charcoal, activated', NULL, ''),
(80, 'Acetylcysteine', NULL, ''),
(81, 'Atropine', NULL, ''),
(82, 'Calcium gluconate', NULL, ''),
(83, 'Flumazenil', NULL, ''),
(84, 'Methylthioninium chloride\r\n(methylene blue)', NULL, ''),
(85, 'Naloxone', NULL, ''),
(86, 'Penicillamine', NULL, ''),
(87, 'Pralidoxime', NULL, ''),
(88, 'Sodium nitrite', NULL, ''),
(89, 'Sodium thiosulfate', NULL, ''),
(90, 'Deferoxamine', NULL, ''),
(91, 'Dimercaprol', NULL, ''),
(93, 'Diazepam', NULL, ''),
(94, 'Lamotrigine', 'As adjunctive therapy for treatmentresistant partial or generalised seizures', ''),
(95, 'Magnesium sulphate', 'For use in eclampsia or severe preeclampsia and not for other convulsant\r\ndisorders', ''),
(96, 'Phenobarbital', NULL, ''),
(97, 'Phenytoin', NULL, ''),
(98, 'Valproic acid\r\n(sodium valproate)', NULL, ''),
(99, 'Valproic acid\r\n(sodium valproate)', NULL, ''),
(100, 'Albendazole', NULL, ''),
(101, 'Diethylcarbamazine', NULL, ''),
(102, 'Amikacin', NULL, ''),
(103, 'Amoxycillin', NULL, ''),
(104, 'Amoxycillin + clavulanic acid', NULL, ''),
(105, 'Ampicillin', NULL, ''),
(106, 'Benzathine benzylpenicillin', NULL, ''),
(107, 'Benzylpenicillin', NULL, ''),
(108, 'Cefazolin', '> 1 month', ''),
(109, 'Cephalexin', NULL, ''),
(110, 'Cloxacillin', NULL, ''),
(111, 'Doxycycline', 'Use in children < 8 years only\r\nfor life-threatening infections\r\nwhen no alternative exists', ''),
(112, 'Erythromycin', NULL, ''),
(113, 'Gentamicin', NULL, ''),
(114, 'Hyoscine butylbromide', NULL, ''),
(115, 'hyoscine hydrobromide', NULL, ''),
(116, 'Lactulose', NULL, ''),
(117, 'Loperamide', NULL, ''),
(118, 'Lorazepam', NULL, ''),
(119, 'Metoclopramide', 'Not for neonates', ''),
(120, 'Midazolam', NULL, ''),
(121, 'Ondansetron', '> 1 month', ''),
(122, 'Gabapentin', NULL, ''),
(123, 'Chlorpheniramine', '> 2 years', ''),
(124, 'Dexamethasone', NULL, ''),
(125, 'Epinephrine (adrenaline)', NULL, ''),
(126, 'Hydrocortisone', NULL, ''),
(127, 'Loratadine', NULL, ''),
(128, 'Prednisolone', NULL, ''),
(129, 'Charcoal, activated', NULL, ''),
(130, 'Acetylcysteine', NULL, ''),
(131, 'Atropine', NULL, ''),
(132, 'Calcium gluconate', NULL, ''),
(133, 'Flumazenil', NULL, ''),
(134, 'Methylthioninium chloride\r\n(methylene blue)', NULL, ''),
(135, 'Naloxone', NULL, ''),
(136, 'Penicillamine', NULL, ''),
(137, 'Pralidoxime', NULL, ''),
(138, 'Sodium nitrite', NULL, ''),
(139, 'Sodium thiosulfate', NULL, ''),
(140, 'Deferoxamine', NULL, ''),
(141, 'Dimercaprol', NULL, ''),
(142, 'Carbamazepine', NULL, ''),
(143, 'Diazepam', NULL, ''),
(144, 'Lamotrigine', 'As adjunctive therapy for treatmentresistant partial or generalised seizures', ''),
(145, 'Magnesium sulphate', 'For use in eclampsia or severe preeclampsia and not for other convulsant\r\ndisorders', ''),
(146, 'Phenobarbital', NULL, ''),
(147, 'Phenytoin', NULL, ''),
(148, 'Valproic acid\r\n(sodium valproate)', NULL, ''),
(149, 'Valproic acid\r\n(sodium valproate)', NULL, ''),
(150, 'Albendazole', NULL, ''),
(151, 'Diethylcarbamazine', NULL, ''),
(152, 'Amikacin', NULL, ''),
(153, 'Amoxycillin', NULL, ''),
(154, 'Amoxycillin + clavulanic acid', NULL, ''),
(155, 'Ampicillin', NULL, ''),
(156, 'Benzathine benzylpenicillin', NULL, ''),
(157, 'Benzylpenicillin', NULL, ''),
(158, 'Cefazolin', '> 1 month', ''),
(159, 'Cephalexin', NULL, ''),
(160, 'Cloxacillin', NULL, ''),
(161, 'Doxycycline', 'Use in children < 8 years only\r\nfor life-threatening infections\r\nwhen no alternative exists', ''),
(162, 'Erythromycin', NULL, ''),
(163, 'Gentamicin', NULL, ''),
(191, 'Lignocaine', NULL, 'oral'),
(192, 'Lignocaine', NULL, 'injection');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `PAT_ID` int(11) NOT NULL,
  `PAT_NAME` varchar(200) NOT NULL,
  `PAT_PHONE` int(200) NOT NULL,
  `PAT_EMAIL` varchar(200) NOT NULL,
  `PAT_ADDRESS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PAT_ID`, `PAT_NAME`, `PAT_PHONE`, `PAT_EMAIL`, `PAT_ADDRESS`) VALUES
(1, 'nazif desa', 123654789, 'nazif@hotmail.com', 'Plo412 Jln Tembaga 1 Kaw Perindustrian Pasir Gudang 81700 Pasir Gudang Pasir Gudang Johor 81700 Mala\r\n, Johor, 81700'),
(2, 'Rain Mist', 2147483647, 'dredevil@yahoo.com', '4 JLN MUAR KAW 19 41400 41400 Malaysia\r\nKlang, Selangor, 41400'),
(3, 'Fund Grube', 63848264, 'fundgrube@rmune.com', 'Su866 Jln Bandar Baru 1 78300 Masjid Tanah Masjid Tanah Malacca 78300 Malaysia Masjid Tanah Melaka 7'),
(4, 'samva nessche', 43979730, 'samvanessche@outluk.co', '15 Jln Todak 2 Pusatbandar 13700 Seberang Jaya Seberang Jaya Penang 13700 Malaysia Seberang Jaya Pen'),
(5, 'sarah amirah', 12365598, 'sarahamirah@yahoo.com', '193B Jln Tok Kesop(Pekan Jitra 2) 06000 Jitra Jitra Kedah 06000 Malaysia Jitra Kedah 06000 Malaysia'),
(6, 'Kumar Sam', 57762346, 'saxophoneguy7@mailfy.tk', '4314 Jln Kota Lama Kiri Kampung Simpang Penaga 33000 Kuala Kangsar Kuala Kangsar Perak 33000 johor'),
(10, 'patient 1', 2147483647, 'patient@gmail.com', 'insert addreesssss hereee'),
(13, 'ainn', 44555, 'ain@yahoo.com', '4 JLN  19 41400 41400 Malaysia Klang, Selangor, 41400');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `POS_ID` int(11) NOT NULL,
  `POS_NAME` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`POS_ID`, `POS_NAME`) VALUES
(1, 'DOCTOR'),
(2, 'admin'),
(3, 'PHARMACY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`APP_ID`),
  ADD KEY `PAT_ID` (`PAT_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`) USING BTREE;

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`DOCT_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMP_ID`) USING BTREE;

--
-- Indexes for table `med_inventory`
--
ALTER TABLE `med_inventory`
  ADD PRIMARY KEY (`MED_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PAT_ID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`POS_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `APP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `DOCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `med_inventory`
--
ALTER TABLE `med_inventory`
  MODIFY `MED_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `PAT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `POS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
