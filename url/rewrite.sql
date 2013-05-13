-- phpMyAdmin SQL Dump
-- version 2.8.2.4
-- http://www.phpmyadmin.net
-- 
-- Host: mysql.gruppomodulo.it
-- Generato il: 04 Giu, 2007 at 02:33 AM
-- Versione MySQL: 5.0.24
-- Versione PHP: 4.4.7
-- 
-- Database: `rewrite`
-- 

-- --------------------------------------------------------

-- 
-- Struttura della tabella `news`
-- 

CREATE TABLE `news` (
  `id` int(4) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dump dei dati per la tabella `news`
-- 

INSERT INTO `news` (`id`, `title`, `article`, `slug`) VALUES (1, 'Paul McCartney', 'Sir James Paul McCartney MBE (Born: 18 June 1942 ) is an iconic Grammy Award-winning English singer, songwriter and multi-instrumentalist who first gained worldwide fame as one of the founding members of The Beatles. McCartney and John Lennon formed ''one of the most influential'' and successful songwriting partnerships and ''wrote some of the most popular music in rock music history''.[1] Following his departure, McCartney launched a successful solo career and formed the band Wings with his wife, Linda McCartney. McCartney has also worked on film scores, classical music, and ambient/electronic music. He has released a large catalogue of songs as a solo artist, and has taken part in projects to assist international charities.', 'paul-mccartney'),
(2, 'The Kinks', 'rock group formed in 1963 by lead singer-songwriter Ray Davies and his brother, lead guitarist and vocalist, Dave Davies. The band''s early hard-driving singles set a standard in the mid-1960s for Rock & Roll, while albums such as Face to Face,[1] Something Else, Village Green, Arthur and Muswell Hillbillies are highly regarded by fans, critics, and peers alike, and are considered amongst the most influential recordings of the era.[2] In the United States, The Kinks are categorised as a British Invasion band, along with the other members of the so-called Big Four (including The Beatles, The Rolling Stones and The Who). Despite being less commercially successful than these three contemporaries, the band is cited among them as one of the most important and influential rock bands of all time.[3]', 'the-kinks'),
(3, 'Glenn Gould', 'Glenn Herbert Gould (September 25, 1932 â€“ October 4, 1982) was a Canadian pianist, noted especially for his recordings of the music of Johann Sebastian Bach. He gave up concert performances in 1964, dedicating himself to the recording studio for the rest of his career, and performances for television and radio.', 'glenn-gould');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `options`
-- 

CREATE TABLE `options` (
  `op_id` int(4) NOT NULL auto_increment,
  `op_name` varchar(255) NOT NULL,
  `op_value` enum('yes','no') NOT NULL,
  PRIMARY KEY  (`op_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dump dei dati per la tabella `options`
-- 

INSERT INTO `options` (`op_id`, `op_name`, `op_value`) VALUES (1, 'permalinks', 'no');
