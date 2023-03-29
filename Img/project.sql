-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 08 Ιαν 2022 στις 10:45:55
-- Έκδοση διακομιστή: 10.4.22-MariaDB
-- Έκδοση PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `project`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `comingup`
--

CREATE TABLE `comingup` (
  `id` int(11) NOT NULL,
  `moviename` varchar(255) NOT NULL,
  `movieimg` varchar(50) NOT NULL,
  `moviedescription` varchar(255) NOT NULL,
  `movieactors` varchar(255) NOT NULL,
  `movietime` varchar(50) NOT NULL,
  `moviegenre` varchar(50) NOT NULL,
  `movietrailer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `comingup`
--

INSERT INTO `comingup` (`id`, `moviename`, `movieimg`, `moviedescription`, `movieactors`, `movietime`, `moviegenre`, `movietrailer`) VALUES
(1, 'Army of Thieves', './img/movies/armyofthieves.jpg', 'In this prequel to \\\"Army of the Dead,\\\" a mysterious woman recruits bank teller Dieter to assist in a heist of impossible-to-crack safes across Europe.', 'Ruby O. Fee, Nathalie Emmanuel, Stuart Martin, Matthias Schweighöfer.', '2h 7m', 'Thriller', 'https://www.youtube.com/embed/Ith2WetKXlg'),
(2, 'The Matrix Resurrections', './img/movies/thematrix.jpg', 'Plagued by strange memories, Neo\\\'s life takes an unexpected turn when he finds himself back inside the Matrix.', 'Keanu Reeves, Priyanka Chopra, Yahya Abdul-Mateen II, Carrie-Anne Moss.', '2h 28m', 'Sci-fi/Action.', 'https://www.youtube.com/embed/9ix7TUGVYIo'),
(3, 'Outside the Wire', './img/movies/outsidethewire.jpg', 'Leo, an android super-soldier, and Harp, a drone pilot, face several difficulties while trying to stop a nuclear attack.', 'Anthony Mackie, Damson Idris, Emily Beecham, Kristina Tonteri?Young.', '1h 55m', 'Action/Adventure.', 'https://www.youtube.com/embed/u8ZsUivELbs');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `playingnow`
--

CREATE TABLE `playingnow` (
  `ID` int(11) NOT NULL,
  `moviename` varchar(50) NOT NULL,
  `moviedescription` varchar(255) NOT NULL,
  `movieactors` varchar(50) NOT NULL,
  `moviegenres` varchar(50) NOT NULL,
  `movietime` varchar(50) NOT NULL,
  `movieimg` varchar(50) NOT NULL,
  `movietrailer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `playingnow`
--

INSERT INTO `playingnow` (`ID`, `moviename`, `moviedescription`, `movieactors`, `moviegenres`, `movietime`, `movieimg`, `movietrailer`) VALUES
(1, 'Red Notice', 'In the world of international crime, an Interpol agent attempts to hunt down and capture the world\'s most wanted art thief.', 'Dwayne Johnson, Gal Gadot, Ryan Reynolds, Ritu Ary', 'Action/Comedy', '1h 55m', './img/movies/rednotice.jpg', 'https://www.youtube.com/embed/Pj0wz7zu3Ms'),
(2, 'Hard Kill', 'Mercenaries race against the clock to stop a madman from using a computer program to wreak havoc around the globe.', 'Eva Marie, Jesse Metcalfe, Bruce Willis, Lala Kent', 'Action/Thriller.', '1h 38m', './img/movies/hardkill.jpg', 'https://www.youtube.com/embed/D1yo-zswLw4'),
(3, 'No Time To Die', 'James Bond is enjoying a tranquil life in Jamaica after leaving active service. However, his peace is short-lived as his old CIA friend, Felix Leiter, shows up and asks for help. The mission to rescue a kidnapped scientist turns out to be far more treache', 'Daniel Craig, Rami Malek, Ana de Armas, Naomie Har', 'Action/Adventure.', '2h 43m', './img/movies/notimetodie.jpg', 'https://www.youtube.com/embed/BIhNsAtPbPI'),
(4, 'Rogue Hostage', 'A former Marine races against time to save a group of hostages -- including his young daughter and a congressman -- when armed militants take over his stepfather\'s store.', 'Tyrese Gibson, Holly Taylor, Lauren Vélez, John Ma', 'Action/Thriller.', '1h 33m', './img/movies/roguehostage.jpg', 'https://www.youtube.com/embed/FfMGphOEDL0'),
(5, 'Tenet', 'When a few objects that can be manipulated and used as weapons in the future fall into the wrong hands, a CIA operative, known as the Protagonist, must save the world.', 'Elizabeth Debicki, Robert Pattinson, John David Wa', 'Action/Sci-fi.', '2h 30m', './img/movies/tenet.jpeg', 'https://www.youtube.com/embed/AZGcmvrTX9M'),
(6, 'Infinite', 'Evan can remember things from the past and holds the key to the location of a device that can destroy the world. As a result, he is chased by groups that have their own agenda for the device.', 'Mark Wahlberg, Chiwetel Ejiofor, Sophie Cookson, D', 'Action/Sci-fi.', '1h 46m', './img/movies/infinite.jpg', 'https://www.youtube.com/embed/_WWEOCQGxSw'),
(7, 'Hypnotic', 'A young woman seeking self-improvement enlists the help of a hypnotist, but the hypnotist engages her in a lethal game of mind manipulation.', 'Kate Siegel, Jason O\'Mara, Dulé Hill, Lucie Guest.', 'Thriller.', '1h 28m', './img/movies/hypnotic.jpg', 'https://www.youtube.com/embed/eHsWYmnXk1o'),
(8, 'The Unholy', 'Alice, a girl with hearing impairment, is able to hear, speak and even heal the ill after having visions of the Virgin Mary. But when a journalist probes into the matter, he unearths a conspiracy.', 'Jeffrey Dean Morgan, Cricket Brown, Marina Mazepa,', 'Horror/Mystery.', '1h 39m', './img/movies/theunholy.jpg', 'https://www.youtube.com/embed/NmQiJPLYzPI'),
(9, 'Scream', 'Twenty-five years after a streak of brutal murders shocked the quiet town of Woodsboro, Calif., a new killer dons the Ghostface mask and begins targeting a group of teenagers to resurrect secrets from the town\'s deadly past.', 'Jenna Ortega, Neve Campbell, David Arquette, Dylan', 'Horror/Thriller.', '1h 54m', './img/movies/scream.jpg', 'https://www.youtube.com/embed/beToTslH17s');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `vkey` varchar(255) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT 0,
  `account_type` int(11) NOT NULL DEFAULT 0,
  `passreset` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `vkey`, `verified`, `account_type`, `passreset`) VALUES
(17, 'test3', 'fecov94489@rezunz.com', 'OTRIANTAFILOSEINAIMALAKAS', 'fc76200235685d27c9139f6b9a8aa71e', 1, 0, '4fb404f4272fbf48a223945d3d890359'),
(18, 'test2', 'kehoy43952@rubygon.com', '098f6bcd4621d373cade4e832627b4f6', 'cd3c20cfd51b74e674616be82864559a', 1, 0, 'c8d3e38a42bedd4a68e5516b660998af');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `comingup`
--
ALTER TABLE `comingup`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `playingnow`
--
ALTER TABLE `playingnow`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `comingup`
--
ALTER TABLE `comingup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT για πίνακα `playingnow`
--
ALTER TABLE `playingnow`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
