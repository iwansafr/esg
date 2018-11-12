SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL,
  `module` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=content,2=product',
  `module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unread, 1=read',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `config` (`id`, `name`, `value`) VALUES
(1, 'templates', '{\"public_template\":\"new_age\",\"admin_template\":\"AdminLTE\"}'),
(2, 'site', '{\"title\":\"esoftgreat\",\"link\":\"http:\\/\\/localhost\\/esoftgreat\",\"image\":\"image_esoftgreat_1541123898.png\",\"keyword\":\"software developmet\",\"description\":\"software development and it consultanr\"}'),
(3, 'logo', '{\"title\":\"esoftgreat\",\"image\":\"image_esoftgreat_1541123928.png\",\"width\":\"150\",\"height\":\"50\"}');

DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `cat_ids` mediumtext NOT NULL,
  `tag_ids` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `image_link` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `hits` int(11) NOT NULL,
  `last_hits` datetime NOT NULL,
  `rating` varchar(255) NOT NULL,
  `params` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `publish` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `content` (`id`, `cat_ids`, `tag_ids`, `title`, `slug`, `description`, `keyword`, `intro`, `content`, `image`, `icon`, `image_link`, `images`, `author`, `hits`, `last_hits`, `rating`, `params`, `created`, `updated`, `publish`) VALUES
(1, ',1,', ',1,2,', 'Hello World', 'hello-world', 'Hello World\r\n', 'Hello World', 'Hello World\r\n', '<p>Hello World</p>\r\n', 'image_Hello_World_1541950550.png', '', '', '[\"images_Hello_World_0_1541950550.png\",\"images_Hello_World_1_1541950550.png\"]', 'admin', 0, '0000-00-00 00:00:00', '', '', '2018-11-11 22:35:50', '2018-11-11 22:43:54', 1);

DROP TABLE IF EXISTS `content_cat`;
CREATE TABLE `content_cat` (
  `id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `content_cat` (`id`, `par_id`, `title`, `slug`, `image`, `icon`, `description`, `publish`, `created`, `updated`) VALUES
(1, 0, 'Uncategorized', 'uncategorized', '', '', '', 1, '2018-11-11 22:23:38', '2018-11-11 22:23:38'),
(2, 0, 'Profile', 'profile', '', '', '', 1, '2018-11-11 23:09:20', '2018-11-11 23:09:20');

DROP TABLE IF EXISTS `content_tag`;
CREATE TABLE `content_tag` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `content_tag` (`id`, `title`, `created`) VALUES
(1, 'esoftgreat', '2018-11-11 22:27:01'),
(2, 'hello world', '2018-11-11 22:27:01');

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL DEFAULT '0',
  `position_id` int(11) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` mediumtext NOT NULL,
  `is_local` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=local link, 0 = external link',
  `publish` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menu` (`id`, `par_id`, `position_id`, `sort_order`, `title`, `link`, `is_local`, `publish`) VALUES
(1, 0, 1, 0, 'facebook', 'https://facebook.com', 0, 1);

DROP TABLE IF EXISTS `menu_position`;
CREATE TABLE `menu_position` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menu_position` (`id`, `title`, `created`, `updated`) VALUES
(1, 'Top Menu', '2018-11-12 02:16:02', '2018-11-12 02:16:02');

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cat_ids` text NOT NULL,
  `tag_ids` text NOT NULL,
  `image` varchar(11) NOT NULL,
  `images` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount` double NOT NULL,
  `qty` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = not publish, 1 = publish',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `product_cat`;
CREATE TABLE `product_cat` (
  `id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `product_tag`;
CREATE TABLE `product_tag` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = not active',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `username`, `password`, `email`, `image`, `user_role_id`, `active`, `created`, `updated`) VALUES
(1, 'root', '$2y$10$iN3I64zsXAyy9MCEVAPe3uqv1ygazlJgKFYEc2aNCiu2VDe/ZTKjO', 'root@esoftgreat.com', '', 1, 1, '2018-11-03 07:36:32', '2018-11-03 07:36:32'),
(2, 'admin', '$2y$10$jdpCJJsaAfx1hv0EXyQpjOce6kqeffl9X/cOJvJYuSnG4/aFLwb7C', 'admin@esoftgreat.com', '', 2, 1, '2018-11-04 19:27:55', '2018-11-04 19:27:55'),
(3, 'iwan safrudin', '$2y$10$fJfo8uVYisXBw6OG4wGDr.a0O.0s47sUYxCr2Sr4kfeN.t4R6qMW6', 'iwansafr@gmail.com', '', 3, 1, '2018-11-04 19:59:44', '2018-11-04 21:17:19'),
(4, 'iwan safrudi', '$2y$10$gUI2DwOKMIqBDaDqxKSzj.dpZTrz9BazcP1SRLDF86ibDKcoemtMq', 'iwansafrudi@gmail.com', '', 3, 1, '2018-11-04 21:18:09', '2018-11-04 21:18:09'),
(5, 'iwan safru', '$2y$10$rOnM0ah/kjhxv418xLTyBOTpq2BCh3k.WCyxQtg0bCj39z7xlEsj6', 'iwansafru@gmail.com', '', 0, 1, '2018-11-04 21:18:54', '2018-11-04 21:18:54');

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=failed, 1=success',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_login` (`id`, `user_id`, `ip`, `status`, `created`) VALUES
(1, 2, '::1', 1, '2018-11-07 19:49:57'),
(2, 2, '::1', 1, '2018-11-11 22:03:50'),
(3, 2, '::1', 1, '2018-11-11 22:54:47'),
(4, 2, '::1', 1, '2018-11-12 13:55:52');

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `level` tinyint(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_role` (`id`, `level`, `title`, `description`, `created`, `updated`) VALUES
(1, 1, 'root', 'super user', '2018-11-02 22:57:22', '2018-11-02 22:57:22'),
(2, 2, 'admin', 'the administrator', '2018-11-02 22:57:22', '2018-11-02 22:57:22'),
(3, 5, 'Member', 'User member yang hanya berlangganan saja', '2018-11-04 12:59:26', '2018-11-04 12:59:26');

DROP TABLE IF EXISTS `visitor`;
CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `visited` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `content_cat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

ALTER TABLE `content_tag`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `menu_position`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `product_cat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `content_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `content_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `menu_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `product_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `product_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
