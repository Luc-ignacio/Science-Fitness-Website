-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/

--
-- Database: `science_fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` enum('admin','trainer','member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `position`) VALUES
(1, 'admin', '$2y$10$oBrn7xrrfVGpw0g7dFgp0u/yWCqj5.lSw4uWzpsxgV8LR6kZkxPUq', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(1, 'Cardio Killer'),
(2, 'Strength Surge'),
(3, 'Flex & Flow'),
(4, 'Dance Fit'),
(6, 'Relaxing Yoga');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `id` int(11) NOT NULL,
  `exercise` varchar(255) NOT NULL,
  `equipment` varchar(255) NOT NULL,
  `sets` varchar(100) NOT NULL,
  `reps` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`id`, `exercise`, `equipment`, `sets`, `reps`) VALUES
(1, 'Dumbbell bench press', 'Bench, dumbbells', '3', '8, 10, 12'),
(2, 'Lat pulldown', 'Adjustable cable machine, lat pulldown bar', '3', '8, 10, 12'),
(3, 'Overhead dumbbell press', 'Dumbbells', '3', '8, 10, 12'),
(4, 'Leg press', 'Leg press', '3', '8, 10, 12'),
(5, 'Lying leg curl', 'Lying leg curl', '3', '8, 10, 12'),
(6, 'Rope press down', 'Adjustable cable machine, rope attachment', '3', '8, 10, 12'),
(7, 'Barbell biceps curl', 'Barbell', '3', '8, 10, 12'),
(8, 'Standing calf raise', 'Box', '', '8, 10, 12'),
(9, 'Crunch', 'No equipment', '', '15');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `password`) VALUES
(1, 'karl', '$2y$10$KYBBvJaEu6N.NNurU8bCIOqAfqKKLU87ckzDf6aR/vy9PjwgdsfJK'),
(2, 'jack', '$2y$10$Rog791DCMk983Vnz3FV1gOrAAY66shWOkO3fxssIzRAt.C8lfVJou'),
(3, 'david', '$2y$10$OPOF/zZQdVZIL.DTjksG6.ZNu1ZbRhaPbItzVJ95y7j2rM9RsAxtS'),
(4, 'elisa', '$2y$10$Yxsd87ussOhmAdLEV6xcF.PoPkcJ7zIYLizbiSRUPAxahRvLH/l6C');

-- --------------------------------------------------------

--
-- Table structure for table `member_to_class`
--

CREATE TABLE `member_to_class` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_to_class`
--

INSERT INTO `member_to_class` (`id`, `member_id`, `class_id`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `member_to_exercise`
--

CREATE TABLE `member_to_exercise` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_to_exercise`
--

INSERT INTO `member_to_exercise` (`id`, `member_id`, `exercise_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` enum('admin','trainer','member','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id`, `name`, `password`, `position`) VALUES
(1, 'yasmin', '$2y$10$RWlv6/RiZuU/3FiQGOV0LeQfOEJ3CknO2VKxbCRs8t9qmaZYuZ7yS', 'trainer'),
(2, 'guilherme', '$2y$10$c99h0.ZeXGJqYvh5OzbxseG7xDjpKx.CvKCES9/OhfdptlOetKch.', 'trainer');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_to_class`
--

CREATE TABLE `trainer_to_class` (
  `id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer_to_class`
--

INSERT INTO `trainer_to_class` (`id`, `trainer_id`, `class_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_to_class`
--
ALTER TABLE `member_to_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_to_exercise`
--
ALTER TABLE `member_to_exercise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_to_class`
--
ALTER TABLE `trainer_to_class`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member_to_class`
--
ALTER TABLE `member_to_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_to_exercise`
--
ALTER TABLE `member_to_exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainer_to_class`
--
ALTER TABLE `trainer_to_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;
