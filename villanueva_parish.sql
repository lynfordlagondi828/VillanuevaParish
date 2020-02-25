-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2020 at 11:51 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `villanueva_parish`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(10) NOT NULL,
  `series_of` varchar(255) NOT NULL,
  `number` int(10) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `name_of_father` text NOT NULL,
  `name_of_mother` text NOT NULL,
  `present_address` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` text NOT NULL,
  `date_of_baptism` date NOT NULL,
  `baptized_by` text NOT NULL,
  `sponsors` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `series_of`, `number`, `lastname`, `firstname`, `middlename`, `name_of_father`, `name_of_mother`, `present_address`, `date_of_birth`, `place_of_birth`, `date_of_baptism`, `baptized_by`, `sponsors`, `type`, `created_at`) VALUES
(16, '2020', 1, 'Braza', 'Ramgie', 'Mascardo', 'Ferdinand Braza', 'Godofreda Braza', 'Villareal Bayawan City', '1986-01-19', 'Tan - ayan, Nangka Bayawan City', '1986-02-26', 'Father J. Melendres', 'Lynford Lagondi, Eduardo Vasquez, Jaymar Bismanos', 'Baptismal', '2020-02-24 06:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `confirmation`
--

CREATE TABLE `confirmation` (
  `id` int(10) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `name_of_father` varchar(255) NOT NULL,
  `name_of_mother` varchar(255) NOT NULL,
  `address_of_parents` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `confirmed_by` varchar(255) NOT NULL,
  `sponsors` varchar(255) NOT NULL,
  `parish_priest` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirmation`
--

INSERT INTO `confirmation` (`id`, `lastname`, `firstname`, `middlename`, `name_of_father`, `name_of_mother`, `address_of_parents`, `date_of_birth`, `confirmed_by`, `sponsors`, `parish_priest`) VALUES
(9, 'Lagondi', 'Liam Greyson', 'Del Monte', 'Lynford Lagondi', 'Jeah Mae Lagondi', 'Milagrosa, Sta. Catalina, Negros Oriental', '2019-12-30', 'Juan Florencio', 'J.M', 'Juan Florencio');

-- --------------------------------------------------------

--
-- Table structure for table `death`
--

CREATE TABLE `death` (
  `id` int(10) NOT NULL,
  `series` varchar(255) NOT NULL,
  `record_no` int(10) NOT NULL,
  `name_of_deceased` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `residence` text NOT NULL,
  `married_with` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `date_of_death` date NOT NULL,
  `place_of_death` text NOT NULL,
  `date_of_burial` date NOT NULL,
  `place_of_burial` text NOT NULL,
  `minister` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `death`
--

INSERT INTO `death` (`id`, `series`, `record_no`, `name_of_deceased`, `age`, `residence`, `married_with`, `father`, `mother`, `date_of_death`, `place_of_death`, `date_of_burial`, `place_of_burial`, `minister`) VALUES
(1, '2020', 1, 'cccc', '90', '0ghjhgj', 'ghj', 'ghj', 'ghj', '2020-02-11', 'ghjghj', '2020-02-10', 'ghjghj', 'ghj'),
(2, '2020', 2, 'sa', '67', 'tresd', 'hfh', 'fh', 'hgh', '2020-02-18', 'dfgdg', '2020-02-24', 'dfg', 'dfg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `middlename`, `email`, `password`, `date`) VALUES
(1, 'Lagondi', 'Lynford', 'A', 'admin', 'admin', '2020-01-17 07:39:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmation`
--
ALTER TABLE `confirmation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `death`
--
ALTER TABLE `death`
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
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `confirmation`
--
ALTER TABLE `confirmation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `death`
--
ALTER TABLE `death`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
