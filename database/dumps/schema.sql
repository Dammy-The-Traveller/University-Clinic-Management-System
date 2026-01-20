-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2025 at 08:09 AM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lemsass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_technical`
--

DROP TABLE IF EXISTS `admin_technical`;
CREATE TABLE IF NOT EXISTS `admin_technical` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin_technical`
--

INSERT INTO `admin_technical` (`id`, `admin_id`, `gmail`, `user_type`) VALUES
(1, 'ads25a00039y', 'adeissac123@gmai', '1'),
(2, 'abs11a00019y', 'admin26@gmail.com', '2');

-- --------------------------------------------------------

--
-- Table structure for table `admin_verification`
--

DROP TABLE IF EXISTS `admin_verification`;
CREATE TABLE IF NOT EXISTS `admin_verification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_by` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin_verification`
--

INSERT INTO `admin_verification` (`id`, `created_by`, `email`, `token`, `status`, `created_at`, `expires_at`) VALUES
(2, 1, 'adebesin@gmail.com', '305964', 'sent', '2025-04-01 17:35:37.000000', '2025-04-02 17:35:37'),
(3, 1, 'adebesin@gmail.com', '206668', 'sent', '2025-04-01 17:38:23.000000', '2025-04-02 17:38:23'),
(4, 1, 'adebesindamilare39@gmail.com', '601099', 'Used', '2025-04-01 18:23:55.000000', '2025-04-02 18:23:55'),
(7, 1, 'adebesindamilare39@gmail.com', '729174', 'Used', '2025-04-01 19:02:18.000000', '2025-04-02 19:02:18'),
(8, 1, 'adebesindamilare39@gmail.com', '712531', 'Used', '2025-04-01 19:11:02.000000', '2025-04-02 19:11:02'),
(9, 1, 'adebesindamilare75@gmail.com', '142002', 'Used', '2025-04-01 19:34:19.000000', '2025-04-02 19:34:19'),
(10, 1, 'adebesindamilare75@gmail.com', '500118', 'sent', '2025-04-01 19:41:07.000000', '2025-04-02 19:41:07'),
(11, 1, 'adebesindamilare75@gmail.com', '671347', 'sent', '2025-04-01 19:41:36.000000', '2025-04-02 19:41:36'),
(12, 1, 'adebesindamilare75@gmail.com', '644505', 'sent', '2025-04-01 19:44:05.000000', '2025-04-02 19:44:05'),
(13, 3, 'adebesindamilare39@gmail.com', '642923', 'Used', '2025-04-14 14:20:49.000000', '2025-04-15 14:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `program` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` varchar(20) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` time(6) NOT NULL,
  `problem` varchar(20000) NOT NULL,
  `status` varchar(20) NOT NULL,
  `rejection_reason` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `fullname`, `email`, `student_id`, `program`, `gender`, `age`, `phone_number`, `date`, `time`, `problem`, `status`, `rejection_reason`) VALUES
(12, 'DAMILARE DAVID ADEBESIN', 'adebesindamilare39@gmail.com', 'abs11a00006y', 'Computer eng', 'Male', '20', '08115336762', '2025-04-01', '12:20:00.000000', 'pwlentyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'attended-to', 'none'),
(13, 'David Adebesin', 'adebesindamilare39@gmail.com', 'abs11a00018y', 'B.sc Computer Science', 'Male', '20', '0550204207', '2025-04-01', '17:50:00.000000', 'headache and ulcer', 'attended-to', 'come back later'),
(14, 'DAMILARE DAVID ADEBESIN', 'adebesindamilare39@gmail.com', 'abs11a00006y', 'Computer eng', 'Male', '45', '08115336762', '2025-04-14', '17:46:00.000000', 'PLENTY HEADACHE', 'pending', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_code` (`course_code`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `first_name`, `last_name`, `course_code`, `date`, `time_in`) VALUES
(12, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'ENG101', '2024-11-23', '20:54:33'),
(17, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'CS101', '2024-11-24', '00:33:04'),
(21, 'ADS35B67', 'DANI', 'MILO', 'ENG101', '2024-11-24', '09:11:28'),
(23, 'ADS35B67', 'DANI', 'MILO', 'CS101', '2024-11-24', '09:27:51'),
(24, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'ENG101', '2024-11-24', '09:28:21'),
(28, 'ADS35B67', 'DANI', 'MILO', 'CS101', '2024-11-25', '13:56:20'),
(29, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'CS101', '2024-11-27', '21:08:39'),
(30, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'CS101', '2024-11-28', '01:37:45'),
(31, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'CS101', '2024-11-29', '13:35:55'),
(38, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'CS101', '2024-11-30', '23:45:38'),
(45, 'ADS25A00039Y', 'DAMILARE', 'ADEBESIN', 'CS101', '2024-12-03', '02:19:24'),
(46, 'ADS25A00019Y', 'Milo', 'DAVID', 'CS101', '2024-12-03', '02:29:59'),
(50, 'abs11a00008y', 'JENNIFER AKUORKOR', 'ALEO', 'CDES202', '2024-12-05', '16:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_admins`
--

DROP TABLE IF EXISTS `clinic_admins`;
CREATE TABLE IF NOT EXISTS `clinic_admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `block` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `clinic_admins`
--

INSERT INTO `clinic_admins` (`id`, `firstname`, `lastname`, `email`, `password`, `user_type`, `block`) VALUES
(1, 'issabella', 'kudus', 'adebesindamilare309@gmail.com', 'issabella@aitgh', '1', 'N'),
(3, 'AIT', 'ADMIN', 'admin@ait.edu.gh', '$2y$10$gEFZtA5GRh/uHUeFnu1tReHhzltSMby8gJ/tOKD.NwLEm.DpNeHHm', '1', 'N'),
(4, 'Rhode', 'Nkrumeh', 'adebesindamilare39@gmail.com', '$2y$10$El00KtCUpJBw0eJOpvjKMu9bqHjVLsZQfSroVeVqP/OSqfl8Din4y', '2', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

DROP TABLE IF EXISTS `drugs`;
CREATE TABLE IF NOT EXISTS `drugs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `indexnumber` int NOT NULL,
  `drugname` varchar(500) NOT NULL,
  `drugcategory` varchar(100) NOT NULL,
  `drugform` varchar(255) NOT NULL,
  `strength` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `unitprice` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `manufacturer` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `indexnumber`, `drugname`, `drugcategory`, `drugform`, `strength`, `quantity`, `unitprice`, `amount`, `manufacturer`, `date`) VALUES
