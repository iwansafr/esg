SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'templates', '{\"public_template\":\"up_landed\",\"admin_template\":\"AdminLTE\"}'),
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

DROP TABLE IF EXISTS `content_tag`;
CREATE TABLE `content_tag` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL DEFAULT '0',
  `position_id` int(11) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` mediumtext NOT NULL,
  `is_local` tinyint(1) NOT NULL COMMENT '1=local link, 0 = external link',
  `publish` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `menu_position`;
CREATE TABLE `menu_position` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'root', '$2y$10$iN3I64zsXAyy9MCEVAPe3uqv1ygazlJgKFYEc2aNCiu2VDe/ZTKjO', 'root@esoftgreat.com', '', 1, 1, '2018-11-03 07:36:32', '2018-11-03 07:36:32');

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=failed, 1=success',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 2, 'admin', 'the administrator', '2018-11-02 22:57:22', '2018-11-02 22:57:22');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `content_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `content_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `menu_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `product_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `product_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
