-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 15 Sty 2023, 12:59
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `syst_zgl`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE `admins` (
  `ID_admins` int(11) NOT NULL,
  `login` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`ID_admins`, `login`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees`
--

CREATE TABLE `employees` (
  `ID_employees` int(11) NOT NULL,
  `login` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `employees`
--

INSERT INTO `employees` (`ID_employees`, `login`, `password`) VALUES
(9, 'jacek', 'jacek');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `requests`
--

CREATE TABLE `requests` (
  `id_request` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `client` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `owner_company` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `warranty_date` date DEFAULT NULL,
  `warranty_number` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `location` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `vehicle_type` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `vehicle_serial_number` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `mileage` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `error_code` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `description` longtext COLLATE utf8_polish_ci NOT NULL,
  `response` longtext COLLATE utf8_polish_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_polish_ci NOT NULL DEFAULT 'otwarte'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `requests`
--

INSERT INTO `requests` (`id_request`, `date`, `client`, `purchase_date`, `owner_company`, `warranty_date`, `warranty_number`, `location`, `phone_number`, `vehicle_type`, `vehicle_serial_number`, `mileage`, `error_code`, `subject`, `description`, `response`, `status`) VALUES
(23, '2022-12-17 22:20:10', 'user', '2020-07-12', 'Janos', '2026-07-12', '924728383', 'Poznań', '501501501', 'Ciągnik', 'JSUW82828SH', '12000', '', 'Ciągnik nie skręca', 'Dzień dobry,\r\nw trakcie prac na polu doszło do uszkodzenia jakiegoś podzespołu odpowiadającego za skręcanie ciągnikiem. W momencie przekręcenia kierownicy maksymalnie w lewo promień skrętu jest teraz zdecydowanie mniejszy niż wcześniej, a jeśli skręcę w prawo to jest on równie słaby. Proszę o pilną pomoc w weryfikacji usterki.', '', 'nowe'),
(24, '2022-12-17 22:25:49', 'user', '2020-07-12', 'Janos', '2026-07-12', '924728383', 'Poznań', '501501501', 'Ciągnik', 'JSUW82828SH', '12000', '02813', 'Ciągnik nie odpala', 'Dzień dobry,\r\ndzisiaj z rana próba odpalenia ciągnika niestety zakończyła się dla mnie niepowodzeniem. Silnik niby kręci, ale nie do końca rozumiem dlaczego nie dochodzi do zapłonu. Maszyna przechodziła kompletny serwis planowo 6 miesięcy temu tak jak było to zaplanowane.', 'Dzień dobry, \r\nnajprawdopodobniej może to być wina świec zapłonowych wadliwej partii, które szybko ulegały \"wypaleniu\". Prosimy o kontakt w celu ustalenia ponownej wizyty w serwisie w celu głębszej diagnozy powstałego problemu.\r\nPozdrawiam, Jacek.', 'zamknięte'),
(25, '2022-12-17 22:29:29', 'blazej', '2020-06-17', 'Hulaj', '2026-06-17', '82397423', 'Swarzędz', '222333444', 'Ciągnik', 'SDU8284290S', '9000', '42344', 'Nie działa elektryka w ciągniku', 'Dzień dobry, mam problem z ciągnikiem w którym nie do końca działa poprawnie elektryka. Dopatrzyłem się zwarcia przy oświetleniu - co jakiś czas samoistnie mruga tylny prawy kierunkowskaz oraz podświetlenie tablicy rejestracyjnej. Kod błędu jaki otrzymałem - 42344. Proszę o pomoc co dalej robić. \r\nPozdrawiam, Błażej.', '', 'w realizacji');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID_users` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `vehicle` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `warranty_expires` date DEFAULT NULL,
  `password` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID_users`, `login`, `name`, `surname`, `vehicle`, `warranty_expires`, `password`) VALUES
(1, 'user', 'Mikołaj', 'Inżynierski', 'Ciągnik John Deere', '2023-06-14', 'user'),
(12, 'blazej', 'Błażej', 'Błażejowy', 'Ciągnik Valtra', '2026-06-17', 'blazej');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID_admins`);

--
-- Indeksy dla tabeli `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID_employees`);

--
-- Indeksy dla tabeli `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id_request`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_users`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `admins`
--
ALTER TABLE `admins`
  MODIFY `ID_admins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `employees`
--
ALTER TABLE `employees`
  MODIFY `ID_employees` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `requests`
--
ALTER TABLE `requests`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
