-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 09, 2021 lúc 04:10 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tdtumanagement`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `to` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `backgrounds`
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
-- Cấu trúc bảng cho bảng `disciplines`
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
-- Cấu trúc bảng cho bảng `faculties`
--

CREATE TABLE `faculties` (
  `id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Đang Mở',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
('05', 'Công Nghệ Thông Tin', 'Đang Mở', '2021-01-09 14:26:44', '2021-01-09 14:26:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_training` bigint(20) UNSIGNED NOT NULL,
  `id_faculty` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `date_graduation` date NOT NULL,
  `date_admission` date NOT NULL,
  `status` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Đang Mở',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `name`, `id_training`, `id_faculty`, `date_graduation`, `date_admission`, `status`, `created_at`, `updated_at`) VALUES
(1, '16050310', 1, '05', '2021-12-31', '2016-08-15', 'Đang Mở', '2021-01-09 14:27:11', '2021-01-09 14:27:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `majors`
--

CREATE TABLE `majors` (
  `id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_faculty` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_training` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Đang Mở',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `majors`
--

INSERT INTO `majors` (`id`, `id_faculty`, `id_training`, `name`, `status`, `created_at`, `updated_at`) VALUES
('F7480101', '05', 1, 'Khoa Học Máy Tính', 'Đang Mở', '2021-01-09 14:27:58', '2021-01-09 14:27:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_11_12_185001_create_announcements_table', 1),
(4, '2020_11_12_185140_create_training_programs_table', 1),
(5, '2020_11_12_185153_create_faculties_table', 1),
(6, '2020_11_12_185154_create_majors_table', 1),
(7, '2020_11_12_185208_create_groups_table', 1),
(8, '2020_11_12_185218_create_teachers_table', 1),
(9, '2020_11_12_185233_create_students_table', 1),
(10, '2020_11_12_185234_create_users_table', 1),
(11, '2020_11_12_185235_create_roles_table', 1),
(12, '2020_11_12_185236_create_users_roles_table', 1),
(13, '2020_11_12_185244_create_backgrounds_table', 1),
(14, '2020_11_12_185254_create_policies_table', 1),
(15, '2020_11_12_185313_create_disciplines_table', 1),
(16, '2020_11_22_175549_create_subjects_table', 1),
(17, '2020_11_22_175857_create_scores_table', 1),
(18, '2020_12_12_171526_create_programs_subjects_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `policies`
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
-- Cấu trúc bảng cho bảng `programs_subjects`
--

CREATE TABLE `programs_subjects` (
  `id_training` bigint(20) UNSIGNED NOT NULL,
  `id_subject` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-01-09 14:31:52', '2021-01-09 14:31:52'),
(2, 'Student', '2021-01-09 14:34:25', '2021-01-09 14:34:25'),
(4, 'Teacher', '2021-01-09 14:47:13', '2021-01-09 14:47:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_subject` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_student` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grade` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_group` bigint(20) UNSIGNED DEFAULT NULL,
  `id_major` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
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
  `status` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Đi Học',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `id_group`, `id_major`, `avatar`, `firstname`, `middlename`, `lastname`, `birthday`, `place_of_birth`, `origin`, `gender`, `phone`, `address`, `email`, `religion`, `kin`, `id_number`, `place_of_id_number`, `nationality`, `talents`, `incomes`, `career`, `description`, `date_of_union`, `date_of_communist`, `date_of_student_union`, `date_of_dormitory`, `room_of_dormitory`, `military`, `volunteer`, `status`, `created_at`, `updated_at`) VALUES
('51600068', 1, 'F7480101', 'user.png', 'Nguyễn', 'Hưng', 'Phúc', '1998-08-14', 'Tỉnh Long An', 'Tỉnh Long An', 'Nam', '0123456', 'Huyện Cần Giuộc, Tỉnh Long An', 'hungphucnguyen1998@gmail.com', 'Phật', 'Kinh', '0123456', 'Tỉnh Long An', 'Việt Nam', NULL, NULL, NULL, NULL, NULL, NULL, '2016-08-15', '2016-08-15', 'M101', 0, 0, 'Đi Học', '2021-01-09 15:04:55', '2021-01-09 15:07:01'),
('51600072', 1, 'F7480101', 'user.png', 'Nguyễn', 'Châu Thảo', 'Quân', '1996-08-11', 'Thành phố Hồ Chí Minh', 'Thành phố Hồ Chí Minh', 'Nam', '0938706433', '183B/25/24B, đường Tôn Thất Thuyết Phường 4 Quận 4', 'thaoquannguyenchau1996@gmail.com', 'Phật', 'Kinh', '079096013733', 'Thành phố Hồ Chí Minh', 'Việt Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Đi Học', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_faculty` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `credits` bigint(20) NOT NULL,
  `status` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Đang Mở',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
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
  `military` bigint(20) NOT NULL DEFAULT 0,
  `volunteer` bigint(20) NOT NULL DEFAULT 0,
  `status` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Đang Công Tác',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`id`, `id_faculty`, `avatar`, `firstname`, `middlename`, `lastname`, `birthday`, `place_of_birth`, `origin`, `gender`, `phone`, `address`, `email`, `academic_rank`, `degree`, `religion`, `kin`, `id_number`, `place_of_id_number`, `nationality`, `talents`, `incomes`, `career`, `description`, `date_of_union`, `date_of_communist`, `date_of_student_union`, `military`, `volunteer`, `status`, `created_at`, `updated_at`) VALUES
('IT01234', '05', 'user.png', 'Võ', 'Hoàng', 'Anh', '1986-01-01', 'Thành phố Hồ Chí Minh', 'Thành phố Hồ Chí Minh', 'Nữ', '0123456', 'Thành phố Hồ Chí Minh', 'vohoanganh@gmail.com', NULL, 'Thạc sĩ', 'Phật', 'Kinh', '0123456', 'Thành phố Hồ Chí Minh', 'Việt Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Đang Công Tác', '2021-01-09 15:08:30', '2021-01-09 15:08:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `training_programs`
--

CREATE TABLE `training_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `system` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Đang Mở',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `training_programs`
--

INSERT INTO `training_programs` (`id`, `name`, `system`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chương Trình Chất Lượng Cao', 'Đại Học', 'Đang Mở', '2021-01-09 14:25:28', '2021-01-09 14:25:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_student` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_teacher` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Cho Phép',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `id_student`, `id_teacher`, `account`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, '51600072', NULL, '51600072', '51600072@tdtu.edu.vn', NULL, '$2y$10$RvSCMafMM8Q.S7OiFPPbNOlCltocxsbE1x7oKapy2Bt928.s9ngTW', 'dn5Z8lJlpnvrNmbEAi1mECpA5uT3TR7LcWsoCNiGfWcgv5FlCnOQcVUNoQLK', 'Cho Phép', '2021-01-09 14:31:41', '2021-01-09 14:31:41'),
(8, '51600068', NULL, '51600068', '51600068@tdtu.edu.vn', NULL, '$2y$10$lDcPCfA8FmscFGlBuRW91eswn70HiI1Ka4UJCKVWaTqDD3V3euSle', 'plg2HP9TDj8H38Rk7XZ9UG7OOR4giLlgCpv9S4ICZ9xeAiCNLi0IMGxOX5Vf', 'Cho Phép', '2021-01-09 15:04:55', '2021-01-09 15:04:55'),
(9, NULL, 'IT01234', 'IT01234', 'IT01234@tdtu.edu.vn', NULL, '$2y$10$PSssHorLglV6t4kWgTtypuHQnwfQtqs0tf5YYtdv..lg269uJBjZi', NULL, 'Cho Phép', '2021-01-09 15:08:30', '2021-01-09 15:08:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_roles`
--

CREATE TABLE `users_roles` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users_roles`
--

INSERT INTO `users_roles` (`id_user`, `id_role`) VALUES
(1, 1),
(8, 2),
(1, 2),
(9, 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `backgrounds_id_student_foreign` (`id_student`),
  ADD KEY `backgrounds_id_teacher_foreign` (`id_teacher`);

--
-- Chỉ mục cho bảng `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disciplines_id_student_foreign` (`id_student`),
  ADD KEY `disciplines_id_teacher_foreign` (`id_teacher`);

--
-- Chỉ mục cho bảng `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculties_name_unique` (`name`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_id_training_foreign` (`id_training`),
  ADD KEY `groups_id_faculty_foreign` (`id_faculty`);

--
-- Chỉ mục cho bảng `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `majors_id_faculty_foreign` (`id_faculty`),
  ADD KEY `majors_id_training_foreign` (`id_training`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `policies_id_student_foreign` (`id_student`),
  ADD KEY `policies_id_teacher_foreign` (`id_teacher`);

--
-- Chỉ mục cho bảng `programs_subjects`
--
ALTER TABLE `programs_subjects`
  ADD KEY `programs_subjects_id_training_foreign` (`id_training`),
  ADD KEY `programs_subjects_id_subject_foreign` (`id_subject`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_id_subject_foreign` (`id_subject`),
  ADD KEY `scores_id_student_foreign` (`id_student`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_id_group_foreign` (`id_group`),
  ADD KEY `students_id_major_foreign` (`id_major`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_id_faculty_foreign` (`id_faculty`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_id_faculty_foreign` (`id_faculty`);

--
-- Chỉ mục cho bảng `training_programs`
--
ALTER TABLE `training_programs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_account_unique` (`account`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_id_student_unique` (`id_student`),
  ADD UNIQUE KEY `users_id_teacher_unique` (`id_teacher`);

--
-- Chỉ mục cho bảng `users_roles`
--
ALTER TABLE `users_roles`
  ADD KEY `users_roles_id_user_foreign` (`id_user`),
  ADD KEY `users_roles_id_role_foreign` (`id_role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `backgrounds`
--
ALTER TABLE `backgrounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `training_programs`
--
ALTER TABLE `training_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD CONSTRAINT `backgrounds_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `backgrounds_id_teacher_foreign` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `disciplines`
--
ALTER TABLE `disciplines`
  ADD CONSTRAINT `disciplines_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disciplines_id_teacher_foreign` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_id_faculty_foreign` FOREIGN KEY (`id_faculty`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_id_training_foreign` FOREIGN KEY (`id_training`) REFERENCES `training_programs` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `majors`
--
ALTER TABLE `majors`
  ADD CONSTRAINT `majors_id_faculty_foreign` FOREIGN KEY (`id_faculty`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `majors_id_training_foreign` FOREIGN KEY (`id_training`) REFERENCES `training_programs` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `policies`
--
ALTER TABLE `policies`
  ADD CONSTRAINT `policies_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `policies_id_teacher_foreign` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `programs_subjects`
--
ALTER TABLE `programs_subjects`
  ADD CONSTRAINT `programs_subjects_id_subject_foreign` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `programs_subjects_id_training_foreign` FOREIGN KEY (`id_training`) REFERENCES `training_programs` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_id_subject_foreign` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_id_group_foreign` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_id_major_foreign` FOREIGN KEY (`id_major`) REFERENCES `majors` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_id_faculty_foreign` FOREIGN KEY (`id_faculty`) REFERENCES `faculties` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_id_faculty_foreign` FOREIGN KEY (`id_faculty`) REFERENCES `faculties` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_id_teacher_foreign` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
