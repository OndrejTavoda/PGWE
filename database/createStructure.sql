CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_type` varchar(50) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `task` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `state` boolean DEFAULT true,
  `title` varchar(100) NOT NULL,
  `description` varchar(200),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES user(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
