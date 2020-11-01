-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 05:38 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `admission_details`
--

CREATE TABLE `admission_details` (
  `id_admission` bigint(20) UNSIGNED NOT NULL,
  `id_student` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `grade` int(11) NOT NULL,
  `school` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `GPA` double NOT NULL,
  `performance` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `conduct` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission_records`
--

CREATE TABLE `admission_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `exam_number` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `place_of_exam` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `date_exam` date NOT NULL,
  `exam_council` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `qualification_number` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `archive_number` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `place_of_issue` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `fullname` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `relationship` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resident` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workplace` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `incomes_source` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `career` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_of_work` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `head` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `date_initiated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculties_teachers`
--

CREATE TABLE `faculties_teachers` (
  `id_faculty` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_teacher` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_training` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups_faculties`
--

CREATE TABLE `groups_faculties` (
  `id_group` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_faculty` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_29_070839_create_roles_table', 1),
(5, '2020_10_29_070923_create_users_roles_table', 1),
(6, '2020_11_01_145402_create_training_programs_table', 1),
(7, '2020_11_01_145505_create_admission_records_table', 1),
(8, '2020_11_01_145843_create_groups_table', 1),
(9, '2020_11_01_150545_create_students_table', 1),
(10, '2020_11_01_150753_create_admission_details_table', 1),
(11, '2020_11_01_151412_create_faculties_table', 1),
(12, '2020_11_01_151505_create_teachers_table', 1),
(13, '2020_11_01_151639_create_faculties_teachers_table', 1),
(14, '2020_11_01_161953_create_groups_faculties_table', 1),
(15, '2020_11_01_162249_create_backgrounds_table', 1),
(16, '2020_11_01_162817_create_policies_table', 1);

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
  `year_of_military` int(11) DEFAULT NULL,
  `year_of_volunteer` int(11) DEFAULT NULL
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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `day_of_dormitory` date NOT NULL,
  `room_of_dormitory` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_student_union` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `academic_rank` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `degree` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Indexes for table `admission_details`
--
ALTER TABLE `admission_details`
  ADD UNIQUE KEY `admission_details_grade_unique` (`grade`),
  ADD KEY `admission_details_id_admission_foreign` (`id_admission`),
  ADD KEY `admission_details_id_student_foreign` (`id_student`);

--
-- Indexes for table `admission_records`
--
ALTER TABLE `admission_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `backgrounds_id_student_foreign` (`id_student`),
  ADD KEY `backgrounds_id_teacher_foreign` (`id_teacher`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties_teachers`
--
ALTER TABLE `faculties_teachers`
  ADD KEY `faculties_teachers_id_faculty_foreign` (`id_faculty`);

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
  ADD KEY `groups_id_training_foreign` (`id_training`);

--
-- Indexes for table `groups_faculties`
--
ALTER TABLE `groups_faculties`
  ADD KEY `groups_faculties_id_group_foreign` (`id_group`),
  ADD KEY `groups_faculties_id_faculty_foreign` (`id_faculty`);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admission_records`
--
ALTER TABLE `admission_records`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT for table `training_programs`
--
ALTER TABLE `training_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission_details`
--
ALTER TABLE `admission_details`
  ADD CONSTRAINT `admission_details_id_admission_foreign` FOREIGN KEY (`id_admission`) REFERENCES `admission_records` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admission_details_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD CONSTRAINT `backgrounds_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `backgrounds_id_teacher_foreign` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faculties_teachers`
--
ALTER TABLE `faculties_teachers`
  ADD CONSTRAINT `faculties_teachers_id_faculty_foreign` FOREIGN KEY (`id_faculty`) REFERENCES `faculties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_id_training_foreign` FOREIGN KEY (`id_training`) REFERENCES `training_programs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `groups_faculties`
--
ALTER TABLE `groups_faculties`
  ADD CONSTRAINT `groups_faculties_id_faculty_foreign` FOREIGN KEY (`id_faculty`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_faculties_id_group_foreign` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `policies`
--
ALTER TABLE `policies`
  ADD CONSTRAINT `policies_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `policies_id_teacher_foreign` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

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
