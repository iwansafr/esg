SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `par_id` int(11) DEFAULT NULL,
  `user_role_ids` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin_menu` (`id`, `par_id`, `user_role_ids`, `title`, `icon`, `link`, `sort_order`, `created`, `updated`) VALUES
(1, 0, ',1,2,3,', 'Dashboard', 'fa fa-tachometer-alt', '/', 1, '2019-03-30 03:05:59', '2019-03-30 03:29:18'),
(2, 0, ',1,2,3,', 'Content', 'fa fa-file-alt', '/content', 2, '2019-03-30 03:24:19', '2019-03-31 23:06:51'),
(3, 2, ',1,2,3,', 'Category', 'fa fa-list', '/content/category', 21, '2019-03-30 03:26:22', '2019-04-01 05:48:07'),
(4, 2, ',1,2,3,', 'Add Content', 'fa fa-pencil-alt', '/content/edit', 22, '2019-03-30 03:35:27', '2019-04-01 05:48:07'),
(5, 2, ',1,2,3,', 'Content List', 'fa fa-list', '/content/list', 23, '2019-03-30 03:35:44', '2019-04-01 05:48:07'),
(6, 2, ',1,2,3,', 'Tag', 'fa fa-list', '/content/tag', 24, '2019-03-30 03:36:06', '2019-04-01 05:48:07'),
(7, 0, ',1,2,3,', 'Gallery', 'fa fa-images', '/gallery', 3, '2019-03-31 22:53:29', '2019-04-01 05:47:53'),
(8, 7, ',1,2,3,', 'Images', 'fa fa-image', '/gallery', 31, '2019-03-31 22:53:57', '2019-04-01 06:01:57'),
(9, 0, ',1,2,', 'User', 'fa fa-user', '/user', 4, '2019-03-31 22:54:25', '2019-04-01 05:47:53'),
(10, 9, ',1,2,', 'User List', 'fa fa-dot-circle', '/user/list', 41, '2019-03-31 22:55:32', '2019-04-01 06:02:10'),
(11, 9, ',1,2,', 'User Edit', 'fa fa-dot-circle', '/user/edit', 42, '2019-03-31 22:58:48', '2019-04-01 06:02:10'),
(12, 9, ',1,', 'User Role', 'fa fa-dot-circle', '/user/role', 43, '2019-03-31 22:59:13', '2019-04-01 06:02:10'),
(13, 0, ',1,2,', 'Menu', 'fa fa-list', '/menu', 5, '2019-03-31 22:59:33', '2019-04-01 05:47:53'),
(14, 13, ',1,2,', 'Add Menu', 'fa fa-pencil-alt', '/menu/edit', 51, '2019-03-31 22:59:58', '2019-04-01 06:02:26'),
(15, 13, ',1,2,', 'Menu List', 'fa fa-pencil-alt', '/menu/list', 52, '2019-03-31 23:00:18', '2019-04-01 06:02:26'),
(16, 13, ',1,2,', 'Menu Position', 'fa fa-list', '/menu/position', 53, '2019-03-31 23:00:37', '2019-04-01 06:02:26'),
(17, 0, ',1,', 'Admin Menu', 'fa fa-list', '/admin_menu', 6, '2019-03-31 23:01:10', '2019-04-01 05:47:53'),
(18, 17, ',1,', 'Add Menu', 'fa fa-pencil-alt', '/admin_menu/edit', 61, '2019-04-01 05:45:00', '2019-04-01 06:02:42'),
(19, 17, ',1,', 'Menu List', 'fa fa-list', '/admin_menu/list', 62, '2019-04-01 05:45:20', '2019-04-01 06:02:42'),
(20, 17, ',1,', 'Menu Parent', 'fa fa-list', '/admin_menu/list?id=0', 63, '2019-04-01 05:46:00', '2019-04-01 06:02:42'),
(21, 0, ',1,2,', 'Data', 'fa fa-database', '/visitor', 7, '2019-04-01 05:46:34', '2019-04-01 05:47:53'),
(22, 21, ',1,2,', 'Visitor', 'fa fa-chart-bar', '/visitor', 71, '2019-04-01 05:46:56', '2019-04-01 06:02:51'),
(23, 0, ',1,2,', 'Configuration', 'fa fa-cog', '/config', 8, '2019-04-01 06:03:37', '2019-04-01 06:04:01'),
(24, 23, ',1,2,', 'Logo', 'fa fa-cog', '/config/logo', 81, '2019-04-01 06:04:28', '2019-04-01 06:08:52'),
(25, 23, ',1,2,', 'Site', 'fa fa-cog', '/config/site', 82, '2019-04-01 06:04:41', '2019-04-01 06:08:52'),
(26, 23, ',1,2,', 'Templates', 'fa fa-cog', '/config/templates', 83, '2019-04-01 06:04:57', '2019-04-01 06:08:52'),
(27, 23, ',1,2,', 'Contact', 'fa fa-cog', '/config/contact', 84, '2019-04-01 06:05:14', '2019-04-01 06:08:52'),
(28, 23, ',1,2,', 'Style', 'fa fa-cog', '/config/style', 86, '2019-04-01 06:06:52', '2019-04-06 01:38:22'),
(29, 23, ',1,2,', 'Script', 'fa fa-cog', '/config/script', 87, '2019-04-01 06:07:29', '2019-04-06 01:38:22'),
(30, 21, ',1,2,', 'Backup', 'fa fa-download', '/backup', 87, '2019-04-01 06:08:04', '2019-04-05 23:06:08'),
(31, 21, ',1,2,', 'Restore', 'fa fa-upload', '/restore', 88, '2019-04-01 06:08:15', '2019-04-05 23:06:14'),
(32, 21, ',1,2,', 'Delete Cache', 'fa fa-trash', '/config/delete_cache', 89, '2019-04-04 00:08:10', '2019-04-05 23:06:19'),
(33, 21, ',1,2,', 'Invoice', 'fa fa-money', '/invoice', 1, '2019-04-05 23:07:23', '2019-04-05 23:07:23'),
(34, 23, ',1,2,', 'Bank Account', 'fa fa-user', '/config/bank_account', 85, '2019-04-06 01:37:09', '2019-04-06 01:38:22'),
(35, 21, ',1,2,', 'Bank Account', 'fa fa-money', '/bank_account', 1, '2019-04-10 02:40:32', '2019-04-10 02:40:32');


ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

ALTER TABLE `content` CHANGE `files` `document` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
