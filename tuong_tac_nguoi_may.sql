-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2024 lúc 08:12 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tuong_tac_nguoi_may`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `health_records`
--

CREATE TABLE `health_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `pet_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `cost` double(8,2) NOT NULL,
  `status` int(11) NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `manufacture_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `type`, `cost`, `status`, `quantity`, `manufacture_date`, `expiry_date`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Aspirin', 'Tablet', 5000.00, 1, 100.00, '2023-01-01', '2025-01-01', NULL, 0, NULL, '2024-06-05 15:35:10', NULL),
(2, 'Paracetamol', 'Tablet', 3000.00, 1, 200.00, '2023-02-01', '2025-02-01', NULL, NULL, NULL, '2024-06-05 15:35:10', NULL),
(3, 'Ibuprofen', 'Capsule', 10000.00, 1, 150.00, '2023-03-01', '2025-03-01', NULL, NULL, NULL, '2024-06-05 15:35:10', NULL),
(4, 'Amoxicillin', 'Capsule', 20000.00, 1, 300.00, '2023-04-01', '2025-04-01', NULL, NULL, NULL, '2024-06-05 15:35:10', NULL),
(5, 'Cetirizine', 'Tablet', 7000.00, 1, 250.00, '2023-05-01', '2025-05-01', NULL, NULL, NULL, '2024-06-05 15:35:10', NULL),
(6, 'Omeprazole', 'Capsule', 15000.00, 1, 100.00, '2023-06-01', '2025-06-01', NULL, NULL, NULL, '2024-06-05 15:35:10', NULL),
(7, 'Metformin', 'Tablet', 12000.00, 1, 200.00, '2023-07-01', '2025-07-01', NULL, NULL, NULL, '2024-06-05 15:35:10', NULL),
(8, 'Atorvastatin', 'Tablet', 25000.00, 1, 150.00, '2023-08-01', '2025-08-01', NULL, NULL, NULL, '2024-06-05 15:35:10', NULL),
(9, 'Ciprofloxacin', 'Tablet', 18000.00, 1, 300.00, '2023-09-01', '2025-09-01', NULL, NULL, NULL, '2024-06-05 15:35:10', NULL),
(10, 'Lisinopril', 'Tablet', 22000.00, 1, 250.00, '2023-10-01', '2025-10-01', NULL, NULL, NULL, '2024-06-05 15:35:10', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2024_06_08_020042_create_pets_table', 9),
(19, '2024_06_08_020400_create_prescriptions_table', 10),
(20, '2024_06_08_024409_create_prescription_details_table', 11),
(21, '2024_06_08_020420_create_rules_table', 12),
(23, '2024_06_07_145124_create_users_table', 14),
(24, '2024_06_08_015823_create_services_table', 14),
(25, '2024_06_08_020501_create_user_rules_table', 14),
(27, '2024_06_08_020024_create_schedules_table', 15),
(28, '2024_06_08_020227_create_health_records_table', 16),
(29, '2024_06_08_020338_create_medicines_table', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pets`
--

CREATE TABLE `pets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` int(11) NOT NULL,
  `species` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pets`
--

INSERT INTO `pets` (`id`, `name`, `sex`, `species`, `age`, `customer_id`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Bella', 0, 'Dog', 3, 13, NULL, NULL, NULL, NULL, NULL),
(9, 'Chloe', 0, 'Bird', 4, 13, NULL, NULL, NULL, NULL, NULL),
(17, 'Zoe', 0, 'Rabbit', 1, 13, NULL, NULL, NULL, NULL, NULL),
(21, 'Tech Vision Academy', 1, 'Dog', 11, 13, NULL, NULL, NULL, '2024-09-30 08:11:01', '2024-09-30 08:11:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `health_record_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prescription_details`
--

CREATE TABLE `prescription_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prescription_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rules`
--

CREATE TABLE `rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rules`
--

INSERT INTO `rules` (`id`, `name`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'employee', NULL, NULL, NULL, NULL, NULL),
(2, 'doctor', NULL, NULL, NULL, NULL, NULL),
(3, 'manager', NULL, NULL, NULL, NULL, NULL),
(4, 'customer\r\n', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `schedules`
--

INSERT INTO `schedules` (`id`, `date`, `status`, `service_id`, `doctor_id`, `customer_id`, `message`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, '2024-06-20', 1, 1, 4, 21, NULL, NULL, NULL, NULL, '2024-06-18 21:19:04', '2024-06-18 22:01:32'),
(17, '2024-10-02', 0, 1, 4, 13, NULL, NULL, NULL, NULL, '2024-09-30 23:06:35', '2024-09-30 23:06:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` double(8,2) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `services`
--

INSERT INTO `services` (`id`, `name`, `cost`, `type`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Trông thú cưng', 50.00, 'Chăm sóc', NULL, NULL, NULL, NULL, NULL),
(4, 'Tỉa lông thú cưng', 30.00, 'Chăm sóc', NULL, NULL, NULL, NULL, NULL),
(6, 'Tắm cho thú cưng', 40.00, 'Chăm sóc', NULL, NULL, NULL, NULL, NULL),
(8, 'Tiêm phòng và tẩy giun', 55.00, 'Thăm khám\n', NULL, NULL, NULL, NULL, NULL),
(9, 'Kiểm tra da và lông', 25.00, 'Thăm khám\n', NULL, NULL, NULL, NULL, NULL),
(11, 'Kiểm tra tổng quát', 25.00, 'Thăm khám\r\n', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `sex`, `birthday`, `hometown`, `address`, `phone`, `degree`, `password`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'hien', 'quanly@gmail.com', 0, '2003-07-01', NULL, NULL, '0763433779', NULL, '$2y$10$teXRfIZAE6FiiaaXnvssNuQMK/E1puYnOYVkwlG8jI1EWcMBXGk3O', 3, 3, NULL, '2024-06-08 09:09:08', '2024-06-08 09:09:08'),
(3, 'hien', 'nhanvien@gmail.com', 0, '2003-07-01', NULL, NULL, '0763433779', NULL, '$2y$10$LqgcXv1d2gQv5joyr1ss8u0x8XCZSoCVnCv6b.UZFM/Q1opWCztpi', 3, 3, NULL, '2024-06-08 09:09:25', '2024-06-08 09:26:08'),
(4, 'hien', 'bacsi@gmail.com', 0, '2003-07-01', NULL, NULL, '0763433779', NULL, '$2y$10$kssAMEL2bJGFomC/o1o.L.qf83.m3RzTqOBvi9Tmq46IKQwgdiOju', 3, 3, NULL, '2024-06-08 09:09:37', '2024-06-08 22:52:42'),
(5, 'hien', '2151170542@e.tlu.edu.vn', 0, '2003-07-01', NULL, NULL, '0763433779', NULL, '$2y$10$a/U/RQNwr1Thwd.HFlro3.Ssu4YzX8BqlBp3NkRkYP/FP47AppzBa', 2, 2, NULL, '2024-06-08 22:17:51', '2024-06-08 22:26:20'),
(6, 'hien', '21511705142@e.tlu.edu.vn', 0, '2003-07-01', NULL, NULL, '0763433779', NULL, '$2y$10$kTc8Ii/p7tVv3ej8oVeGtezFHO.1hR1nPyMHu0HFOPzv4x8HnTObq', 2, 2, NULL, '2024-06-08 22:19:01', '2024-06-08 22:26:18'),
(7, 'hien', 'qusssanly@gmail.com', 1, '2003-07-01', NULL, NULL, '0763433779', NULL, '$2y$10$NMsM7Cl60mTdNt5m.oSG0uJ1byg1oit7Y0mkVFzbJe/..czFdSUhO', 2, 2, NULL, '2024-06-08 22:24:55', '2024-06-08 22:26:17'),
(13, 'hien', NULL, NULL, NULL, NULL, NULL, '0763433779', NULL, NULL, NULL, NULL, NULL, '2024-06-11 03:12:10', '2024-06-11 03:12:10'),
(21, 'Hiền', NULL, NULL, NULL, NULL, NULL, '0763433770', NULL, NULL, NULL, NULL, NULL, '2024-06-18 21:19:03', '2024-06-18 21:19:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_rules`
--

CREATE TABLE `user_rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rule_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_rules`
--

INSERT INTO `user_rules` (`id`, `user_id`, `rule_id`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 3, 1, NULL, NULL, NULL, '2024-06-08 09:09:25', '2024-06-08 09:09:25'),
(4, 4, 2, NULL, NULL, NULL, '2024-06-08 09:09:37', '2024-06-08 09:09:37'),
(5, 4, 1, NULL, NULL, NULL, '2024-06-08 09:09:37', '2024-06-08 09:09:37'),
(6, 5, 1, NULL, NULL, NULL, '2024-06-08 22:17:51', '2024-06-08 22:17:51'),
(7, 5, 2, NULL, NULL, NULL, '2024-06-08 22:17:51', '2024-06-08 22:17:51'),
(8, 6, 1, NULL, NULL, NULL, '2024-06-08 22:19:01', '2024-06-08 22:19:01'),
(9, 6, 2, NULL, NULL, NULL, '2024-06-08 22:19:01', '2024-06-08 22:19:01'),
(10, 7, 1, NULL, NULL, NULL, '2024-06-08 22:24:55', '2024-06-08 22:24:55'),
(11, 7, 2, NULL, NULL, NULL, '2024-06-08 22:24:55', '2024-06-08 22:24:55'),
(12, 7, 3, NULL, NULL, NULL, '2024-06-08 22:24:55', '2024-06-08 22:24:55'),
(15, 2, 3, NULL, NULL, NULL, '2024-06-08 22:54:18', '2024-06-08 22:54:18'),
(22, 13, 4, NULL, NULL, NULL, '2024-06-11 03:12:10', '2024-06-11 03:12:10'),
(30, 21, 4, NULL, NULL, NULL, '2024-06-18 21:19:04', '2024-06-18 21:19:04');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `health_records`
--
ALTER TABLE `health_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `health_records_doctor_id_foreign` (`doctor_id`),
  ADD KEY `health_records_pet_id_foreign` (`pet_id`);

--
-- Chỉ mục cho bảng `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pets_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_employee_id_foreign` (`employee_id`),
  ADD KEY `prescriptions_health_record_id_foreign` (`health_record_id`);

--
-- Chỉ mục cho bảng `prescription_details`
--
ALTER TABLE `prescription_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescription_details_prescription_id_foreign` (`prescription_id`),
  ADD KEY `prescription_details_medicine_id_foreign` (`medicine_id`);

--
-- Chỉ mục cho bảng `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_service_id_foreign` (`service_id`),
  ADD KEY `schedules_doctor_id_foreign` (`doctor_id`),
  ADD KEY `schedules_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_rules`
--
ALTER TABLE `user_rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_rules_user_id_foreign` (`user_id`),
  ADD KEY `user_rules_rule_id_foreign` (`rule_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `health_records`
--
ALTER TABLE `health_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pets`
--
ALTER TABLE `pets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `prescription_details`
--
ALTER TABLE `prescription_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rules`
--
ALTER TABLE `rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `user_rules`
--
ALTER TABLE `user_rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `health_records`
--
ALTER TABLE `health_records`
  ADD CONSTRAINT `health_records_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `health_records_pet_id_foreign` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescriptions_health_record_id_foreign` FOREIGN KEY (`health_record_id`) REFERENCES `health_records` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `prescription_details`
--
ALTER TABLE `prescription_details`
  ADD CONSTRAINT `prescription_details_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescription_details_prescription_id_foreign` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_rules`
--
ALTER TABLE `user_rules`
  ADD CONSTRAINT `user_rules_rule_id_foreign` FOREIGN KEY (`rule_id`) REFERENCES `rules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_rules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
