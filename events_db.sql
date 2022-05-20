
--
-- Database: `events_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(155) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Festival', 'different kind of festivals '),
(2, 'Music', ''),
(3, 'Art', ''),
(4, 'Culture', ''),
(5, 'technology', ''),
(6, 'sports', ''),
(7, 'Fest', ''),
(8, 'others', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(155) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `coordinator` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `category`, `start_date`, `end_date`, `coordinator`) VALUES
(1, 'SEA', 'all kind of it events in college', 'Technology', '2021-04-22', '2021-04-23', 'Vamsi'),
(2, 'ISTE ', 'We are organizing a great party on the occasion of New Year 2021', 'Festival', '2021-04-15', '2021-04-24', 'Vamsi'),
(3, 'CODING FIESTA', 'coding realted exam', 'others', '2021-04-20', '2021-04-21', 'vamsi'),
(4, 'Mohana Mantra', 'concert of your favourite band', 'Music', '2021-04-07', '2021-04-29', 'Pavan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(50) DEFAULT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`) VALUES
(3, 'admin', 'admin@gmail.com', '$2y$10$5dNFX4yN2jJYvZO/acd9jeP6/sr9F1mLrdSo91YzBbSm4QG3bxMdy', NULL, 'admin'),
(5, 'codegenes', 'codegenes@gmail.com', '$2y$10$p1ZYplM/LZgofybrpXvtrOiAXgMpAtkK0QIWlB4ymCNQSSp16Ruj2', NULL, 'member');
COMMIT;
