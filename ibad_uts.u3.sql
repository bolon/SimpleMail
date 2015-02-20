CREATE DATABASE `ibad_uts`;

USE `ibad_uts`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

insert  into `users`(`id`,`username`,`password`) values (1,'jaka','jaka'),(2,'wiro','wiro'),(3,'nunung','nunung');

CREATE TABLE `mails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_user_id` int(10) unsigned DEFAULT NULL,
  `to_user_id` int(10) unsigned DEFAULT NULL,
  `subject` varchar(64) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`),
  KEY `from` (`from_user_id`),
  KEY `to` (`to_user_id`),
  CONSTRAINT `from` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `to` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

insert  into `mails`(`id`,`from_user_id`,`to_user_id`,`subject`,`message`) values (1,1,2,'kuliah?','kuliah IBAD jadi jam 8 apa jam 10,.?'),(2,3,2,'balikin buku','udah mau habisa masa pinjam nih,\r\nbalikin buku gue dong brur,.'),(3,2,1,'[ask]: tugas','jak, tugas ibad dah submit blum?'),(4,3,1,'kerja kelompok','bro, di mana nih,.?\r\nkita kumpul di EH yak,.!'),(5,1,2,'tugas ibad','udah ngumpul tadi siang,.\r\ndeadline hari ini lho,.!'),(6,1,2,'UTS','coy, ujian ali ini, bisa lah,... :)');
