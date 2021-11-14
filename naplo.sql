-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Nov 14. 19:33
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
(3, 'velemeny', 'Vélemények/Hírek', 20, 0, 1, '2011-03-11 00:00:00', '2111-03-11 00:00:00'),
(4, 'logout', 'Kilépés', 30, 0, 1, '2011-03-11 00:00:00', '2111-03-11 00:00:00'),
(5, 'soap', 'SOAP', 40, 0, 1, '2011-03-11 00:00:00', '2111-03-11 00:00:00'),
(6, 'mnbsoap', 'MNB SOAP', 50, 0, 1, '2011-03-11 00:00:00', '2111-03-11 00:00:00'),
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
  `email` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `VName` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `KName` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `VName`, `KName`) VALUES
(8, 'asd', '$2y$10$8xZm8XlrnEwHmMyfnUolNeUVdf51cDYljoMpXMZxuLrpUlAf/9TEO', 'asd', '', ''),
(9, 'asdfd', '$2y$10$DGnF2L1WvIyEiZdx5QUebutOJjXxJTrdCbpOw8jIizn3eJWhxEe.q', 'asfsdf', '', ''),
(10, 'asd123', '$2y$10$wzGfM4Ka.K4jG139oRs/leO61SQC0qmpt8PcbVbBgt77aFfIqTVUi', 'asd123', '', ''),
(11, 'Jozsi', '$2y$10$3V8KUJ2WnciJ1EUxxKFKqOL4OP9YzxVafBhzbIRkpNPzpUM8Qo8Pq', 'jozsi@gmail.com', '', ''),
(12, 'aaa', '$2y$10$WTiqsoBf/O0ah1qN1sAT7OXQSTJ0K3MXXYmIIMyRBXpkwIK520q96', 'asd@aa.com', '', ''),
(14, 'asd2', '$2y$10$OUkM4AkJlmqA2KzU2T2IduAyq4CRaRulR2RzND1oIyjYIlze7sNf.', 'asd2@asd.com', '', ''),
(15, 'asd3', '$2y$10$lQnDM4kl6Ma9DiQTbdVB0uja9sDSp6p4UqZJ9J7EH/hmaBXu.xRJy', 'asd@asd3.com', '', ''),
(16, 'aa', '$2y$10$mpgbK2eSHSDNPHr..QXxvuD4EyFpSVUERS3pBvEHCq6opSvo2HhdC', 'asd@asd.com', '', ''),
(17, 'asd4', '$2y$10$dMplJVfrqsdNdg8IvWRQQ.C5cyYw2xEveqSnj2VeG0SBrh4umBt76', 'asd@asd4.com', '', ''),
(18, 'asd5', '$2y$10$3T0ZrhclK7QwyFvuJWLTheine9W5SMQnChIf6CIkKpEv1XEaxDmw.', 'asd@gmail.com', 'Pista', 'Bácsi'),
(19, 'Laszlo', '$2y$10$i988V0PDra16IgmFoFEYC.3D/C43XF2uL13xANv50g2iTIZ/hDg1G', 'laszlo@gmail.com', '', ''),
(21, 'Jozsika', '$2y$10$Q2cFRbEMkn1/igUtro6uFuD1OgiElu61sxdkJqBu0JsvPzklUEdya', 'asd@jozsika.hu', 'Jozsef', 'Bacsi'),
(22, 'admin', '$2y$10$oKO.Xd9tLpl/QMl/ktKP8OFuNPfCCxu1PqCA6D2dp1960wOOHGisy', 'admin@admin.hu', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `velemenyek`
--

CREATE TABLE `velemenyek` (
  `id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `velemeny` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `datum` varchar(40) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `velemenyek`
--

INSERT INTO `velemenyek` (`id`, `userid`, `velemeny`, `datum`) VALUES
(16, 8, 'asd', '0000-00-00'),
(17, 18, 'asdasd', '0000-00-00'),
(18, 18, 'asd', '0000-00-00'),
(19, 8, 'sdfs', '0000-00-00'),
(20, 8, 'sdf', '0000-00-00'),
(21, 8, 'asd', '0000-00-00'),
(22, 8, 'asd', '2021-11-11'),
(23, 8, 'asd', '2021-11-11'),
(24, 8, 'sdf', '2021-11-11'),
(25, 8, 'sdfsdf', '2021-11-11'),
(26, 8, 'dfgdfg', '2021-11-11 09:52:08'),
(31, 8, 'sdfs', '2021-11-14 06:09:22'),
(32, 8, '', '2021-11-14 06:12:18'),
(33, 8, '', '2021-11-14 06:12:54'),
(34, 8, '', '2021-11-14 06:12:58'),
(35, 8, 'asd', '2021-11-14 06:15:14'),
(36, 22, 'Teszt 1', '2021-11-14 06:27:55'),
(37, 22, 'Teszt 2', '2021-11-14 06:27:58'),
(38, 22, 'Teszt 3', '2021-11-14 06:28:01'),
(39, 22, 'Teszt 4', '2021-11-14 06:28:03');

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
-- A tábla indexei `velemenyek`
--
ALTER TABLE `velemenyek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `velemenyek`
--
ALTER TABLE `velemenyek`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `jegy`
--
ALTER TABLE `jegy`
  ADD CONSTRAINT `jegy_ibfk_1` FOREIGN KEY (`diakid`) REFERENCES `diak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jegy_ibfk_2` FOREIGN KEY (`targyid`) REFERENCES `targy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `velemenyek`
--
ALTER TABLE `velemenyek`
  ADD CONSTRAINT `velemenyek_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
