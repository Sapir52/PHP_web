CREATE TABLE  `users` (
    `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `password` VARCHAR(50) utf8mb4_general_ci NOT NULL,
    `first_name` VARCHAR(50) utf8mb4_general_ci  NOT NULL,
    `last_name` VARCHAR(50) utf8mb4_general_ci  NOT NULL,
    `phone` VARCHAR(15) utf8mb4_general_ci  NOT NULL,
    `email` VARCHAR(50) utf8mb4_general_ci  NOT NULL,
    `address` VARCHAR(50) utf8mb4_general_ci  NOT NULL,
    `create_datetime` DATETIME DEFAULT CURRENT_TIMESTAMP
)NGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=	utf8mb4_general_ci;

CREATE TABLE `events` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;