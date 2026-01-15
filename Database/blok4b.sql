-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Jan 15, 2026 at 09:48 AM
-- Server version: 10.4.34-MariaDB-1:10.4.34+maria~ubu2004
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blok4b`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `Id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `housenumber` varchar(25) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `Id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `medium` varchar(255) NOT NULL,
  `year_created` year(4) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `added_at` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `dimensions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`Id`, `title`, `artist`, `description`, `medium`, `year_created`, `image`, `added_at`, `price`, `dimensions`) VALUES
(1, 'Silent Horizon', 'Emma Laurent', 'A calm abstract landscape inspired by dawn light.', 'Oil on Canvas', '2018', '/images/silent_horizon.jpg', '2026-01-13 ', '1200.00', '80 x 60 cm'),
(2, 'Urban Echoes', 'Daniel Moore', 'Modern city life expressed through bold geometry.', 'Acrylic on Canvas', '2020', '/images/urban_echoes.jpg', '2026-01-13', '950.00', '70 x 50 cm'),
(3, 'Golden Bloom', 'Sophia Reed', 'Floral composition with warm golden tones.', 'Oil on Canvas', '2017', '/images/golden_bloom.jpg', '2026-01-13', '780.00', '60 x 60 cm'),
(4, 'Blue Solitude', 'Lucas Marin', 'Minimalist seascape capturing isolation and peace.', 'Acrylic on Canvas', '2019', 'images/blue_solitude.jpg', '2026-01-13', '1100.00', '90 x 60 cm'),
(5, 'Whispering Forest', 'Nina Volkova', 'Deep forest scene with layered greens and shadows.', 'Oil on Canvas', '2016', 'images/whispering_forest.jpg', '2026-01-13 ', '1500.00', '100 x 70 cm'),
(6, 'Crimson Motion', 'Ethan Cole', 'Abstract movement using red and black contrasts.', 'Mixed Media', '2021', 'images/crimson_motion.jpg', '2026-01-13', '1300.00', '85 x 65 cm'),
(7, 'Still Life with Pears', 'Isabella Conti', 'Classic still life with soft natural lighting.', 'Oil on Canvas', '2015', 'images/still_life_pears.jpg', '2026-01-13', '650.00', '50 x 40 cm'),
(8, 'Neon Streets', 'Alex Turner', 'Night city scene illuminated by neon signs.', 'Digital Art Print', '2022', 'images/neon_streets.jpg', '2026-01-13', '500.00', '60 x 40 cm'),
(9, 'Autumn Path', 'Hannah White', 'A quiet path through autumn woods.', 'Watercolor', '2018', 'images/autumn_path.jpg', '2026-01-13', '720.00', '55 x 35 cm'),
(10, 'Desert Mirage', 'Omar Al-Fayed', 'Surreal desert landscape with distorted light.', 'Oil on Canvas', '2019', 'images/desert_mirage.jpg', '2026-01-13', '1400.00', '90 x 70 cm'),
(11, 'Fragments of Time', 'Claire Dubois', 'Abstract exploration of memory and time.', 'Mixed Media', '2020', 'images/fragments_of_time.jpg', '2026-01-13', '1250.00', '80 x 60 cm'),
(12, 'Mountain Silence', 'Jonas Berg', 'Snow-covered mountains under a pale sky.', 'Oil on Canvas', '2016', 'images/mountain_silence.jpg', '2026-01-13', '1600.00', '110 x 80 cm'),
(13, 'Red Umbrella', 'Maya Chen', 'Lonely figure walking in the rain.', 'Acrylic on Canvas', '2021', 'images/red_umbrella.jpg', '2026-01-13', '980.00', '75 x 55 cm'),
(14, 'Cosmic Drift', 'Ryan Patel', 'Abstract space-inspired composition.', 'Digital Art Print', '2023', 'images/cosmic_drift.jpg', '2026-01-13', '600.00', '70 x 50 cm'),
(15, 'Old Harbor', 'Peter Kowalski', 'Historic harbor with boats and reflections.', 'Oil on Canvas', '2014', 'images/old_harbor.jpg', '2026-01-13', '1700.00', '120 x 80 cm'),
(16, 'Soft Morning', 'Laura Bennett', 'Sunlight entering a quiet bedroom.', 'Oil on Canvas', '2017', 'images/soft_morning.jpg', '2026-01-13', '850.00', '65 x 45 cm'),
(17, 'Abstract No. 5', 'Victor Ramos', 'Bold abstract shapes and colors.', 'Acrylic on Canvas', '2022', 'images/abstract_no5.jpg', '2026-01-13', '900.00', '80 x 80 cm'),
(18, 'Winter Road', 'Elena Petrova', 'Lonely road through a snowy landscape.', 'Oil on Canvas', '2018', 'images/winter_road.jpg', '2026-01-13', '1150.00', '90 x 60 cm'),
(19, 'Glass Reflections', 'Mark Jensen', 'Architectural reflections in glass buildings.', 'Photography Print', '2020', 'images/glass_reflections.jpg', '2026-01-13', '700.00', '60 x 40 cm'),
(20, 'Quiet Lake', 'Anna Muller', 'Still lake surrounded by misty hills.', 'Oil on Canvas', '2016', 'images/quiet_lake.jpg', '2026-01-13', '1350.00', '100 x 70 cm');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Id` int(11) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Id` int(11) NOT NULL,
  `member_number` varchar(255) NOT NULL,
  `last_login_date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `address_id` (`address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`Id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`Id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`address_id`) REFERENCES `address` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
