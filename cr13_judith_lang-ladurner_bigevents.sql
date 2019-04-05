-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 09:13 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr13_judith_lang-ladurner_bigevents`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `eventName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` time NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `eventType` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventName`, `eventDate`, `eventTime`, `description`, `img`, `capacity`, `email`, `phoneNr`, `address`, `url`, `eventType`) VALUES
(1, 'The Sound of Music', '2019-04-13', '19:00:00', 'Musical von R. Rodgers und O. Hammerstein', 'https://events.wien.info/media/full/Sound_of_Music_8761_Presse.jpg', 200, 'tickets@volksoper.at', '+43 1 513 1 513', 'Volksoper Wien, Waehringer Strasse 78,1090 Wien', 'https://events.wien.info/de/kd/the-sound-of-music/', 'music'),
(2, 'Vienna Philharmonics', '2019-04-06', '15:30:00', 'Ludwig van Beethoven Symphonie Nr. 1 C-Dur, op. 21', 'https://events.wien.info/media/full/MV_GrosserSaal1_1.jpg', 300, 'https://www.musikverein.at/', '+43 1 505 81 90', 'Musikverein, Grosser Saal, Musikvereinsplatz 1, 1010 Wien', 'tickets@musikverein.at', 'music'),
(4, 'Eros Ramazotti', '2019-04-15', '19:30:00', 'Vita Ce N\'é - World Tour', 'https://events.wien.info/media/full/cover_Ramazzotti_140x125.jpg', 4000, 'service@stadthalle.com', '+43 1 79 999 79', 'Wiener Stadthalle Halle D Roland-Rainer-Platz 1  1150 Wien', 'www.stadthalle.com', 'music'),
(5, 'Captain Marvel (3D)', '2019-04-06', '18:10:00', 'Carol Danvers becomes one of the universe\'s most powerful heroes when Earth is caught in the middle of a galactic war between two alien races.', 'https://www.haydnkino.at/FilmImg/captainmarvel.jpg', 120, 'office@haydn.kino', '+43 1 587 22 62', 'English Cinema Haydn Mariahilferstraße 57, A-1060 Vienna', 'https://www.haydnkino.at/Cinema/Overview', 'movie'),
(6, 'Vienna Dance Concourse', '2019-04-12', '10:00:00', 'Bereits zum 26. Mal findet eines der größten internationalen Tanzsportevents im Festsaal des Wiener Rathauses statt.', 'https://cdn.kurier.at/img/100/239/830/ballroom-14314-960-721-290x500.jpg', 100, 'office@foxtrott.at', '+4369912322232', 'Rathaus Wien,  Rathausplatz 1,1010 Wien', 'https://www.events.at/e/vienna-dance-concourse-im-rathaus#st-241717992', 'sport');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
