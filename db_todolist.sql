-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping database structure for db_todolist
CREATE DATABASE IF NOT EXISTS db_todolist /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE db_todolist;

-- Dumping structure for table db_todolist.notifications
CREATE TABLE IF NOT EXISTS notifications (
  id int unsigned NOT NULL AUTO_INCREMENT,
  user_id int NOT NULL,
  title varchar(255) DEFAULT NULL,
  content text,
  due_date datetime DEFAULT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY task_id (user_id),
  CONSTRAINT FK__users FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

-- Dumping data for table db_todolist.notifications: ~0 rows (approximately)
DELETE FROM notifications;

-- Dumping structure for table db_todolist.tasks
CREATE TABLE IF NOT EXISTS tasks (
  id int NOT NULL AUTO_INCREMENT,
  user_id int NOT NULL,
  name varchar(255) NOT NULL,
  description text,
  due_date datetime NOT NULL,
  priority enum('low','medium','high') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'low',
  status enum('canceled','completed','new','inprogress') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'new',
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY tasks_ibfk_1 (user_id),
  CONSTRAINT tasks_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

-- Dumping data for table db_todolist.tasks: ~2 rows (approximately)
DELETE FROM tasks;
INSERT INTO tasks (id, user_id, name, description, due_date, priority, status, created_at, updated_at) VALUES
  (22, 3, 'Tugas Bahasa Inggris', 'Voluptatem voluptas ', '2024-12-14 13:08:00', 'medium', 'completed', '2024-12-12 08:40:33', '2024-12-12 09:03:44'),
  (23, 3, 'tugas spk', 'huahasudahsudss\r\ndadsd\r\n\r\ndsad', '2024-12-17 16:50:00', 'high', 'canceled', '2024-12-12 08:51:21', '2024-12-12 09:05:24');

-- Dumping structure for table db_todolist.users
CREATE TABLE IF NOT EXISTS users (
  id int NOT NULL AUTO_INCREMENT,
  email varchar(100) DEFAULT NULL,
  password varchar(100) DEFAULT NULL,
  name varchar(100) DEFAULT NULL,
  role enum('user','admin') DEFAULT 'user',
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY email_UNIQUE (email)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;

-- Dumping data for table db_todolist.users: ~4 rows (approximately)
DELETE FROM users;
INSERT INTO users (id, email, password, name, role, created_at, updated_at) VALUES
  (1, NULL, NULL, NULL, 'user', '2024-12-11 03:41:23', '2024-12-11 03:41:23'),
  (2, 'ss@sda', '$2y$10$DgkJWaN/mENmRuiqLNtZquY/21W.KgLwSWAyTunB.4.JE9e5SSN8O', 's', 'user', '2024-12-11 03:43:05', '2024-12-11 03:43:05'),
  (3, 'wawan@gmail.com', '$2y$10$S2gnv.KyxMRvaheJcRVgkObYZDIgkq5YrVglJrza2HmMTiZecQKt2', 'Wawan Julianto', 'user', '2024-12-11 03:44:25', '2024-12-11 03:44:25'),
  (4, 'dagyfesi@mailinator.com', '$2y$10$Jw7A.eFf9pjpoPA/Y6wJS.X5oNQG8lf/woYoYGOEWw.UmvVppiC/2', 'Mariam Hudson', 'user', '2024-12-11 03:44:38', '2024-12-11 03:44:38');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
