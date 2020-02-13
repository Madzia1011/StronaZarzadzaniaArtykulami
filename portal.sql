-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Lut 2020, 15:15
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `portal`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `artykuly`
--

CREATE TABLE `artykuly` (
  `id` int(11) NOT NULL,
  `status` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `tytul` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `pierwszy` tinyint(1) NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `kategoria` int(11) NOT NULL,
  `tagi` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `link` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `artykuly`
--

INSERT INTO `artykuly` (`id`, `status`, `tytul`, `pierwszy`, `text`, `kategoria`, `tagi`, `link`) VALUES
(31, 'Nieaktywny', 'Nie żyje kierowca bydgoskiego autobusu', 0, '\r\n‹ wróć\r\nDo zdarzenia doszło z soboty na niedzielę. Brały w nim udział nocne autobusy: linii nr 31 i nr 32. Około godz. 2 na ul. Bernardyńskiej, na wysokości placu Kościelskich, jeden z nich nagle zjechał na przeciwległy pas i uderzył w autobus jadący z naprzeciwka. Aż 18 osób wymagało pomocy medycznej, część z nich trafiła do szpitala. Najpoważniejsze obrażenia odnieśli kierowcy pojazdów.\r\n\r\nWczoraj wieczorem rodzina jednego z nich przysłała do redakcji \"Gazety Pomorskiej\" oświadczenie, w którym poinformowała jego śmierci: \"W dniu 10 czerwca w godzinach wieczornych odszedł nasz ukochany mąż, ojciec i przyjaciel Robert Mieczkowski, kierowca autobusu ranny w sobotnim wypadku w centrum Bydgoszczy. Bardzo dziękujemy wszystkim za wsparcie, pomoc oraz zainteresowanie w tych niezwykle trudnych dla nas chwilach. Jednocześnie bardzo prosimy przedstawicieli mediów o uszanowanie naszej żałoby i nie kontaktowanie się z nami w sprawie naszej tragedii\".\r\n\r\nJak wynika z dotychczasowych ustaleń, zmarłym nie jest kierowca, którego pojazd zjechał na przeciwległy pas, tylko kierujący drugim z autobusów. Ten pierwszy usłyszał zarzut spowodowania wypadku, w którym inne osoby doznały śmierci lub ciężkiego uszczerbku na zdrowiu. To przestępstwo zagrożone karą do ośmiu lat więzienia. Nadzór nad sprawą sprawuje prokuratura. Śledczy w ciągu najbliższych tygodni m.in. przepytają świadków zdarzenia i sprawdzą nagrania z monitoringu. To pozwoli im ustalić przebieg wydarzeń i być może również przyczynę wypadku.', 3, 'śmierć, kierowca, wypadek, bydgoszcz', 'https://s10.ifotos.pl/img/zniczpng_qsxspsr.png'),
(32, 'Aktywny', 'Jubileusz Chóru Akademii Morskiej w Szczecinie', 1, 'Wspólne Brzmienia: 15 lat Chóru AM w Szczecinie & Komeda Project.\r\nPlanowana tegoroczna szósta edycja projektu Wspólne Brzmienia zapowiada się wyjątkowo nie tylko ze względu na oryginalne połączenie gatunków muzycznych oraz udział wspaniałych artystów, ale również towarzyszące wydarzeniu obchody jubileuszu 15-lecia działalności Chór Akademii Morskiej w Szczecinie\r\n\r\nTym razem, zespół pod dyrekcją Sylwii Fabiańczyk-Makuch przeniesie widzów w świat nowatorskich i niespotykanych brzmień, jak również przedstawi swoją szeroką i utytułowaną działalność. W pierwszej części koncertu jeden z najbardziej cenionych chórów akademickich w Polsce zabierze publiczność w fascynującą muzyczną podróż, ukazującą różnorodny repertuar a cappella, który zagościł na krajowych oraz światowych scenach muzycznych przez ostatnie pięć lat.\r\nDruga część koncertu będzie kontynuacją autorskiego projektu Chóru Akademii Morskiej w Szczecinie Wspólne Brzmienia. Do udziału w szóstej edycji organizatorzy zaprosili znakomity zespół- Jazz Ensemble pod kierownictwem Katarzyny Stroińskiej-Sierant, która specjalnie na tę okazję stworzyła oryginalne aranżacje na skład jazzowy, kwartet smyczkowy, solistkę oraz chór.\r\n\r\nKoncert uświetni wybitna polska wokalistka jazzowa, Dorota Miśkiewicz. Tegoroczna edycja będzie hołdem dla twórczości Krzysztof Komeda, polskiego kompozytora i pianisty, twórcy muzyki filmowej oraz pioniera jazzu nowoczesnego w Polsce, którego kompozycje (m.in. do filmów Romana Polańskiego) stały się kultowymi symbolami światowej kinematografii.\r\nWydarzeniu towarzyszyć będzie profesjonalna oprawa multimedialna, która stanowi dla widzów nieodłączny, atrakcyjny element „Wspólnych Brzmień\".\r\n\r\nKoncert poprowadzi Michał Janicki.\r\n\r\nPartnerem wydarzenia jest Filharmonia im. Mieczysława Karłowicza w Szczecinie. Projekt współfinansowany jest przez Województwo Zachodniopomorskie i Miasto Szczecin.', 1, 'koncert, cham, chor, am, szczecin', 'https://s5.ifotos.pl/img/plakatjpg_qsxspsw.jpg'),
(33, 'Aktywny', 'Wrocław. Nożownik o motywach ataku na księdza: oczywiste. Jest aresztowany', 0, 'Trzymiesięczny areszt dla 56-letniego Zygmunta W., który nożem ranił księdza we Wrocławiu. Mężczyzna usłyszał wcześniej zarzut usiłowania zabójstwa. Miał też zdradzić motyw ataku. Podejrzany we wtorkowe przedpołudnie został przewieziony do wrocławskiego sądu.\r\n\r\n- Sąd uwzględni wniosek prokuratury i aresztował podejrzanego na trzy miesiące - powiedział RMF FM prok. Sebastian Chudaszek z Prokuratury Rejonowej dla Wrocławia Śródmieście.Zygmunt W. podszedł do ks. dra Ireneusza Bakalarczyka - kierownika notariatu wrocławskiej kurii i duszpasterza Duszpasterstwa Wiernych Tradycji Łacińskiej - który szedł akurat do kościoła Najświętszej Marii Panny na Piasku we Wrocławiu.\r\n\r\nPo krótkiej rozmowie 56-latek ugodził duchownego nożem w klatkę piersiową. Napastnika obezwładnili przechodnie.', 1, 'nożownik, wrocław, motyw, przechodnie', 'https://s5.ifotos.pl/img/nozjpg_qsxspsq.jpg'),
(34, 'Aktywny', 'Małgorzata Rozenek: \"Naszą jedyną nadzieją jest procedura in vitro\"', 0, 'Premiera nowego sezonu \"Projektu Lady\", programu którego gospodynią jest Małgorzata Rozenek, to czas wzmożonej pracy gwiazdy: chętnie umawia się na wywiady, by promować program TVN. W rozmowie z tygodnikiem \"Party\" po kilku obowiązkowych zdaniach na temat \"Projektu Lady\" schodzi na temat niezwykle ważny: in vitro.\r\n\r\nRozenek właśnie wydała książę, w której wielu ekspertów odpowiada na pytania par, które zmagają się z problemem niepłodności. Opisuje także swoją historię. Dzisiaj gwiazda jest mamą dwóch chłopców (z małżeństwa z Jackiem Rozenkiem), ale dla nikogo nie jest tajemnicą, że Radek i ona marzą jeszcze o wspólnym dziecku\r\n\r\n- Spełnienie tego marzenia nie jest proste. Naszą jedyną nadzieją jest procedura in vitro, przez którą przechodzimy - przyznała otwarcie Małgonia.', 1, 'rozek, in-vitro, gazeta, plotki', 'https://s6.ifotos.pl/img/NjUxMTU3Y_qsxqawa.jpg'),
(35, 'Aktywny', 'Taylor Swift z teledyskiem do nowego singla. Polski aktor oraz niespodziewana zgoda z Katy Perry', 0, 'aylor Swift wydała teledysk do wypuszczonego w piątek singla \"You Need To Calm Down\". W wideoklipie mamy dość zaskakującą scenę z Katy Perry, bowiem wokalistki pogodziły się. Zobaczymy też polskiego aktora.', 1, 'taylor, swift, teledysk, pop', 'https://s6.ifotos.pl/img/NjUxMTU3Y_qsxqasp.jpg'),
(36, 'Aktywny', 'Nowy news', 0, 'Jakaś treść', 1, 'jakieś, muzyka', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `nazwa` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`) VALUES
(1, 'Muzyka'),
(2, 'Książka'),
(3, 'Filmy'),
(4, 'Motoryzacja');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(10) NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `rejestracja` date NOT NULL,
  `logowanie` date NOT NULL,
  `uprawnienia` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `email`, `rejestracja`, `logowanie`, `uprawnienia`) VALUES
(1, 'admin', '7b2e9f54cdff413fcde01f330af6896c3cd7e6cd', 'admin@admin.pl', '2019-06-05', '2019-06-03', 1),
(15, 'madzia', '446161f7b3f8acb37bbb6164fb6a46c11f188a8a', 'madzia@onet.pl', '2019-06-10', '2019-06-10', 0),
(17, 'ilonka', 'cc3d02152f28081a6eee8094e69cfbb1dc9d70bc', 'p@gmail.com', '2019-06-17', '2019-06-17', 1),
(18, 'ktos', '409eeb2dcaf62355f5a8ab3908314ceb161ce7d1', 'ktos@cos.pl', '2019-06-18', '2019-06-18', 1),
(19, '', '10a34637ad661d98ba3344717656fcc76209c2f8', '', '2019-06-18', '2019-06-18', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `artykuly`
--
ALTER TABLE `artykuly`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `artykuly`
--
ALTER TABLE `artykuly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