(1, 37451, 'paracetamol', 'Antivirals', 'tablet and syrup and injection', '700mg', 0, 26.50, 0.00, 'davido ade', '2025-04-28'),
(2, 55620, 'Omprazole', 'Antacids / Anti-ulcer Agents', 'tablet', '600mg', 30, 89.00, 50.00, 'prince', '2025-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `drug_categories`
--

DROP TABLE IF EXISTS `drug_categories`;
CREATE TABLE IF NOT EXISTS `drug_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_date` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `drug_categories`
--

INSERT INTO `drug_categories` (`id`, `category`, `created_date`) VALUES
(1, 'Analgesics (Pain Relievers)', '2025-04-29'),
(2, 'Antibiotics / Antibacterials', '2025-04-29'),
(3, 'Antivirals', '2025-04-29'),
(5, 'Antifungals', '2025-04-29'),
(6, 'Antimalarials', '2025-04-29'),
(7, 'Antipyretics (Fever Reducers)', '2025-04-29'),
(8, 'Antihypertensives', '2025-04-29'),
(9, 'Antidiabetics', '2025-04-29'),
(10, 'Antidepressants', '2025-04-29'),
(11, 'Antipsychotics', '2025-04-29'),
(12, 'Anticonvulsants (Anti-seizure)', '2025-04-29'),
(13, 'Sedatives & Hypnotics', '2025-04-29'),
(14, 'Antacids / Anti-ulcer Agents', '2025-04-29'),
(15, 'Bronchodilators', '2025-04-29'),
(16, 'Antiemetics (Prevent Vomiting)', '2025-04-29'),
(17, 'Laxatives / Purgatives', '2025-04-29'),
(18, 'Contraceptives', '2025-04-29'),
(19, 'Vitamins & Supplements', '2025-04-29'),
(20, 'Steroids', '2025-04-29'),
(21, 'Local Anesthetics', '2025-04-29'),
(22, 'Vaccines', '2025-04-29'),
(23, 'Immunosuppressants', '2025-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `old_prescriptions`
--

DROP TABLE IF EXISTS `old_prescriptions`;
CREATE TABLE IF NOT EXISTS `old_prescriptions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `treatment` varchar(1000) NOT NULL,
  `drug_name` varchar(1000) NOT NULL,
  `dosage` varchar(1000) NOT NULL,
  `notes` varchar(10000) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `old_prescriptions`
--

INSERT INTO `old_prescriptions` (`id`, `firstname`, `lastname`, `student_id`, `email`, `treatment`, `drug_name`, `dosage`, `notes`, `date`) VALUES
(5, 'Issac', 'Netwon', 'ads25a00039y', 'adebesindamilare39@gmail.com', 'Ulcer', 'Omeprazole and Paracetamol', 'Use one tablet one hour before eating, and another one if you are going to bed', 'Please ensure you use your drugs very well', '2025-03-30'),
(7, 'DAMILARE', 'ADEBESIN', 'STF_15397', 'adebesindamilare39@gmail.com', 'ulcer', 'paracetamol', 'One in the morning', 'Use very well', '2025-04-30'),
(8, 'DAMILARE', 'ADEBESIN', 'STF_15397', 'adebesindamilare39@gmail.com', 'ulcer', 'paracetamol', 'One in the morning', 'Use very well', '2025-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

DROP TABLE IF EXISTS `password`;
CREATE TABLE IF NOT EXISTS `password` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_number` varchar(12) DEFAULT NULL,
  `pass1` varchar(10) DEFAULT NULL,
  `pass2` varchar(10) DEFAULT NULL,
  `pass3` varchar(10) DEFAULT NULL,
  `block` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`id`, `id_number`, `pass1`, `pass2`, `pass3`, `block`) VALUES
(1, 'abs11a00006y', '20aitgh', '20aitgh', '20aitgh', 'N'),
(2, 'abs11a00007y', 'aitgh', 'aitgh', 'aitgh', 'N'),
(3, 'abs11a00008y', 'Dgalaxy007', 'Dgalaxy007', 'Dgalaxy007', 'N'),
(4, 'ads25a00039y', '25aitgh', '25aitgh', '25aitgh', 'N'),
(5, 'abs11a00019y', '19aitgh', '19aitgh', '19aitgh', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `gender` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `program` varchar(100) NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) NOT NULL,
  `marital_status` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `blood_group` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `blood_pressure` varchar(50) NOT NULL,
  `sugar_level` varchar(50) NOT NULL,
  `temperature` varchar(255) NOT NULL,
  `pulse` varchar(255) NOT NULL,
  `resp` varchar(255) NOT NULL,
  `spo2` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `symptoms` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `medical_history` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `treatment` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `drug_name` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `drug_index` int NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `dosage` varchar(10000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `notes` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `firstname`, `lastname`, `birthdate`, `gender`, `student_id`, `program`, `country`, `email`, `phone1`, `phone2`, `marital_status`, `blood_group`, `blood_pressure`, `sugar_level`, `temperature`, `pulse`, `resp`, `spo2`, `address`, `symptoms`, `medical_history`, `treatment`, `drug_name`, `drug_index`, `quantity`, `dosage`, `notes`, `date`) VALUES
(6, 'JAMES', 'ADDAE', '1965-06-26', 'male', 'abs11a00006y', 'Accounting And Finance', 'GH', 'addae5@gmail.com', '', '', 'Married', 'A+', '50psi', '50io', '50w', '34ty', '24ro', '30spo2', 'Weija Block Factory', 'cough', 'none', 'ulcer', 'omeprazole', 0, '5', 'one in the night', 'none', '2025-03-31'),
(7, 'Issac', 'Netwon', '1986-01-26', 'male', 'ads25a00039y', 'Computer Science', 'GH', 'adebesindamilare39@gmail.com', '0990506206', '0110204306', 'Married', 'A+', '50mhg', '60sh', '70rt', '20yu', '50my', '20', '2, adewusi street itoki', 'headache', 'Ulcer', 'Ulcer', 'Omeprazole and Paracetamol', 0, '6', 'one in the morning and night', 'use it very well', '2025-04-11'),
(11, 'doko', 'Adminn', '1988-09-13', 'male', 'abs11a00018y', 'Computer Engineering', 'NG', 'adebesindamilare39@gmail.com', '0550304306', '0990405206', 'Married', 'A+', '20', '250', '20', '20yu', '23ty', 'sp09', '2, adewusi street itoki', 'ulcer', 'ulcer', 'Ulcer and typhoid', 'Omeprazole and Paracetamol', 0, '7', 'one in the morning and night', 'use it very well', '2025-04-14'),
(12, 'DAMILARE', 'ADEBESIN', '2025-04-30', 'male', 'STF_15397', 'staff', 'Nigeria', 'adebesindamilare39@gmail.com', '08115336762', '08115336762', 'UnMarried', 'A-', '50psi', '50io', '50w', '34ty', '24ro', '30spo2', '2, adewusi street itoki road og', 'Headache', 'Ulcer', 'ulcer', 'paracetamol', 37451, '5', 'One in the morning', 'Use very well', '2025-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `r_student`
--

DROP TABLE IF EXISTS `r_student`;
CREATE TABLE IF NOT EXISTS `r_student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `birthdate` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `idnumber` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `department` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `proglevel` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `proglevdesc` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `program` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `instid` varchar(254) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `r_student`
--

INSERT INTO `r_student` (`id`, `firstname`, `lastname`, `birthdate`, `idnumber`, `department`, `proglevel`, `proglevdesc`, `program`, `country`, `email`, `instid`, `phone1`, `phone2`) VALUES
(1, 'JAMES ', 'ADDAE', '6/26/1965', 'abs11a00006y', 'Business and Management School', 'BSc', 'Bachelor of Science Degree', 'Accounting And Finance', 'GH', 'addae5@gmail.com', 'ABS', '0550204206', '0440304306'),
(2, 'doko', 'Adminn', '9/13/1988', 'abs11a00018y', 'Business and Management School', 'BSc', 'Bachelor of Science Degree', 'Computer Engineering', 'NG', 'Janiceadoma34@gmil.com', 'ABS', '0550304306', '0990405206'),
(3, 'JENNIFER AKUORKOR', 'ALEO', '1/26/1986', 'abs11a00008y', 'Business and Management School', 'BSc', 'Bachelor of Science Degree', 'Accounting And Finance', 'GH', 'jaleo@ait.edu.gh', 'ABS', '0660407206', '0220305206'),
(4, 'Issac', 'Netwon', '1/26/1986', 'ads25a00039y', 'Advance School of studies', 'BSc', 'Bachelor of Science Degree', 'Computer Science', 'GH', 'adebesindamilare39@gmail.com', 'ADASS', '0990506206', '0110204306'),
(5, 'David', 'Admin', '2/6/2000', 'abs11a00019y', 'Advance School  of studies', 'BSc', '	\nBachelor of Science Degree', 'Computer Engineering', 'NG', 'admin22@gmail.co', 'ADASS', '0770809206', '0330205206');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
