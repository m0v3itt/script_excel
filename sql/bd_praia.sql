-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Set-2022 às 18:02
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_praia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_dias`
--

CREATE TABLE `tb_dias` (
  `id_dia` int(11) NOT NULL,
  `dia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_dias`
--

INSERT INTO `tb_dias` (`id_dia`, `dia`) VALUES
(1, '9/1/2022'),
(2, '9/2/2022'),
(3, '9/3/2022'),
(4, '9/4/2022'),
(5, '9/5/2022'),
(6, '9/6/2022'),
(7, '9/7/2022'),
(8, '9/8/2022'),
(9, '9/9/2022'),
(10, '9/10/2022'),
(11, '9/11/2022');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_disponibilidade`
--

CREATE TABLE `tb_disponibilidade` (
  `id_nadador` int(11) DEFAULT NULL,
  `turno` varchar(255) DEFAULT NULL,
  `id_dia` int(11) DEFAULT NULL,
  `preferencias` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_disponibilidade`
--

INSERT INTO `tb_disponibilidade` (`id_nadador`, `turno`, `id_dia`, `preferencias`) VALUES
(4438, 'Manhã Tarde', 1, 'q'),
(4438, 'Manhã Tarde', 2, 'q'),
(4438, 'Manhã Tarde', 3, 'q'),
(4438, 'Manhã Tarde', 4, 'q'),
(4438, 'Tarde', 5, 'q'),
(9191, 'Manhã Tarde', 1, '0'),
(9191, 'Manhã Tarde', 2, '0'),
(9191, 'Manhã Tarde', 3, '0'),
(6541, 'Manhã Tarde', 1, 'Estrela do mar'),
(6541, 'Manhã Tarde', 2, 'Estrela do mar'),
(6541, 'Manhã Tarde', 3, 'Estrela do mar'),
(19718, 'Manhã Tarde', 1, 'r'),
(19718, 'Manhã Tarde', 4, 'r'),
(19718, 'Manhã Tarde', 6, 'r'),
(19718, 'Manhã Tarde', 8, 'r'),
(19718, 'Manhã Tarde', 10, 'r'),
(19718, 'Manhã Tarde', 11, 'r'),
(20076, 'Manhã Tarde', 2, NULL),
(20076, 'Manhã Tarde', 7, NULL),
(20934, 'Manhã Tarde', 1, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 'Manhã Tarde', 2, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 'Manhã Tarde', 3, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 'Manhã Tarde', 4, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 'Manhã Tarde', 5, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 'Manhã Tarde', 6, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 'Manhã Tarde', 7, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 'Manhã Tarde', 8, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 'Manhã Tarde', 9, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 'Manhã Tarde', 10, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 'Manhã Tarde', 11, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(15628, 'Manhã Tarde', 3, 'Granja'),
(15628, 'Manhã Tarde', 4, 'Granja'),
(15628, 'Manhã Tarde', 10, 'Granja'),
(15628, 'Manhã Tarde', 11, 'Granja'),
(11380, 'Manhã Tarde', 3, 'Amar'),
(11380, 'Manhã Tarde', 8, 'Amar'),
(11380, 'Manhã Tarde', 9, 'Amar'),
(11380, 'Manhã Tarde', 10, 'Amar'),
(19542, 'Manhã Tarde', 9, 'oliveira do douro e sereia da costa verde'),
(19539, 'Manhã Tarde', 7, 'Praias norte'),
(19539, 'Manhã Tarde', 9, 'Praias norte'),
(19539, 'Manhã Tarde', 10, 'Praias norte'),
(19539, 'Manhã Tarde', 11, 'Praias norte'),
(16174, 'Manhã Tarde', 1, NULL),
(16174, 'Manhã Tarde', 2, NULL),
(16174, 'Manhã Tarde', 3, NULL),
(16174, 'Manhã Tarde', 4, NULL),
(16174, 'Manhã Tarde', 5, NULL),
(16174, 'Manhã Tarde', 6, NULL),
(16174, 'Manhã Tarde', 7, NULL),
(16174, 'Manhã Tarde', 8, NULL),
(16174, 'Manhã Tarde', 9, NULL),
(16174, 'Manhã Tarde', 10, NULL),
(16174, 'Manhã Tarde', 11, NULL),
(16186, 'Manhã Tarde', 1, 'Avintes e sereia'),
(16186, 'Manhã Tarde', 5, 'Avintes e sereia'),
(16186, 'Manhã Tarde', 6, 'Avintes e sereia'),
(16186, 'Manhã Tarde', 7, 'Avintes e sereia'),
(16186, 'Manhã Tarde', 8, 'Avintes e sereia'),
(16186, 'Manhã Tarde', 9, 'Avintes e sereia'),
(13197, 'Manhã Tarde', 2, 'Arnelas e lávadores norte amar'),
(13197, 'Manhã Tarde', 3, 'Arnelas e lávadores norte amar'),
(13197, 'Manhã Tarde', 4, 'Arnelas e lávadores norte amar'),
(13197, 'Manhã Tarde', 6, 'Arnelas e lávadores norte amar'),
(13197, 'Manhã Tarde', 7, 'Arnelas e lávadores norte amar'),
(13197, 'Manhã Tarde', 8, 'Arnelas e lávadores norte amar'),
(13197, 'Manhã Tarde', 10, 'Arnelas e lávadores norte amar'),
(13197, 'Manhã Tarde', 11, 'Arnelas e lávadores norte amar'),
(19735, 'Manhã Tarde', 3, 'Praia Estrela do Mar'),
(19735, 'Manhã Tarde', 4, 'Praia Estrela do Mar'),
(19735, 'Manhã Tarde', 10, 'Praia Estrela do Mar'),
(19735, 'Manhã Tarde', 11, 'Praia Estrela do Mar'),
(19803, 'Manhã Tarde', 1, 'ar d mar mar a vista dart'),
(19803, 'Manhã', 2, 'ar d mar mar a vista dart'),
(19803, 'Manhã Tarde', 3, 'ar d mar mar a vista dart'),
(19803, 'Manhã', 4, 'ar d mar mar a vista dart'),
(19803, 'Tarde', 5, 'ar d mar mar a vista dart'),
(19803, 'Manhã Tarde', 6, 'ar d mar mar a vista dart'),
(19803, 'Manhã Tarde', 7, 'ar d mar mar a vista dart'),
(19803, 'Manhã Tarde', 8, 'ar d mar mar a vista dart'),
(19803, 'Manhã Tarde', 9, 'ar d mar mar a vista dart'),
(19803, 'Manhã Tarde', 10, 'ar d mar mar a vista dart'),
(19803, 'Manhã Tarde', 11, 'ar d mar mar a vista dart'),
(18789, 'Manhã Tarde', 1, 'Praia Sereira da Costa Verde'),
(18789, 'Manhã Tarde', 2, 'Praia Sereira da Costa Verde'),
(18789, 'Manhã Tarde', 3, 'Praia Sereira da Costa Verde'),
(18789, 'Manhã Tarde', 4, 'Praia Sereira da Costa Verde'),
(18789, 'Manhã Tarde', 5, 'Praia Sereira da Costa Verde'),
(18789, 'Manhã Tarde', 6, 'Praia Sereira da Costa Verde'),
(18789, 'Manhã Tarde', 7, 'Praia Sereira da Costa Verde'),
(18789, 'Manhã Tarde', 8, 'Praia Sereira da Costa Verde'),
(18789, 'Manhã Tarde', 9, 'Praia Sereira da Costa Verde'),
(18789, 'Manhã Tarde', 10, 'Praia Sereira da Costa Verde'),
(18789, 'Manhã Tarde', 11, 'Praia Sereira da Costa Verde'),
(20078, 'Manhã Tarde', 1, 'Marus'),
(20078, 'Manhã Tarde', 2, 'Marus'),
(20078, 'Manhã Tarde', 4, 'Marus'),
(20078, 'Manhã Tarde', 5, 'Marus'),
(20078, 'Manhã Tarde', 6, 'Marus'),
(20078, 'Manhã Tarde', 7, 'Marus'),
(20078, 'Manhã Tarde', 8, 'Marus'),
(20078, 'Manhã Tarde', 9, 'Marus'),
(20078, 'Manhã Tarde', 10, 'Marus'),
(20078, 'Manhã Tarde', 11, 'Marus'),
(21280, 'Manhã Tarde', 1, 'Aguda Norte'),
(21280, 'Manhã Tarde', 5, 'Aguda Norte'),
(21280, 'Manhã Tarde', 6, 'Aguda Norte'),
(21280, 'Manhã Tarde', 7, 'Aguda Norte'),
(21280, 'Manhã Tarde', 10, 'Aguda Norte'),
(21280, 'Manhã Tarde', 11, 'Aguda Norte'),
(12345, 'Manhã Tarde', 1, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 'Manhã Tarde', 2, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 'Manhã Tarde', 3, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 'Manhã Tarde', 4, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 'Manhã Tarde', 5, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 'Manhã Tarde', 6, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 'Manhã Tarde', 7, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 'Manhã Tarde', 8, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 'Manhã Tarde', 9, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 'Manhã Tarde', 10, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 'Manhã Tarde', 11, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(21632, 'Manhã Tarde', 1, 'manuel teixeira daikiri'),
(21632, 'Manhã Tarde', 2, 'manuel teixeira daikiri'),
(21632, 'Manhã Tarde', 3, 'manuel teixeira daikiri'),
(21632, 'Manhã Tarde', 4, 'manuel teixeira daikiri'),
(21632, 'Manhã Tarde', 5, 'manuel teixeira daikiri'),
(21632, 'Manhã Tarde', 7, 'manuel teixeira daikiri'),
(21632, 'Manhã Tarde', 8, 'manuel teixeira daikiri'),
(21632, 'Manhã Tarde', 9, 'manuel teixeira daikiri'),
(21632, 'Manhã Tarde', 10, 'manuel teixeira daikiri'),
(21632, 'Manhã Tarde', 11, 'manuel teixeira daikiri'),
(23818, 'Manhã Tarde', 1, 'Praia da Madalena'),
(23818, 'Manhã Tarde', 4, 'Praia da Madalena'),
(23818, 'Manhã Tarde', 7, 'Praia da Madalena'),
(23818, 'Manhã Tarde', 8, 'Praia da Madalena'),
(23818, 'Manhã Tarde', 9, 'Praia da Madalena'),
(21631, 'Manhã Tarde', 1, 'Daikiri'),
(21631, 'Manhã Tarde', 2, 'Daikiri'),
(21631, 'Manhã Tarde', 5, 'Daikiri'),
(21631, 'Manhã Tarde', 6, 'Daikiri'),
(21631, 'Manhã Tarde', 7, 'Daikiri'),
(21631, 'Manhã Tarde', 8, 'Daikiri'),
(21631, 'Manhã Tarde', 9, 'Daikiri'),
(21368, 'Manhã Tarde', 1, 'Brasão estrela daikiri'),
(21368, 'Manhã Tarde', 2, 'Brasão estrela daikiri'),
(21368, 'Manhã Tarde', 3, 'Brasão estrela daikiri'),
(21368, 'Manhã Tarde', 10, 'Brasão estrela daikiri'),
(21368, 'Manhã Tarde', 11, 'Brasão estrela daikiri'),
(21849, 'Manhã Tarde', 7, 'A mesma praia que o Thiago'),
(21849, 'Manhã Tarde', 8, 'A mesma praia que o Thiago'),
(21813, 'Manhã Tarde', 1, 'Crestuma'),
(21813, 'Manhã Tarde', 2, 'Crestuma'),
(21813, 'Manhã Tarde', 3, 'Crestuma'),
(21813, 'Manhã Tarde', 4, 'Crestuma'),
(21813, 'Manhã Tarde', 5, 'Crestuma'),
(21813, 'Manhã Tarde', 6, 'Crestuma'),
(21813, 'Manhã Tarde', 7, 'Crestuma'),
(21813, 'Manhã Tarde', 8, 'Crestuma'),
(21813, 'Manhã Tarde', 9, 'Crestuma'),
(21813, 'Manhã Tarde', 10, 'Crestuma'),
(21813, 'Manhã Tarde', 11, 'Crestuma'),
(21811, 'Manhã Tarde', 1, 'Lavadores sul'),
(21811, 'Manhã Tarde', 2, 'Lavadores sul'),
(21811, 'Manhã Tarde', 3, 'Lavadores sul'),
(21811, 'Manhã Tarde', 4, 'Lavadores sul'),
(21811, 'Manhã Tarde', 5, 'Lavadores sul'),
(21811, 'Manhã Tarde', 6, 'Lavadores sul'),
(21811, 'Manhã Tarde', 7, 'Lavadores sul'),
(21811, 'Manhã Tarde', 8, 'Lavadores sul'),
(21811, 'Manhã Tarde', 9, 'Lavadores sul'),
(21811, 'Manhã Tarde', 10, 'Lavadores sul'),
(21811, 'Manhã Tarde', 11, 'Lavadores sul'),
(19719, 'Manhã Tarde', 1, 'Estrela do mar'),
(19719, 'Manhã Tarde', 2, 'Estrela do mar'),
(19719, 'Manhã Tarde', 3, 'Estrela do mar'),
(19719, 'Manhã Tarde', 4, 'Estrela do mar'),
(19719, 'Manhã Tarde', 5, 'Estrela do mar'),
(19719, 'Manhã Tarde', 6, 'Estrela do mar'),
(19719, 'Manhã Tarde', 7, 'Estrela do mar'),
(19719, 'Manhã Tarde', 8, 'Estrela do mar'),
(19719, 'Manhã Tarde', 9, 'Estrela do mar'),
(19719, 'Manhã Tarde', 10, 'Estrela do mar'),
(19719, 'Manhã Tarde', 11, 'Estrela do mar'),
(21825, 'Manhã Tarde', 1, 'Praia Madalena'),
(21825, 'Manhã Tarde', 3, 'Praia Madalena'),
(21825, 'Manhã Tarde', 7, 'Praia Madalena'),
(21825, 'Manhã Tarde', 8, 'Praia Madalena'),
(21825, 'Manhã Tarde', 9, 'Praia Madalena'),
(21825, 'Manhã Tarde', 10, 'Praia Madalena'),
(21825, 'Manhã Tarde', 11, 'Praia Madalena'),
(21822, 'Manhã Tarde', 5, 'Canide norte'),
(21822, 'Manhã Tarde', 6, 'Canide norte'),
(21822, 'Manhã Tarde', 7, 'Canide norte'),
(21822, 'Manhã Tarde', 8, 'Canide norte'),
(21822, 'Manhã Tarde', 9, 'Canide norte'),
(21822, 'Manhã Tarde', 10, 'Canide norte'),
(21822, 'Manhã Tarde', 11, 'Canide norte'),
(22402, 'Manhã Tarde', 5, 'Moita e basaloco'),
(22402, 'Manhã Tarde', 6, 'Moita e basaloco'),
(22402, 'Manhã Tarde', 7, 'Moita e basaloco'),
(22402, 'Manhã Tarde', 8, 'Moita e basaloco'),
(22402, 'Manhã Tarde', 10, 'Moita e basaloco'),
(22402, 'Manhã Tarde', 11, 'Moita e basaloco'),
(21634, 'Manhã Tarde', 4, 'Praia de Brito'),
(21634, 'Manhã Tarde', 5, 'Praia de Brito'),
(21634, 'Manhã Tarde', 6, 'Praia de Brito'),
(21634, 'Manhã Tarde', 7, 'Praia de Brito'),
(21634, 'Manhã Tarde', 8, 'Praia de Brito'),
(21634, 'Manhã Tarde', 9, 'Praia de Brito'),
(21634, 'Manhã Tarde', 10, 'Praia de Brito'),
(21634, 'Manhã Tarde', 11, 'Praia de Brito'),
(21814, 'Tarde', 4, 'Norte'),
(22793, 'Manhã Tarde', 3, 'Agosto'),
(22793, 'Manhã Tarde', 5, 'Agosto'),
(22793, 'Manhã Tarde', 7, 'Agosto'),
(22793, 'Manhã Tarde', 9, 'Agosto'),
(22793, 'Manhã Tarde', 10, 'Agosto'),
(22766, 'Manhã Tarde', 1, 'Areinho de Avintes'),
(22766, 'Manhã Tarde', 2, 'Areinho de Avintes'),
(22766, 'Tarde', 4, 'Areinho de Avintes'),
(22766, 'Manhã Tarde', 5, 'Areinho de Avintes'),
(22766, 'Manhã Tarde', 6, 'Areinho de Avintes'),
(22766, 'Manhã Tarde', 7, 'Areinho de Avintes'),
(22766, 'Manhã Tarde', 8, 'Areinho de Avintes'),
(22766, 'Manhã Tarde', 9, 'Areinho de Avintes'),
(22766, 'Manhã Tarde', 11, 'Areinho de Avintes'),
(23000, 'Manhã Tarde', 1, 'Praia Cães'),
(23000, 'Manhã Tarde', 2, 'Praia Cães'),
(23000, 'Manhã Tarde', 5, 'Praia Cães'),
(23000, 'Manhã Tarde', 6, 'Praia Cães'),
(23000, 'Manhã Tarde', 7, 'Praia Cães'),
(23000, 'Manhã Tarde', 8, 'Praia Cães'),
(23000, 'Manhã Tarde', 9, 'Praia Cães'),
(23000, 'Manhã Tarde', 10, 'Praia Cães'),
(23000, 'Manhã Tarde', 11, 'Praia Cães'),
(22610, 'Manhã Tarde', 1, 'Canidelo'),
(22610, 'Manhã', 2, 'Canidelo'),
(22610, 'Manhã Tarde', 3, 'Canidelo'),
(22610, 'Manhã Tarde', 4, 'Canidelo'),
(22610, 'Manhã', 5, 'Canidelo'),
(22610, 'Manhã', 6, 'Canidelo'),
(22610, 'Manhã Tarde', 7, 'Canidelo'),
(22610, 'Manhã Tarde', 8, 'Canidelo'),
(22600, 'Manhã Tarde', 2, NULL),
(22600, 'Manhã Tarde', 3, NULL),
(22600, 'Manhã Tarde', 5, NULL),
(22600, 'Manhã Tarde', 6, NULL),
(22600, 'Manhã Tarde', 7, NULL),
(22600, 'Manhã Tarde', 9, NULL),
(22600, 'Manhã Tarde', 10, NULL),
(22561, 'Manhã Tarde', 1, 'vibrações paredão ar d mar'),
(22561, 'Manhã Tarde', 2, 'vibrações paredão ar d mar'),
(22561, 'Manhã Tarde', 5, 'vibrações paredão ar d mar'),
(22561, 'Manhã Tarde', 6, 'vibrações paredão ar d mar'),
(22561, 'Manhã Tarde', 7, 'vibrações paredão ar d mar'),
(22561, 'Manhã Tarde', 8, 'vibrações paredão ar d mar'),
(22561, 'Manhã Tarde', 9, 'vibrações paredão ar d mar'),
(17738, 'Manhã', 2, 'Praias mais perto do Porto possível e que paguem refeição uma vez que sou vegan obrigada'),
(17738, 'Manhã', 4, 'Praias mais perto do Porto possível e que paguem refeição uma vez que sou vegan obrigada'),
(17738, 'Manhã', 11, 'Praias mais perto do Porto possível e que paguem refeição uma vez que sou vegan obrigada'),
(22892, 'Manhã Tarde', 1, 'Praia da Granja Barraquinha'),
(22892, 'Manhã Tarde', 2, 'Praia da Granja Barraquinha'),
(22892, 'Manhã Tarde', 5, 'Praia da Granja Barraquinha'),
(22892, 'Manhã Tarde', 6, 'Praia da Granja Barraquinha'),
(22892, 'Manhã Tarde', 7, 'Praia da Granja Barraquinha'),
(22892, 'Manhã Tarde', 8, 'Praia da Granja Barraquinha'),
(22892, 'Manhã Tarde', 10, 'Praia da Granja Barraquinha'),
(22892, 'Manhã Tarde', 11, 'Praia da Granja Barraquinha'),
(22616, 'Manhã Tarde', 1, 'Marcos Vitória Daikiri'),
(22616, 'Manhã Tarde', 2, 'Marcos Vitória Daikiri'),
(22616, 'Manhã Tarde', 3, 'Marcos Vitória Daikiri'),
(22616, 'Manhã Tarde', 5, 'Marcos Vitória Daikiri'),
(22616, 'Manhã Tarde', 6, 'Marcos Vitória Daikiri'),
(22616, 'Manhã Tarde', 7, 'Marcos Vitória Daikiri'),
(22616, 'Manhã Tarde', 8, 'Marcos Vitória Daikiri'),
(22616, 'Manhã Tarde', 9, 'Marcos Vitória Daikiri'),
(18997, 'Manhã Tarde', 1, 'Praias'),
(18997, 'Manhã Tarde', 4, 'Praias'),
(18997, 'Manhã Tarde', 5, 'Praias'),
(18997, 'Manhã Tarde', 6, 'Praias'),
(18997, 'Manhã Tarde', 7, 'Praias'),
(18997, 'Manhã Tarde', 8, 'Praias'),
(18997, 'Manhã Tarde', 11, 'Praias'),
(22785, 'Manhã Tarde', 2, NULL),
(22785, 'Manhã Tarde', 3, NULL),
(22785, 'Manhã Tarde', 7, NULL),
(22785, 'Manhã Tarde', 8, NULL),
(22785, 'Manhã Tarde', 9, NULL),
(22785, 'Manhã Tarde', 10, NULL),
(22785, 'Manhã Tarde', 11, NULL),
(23517, 'Manhã Tarde', 2, NULL),
(23517, 'Manhã Tarde', 5, NULL),
(23517, 'Manhã Tarde', 6, NULL),
(23517, 'Manhã Tarde', 8, NULL),
(23005, 'Manhã Tarde', 1, NULL),
(23005, 'Tarde', 2, NULL),
(23005, 'Manhã Tarde', 3, NULL),
(23005, 'Manhã', 7, NULL),
(23005, 'Manhã', 8, NULL),
(23005, 'Tarde', 10, NULL),
(20557, 'Manhã Tarde', 1, 'Arnelas'),
(20557, 'Manhã Tarde', 3, 'Arnelas'),
(20557, 'Manhã Tarde', 5, 'Arnelas'),
(20557, 'Manhã Tarde', 9, 'Arnelas'),
(20557, 'Manhã Tarde', 11, 'Arnelas'),
(16185, 'Manhã Tarde', 4, 'Arnelas'),
(16185, 'Manhã Tarde', 11, 'Arnelas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `senha` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_login`
--

INSERT INTO `tb_login` (`id`, `user`, `senha`) VALUES
(1, '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'e04c98afe4c3b3a3dca20c1bfa6e0367528a9324d38cfa870815a20bb07a50f0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nadadores`
--

CREATE TABLE `tb_nadadores` (
  `id_nadador` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_nadadores`
--

INSERT INTO `tb_nadadores` (`id_nadador`, `nome`) VALUES
(4438, ' Frederico Azinhais Rosa'),
(6541, ' Hugo Figueiredo'),
(7582, ' Ricardo Sosua'),
(9191, ' Pedro Pereira'),
(11380, ' Ivo Leandro Lima Ribeiro'),
(12138, ' Cesar Braga'),
(12345, ' Rita Carvalho'),
(13197, ' Hugo'),
(14011, ' José Silva'),
(14500, ' Rafael Jorge Moreira Silva'),
(15626, ' Ivo Cardoso'),
(15628, ' Maria Calheiros'),
(16174, ' Eduardo Madureira'),
(16185, ' Ivo'),
(16186, ' Joana Teixeira'),
(16373, ' André Moreira'),
(17249, ' Francisco Ferreira'),
(17738, ' Vitória Isabela'),
(18789, ' Diogo Lopes Pereira'),
(18997, ' Rafael Filipe Marques Silva'),
(19457, ' Afonso'),
(19536, ' André Moita Ribeiro'),
(19539, ' Cláudio Filipe Marques dos Santos'),
(19542, ' Edgar'),
(19547, ' Jose Pedro Oliveira Cardoso'),
(19718, ' Fábio Miguel Rocha da Silva'),
(19719, ' GIL'),
(19730, ' Pedro Miguel Martins Silva'),
(19735, ' Marisa Costa'),
(19803, ' Afonso Martingo'),
(19806, ' Pedro Alexandre Santos Martins'),
(20076, ' Ruben Fernandes'),
(20078, ' Sergio Miguel'),
(20191, ' Pedro Filipe Monteiro Teixeira'),
(20193, ' Hugo da Silva Pascoal'),
(20536, ' Diogo Trindade Pereira'),
(20557, ' Sergio Vieira'),
(20934, ' Diogo Duarte Soares Dias'),
(21123, ' Baltasar Santos'),
(21278, ' David José Araújo Moita'),
(21279, ' Francisco'),
(21280, ' Guilherme Guerreiro Curado'),
(21368, ' Inês Teixeira'),
(21616, ' André de Sousa Botelho Ribeio'),
(21627, ' Gonçalo Moreira dos Santos'),
(21631, ' Pedro Amorim'),
(21632, ' Marcos Daniel Sousa Vitória'),
(21634, ' Roberto de Jesus Aires Teixeira Bastos'),
(21811, ' Carlos Fonseca'),
(21813, ' Emanuel Moreira'),
(21814, ' FERNANDO TIAGO FREIRE COELHO DA COSTA MENDES'),
(21822, ' Pedro Emanuel Mano Lima'),
(21825, ' Rui Américo Belo Ramos'),
(21826, ' Tiago David da Silva Cunha'),
(21849, ' João Miguel da Silva Lourenço'),
(22376, ' Vasco Walker Leitão Moreira Nogueira'),
(22379, ' Luis Alves'),
(22400, ' Ricardo Basaloco'),
(22402, ' Guilherme Oliveira'),
(22561, ' Joao Manuel Monteiro Arouca'),
(22600, ' Diogo Rafael Barbosa Nunes'),
(22604, ' Inês'),
(22610, ' Gonçalo Ferreira'),
(22616, ' Manuel Alves da Silva Teixeira'),
(22706, ' António Guilherme Freitas Moreira Guedes de Almeida'),
(22766, ' José Mota'),
(22785, ' Thiago Teixeira Brandão'),
(22793, ' Samuel da Costa Alves'),
(22892, ' Tiago Filipe Santos Macedo Costa'),
(23000, ' Ana Rocha'),
(23005, ' Juliana Santos'),
(23517, ' Sofia Pratto'),
(23818, ' Diogo Cunha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_praia`
--

CREATE TABLE `tb_praia` (
  `id_praia` int(11) NOT NULL,
  `nome_praia` varchar(255) NOT NULL,
  `turno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_praia`
--

INSERT INTO `tb_praia` (`id_praia`, `nome_praia`, `turno`) VALUES
(1, 'Lavadores Norte - Amar', 'Manhã'),
(2, 'Lavadores Norte - Amar', 'Tarde'),
(3, 'Lavadores Sul - Cremosi', 'Manhã'),
(4, 'Lavadores Sul - Cremosi', 'Tarde'),
(5, 'Pedras Amarelas - Mucaba', 'Manhã'),
(6, 'Pedras Amarelas - Mucaba', 'Tarde'),
(7, 'Estrela do Mar Norte - Marus', 'Manhã'),
(8, 'Estrela do Mar Norte - Marus', 'Tarde'),
(9, 'Estrela do Mar Sul - Mar a vista', 'Manhã'),
(10, 'Estrela do Mar Sul - Mar a vista', 'Tarde'),
(11, 'Salgueiros - Aqua', 'Manhã'),
(12, 'Salgueiros - Aqua', 'Tarde'),
(13, 'Praia da Mimosa - Dart', 'Manhã'),
(14, 'Praia da Mimosa - Dart', 'Tarde'),
(15, 'Sereia da Costa Verde - Bar do Manel', 'Manhã'),
(16, 'Sereia da Costa Verde - Bar do Manel', 'Tarde'),
(17, 'Canide Norte - Grão de areia', 'Manhã'),
(18, 'Canide Norte - Grão de areia', 'Tarde'),
(19, 'Canide Norte - Ar de mar', 'Manhã'),
(20, 'Canide Norte - Ar de mar', 'Tarde'),
(21, 'Canide Sul - Paredão', 'Manhã'),
(22, 'Canide Sul - Paredão', 'Tarde'),
(23, 'Marbelo', 'Manhã'),
(24, 'Marbelo', 'Tarde'),
(25, 'Madalena Norte - Vibrações', 'Manhã'),
(26, 'Madalena Norte - Vibrações', 'Tarde'),
(27, 'Madalena Sul - Daikiri', 'Manhã'),
(28, 'Madalena Sul - Daikiri', 'Tarde'),
(29, 'Miramar Norte - Neca\"', 'Manhã'),
(30, 'Miramar Norte - Neca\"', 'Tarde'),
(31, 'Miramar Sul - Bano', 'Manhã'),
(32, 'Miramar Sul - Bano', 'Tarde'),
(33, 'Mar e Sol - Neptuno', 'Manhã'),
(34, 'Mar e Sol - Neptuno', 'Tarde'),
(35, 'Aguda Norte', 'Manhã'),
(36, 'Aguda Norte', 'Tarde'),
(37, 'Granja - Barraquinha', 'Manhã'),
(38, 'Granja - Barraquinha', 'Tarde'),
(39, 'São Felix da Marinha - S. Martino', 'Manhã'),
(40, 'São Felix da Marinha - S. Martino', 'Tarde'),
(41, 'Areinho Oliveira Douro', 'Manhã'),
(42, 'Areinho Oliveira Douro', 'Tarde'),
(43, 'Areinho Avintes', 'Manhã'),
(44, 'Areinho Avintes', 'Tarde'),
(45, 'Areinho Arnelas', 'Manhã'),
(46, 'Areinho Arnelas', 'Tarde'),
(47, 'Areinho de Crestuma', 'Manhã'),
(48, 'Areinho de Crestuma', 'Tarde'),
(49, 'Reserva', 'Manhã'),
(50, 'Reserva', 'Tarde'),
(51, 'Areinho lever', 'Manhã'),
(52, 'Areinho lever', 'Tarde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turnos`
--

CREATE TABLE `turnos` (
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turnos`
--

INSERT INTO `turnos` (`label`) VALUES
('Manhã'),
('Manhã Tarde'),
('Tarde');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_dias`
--
ALTER TABLE `tb_dias`
  ADD PRIMARY KEY (`id_dia`);

--
-- Índices para tabela `tb_disponibilidade`
--
ALTER TABLE `tb_disponibilidade`
  ADD KEY `turno` (`turno`);

--
-- Índices para tabela `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_nadadores`
--
ALTER TABLE `tb_nadadores`
  ADD PRIMARY KEY (`id_nadador`);

--
-- Índices para tabela `tb_praia`
--
ALTER TABLE `tb_praia`
  ADD PRIMARY KEY (`id_praia`);

--
-- Índices para tabela `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`label`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_dias`
--
ALTER TABLE `tb_dias`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_praia`
--
ALTER TABLE `tb_praia`
  MODIFY `id_praia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_disponibilidade`
--
ALTER TABLE `tb_disponibilidade`
  ADD CONSTRAINT `tb_disponibilidade_ibfk_1` FOREIGN KEY (`turno`) REFERENCES `turnos` (`label`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
