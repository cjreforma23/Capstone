-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2025 at 05:39 PM
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
-- Database: `capstone_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `archived_users`
--

CREATE TABLE `archived_users` (
  `archive_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_num` varchar(20) DEFAULT NULL,
  `role` enum('Admin','Staff','Homeowner','Guard','Guest') NOT NULL,
  `address` text DEFAULT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `archived_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `archived_by` int(11) DEFAULT NULL,
  `reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archived_users`
--

INSERT INTO `archived_users` (`archive_id`, `user_id`, `first_name`, `last_name`, `email`, `phone_num`, `role`, `address`, `gender`, `archived_at`, `archived_by`, `reason`) VALUES
(5, 6, 'Kel', 'Rols', 'Alsb@gmail.com', '09068534395', 'Guard', 'Blk 22 Lot 8 David st Angono Rizal', 'Male', '2025-03-01 19:55:52', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_type` enum('Maintenance','Security','Noise','Violation','Others') NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `priority` enum('Low','Medium','High') DEFAULT 'Medium',
  `status` enum('pending','processing','resolved','closed') DEFAULT 'pending',
  `assigned_to` int(11) DEFAULT NULL,
  `resolution_notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_updates`
--

CREATE TABLE `complaint_updates` (
  `update_id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dues_inclusions`
--

CREATE TABLE `dues_inclusions` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dues_inclusions`
--

INSERT INTO `dues_inclusions` (`id`, `category`, `amount`) VALUES
(1, 'Security and Maintenance', 150.00),
(2, 'Garbage Collection', 50.00),
(3, 'Common Area Maintenance', 60.00),
(4, 'Amenities and Facilities', 40.00),
(5, 'Administrative Costs', 40.00),
(6, 'Utilities for Common Areas', 30.00),
(7, 'Emergency Fund', 30.00);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_dues`
--

CREATE TABLE `monthly_dues` (
  `id` int(11) NOT NULL,
  `homeowner_id` int(11) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT 0.00,
  `payment_proof` varbinary(255) DEFAULT NULL,
  `status` enum('unpaid','pending','verified') DEFAULT 'unpaid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monthly_dues`
--

INSERT INTO `monthly_dues` (`id`, `homeowner_id`, `month`, `year`, `total_amount`, `paid_amount`, `payment_proof`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 2025, 400.00, 0.00, NULL, 'unpaid', '2025-03-04 05:59:59', '2025-03-04 05:59:59'),
(2, 5, 6, 2025, 400.00, 0.00, NULL, 'unpaid', '2025-03-04 06:00:05', '2025-03-04 06:00:05'),
(8, 5, 8, 2025, 400.00, 0.00, NULL, 'unpaid', '2025-03-04 06:04:11', '2025-03-04 06:04:11'),
(9, 5, 4, 2025, 400.00, 0.00, NULL, 'unpaid', '2025-03-04 06:13:25', '2025-03-04 06:13:25'),
(11, 5, 2, 2025, 400.00, 0.00, NULL, 'unpaid', '2025-03-04 06:14:06', '2025-03-04 06:14:06'),
(15, 5, 5, 2025, 400.00, 0.00, NULL, 'unpaid', '2025-03-04 07:22:25', '2025-03-04 07:22:25'),
(17, 5, 9, 2025, 400.00, 0.00, NULL, 'unpaid', '2025-03-04 07:25:11', '2025-03-04 07:25:11'),
(18, 5, 10, 2025, 400.00, 0.00, NULL, 'unpaid', '2025-03-04 07:28:04', '2025-03-04 07:28:04'),
(22, 5, 3, 2025, 400.00, 0.00, NULL, 'unpaid', '2025-03-04 07:35:58', '2025-03-04 07:35:58'),
(28, 5, 11, 2025, 400.00, 0.00, NULL, 'unpaid', '2025-03-04 08:49:53', '2025-03-04 08:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_mode` enum('Cash','Gcash') NOT NULL,
  `payment_type` enum('Full Payment','Down Payment') NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `selected_amenities` text NOT NULL,
  `special_request` text DEFAULT NULL,
  `attendees` text NOT NULL,
  `reservation_date` date NOT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sticker_registrations`
--

CREATE TABLE `sticker_registrations` (
  `sticker_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `color` varchar(30) NOT NULL,
  `plate_number` varchar(20) NOT NULL,
  `old_sticker_number` varchar(50) DEFAULT NULL,
  `is_renewal` tinyint(1) DEFAULT 0,
  `amount` decimal(10,2) NOT NULL,
  `reference_number` varchar(50) DEFAULT NULL,
  `payment_mode` enum('GCash','Cash') NOT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL,
  `status` enum('pending','unpaid','released') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_num` varchar(20) DEFAULT NULL,
  `role` enum('Admin','Staff','Homeowner','Guard','Guest') NOT NULL,
  `address` text DEFAULT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `status` enum('active','archived','suspended') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_num`, `role`, `address`, `gender`, `status`, `created_at`, `updated_at`, `img`) VALUES
(1, 'Julius', 'Reforma', 'cjreforma23@gmail.com', '$2y$10$M7w.6ZgjFkjGK8zu3GgOdeBI.bZcQLpeAHqL9jvr3lcGpBd6PwAh2', '09068534395', 'Admin', 'blk 22 Lot 6 David st. Angono Rizal', 'Male', 'active', '2025-03-01 18:17:08', '2025-03-01 19:46:26', NULL),
(4, 'Andres', 'Axel', 'mystjuju@gmail.com', '$2y$10$DUbIgNs1v3maGZx8S6eOyO6At9SmItnMCuX5uWgB1WzrIKPiqqFTS', '09068534395', 'Staff', 'Blk 22 Lot 6 David st. Angono Rizal', 'Male', 'active', '2025-03-01 18:19:51', '2025-03-01 19:56:50', NULL),
(5, 'Rex', 'Reez', 'cjhulma@gmail.com', '$2y$10$gaybDrYZXpDb27EXtTjPDe5PK1KX1k7CkY6JZtSnAUy2CzbOT9mB2', '09068534395', 'Homeowner', 'Blk 22 Lot 7 David st.', 'Male', 'active', '2025-03-01 18:21:07', '2025-03-01 19:57:05', NULL),
(6, 'Kel', 'Rols', 'Alsb@gmail.com', '$2y$10$RZA5UsyiKMYRdwVevIDG..HWMymK9h/cVHoUHOctSoUy39VDAz052', '09068534395', 'Guard', 'Blk 22 Lot 8 David st Angono Rizal', 'Male', 'archived', '2025-03-01 18:22:21', '2025-03-01 19:57:19', NULL),
(7, 'Shary', 'Reforma', 'Sharry@gmail.com', '$2y$10$TvgNNUgzmdLbiadq82RVn...GT8hHXn1uynOJTfMayfS3uXMMLAgq', '09068534395', 'Guest', 'Blk 22 Lot 3 David st Angono Rizal', 'Female', 'active', '2025-03-01 18:23:10', '2025-03-01 19:57:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archived_users`
--
ALTER TABLE `archived_users`
  ADD PRIMARY KEY (`archive_id`),
  ADD KEY `archived_by` (`archived_by`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `assigned_to` (`assigned_to`);

--
-- Indexes for table `complaint_updates`
--
ALTER TABLE `complaint_updates`
  ADD PRIMARY KEY (`update_id`),
  ADD KEY `complaint_id` (`complaint_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `dues_inclusions`
--
ALTER TABLE `dues_inclusions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_dues`
--
ALTER TABLE `monthly_dues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `month_year_homeowner` (`month`,`year`,`homeowner_id`),
  ADD KEY `homeowner_id` (`homeowner_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sticker_registrations`
--
ALTER TABLE `sticker_registrations`
  ADD PRIMARY KEY (`sticker_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archived_users`
--
ALTER TABLE `archived_users`
  MODIFY `archive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint_updates`
--
ALTER TABLE `complaint_updates`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dues_inclusions`
--
ALTER TABLE `dues_inclusions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `monthly_dues`
--
ALTER TABLE `monthly_dues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sticker_registrations`
--
ALTER TABLE `sticker_registrations`
  MODIFY `sticker_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archived_users`
--
ALTER TABLE `archived_users`
  ADD CONSTRAINT `archived_users_ibfk_1` FOREIGN KEY (`archived_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`);

--
-- Constraints for table `complaint_updates`
--
ALTER TABLE `complaint_updates`
  ADD CONSTRAINT `complaint_updates_ibfk_1` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`complaint_id`),
  ADD CONSTRAINT `complaint_updates_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `monthly_dues`
--
ALTER TABLE `monthly_dues`
  ADD CONSTRAINT `monthly_dues_ibfk_1` FOREIGN KEY (`homeowner_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sticker_registrations`
--
ALTER TABLE `sticker_registrations`
  ADD CONSTRAINT `sticker_registrations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
