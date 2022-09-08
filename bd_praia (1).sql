-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Set-2022 às 17:49
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
  `id_dia` int(11) DEFAULT NULL,
  `Manhã` tinyint(1) DEFAULT NULL,
  `Tarde` tinyint(1) DEFAULT NULL,
  `preferencias` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_disponibilidade`
--

INSERT INTO `tb_disponibilidade` (`id_nadador`, `id_dia`, `Manhã`, `Tarde`, `preferencias`) VALUES
(4438, 1, 1, 1, 'q'),
(4438, 2, 1, 1, 'q'),
(4438, 3, 1, 1, 'q'),
(4438, 4, 1, 1, 'q'),
(4438, 5, 0, 1, 'q'),
(9191, 1, 1, 1, '0'),
(9191, 2, 1, 1, '0'),
(9191, 3, 1, 1, '0'),
(6541, 1, 1, 1, 'Estrela do mar'),
(6541, 2, 1, 1, 'Estrela do mar'),
(6541, 3, 1, 1, 'Estrela do mar'),
(19718, 1, 1, 1, 'r'),
(19718, 4, 1, 1, 'r'),
(19718, 6, 1, 1, 'r'),
(19718, 8, 1, 1, 'r'),
(19718, 10, 1, 1, 'r'),
(19718, 11, 1, 1, 'r'),
(20076, 2, 1, 1, NULL),
(20076, 7, 1, 1, NULL),
(20934, 1, 1, 1, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 2, 1, 1, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 3, 1, 1, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 4, 1, 1, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 5, 1, 1, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 6, 1, 1, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 7, 1, 1, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 8, 1, 1, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 9, 1, 1, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 10, 1, 1, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(20934, 11, 1, 1, 'Um dia no Daikiri com o Tiago e um dia com o Edu no Ar de Mar'),
(15628, 3, 1, 1, 'Granja'),
(15628, 4, 1, 1, 'Granja'),
(15628, 10, 1, 1, 'Granja'),
(15628, 11, 1, 1, 'Granja'),
(11380, 3, 1, 1, 'Amar'),
(11380, 8, 1, 1, 'Amar'),
(11380, 9, 1, 1, 'Amar'),
(11380, 10, 1, 1, 'Amar'),
(19542, 9, 1, 1, 'oliveira do douro e sereia da costa verde'),
(19539, 7, 1, 1, 'Praias norte'),
(19539, 9, 1, 1, 'Praias norte'),
(19539, 10, 1, 1, 'Praias norte'),
(19539, 11, 1, 1, 'Praias norte'),
(16174, 1, 1, 1, NULL),
(16174, 2, 1, 1, NULL),
(16174, 3, 1, 1, NULL),
(16174, 4, 1, 1, NULL),
(16174, 5, 1, 1, NULL),
(16174, 6, 1, 1, NULL),
(16174, 7, 1, 1, NULL),
(16174, 8, 1, 1, NULL),
(16174, 9, 1, 1, NULL),
(16174, 10, 1, 1, NULL),
(16174, 11, 1, 1, NULL),
(16186, 1, 1, 1, 'Avintes e sereia'),
(16186, 5, 1, 1, 'Avintes e sereia'),
(16186, 6, 1, 1, 'Avintes e sereia'),
(16186, 7, 1, 1, 'Avintes e sereia'),
(16186, 8, 1, 1, 'Avintes e sereia'),
(16186, 9, 1, 1, 'Avintes e sereia'),
(13197, 2, 1, 1, 'Arnelas e lávadores norte amar'),
(13197, 3, 1, 1, 'Arnelas e lávadores norte amar'),
(13197, 4, 1, 1, 'Arnelas e lávadores norte amar'),
(13197, 6, 1, 1, 'Arnelas e lávadores norte amar'),
(13197, 7, 1, 1, 'Arnelas e lávadores norte amar'),
(13197, 8, 1, 1, 'Arnelas e lávadores norte amar'),
(13197, 10, 1, 1, 'Arnelas e lávadores norte amar'),
(13197, 11, 1, 1, 'Arnelas e lávadores norte amar'),
(19735, 3, 1, 1, 'Praia Estrela do Mar'),
(19735, 4, 1, 1, 'Praia Estrela do Mar'),
(19735, 10, 1, 1, 'Praia Estrela do Mar'),
(19735, 11, 1, 1, 'Praia Estrela do Mar'),
(19803, 1, 1, 1, 'ar d mar mar a vista dart'),
(19803, 2, 1, 0, 'ar d mar mar a vista dart'),
(19803, 3, 1, 1, 'ar d mar mar a vista dart'),
(19803, 4, 1, 0, 'ar d mar mar a vista dart'),
(19803, 5, 0, 1, 'ar d mar mar a vista dart'),
(19803, 6, 1, 1, 'ar d mar mar a vista dart'),
(19803, 7, 1, 1, 'ar d mar mar a vista dart'),
(19803, 8, 1, 1, 'ar d mar mar a vista dart'),
(19803, 9, 1, 1, 'ar d mar mar a vista dart'),
(19803, 10, 1, 1, 'ar d mar mar a vista dart'),
(19803, 11, 1, 1, 'ar d mar mar a vista dart'),
(18789, 1, 1, 1, 'Praia Sereira da Costa Verde'),
(18789, 2, 1, 1, 'Praia Sereira da Costa Verde'),
(18789, 3, 1, 1, 'Praia Sereira da Costa Verde'),
(18789, 4, 1, 1, 'Praia Sereira da Costa Verde'),
(18789, 5, 1, 1, 'Praia Sereira da Costa Verde'),
(18789, 6, 1, 1, 'Praia Sereira da Costa Verde'),
(18789, 7, 1, 1, 'Praia Sereira da Costa Verde'),
(18789, 8, 1, 1, 'Praia Sereira da Costa Verde'),
(18789, 9, 1, 1, 'Praia Sereira da Costa Verde'),
(18789, 10, 1, 1, 'Praia Sereira da Costa Verde'),
(18789, 11, 1, 1, 'Praia Sereira da Costa Verde'),
(20078, 1, 1, 1, 'Marus'),
(20078, 2, 1, 1, 'Marus'),
(20078, 4, 1, 1, 'Marus'),
(20078, 5, 1, 1, 'Marus'),
(20078, 6, 1, 1, 'Marus'),
(20078, 7, 1, 1, 'Marus'),
(20078, 8, 1, 1, 'Marus'),
(20078, 9, 1, 1, 'Marus'),
(20078, 10, 1, 1, 'Marus'),
(20078, 11, 1, 1, 'Marus'),
(21280, 1, 1, 1, 'Aguda Norte'),
(21280, 5, 1, 1, 'Aguda Norte'),
(21280, 6, 1, 1, 'Aguda Norte'),
(21280, 7, 1, 1, 'Aguda Norte'),
(21280, 10, 1, 1, 'Aguda Norte'),
(21280, 11, 1, 1, 'Aguda Norte'),
(12345, 1, 1, 1, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 2, 1, 1, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 3, 1, 1, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 4, 1, 1, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 5, 1, 1, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 6, 1, 1, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 7, 1, 1, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 8, 1, 1, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 9, 1, 1, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 10, 1, 1, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(12345, 11, 1, 1, 'praias do daikiri até praia de lavadores e areinho Oliveira de douro'),
(21632, 1, 1, 1, 'manuel teixeira daikiri'),
(21632, 2, 1, 1, 'manuel teixeira daikiri'),
(21632, 3, 1, 1, 'manuel teixeira daikiri'),
(21632, 4, 1, 1, 'manuel teixeira daikiri'),
(21632, 5, 1, 1, 'manuel teixeira daikiri'),
(21632, 7, 1, 1, 'manuel teixeira daikiri'),
(21632, 8, 1, 1, 'manuel teixeira daikiri'),
(21632, 9, 1, 1, 'manuel teixeira daikiri'),
(21632, 10, 1, 1, 'manuel teixeira daikiri'),
(21632, 11, 1, 1, 'manuel teixeira daikiri'),
(23818, 1, 1, 1, 'Praia da Madalena'),
(23818, 4, 1, 1, 'Praia da Madalena'),
(23818, 5, 0, 0, 'Praia da Madalena'),
(23818, 6, 0, 0, 'Praia da Madalena'),
(23818, 7, 1, 1, 'Praia da Madalena'),
(23818, 8, 1, 1, 'Praia da Madalena'),
(23818, 9, 1, 1, 'Praia da Madalena'),
(23818, 11, 0, 0, 'Praia da Madalena'),
(21631, 1, 1, 1, 'Daikiri'),
(21631, 2, 1, 1, 'Daikiri'),
(21631, 5, 1, 1, 'Daikiri'),
(21631, 6, 1, 1, 'Daikiri'),
(21631, 7, 1, 1, 'Daikiri'),
(21631, 8, 1, 1, 'Daikiri'),
(21631, 9, 1, 1, 'Daikiri'),
(21368, 1, 1, 1, 'Brasão estrela daikiri'),
(21368, 2, 1, 1, 'Brasão estrela daikiri'),
(21368, 3, 1, 1, 'Brasão estrela daikiri'),
(21368, 10, 1, 1, 'Brasão estrela daikiri'),
(21368, 11, 1, 1, 'Brasão estrela daikiri'),
(21849, 6, 0, 0, 'A mesma praia que o Thiago'),
(21849, 7, 1, 1, 'A mesma praia que o Thiago'),
(21849, 8, 1, 1, 'A mesma praia que o Thiago'),
(21849, 9, 0, 0, 'A mesma praia que o Thiago'),
(21813, 1, 1, 1, 'Crestuma'),
(21813, 2, 1, 1, 'Crestuma'),
(21813, 3, 1, 1, 'Crestuma'),
(21813, 4, 1, 1, 'Crestuma'),
(21813, 5, 1, 1, 'Crestuma'),
(21813, 6, 1, 1, 'Crestuma'),
(21813, 7, 1, 1, 'Crestuma'),
(21813, 8, 1, 1, 'Crestuma'),
(21813, 9, 1, 1, 'Crestuma'),
(21813, 10, 1, 1, 'Crestuma'),
(21813, 11, 1, 1, 'Crestuma'),
(21811, 1, 1, 1, 'Lavadores sul'),
(21811, 2, 1, 1, 'Lavadores sul'),
(21811, 3, 1, 1, 'Lavadores sul'),
(21811, 4, 1, 1, 'Lavadores sul'),
(21811, 5, 1, 1, 'Lavadores sul'),
(21811, 6, 1, 1, 'Lavadores sul'),
(21811, 7, 1, 1, 'Lavadores sul'),
(21811, 8, 1, 1, 'Lavadores sul'),
(21811, 9, 1, 1, 'Lavadores sul'),
(21811, 10, 1, 1, 'Lavadores sul'),
(21811, 11, 1, 1, 'Lavadores sul'),
(19719, 1, 1, 1, 'Estrela do mar'),
(19719, 2, 1, 1, 'Estrela do mar'),
(19719, 3, 1, 1, 'Estrela do mar'),
(19719, 4, 1, 1, 'Estrela do mar'),
(19719, 5, 1, 1, 'Estrela do mar'),
(19719, 6, 1, 1, 'Estrela do mar'),
(19719, 7, 1, 1, 'Estrela do mar'),
(19719, 8, 1, 1, 'Estrela do mar'),
(19719, 9, 1, 1, 'Estrela do mar'),
(19719, 10, 1, 1, 'Estrela do mar'),
(19719, 11, 1, 1, 'Estrela do mar'),
(21825, 1, 1, 1, 'Praia Madalena'),
(21825, 3, 1, 1, 'Praia Madalena'),
(21825, 7, 1, 1, 'Praia Madalena'),
(21825, 8, 1, 1, 'Praia Madalena'),
(21825, 9, 1, 1, 'Praia Madalena'),
(21825, 10, 1, 1, 'Praia Madalena'),
(21825, 11, 1, 1, 'Praia Madalena'),
(21822, 5, 1, 1, 'Canide norte'),
(21822, 6, 1, 1, 'Canide norte'),
(21822, 7, 1, 1, 'Canide norte'),
(21822, 8, 1, 1, 'Canide norte'),
(21822, 9, 1, 1, 'Canide norte'),
(21822, 10, 1, 1, 'Canide norte'),
(21822, 11, 1, 1, 'Canide norte'),
(22402, 5, 1, 1, 'Moita e basaloco'),
(22402, 6, 1, 1, 'Moita e basaloco'),
(22402, 7, 1, 1, 'Moita e basaloco'),
(22402, 8, 1, 1, 'Moita e basaloco'),
(22402, 10, 1, 1, 'Moita e basaloco'),
(22402, 11, 1, 1, 'Moita e basaloco'),
(21634, 4, 1, 1, 'Praia de Brito'),
(21634, 5, 1, 1, 'Praia de Brito'),
(21634, 6, 1, 1, 'Praia de Brito'),
(21634, 7, 1, 1, 'Praia de Brito'),
(21634, 8, 1, 1, 'Praia de Brito'),
(21634, 9, 1, 1, 'Praia de Brito'),
(21634, 10, 1, 1, 'Praia de Brito'),
(21634, 11, 1, 1, 'Praia de Brito'),
(21814, 3, 0, 0, 'Norte'),
(21814, 4, 0, 1, 'Norte'),
(22793, 3, 1, 1, 'Agosto'),
(22793, 5, 1, 1, 'Agosto'),
(22793, 7, 1, 1, 'Agosto'),
(22793, 9, 1, 1, 'Agosto'),
(22793, 10, 1, 1, 'Agosto'),
(22766, 1, 1, 1, 'Areinho de Avintes'),
(22766, 2, 1, 1, 'Areinho de Avintes'),
(22766, 4, 0, 1, 'Areinho de Avintes'),
(22766, 5, 1, 1, 'Areinho de Avintes'),
(22766, 6, 1, 1, 'Areinho de Avintes'),
(22766, 7, 1, 1, 'Areinho de Avintes'),
(22766, 8, 1, 1, 'Areinho de Avintes'),
(22766, 9, 1, 1, 'Areinho de Avintes'),
(22766, 11, 1, 1, 'Areinho de Avintes'),
(23000, 1, 1, 1, 'Praia Cães'),
(23000, 2, 1, 1, 'Praia Cães'),
(23000, 5, 1, 1, 'Praia Cães'),
(23000, 6, 1, 1, 'Praia Cães'),
(23000, 7, 1, 1, 'Praia Cães'),
(23000, 8, 1, 1, 'Praia Cães'),
(23000, 9, 1, 1, 'Praia Cães'),
(23000, 10, 1, 1, 'Praia Cães'),
(23000, 11, 1, 1, 'Praia Cães'),
(22610, 1, 1, 1, 'Canidelo'),
(22610, 2, 1, 0, 'Canidelo'),
(22610, 3, 1, 1, 'Canidelo'),
(22610, 4, 1, 1, 'Canidelo'),
(22610, 5, 1, 0, 'Canidelo'),
(22610, 6, 1, 0, 'Canidelo'),
(22610, 7, 1, 1, 'Canidelo'),
(22610, 8, 1, 1, 'Canidelo'),
(22600, 2, 1, 1, NULL),
(22600, 3, 1, 1, NULL),
(22600, 5, 1, 1, NULL),
(22600, 6, 1, 1, NULL),
(22600, 7, 1, 1, NULL),
(22600, 9, 1, 1, NULL),
(22600, 10, 1, 1, NULL),
(22561, 1, 1, 1, 'vibrações paredão ar d mar'),
(22561, 2, 1, 1, 'vibrações paredão ar d mar'),
(22561, 5, 1, 1, 'vibrações paredão ar d mar'),
(22561, 6, 1, 1, 'vibrações paredão ar d mar'),
(22561, 7, 1, 1, 'vibrações paredão ar d mar'),
(22561, 8, 1, 1, 'vibrações paredão ar d mar'),
(22561, 9, 1, 1, 'vibrações paredão ar d mar'),
(17738, 2, 1, 0, 'Praias mais perto do Porto possível e que paguem refeição uma vez que sou vegan obrigada'),
(17738, 4, 1, 0, 'Praias mais perto do Porto possível e que paguem refeição uma vez que sou vegan obrigada'),
(17738, 11, 1, 0, 'Praias mais perto do Porto possível e que paguem refeição uma vez que sou vegan obrigada'),
(22892, 1, 1, 1, 'Praia da Granja Barraquinha'),
(22892, 2, 1, 1, 'Praia da Granja Barraquinha'),
(22892, 5, 1, 1, 'Praia da Granja Barraquinha'),
(22892, 6, 1, 1, 'Praia da Granja Barraquinha'),
(22892, 7, 1, 1, 'Praia da Granja Barraquinha'),
(22892, 8, 1, 1, 'Praia da Granja Barraquinha'),
(22892, 10, 1, 1, 'Praia da Granja Barraquinha'),
(22892, 11, 1, 1, 'Praia da Granja Barraquinha'),
(22616, 1, 1, 1, 'Marcos Vitória Daikiri'),
(22616, 2, 1, 1, 'Marcos Vitória Daikiri'),
(22616, 3, 1, 1, 'Marcos Vitória Daikiri'),
(22616, 5, 1, 1, 'Marcos Vitória Daikiri'),
(22616, 6, 1, 1, 'Marcos Vitória Daikiri'),
(22616, 7, 1, 1, 'Marcos Vitória Daikiri'),
(22616, 8, 1, 1, 'Marcos Vitória Daikiri'),
(22616, 9, 1, 1, 'Marcos Vitória Daikiri'),
(18997, 1, 1, 1, 'Praias'),
(18997, 4, 1, 1, 'Praias'),
(18997, 5, 1, 1, 'Praias'),
(18997, 6, 1, 1, 'Praias'),
(18997, 7, 1, 1, 'Praias'),
(18997, 8, 1, 1, 'Praias'),
(18997, 11, 1, 1, 'Praias'),
(22785, 2, 1, 1, NULL),
(22785, 3, 1, 1, NULL),
(22785, 7, 1, 1, NULL),
(22785, 8, 1, 1, NULL),
(22785, 9, 1, 1, NULL),
(22785, 10, 1, 1, NULL),
(22785, 11, 1, 1, NULL),
(23517, 2, 1, 1, NULL),
(23517, 5, 1, 1, NULL),
(23517, 6, 1, 1, NULL),
(23517, 8, 1, 1, NULL),
(23005, 1, 1, 1, NULL),
(23005, 2, 0, 1, NULL),
(23005, 3, 1, 1, NULL),
(23005, 7, 1, 0, NULL),
(23005, 8, 1, 0, NULL),
(23005, 10, 0, 1, NULL),
(20557, 1, 1, 1, 'Arnelas'),
(20557, 3, 1, 1, 'Arnelas'),
(20557, 5, 1, 1, 'Arnelas'),
(20557, 9, 1, 1, 'Arnelas'),
(20557, 11, 1, 1, 'Arnelas'),
(16185, 4, 1, 1, 'Arnelas'),
(16185, 11, 1, 1, 'Arnelas');

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
  ADD KEY `id_nadador` (`id_nadador`),
  ADD KEY `id_dia` (`id_dia`);

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
  ADD CONSTRAINT `tb_disponibilidade_ibfk_1` FOREIGN KEY (`id_nadador`) REFERENCES `tb_nadadores` (`id_nadador`),
  ADD CONSTRAINT `tb_disponibilidade_ibfk_2` FOREIGN KEY (`id_dia`) REFERENCES `tb_dias` (`id_dia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
