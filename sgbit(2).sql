-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 11-Nov-2019 às 13:54
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `sgbit`
--
CREATE DATABASE IF NOT EXISTS `sgbit` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sgbit`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `idAluno` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` enum('M','F') NOT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `fone` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `serie` char(1) NOT NULL,
  `turma` char(1) NOT NULL,
  `turno` varchar(15) NOT NULL,
  `situacao` varchar(45) NOT NULL,
  PRIMARY KEY (`idAluno`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `cpf`, `nome`, `nascimento`, `sexo`, `endereco`, `fone`, `email`, `serie`, `turma`, `turno`, `situacao`) VALUES
(2, '12345', 'Paulinha Guimaraes Neves', '1999-06-07', 'F', 'rua esperança, 2019 - Flores', '92 991217168', 'paulinha@gmail.com', '8', '1', 'vespertino', ''),
(3, '23456', 'Claudio Barros', '1989-08-19', 'M', 'rua Flocos, 215 - Adrianopolis', '92995481548', 'cbarros@2gmail.com', '8', '2', 'vespertino', ''),
(5, '15648516845', 'Helton', '1989-08-19', 'M', 'rua mario andreaza, 432 - Jauary', '92995485219', 'heltoname@gmail.com', '1', '1', 'noturno', ''),
(6, '000005', 'anderson', '1990-09-10', '', '545645', '4545645', 'a@123.com', '1', '1', '123', 'Em dia'),
(8, '10101010', 'Helton Rodrigues', '2019-09-11', 'M', 'rua guimaraes', '92919458', 'a@123.com', '1', '2', 'Vespertino', 'Em dia'),
(14, '1515161891684', 'mariana', '2019-09-12', 'F', 'rua avenida', '95959485', 'mariana@gmal.com', '3', '2', 'vespertino', 'Em dia'),
(15, '4441515154652', 'Pedro Gabriel', '2019-09-14', 'M', 'belo horizonte', '69484255419', 'dvid@hotmail.com', '1', '1', 'matutino', ''),
(19, '456123', 'Pontes', '2019-09-10', 'F', 'rua almeida prado', '9456164589', 'nabia@gmail.com', '1', '2', 'matutino', 'pendente'),
(21, '123456', 'Henrique jose silva', '2004-10-13', 'M', 'rua 1', '91', 'hrjosesilva@gmail.com', '2', '1', 'vespertino', ''),
(27, '987654543', 'MARIAZINHA', '2005-10-12', 'F', 'RUA 2', '91949594', 'mariazinha@gmail.com', '2', '3', 'matutino', ''),
(28, '58585', 'VC', '2005-04-04', 'F', 'RUA VC', '94949494', 'VC@VC.COM', '2', '2', 'NOITE', ''),
(30, '01716083256', 'aderilson araujo', '2001-09-06', 'M', 'rua Antonio menezes 3259 picarreira', '92994350065', 'aderilson.aa@gmail.com', '1', '1', 'Matutino', 'Em dia'),
(31, '5859295', 'Vc tambem', '2010-11-25', 'F', 'rua tambwem', '959595958', '', '3', '1', 'vespertino', 'Em dia'),
(32, '45641564', 'Brenda Rodrigues', '2005-05-02', 'F', 'Roldão Alves 1937', '(92) 992733661', '', '9', '1', 'Matutino', 'Em dia'),
(33, '10987456321', 'davyd araujo de lima', '2002-09-29', 'M', 'Rua Abdon Mamed', '92984329166', 'davydaraujodelima@gmail.com', '3', '7', 'Vespertino', 'Em dia'),
(34, '5489745566', 'Joao de Deus', '1995-05-14', 'M', 'rua aurora real', '92991215484', 'jd@hotmail.com', '9', '2', 'Vespertino', 'Em dia'),
(35, '89168500297', 'JOAO JOSE', '2000-11-14', 'M', 'RUA C, TIRADENTES 4304', '984597279', 'keule_pagode@hotmail.com', '8', '2', 'Vespertino', 'pendente'),
(36, '00000000001', 'Davyd Araujo de Lima', '2002-09-29', 'M', 'Rua C, 1234 - Santo Antonio', '92984329166', 'davydaraujodelima@gmial.com', '3', '0', 'Vespertino', 'Em dia'),
(37, '91242358712', 'carlos campos fonseca', '2001-11-03', 'M', 'rua casimiro de abreu n.. 1233 santo antonio', '993245789', 'carlos-melo@gmail.com', '2', 'b', 'Vespertino', 'Em dia'),
(38, '22132545501', 'antonio', '2019-11-03', 'M', 'rua04', 'ssssss50', 'antonio@gmail', '6', '1', 'Matutino', 'Em dia'),
(41, '039.517.592', 'HELTON PINHEIRO DA SILVA RODRIGUES', '2019-11-07', 'M', 'Roldão Alves', '9299121716', 'heltoname@gmail.com', '2', 'b', 'Matutino', 'Em dia'),
(42, '34478914249', 'antonio de araujo', '2019-11-01', 'M', 'rua b', '994251952', 'heltoname@gmail.com', '3', 'a', 'Matutino', 'Em dia'),
(43, '31444440225', 'Maria Lúcia', '2019-11-06', 'F', 'Roldão Alves', '9299121716', 'heltoname@gmail.com', '2', 'b', 'Matutino', 'Em dia'),
(45, '852741', 'Albanir', '2019-11-15', 'M', 'rua 23', '92919584', '', '2', '3', 'Matutino', 'Em dia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `idAutor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idAutor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=240 ;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`idAutor`, `nome`) VALUES
(1, 'José Henrique'),
(3, 'Marcelo Ramos'),
(5, 'Antonio Campos de almeida'),
(6, 'Helton Rodrigues'),
(7, 'Jonas Fabricio'),
(213, 'benito de paula'),
(214, 'vanda andrade'),
(215, 'berge guerra'),
(218, 'martinez Costa'),
(219, 'douglas santos'),
(221, 'natan de oliveira'),
(223, 'rafael pontes'),
(224, 'vc'),
(226, 'fabio'),
(228, 'fabio assuncao 2'),
(229, 'aderilson araujo'),
(230, 'Jose'),
(231, 'Jose'),
(232, 'mariano'),
(233, 'Carlos Vargas'),
(234, 'Antonio Campos da silva'),
(235, 'Luis de  Alencar 01'),
(236, 'abelardo'),
(237, 'SEBASTIAO'),
(238, 'Mario Abraim'),
(239, 'Joao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacaolivro`
--

CREATE TABLE IF NOT EXISTS `classificacaolivro` (
  `idClassificacaoLivro` int(11) NOT NULL AUTO_INCREMENT,
  `classificacao` varchar(15) NOT NULL,
  `faixaEtaria` varchar(15) NOT NULL,
  `genero` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idClassificacaoLivro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Extraindo dados da tabela `classificacaolivro`
--

INSERT INTO `classificacaolivro` (`idClassificacaoLivro`, `classificacao`, `faixaEtaria`, `genero`) VALUES
(1, 'infantil', '5-10', NULL),
(2, 'aborecente', '10 a 15', 'Parlendas'),
(3, '3', '16-18', 'Parlendas'),
(10, 'teste2', 't2', NULL),
(12, 'teste24', 'nao', NULL),
(13, 'infantil', '5-10', 'Parlendas'),
(17, 'aborecente', '>15', NULL),
(26, 'dc', '5-10', NULL),
(27, 'infantil adoles', '8-15', NULL),
(32, 'qwerr', 'w', NULL),
(35, 'regg', 'er3', NULL),
(36, 're4', '34', NULL),
(39, 're4im', '34', NULL),
(41, 'lmb', '54', NULL),
(45, 'ew', 're', NULL),
(48, 'classificacao 1', 'todas', NULL),
(50, 'qualquer idade', '>18 anos', NULL),
(51, '3', '10-15', 'Livros de Imagens'),
(52, 'adultos', '18', NULL),
(53, 'romance', '5 18', 'Livros de Imagens'),
(54, 'Jardim de Infan', 'Jardim de Infan', 'Livros de Imagens'),
(55, 'Alfabetizacao', '8 a 11', 'Parlendas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE IF NOT EXISTS `editora` (
  `idEditora` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `fone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEditora`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`idEditora`, `nome`, `cidade`, `endereco`, `fone`, `email`) VALUES
(4, 'anderson', 'manaus', 'rua avenida1076', '95959485', 'a@123.com'),
(5, 'anna', 'manaus', 'rua JOAO VALERIO', '91948584', 'and@gmail.com'),
(8, 'mariana', 'joao pessoa', 'maripa', '995458458', 'mariana@gmal.com'),
(11, 'José Henrique', 'Novo Airão', 'rua almeida prado', '919959458', 'jhenrique@outlook.com'),
(14, 'editora1 r', 'joao andrade', 'nova rua', '939392392', 'edit@gmail.com'),
(15, 'Palmas', 'Forianopolis', '', '', ''),
(20, 'Nanda', 'Blumenal', '', '92994350065', 'aderilson.aa@gmail.com'),
(21, 'Nubiana', 'adrianopolis', '', '', ''),
(22, 'Perla', 'joinvile', '', '', ''),
(28, 'Albanir', 'manaus', 'aurora', '123456', 'exatamente@gmail.com'),
(29, 'keke', 'manaus', '', '9292939183', ''),
(30, 'Maria ', 'itacoatiara', '', '', ''),
(31, 'Marvel.', 'Itacoatiara am', 'Rua Borba s', '4002892', 'tantofaz@gmail.com'),
(32, 'INOVAR, LIVROS', 'MANAUS', 'A. Tucuma', '92991584642', 'inova@livros.rere'),
(33, 'Nara', 'Alagoas', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `idLivro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `ano` year(4) NOT NULL,
  `situacao` varchar(45) NOT NULL,
  `resumo` varchar(45) DEFAULT NULL,
  `observacao` varchar(45) DEFAULT NULL,
  `edicao` char(1) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `numExemplar` int(11) NOT NULL,
  `prateleira` int(11) DEFAULT NULL,
  `classificacaoLivro` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `editora` int(11) NOT NULL,
  PRIMARY KEY (`idLivro`),
  KEY `fk_Livro_Prateleira1_idx` (`prateleira`),
  KEY `fk_Livro_ClassificacaoLivro1_idx` (`classificacaoLivro`),
  KEY `fk_Livro_Autor1_idx` (`autor`),
  KEY `fk_Livro_Editora1_idx` (`editora`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`idLivro`, `titulo`, `ano`, `situacao`, `resumo`, `observacao`, `edicao`, `volume`, `numExemplar`, `prateleira`, `classificacaoLivro`, `autor`, `editora`) VALUES
(62, 'Linguagem de Programação em C++', 0000, 'legal', 'bom livro para jovens', 'nenhuma', '2', 1, 10, 1, 1, 1, 14),
(63, 'Banco de Dados', 2015, '', 'em mysql', 'sem observaçao', '1', 1, 19, 3, 2, 1, 14),
(64, 'JAVA BASICO', 2016, 'boa', 'resumido', 'nada consta', '2', 3, 15, 1, 3, 5, 8),
(67, 'javascript', 0000, 'boa aparencia', 'otimo', 'boa', '3', 2, 50, 2, 2, 6, 15),
(69, 'dados moveis', 2015, 'matriculado', 'd', 'nenhuma', '1', 2, 50, 8, 27, 213, 20),
(70, 'O Homem a Lua', 0000, 'Disponivel', 'kkkk', 'Bom', '2', 2, 3, 3, 10, 3, 8),
(73, 'GIT HUB', 2017, 'ATUAL', 'nenhum', 'todas', '2', 1, 10, 3, 10, 3, 4),
(83, 'PROGRAMANDO AED1', 2015, 'ok', 'bom livro para jovens', 'nao ha', '2', 2, 5, 3, 35, 226, 22),
(87, 'HTML', 2016, 'matriculado', 'bom', 'todas', '1', 2, 10, 2, 3, 219, 20),
(90, 'guerra dos deuses', 1995, 'boa', '', '', '2', 2, 15, 10, 2, 7, 15),
(91, 'guerra dos deuses', 1994, '', 'historia', 'nao ha', '2', 4, 20, 10, 3, 7, 11),
(92, 'Turma da Monica', 2015, '', 'Monica', 'Cebolinha', 'c', 1, 5, 13, 1, 3, 31),
(93, 'burraco negro', 1992, '', 'ficção', 'livro em bom estado', 'h', 1, 40, 14, 53, 231, 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locado`
--

CREATE TABLE IF NOT EXISTS `locado` (
  `idLocacao` int(11) NOT NULL AUTO_INCREMENT,
  `reservado` int(11) DEFAULT NULL,
  `livro` int(11) NOT NULL,
  `aluno` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `dataHoraLocacao` date NOT NULL,
  `dataHoraDevolucao` date DEFAULT NULL,
  `observacao` varchar(45) DEFAULT NULL,
  `pendencia` varchar(45) NOT NULL,
  PRIMARY KEY (`idLocacao`),
  KEY `fk_Locado_Reserva1_idx` (`reservado`),
  KEY `fk_Locado_Livro1_idx` (`livro`),
  KEY `fk_Locado_Aluno1_idx` (`aluno`),
  KEY `fk_Locado_Usuario1_idx` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=208 ;

--
-- Extraindo dados da tabela `locado`
--

INSERT INTO `locado` (`idLocacao`, `reservado`, `livro`, `aluno`, `usuario`, `dataHoraLocacao`, `dataHoraDevolucao`, `observacao`, `pendencia`) VALUES
(156, NULL, 69, 15, 7, '2019-10-30', '2019-11-01', 'Em dia', ''),
(181, NULL, 90, 32, 9, '2019-10-31', '2019-11-07', 'Em dia', ''),
(182, NULL, 70, 32, 3, '2019-10-31', '2019-11-05', 'Em dia', ''),
(184, NULL, 62, 33, 9, '2019-10-31', '2019-11-04', 'Em dia', ''),
(186, NULL, 73, 31, 8, '2019-10-23', '2019-11-05', 'renovado', ''),
(191, NULL, 69, 19, 3, '2019-10-24', '2019-11-05', 'nao entregue', 'pendente'),
(192, NULL, 62, 19, 9, '2019-10-30', '2019-11-05', 'nao entregue', 'pendente'),
(193, NULL, 93, 35, 13, '2019-11-01', '2019-11-08', '', ''),
(194, NULL, 70, 35, 13, '2019-10-28', '2019-11-06', 'nao entregue', 'pendente'),
(198, NULL, 73, 14, 3, '2019-11-13', '2019-11-20', '', ''),
(200, NULL, 64, 3, 3, '2019-10-28', '2019-11-06', '', ''),
(201, NULL, 92, 36, 7, '2019-11-06', '2019-11-15', '', ''),
(202, NULL, 93, 38, 5, '2019-11-04', '2019-11-09', '', ''),
(203, NULL, 64, 15, 7, '2019-11-07', '2019-11-13', '', ''),
(204, NULL, 64, 35, 7, '2019-11-05', '2019-11-07', 'nao entregue', 'pendente'),
(205, NULL, 62, 43, 7, '2019-11-06', '2019-11-16', 'renovado', ''),
(206, NULL, 63, 30, 3, '2019-11-07', '2019-11-16', 'renovado', ''),
(207, NULL, 90, 6, 3, '2019-11-05', '2019-11-11', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prateleira`
--

CREATE TABLE IF NOT EXISTS `prateleira` (
  `idPrateleira` int(11) NOT NULL AUTO_INCREMENT,
  `setor` varchar(45) NOT NULL,
  `fileira` varchar(45) NOT NULL,
  `capacidade` int(12) NOT NULL,
  `situacao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPrateleira`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `prateleira`
--

INSERT INTO `prateleira` (`idPrateleira`, `setor`, `fileira`, `capacidade`, `situacao`) VALUES
(1, 'A', '6', 50, 'ocupada'),
(2, 'B', '1', 100, 'disponivel'),
(3, 'C', '1', 100, 'indisponivel'),
(8, 'C', '3', 150, 'vazia'),
(10, 'E', '3', 100, 'vazia'),
(11, 'A', '5', 20, ''),
(12, 'E', '4', 50, ''),
(13, 'a', '1', 10, 'ok'),
(14, 'f', '4', 150, 'vazia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `idReserva` int(11) NOT NULL AUTO_INCREMENT,
  `livro` int(11) NOT NULL,
  `aluno` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `locado` int(11) DEFAULT NULL,
  `dataHoraReserva` date NOT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `fk_Reserva_Livro1_idx` (`livro`),
  KEY `fk_Reserva_Aluno1_idx` (`aluno`),
  KEY `fk_Reserva_Usuario1_idx` (`usuario`),
  KEY `fk_Reserva_Locado1_idx` (`locado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`idReserva`, `livro`, `aluno`, `usuario`, `locado`, `dataHoraReserva`) VALUES
(12, 64, 21, 5, NULL, '2019-11-04'),
(18, 69, 3, 5, NULL, '2019-10-25'),
(23, 67, 6, 8, NULL, '2019-10-28'),
(29, 70, 6, 8, NULL, '2019-11-01'),
(34, 69, 21, 8, NULL, '2019-11-04'),
(42, 64, 6, 3, NULL, '2019-11-11'),
(62, 70, 21, 3, NULL, '2019-11-14'),
(67, 69, 27, 3, NULL, '2019-11-14'),
(68, 69, 32, 3, NULL, '2019-11-08'),
(71, 90, 15, 7, NULL, '2019-11-13'),
(72, 63, 30, 3, NULL, '2019-11-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` enum('M','F') NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `fone` varchar(15) NOT NULL,
  `email` varchar(45) CHARACTER SET big5 COLLATE big5_bin NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `permissao` int(10) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `cpf`, `nome`, `senha`, `nascimento`, `sexo`, `endereco`, `fone`, `email`, `cargo`, `permissao`) VALUES
(1, '12345', 'Nabia', '12345', '2019-09-17', 'F', 'rua guimaraes', '92919454', 'guimas@gmail.com', 'Bibliotecaria', 1),
(3, '01135280274', 'Helton Rodrigues', 'admin', '2019-09-27', 'M', 'belo horizonte', '92919584', 'hel_ton_wonderful@hotmail.com', 'Adm', 1),
(5, '10101010', 'anderson santos', '1234', '2019-10-15', 'M', 'rua guimaras', '9291959', 'toninho@etmail.com', 'Professor', 2),
(7, '10203040', 'Antonia', '123', '2019-09-05', 'M', 'rua JOAO VALERIOk', '92929292', 'eu@gmail.com', 'Professor', 2),
(8, '51545161321', 'Joao', '123', '2019-09-14', 'M', '545645', '9291959498', 'jhenrique@outlook.com', 'Professor', 2),
(9, '12354698068', 'Davyd Lima', 'davydlima', '2002-09-29', 'M', 'Rua Abdon Mamed', '929849166', 'davydlima007@gmail.com', 'Secretario', 2),
(13, '89168500297', 'KEULE DA SILVA TEIXEIRA', '131313', '1991-04-27', 'M', 'RUA ALDINO REIS, QUADRA 02, CJ CIDADÃO!', '92981526056', 'keule_pagode@hotmail.com', 'Professor', 2),
(14, '50302010', 'Joao', '54321', '2019-09-14', 'M', '545645', '9291959498', 'jhenrique@outlook.com', 'Professor', 2);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fk_Livro_Autor1` FOREIGN KEY (`autor`) REFERENCES `autor` (`idAutor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Livro_ClassificacaoLivro1` FOREIGN KEY (`classificacaoLivro`) REFERENCES `classificacaolivro` (`idClassificacaoLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Livro_Editora1` FOREIGN KEY (`editora`) REFERENCES `editora` (`idEditora`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Livro_Prateleira1` FOREIGN KEY (`prateleira`) REFERENCES `prateleira` (`idPrateleira`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `locado`
--
ALTER TABLE `locado`
  ADD CONSTRAINT `fk_Locado_Aluno1` FOREIGN KEY (`aluno`) REFERENCES `aluno` (`idAluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Locado_Livro1` FOREIGN KEY (`livro`) REFERENCES `livro` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Locado_Reserva1` FOREIGN KEY (`reservado`) REFERENCES `reserva` (`idReserva`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Locado_Usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_Reserva_Aluno1` FOREIGN KEY (`aluno`) REFERENCES `aluno` (`idAluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reserva_Livro1` FOREIGN KEY (`livro`) REFERENCES `livro` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reserva_Locado1` FOREIGN KEY (`locado`) REFERENCES `locado` (`idLocacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reserva_Usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
