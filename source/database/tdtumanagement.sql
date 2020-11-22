-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 07:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdtumanagement`
--
CREATE DATABASE tdtumanagement;
USE tdtumanagement;
-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `backgrounds`
--

CREATE TABLE `backgrounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_student` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_teacher` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `relationship` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resident` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workplace` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disciplines`
--

CREATE TABLE `disciplines` (
  `id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_student` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_teacher` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `announcement/decision` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `reason` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `semester` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `signing` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `created_at`, `updated_at`) VALUES
('05', 'Công nghệ thông tin', '2020-11-22 10:39:24', '2020-11-22 10:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_training` bigint(20) UNSIGNED NOT NULL,
  `id_faculty` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `date_graduation` date NOT NULL,
  `date_admission` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `id_training`, `id_faculty`, `date_graduation`, `date_admission`, `created_at`, `updated_at`) VALUES
(1, '16050310', 1, '05', '2021-12-31', '2016-08-14', '2020-11-22 10:40:00', '2020-11-22 10:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(169, '2014_10_12_000000_create_users_table', 1),
(170, '2014_10_12_100000_create_password_resets_table', 1),
(171, '2019_08_19_000000_create_failed_jobs_table', 1),
(172, '2020_11_12_185001_create_announcements_table', 1),
(173, '2020_11_12_185023_create_roles_table', 1),
(174, '2020_11_12_185117_create_users_roles_table', 1),
(175, '2020_11_12_185140_create_training_programs_table', 1),
(176, '2020_11_12_185153_create_faculties_table', 1),
(177, '2020_11_12_185208_create_groups_table', 1),
(178, '2020_11_12_185218_create_teachers_table', 1),
(179, '2020_11_12_185233_create_students_table', 1),
(180, '2020_11_12_185244_create_backgrounds_table', 1),
(181, '2020_11_12_185254_create_policies_table', 1),
(182, '2020_11_12_185313_create_disciplines_table', 1),
(183, '2020_11_22_175549_create_subjects_table', 2),
(184, '2020_11_22_175857_create_scores_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_student` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_teacher` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `score` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_group` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user.png',
  `firstname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `place_of_birth` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `origin` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kin` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_number` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `place_of_id_number` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `talents` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `incomes` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_union` date DEFAULT NULL,
  `date_of_communist` date DEFAULT NULL,
  `date_of_student_union` date DEFAULT NULL,
  `date_of_dormitory` date DEFAULT NULL,
  `room_of_dormitory` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `military` bigint(20) NOT NULL DEFAULT 0,
  `volunteer` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `id_group`, `avatar`, `firstname`, `middlename`, `lastname`, `birthday`, `place_of_birth`, `origin`, `gender`, `phone`, `address`, `email`, `religion`, `kin`, `id_number`, `place_of_id_number`, `nationality`, `major`, `talents`, `incomes`, `career`, `description`, `date_of_union`, `date_of_communist`, `date_of_student_union`, `date_of_dormitory`, `room_of_dormitory`, `military`, `volunteer`, `created_at`, `updated_at`) VALUES
('51600072', 1, 'user.png', 'Nguyễn', 'Châu Thảo', 'Quân', '1996-08-11', 'Thành phố Hồ Chí Minh', 'Thành phố Hồ Chí Minh', 'Male', '0938706433', '183B/25/24B đường Tôn Thất Thuyết Phường 04 Quận 04', 'thaoquannguyenchau1996@gmail.com', 'Phật', 'Kinh', '079096013733', 'Thành phố Hồ Chí Minh', 'VN', 'Khoa học máy tính', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2020-11-22 10:42:14', '2020-11-22 10:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `credits` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_faculty` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user.png',
  `firstname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `place_of_birth` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `origin` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `academic_rank` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `degree` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `kin` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_number` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `place_of_id_number` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `talents` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `incomes` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_union` date DEFAULT NULL,
  `date_of_communist` date DEFAULT NULL,
  `date_of_student_union` date DEFAULT NULL,
  `military` bigint(20) DEFAULT NULL,
  `volunteer` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `id_faculty`, `avatar`, `firstname`, `middlename`, `lastname`, `birthday`, `place_of_birth`, `origin`, `gender`, `phone`, `address`, `email`, `academic_rank`, `degree`, `religion`, `kin`, `id_number`, `place_of_id_number`, `nationality`, `talents`, `incomes`, `career`, `description`, `date_of_union`, `date_of_communist`, `date_of_student_union`, `military`, `volunteer`, `created_at`, `updated_at`) VALUES
('123456', '05', 'user.png', 'Đặng', 'Minh', 'Thắng', '1986-01-01', 'Thành phố Hồ Chí Minh', 'Thành phố Hồ Chí Minh', 'Male', '0938706433', '183B/25/24B đường Tôn Thất Thuyết Phường 04 Quận 04', 'thaoquannguyenchau1996@gmail.com', NULL, 'Thạc sĩ', 'Phật', 'Kinh', '079096013733', 'Thành phố Hồ Chí Minh', 'VN', 'Bơi lội', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-22 10:50:37', '2020-11-22 10:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `training_programs`
--

CREATE TABLE `training_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `system` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `training_programs`
--

INSERT INTO `training_programs` (`id`, `name`, `system`, `created_at`, `updated_at`) VALUES
(1, 'Chương trình chất lượng cao', 'Đại học', '2020-11-22 10:40:00', '2020-11-22 10:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id_user` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `backgrounds_id_student_foreign` (`id_student`),
  ADD KEY `backgrounds_id_teacher_foreign` (`id_teacher`);

--
-- Indexes for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disciplines_id_student_foreign` (`id_student`),
  ADD KEY `disciplines_id_teacher_foreign` (`id_teacher`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculties_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_id_training_foreign` (`id_training`),
  ADD KEY `groups_id_faculty_foreign` (`id_faculty`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `policies_id_student_foreign` (`id_student`),
  ADD KEY `policies_id_teacher_foreign` (`id_teacher`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_id_group_foreign` (`id_group`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_id_faculty_foreign` (`id_faculty`);

--
-- Indexes for table `training_programs`
--
ALTER TABLE `training_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD KEY `users_roles_id_user_foreign` (`id_user`),
  ADD KEY `users_roles_id_role_foreign` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `backgrounds`
--
ALTER TABLE `backgrounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_programs`
--
ALTER TABLE `training_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD CONSTRAINT `backgrounds_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `backgrounds_id_teacher_foreign` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD CONSTRAINT `disciplines_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disciplines_id_teacher_foreign` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_id_faculty_foreign` FOREIGN KEY (`id_faculty`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_id_training_foreign` FOREIGN KEY (`id_training`) REFERENCES `training_programs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `policies`
--
ALTER TABLE `policies`
  ADD CONSTRAINT `policies_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `policies_id_teacher_foreign` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_id_group_foreign` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_id_faculty_foreign` FOREIGN KEY (`id_faculty`) REFERENCES `faculties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
