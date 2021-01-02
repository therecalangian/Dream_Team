-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 09:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectlsims`
--

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `generic_name` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `purpose` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `expedited` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `exp_sample` date NOT NULL,
  `exp_standard` date NOT NULL,
  `company_address` varchar(100) DEFAULT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `mobile_number` varchar(11) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `purpose_others` varchar(100) DEFAULT NULL,
  `procedure_drug_assay` int(1) DEFAULT NULL,
  `coa_finished_product` int(1) DEFAULT NULL,
  `coa_reference_standard` int(1) DEFAULT NULL,
  `lot_number` int(11) DEFAULT NULL,
  `drp_number` int(11) DEFAULT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `distributor` varchar(100) DEFAULT NULL,
  `manufacturing_date` date DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `purity` int(3) DEFAULT NULL,
  `batch_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `date_added`, `generic_name`, `brand_name`, `company`, `purpose`, `quantity`, `expedited`, `active`, `exp_sample`, `exp_standard`, `company_address`, `contact_person`, `mobile_number`, `email_address`, `purpose_others`, `procedure_drug_assay`, `coa_finished_product`, `coa_reference_standard`, `lot_number`, `drp_number`, `manufacturer`, `distributor`, `manufacturing_date`, `name`, `purity`, `batch_number`) VALUES
(4, '2020-11-19', 'Meropenem', 'Expinem', 'Bio Care', 1, 1, 1, 1, '2020-12-03', '2020-11-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
