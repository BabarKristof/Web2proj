-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Nov 05. 16:03
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `naplo`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `diak`
--

CREATE TABLE `diak` (
  `id` int(255) NOT NULL,
  `nev` varchar(70) COLLATE utf8_hungarian_ci NOT NULL,
  `osztaly` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `fiu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jegy`
--

CREATE TABLE `jegy` (
  `id` int(255) NOT NULL,
  `diakid` int(255) NOT NULL,
  `datum` date NOT NULL,
  `ertek` int(2) NOT NULL,
  `tipus` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `targyid` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `menuk`
--

CREATE TABLE `menuk` (
  `id` int(11) NOT NULL,
  `oldal_alias` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `oldal_cim` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `oldal_sorrend` int(11) NOT NULL,
  `oldal_felettes` int(11) NOT NULL,
  `aktiv` int(11) NOT NULL,
  `pub_date` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `unpub_date` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `menuk`
--

INSERT INTO `menuk` (`id`, `oldal_alias`, `oldal_cim`, `oldal_sorrend`, `oldal_felettes`, `aktiv`, `pub_date`, `unpub_date`) VALUES
(1, 'bemutatkozas', 'Bemutatkozás', 1, 0, 1, '2011-03-11 00:00:00', '2111-03-11 00:00:00'),
(2, 'reg_log', 'Regisztráció és belépés', 10, 0, 1, '2011-03-11 00:00:00', '2111-03-11 00:00:00'),
(3, 'hiroldal', 'Híroldal', 20, 0, 1, '2011-03-11 00:00:00', '2111-03-11 00:00:00'),
(4, 'alapinfok', 'Alapinfók', 1, 1, 1, '2011-03-11 00:00:00', '2111-03-11 00:00:00'),
(5, 'kiegeszitesek', 'Kiegészítések', 2, 1, 1, '2011-03-11 00:00:00', '2111-03-11 00:00:00'),
(6, 'aloldal_3', '3.sz. aloldal', 10, 4, 1, '2011-03-11 00:00:00', '2111-03-11 00:00:00'),
(404, '', '404-es hiba', 0, 0, 1, '2011-01-01 00:00:00', '2111-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `targy`
--

CREATE TABLE `targy` (
  `id` int(255) NOT NULL,
  `nev` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `kategoria` varchar(40) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(70) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(8, 'asd', '$2y$10$8xZm8XlrnEwHmMyfnUolNeUVdf51cDYljoMpXMZxuLrpUlAf/9TEO', 'asd'),
(9, 'asdfd', '$2y$10$DGnF2L1WvIyEiZdx5QUebutOJjXxJTrdCbpOw8jIizn3eJWhxEe.q', 'asfsdf'),
(10, 'asd123', '$2y$10$wzGfM4Ka.K4jG139oRs/leO61SQC0qmpt8PcbVbBgt77aFfIqTVUi', 'asd123'),
(11, 'Jozsi', '$2y$10$3V8KUJ2WnciJ1EUxxKFKqOL4OP9YzxVafBhzbIRkpNPzpUM8Qo8Pq', 'jozsi@gmail.com'),
(12, 'aaa', '$2y$10$WTiqsoBf/O0ah1qN1sAT7OXQSTJ0K3MXXYmIIMyRBXpkwIK520q96', 'asd@aa.com');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `diak`
--
ALTER TABLE `diak`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `jegy`
--
ALTER TABLE `jegy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diakid` (`diakid`),
  ADD KEY `targyid` (`targyid`);

--
-- A tábla indexei `menuk`
--
ALTER TABLE `menuk`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `targy`
--
ALTER TABLE `targy`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `diak`
--
ALTER TABLE `diak`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `jegy`
--
ALTER TABLE `jegy`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `targy`
--
ALTER TABLE `targy`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `jegy`
--
ALTER TABLE `jegy`
  ADD CONSTRAINT `jegy_ibfk_1` FOREIGN KEY (`diakid`) REFERENCES `diak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jegy_ibfk_2` FOREIGN KEY (`targyid`) REFERENCES `targy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
